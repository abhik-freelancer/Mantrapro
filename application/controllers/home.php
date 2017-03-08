<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('homemodel','',TRUE);
	 $this->load->library('recaptcha');
	
 }
	
 public function index()
 {
	$today_dt = date('Y-m-d');
    $page = 'home/home';
	$header = "";
	$session="";
	$result['activeTestimonial'] = $this->homemodel->getTestimonialForActiveCls();
	$result['withoutActiveItemTestimonial'] = $this->homemodel->getTestimonialForWithoutActiveCls();
	$result['events'] = $this->homemodel->getAllEvents($today_dt);
	$result['webBranch'] = $this->homemodel->getWebBranch();
	$result['latestOffer'] = $this->homemodel->getLatestOffer();
	/*
	echo "<pre>";
		print_r($result['latestOffer']);
	echo "</pre>"; */
	
		
	createbody_method($result,$page,$header,$session);
         //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
 }

 public function magic_mantra(){
	 $page = 'home/mantra-magic-mantra';
	 $header = "";
	 $session="";
	 $result = "";
	 createbody_method($result, $page, $header, $session);
 }
 
 public function health_asset_value(){
	$page = 'home/health-asset-value';
	$header = "";
	$session = "";
	$result = "";
	createbody_method($result, $page, $header, $session);
 }
 
 /*
  public function test(){
	$page = 'home/test';
	$header = "";
	$session = "";
	$result = "";
	createbody_method($result, $page, $header, $session);
 }
 */
 

 public function getpass(){
	
	 $page = 'home/get-pass';
	 $header = "";
	 $session="";
	 $result['widget']=$this->recaptcha->getWidget();
	 $result['script']=$this->recaptcha->getScriptTag();
	 $headercontent['gymlocation']= $this->homemodel->getWebBranch();
	 
	 createbody_method($result, $page, $header, $session, $headercontent);
 }
 
	public function InsertFreeGuestPass(){
		 $json_response = array();
		 
		 $entry_date = date("Y-m-d");
		 $firstname = trim($this->input->post("firstname"));
		 $last_name = trim($this->input->post("lastname"));
		 $email = trim($this->input->post("email"));
		 $mobile = trim($this->input->post("mobile"));
		 $gymlocation = trim($this->input->post("gymLocation"));
		 $pincode = trim($this->input->post("pincode"));
		 $address = trim($this->input->post("address"));
		 $comments = trim($this->input->post("comments"));
		
		 $recaptcha = $this->input->post('g-recaptcha-response');
		 $userip = $this->input->ip_address();
		
		if($this->validateFreeGuestPass($firstname,$last_name,$email,$mobile,$gymlocation,$pincode)){
			
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				
				//echo "Captcha success";
				
				$freeGuestPassArray = array(
				"date_of_entry" => $entry_date,
				"first_name" => $firstname,
				"last_name" => $last_name,
				"emailid" => $email,
				"contactno" => $mobile,
				"gym_location" => $gymlocation,
				"address" => $address,
				"pincode" => $pincode,
				"comment" => $comments,
				"is_called" => 'N'
				
				);
				//print_r($freeGuestPassArray);
				//echo "<pre>";
				//exit;
				$insertData = $this->homemodel->InsertIntoFreeGuestPass($freeGuestPassArray);
				if($insertData){
					$json_response = array("msg_code" => 1, "msg_data" => "You have successfully applied.");
				}
				else{
					$json_response = array("msg_code" => 2, "msg_data" => "There is something wrong.Please try again...");
				}
			}
			else{
				//echo "Captcha Error";
				$json_response = array("msg_code" => 10, "msg_data" => "Please tick that you are not a robot");
			}
			
		}
		else{
            $json_response = array("msg_code" => 0, "msg_data" => "* Fields are mandatory.");
        }
		
	header('Content-Type: application/json');
    echo json_encode($json_response);
	exit();
	
	}
	
	private function validateFreeGuestPass($firstname,$last_name,$email,$mobile,$gymlocation,$pincode){
		
		if($firstname==""){
			return false;
		}
		if($last_name==""){
			return false;
		}
		if($mobile==""){
			return false;
		}
		if($gymlocation=="0"){
			return false;
		}
		if($pincode==""){
			return false;
		}
		return true;
	}
	
	public function geteventdetail(){
		$event_date = $this->input->post('event_date');
		$result['event_date'] = date('Y-m-d',strtotime($event_date));
		$result['event_detail'] = $this->homemodel->getEventDetails($event_date);
		$display = $this->load->view('home/event-details',$result);
		echo $display ;
		
		
	}
	
	//@ InsertMayIHelp 
	// By Mithilesh on 08.02.2017
	
	public function InsertMayIHelp(){
		$json_response = array();
		$entry_date = date("Y-m-d");
		$name = trim($this->input->post('name'));
		$email = trim($this->input->post('email'));
		$mobileno = trim($this->input->post('mobileno'));
		$branch = trim($this->input->post('branch'));
		$address = trim($this->input->post('address'));
		$pincode = trim($this->input->post('pincode'));
		$interestarea = trim($this->input->post('interestarea'));
		$message = trim($this->input->post('message'));
		
		$error_msg = $this->validateMayIHelp($name,$mobileno,$branch,$pincode,$interestarea,$message);
		if($error_msg==""){
			if($email!=""){
			$error_msg = $this->validateEmail($email);
			}
			else{
			$error_msg="";
			}
		}
		
		
		
		
		//echo "Email Valid :".$valid_email_err;
		if($error_msg=="" ){
			$insertMayIHelpArray = array(
				"name" => $name ,
				"mobile_no" => $mobileno ,
				"branch_cd" => $branch ,
				"date_of_entry" => $entry_date ,
				"emailid" => $email ,
				"address" => $address ,
				"pincode" => $pincode ,
				"comments" => $message ,
				"help_category" => $interestarea ,
				"is_called" => 'N' 
			);
			
			$insertData = $this->homemodel->InsertIntoMayIHelp($insertMayIHelpArray);
			if($insertData){
				$json_response = array("msg_code" => 1, "msg_data" => "Thank you,we will get back to you soon.");
			}
			else{
				$json_response = array("msg_code" => 2, "msg_data" => "There is something wrong.Please try again...");
			}
			
		}
		else{
			$json_response = array("msg_code" => 0, "msg_data" => $error_msg);
		}
		
		
		header('Content-Type: application/json');
		echo json_encode($json_response);
		exit();
	}
	
	//@ serverside validation for may i help you 
	// By Mithilesh on 08.02.2017
	private function validateMayIHelp($name,$mobileno,$branch,$pincode,$interestarea,$message){
		$error = "";
		if($name==""){
			$error = "First name is required *name";
			return $error;
		}
		
		if($mobileno==""){
			$error = "Mobile no is required *mobileno";
			return $error;
		}
		elseif(!preg_match('/^\d{10}$/',$mobileno)) 
		{
			$error = "Mobile no is not valid *mobileno";
			return $error;
		}
		
	    elseif($branch=="0"){
			$error = "Branch is required *branch";
			return $error;
		}
		elseif($pincode==""){
			$error = "Pincode is required *pincode";
			return $error;
		}
		elseif(!preg_match('/^\d{6}$/',$pincode)) 
		{
			$error = "Pincode is not valid *pincode";
			return $error;
		}
		elseif($interestarea==""){
			$error = "Select area of interest";
			return $error;
		}
		elseif($interestarea=="Others"){
			if($message==""){
				$error = "Please write your message *message";
				return $error;
			}
			else{
			  $error = "";
			  return $error;
			}
		}
		else{
			 $error = "";
			  return $error;
		}
		
	
		
		
	}
	
	private function validateEmail($email){
		$error = "";
		if($email!=""){
			if(!preg_match('/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/',$email)){
				$error = "Email is not valid *email";
				return $error;
			}
			else{
				$error = "";
				return $error;
			}
		}
	}
	
	
}

?>