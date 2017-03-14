<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dietarymanagmentmodel extends CI_Model{
	
	public function getDietarymanagmentList($customerId = NULL){
		$data = array();
		$where = array("member_id" => $customerId);
		
		$this->db->select('*');
		$this->db->from('diet_management');
		$this->db->where($where);
	
		$this->db->order_by("date_of_entry","desc"); 
		$query = $this->db->get();
		
		//echo $this->db->last_query();
		
		if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "member_id"=>$rows->member_id,
                    "membership_no"=>$rows->membership_no,
                    "date_of_entry"=>$rows->date_of_entry,
                    "date_of_collection"=>$rows->date_of_collection,
                    "meal1"=>$rows->meal1,
                    "meal2"=>$rows->meal2,
                    "meal3"=>$rows->meal3,
                    "meal4"=>$rows->meal4,
                    "meal5"=>$rows->meal5,
                    "meal6"=>$rows->meal6,
                    "meal7"=>$rows->meal7,
                    "meal8"=>$rows->meal8,
                    "carbs"=>$rows->carbs,
                    "protein"=>$rows->protein,
                    "weight"=>$rows->weight
					);
            
                
                   
              }
               return $data;
             
         }else{
             return $data;
         }
		
		
		
	}
	
	public function insertIntoDietManagment($insertArry){
		
		try {
            $this->db->trans_begin();
            $this->db->insert('diet_management', $insertArry);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
		catch (Exception $err) {
            echo $err->getTraceAsString();
        }
		
	}
	
	
	
	
	
}