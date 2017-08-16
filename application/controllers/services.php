<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class services extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('homemodel','',TRUE);
    $this->load->model('servicemodel','',TRUE);
    $this->load->model('gstmastermodel','',TRUE);
  }
	
 public function index()
 {
	$page = "";
	$header = "";
	$session="";
	$result="";
	createbody_method($result,$page,$header,$session);
 }
 
 public function rate_chart(){
	$page = 'services/mantra-services';
	$header="";
	$session="";
	$result['webBranch']=$this->homemodel->getWebBranch();
	createbody_method($result,$page,$header,$session);
}

public function getBranchWiseRate(){
	$json_response = array();
	$branch = $this->input->post('branch');
	$ratechart['ratechart'] = $this->servicemodel->getBranchWiseRateChart($branch);
	$display = $this->load->view('services/prepare-service-chart',$ratechart);
	echo $display ;
	
	
	
	
	/*
	header('Content-Type: application/json');
	echo json_encode($ratechart);
	exit();*/
}

public function getFacilty(){
	$page = 'services/mantra-package-facility';
	$header="";
	$session="";
	
	$cardID = $this->uri->segment(3);
	$branch = $this->uri->segment(4);
	$result['cardDtl'] = $this->servicemodel->getCardDetailById($cardID,$branch);
	$result['branchcode'] = $branch;
	
	// Complimentary Facility ----
	$result['complDtl'] =  $this->servicemodel->getComplFacilityDetailByBranch($cardID,$branch);
	// Part of Package Facility ----
	$result['packagePart'] =  $this->servicemodel->getPackagePartFacilityDetailByBranch($cardID,$branch);
	$result['workoutDtl'] =  $this->servicemodel->getWorkOutFacility($cardID,$branch);
	$result['healthandfitness'] =  $this->servicemodel->getHealthAndFitnessFacility($cardID,$branch);
	
	
	
	createbody_method($result,$page,$header,$session);
}

public function onlineregistration()
{
	$cardID = $this->uri->segment(3);
	$branch = $this->uri->segment(4);
	$page = 'services/online-registration-form';
	$header="";
	$session="";
	$result['branchcode'] = $branch;
	$result['cardDtl'] = $this->servicemodel->getCardDetailById($cardID,$branch);
	$result['branch'] = $this->servicemodel->getBranchByCode($branch);
	$result['finYrDtl'] = $this->servicemodel->getFinancialYear(); // getting financial year detail by current date
	$result['cgstRateOpt'] = $this->gstmastermodel->getGSTRate('CGST'); // getting CGST Rate Options
	$result['sgstRateOpt'] = $this->gstmastermodel->getGSTRate('SGST'); // getting CGST Rate Options
	
	
	$cgstRate = $result['cgstRateOpt'][0]['rate']; // Need to change when rate is more than one 
	$sgstRate = $result['sgstRateOpt'][0]['rate']; // Need to change when rate is more than one 


	
	$cgstAmt = $cgstRate*$result['cardDtl']['package_rate']/100;
	$sgstAmt = $sgstRate*$result['cardDtl']['package_rate']/100;
	$totalAmountPayble = $result['cardDtl']['package_rate']+$cgstAmt+$sgstAmt;
	
	$result['paymentInfo'] = array(
		"cgstRate" => $cgstRate,
		"sgstRate" => $sgstRate,
		"cgstAmt" => $cgstAmt,
		"sgstAmt" => $sgstAmt,
		"totalGSTAmt" => $cgstAmt+$sgstAmt,
		"totalPayableAmt" => $totalAmountPayble
	);
	
	
	
	//print_r($result['cardDtl']);
	
	createbody_method($result,$page,$header,$session);
}

