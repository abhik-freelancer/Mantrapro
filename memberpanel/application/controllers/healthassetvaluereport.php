<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of healthassetvaluereport
 * @date 28/02/2017
 * @author Abhik Ghosh
 */
class healthassetvaluereport  extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
        $this->load->model('healthandfitnessmodel','',TRUE);
        $this->load->model('healthassetvaluemodel','',TRUE);
        $this->load->library('session');
    }
    public function index(){
         if($this->session->userdata('user_data')){
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipno);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
            
            $validityString = $fromdate." - ".$todate;
            $page = 'healthandfitness/havsearchform';
            $header = "";
            $headercontent="";
            $result["havdata"]=$this->healthassetvaluemodel->getLatestHAVdata($membershipno,$validityString);
            
            $result["bloodprs"]=$this->healthassetvaluemodel->getLatestHAVBloodPresure($membershipno,$validityString);
            
            $result["oxysatlevel"]=$this->healthassetvaluemodel->getLatestOxygenSaturationLevel($membershipno,$validityString);
            $result["strength"]=$this->healthassetvaluemodel->getLatestStrengthRmData($membershipno,$validityString);
            //getLatestVo2Max
            $result["Vo2Max"]=$this->healthassetvaluemodel->getLatestVo2Max($membershipno,$validityString);
            $result["situptest"]=$this->healthassetvaluemodel->getLatestSitupTest($membershipno,$validityString);
            //getLatestUpperBodyjoinmobility
            $result["pushup"]=$this->healthassetvaluemodel->getLatestPushUp($membershipno,$validityString);
            $result["sitandreach"]=$this->healthassetvaluemodel->getLatestSitAndReach($membershipno,$validityString); // Flexibility (Sit & Reach)
            $result["harvardtest"]=$this->healthassetvaluemodel->getLatestHarvardStepTest($membershipno,$validityString);
            $result["bodyjointmobility"]=$this->healthassetvaluemodel->getLatestUpperBodyjoinmobility($membershipno,$validityString);
            $result["lowerjointmobility"]=$this->healthassetvaluemodel->getLatestLowerBodyjoinmobility($membershipno,$validityString);
            $result["muscleflexibility"]=$this->healthassetvaluemodel->getMuscleOrthoFlex($membershipno,$validityString);
            //getBodycompoassmnt($membershipno,$validity)
            $result["bodycompassmnt"]=$this->healthassetvaluemodel->getBodycompoassmnt($membershipno,$validityString);
            //getWaistHipRatio
            $result["WaistHipRatio"]=$this->healthassetvaluemodel->getWaistHipRatio($membershipno,$validityString);
            $result["waistCircumfrence"]=$this->healthassetvaluemodel->getWaistHipRatio($membershipno,$validityString);
            
            $result["bodygirth"]=$this->healthassetvaluemodel->getGirthmsrmnt($membershipno,$validityString);
            
             $result["bloodtest"]=$this->healthassetvaluemodel->getBloodTest($membershipno,$validityString);


            
            createbody_method($result, $page, $header, $session, $headercontent); 
            
            
            
         }else{
              redirect('memberlogin', 'refresh');
         }
    }
    
    
}
