<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class nutrition extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
  //  $this->load->model('homemodel','',TRUE);
  }
	
 public function index()
 {
	$page = "nutrition/mantra-nutrition";
	$header = "";
	$session="";
	$result="";
	createbody_method($result,$page,$header,$session);
 }
 

	
	
}

?>