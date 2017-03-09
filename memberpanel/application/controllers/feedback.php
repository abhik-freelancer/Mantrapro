<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feedback
 * @date 09/03/2017
 * @author Abhik Ghosh
 */
class feedback  extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
        $this->load->model('feedbackmodel', '', TRUE);
        $this->load->library('session');
    }
    public function index(){
         if($this->session->userdata('user_data')){
			
            $session = $this->session->userdata('user_data');
			/*
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipno);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
            $validityString = $fromdate." - ".$todate;*/
			
			
            $page = 'feedback/add-feedback';
            $header = "";
            $headercontent="";
			$result = "";
			createbody_method($result, $page, $header, $session, $headercontent); 
		}else{
              redirect('memberlogin', 'refresh');
         }
    }
	
	public function submitFeedback(){
		if($this->session->userdata('user_data')){
			$insertFeedback = array();
			$response = array();
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipno);
            
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
            $validityString = $fromdate." - ".$todate;
			
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
			$cusbranch = $customerDtl['CUS_BRANCH'];
			
			$rate_qlty_diet = "";
			$exercise_chart = "";
			$new_exercise_chrt = "";
			$exercise_reviewed = "";
			$rate_exercise_chart = "";
			$rate_qlty_phn_call = "";
			
			$feedbackdate = date("Y-m-d");
			$cleanliness_gym_floor = trim($this->input->post('feedbackq1'));
			$cleanliness_wash_room = trim($this->input->post('feedbackq2'));
			$cleanliness_rate = trim($this->input->post('feedbackq3'));
			$rate_conduct_trainer = trim($this->input->post('feedbackq4'));
			$rate_receptionist_sprtng = trim($this->input->post('feedbackq5'));
			$rate_temprature = trim($this->input->post('feedbackq6'));
			$rate_equipments = trim($this->input->post('feedbackq7'));
			$rate_ambience = trim($this->input->post('feedbackq8'));
			$diet_counselling = trim($this->input->post('feedbackq9'));
			if($diet_counselling!="Yes"){
				$rate_qlty_diet = "None";
			}
			else{
				$rate_qlty_diet = trim($this->input->post('feedbackq10'));
			}
			
			$exercise_chart = trim($this->input->post('feedbackq11'));
			
			if($exercise_chart!="Yes"){
				$new_exercise_chrt = "None";
				$exercise_reviewed = "None";
				$rate_exercise_chart = "None";
			}
			else{
				$new_exercise_chrt = trim($this->input->post('feedbackq12a'));
				$exercise_reviewed = trim($this->input->post('feedbackq12b'));
				$rate_exercise_chart = trim($this->input->post('feedbackq12c'));
			}
			
			$complimentary_facilities = trim($this->input->post('feedbackq13'));
			$prefered_time_wrk = trim($this->input->post('feedbackq14'));
			$received_call = trim($this->input->post('feedbackq15'));
			if($received_call!="Yes"){
				$rate_qlty_phn_call = "None";
			}
			else{
				$rate_qlty_phn_call = trim($this->input->post('feedbackq15a'));
			}
			
			$aware_discount_prgrm = trim($this->input->post('feedbackq16'));
			$ortho_screening = trim($this->input->post('feedbackq17'));
			$full_bdy_measurmnt = trim($this->input->post('feedbackq18'));
			$soft_hav_copy = trim($this->input->post('feedbackq19'));
			$hard_hav_copy = trim($this->input->post('feedbackq20'));
			$comment = trim($this->input->post('additionalcomment'));
			
			
			$insertFeedback =array(
				"member_id" => $customerId,
				"membership_no" => $membershipno,
				"validity_string" => $validityString,
				"feedback_date" => $feedbackdate,
				"branch" => $cusbranch,
				"cleanliness_gym_floor" => $cleanliness_gym_floor,
				"cleanliness_wash_room" => $cleanliness_wash_room,
				"cleanliness_rate" => $cleanliness_rate,
				"rate_conduct_trainer" => $rate_conduct_trainer,
				"rate_receptionist_sprtng" => $rate_receptionist_sprtng,
				"rate_temprature" => $rate_temprature,
				"rate_equipments" => $rate_equipments,
				"rate_ambience" => $rate_ambience,
				"diet_counselling" => $diet_counselling,
				"rate_qlty_diet" => $rate_qlty_diet,
				"exercise_chart" => $exercise_chart,
				"new_exercise_chrt" => $new_exercise_chrt,
				"exercise_reviewed" => $exercise_reviewed,
				"rate_exercise_chart" => $rate_exercise_chart,
				"complimentary_facilities" => $complimentary_facilities,
				"prefered_time_wrk" => $prefered_time_wrk,
				"received_call" => $received_call,
				"rate_qlty_phn_call" => $rate_qlty_phn_call,
				"aware_discount_prgrm" => $aware_discount_prgrm,
				"ortho_screening" => $ortho_screening,
				"full_bdy_measurmnt" => $full_bdy_measurmnt,
				"soft_hav_copy" => $soft_hav_copy,
				"hard_hav_copy" => $hard_hav_copy,
				"additional_remarks" => $comment
				
			);
			
			$insert = $this->feedbackmodel->insertintoFeedback($insertFeedback);
			if($insert){
				$response = array(
					"status_code" => 1,
					"status_msg" => "Thank you for your valuable feedback.."
				);
			}
			else{
				$response = array(
					"status_code" => 2,
					"status_msg" => "There is something error.Please try again later..."
				);
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
            
		}else{
              redirect('memberlogin', 'refresh');
         }
	}
    
    
}
