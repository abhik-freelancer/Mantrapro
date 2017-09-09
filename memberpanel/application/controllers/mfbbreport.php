<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mfbbreport
 * @date 17/08/2017
 * @author Mithilesh Routh
 */
class mfbbreport extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
        $this->load->model('mfbbreportmodel', '', TRUE);
        $this->load->library('session');
    }
    public function index(){
         if($this->session->userdata('user_data')){
			
            $session = $this->session->userdata('user_data');
			$custDtl = $this->profilemodel->getCustomerByCustId($session['CUS_ID']);
			$result['memberDtl'] = $custDtl;
			$cus_id = $session['CUS_ID'];
			
			$doj = $custDtl['REGISTRATION_DT'];
			$date = date('d-m-Y');
			
			$page = 'mfbbreport/mfbbreport-list';
            $header = "";
            $headercontent="";
			
			
			
			$arrFitDate=array();
			$arrFitDateUnq=array();
			$arrMeal1=array();
			$arrMeal2=array();
			$arrMeal3=array();
			$arrMeal4=array();
			$arrMeal5=array();
			$arrMeal6=array();
			$arrMeal7=array();
			$arrMeal8=array();


			
			$result["rowBlood"] = $this->mfbbreportmodel->getBloodTestsForMember($cus_id);
			$result["rowBodyComp"]= $this->mfbbreportmodel->getBodyComposition($cus_id);
			$result["rowGenMed"]= $this->mfbbreportmodel->getGeneralMedical($cus_id);
			$result["rowGenFit"]= $this->mfbbreportmodel->getGeneralFitness($cus_id);
			$result['bloodTest'] = $this->mfbbreportmodel->getBloodTestData($cus_id);
			
			
			
			/* echo "<pre>";
				print_r($result["bloodTest"]);
			echo "</pre>";  */
			
			/*
			foreach($result["rowGenFit"] as $row_fit)
			{
				array_push($arrFitDate,$row_fit['date_of_collection']);
			}

			$arrFitDateUnq['arrFitDateUnq'] = array_unique($arrFitDate);
			*/

			$rowDiet1=$this->mfbbreportmodel->getDietCount($cus_id,'meal1');
			$rowDiet2=$this->mfbbreportmodel->getDietCount($cus_id,'meal2');
			$rowDiet3=$this->mfbbreportmodel->getDietCount($cus_id,'meal3');
			$rowDiet4=$this->mfbbreportmodel->getDietCount($cus_id,'meal4');
			$rowDiet5=$this->mfbbreportmodel->getDietCount($cus_id,'meal5');
			$rowDiet6=$this->mfbbreportmodel->getDietCount($cus_id,'meal6');
			$rowDiet7=$this->mfbbreportmodel->getDietCount($cus_id,'meal7');
			$rowDiet8=$this->mfbbreportmodel->getDietCount($cus_id,'meal8');

			
			
			$rowDiet1No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal1');
			$rowDiet2No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal2');
			$rowDiet3No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal3');
			$rowDiet4No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal4');
			$rowDiet5No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal5');
			$rowDiet6No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal6');
			$rowDiet7No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal7');
			$rowDiet8No=$this->mfbbreportmodel->getDietCountNo($cus_id,'meal8');

			$dietCnt=0;
			$dietCntNo=0;

			$dietCnt = $rowDiet1+$rowDiet2+$rowDiet3+$rowDiet4+$rowDiet5+$rowDiet6+$rowDiet7+$rowDiet8;
			$dietCntNo = $rowDiet1No+$rowDiet2No+$rowDiet3No+$rowDiet4No+$rowDiet5No+$rowDiet6No+$rowDiet7No+$rowDiet8No;

			$dietStr = "";
			if($dietCnt>0 or $dietCntNo>0)
			{
				$dietStr=$dietCnt . " no. of meals taken" ."  ( ".$doj ." to ". $date . ")";
			}
			
			 $result['dietStr'] = $dietStr;
			
			createbody_method($result, $page, $header, $session, $headercontent); 
		}else{
              redirect('memberlogin', 'refresh');
         }
    }
	

    
}
