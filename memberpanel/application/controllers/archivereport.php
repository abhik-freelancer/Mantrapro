<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feedback
 * @date 17/08/2017
 * @author Mithilesh Routh
 */
class archivereport  extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('profilemodel', '', TRUE);
        $this->load->model('archivereportmodel', '', TRUE);
        $this->load->library('session');
    }
    public function index(){
         if($this->session->userdata('user_data')){
			
            $session = $this->session->userdata('user_data');
			
			$custDtl = $this->profilemodel->getCustomerByCustId($session['CUS_ID']);
			//echo "CUS_PHONE".$custDtl['CUS_PHONE'];
			$result['archiveReport'] = $this->archivereportmodel->getMemberArchiveReportByPhone($custDtl['CUS_PHONE']);
			$page = 'archivereport/archivereport_list';
            $header = "";
            $headercontent="";
			
			createbody_method($result, $page, $header, $session, $headercontent); 
		}else{
              redirect('memberlogin', 'refresh');
         }
    }
	

    
}
