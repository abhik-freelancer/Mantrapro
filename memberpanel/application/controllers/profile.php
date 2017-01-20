<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author Abhik Ghosh
 */
class profile extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('bloodgroupmodel', '', TRUE);
        $this->load->model('profilemodel', '', TRUE);
        $this->load->library('session');
    }
    
    public function index(){
          if ($this->session->userdata('user_data')) {
            $session = $this->session->userdata('user_data');
            $customerId = ($session["CUS_ID"]!=""?$session["CUS_ID"]:0);
            $page = 'profile/changeprofile';
            $header = "";
            $headercontent['bloodgroup'] = $this->bloodgroupmodel->getBloodGroup();
            $result = $this->profilemodel->getCustomerByCustId($customerId);
            createbody_method($result, $page, $header, $session,$headercontent);
            //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
        } else {

            redirect('memberlogin', 'refresh');
        }
    }
    
    public function UpadatePersonalia(){
        
        $memberName = $this->input->post("memberName");
        $alternatemobilenumber = $this->input->post("alternatemobilenumber");
        $memberAddress = $this->input->post("memberAddress");
        $pinnumber = $this->input->post("pinnumber");
        $Email = $this->input->post("Email");
        if($_POST['membersex'] == "false"){
            $membersex = 0;
        }  else {
        $membersex = $this->input->post("membersex");    
        }
        
        $bloodgroup = $this->input->post("bloodgroup");
        $dateofbirth = $this->input->post("dateofbirth");
        $json_response=array();
         if ($this->session->userdata('user_data')) {
                if($this->formValidate($memberName, $memberAddress, $pinnumber, $Email,$membersex, $bloodgroup, $dateofbirth)){
                    $session = $this->session->userdata('user_data');
                    $customerId = $session["CUS_ID"];
                    $upadateData =array(
                        "CUS_NAME"=>$memberName,
                        "CUS_PHONE2"=>$alternatemobilenumber,
                        "CUS_EMAIL"=>$Email,
                        "CUS_ADRESS"=>$memberAddress,
                        "CUS_PIN"=>$pinnumber,
                        "CUS_SEX"=>$membersex,
                        "CUS_BLOOD_GRP"=>$bloodgroup,
                        "CUS_DOB"=>date("Y-m-d", strtotime($dateofbirth))  
                    );
                    $updatePersonal = $this->profilemodel->updatePersonal($customerId,$upadateData);
                    if($updatePersonal){
                        $json_response = array("msg_code"=>1,"msg_data"=>"Profile has changed successfully");
                    }else{
                        $json_response = array("msg_code"=>2,"msg_data"=>"Something is going wrong.");
                    }
                }else{
                    $json_response = array("msg_code"=>0,"msg_data"=>"* Fields are mandatory.");
                }
         }else{
              $json_response = array("msg_code"=>500,"msg_data"=>"");
         }
        
        header('Content-Type: application/json');
        echo json_encode( $json_response );
    }
    private function formValidate($memberName,$memberAddress,$pinNumber,$email,$membersex,$bloodgroup,$dateofbirth){
        if($memberName==""){
            return false;
        }elseif($memberAddress==""){
            return false;
        }elseif($pinNumber==""){
            return false;
        }elseif($email==""){
            return FALSE;
        }elseif($bloodgroup==""){
            return false;
        }elseif($dateofbirth==""){
            return false;
        }elseif ($membersex==0) {
            return false;
        }
        
        return TRUE;
    }
}
