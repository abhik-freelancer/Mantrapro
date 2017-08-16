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
 
 /*
	@method InsertOutsideBodyFat
	@date 22-02-2017
	@by Mithilesh
*/
 
 public function calculateBodyFat(){
	$json_response = array();
	$outsidebodyfat = array();
	$entry_date = date("Y-m-d");
	$venue = trim($this->input->post('bodyfat-venue'));
	$firstname = trim($this->input->post('bodyfat-firstname'));
	$lastname = trim($this->input->post('bodyfat-lastname'));
	$gender = trim($this->input->post('bodyfat-gender'));
	$dob = trim($this->input->post('body-fat-dob'));
	$age = trim($this->input->post('body-fat-age'));
	$mobile = trim($this->input->post('bodyfat-mobile'));
	$email = trim($this->input->post('bodyfat-email'));
	$weight = trim($this->input->post('txt_weight'));
	$waist_navel = trim($this->input->post('txt_waist_navel'));
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
		$bodyfatpercentage = $this->bodycalculatormodel->getBodyFatPercentage($weight,$waist_navel,$waist,$hip,$gender,$age);	
		
		$fat_percent = $bodyfatpercentage['bodyFatPercentage'];
		$fat_remarks = $bodyfatpercentage['bodyFatRemarks'];
		$fat_mass = $bodyfatpercentage['bodyFatMass'];
		$lean_body_mass = $bodyfatpercentage['bodyLeanMass'];
		$waist_hp_ratio = $bodyfatpercentage['waisthipRatio'];
		$waist_circum_point = $bodyfatpercentage['waistcurcumferencevalue'];
		$waist_circum_rmk = $bodyfatpercentage['waistcurcumferenceassesment'];
		$waist_hp_point = $bodyfatpercentage['waistHipRatioValue'];
		$waist_hip_rmk = $bodyfatpercentage['waistHipRatioAssessment'];
		
		$sms_message = "Dear ".$firstname.", \nYour Fat % is ".$fat_percent." which is ".$fat_remarks.".\nYour waist hip ratio is ".$waist_hp_ratio." which is in ".$waist_hip_rmk." zone. \n ----- Team Mantra";

		
		$outsidebodyfat = array(
			"entry_date" => $entry_date,
			"first_name" => $firstname,
			"last_name" => $lastname,
			"gender" => $sex,
			"dob" => $dob,
			"mobile_no" => $mobile,
			"email" => $email,
			"location" => $venue, 
			"weight" => $weight,
			"waist_navel" => $waist_navel,
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
			//"is_sms_sent" => "N"
			"is_sms_sent" => $this->sendSMS($mobile,$sms_message)
			
		);
		$insertStatus = $this->InsertOutsideBodyFat($outsidebodyfat);
			if($insertStatus){
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

	public function InsertOutsideBodyFat($outsidebodyfat){
		$insertresult = $this->bodycalculatormodel->InsertIntoOutsideBodyFat($outsidebodyfat);	
		return $insertresult;
	}



/*
	@method InsertOutsideHarvardTest
	@date 23-02-2017
	@by Mithilesh
*/

	public function calculateHarvardTest(){
		$json_response = array();
		$outsideharvardtest = array();
		$entry_date = date("Y-m-d");
		$venue = trim($this->input->post('harvardtest-venue'));
		$firstname = trim($this->input->post('harvard-test-firstname'));
		$lastname = trim($this->input->post('harvard-test-lastname'));
		$gender = trim($this->input->post('harvard-test-gender'));
		$mobile = trim($this->input->post('harvard-test-mobile'));
		$email = trim($this->input->post('harvard-test-email'));
		$no_of_sec = trim($this->input->post('no_of_sec'));
		$pulserate = trim($this->input->post('pulse-rate'));
		
		$validation_err = $this->validateHarvardTest($firstname,$lastname,$mobile,$no_of_sec,$pulserate);
		if($validation_err){
			$email_validate = $this->validateEmail($email);
			if($email_validate){
				$harvardtestresult = $this->bodycalculatormodel->getHarvardTestResult($no_of_sec,$pulserate,$gender);
				$score = $harvardtestresult['harvardtestScore'];
				$rating = $harvardtestresult['harvardtestRating'];
				
				$message ="Dear ".$firstname.",\nYour Vo2 max is ".$score." which is in ".$rating." category. \n ----- Team Mantra";
				
				$outsideharvardtest = array(
					"entry_date" => $entry_date,
					"first_name" => $firstname,
					"last_name" => $lastname,
					"gender" => $gender,
					"mobile_no" => $mobile,
					"email" => $email,
					"location" => $venue,
					"duration" => $no_of_sec,
					"pulse_rate" => $pulserate,
					"score" => $score,
					"rating" => $rating,
					//"is_sms_sent" => "N"
					"is_sms_sent" => $this->sendSMS($mobile,$message)
				);
				
				$insertStatus = $this->insertHarvardTest($outsideharvardtest);	
				if($insertStatus){
					$json_response = array("msg_code" => 1, "msg_data" => $harvardtestresult);
				}
				else{
					$json_response = array("msg_code" => 2, "msg_data"=>"There is some error.Please try again...");
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
	
	public function insertHarvardTest($outsideharvardtest){
		$insertresult = $this->bodycalculatormodel->InsertOutsideHarvardTest($outsideharvardtest);	
		return $insertresult;
	}
	

	/*
	@method calculateSitAndReach
	@Date 24.02.2016
	@By Mithilesh
	*/
	
	public function calculateSitAndReach(){
		$json_response = array();
		$outsidesitandreach = array();
		$entry_date = date("Y-m-d");
		$venue = trim($this->input->post('sitandreach-venue'));
		$firstname = trim($this->input->post('sitandreach-firstname'));
		$lastname = trim($this->input->post('sitandreach-lastname'));
		$gender = trim($this->input->post('sitandreach-gender'));
		$dob = trim($this->input->post('sitandreach-dob'));
		$mobile = trim($this->input->post('sitandreach-mobile'));
		$email = trim($this->input->post('sitandreach-email'));
		$age = trim($this->input->post('sitandreach-age'));
		$distance = trim($this->input->post('sitandreach-distance'));
		$dateOfBirth = date('Y-m-d',strtotime($dob));
		
		$validation_err = $this->validateSitAndReach($firstname,$lastname,$mobile,$distance);
		if($validation_err){
			$email_validate = $this->validateEmail($email);
			if($email_validate){
				$sitandreachresult = $this->bodycalculatormodel->getSitAndReachTestResult($gender,$distance);
				$rating = $sitandreachresult['rating'];
				
				$message ="Dear ".$firstname.", \n Your Sit And Reach : ".$rating." \n ----- Team Mantra";
				$outsidesitandreach = array(
					"entry_date" => $entry_date,
					"first_name" => $firstname,
					"last_name" => $lastname,
					"gender" => $gender,
					"dob" => $dateOfBirth,
					"mobile_no" => $mobile,
					"email" => $email,
					"location" => $venue, 
					"age" => $age,
					"distance" => $distance,
					"rating" => $rating,
				//	"is_sms_sent" =>'N'
					"is_sms_sent" => $this->sendSMS($mobile,$message)
				);
				
				$inertStatus= $this->insertSitAndReach($outsidesitandreach);
				if($inertStatus){
					$json_response = array("msg_code" => 1, "msg_data"=>$sitandreachresult);
				}
				else{
					$json_response = array("msg_code" => 2, "msg_data"=>"There is some error.Please try again...");
				}
			}
			else{
				$json_response = array(
				"msg_code" => 0,
				"msg_data" => "Email is not valid"
				);
			}
		}
		else{
			$json_response = array(
				"msg_code" => 0,
				"msg_data" => "* Fields are required"
			);
		}
		
		
		header('Content-Type: application/json');
		echo json_encode($json_response);
		exit();
		
	}
	
	public function insertSitAndReach($outsidesitandreach){
		$insertresult = $this->bodycalculatormodel->InsertintoSitAndReach($outsidesitandreach);	
		return $insertresult;
	}
	
	
	/*
	@method calculatePushUpTest
	@Date 24.02.2016
	@By Mithilesh
	*/
	
	public function calculatePushUpTest(){
		$json_response = array();
		$outsidepushuptest = array();
		$entry_date = date("Y-m-d");
		$venue = trim($this->input->post('pushup-venue'));
		$firstname = trim($this->input->post('pushup-test-firstname'));
		$lastname = trim($this->input->post('pushup-test-lastname'));
		$gender = trim($this->input->post('pushup-test-gender'));
		$dob = trim($this->input->post('pushup-test-dob'));
		$mobile = trim($this->input->post('pushup-test-mobile'));
		$email = trim($this->input->post('pushup-test-email'));
		$age = trim($this->input->post('pushup-test-age'));
		$repetitions = trim($this->input->post('pushup-test-repetitions'));
		$dateOfBirth = date('Y-m-d',strtotime($dob));
		
		$validate_err = $this->validatePushUpTest($firstname,$lastname,$mobile,$repetitions);
		if($validate_err){
			$email_validate = $this->validateEmail($email);
			if($email_validate){
				$pushuptestresult = $this->bodycalculatormodel->getPushUpTestResult($gender,$age,$repetitions);
				$popavg = $pushuptestresult['popaverage'];
				$rating = $pushuptestresult['rating'];
				$score = $pushuptestresult['score'];
				$message ="Dear ".$firstname.", \nYour Push up repetation is ".$repetitions." which is in ".$rating." category. \n ----- Team Mantra";
				
				$outsidepushuptest = array(
					"entry_date" => $entry_date,
					"first_name" => $firstname,
					"last_name" => $lastname,
					"gender" => $gender,
					"dob" => date('Y-m-d',strtotime($dob)),
					"mobile_no" => $mobile,
					"email" => $email,
					"location" => $venue,
					"age" => $age,
					"repetation" => $repetitions,
					"population_avg" => $popavg,
					"score" => $score,
					"rating" => $rating,
				//	"is_sms_sent" => 'N'
					"is_sms_sent" => $this->sendSMS($mobile,$message)
				);
				
				$inertStatus= $this->insertOutsidePushUp($outsidepushuptest);
				if($inertStatus){
					$json_response = array("msg_code" => 1, "msg_data"=>$pushuptestresult);
				}
				else{
					$json_response = array("msg_code" => 2, "msg_data"=>"There is some error.Please try again...");
				}
				
			}
			else{
				$json_response = array(
				"msg_code" => 0,
				"msg_data" => "Email is not valid"
				);
			}
		}
		else{
			$json_response = array(
				"msg_code" => 0,
				"msg_data" => "* Fields are required"
			);
		}
		
		header('Content-Type: application/json');
		echo json_encode($json_response);
		exit();
	}
	
	
	public function insertOutsidePushUp($outsidepushuptest){
		$insertresult = $this->bodycalculatormodel->InsertintoOutsidePushUp($outsidepushuptest);	
		return $insertresult;
	}
	
	
	public function calculateSitUpTest(){
		$json_response = array();
		$outsidesituptest = array();
		$entry_date = date("Y-m-d"); 
		$venue = trim($this->input->post('pushup-venue'));
		$firstname = trim($this->input->post('situp-test-firstname'));
		$lastname = trim($this->input->post('situp-test-lastname'));
		$gender = trim($this->input->post('situp-test-gender'));
		$dob = trim($this->input->post('situp-test-dob'));
		$mobile = trim($this->input->post('situp-test-mobile'));
		$email = trim($this->input->post('situp-test-email'));
		$age = trim($this->input->post('situp-test-age'));
		$repetitions = trim($this->input->post('situp-test-repetitions'));
		$dateOfBirth = date('Y-m-d',strtotime($dob));
		
		$validate_err = $this->validateSitUpTest($firstname,$lastname,$mobile,$repetitions);
		if($validate_err){
			$email_validate = $this->validateEmail($email);
			if($email_validate){
				$situptestresult = $this->bodycalculatormodel->getSitUpTestResult($gender,$age,$repetitions);
				$popavg = $situptestresult['popaverage'];
				$rating = $situptestresult['rating'];
				$score = $situptestresult['score'];
				$message ="Dear ".$firstname.", \nYour Sit up repetation is ".$repetitions." which is in ".$rating." category. \n ----- Team Mantra";
				
				$outsidesituptest = array(
					"entry_date" => $entry_date,
					"first_name" => $firstname,
					"last_name" => $lastname,
					"gender" => $gender,
					"dob" => date('Y-m-d',strtotime($dob)),
					"mobile_no" => $mobile,
					"email" => $email,
					"location" => $venue,
					"age" => $age,
					"repetation" => $repetitions,
					"pop_avg" => $popavg,
					"score" => $score,
					"rating" => $rating,
				//	"is_sms_sent" => 'N'
					"is_sms_sent" => $this->sendSMS($mobile,$message)
				);
				
				$inertStatus= $this->insertOutsideSitUp($outsidesituptest);
				if($inertStatus){
					$json_response = array("msg_code" => 1, "msg_data"=>$situptestresult);
				}
				else{
					$json_response = array("msg_code" => 2, "msg_data"=>"There is some error.Please try again...");
				}
				
			}
			else{
				$json_response = array(
				"msg_code" => 0,
				"msg_data" => "Email is not valid"
				);
			}
		}
		else{
			$json_response = array(
				"msg_code" => 0,
				"msg_data" => "* Fields are required"
			);
		}
		
		header('Content-Type: application/json');
		echo json_encode($json_response);
		exit();
	}
	
	public function insertOutsideSitUp($outsidesituptest){
		$insertresult = $this->bodycalculatormodel->InsertintoOutsideSitUp($outsidesituptest);	
		return $insertresult;
	}
	

public function getAge(){
	$response = array();
	$age="";
	$dob = trim($this->input->post('dob'));
	if (preg_match("/\d{2}\-\d{2}-\d{4}/",$dob)){
	$birthDate = explode("-", $dob);
	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
		? ((date("Y") - $birthDate[2]) ) : (date("Y") - $birthDate[2]));
	
	$response = array("msg_code" => 1, "msg_data" => $age);
    }else{
        $response = array("msg_code" => 0, "msg_data" => "");
    }
	header('Content-Type: application/json');
	echo json_encode($response);
	exit();
}

 
 private function validateBodyFat($fname,$lname,$mobile,$weight,$waist,$hip){
	if($fname==""){ return false;}
	if($lname==""){ return false;}
	if($mobile==""){ return false;}
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

	private function validateHarvardTest($fname,$lname,$mobile,$sec,$pulserate){
		if($fname==""){ return false;}
		if($lname==""){ return false;}
		if($mobile==""){ return false;}
		if($sec==""){ return false;}
		if($pulserate==""){ return false;}
		return true;
	} 
	
	private function validateSitAndReach($fname,$lname,$mobile,$distance){
		if($fname==""){ return false;}
		if($lname==""){ return false;}
		if($mobile==""){ return false;}
		if($distance==""){ return false;}
		return true;
	}
	
	private function validatePushUpTest($fname,$lname,$mobile,$repetitions){
		if($fname==""){ return false;}
		if($lname==""){ return false;}
		if($mobile==""){ return false;}
		if($repetitions==""){ return false;}
		return true;
	}
	private function validateSitUpTest($fname,$lname,$mobile,$repetitions){
		if($fname==""){ return false;}
		if($lname==""){ return false;}
		if($mobile==""){ return false;}
		if($repetitions==""){ return false;}
		return true;
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