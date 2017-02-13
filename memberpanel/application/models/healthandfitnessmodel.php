<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of healthandfitness
 *
 * @author pc1
 */
class healthandfitnessmodel extends CI_Model {
    //put your code here
    public function getVo2MaxResult($membershipno,$validitystring){
        $data =array();
        $sql = "SELECT
                `tran_id`,
               DATE_FORMAT(`date_of_entry`,'%d-%m-%Y') AS date_of_entry,
                `date_of_collection`,`member_id`,
                `membership_no`,`age`, `weight`,`heart_rate`,`minutes`,`seconds`,
                `mets`,`vomax`,`population_avg`,
                `score`, `rating`,
                `programme`, `validity_string`,
                `entry_from`,`branch_code`,`card_code`,`user_id`,`fin_id`
              FROM `vo2_max` WHERE vo2_max.`membership_no` ='".$membershipno."' AND vo2_max.`validity_string` ='".$validitystring."'
              ORDER BY date_of_entry DESC  ";
        $query= $this->db->query($sql);
        if ($query->num_rows() > 0) {
               foreach ($query->result() as $row){ 
                $data[]=array(
                    "tran_id"=>$row->tran_id,
                    "date_of_entry"=>$row->date_of_entry,
                    "heart_rate"=>$row->heart_rate,
                    "duration"=>$row->minutes,
                    "mets"=>$row->mets,
                    "vomax"=>$row->vomax,
                    "rating"=>$row->rating,
                    "score"=>$row->score,
                   
					
                );
               }
               return $data;
                
        }else{
        
        return $data;
        }
    }
    
    
    public function getPushUpTest($memshipno,$validitystring){
        $data = array();
        $sql ="SELECT
                `tran_id`,
                date_format(`date_of_entry`,'%d-%m-%Y') as date_of_entry,
                `date_of_collection`,`member_id`,`membership_no`,
                `age`,`repitions`,`population_avg`,`score`,
                `rating`,`validity_string`,`entry_from`,
                `branch_code`,`card_code`,
                `user_id`,`fin_id`
               FROM `push_up_test`
               WHERE  push_up_test.`membership_no` = '".$memshipno."' AND push_up_test.`validity_string` ='".$validitystring."'"
                . " ORDER BY push_up_test.date_of_entry DESC";
        
        
        $query= $this->db->query($sql);
        if ($query->num_rows() > 0) {
               foreach ($query->result() as $row){ 
                $data[]=array(
                    "tran_id"=>$row->tran_id,
                    "date_of_entry"=>$row->date_of_entry,
                    "repitions"=>$row->repitions,
                    "population_avg"=>$row->population_avg,
                    "rating"=>$row->rating,
                    "score"=>$row->score
                   
					
                );
               }
               return $data;
                
        }else{
        
        return $data;
        }
        
        
    }
    
    public function getSitUpTest($membershipno,$validitystring){
        $data = array();
        $sql ="SELECT `tran_id`,
                        DATE_FORMAT(`date_of_entry`,'%d-%m-%Y') AS date_of_entry,
                        `date_of_collection`,`member_id`,
                        `membership_no`,`age`,`repitions`,`population_avg`,
                        `score`,`rating`,`validity_string`,`entry_from`,`branch_code`,
                        `card_code`,`user_id`,`fin_id`
                FROM `sit_up_test`
                WHERE sit_up_test.`membership_no` ='".$membershipno."' AND sit_up_test.`validity_string`='".$validitystring."'
                ORDER BY sit_up_test.date_of_entry ";
        
        
        $query= $this->db->query($sql);
        if ($query->num_rows() > 0) {
               foreach ($query->result() as $row){ 
                $data[]=array(
                    "tran_id"=>$row->tran_id,
                    "date_of_entry"=>$row->date_of_entry,
                    "repitions"=>$row->repitions,
                    "population_avg"=>$row->population_avg,
                    "rating"=>$row->rating,
                    "score"=>$row->score
                   
					
                );
               }
               return $data;
                
        }else{
        
        return $data;
        }
        
        
    }
    public function Onerepeationmaxtest($membershipno,$validitystring){
        $data = array();
        $sql = "SELECT
                `tran_id`,
                `date_of_entry`,`date_of_collection`,
                `member_id`,`membership_no`,`weight_lifted`,
                `no_of_rptn`,`rm_result`,`validity_string`,
                `entry_from`,`branch_code`,`card_code`,
                `user_id`, `fin_id`,`exercise_desc`, `body_weight`
              FROM `rm_test`
              WHERE rm_test.`membership_no` = '".$membershipno."' AND rm_test.`validity_string`='".$validitystring."' ORDER BY date_of_entry DESC";
        
        $query= $this->db->query($sql);
        if ($query->num_rows() > 0) {
               foreach ($query->result() as $row){ 
                $data[]=array(
                    "tran_id"=>$row->tran_id,
                    "date_of_entry"=>$row->date_of_entry,
                    "exercise_desc"=>$row->exercise_desc,
                    "weight_lifted"=>$row->weight_lifted,
                    "no_of_rptn"=>$row->no_of_rptn,
                    "rm_result"=>$row->rm_result,
                    
                    
                   
					
                );
               }
               return $data;
                
        }else{
        
        return $data;
        }
    }
    public function getSitandReachTest($membershipno,$validitystring){
        
        $data=array();
        $sql ="SELECT
            `tran_id`,
            `date_of_collection`,
            `date_of_entry`,
            `member_id`,
            `membership_no`,
            `validity_string`,
            `age`,
            `distance`,
            `population_avg`,
            `score`,
            `rating`,
            `entry_from`,
            `branch_code`,
            `card_code`,
            `user_id`,
            `fin_id`
        FROM `flexibility_test`
        WHERE flexibility_test.`membership_no` ='".$membershipno."' AND flexibility_test.`validity_string`='".$validitystring."' ORDER BY date_of_entry DESC";
        
        $query= $this->db->query($sql);
        if ($query->num_rows() > 0) {
               foreach ($query->result() as $row){ 
                $data[]=array(
                    "tran_id"=>$row->tran_id,
                    "date_of_entry"=>$row->date_of_entry,
                    "distance"=>$row->distance,
                    "rating"=>$row->rating,
                    "score"=>$row->score,
                   			
                );
               }
               return $data;
                
        }else{
        
        return $data;
        }
    }
}
