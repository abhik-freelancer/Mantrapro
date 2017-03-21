<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of memberfamily
 * @date 16-03-2017
 * @author Mithilesh
 */
class memberfamily extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
		$this->load->model('bloodgroupmodel', '', TRUE);
        $this->load->model('memberfamilymodel', '', TRUE);
        $this->load->library('session');
    }
    
    public function index(){
         if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberfamily/member-family-list';
            $header = "";
            $headercontent="";
			
           $result['memberFamilyList'] = $this->memberfamilymodel->getMemberFamilyList($customerId);
		   
		   createbody_method($result, $page, $header, $session, $headercontent);
         }
		 else{
             redirect('memberlogin', 'refresh');
         }
    }
	
	/* @addmemberfamily
	*  @date 17-03-2017
	*  @by Mithilesh
	*/
	public function addeditmemberfamily(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"]!="" ? $session["CUS_ID"]:0);
			
			$result['relationshipList'] = $this->memberfamilymodel->getRelationshipList();
			$result['bloodgroup'] = $this->bloodgroupmodel->getBloodGroup();
			
			if($this->uri->segment(3) === FALSE){
				$memberFamilyID = 0;
			}
			else{ $memberFamilyID = $this->uri->segment(3); }
			
			if($memberFamilyID!=0){
				$result['mode'] = "Edit";
				$result['memberFamilyID'] = $memberFamilyID;
				$result['memberFamilyData'] = $this->memberfamilymodel->getMemberFamilyDataById($memberFamilyID);
				//print_r($result['memberFamilyData']);
				
			}
			else{
				$result['mode'] = "Add";
				$result['memberFamilyID'] = $memberFamilyID;
			}
			
			$page = 'memberfamily/member-family-addedit';
			$header = "";
            $headercontent="";
			
			//print_r($result['relationshipList']);
			createbody_method($result, $page, $header, $session, $headercontent);
		}else{
			redirect('memberlogin','refresh');
		}
	}
	
	
	/* @saveMemberFamily // use for add edit purpose
	*  @date 17.03.2017
	*  @By Mithilesh
	*/
	
	public function saveMemberFamily(){
		if($this->session->userdata('user_data')){
			$response = array();
			$insertArray = array(); // For insertData Array
			$updateArray = array(); // For updateData Array
			
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"]!="" ? $session["CUS_ID"]:0);
			
			$mode = trim($this->input->post('mode'));
			$memberfamilyID = trim($this->input->post('memberFamilyID'));
			
			$relationship = trim($this->input->post('relationship'));
			$name = trim($this->input->post('memfamilyname'));
			$gender = trim($this->input->post('memfamilygender'));
			$age = trim($this->input->post('memfamilyage'));
			$bloodgroup = trim($this->input->post('memfamilybldgrp'));
			
			$validate_err = $this->validateMemberFamily($relationship,$name,$age,$bloodgroup);
			if($validate_err){
				// Update ----------------------------------------
				if($mode=="Edit" AND $memberfamilyID!=0){
					$updateArray = array(
						"relationship_id" => $relationship,
						"name" => $name,
						"gender" => $gender,
						"age" => $age,
						"blood_group_id" => $bloodgroup
					);
					
					$status = $this->updateMemberFamily($updateArray , $memberfamilyID);
					if($status){
						$response = array(
							"msg_code" => 1,
							"msg_data" => " Successfully updated"
						);
					}
					else{
						$response = array(
							"msg_code" => 2,
							"msg_data" => " There is some problem. Please try again later..."
						);
					}
				}
				else{
					// Insert ----------------------------------
					$insertArray = array(
						"relationship_id" => $relationship,
						"name" => $name,
						"gender" => $gender,
						"age" => $age,
						"blood_group_id" => $bloodgroup,
						"membership_id" => $customerId
					);
					
					$status = $this->insertMemberFamily($insertArray);
					if($status){
						$response = array(
							"msg_code" => 1,
							"msg_data" => " Successfully saved"
						);
					}
					else{
						$response = array(
							"msg_code" => 2,
							"msg_data" => " There is some problem. Please try again later..."
						);
					}
				
				}
			}
			else{
				$response = array(
					"msg_code" => 0,
					"msg_data" => " * Fields are requierd"
				);
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
			
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function insertMemberFamily($insertArray){
		$insert = $this->memberfamilymodel->insertintoMemberFamily($insertArray);
		return $insert;
	}
	
	public function updateMemberFamily($updateArray , $memberfamilyID){
		$update = $this->memberfamilymodel->updateMemberFamily($updateArray , $memberfamilyID);
		return $update;
	}
	
	
	// Blood Pressure Report search
	
	public function bloodpressurelist(){
		 if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberfamily/bloodpressure-test-search';
            $header = "";
            $headercontent="";
			$result['relationshipList'] = $this->memberfamilymodel->getRelationshipList();
		   createbody_method($result, $page, $header, $session, $headercontent);
         }
		 else{
             redirect('memberlogin', 'refresh');
         }
	}
	
	
	// Blood Pressure Report
	
	public function getBloodTestReport(){
		if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            
			$fromDt = $this->input->post('fromDate');
			$toDt = $this->input->post('toDate');
			$relatinshipId = $this->input->post('membr-relatinship');
			$memFamilyId = $this->input->post('membr-family-name');
			// $relatinshipId = 18 = self ... data from gen_medical_ass table
			if($relatinshipId==18){
				$result['bpReport'] = $this->memberfamilymodel->getMemberBloodPressureData($fromDt,$toDt,$customerId);
			}
			else{
				$result['bpReport'] = $this->memberfamilymodel->getBloodPresureData($fromDt,$toDt,$relatinshipId,$memFamilyId,$customerId);
			}
			
			$page = 'memberfamily/bloodpressure-test-list';
			$display = $this->load->view($page,$result);
			echo $display;
			
         }
		 else{
             redirect('memberlogin', 'refresh');
         }
	}
	
	
	// Edit Blood Pressure Data
	public function editbloodpressure(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
            if($this->uri->segment(3)===FALSE){
			$bpEditId = 0;
			}else{
				$bpEditId = $this->uri->segment(3);
				$datafrom = $this->uri->segment(4);
				$result['relationshipList'] = $this->memberfamilymodel->getRelationshipList();
				$result['editBloodPressData'] = $this->memberfamilymodel->getBloodPressureDataById($bpEditId,$datafrom);
			
				$page = 'memberfamily/edit-memberfamily-bloodpressure';
				$header = "";
				$headercontent="";
				createbody_method($result, $page, $header, $session, $headercontent);
				
			}
			
		}else{
			redirect('memberlogin', 'refresh');
		}
		
	}
	
	public function updateBloodPresure(){
		if($this->session->userdata('user_data')){
		$session = $this->session->userdata('user_data');
		$response = array();
		$updateArray = array();
		
			$bpeditID = html_escape($this->input->post('bpID',TRUE));
			$relationshipId = trim($this->input->post('membr-relatinship'));
			$memberfamilyId = trim($this->input->post('membr-family-name'));
			$systolic = html_escape($this->input->post('systolic',TRUE));
			$diastolic = html_escape($this->input->post('diastolic',TRUE));
			$pulserate = html_escape($this->input->post('pulserate',TRUE));
			$collectiondate = html_escape($this->input->post('collectiondate',TRUE));
			
			$datafrom = html_escape($this->input->post('dataFrom',TRUE));
			
			$validate = array(
				"select"=>array($relationshipId,$memberfamilyId),
				 "text" => array($systolic,$diastolic,$pulserate)
			);
			$validate_err = $this->validateData($validate);
			if($validate_err){
				if($datafrom=="S"){
					// S= Self ---- update member self blood pressure data
					$updateArray = array(
						"systolic_msr" => $systolic,
						"diastolic_msr" => $diastolic,
						"pulse_msr" => $pulserate,
						"date_of_col" => date('Y-m-d',strtotime($collectiondate)),
						"blood_prs_date" => date('Y-m-d',strtotime($collectiondate))
					);
				}
				else{
					// F=Family  ---- update memberfamily blood pressure data
					$updateArray = array(
						"relationship_id" => $relationshipId,
						"member_family_id" => $memberfamilyId,
						"systolic" => $systolic,
						"diastolic" => $diastolic,
						"pulse_rate" => $pulserate,
						"collection_date" => date('Y-m-d',strtotime($collectiondate))
					);
				}
				
			/*	echo "<pre>";
				print_r($updateArray);
				echo "</pre>";
				*/
				$status = $this->updateBloodPressureData($updateArray,$bpeditID ,$datafrom);
				if($status){
					$response = array(
					"msg_code" => 1,
					"msg_data" => "Updated Successfully"
					);
				}else{
					$response = array(
					"msg_code" => 2,
					"msg_data" => "There is some problem. Please try again later..."
					);
				}
			}
			else{
				$response = array(
					"msg_code" => 0,
					"msg_data" => "All Fields are required"
				);
			}
			
		header('Content-Type:application/json');
		echo json_encode($response);
		exit;
		
		}else{
			redirect('memberlogin', 'refresh');
		}
	}
	
	public function updateBloodPressureData($updateArray,$bpeditID ,$datafrom){
		if($datafrom=="S"){
			$update = $this->memberfamilymodel->updateGenMedAssmnt($updateArray,$bpeditID); // Update member self data
		}
		else{
			$update = $this->memberfamilymodel->updateMemFamilyBldPressure($updateArray,$bpeditID); // Update member self data
		}
		return $update;
	}
	
	
	
	// Add View Blood Pressure For Member Family
	
	public function addbloodpressure(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"]!="" ? $session["CUS_ID"]:0);
			$result['relationshipList'] = $this->memberfamilymodel->getRelationshipList();
			$page = 'memberfamily/add-memberfamily-bloodpressure';
			
			$header="";
			$headercontent = "";
			createbody_method($result, $page, $header, $session, $headercontent);
		}
		else{
			redirect('memberlogin' , 'refresh');
		}
	}
	
	public function getMemberFamily(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"]!="" ? $session["CUS_ID"]:0);
			$relationid = trim($this->input->post('relationid'));
			$result['memberFamilyName'] = $this->memberfamilymodel->getMemberFamilyByRelation($customerId,$relationid);
			$page = 'memberfamily/member-family-name-view';
			$display = $this->load->view($page,$result);
			echo $display;
		}
		else{
			redirect('memberlogin' , 'refresh');
		}
	}
	
	public function saveBloodPressure(){
		if($this->session->userdata('user_data')){
			$response = array();
			$insertArray = array();
			
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"]!="" ? $session["CUS_ID"]:0);
			$membershipno = $this->profilemodel->getMembershipNumber($customerId);
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
			$finYearId = $this->profilemodel->getFinancialYear();
			
			
			$relationshipId = trim($this->input->post('membr-relatinship'));
			$memberfamilyId = trim($this->input->post('membr-family-name'));
			$systolic = html_escape($this->input->post('systolic',TRUE));
			$diastolic = html_escape($this->input->post('diastolic',TRUE));
			$pulserate = html_escape($this->input->post('pulserate',TRUE));
			$collectiondate = html_escape($this->input->post('collectiondate',TRUE));
			$validate = array(
				"select"=>array($relationshipId,$memberfamilyId),
				 "text" => array($systolic,$diastolic,$pulserate)
			);
			
			$validate_err = $this->validateData($validate);
			if($validate_err){
				
				
				// 18 = Entry done by members self... Self and this data will save gen_medical_ass table 
				if($relationshipId==18){
					$insertArray = array(
						"date_of_col" =>  date('Y-m-d',strtotime($collectiondate)),
						"member_id" => $customerId,
						"mmbership_no" => $membershipno,
						"branch_code" => $customerDtl['CUS_BRANCH'],
						"card_code" => $customerId,
						"blood_prs_date" =>  date('Y-m-d',strtotime($collectiondate)),
						"blood_prs_time" => NULL,
						"blood_prs_am_pm" => NULL,
						"systolic_msr" => $systolic,
						"diastolic_msr" => $diastolic,
						"pulse_msr" => $pulserate,
						"prs_remarj" => "",
						"user_id" => 80, // 80 = member user_id *** Memberself : entry done by member
						"fin_id" => $finYearId
					);
					
					$status = $this->insertBloodPressure($insertArray,'SELF');
				}
				else{
					$insertArray = array(
					"relationship_id" => $relationshipId,
					"member_family_id" => $memberfamilyId,
					"systolic" => $systolic,
					"diastolic" => $diastolic,
					"pulse_rate" => $pulserate,
					"collection_date" => date('Y-m-d',strtotime($collectiondate))
					);
					$status = $this->insertBloodPressure($insertArray,'FAMILY');
				}
				/*
				echo "<pre>";
					print_r($insertArray);
				echo "</pre>";
				*/
				if($status){
					$response = array(
						"msg_code" => 1,
						"msg_data" => " Saved successfully",
					);
				}
				else{
					$response = array(
						"msg_code" => 0,
						"msg_data" => "There is some problem.Please try again later..."
					);
				}
			}
			else{
				//echo "Not Validate";
				$response = array(
					"msg_code" => 0,
					"msg_data" => "All Fields are required"
				);
			}
			
			header('Content-Type:application/json');
			echo json_encode($response);
			exit;
			
		}
		else{
			redirect('memberlogin', 'refresh');
		}
		
	}
	
	public function insertBloodPressure($insertArray,$condition){
		if($condition=="SELF"){
			$insert = $this->memberfamilymodel->insertIntoGeneralMedicalAssmnt($insertArray);
		}
		if($condition=="FAMILY"){
			$insert = $this->memberfamilymodel->insertIntoMemberFamilyBPTest($insertArray);
		}
		
		return $insert;
	}
	
	public function validateData($validatedata){
		$select_err= $this->validateSelectField($validatedata['select']);
		$text_err = $this->validateTextField($validatedata['text']);
		if($select_err AND $text_err){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
	}
	
	private function validateSelectField($select_field){
	//	print_r($select_field);
	$total = sizeof($select_field);
		for ($x = 0; $x < $total; $x++) {
			$value = $select_field[$x];
			if($value=="0"){
				return FALSE;
			}
		} 
		return TRUE;
	}
	private function validateTextField($text_field){
	//	print_r($text_field);
	$total = sizeof($text_field);
		for ($x = 0; $x < $total; $x++) {
			$textvalue = $text_field[$x];
			if($textvalue==""){
				return FALSE;
			}
		} 
		return TRUE;
	}
	
	
	
	private function validateMemberFamily($relationship,$name,$age,$bloodgrp){
		if($relationship=="0"){return false;}
		if($name==""){return false;}
		if($age==""){return false;}
		if($bloodgrp=="0"){return false;}
		return true;
	}

}
?>