public function proceedtopayment()
{
	
	//$post = array();
	
	// Personal Info
	$name = trim($this->input->post('onlinereg-name',TRUE));
	$gender = $this->input->post('onlinereg-gender',TRUE);
	$dob = trim($this->input->post('onlinereg-dob',TRUE));
	$mobile = trim($this->input->post('onlinereg-mobile',TRUE));
	$email = trim($this->input->post('onlinereg-email',TRUE));
	
	$address = trim($this->input->post('onlinereg-address',TRUE));
	$zipcode = trim($this->input->post('onlinereg-zipcode',TRUE));
	$city = trim($this->input->post('onlinereg-city',TRUE));
	$state = trim($this->input->post('onlinereg-state',TRUE));
	$country = trim($this->input->post('onlinereg-country',TRUE));
	
	
	$branch = trim($this->input->post('selected-branch',TRUE));
	$package = trim($this->input->post('selected-package',TRUE));
	
	$package_code = (trim($this->input->post('cc'))); //cc = Card Code
	$branch_code = (trim($this->input->post('bcd'))); // bcd = Branch Code
	

	$subscription = trim($this->input->post('subscription-amount',TRUE));
	
	//$servicetax = trim($this->input->post('service-tax-percent',TRUE));
	$servicetax = 0;
	$cgstRate = $this->input->post('cgst-rate',TRUE);
	$cgstAmt = trim($this->input->post('cgst-amount',TRUE));
	
	$sgstRate = $this->input->post('sgst-rate',TRUE);
	$sgstAmt = trim($this->input->post('sgst-amount',TRUE));
	
	
	
	$netpayable = trim($this->input->post('net-payable-amt',TRUE));
	
	$cus_address = $address." ".$city;
	
	
	/*$parameter_string = $name."*".$gender."*".$dob."*".$mobile."*".$email."*".$branch_code."*".$package_code."*".$subscription."*".$servicetax."*".$netpayable."*".$cus_address."*".$zipcode;*/
	
	$parameter_string = $name."*".$gender."*".$dob."*".$branch_code."*".$package_code."*".$subscription."*".$servicetax."*".$netpayable."*".$cgstRate."*".$sgstRate;
	
	
	
	
	//$namestring = $this->encrypt_string($parameter_string);
	$namestring = $parameter_string;
	$channel = 10;
	$accountid = 19354;
	$secreatekey = '9198beab24537d04cb37bb7b2fc44f91';
	$refrenceno = 1491889093;
	$mode = 'LIVE';
	$currency = 'INR';
	$description = 'Registration';
	$return_url = base_url().'services/paymentresponse';
	
	/*$address = 'Test';
	$city = 'Kolkata';
	$state = 'West Bengal';
	$country = 'IND';
	$postal_code = '700001';*/
	
	$country = 'IND'; // use short form of country
	
	$phone = $mobile;
	$submitted = $this->input->post('submitted');
	
	
	
	
	$post['data'] = array(
		"channel" => $channel,
		"account_id" => $accountid,
		"secretkey" => $secreatekey,
		"reference_no" => $refrenceno,
		"amount" => $netpayable,
	//	"amount" =>1,
		"mode" => $mode,
		"currency" => $currency,
		"description" => $description,
		"return_url" => $return_url,
		"name" => $namestring,
		"address" => $address,
		"city" => $city,
		"state" => $state,
		"country" => $country,
		"postal_code" => $zipcode,
		"phone" => $mobile,
		"email" => $email,
		"submitted" => $submitted
	);
	
	
	$page = 'onlinepayment/online-payment-process';
	$this->load->view($page,$post);
	
}

public function paymentresponse()
{
	$posts['_POST'] = $this->input->post();
	$page = 'onlinepayment/online-payment-response';
	$this->load->view($page,$posts);

}


