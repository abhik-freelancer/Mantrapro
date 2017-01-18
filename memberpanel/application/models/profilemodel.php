<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
class profilemodel extends CI_Model{
    //put your code here
    public function getCustomerByCustId($customerId=NULL){
        
        $memberData=array();
        $sql="SELECT `customer_master`.`CUS_ID`,
                `customer_master`.`CUS_NAME`,
                `customer_master`.`CUS_PHONE`,
                `customer_master`.`CUS_PHONE2`,
                `customer_master`.`CUS_ADRESS`,
                `customer_master`.`CUS_PIN`,
                `customer_master`.`CUS_EMAIL`,
                `customer_master`.`CUS_SEX`,
                `customer_master`.`CUS_BLOOD_GRP`,
                DATE_FORMAT(`customer_master`.`CUS_DOB`,'%d-%m-%Y') AS CUS_DOB,
                `card_master`.`CARD_DESC`
                FROM 
                `customer_master` 
                LEFT JOIN `card_master` ON customer_master.`CUS_CARD` = `card_master`.`CARD_CODE` 
         WHERE `customer_master`.`CUS_ID` =".$customerId;
        
         $query = $this->db->query($sql);
         if($query->num_rows()> 0){
            $row = $query->row();
            //$customerId = $row->CUS_ID;
            $memberData = array(
                "CUS_ID"=>$row->CUS_ID,
                "CUS_NAME"=>$row->CUS_NAME,
                "CUS_PHONE"=>$row->CUS_PHONE,
                "CUS_PHONE2"=>$row->CUS_PHONE2,
                "CUS_ADRESS"=>$row->CUS_ADRESS,
                "CUS_PIN"=>$row->CUS_ADRESS,
                "CUS_EMAIL"=>$row->CUS_EMAIL,
                "CUS_SEX"=>$row->CUS_SEX,
                "CUS_BLOOD_GRP"=>$row->CUS_BLOOD_GRP,
                "CUS_DOB"=>$row->CUS_DOB,
                "CARD_DESC"=>$row->CARD_DESC
                
            );
            return $memberData;
        }
        else{
            return $memberData;
        }
        
    }
}
