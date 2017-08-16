<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dietary_management
 *@date 16-03-2017
 * @author Mithilesh
 */
class dietary_management extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('dietarymanagmentmodel', '', TRUE);
        $this->load->model('profilemodel', '', TRUE);
        $this->load->library('session');
    }
    
    public function index(){
         if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'dietary_managment/dietary-managment-list';
            $header = "";
            $headercontent="";
			
            $result['dietarymanagmentlist'] = $this->dietarymanagmentmodel->getDietarymanagmentList($customerId);
            createbody_method($result, $page, $header, $session, $headercontent);
         }else{
             redirect('memberlogin', 'refresh');
         }
    }
	
	public function addEditDiet(){
		if ($this->session->userdata('user_data')) {
			$session = $this->session->userdata('user_data');
			
			if ($this->uri->segment(3) === FALSE) { $dietarymanagmentID = 0; }	
			else{ $dietarymanagmentID = $this->uri->segment(3); }
			
			if($dietarymanagmentID!=0){
				$result['mode'] = "Edit";
				$result['dietarymanagmentID'] = $dietarymanagmentID;
				$result['dietaryManagmentData'] = $this->dietarymanagmentmodel->getDietryManagmentDataById($dietarymanagmentID);
				//print_r($result['dietaryManagmentData']);
			}
			else{
				$result['dietarymanagmentID'] = $dietarymanagmentID;
				$result['mode'] = "Add";
			}
			$headercontent = "";
			$header = "";
			$page = 'dietary_managment/dietary-managment-add';
          
			createbody_method($result, $page, $header, $session, $headercontent);
		}
		else{
			redirect('memberlogin', 'refresh');
		}
	}
	
	/*
	// @ addMemberDiet method used for add and edit purpose
	// @ date 16.03.2017 
	// @ By Mithilesh	
	*/
	public function addMemberDiet(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			$membershipno = $this->profilemodel->getMembershipNumber($customerId);
          
			$insertArray = array();
			$updateArray = array();
			$response = array();
			
			
			$finYearId = $this->profilemodel->getFinancialYear(); // getting financial year using current date
			
			$mode = trim($this->input->post('mode'));
			$dietmanagmentEditID = trim($this->input->post('dietManagmentEditId'));
			$meal1 = trim($this->input->post('meal1'));
			$meal2 = trim($this->input->post('meal2'));
			$meal3 = trim($this->input->post('meal3'));
			$meal4 = trim($this->input->post('meal4'));
			$meal5 = trim($this->input->post('meal5'));
			$meal6 = trim($this->input->post('meal6'));
			$meal7 = trim($this->input->post('meal7'));
			$meal8 = trim($this->input->post('meal8'));
			$weight = trim($this->input->post('weight'));
				
			
			$validate_err = $this->validateDietOption($meal1,$meal2,$meal3,$meal4,$meal5,$meal6,$meal7,$meal8,$weight);
			if($validate_err){
				if($mode=="Edit" AND $dietmanagmentEditID!=0){
					$updateArray = array(
						"meal1" => $meal1,
						"meal2" => $meal2,
						"meal3" => $meal3,
						"meal4" => $meal4,
						"meal5" => $meal5,
						"meal6" => $meal6,
						"meal7" => $meal7,
						"meal8" => $meal8,
						"weight" => $weight
					);
					$status = $this->updateMemberDiet($updateArray,$dietmanagmentEditID);
				
					if($status){
						$response = array(
							"msg_code" => 1,
							"msg_data" => "Successfully Updated.",
						);
					}
					else{
						$response = array(
							"msg_code" => 2,
							"msg_data" => "There is some problem.Please try agian...",
						);
					}
				
				}
				else{
					$insertArray = array(
						"member_id" => $customerId,
						"membership_no" => $membershipno,
						"date_of_entry" => date("Y-m-d"),
						"date_of_collection" => date("Y-m-d"),
						"meal1" => $meal1,
						"meal2" => $meal2,
						"meal3" => $meal3,
						"meal4" => $meal4,
						"meal5" => $meal5,
						"meal6" => $meal6,
						"meal7" => $meal7,
						"meal8" => $meal8,
						"weight" => $weight,
						"fin_id" => $finYearId,
						"user_id" => 80 // user id 80 = memberself  ---->  i.e entry done by member 
					);
					
					$status = $this->insertMemberDiet($insertArray);
					if($status){
						$response = array(
							"msg_code" => 1,
							"msg_data" => "Your diet has been submited successfully.",
						);
					}
					else{
						$response = array(
							"msg_code" => 2,
							"msg_data" => "There is some problem.Please try agian...",
						);
					}
				}
				
				
			}
			else{
				$response = array(
					"msg_code" => 0,
					"msg_data" => " All options and fields are requied",
				);
			}
			header("Access-Control-Allow-Origin: *");
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
		else{
			redirect('memberlogin','refrfesh');
		}
	}
	
	// Insert Member Diet
	public function insertMemberDiet($insertArr){
		$insert = $this->dietarymanagmentmodel->insertIntoDietManagment($insertArr);
		return $insert;
	}
    
	// Update Member Diet
	public function updateMemberDiet($updArry,$dietmanagmentEditID){
		$update = $this->dietarymanagmentmodel->updateMemberDietarymanagment($updArry,$dietmanagmentEditID);
		return $update;
	}
	
	// Get Diet Chart
	
	public function diet_chart(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			$membershipno = $this->profilemodel->getMembershipNumber($customerId);
			$result['dietchartList'] = $this->dietarymanagmentmodel->getDietChartList($membershipno);
			
			$page = 'dietary_managment/member-diet-chart-list';
			$header="";
			$headercontent = "";
			
			/*
			echo "<pre>";
			print_r($results['dietchart']);
			echo "</pre>"; */
			
			createbody_method($result, $page, $header, $session, $headercontent);
		}
		else{
			redirect('memberlogin','refrfesh');
		}
	}
	
	public function getDietChart(){
		$dietchartID = trim($this->input->post('memberid'));
		$result['dietchartView'] = $this->dietarymanagmentmodel->getDietChart($dietchartID);
		$page = 'dietary_managment/member-diet-chart-view';
		$display = $this->load->view($page,$result);
	}
	
	
	
	
	
	private function validateDietOption($meal1,$meal2,$meal3,$meal4,$meal5,$meal6,$meal7,$meal8,$weight){
		if($meal1==""){return false ; }
		if($meal2==""){return false ; }
		if($meal3==""){return false ; }
		if($meal4==""){return false ; }
		if($meal5==""){return false ; }
		if($meal6==""){return false ; }
		if($meal7==""){return false ; }
		if($meal8==""){return false ; }
		if($weight==""){return false ; }
		return true;
		}
   
    
   
}
