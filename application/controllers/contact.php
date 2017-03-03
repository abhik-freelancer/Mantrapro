<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class contact extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('homemodel','',TRUE);
    $this->load->model('contactmodel','',TRUE);
	 $this->load->library('recaptcha');
	
 }
	
 public function index()
 {
	$today_dt = date('Y-m-d');
    $page = 'contact/contact-us';
	$header = "";
	$session="";
	$result['contactBranch'] = $this->homemodel->getWebBranch();
	$result['widget']=$this->recaptcha->getWidget();
	$result['script']=$this->recaptcha->getScriptTag();
	createbody_method($result,$page,$header,$session);
 }
 
 public function getContactDetaitl(){
	$branchId = $this->input->post("branch");
	$header="";
	$session="";
	$results['contactDesc']= $this->contactmodel->getContactDetailByBranch($branchId);
	//$page = 'contact/contact-detail';
	$display = $this->load->view('contact/contact-detail',$results);
	echo $display;
}

public function contactusEnquiry(){
	$json_status = array(); 
	$contact_enquiry = array();
	$enq_date = date("Y-m-d");
	$name = trim($this->input->post('enq-name'));
	$email = trim($this->input->post('enq-email'));
	$mobile = trim($this->input->post('enq-mobile'));
	$message = trim($this->input->post('enq-message'));
	$recaptcha = $this->input->post('g-recaptcha-response');
	
	$error_validation = $this->validateContactUsEnq($name,$email,$mobile,$message);
	if($error_validation){
		$email_validate = $this->validateEmail($email);
		if($email_validate){
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				
				$contact_enquiry = array(
					"name" => $name,
					"email" => $email,
					"mobileno" => $mobile,
					"message" => $message,
					"enquiry_date" => $enq_date,
					"enquiry_from" => 'CU', //CU = CONTACT US /** enquiry from contact us page 
					"is_called" => 'N'
				);
				
				$insert = $this->insertContactEnquiry($contact_enquiry);
				if($insert){
					$json_status = array(
					"status_code" => 1,
					"status_msg" => "Thank you. We will get back to you soon ..."
					);
				}
				else{
					$json_status = array(
					"status_code" => 2,
					"status_msg" => "There is some problem.Please try again ..."
					);
				}
				
			}
			else{
				//echo "Captcha Error";
				$json_status = array(
				"status_code" => 0,
				"status_msg" => "Please tick that you are not a robot"
				);
			}
			
		}
		else{
			//echo "Email is not valid";
			$json_status = array(
				"status_code" => 0,
				"status_msg" => "Email is not valid"
			);
		}
	}
	else{
		$json_status = array(
			"status_code" => 0,
			"status_msg" => " All fields are required"
		);
	}
	
	header('Content-Type: application/json');
	echo json_encode($json_status);
	exit();
	
}

	public function insertContactEnquiry($insertArray){
		$insertresult = $this->contactmodel->InsertintoWebEnquiry($insertArray);	
		return $insertresult;
	}


	private function validateContactUsEnq($name,$email,$mobile,$message){
	if($name==""){ return false;}
	if($email==""){ return false;}
	if($mobile==""){ return false;}
	if($message==""){ return false;}
		return true;
	}
	
	private function validateEmail($email){
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				return true;
			}
			else {
			return false;
			}
	}
	
}

?>