public function paymentconfirmation()
{
	$posts = $this->input->post();
	$HASHING_METHOD = 'sha512';  
	$hashData = "9198beab24537d04cb37bb7b2fc44f91"; // don't change this secreate key
			
	$response = array();
	ksort($posts);
	foreach ($posts as $key => $value)
	{
		if (strlen($value) > 0 && $key != 'SecureHash') 
		{
			$hashData .= '|'.$value;
		}
	}
	if (strlen($hashData) > 0) 
	{
		$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
		if($secureHash != $posts['SecureHash'])
		{
			echo '<h1>Error!</h1>';
			echo '<p>Hash validation failed from confirm page</p>';
			exit;
		}
		else 
		{
			$successMsg = $posts['Status'];
			
			if($successMsg=="SUCCESS")
			{
				
			/*$parameter_string = $name."*".$gender."*".$dob."*".$mobile."*".$email."*".$branch_code."*".$package_code."*".$subscription."*".$servicetax."*".$netpayable;*/
			
	/*	$parameter_string = $name."*".$gender."*".$dob."*".$branch_code."*".$package_code."*".$subscription."*".$servicetax."*".$netpayable;
		*/
				$account_master = array();
				$customer_insert = array();
				$payment_insert = array();
				$online_payment = array();
				
	
				//Success Status
				$customerDtl = explode("*",$posts['customerID']);
				$cus_name = $customerDtl[0];
				$cus_sex = $customerDtl[1];
				$cus_dob = $customerDtl[2];
				//$cus_mobile = $customerDtl[3];
				//$cus_email = $customerDtl[4];
				$cus_branch = $customerDtl[3];
				$cus_package = $customerDtl[4];
				$subscriptionAmt = $customerDtl[5];
				$serviceTaxrate = $customerDtl[6];
				$netPayableAmt = $customerDtl[7];
				$cgstRateId = $customerDtl[8];
				$sgstRateId = $customerDtl[9];
				//$zip_code = $customerDtl[11];
				
				$cus_mobile = $posts['customerPhone'];
				$cus_email = $posts['customerEmail'];
				$address = $posts['customerAddress'];
				$city = $posts['customerCity'];
				$state = $posts['customerState'];
				$zip_code = $posts['customerZipCode'];
				$cus_address = $address." ".$city." ".$state;
				
				$finYear = $this->servicemodel->getFinancialYear();
				$serial_no = $this->getSerialNoByBranchAndPackage($cus_branch,$cus_package);
				$membership_no = $this->generateMembershipNo($cus_branch,$cus_package,$serial_no);
				$receiptSerialNo = $this->getLatestReceiptNo($cus_branch,$finYear['year_id']);
				$accountcode = $this->generateAccountCode();
				$param = "SUNDRY DEBTOR";
				$subgroupId = $this->getSubGroupId($param);
				
				// preparing validity period
				$duration=$this->getCardDuration($cus_package);
				$open_date = date('Y-m-d');
				
				$opening_date = explode("-",$open_date);
				$valid_upto = date('Y-m-d',strtotime('+'.$duration.' day',mktime(0,0,0,$opening_date[1],$opening_date[2],$opening_date[0])));
				
				$valid_string=$open_date." - ".$valid_upto;
				
				// CGST AMOUNT
				
				$rowCGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('CGST',$cgstRateId);
				$rowSGSTRate = $this->gstmastermodel->GetGSTRateByIdAndType('SGST',$sgstRateId);
				
				$cgstAmount = 0;
				$cgstAmount = $rowCGSTRate*$subscriptionAmt/100;
				$sgstAmount = 0;
				$sgstAmount = $rowSGSTRate*$subscriptionAmt/100;
				
				// Account Master
				$account_master = array(
					"account_description" => $cus_name,
					"sub_group_id" => $subgroupId,
					"open_bal" => 0,
					"member_acccode" => $accountcode ,
					"fin_id" => $finYear['year_id'],
					"is_active" => 'Y',
					"company_id" => 1,
				);
				
				// Customer Master
				$customer_insert = array(
					"CUS_BRANCH" => $cus_branch,
					"CUS_CARD" => $cus_package,
					"MEMBERSHIP_NO" => $membership_no,
					"CUS_NAME" => $cus_name,
					"CUS_DOB" => date('Y-m-d',strtotime($cus_dob)),
					"CUS_SEX" => $cus_sex,
					"CUS_ADRESS" => $cus_address,
					"CUS_PIN" => $zip_code,
					"CUS_PHONE" => $cus_mobile,
					"CUS_EMAIL" => $cus_email,
					"IS_ACTIVE" => 'Y',
					"REGISTRATION_DT" => date('Y-m-d'),
					"PASS" => date('Y-m-d',strtotime($cus_dob)),
					"SRL_NO" => $serial_no,
					//"USER_ID" => 80,
					"PAYMENT_ID" => NULL,
					"PAYMENT_DT" => date('Y-m-d'),
					"IS_COMPLI" => 'N',
					"pack_type" => 'M',
					"is_converted" => 'N',
					"entry_mode" => 'NR',
					"accountcode" => $accountcode
				);
				
				// Payment Master 
				$payment_insert = array(
					"MEMBERSHIP_NO" => $membership_no,
					"CARD_CODE" => $cus_package,
					"FROM_DT" => $open_date,
					"VALID_UPTO" => $valid_upto,
					"EXPIRY_DT" => $valid_upto,
					"ADMISSION" => 0,
					"SUBSCRIPTION" => $subscriptionAmt,
					"PRM_AMOUNT" => $subscriptionAmt,
					"AMOUNT" => $subscriptionAmt,
					"MNTN_CHG" => 0,
					"DUE_AMOUNT" => 0,
					"SERVICE_TAX" => NULL,
					"CGST_RATE_ID" => $cgstRateId,
					"CGST_AMT" => $cgstAmount,
					"SGST_RATE_ID" => $sgstRateId,
					"SGST_AMT" => $sgstAmount,
					"TOTAL_AMOUNT" => $netPayableAmt,
					"PAYMENT_DT" => date('Y-m-d'),
					"FRESH_RENEWAL" => 'F',
					"USER_ID" => 80, //Self
					"BRANCH_CODE" => $cus_branch,
					"FIN_ID" => $finYear['year_id'],
					"RCPT_NO" => $receiptSerialNo,
					"PAYMENT_MODE" =>'ONP', // ONP = Online Payment
					"CUST_ID" => NULL,
					"VALIDITY_STRING" => $valid_string,
					"payment_from" => 'REG',
					"collection_at" => $cus_branch
				);
				
				//
				$online_payment = array(
					"online_payment_id" => $posts['PaymentID'], 
					"transaction_id" => $posts['TransactionID'],
					"payment_master_id" => NULL, // payment master table refrence 
					"payment_status" => 'Y', 
					"processing_date" => date('Y-m-d'),
					"payment_from" => 'REG'
					);
				$insertData = $this->servicemodel->insertAllRecords($account_master,$customer_insert,$payment_insert,$online_payment);
				if($insertData)
				{
					$data = array(
						"membership_no" => $membership_no,
						"validity_pd" => $valid_string,
						"mobile_no" => $cus_mobile,
						"cus_dob" =>  date('Y-m-d',strtotime($cus_dob)),
						"status" => 'Y' // Successfully registered
					);
					
					$sendSMS = $this->SendSMS($cus_mobile,$membership_no);
				}
				else
				{
					$data = array(
						"membership_no" => '',
						"validity_pd" => '',
						"mobile_no" => '',
						"cus_dob" =>  '',
						"status" => 'U' // Unexpected error when isnerting into database 
					);
				}
				
				
				
			}
			else
			{
				// Failed Status Coding
				$online_payment = array();
					$online_payment = array(
						"online_payment_id" => $posts['PaymentID'], 
						"transaction_id" => $posts['TransactionID'],
						"payment_master_id" => NULL, // payment master table refrence 
						"payment_status" => 'N', 
						"processing_date" => date('Y-m-d'),
						"payment_from" => 'REG'
					);
				$insertData = $this->servicemodel->insertIntoOnlinePaymentStatus($online_payment);
				
				if($insertData)
				{
					$data = array(
						"membership_no" => '',
						"validity_pd" => '',
						"mobile_no" => '',
						"cus_dob" =>  '',
						"status" => 'N' // Payment Failed and Registration not done
					);
				}
				else
				{
					$data = array(
						"membership_no" => '',
						"validity_pd" => '',
						"mobile_no" => '',
						"cus_dob" =>  '',
						"status" => 'U' // Unexpected error when isnerting into database 
					);
				}
				
			}
			
			$page = 'onlinepayment/online-payment-confirmation';
			$this->load->view($page,$data);
			
			
			
		}
	}
}



