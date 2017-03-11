<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class feedbackmodel extends CI_Model {
	
	 public function  insertintoFeedback($insertArray){
        
         try {
                $this->db->trans_begin();
                $this->db->insert('feedback', $insertArray);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        } catch (Exception $err) {
            echo $exc->getTraceAsString();
        }
    }
	
}