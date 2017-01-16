<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * passchanges model
 * @author Abhik
 */
class changepassmodel extends CI_Model {
    //put your code here
    public function checkOldPassword($memberId,$oldPassword){
        $customerId ="";
        $sql=" SELECT `customer_master`.`PASS`,`customer_master`.`CUS_ID` FROM `customer_master`
                WHERE `customer_master`.`CUS_ID`=".$memberId." AND `customer_master`.`PASS`=".$this->db->escape($oldPassword)."";
        
        $query = $this->db->query($sql);
         if($query->num_rows()> 0){
            $row = $query->row();
            $customerId = $row->CUS_ID;
            return $customerId;
        }
        else{
            return $customerId;
        }
        
    }
}
