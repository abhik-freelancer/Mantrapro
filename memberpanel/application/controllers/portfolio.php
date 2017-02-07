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
    
    public function getBodyFatPercentage(){
         if ($this->session->userdata('user_data')) {
                $response= array();
                $session = $this->session->userdata('user_data');
                $customerId = ($session["CUS_ID"] != "" ? $session["CUS_ID"] : 0);
                $weight = $this->input->post("weight");
                $waist = $this->input->post("waist");
                $hip= $this->input->post("hip");
                $customer = $this->profilemodel->getCustomerByCustId($customerId);
                $sex = $customer["CUS_SEX"];
                
                $healthresponse = $this->profilemodel->getBodyFatPercentage($weight,$waist,$hip,$sex);
                
                $response=array("msg_code"=>1,"msg_data"=>$healthresponse);
             
         }else{
              $response = array("msg_code" => 500, "msg_data" => "0.00");
         }
        
        $this->output->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit();
    }
    
    
}
