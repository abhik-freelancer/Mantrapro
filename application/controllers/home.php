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
	 $result['widget']=$this->recaptcha->getWidget();
	 $result['script']=$this->recaptcha->getScriptTag();
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
		
		 $recaptcha = $this->input->post('g-recaptcha-response');
		 $userip = $this->input->ip_address();
		
		if($this->validateFreeGuestPass($firstname,$last_name,$email,$mobile,$gymlocation,$pincode)){
			
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
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
				print_r($freeGuestPassArray);
				echo "<pre>";
				exit;
				$insertData = $this->homemodel->InsertIntoFreeGuestPass($freeGuestPassArray);
				if($insertData){
					$json_response = array("msg_code" => 1, "msg_data" => "You have successfully applied.");
				}
				else{
					$json_response = array("msg_code" => 2, "msg_data" => "There is something wrong.Please try again...");
				}
			}
			else{
				$json_response = array("msg_code" => 10, "msg_data" => "Please tick that you are not a robot");
			}
			
		/*	$freeGuestPassArray = array(
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
				
			$insertData = $this->homemodel->InsertIntoFreeGuestPass($freeGuestPassArray);
				if($insertData){
					$json_response = array("msg_code" => 1, "msg_data" => "You have successfully applied.");
				}
				else{
					$json_response = array("msg_code" => 2, "msg_data" => "There is something wrong.Please try again...");
				} */
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
}

?>