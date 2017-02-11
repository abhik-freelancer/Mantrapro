<?php
class memberloginmodel extends CI_Model{
    
    
    public function checkMember($maxCustomerId,$password){
        
     $sql="SELECT MAX(`customer_master`.`CUS_ID`)AS id,
                `customer_master`.`MEMBERSHIP_NO`,
                `customer_master`.`CUS_NAME`,customer_master.PASS 
              FROM `customer_master`
              WHERE 
              `customer_master`.`CUS_ID` = ".$this->db->escape($maxCustomerId)." AND"
                . " customer_master.PASS =  ".$this->db->escape($password)."";
        
         $query = $this->db->query($sql);
         if($query->num_rows()> 0){
            $row = $query->row();
            $data =array(
                "CUS_ID"=>$row->id,
                "MEMBERSHIP_NO"=>$row->MEMBERSHIP_NO,
                "CUS_NAME"=>$row->CUS_NAME
            );

          return $data;
        }
        else{
            return $data=array();
        }
        
    }
    
    public function getMaxCustomerId($mobilenumber){
        $customerId=0;
        $sql="SELECT MAX(`customer_master`.`CUS_ID`)AS id
              FROM `customer_master`
              WHERE 
              `customer_master`.`CUS_PHONE` = ".$this->db->escape($mobilenumber);
        
         $query = $this->db->query($sql);
         if($query->num_rows()> 0){
            $row = $query->row();
           $customerId = $row->id;

          return $customerId;
        }
        else{
            return $customerId;
        }
        
        
    }
    
}