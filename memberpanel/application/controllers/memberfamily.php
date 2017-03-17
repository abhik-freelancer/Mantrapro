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
	
	private function validateMemberFamily($relationship,$name,$age,$bloodgrp){
		if($relationship=="0"){return false;}
		if($name==""){return false;}
		if($age==""){return false;}
		if($bloodgrp=="0"){return false;}
		return true;
	}

}
?>