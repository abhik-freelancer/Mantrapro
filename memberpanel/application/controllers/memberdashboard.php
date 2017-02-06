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

}

?>