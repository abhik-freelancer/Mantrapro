<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class memberlogin extends CI_Controller {
 public function __construct()
 {
   parent::__construct();
    $this->load->model('memberloginmodel','',TRUE);
    $this->load->library('session');
	
 }
	
 public function index()
 {
     $page = 'memberlogin/login';
     $this->load->view($page);
 }
 
 
 /**
  * @method login
  * @date:12/01/2017
  * @chek member panel login by mobile and dob
  * */
 public function login(){
 $mobileNumber = $this->input->post("mobile");
 $memberPassword = $this->input->post("pwd");
 $json_response=array();
 if($mobileNumber!="" && $memberPassword!=""){
     $result=  $this->memberloginmodel->checkMember($mobileNumber,$memberPassword);
     if($result["CUS_ID"]!=""){
         $this->setSessionData($result);
         $json_response = array("msg_code"=>1,"msg_data"=>"");
     }else{
          $json_response = array("msg_code"=>3,"msg_data"=>"Incorrect mobilenumber or password");
     }
 
 }else{
	   $json_response = array("msg_code"=>0,"msg_data"=>"Mobile number or password cannot be blank");
	
           
           
 }
    header('Content-Type: application/json');
    echo json_encode( $json_response );
 }
 
 private function setSessionData($result=NULL){
   
   if($result)
   { 
        $this->session->set_userdata("user_data",$result);
   }
 }
 

	

}