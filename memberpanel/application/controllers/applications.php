<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of applications
 * @date 10/03/2017
 * @author Mithilesh
 */
class applications  extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
		$this->load->model('applicationsmodel','',TRUE);
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
            $page = 'applications/member-application-extension';
            $header = "";
            $headercontent="";
			$result['membershipno']=$membershipno;
			
            createbody_method($result, $page, $header, $session, $headercontent); 
            
         }else{
              redirect('memberlogin', 'refresh');
         }
    }
	
	public function applicationExtension(){
		 if($this->session->userdata('user_data')){
			$response = array();
			$applicationExtArray = array();
			 
            $session = $this->session->userdata('user_data');
			$customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
			
			$membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $latestvalidity = $this->profilemodel->getValidityString($membershipno);
            $fromdate = ($latestvalidity["fromdate"]==""?"":$latestvalidity["fromdate"]);
            $todate = ($latestvalidity["validupto"]==""?"":$latestvalidity["validupto"]);
            
			$customerDtl = $this->profilemodel->getCustomerByCustId($customerId);
	        $isAppliedMember = $this->applicationsmodel->getIsMemberAlreadyApplied($membershipno,$latestvalidity['VALIDITY_STRING']);
			$appextCardLimitDys = $this->applicationsmodel->getApplicationExtLimitDys($customerDtl['CUS_CARD']);
			$request_frm_dt = trim($this->input->post('request-from-date'));
			$request_to_dt = trim($this->input->post('request-to-date'));
			
			if($isAppliedMember=="N"){
				$validate_err = $this->validateApplicationExt($request_frm_dt,$request_to_dt);
				if($validate_err){
					$validate_date = $this->validateDate($request_frm_dt,$request_to_dt);
					if($validate_date){
					$validateNoOfDays = $this->validateNoOfAppliedDays($request_frm_dt,$request_to_dt,$appextCardLimitDys);
						if($validateNoOfDays){
							$appliedDays = $this->calculateAppliedDays($request_frm_dt,$request_to_dt);
							
							if($_FILES['supporting-document']['error']==4){
								$applicationExtArray = array(
										"memberid" => $customerId,
										"membershipno" => $membershipno,
										"validity_string" => $latestvalidity['VALIDITY_STRING'],
										"branch" => $customerDtl['CUS_BRANCH'],
										"card" => $customerDtl['CUS_CARD'],
										"date_of_application" => date('Y-m-d'),
										"request_from" => date('Y-m-d',strtotime($request_frm_dt)),
										"request_to" => date('Y-m-d',strtotime($request_to_dt)),
										"days_applied" => $appliedDays,
										"docum_path_dir" => "",
										"grant_dys" => 0,
										"is_active" => 'Y'
									);
								$insertStatus = $this->inserMemberApplicationExt($applicationExtArray);
								if($insertStatus){
										$response = array(
										"msg_code" => 1,
										"msg_data" => "You have successfully applied for extension days"
										);
									}
									else{
										$response = array(
										"msg_code" => 2,
										"msg_data" => "There is some problem.Please try again later..."
										);
									}
								
							}
							else{
								//$dir = APPPATH . 'assets/application_extension/';
								$dir = $_SERVER['DOCUMENT_ROOT'].'/images/appext';
								$config = array(
									'upload_path' => $dir,
									'allowed_types' => 'docx|doc|pdf|jpg|png',
									'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
									'max_filename' => '255',
									'encrypt_name' => TRUE
								   );
								$this->load->library('upload', $config);
								$upload_file = $this->upload->do_upload('supporting-document');
								
								if($upload_file){
									$supporting_doc = $this->upload->data();
									$file_name=$supporting_doc['file_name'];
									$applicationExtArray = array(
										"memberid" => $customerId,
										"membershipno" => $membershipno,
										"validity_string" => $latestvalidity['VALIDITY_STRING'],
										"branch" => $customerDtl['CUS_BRANCH'],
										"card" => $customerDtl['CUS_CARD'],
										"date_of_application" => date('Y-m-d'),
										"request_from" => date('Y-m-d',strtotime($request_frm_dt)),
										"request_to" => date('Y-m-d',strtotime($request_to_dt)),
										"days_applied" => $appliedDays,
										"docum_path_dir" => $file_name,
										"grant_dys" => 0,
										"is_active" => 'Y'
									);
									$insertStatus = $this->inserMemberApplicationExt($applicationExtArray);
										if($insertStatus){
										$response = array(
										"msg_code" => 1,
										"msg_data" => "You have successfully applied for extension days"
										);
										}
										else{
											$response = array(
											"msg_code" => 2,
											"msg_data" => "There is some problem.Please try again later..."
											);
										}
									
									
									
									}
									else{
										$response = array(
										"msg_code" => 0,
										"msg_data" => "Only .docx, .doc, .pdf , .jpg, .png files are supported and File size must be less than 2MB"
										);
									}
								
								}
						}
						else{
							$error = "Extension applied days atleast must be equal to or greater than ".$appextCardLimitDys ." days";
							$response = array(
								"msg_code" => 0,
								 "msg_data" => $error
							);
						}
					}
					else{
						
						$response = array(
							"msg_code" => 0,
							"msg_data" => 'Request To (Date) must be greater than Request From (Date)'
						);
					} 
				}
				else{
					$response = array(
						"msg_code" => 0,
						"msg_data" => "* Fields are requierd"
					);
				}
			}
			else{
				$response = array(
					"msg_code" => 0,
					"msg_data" => "You have already applied for extension days."
				);
			}
			
			
		//  Output	Msg
		$this->output->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit();
			
       
		 
		}
		else{
              redirect('memberlogin', 'refresh');
         }
	}
	
	
	public function inserMemberApplicationExt($applicationExtArray){
		$insert = $this->applicationsmodel->insertMemberApplicationExt($applicationExtArray);
		return $insert;
	}
	
	
	private function calculateAppliedDays($requestFrom,$requestTo){
		$noOfDays = round(abs(strtotime($requestFrom)-strtotime($requestTo))/86400 + 1 );
		return $noOfDays;
	}
	
	private function validateNoOfAppliedDays($requestFrom,$requestTo,$cardLimitExtDays){
		$noOfDays = round(abs(strtotime($requestFrom)-strtotime($requestTo))/86400 + 1 );
		if($noOfDays<$cardLimitExtDays){
			return false ; //Must be applied atleast $cardLimitExtDays
		}
		return true;
	}
	
	public function validateDate($requestFrom,$requestTo){
		$fromDate = date('Y-m-d',strtotime($requestFrom));
		$toDate = date('Y-m-d',strtotime($requestTo));
		if($fromDate>$toDate){
			return false;
		}
		return true;
	}
	
	private function validateApplicationExt($requestFrom,$requestTo){
		if($requestFrom==""){return false;}
		if($requestTo==""){return false;}
		return true;
	}
    
    
}
