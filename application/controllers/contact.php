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

	
}

?>