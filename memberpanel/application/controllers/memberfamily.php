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
    
	/********************** 1.MEMBER FAMILY LIST / ADD / EDIT **************************/
	
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
	
	
	
/************************** 2.MEMBER FAMILY BLOOD PRESSURE LIST / ADD / EDIT **************************/
	
	
	// Blood Pressure Report Listing
	/* @bloodpressurelist 
	 * @date 20-03-2017
	 * @BY Mithilesh
	 */ 
	 
	
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
	
	
	// Blood Pressure Report Data 
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
		$time = NULL;
		$amPm = NULL;
		
			$bpeditID = html_escape($this->input->post('bpID',TRUE));
			$relationshipId = trim($this->input->post('membr-relatinship'));
			$relation_text = trim($this->input->post('relation_text',TRUE));
			$memberfamilyId = trim($this->input->post('membr-family-name'));
			$systolic = html_escape($this->input->post('systolic',TRUE));
			$diastolic = html_escape($this->input->post('diastolic',TRUE));
			$pulserate = html_escape($this->input->post('pulserate',TRUE));
			$collectiondate = html_escape($this->input->post('collectiondate',TRUE));
			$datafrom = html_escape($this->input->post('dataFrom',TRUE));
			$collectiontime = html_escape($this->input->post('collectiontime',TRUE));
			
			if($relation_text=="Self"){
				if($collectiontime!=""){
				$array_time  = preg_split("/[\s,]+/", $collectiontime);
				$time = date('H:i:s',strtotime($array_time[0]));
				$amPm = $array_time[1];
				}
				else{
					$time = NULL;
					$amPm = NULL;
				}
			}
			else{
				if($collectiontime!=""){
					$time = date('H:i:s',strtotime($collectiontime));
				}
				else{
					$time = NULL;
				}
			}
			
			
			/*
			if($collectiontime!=""){
				$time = date('H:i:s',strtotime($collectiontime));
			}
			else{
				$time = NULL;
				//echo "Empty Col Time ".$collectiontime;
			}
			*/
			
			
			
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
						"blood_prs_date" => date('Y-m-d',strtotime($collectiondate)),
						"colection_time" => $time,
						"blood_prs_am_pm" => $amPm
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
						"collection_date" => date('Y-m-d',strtotime($collectiondate)),
						"collection_time" => $time
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
			$entry_from = $this->uri->segment(3);
			$result['entry_from'] = $entry_from;
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
			$time = NULL;
			$amPm = NULL;
			
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"]!="" ? $session["CUS_ID"]:0);
			$membershipno = $this->profilemodel->getMembershipNumber($customerId);
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
			$finYearId = $this->profilemodel->getFinancialYear();
			
			
			$relationshipId = trim($this->input->post('membr-relatinship'));
			$memberfamilyId = trim($this->input->post('membr-family-name'));
			$relation_text = trim($this->input->post('relation_text',TRUE));
			$systolic = html_escape($this->input->post('systolic',TRUE));
			$diastolic = html_escape($this->input->post('diastolic',TRUE));
			$pulserate = html_escape($this->input->post('pulserate',TRUE));
			$collectiondate = html_escape($this->input->post('collectiondate',TRUE));
			$collectiontime = html_escape($this->input->post('collectiontime',TRUE));
			
			if($relation_text=="Self"){
				if($collectiontime!=""){
				$array_time  = preg_split("/[\s,]+/", $collectiontime);
				$time = date('H:i:s',strtotime($array_time[0]));
				$amPm = $array_time[1];
				}
				else{
					$time = NULL;
					$amPm = NULL;
				}
			}
			else{
				if($collectiontime!=""){
					$time = date('H:i:s',strtotime($collectiontime));
				}
				else{
					$time = NULL;
				}
			}
			$validate = array(
				"select"=>array($relationshipId,$memberfamilyId),
				 "text" => array($systolic,$diastolic,$pulserate)
			);
			
			$validate_err = $this->validateData($validate);
			if($validate_err){
				
				
				// 18 = Entry done by members self... Self and this data will save gen_medical_ass table 
				if($relation_text=="Self"){
					$insertArray = array(
						"date_of_col" =>  date('Y-m-d',strtotime($collectiondate)),
						"member_id" => $customerId,
						"mmbership_no" => $membershipno,
						"branch_code" => $customerDtl['CUS_BRANCH'],
						"card_code" => $customerId,
						"blood_prs_date" =>  date('Y-m-d',strtotime($collectiondate)),
						"colection_time" => $time,
						"blood_prs_am_pm" => $amPm,
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
					"collection_date" => date('Y-m-d',strtotime($collectiondate)),
					"collection_time" => $time
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
	
	
/**************************3. MEMBER FAMILY BLOOD TEST LIST / ADD / EDIT **************************/
	
	public function bloodtestlist(){
		if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberfamily/blood-test-search';
            $header = "";
            $headercontent = "";
			$result['relationshipList'] = $this->memberfamilymodel->getRelationshipList();
			$result['bloodTestList'] = $this->memberfamilymodel->getBloodTestList();
		    createbody_method($result, $page, $header, $session, $headercontent);
         }
		 else{
             redirect('memberlogin', 'refresh');
         }
	}
	
	public function getBloodTestList(){
		if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			
			$fromDt = $this->input->post('fromDate');
			$toDt = $this->input->post('toDate');
			$relatinshipId = $this->input->post('membr-relatinship');
			$memFamilyId = $this->input->post('membr-family-name');
			$bldtestId = $this->input->post('blood-test-id');
			
			if($relatinshipId==18){
				$result['bloodtestReport'] = $this->memberfamilymodel->getMemberBloodTestRecord($fromDt,$toDt,$bldtestId,$customerId);
				
			}
			else{
				$result['bloodtestReport'] = $this->memberfamilymodel->getMemberFamilyBloodTestRecord($fromDt,$toDt,$relatinshipId,$memFamilyId,$bldtestId,$customerId);
			}
			
			$page = 'memberfamily/blood-test-list';
			$display = $this->load->view($page,$result);
			echo $display;
			
		}
		 else{
             redirect('memberlogin', 'refresh');
         }
	}
	
	
	public function addbloodtest(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'memberfamily/add-memberfamily-bloodtest';
            $header = "";
            $headercontent = "";
			$entry_from = $this->uri->segment(3);
			$result['entry_from'] = $entry_from;
			$result['relationshipList'] = $this->memberfamilymodel->getRelationshipList();
			$result['bloodTestList'] = $this->memberfamilymodel->getBloodTestList();
		    createbody_method($result, $page, $header, $session, $headercontent);
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function getBloodTestUnit(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$bloodtestid = $this->input->post('bloodtestid');
			$result['bloodtestunit'] = $this->memberfamilymodel->getBloodTestUnitByID($bloodtestid);
			$page = 'memberfamily/blood-test-unit-dropdown';
			$display = $this->load->view($page,$result);
			echo $display;
			/*echo "<pre>";
				print_r($result['bloodtestunit']);
			echo "</pre>";*/
		}
		else{
			redirect('memberlogin','refresh');
		}
	}
	
	public function saveBloodTest(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			$membershipno = $this->profilemodel->getMembershipNumber($customerId);
			$validity = $this->profilemodel->getValidityString($membershipno);
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
			$finYearId = $this->profilemodel->getFinancialYear(); // get financial year using current date
			
			$response = array();
			$insertArray = array();
			$relationshipId = $this->input->post('membr-relatinship');
			$memberfamilyId = $this->input->post('membr-family-name');
			$bloodtestid = $this->input->post('blood-test');
			$bldtestunit = $this->input->post('blood-test-unit');
			$reading = html_escape($this->input->post('reading',TRUE));
			$collection_date = html_escape($this->input->post('bld-test-col-date'),TRUE);
			
			$validate = array(
				"select"=>array($relationshipId,$bloodtestid,$bldtestunit),
				 "text" => array($reading,$collection_date)
			);
			
			$validate_err = $this->validateData($validate);
			if($validate_err){
				if($relationshipId==18){
					$insertArray = array(
					"date_of_entry" => date('Y-m-d',strtotime($collection_date)),
					"date_of_collection" => date('Y-m-d',strtotime($collection_date)),
					"member_id" => $customerId,
					"membership_no" => $membershipno,
					"test_id" => $bloodtestid,
					"reading" => $reading,
					"validity_string" => $validity["VALIDITY_STRING"],
					"branch_code" => $customerDtl['CUS_BRANCH'],
					"card_code" => $customerDtl['CUS_CARD'],
					"user_id" => 80, // entry from member self
					"fin_id" => $finYearId
					);
					
					//print_r($insertArray);
					$status = $this->insertBloodTest($insertArray ,'S'); //S = Self .. entry for member self
				}
				else{
					$insertArray = array(
					"collection_date" => date('Y-m-d',strtotime($collection_date)),
					"relationship_id" => $relationshipId,
					"member_family_id" => $memberfamilyId,
					"blood_test_id" => $bloodtestid,
					"unit_id" => $bldtestunit,
					"reading" => $reading
					);
					$status = $this->insertBloodTest($insertArray ,'F'); //F = Family ... Entry for members family
				}
				
				if($status){
					$response = array(
						"msg_code" => 1,
						"msg_data" => " Successfully saved"
					);
				}
				else{
					$response = array(
						"msg_code" => 2,
						"msg_data" => " There is something error"
					);
				}
			}
			else{
				//echo "Not validate";
				$response = array(
					"msg_code" => 0,
					"msg_data" => " All fields are required"
				);
			}
			
			header('Content-Type:application/json');
			echo json_encode($response);
			exit;
			
		}else{
				redirect('memberlogin','refresh');
		}
	}
	
	public function insertBloodTest($insertArray,$entryfor){
		if($entryfor=="S"){
			$insert = $this->insertupdatemodel->insertData('blood_test',$insertArray); //insertData('tablename','insertArray');
		}
		else{
			$insert = $this->insertupdatemodel->insertData('member_family_blood_test',$insertArray);
		}
		return $insert;
	}
	
	
	
	
	
	
	
/************************ COMMON METHODS *********************/
	
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