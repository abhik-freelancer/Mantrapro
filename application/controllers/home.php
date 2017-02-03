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


 public function getYourPass(){
	 $page = 'home/get-pass';
	 $header = "";
	 $result="";
	 createbody_method($result,$page,$header,$session);
 }
 

}

?>