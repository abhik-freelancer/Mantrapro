<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portfolio
 *
 * @author Abhik Ghosh
 */
class portfolio extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('bloodgroupmodel', '', TRUE);
        $this->load->model('profilemodel', '', TRUE);
        $this->load->library('session');
    }
    
    public function index(){
         if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            $page = 'portfolio/addportfolio';
            $header = "";
            $headercontent="";
            $result = $this->profilemodel->getCustomerByCustId($customerId);
            createbody_method($result, $page, $header, $session, $headercontent);
         }else{
             redirect('memberlogin', 'refresh');
         }
    }
    
    public function viewfolio(){
        if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
            
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
            
            $page = 'portfolio/viewfolio';
            $header = "";
            $headercontent="";
			
            $result["bodycomp"] = $this->profilemodel->getPortfolioView($customerId,$validity["VALIDITY_STRING"]);
			
		
           
            createbody_method($result, $page, $header, $session, $headercontent);
        }else{
             redirect('memberlogin', 'refresh');
         }
    }
    
    public function getBodyFatPercentage(){
         if ($this->session->userdata('user_data')) {
                $response= array();
                $session = $this->session->userdata('user_data');
                $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
                $weight = $this->input->post("weight");
				$waist_navel = $this->input->post("waist_navel");
                $waist = $this->input->post("waist");
                $hip= $this->input->post("hip");
                $customer = $this->profilemodel->getCustomerByCustId($customerId);
                $sex = $customer["CUS_SEX"];
                
                $healthresponse = $this->profilemodel->getBodyFatPercentage($weight,$waist_navel,$waist,$hip,$sex);
                
                $response=array("msg_code"=>1,"msg_data"=>$healthresponse);
             
         }else{
              $response = array("msg_code" => 500, "msg_data" => "0.00");
         }
        
        $this->output->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit();
    }
    
    public function updateMemberBodyComposition(){
         $response=array();
         if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = $session["CUS_ID"];
            $dateofentry = $this->input->post("dateofentry");
            $weight = $this->input->post("weight");
            $waist_navel = $this->input->post("waist-navel");
            $waist = $this->input->post("waist");
            $hip = $this->input->post("hip");
            $bodyfatPercentage = $this->input->post("bodyfatPercentage");
            $bodyfatmass = $this->input->post("bodyfatmass");
            $bodyleanmass = $this->input->post("bodyleanmass");
            $waistcircumferencevalue = $this->input->post("waistcircumferencevalue");
            $waistcircumferenceasses = $this->input->post("waistcircumferenceasses");
            $waisthipratiovalue = $this->input->post("waisthipratiovalue");
            $waisthipratioasses = $this->input->post("waisthipratioasses");
            
            $membershipno = $this->profilemodel->getMembershipNumber($customerId);
            $validity = $this->profilemodel->getValidityString($membershipno);
            $card = $this->profilemodel->getCustomerByCustId($customerId);
            
            //$_FILES['imgInp']['error'] !== 4 empty check;
            
            if($this->validate($dateofentry, $weight, $waist, $hip)){
                
                        if($_FILES['imgInp']['error']!=4){
                            
                             $dir = APPPATH . 'assets/images/portfolioimages/';
                             $config = array(
                                    'upload_path' => $dir,
                                    'allowed_types' => 'gif|jpg|png',
                                    //allowed max file size. 0 means unlimited file size
                                    'max_size' => '2048KB',
                                    //max file name size
                                    'max_filename' => '255',
                                    //whether file name should be encrypted or not
                                    'encrypt_name' => TRUE
                                    //store image info once uploaded
                                );
                              
                             $this->load->library('upload', $config);
                             
                             if($this->upload->do_upload('imgInp')){
                                 $image_data = $this->upload->data();
                                 $config['image_library'] = 'gd2';
                                 $config['source_image'] = $image_data['full_path']; //get original image
                                 $config['width'] = 800;
                                 $config['height'] = 600;
                                 $this->load->library('image_lib', $config);
                                 $this->image_lib->resize();
                                 
                                 $uploadedImage=$image_data['file_name'];
                                 
                                 $datainsertion = array(
                                                            "date_of_entry"=>date('Y-m-d',strtotime($dateofentry)),
                                                            "date_of_collection"=>date('Y-m-d'),
                                                            "membership_no"=>$membershipno,
                                                            "weight"=>$weight,
                                                            "waist_navel"=>$waist_navel,
                                                            "waist"=>$waist,
                                                            "hip"=>$hip,
                                                            "fat_per"=>$bodyfatPercentage,
                                                            "fat_mass"=>$bodyfatmass,
                                                            "lean_body_mass"=>$bodyleanmass,
                                                            "waist_point"=>$waistcircumferencevalue,
                                                            "waist_remarks"=>$waistcircumferenceasses,
                                                            "waist_hip_point"=>$waisthipratiovalue,
                                                            "waist_hip_remarks"=>$waisthipratioasses,
                                                            "image_name"=>$uploadedImage,
                                                            "validity_string"=>$validity["VALIDITY_STRING"],
                                                            "entry_from"=>"slf",
                                                            "member_id"=>$customerId,
                                                            "branch_code"=>"",
                                                            "card_code"=>$card["CUS_CARD"]
                               
                                                        );
														
								if(!$this->getBodyCompositionByDate($dateofentry,$validity["VALIDITY_STRING"])){
                                 
                                        $insert = $this->profilemodel->insertbodycomposition($datainsertion); 
                                 }  else {
                                      $insert=FALSE;  
                                 }
                    
                                  if($insert){
                                       $response = array("msg_code" => 1, "msg_data" => "Data saved successfully !");
                                    }else{
                                       $response = array("msg_code" => 2, "msg_data" => "Sorry something going wrong or you have already entered data for this day !");
                                    }
                                 
                                 
                                 
                                 
                             }else{
                                 //file upload error
                                   $response = array(
                                        'msg_code' => '400',
                                        'msg_data' => $this->upload->display_errors(),
                                    );
                             }
                        }
                        else
                        {//without file upload
                            $datainsertion = array(
                                                            "date_of_entry"=>date('Y-m-d',strtotime($dateofentry)),
                                                            "date_of_collection"=>date('Y-m-d'),
                                                            "membership_no"=>$membershipno,
                                                            "weight"=>$weight,
                                                            "waist_navel"=>$waist_navel,
                                                            "waist"=>$waist,
                                                            "hip"=>$hip,
                                                            "fat_per"=>$bodyfatPercentage,
                                                            "fat_mass"=>$bodyfatmass,
                                                            "lean_body_mass"=>$bodyleanmass,
                                                            "waist_point"=>$waistcircumferencevalue,
                                                            "waist_remarks"=>$waistcircumferenceasses,
                                                            "waist_hip_point"=>$waisthipratiovalue,
                                                            "waist_hip_remarks"=>$waisthipratioasses,
                                                            "image_name"=>NULL,
                                                            "validity_string"=>$validity["VALIDITY_STRING"],
                                                            "entry_from"=>"slf",
                                                            "member_id"=>$customerId,
                                                            "branch_code"=>"",
                                                            "card_code"=>$card["CUS_CARD"]
                               
                                                        );
                                 
                                  if( !$this->getBodyCompositionByDate($dateofentry,$validity["VALIDITY_STRING"])){
                                 
                                        $insert = $this->profilemodel->insertbodycomposition($datainsertion); 
                                 }  else {
                                      $insert=FALSE;  
                                 }
                    
                                  if($insert){
                                       $response = array("msg_code" => 1, "msg_data" => "Data saved successfully");
                                    }else{
                                       $response = array("msg_code" => 2, "msg_data" => "Sorry something going wrong !");
                                    }
                            
                        }
                
                
                
            }else{
                 $response = array("msg_code" => 0, "msg_data" => "* Fields are mandatory");
            }
            
            
             
         }else{
             $response = array("msg_code" => 500, "msg_data" => "0.00");
         }
         $this->output->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
         exit();
    }
    
    private function validate($date,$weight,$waist,$hip){
        if($date==""){return false;}
        if($weight==""){return FALSE;}
        if($waist ==""){return FALSE;}
        if($hip ==""){return FALSE;}
        
        
        return true;
        
    }
    
    private function getBodyCompositionByDate($dateofentry,$validitystring){
             $result = $this->profilemodel->getBodyCompositionByDate($dateofentry,$validitystring);
             
             if($result["tran_id"]!=0){
                 return TRUE;
             }else{
                 return FALSE;
             }
    }
    
    public function delete(){
        $response = array();
        if ($this->session->userdata('user_data')) {
            $transactionId = $this->input->post("transactionId");
            $imageUnlink = $this->profilemodel->getBodyCompositionImageById($transactionId);
            $this->unlinkFromDisk($imageUnlink);
            $del = $this->profilemodel->delete($transactionId);
            
            if($del){
                $response = array("msg_code" => 1, "msg_data" => "");
            }else{
                $response = array("msg_code" => 0, "msg_data" => "");
            }
        }else{
            $response = array("msg_code" => 500, "msg_data" => "");
        }
        $this->output->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit();
    }
    
    private function unlinkFromDisk($imageName){
        if($imageName==""){
            $path = APPPATH . 'assets/images/portfolioimages/no.jpg';
        }else{
            $path = APPPATH . 'assets/images/portfolioimages/'.$imageName;
        }
        
        
        
        //echo(file_exists($path));
        if(file_exists($path)){
            unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
