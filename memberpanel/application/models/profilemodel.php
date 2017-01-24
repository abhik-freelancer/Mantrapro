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

}