// get serial no by branch and package
private function getSerialNoByBranchAndPackage($branch,$package)
{
	$srl_no = $this->servicemodel->getSerialNoByBranchAndPackage($branch,$package);
	$latest_serial_no = $srl_no+1;
	return $latest_serial_no;
}

private function generateMembershipNo($branch,$card,$srl)
{
	$srl_len=strlen($srl);
    $rem_len=8-$srl_len;
	$zero="";
    for ($i=1; $i<=$rem_len; $i++)
    {
	    $zero=$zero."0";
    }

    $mSrl_no_txt="MH".$branch.$card.$zero.$srl;

	return $mSrl_no_txt;
}

// get aacouncode no
/*private function generateAccountCode()
{
	/*
	date_default_timezone_set('Asia/Kolkata');
	$acc_code_prefix = "M-AAC";
	$cuurent_time_stmp = date("dmYHis");
	$digits = 3;
	$rand_no = rand(pow(10, $digits-1), pow(10, $digits)-1);
	$acccoundCode = $acc_code_prefix."/".$cuurent_time_stmp."/".$rand_no;
	return $acccoundCode;
	
}
*/
private function generateAccountCode(){
	$padding = "";
	$membercode = "";
	$rowLasteSrl = $this->servicemodel->getLastSerialNoForMemCode();
	
	
		$max_srl_no = $rowLasteSrl['maxSerialNo'];
		$srl_tbl_id = $rowLasteSrl['tableID'];
	
	$new_serial = $max_srl_no+1;
	$length = ceil(log10(abs($max_srl_no) + 1));
	
	if($length==1){ $padding="00000"; }
	if($length==2){ $padding="0000"; }
	if($length==3){ $padding="000"; }
	if($length==4){ $padding="00"; }
	if($length==5){ $padding="0"; }
	if($length==6){ $padding=""; }
	
	
	$membercode = 'M'.$padding.$new_serial;
	$updArry = array(
		"latest_srl" => $new_serial
	);
	$update = $this->servicemodel->updateSerialTable($updArry,$srl_tbl_id);
	//echo $membercode;
	return $membercode;
	
}



