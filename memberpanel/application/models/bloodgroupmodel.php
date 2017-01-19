<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bloodgroupmodel
 *
 * @author pc1
 */
class bloodgroupmodel extends CI_Model{
    //put your code here
    
    /**
     * @name getBloodGroup
     * @return type
     * @desc getting blood group list
     */
    
    public function getBloodGroup(){
         $bloodGroupData = array();
         $sql= " SELECT `blood_group`.`id`,
                    `blood_group`.`bld_group_code` FROM blood_group ORDER BY `blood_group`.`id`";
         $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $bloodGroupData[] = array(
                    "id"=>$rows->id,
                    "bld_group_code"=>$rows->bld_group_code
                    );
            
                
                   
              }
               return $bloodGroupData;
             
         }else{
             return $bloodGroupData;
         }
    }
    
    /**
     * @name getMemberBloodGroup
     * @param type $customerId
     * @return array
     * @desc Getting member blood group by CustomerId
     */
    public function getMemberBloodGroup($customerId=NULL){
        $memberBloodGroup = NULL;
        $sql = " SELECT customer_master.`CUS_ID`,
                `blood_group`.`bld_group_code`,
                `blood_group`.`id`
                 FROM customer_master 
                 LEFT JOIN `blood_group` 
                 ON customer_master.`CUS_BLOOD_GRP` = `blood_group`.`bld_group_code`
                 WHERE customer_master.`CUS_ID` =".$customerId;
        
         $query = $this->db->query($sql);
         if($query->num_rows()> 0){
                $rows = $query->result();
                $memberBloodGroup = array(
                    "CUS_ID"=>$rows->CUS_ID,
                    "bld_group_code"=>$rows->bld_group_code,
                    "bloodgroupid"=>$rows->id
                    );
               return $bloodGroupData;
             
         }else{
             return $bloodGroupData;
         }
    }
}
