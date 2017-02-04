<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('homemodel','',TRUE);
	
 }
	
 public function index()
 {
     $page = 'home/home';
	 $header = "";
	 $result=array("content"=>"At Mantra we believe that each individual’sDonec at tincidunt quam. Etiam sem lectus, tincidunt lobortis nunc at, efficitur malesuada purus. Cras massa mi, sodales et enim vitae, sagittis consequat nulla. Fusce facilisis ante et vestibulum pulvinar… ",
                        "category"=>"page");
	 $session="";	
	 createbody_method($result,$page,$header,$session);
         //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
 }


 public function getpass(){
	 $page = 'home/get-pass';
	 $header = "";
	 $session="";
	 $result="";
	 $headercontent['gymlocation']= $this->homemodel->getGymLocation();
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
		 $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		 $userip = $this->input->ip_address();
		
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdUVRQUAAAAAFsPA6Kf9LSMnZvL3AKMfcHiiNfY &response=" . $recaptchaResponse . "&remoteip=" . $userip ); 
		 if ($response . 'success' == false) {
			 return FALSE;
			 } 
		else {
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
				"is_called" => 'N',
				);
				$insert = $this->homemodel->InsertIntoFreeGuestPass($freeGuestPassArray);
		 } 
		
	
		
		
		
		
	}
}

?>