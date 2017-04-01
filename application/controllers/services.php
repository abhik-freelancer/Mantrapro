<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class services extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('homemodel','',TRUE);
    $this->load->model('servicemodel','',TRUE);
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
	$ratechart = $this->servicemodel->getBranchWiseRateChart($branch);
	header('Content-Type: application/json');
	echo json_encode($ratechart);
	exit();
}

public function getFacilty(){
	$page = 'services/mantra-package-facility';
	$header="";
	$session="";
	
	$cardID = $this->uri->segment(3);
	$branch = $this->uri->segment(4);
	$result['cardDtl'] = $this->servicemodel->getCardDetailById($cardID,$branch);
	
	// Complimentary Facility ----
	$result['complDtl'] =  $this->servicemodel->getComplFacilityDetailByBranch($cardID,$branch);
	// Part of Package Facility ----
	$result['packagePart'] =  $this->servicemodel->getPackagePartFacilityDetailByBranch($cardID,$branch);

	createbody_method($result,$page,$header,$session);
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