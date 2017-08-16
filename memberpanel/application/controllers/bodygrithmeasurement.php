<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of anthropometry
 *
 * @author pc1
 */
class bodygrithmeasurement extends CI_Controller{
    //put your code here
    
     public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
        $this->load->model('healthandfitnessmodel','',TRUE);
        $this->load->library('session');
    }
     public function index(){
        
         if($this->session->userdata('user_data')){
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
            $page = 'healthandfitness/body-grith-measurement';
            $header = "";
            $headercontent="";
			
			
			/******************RESULT FOR BODY GRITH MEASUREMENT****************/
			
			 $result["bodygrithMeasurement"]=$this->healthandfitnessmodel->getBodyGrith($membershipno,$validity["VALIDITY_STRING"]);
			 
		
			 
			createbody_method($result, $page, $header, $session, $headercontent); 
         }else{
              redirect('memberlogin', 'refresh');
         }
     }
}
