<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class voucheroperation  extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        //$this->load->model('profilemodel', '', TRUE);
        //$this->load->model('feedbackmodel', '', TRUE);
        $this->load->library('session');
    }
    public function index(){
         if($this->session->userdata('user_data')){
			$session = $this->session->userdata('user_data');
			$page = '';
            $header = "";
            $headercontent="";
			$result = "";
			createbody_method($result, $page, $header, $session, $headercontent); 
		}
		else{
              redirect('memberlogin', 'refresh');
         }
    }
	
	public function voucherList()
	{
		if($this->session->userdata('user_data'))
		{
			
		}
		else
		{
			redirect('memberlogin','refresh');
		}
	}
	

    
    
}
