<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * member can change his or her
 * password from this module
 * @author Abhik
 * @copyright Mantrahealthzone(c) 2017
 * @date 16/01/2017
 */
class changepass extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('changepassmodel','',TRUE);
        $this->load->library('session');
    }
    
    public function index() {
        if ($this->session->userdata('user_data')) {
            //print_r($this->session->all_userdata());
            $session = $this->session->userdata('user_data');
            //echo($session["CUS_ID"]);
            $page = 'changepassword/mantrachangepassword';
            $header = "";
            $result = "";
            createbody_method($result, $page, $header, $session);
            //($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
        } else {

            redirect('memberlogin', 'refresh');
        }
    }
    
    public function changePassword(){
        $oldPassword =$this->input->post("oldpassword");
        $newpassword =  $this->input->post("newpassword"); 
        
         if ($this->session->userdata('user_data')) {
             $session = $this->session->userdata('user_data');
             $checkoldpassOfCustId = $this->changepassmodel->checkOldPassword($session["CUS_ID"],$oldPassword);
             if($checkoldpass){
                 
             }
         }else{
             redirect('memberlogin', 'refresh');
             
         }
        
        
    }

}
