<?php
class memberloginmodel extends CI_Model{
    
    
    public function checkMember($maxCustomerId,$password){
        
     $sql="SELECT MAX(`customer_master`.`CUS_ID`)AS id,
                `customer_master`.`MEMBERSHIP_NO`,
                `customer_master`.`CUS_NAME`,customer_master.PASS 
              FROM `customer_master`
              WHERE 
              `customer_master`.`CUS_ID` = ".trim($this->db->escape($maxCustomerId))." AND"
                . " customer_master.PASS =  ".trim($this->db->escape($password))." AND customer_master.pack_type='M'";
        
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
       /* $sql="SELECT MAX(`customer_master`.`CUS_ID`)AS id
              FROM `customer_master`
              WHERE `customer_master`.pack_type='M' AND
              `customer_master`.`CUS_PHONE` = ".$this->db->escape($mobilenumber);*/
			  
			  $sql = "SELECT 
					customer_master.CUS_ID AS id
					FROM payment_master
					INNER JOIN customer_master
					ON customer_master.`MEMBERSHIP_NO` = payment_master.`MEMBERSHIP_NO`
						LEFT JOIN `application_extension` 
						ON `application_extension`.`membership_no`=payment_master.`MEMBERSHIP_NO` 
						AND application_extension.`validity_period`=payment_master.`VALIDITY_STRING`
					WHERE payment_master.`MEMBERSHIP_NO` 
					IN (
				SELECT customer_master.`MEMBERSHIP_NO`
					FROM customer_master WHERE
					customer_master.`CUS_PHONE`=".$this->db->escape($mobilenumber)."
					AND customer_master.`IS_ACTIVE`='Y'
					AND customer_master.`pack_type`='M'
					)
					AND DATE_ADD(`payment_master`.`VALID_UPTO` , INTERVAL COALESCE(application_extension.grant_days,0) DAY) >= CURDATE()
					AND payment_master.`FROM_DT` <= CURDATE()
					AND payment_master.`FRESH_RENEWAL` IN ('F','R') LIMIT 1";
        
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