<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of healthandfitness
 * @author Abhik Ghosh
 * @email aveekweb@gmail.com
 */
class healthandfitness extends CI_Controller{
    //put your code here
     public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
        $this->load->model('healthandfitnessmodel','',TRUE);
        $this->load->library('session');
    }
    public function endurancetest(){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
            
            $page = 'healthandfitness/endurancetest';
            $header = "";
            $headercontent="";
            $result["Vo2Max"] = $this->healthandfitnessmodel->getVo2MaxResult($membershipno,$validity["VALIDITY_STRING"]);
            $result["pushuptest"] = $this->healthandfitnessmodel->getPushUpTest($membershipno,$validity["VALIDITY_STRING"]);
            $result["situptest"] = $this->healthandfitnessmodel->getSitUpTest($membershipno,$validity["VALIDITY_STRING"]);
            
            createbody_method($result, $page, $header, $session, $headercontent);
        }else{
             redirect('memberlogin', 'refresh');
        }
    }
    public function strengthtest(){
        if($this->session->userdata('user_data')){
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
             $page = 'healthandfitness/strengthtest';
            $header = "";
            $headercontent="";
            $result["Onerepmaxtest"] = $this->healthandfitnessmodel->Onerepeationmaxtest($membershipno,$validity["VALIDITY_STRING"]);
            
            
            createbody_method($result, $page, $header, $session, $headercontent);
            
        }  else {
             redirect('memberlogin', 'refresh');
        }
    }
    
    public function flexibilitytest(){
        if($this->session->userdata('user_data')){
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
             $page = 'healthandfitness/flexibilitytest';
            $header = "";
            $headercontent="";
            $result["sitandreachtest"] = $this->healthandfitnessmodel->getSitandReachTest($membershipno,$validity["VALIDITY_STRING"]);
            
            
            createbody_method($result, $page, $header, $session, $headercontent);
            
        }  else {
             redirect('memberlogin', 'refresh');
        }
    }
    
    public function generalmedicalassesment(){
        if($this->session->userdata('user_data')){
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
             $page = 'healthandfitness/generalmedicalassesment';
            $header = "";
            $headercontent="";
            $result["medicalassesment"] = $this->healthandfitnessmodel->getGeneralMedicalassesment($membershipno);
            
            
            createbody_method($result, $page, $header, $session, $headercontent);
            
        }  else {
             redirect('memberlogin', 'refresh');
        }
    }
    
    public function bloodtest(){
         if($this->session->userdata('user_data')){
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
            $page = 'healthandfitness/bloodtest';
            $header = "";
            $headercontent="";
            $result["bloodtest"] = $this->healthandfitnessmodel->getBloodTest($membershipno,$validity["VALIDITY_STRING"]);
            
            
            createbody_method($result, $page, $header, $session, $headercontent);
            
        }  else {
             redirect('memberlogin', 'refresh');
        }
    }
    
    
}
