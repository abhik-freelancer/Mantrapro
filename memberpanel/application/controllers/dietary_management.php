<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dietary_management
 *
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
	
	public function adddiet(){
		if ($this->session->userdata('user_data')) {
			$session = $this->session->userdata('user_data');
			$page = 'dietary_managment/dietary-managment-add';
            $header = "";
            $headercontent="";
			$result = "";
           
            createbody_method($result, $page, $header, $session, $headercontent);
			
		}
		else{
			redirect('memberlogin', 'refresh');
		}
	}
	
	public function addMemberDiet(){
		if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			$membershipno = $this->profilemodel->getMembershipNumber($customerId);
          
			$insertArray = array();
			$response = array();
			
			$finYearId = $this->profilemodel->getFinancialYear(); // getting financial year using current date
			
			$meal1 = trim($this->input->post('meal1'));
			$meal2 = trim($this->input->post('meal2'));
			$meal3 = trim($this->input->post('meal3'));
			$meal4 = trim($this->input->post('meal4'));
			$meal5 = trim($this->input->post('meal5'));
			$meal6 = trim($this->input->post('meal6'));
			$meal7 = trim($this->input->post('meal7'));
			$meal8 = trim($this->input->post('meal8'));
			$carbo = trim($this->input->post('carbohydrate'));
			$protein = trim($this->input->post('protein'));
			$weight = trim($this->input->post('weight'));
				
			
			$validate_err = $this->validateDietOption($meal1,$meal2,$meal3,$meal4,$meal5,$meal6,$meal7,$meal8,$carbo,$protein,$weight);
			if($validate_err){
				echo "All Validate";
				
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
				"carbs" => $carbo,
				"protein" => $protein,
				"weight" => $weight,
				"fin_id" => $finYearId,
				"user_id" => 80 // user id 80 = memberself  ---->  i.e entry done by member 
				);
				
				$insertStatus = $this->insertMemberDiet($insertArray);
				if($insertStatus){
					$response = array(
						"msg_code" => 1,
						"msg_data" => "You have successfully submited.",
					);
				}
			}
			else{
				echo "Required all";
				$response = array(
					"msg_code" => 0,
					"msg_data" => " All options and fields are requied",
				);
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
		else{
			redirect('memberlogin','refrfesh');
		}
	}
	
	public function insertMemberDiet($insertArr){
		$insert = $this->dietarymanagmentmodel->insertIntoDietManagment($insertArr);
		return $insert;
	}
    
	
	private function validateDietOption($meal1,$meal2,$meal3,$meal4,$meal5,$meal6,$meal7,$meal8,$carbo,$protein,$weight){
		if($meal1==""){return false ; }
		if($meal2==""){return false ; }
		if($meal3==""){return false ; }
		if($meal4==""){return false ; }
		if($meal5==""){return false ; }
		if($meal6==""){return false ; }
		if($meal7==""){return false ; }
		if($meal8==""){return false ; }
		if($carbo==""){return false ; }
		if($protein==""){return false ; }
		if($weight==""){return false ; }
		return true;
		}
   
    
   
}
