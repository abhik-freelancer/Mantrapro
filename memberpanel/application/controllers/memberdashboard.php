<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class memberdashboard extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('memberdashboardmodel','',TRUE);
   $this->load->library('session');	
 }
	
 public function index()
 {
        if ($this->session->userdata('user_data')) {
		$session=$this->session->userdata('user_data');
			/*echo("<pre>");
			print_r($this->session->all_userdata());
			echo("</pre>");

			echo($session['CUS_NAME']."tesr");*/

         $page = 'memberdashboard/memberdashboard';
		 $header = "";
		 $result="";
		
		 createbody_method($result,$page,$header,$session);
         //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
        }else{
           
          redirect('memberlogin', 'refresh');
            
        }
     
     
    
 }

	

}

?>