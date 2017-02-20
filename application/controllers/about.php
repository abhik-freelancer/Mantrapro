<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class about extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('homemodel','',TRUE);
  }
	
 public function index()
 {
	$page = "";
	$header = "";
	$session="";
	$result="";
//	$result['contactBranch'] = $this->homemodel->getWebBranch();
	createbody_method($result,$page,$header,$session);
 }
 
 public function about_us(){
	$page = 'about/about-us';
	$header="";
	$session="";
	$result="";
	//$page = 'contact/contact-detail';
	createbody_method($result,$page,$header,$session);
	
}

	public function mission_and_vision(){
		$page = "about/mission-and-vission";
		$header="";
		$session = "";
		$result = "";
		createbody_method($result,$page,$header,$session);
	}
	
	public function life_style_health_club(){
		$page = "about/life-style-health-club";
		$header="";
		$session = "";
		$result = "";
		createbody_method($result,$page,$header,$session);
	}
	
	public function mantra_testimonial(){
		$page = "about/mantra-testimonial";
		$header="";
		$session = "";
		$result['testimonials'] = $this->homemodel->getAllTestimonial();
		createbody_method($result,$page,$header,$session);
	}
	
	

	
}

?>