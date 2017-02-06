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
       $cashback=array(
           "total_point"=>0,
           "cash_back_amt"=>0,
       );
     $sql = "SELECT 
            IFNULL(cash_back_master.`total_point`,0) as total_point ,
            IFNULL(cash_back_master.`cash_back_amt`,0)as cash_back_amt
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
    
    public function getAttendanceRate($fromDate,$validUpto,$memberNo){
        $totalattDays =0;
        $currentDate =date('Y-m-d');
        $sql="SELECT COUNT(tran_id)as attday FROM `member_attendance`
            WHERE member_attendance.`membershipno`='".$memberNo."'
            AND member_attendance.`att_date` BETWEEN '".$fromDate."' AND '".$validUpto."'";
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $totalattDays = (int)$row->attday;
                
        }
        
          $date_diff=strtotime($currentDate) - strtotime($fromDate);
          //$days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24))+1;
          $days=floor($date_diff / (60 * 60 * 24));
             if ($days>0)
             {
               $att_rate=number_format($totalattDays*100/$days,2);
               $att_rate_str=$att_rate;
             } 
             else
             {
              $att_rate_str="";
             }
             return $att_rate_str;
    }
    
    public  function getPackageHistory($mobileno,$validitystring){
        $packagehistory = array();
          $sql ="SELECT 
                customer_master.`CUS_NAME`,
                card_master.`CARD_DESC`,
                customer_master.`MEMBERSHIP_NO`,
                payment_master.`SUBSCRIPTION`,
                date_format(payment_master.`FROM_DT`,'%d-%m-%Y') as FROM_DT ,
                date_format (payment_master.`VALID_UPTO`,'%d-%m-%Y') as VALID_UPTO,
                payment_master.`VALIDITY_STRING`,
                payment_master.`CUST_ID`,
                IF(payment_master.`VALIDITY_STRING`='".$validitystring."',1,0)AS active
                FROM 
                customer_master 
                LEFT JOIN
                `card_master` ON customer_master.`CUS_CARD` = card_master.`CARD_CODE` 
                INNER JOIN
                payment_master ON customer_master.`MEMBERSHIP_NO` = payment_master.`MEMBERSHIP_NO`
                WHERE  customer_master.`CUS_PHONE` ='".$mobileno."' AND payment_master.`SUBSCRIPTION` IS NOT NULL
                ORDER BY payment_master.`FROM_DT` DESC  LIMIT 0,6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $packagehistory[] = array( 
                                 "CARD_DESC" => $rows->CARD_DESC,
                                 "MEMBERSHIP_NO"=>$rows->MEMBERSHIP_NO,
				 "SUBSCRIPTION"=>$rows->SUBSCRIPTION,	
                                 "FROM_DT"=> $rows->FROM_DT,
                                 "VALID_UPTO"=>$rows->VALID_UPTO,
				 "active"=>$rows->active
                        );
            }
        }
        return $packagehistory;
        
    }
}
