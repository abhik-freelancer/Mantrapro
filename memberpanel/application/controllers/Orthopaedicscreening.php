<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orthopaedicscreening
 *
 * @author pc1
 */
class Orthopaedicscreening  extends CI_Controller
{
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
             $page = 'healthandfitness/spinehealth';
            $header = "";
            $headercontent="";
            
            $result["cervical"] = $this->healthandfitnessmodel->getSpineCrvicalData($membershipno,$validity["VALIDITY_STRING"]);
            $result["dorsal"] = $this->healthandfitnessmodel->getSpineDorsalData($membershipno,$validity["VALIDITY_STRING"]);
            $result["lumber"] = $this->healthandfitnessmodel->lumberSpine($membershipno,$validity["VALIDITY_STRING"]);
            
            $result["rShld"] = $this->healthandfitnessmodel->getRightShoulderHealth($membershipno,$validity["VALIDITY_STRING"]);
            $result["lShld"] = $this->healthandfitnessmodel->getLeftShoulderHealth($membershipno,$validity["VALIDITY_STRING"]);
            $result["dysscapula"] = $this->healthandfitnessmodel->getScapularDyskinesia($membershipno,$validity["VALIDITY_STRING"]);
            $result["corestability"] = $this->healthandfitnessmodel->getCoreStability($membershipno,$validity["VALIDITY_STRING"]);
            
            $result["righthip"] = $this->healthandfitnessmodel->getRightHeapHealth($membershipno,$validity["VALIDITY_STRING"]);
            $result["lefthip"] = $this->healthandfitnessmodel->getLeftHeapHealth($membershipno,$validity["VALIDITY_STRING"]);
            
            $result["rightankle"] = $this->healthandfitnessmodel->getRightAnkle($membershipno,$validity["VALIDITY_STRING"]);
            $result["leftankle"] = $this->healthandfitnessmodel->getLeftAnkle($membershipno,$validity["VALIDITY_STRING"]);
            
            
            $result["rightknee"] = $this->healthandfitnessmodel->getRightKnee($membershipno,$validity["VALIDITY_STRING"]);
            $result["leftknee"] = $this->healthandfitnessmodel->getLeftKnee($membershipno,$validity["VALIDITY_STRING"]);
            
            
            
            $result["rightMuscles"] = $this->healthandfitnessmodel->getMusclesRight($membershipno,$validity["VALIDITY_STRING"]);
            $result["leftMuscles"] = $this->healthandfitnessmodel->getMusclesLeft($membershipno,$validity["VALIDITY_STRING"]);
            
            createbody_method($result, $page, $header, $session, $headercontent);
            
        }  else {
             redirect('memberlogin', 'refresh');
        }
    }
    
   
    
    
}