// getting latest receipt no by branch and year id
private function getLatestReceiptNo($branch,$yearid)
{
	$max_receipt_no = $this->servicemodel->getMaxReceiptNoByBranchAndYear($branch,$yearid);
	$latestReceiptNo = $max_receipt_no +1;
	return $latestReceiptNo ;
}

// Getting Card Duration '
private function getCardDuration($card)
{
	$card_duration = $this->servicemodel->getCardDuration($card);
	return $card_duration;
}

private function getSubGroupId($param)
{
	$sub_grp_id = $this->servicemodel->getSubGroupID($param);
	return $sub_grp_id;
}

private function SendSMS($phone,$mno)
{
	$mantra_url = "http://myvaluefirst.com/smpp/sendsms?";
	$message = "Thank you for being part of Mantra family.Your Membership no. is ".$mno.". Please use the same for any further communication.";
	$feed=$this->mantraSend($phone,$message);
	return $feed;
}

private function mantraSend($phone, $msg)
{
	$mantra_user = "mantraapi1";
    $mantra_password = "mantraapi1";	
	$mantra_url = "http://myvaluefirst.com/smpp/sendsms?";
	$mantra_from = "MANTRA";
    $mantra_udh = 0;

      $url = 'username='.$mantra_user;
      $url.= '&password='.$mantra_password;
      $url.= '&to='.urlencode($phone);
      $url.= '&from='.$mantra_from;
      $url.= '&udh='.$mantra_udh;
      $url.= '&text='.urlencode($msg);
      $url.= '&dlr-mask=19&dlr-url*';

      $urltouse =  $mantra_url.$url;


      $file = file_get_contents($urltouse);
      if ($file=="Sent.")
	  {
		  $response="Y";
	  }
	  else
	  {
          $response="N";
	  }

      return($response);
   
}




public function yoga_and_meditation_class(){
	$page = 'services/yoga-and-medition-classes';
	$header="";
	$session="";
	$result="";
	createbody_method($result,$page,$header,$session);
	
	
}




}

?>