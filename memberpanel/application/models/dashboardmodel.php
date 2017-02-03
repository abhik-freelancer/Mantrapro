<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Model developed for mantra health zone member
 * @author Abhik
 * @date 01/02/2017
 */
class dashboardmodel extends CI_Model {
    
    public function getMemberCashBackPoint($membershipnumber,$validityString){
       $cashback=array();
      $sql = "SELECT 
            cash_back_master.`total_point`,
            cash_back_master.`cash_back_amt`
            FROM `cash_back_master`
            WHERE 
            `cash_back_master`.`id` =(SELECT MAX(`cash_back_master`.`id`) FROM `cash_back_master`
            WHERE
            cash_back_master.`membership_no` ='".$membershipnumber."'
            AND cash_back_master.`validity_string` ='".$validityString."')";
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $cashback=array(
                    "total_point"=>$row-> total_point,
                    "cash_back_amt"=>$row->cash_back_amt,
                   
                );
                
        }
        return $cashback;
        
        
    }
    
    public function getExtensionDays($membershipno,$validitystring){
        $grantDays = 0;
        $sql="SELECT `application_extension`.`grant_days` 
                FROM `application_extension`
                WHERE
                `application_extension`.`tran_id` = (SELECT MAX(application_extension.`tran_id`) 
                FROM application_extension WHERE application_extension.`membership_no`='".$membershipno."'
                AND application_extension.`validity_period` ='".$validitystring."')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $grantDays = (int)$row->grant_days;
                
        }
        return $grantDays;
    }
}
