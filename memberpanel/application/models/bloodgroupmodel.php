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
}
