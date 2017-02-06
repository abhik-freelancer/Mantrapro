<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profilemodel
 *
 * @author Abhik
 */
class profilemodel extends CI_Model {

    public function getCustomerByCustId($customerId = NULL) {

        $memberData = array();
        $sql = "SELECT `customer_master`.`CUS_ID`,
                `customer_master`.`CUS_NAME`,
                `customer_master`.`CUS_PHONE`,
                `customer_master`.`CUS_PHONE2`,
                `customer_master`.`CUS_ADRESS`,
                `customer_master`.`CUS_PIN`,
                `customer_master`.`CUS_EMAIL`,
                `customer_master`.`CUS_SEX`,
                `customer_master`.`CUS_BLOOD_GRP`,
                DATE_FORMAT(`customer_master`.`CUS_DOB`,'%d-%m-%Y') AS CUS_DOB,
                `card_master`.`CARD_DESC`,
                DATE_FORMAT(`customer_master`.`REGISTRATION_DT`,'%d-%m-%Y') AS REGISTRATION_DT,
                customer_master.`image_name`
                FROM 
                `customer_master` 
                LEFT JOIN `card_master` ON customer_master.`CUS_CARD` = `card_master`.`CARD_CODE` 
         WHERE `customer_master`.`CUS_ID` =" . $customerId;

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $memberData = array(
                "CUS_ID" => $row->CUS_ID,
                "CUS_NAME" => $row->CUS_NAME,
                "CUS_PHONE" => $row->CUS_PHONE,
                "CUS_PHONE2" => $row->CUS_PHONE2,
                "CUS_ADRESS" => $row->CUS_ADRESS,
                "CUS_PIN" => $row->CUS_PIN,
                "CUS_EMAIL" => $row->CUS_EMAIL,
                "CUS_SEX" => $row->CUS_SEX,
                "CUS_BLOOD_GRP" => $row->CUS_BLOOD_GRP,
                "CUS_DOB" => $row->CUS_DOB,
                "CARD_DESC" => $row->CARD_DESC,
                "REGISTRATION_DT" => $row->REGISTRATION_DT,
                "image_name" => $row->image_name
            );
            return $memberData;
        } else {
            return $memberData;
        }
    }
    
    public function  getImageById($customerId){
        $images="";
        $sql="SELECT `customer_master`.`image_name`
                FROM `customer_master`
                WHERE `customer_master`.`CUS_ID` =".$customerId;
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $images =$row-> image_name;
        }
        return $images;
    }
    
    public function getMembershipNumber($customerId){
        $membershipNumber = "";
        $sql ="SELECT `customer_master`.`MEMBERSHIP_NO`
                FROM
                `customer_master`
                WHERE 
                customer_master.`CUS_ID`=".$customerId;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $membershipNumber = $row-> MEMBERSHIP_NO;
        }
        return $membershipNumber;
    }
    
    

    
    public function getValidityString($membershipNumber){
        $membervalidity =array();
        $sql = "SELECT `payment_master`.`MEMBERSHIP_NO`,payment_master.`VALIDITY_STRING`,
                DATE_FORMAT(payment_master.`FROM_DT`,'%d-%m-%Y') AS fromdate,
                DATE_FORMAT (payment_master.`VALID_UPTO`,'%d-%m-%Y')AS validupto,
                DATE_FORMAT(payment_master.`EXPIRY_DT`,'%d-%m-%Y') AS expiredate
                FROM
                `payment_master` 
                WHERE 
                payment_master.`PAYMENT_ID` = (SELECT  MAX(payment_master.`PAYMENT_ID`) AS id FROM payment_master 
                WHERE
                `payment_master`.`MEMBERSHIP_NO` ='".$membershipNumber."'
                AND `payment_master`.`FRESH_RENEWAL`!='D'
                AND `payment_master`.FRESH_RENEWAL!='P'
                AND  `payment_master`.`FRESH_RENEWAL`!='C')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $membervalidity=array(
                    "membershipno"=>$row-> MEMBERSHIP_NO,
                    "VALIDITY_STRING"=>$row->VALIDITY_STRING,
                    "fromdate"=>$row->fromdate,
                    "validupto"=>$row->validupto,
                    "expiredate"=>$row->expiredate,
                );
                
        }
        return $membervalidity;
        
    }
    
    public function updatePersonal($customerId, $upadateData) {
        try {
            $this->updatePassword($customerId, $upadateData);
            $this->db->where('CUS_ID', $customerId);
            $this->db->update('customer_master', $upadateData);

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

    private function updatePassword($customerId, $upadateData) {

        $dob = $upadateData["CUS_DOB"];
        $pass="";
        $dobExist="";
        $sql = "SELECT `customer_master`.`PASS` ,customer_master.CUS_DOB
                FROM 
                `customer_master` 
                WHERE `customer_master`.`CUS_ID` =".$customerId;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $pass = $row->PASS;
                $dobExist = $row->CUS_DOB;
        }
        if($dobExist==$pass){
            $this->db->set('PASS', $dob);
            $this->db->where('CUS_ID', $customerId);
            $this->db->update('customer_master');
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    
    public function updatePersonalImage($customerId, $image_data){
        try {
            $this->db->set("image_name",$image_data);
            $this->db->where('CUS_ID', $customerId);
            $this->db->update('customer_master');

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
    /**
     * 
     * @param type $membershipNo
     * @param type $validityString
     * @return double
     */
    public function getSubscriptionAmountOfMember($membershipNo,$validityString){
        $subscriptionamount = (double)0.00;
        
        $sql = " SELECT 
                 IFNULL(payment_master.`SUBSCRIPTION`,0)AS SUBSCRIPTION
                 FROM 
                 payment_master 
                 WHERE MEMBERSHIP_NO ='".$membershipNo."' AND VALIDITY_STRING='".$validityString."' 
                 AND (FRESH_RENEWAL!='P' AND FRESH_RENEWAL!='D')";
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $subscriptionamount = $row->SUBSCRIPTION;    
        }
        
        return $subscriptionamount;
        
    }
    /**
     * 
     * @param type $memebrshipNo
     * @param type $validityString
     * @return double
     */
    public function getPaidAmount($memebrshipNo,$validityString){
        $paymentDue = (double)0.00;
        $sql = "SELECT (IFNULL(SUM(payment_master.`AMOUNT`),0)- IFNULL(SUM(`payment_master`.DISCOUNT_CONV),0)+ 
	IFNULL(SUM(payment_master.DISCOUNT_OFFER),0)+ IFNULL(SUM(payment_master.DISCOUNT_NEGO),0)+
	IFNULL(SUM(payment_master.`CASHBACK_AMT`),0)) AS due
	FROM payment_master 
        WHERE MEMBERSHIP_NO='".$memebrshipNo."'
        AND VALIDITY_STRING='".$validityString."' AND FRESH_RENEWAL!='P' 
        GROUP BY  MEMBERSHIP_NO
        ORDER BY payment_id DESC";
        
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $paymentDue = $row->due;    
        }
        
        return $paymentDue;
    }
    
    
    
    

}
