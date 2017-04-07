<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class memberdashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboardmodel', '', TRUE);
        $this->load->model('profilemodel', '', TRUE);
        $this->load->library('session');
        $this->load->helper('date');
    }

    public function index() {
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            
			$packageExpmsg="";
            $page = 'memberdashboard/memberdashboard';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
            
            $validityString = $fromdate." - ".$todate;
            $grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            $validupto = date('Y-m-d',  strtotime($todate));
            $validfrom = date('Y-m-d',  strtotime($fromdate));
            $totalExtentiondate = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
			$currentDate =date('Y-m-d');
			if($currentDate < $totalExtentiondate){
				$packageExpmsg = "Days left for expired";
			}
			else{
					$packageExpmsg = " Package Expierd";
			}
			
            $date1 = DateTime::createFromFormat('Y-m-d', $totalExtentiondate);
            $date2 = DateTime::createFromFormat('Y-m-d', $currentDate);

            $diffDays = $date2->diff($date1)->format("%a");
			
            $subscriptionamount = $this->profilemodel->getSubscriptionAmountOfMember($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            $paidAmount = $this->profilemodel->getPaidAmount($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
            
            
          //  getAttendanceRate($fromDate,$validUpto,$memberNo)
            $customer = $this->profilemodel->getCustomerByCustId($customerId);
            $customermobile=$customer["CUS_PHONE"];
            
            
            $header = "";
            
            $result["cashbackdata"] = $this->dashboardmodel->getMemberCashBackPoint($membershipNumber,$validityString);
            $result["packagExpirystatus"]=$packageExpmsg;
            $result["remain"]=$diffDays;
            $result["validupto"]=$todate;
            $result["attpercentage"]=  $this->dashboardmodel->getAttendanceRate($validfrom,$validupto,$membershipNumber);
            $result["paymentdue"] = ($subscriptionamount - $paidAmount);
            $result["packagehistory"] = $this->dashboardmodel->getPackageHistory($customermobile,$latestvalidity["VALIDITY_STRING"]);
            
            
            createbody_method($result, $page, $header, $session);
            //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
        } else {

            redirect('memberlogin', 'refresh');
        }
    }
	
	public function applycashback(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberdashboard/cash-back-apply';
            $membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			$validityString = $fromdate." - ".$todate;
			$header ="";
			$result['memberid']=$customerId;
			$result['membershipNumber']=$membershipNumber;
			$result['validityString']=$validityString;
			$result["cashbackdata"] = $this->dashboardmodel->getMemberCashBackPoint($membershipNumber,$validityString);
			
			createbody_method($result, $page, $header, $session);
			
		}else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function checkCashBackApplied(){
		if($this->session->userdata('user_data')){
			$response = array();
			$membership_no =  trim($this->input->post('membership',TRUE));
			$latestvalidity = $this->profilemodel->getValidityString($membership_no);
			$isApplied = $this->dashboardmodel->checkCashBackApplied($membership_no,$latestvalidity['VALIDITY_STRING']);
			$response = array(
				"msg_code"=>1,
				"msg_data"=>$isApplied
			);
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function processCashBack(){
		if($this->session->userdata('user_data')){
			$response = array();
			$insertArry = array();
			$session = $this->session->userdata('user_data');
			$customerId = trim($this->input->post('member-id',TRUE));
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
			$membership_no = trim($this->input->post('membership-no',TRUE));
			$validity = trim($this->input->post('member-validity',TRUE));
			$cashbackamount = trim($this->input->post('cashback-amount',TRUE));
			$cashbackpoint = trim($this->input->post('cashback-point',TRUE));
			
			$latestvalidity = $this->profilemodel->getValidityString($membership_no);
			
			$checkCashBackEligibility = $this->checkCashBackEligibility($latestvalidity["validupto"],$customerDtl['CUS_CARD']);
			if($checkCashBackEligibility){
				$insertArry = array(
					"member_id" => $customerId,
					"membership_no" => $membership_no,
					"validity_period" => $latestvalidity['VALIDITY_STRING'],
					"apply_date" => date('Y-m-d'),
					"cash_bck_point" => $cashbackpoint,
					"cash_bck_amt" => $cashbackamount,
					"is_approved" => 'N',
					"is_redeemed" => 'N'
				);
				
			
				$status = $this->insertupdatemodel->insertData('cash_back_admin',$insertArry); 
				if($status){
					$response = array(
					"msg_code" => 1,
					"msg_data" => "Cash back applied successfully."
					);
				}
				else{
					$response = array(
					"msg_code" => 2,
					"msg_data" => "There is something error.Please try again later..."
					);
				}
			}
			else{
				$response = array(
					"msg_code" => 0,
					"msg_data" => "You can apply cash back before 10 days from the date of expiry."
				);
			}
			
			header('Content-Type:application/json');
			echo json_encode($response);
			exit;
				
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	private function checkCashBackEligibility($validupto,$cardcode){
		$isApllicable = false;
		$validupto = date('Y-m-d',strtotime($validupto));
		$cardExtDys = $this->dashboardmodel->getCardExtensionDays($cardcode);
		
		$till_apply_days =  date('Y-m-d', strtotime($validupto. ' + '.$cardExtDys .' days'));
		
		$remaing_dys = 10;
		$upto_apply_dys = $remaing_dys+$cardExtDys;
	
		$date = date('Y-m-d');
		
		// Start date of cashback apply 
		$cur_dt=date_create($date);
		$start_date=date_create($validupto);
		$diff=date_diff($cur_dt,$start_date);
		$start_apply_days = $diff->format("%R%a days");
		
	
	//	echo "Start Aplly date ".$start_apply_days;
		
	
		// Till Aplly date cash back 
		$date1=date_create($date);
		$till_date=date_create($till_apply_days);
		
		$diff=date_diff($date1,$till_date);
		$till_apply_days = $diff->format("%R%a days");
		
		/*
			echo "<br>";
			echo "Till Apply date ".$till_apply_days;
			echo "<br>***";*/
		
		if($start_apply_days>0 && $start_apply_days<10 && $till_apply_days<=$upto_apply_dys){
			$isApllicable = true;
		}
		if($start_apply_days>10 && $till_apply_days>$upto_apply_dys){
			$isApllicable = false;
		}
		
	return 	$isApllicable ;
	}
	
	
	public function renewpackage(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			$membershipNumber = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipNumber);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
			$validityString = $fromdate." - ".$todate;
			
			$grantDays = 0;
			$next_start_dt="";
			$grantDays = $this->dashboardmodel->getExtensionDays($membershipNumber,$latestvalidity["VALIDITY_STRING"]);
			
			
			
            $validupto = date('Y-m-d',  strtotime($todate));
            $validfrom = date('Y-m-d',  strtotime($fromdate));
            $actualExpryDt = date('Y-m-d',strtotime($validupto. ' +'.$grantDays.' days'));
			$validity_pd = date('d-m-Y',strtotime($validfrom ))." - ".date('d-m-Y',strtotime($actualExpryDt));
			// Next Start Date 
			$plusDay = 1;
			if($grantDays>0){
				$next_start_dt = date('Y-m-d', strtotime($actualExpryDt. ' + '.$plusDay.' days')); 
			}
			else{
				$next_start_dt = date('Y-m-d', strtotime($validupto. ' + '.$plusDay.' days')); 
			}
			
			$member = $this->profilemodel->getCustomerByCustId($customerId);
			$renewal_rate = $this->dashboardmodel->getRenewalSubscriptionAmount($member['CUS_BRANCH'],$member['CUS_CARD']);
			$cashbackAmt =  $this->dashboardmodel->getApprovedCashBackAmt($membershipNumber,$validityString);
			$renewalAmount = $renewal_rate - $cashbackAmt;
			$yearId = $this->profilemodel->getFinancialYear();
			$taxPercentage = $this->dashboardmodel->getTaxPercentage($yearId);
			$taxAmount = $renewalAmount*$taxPercentage/100;
			$totalPayableAmount = $renewalAmount+$taxAmount;
			
			$page = 'memberdashboard/renew-package-form';
			$header="";
			
			$result = array(
				"customer_id"=>$customerId,
				"membershipno"=>$membershipNumber,
				"member_name"=>$member['CUS_NAME'],
				"membermobileno"=>$member['CUS_PHONE'],
				"branchcode" =>$member['CUS_BRANCH'],
				"validity_pd"=>$validity_pd,
				"subscription"=>$renewal_rate,
				"nextstartdate"=>$next_start_dt,
				"paymentdate"=>date('Y-m-d'),
				"cashbackamount"=>$cashbackAmt,
				"renewalamount"=>$renewalAmount,
				"taxpercentage"=>$taxPercentage,
				"netpayable"=>$totalPayableAmount,
			);
			
			
            createbody_method($result, $page, $header, $session);
		}else{
			redirect('memberlogin','refresh');
		}
	}
	
	
	public function processrenewal(){
		if($this->session->userdata('user_data'))
		{
			$posts['_POST'] = $this->input->post();
			$page = 'memberdashboard/proceessrenewal';
			$this->load->view($page,$posts);
			
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	
	

}

?>