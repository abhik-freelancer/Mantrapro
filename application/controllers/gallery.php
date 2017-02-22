<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class gallery extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('gallerymodel','',TRUE);
  }
	
 public function index()
 {
	$page = "";
	$header = "";
	$session="";
	$result="";
	createbody_method($result,$page,$header,$session);
 }
 
 public function video_gallery(){
	$page = 'gallery/mantra-video-gallery';
	$header="";
	$session="";
	$result['videogallery']=$this->gallerymodel->getAllVideo();
	createbody_method($result,$page,$header,$session);
}

	
	

	
}

?>