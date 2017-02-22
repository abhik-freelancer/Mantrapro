<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class body_calculator extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('bodycalculatormodel','',TRUE);
  }
	
 public function index()
 {
	$page = "body_calculator/mantra-body-calculator";
	$header = "";
	$session="";
	$result['venue']=$this->bodycalculatormodel->getLocation();
	createbody_method($result,$page,$header,$session);
 }
 
 public function InsertOutsideBodyFat(){
	$json_response = array();
	$outsidebodyfat = array();
	$entry_date = date("Y-m-d");
//	$venue = trim($this->input->post('bodyfat-venue'));
	$firstname = trim($this->input->post('bodyfat-firstname'));
	$lastname = trim($this->input->post('bodyfat-lastname'));
	$gender = trim($this->input->post('bodyfat-gender'));
	$mobile = trim($this->input->post('bodyfat-mobile'));
	$email = trim($this->input->post('bodyfat-email'));
	$weight = trim($this->input->post('txt_weight'));
	$waist = trim($this->input->post('txt_waist'));
	$hip = trim($this->input->post('txt_hip'));
	$sex = "";
	if($gender=="M"){
		$sex="MALE";
	}
	if($gender=="F"){
		$sex="FEMALE";
	}
	
	$validation_err = $this->validateBodyFat($firstname,$lastname,$mobile,$weight,$waist,$hip);
	if($validation_err){
		$email_validate = $this->validateEmail($email);
		if($email_validate){
		$bodyfatpercentage = $this->bodycalculatormodel->getBodyFatPercentage($weight,$waist,$hip,$gender);	
		
		$fat_percent = $bodyfatpercentage['bodyFatPercentage'];
		$fat_mass = $bodyfatpercentage['bodyFatMass'];
		$lean_body_mass = $bodyfatpercentage['bodyLeanMass'];
		$waist_hp_ratio = $bodyfatpercentage['waisthipRatio'];
		$waist_circum_point = $bodyfatpercentage['waistcurcumferencevalue'];
		$waist_circum_rmk = $bodyfatpercentage['waistcurcumferenceassesment'];
		$waist_hp_point = $bodyfatpercentage['waistHipRatioValue'];
		$waist_hip_rmk = $bodyfatpercentage['waistHipRatioAssessment'];
		
		$sms_message = "Dear ".$firstname.", \nYour Fat % is ".$fat_percent." which is ".$waist_circum_rmk.".\nYour waist hip ratio is ".$waist_hp_ratio." which is in ".$waist_hip_rmk." zone. \n ----- Team Mantra";

		
		$outsidebodyfat = array(
			"entry_date" => $entry_date,
			"first_name" => $firstname,
			"last_name" => $lastname,
			"gender" => $sex,
			"mobile_no" => $mobile,
			"email" => $email,
			"location" => 'SELF', // SELF = From Website
			"weight" => $weight,
			"waist_size" => $waist,
			"hip_size" => $hip,
			"fat_percent" => $fat_percent,
			"fat_mass" => $fat_mass,
			"lean_body_mass" => $lean_body_mass,
			"waist_circum_point" => $waist_circum_point,
			"waist_circum_rmk" => $waist_circum_rmk,
			"waist_hp_ratio" => $waist_hp_ratio,
			"waist_hp_point" => $waist_hp_point,
			"waist_hip_rmk" => $waist_hip_rmk,
			"is_sms_sent" => $this->sendSMS($mobile,$sms_message)
			
		);
		$insertoutsidebodyfat = $this->bodycalculatormodel->InsertIntoOutsideBodyFat($outsidebodyfat);
			if($insertoutsidebodyfat){
				$json_response = array("msg_code"=>1,"msg_data"=>$bodyfatpercentage);
			}
			else{
				$json_response = array("msg_code"=>2,"msg_data"=>"There is some error.Please try again...");
			}
		}
		else{
			$json_response = array("msg_code" => 0, "msg_data" => "Email is not valid");
		}
	}
	else{
		$json_response = array("msg_code" => 0, "msg_data" => "* Fields are required");
	}
	
	header('Content-Type: application/json');
	echo json_encode($json_response);
	exit();
	
}
 
 private function validateBodyFat($fname,$lname,$mobile,$weight,$waist,$hip){
	if($fname==""){ return false;}
	if($lname==""){ return false;}
	if($weight==""){ return false;}
	if($waist==""){ return false;}
	if($hip==""){ return false;}
	return true;
 }
 
 private function validateEmail($email){
	
	if($email!=""){	
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			return true;
		}
		else {
		return false;
		}
	}
	else{
		return true;
	}
}

	private function sendSMS($phone,$sms_text){
		$mantra_url = "http://myvaluefirst.com/smpp/sendsms?";
		$message = $sms_text;
		$feed=$this->mantraSend($phone,$message);
		return $feed;
	}
	
	private function mantraSend($phone,$msg){
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


	
	

	
}

?>