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
}
