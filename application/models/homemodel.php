<?php

class homemodel extends CI_Model{
    
   public function getGymLocation(){
	   $data=array();
	   $sql = "SELECT id,branch_name,branch_code FROM `web_branch` ORDER BY branch_name";
	    $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "BRANCH_ID"=>$rows->id,
                    "BRANCH_NAME"=>$rows->branch_name,
                    "BRANCH_CODE"=>$rows->branch_code
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
    }
	
	public function InsertIntoFreeGuestPass($guestPassData){
		try{
                $this->db->insert("free_guest_pass",$guestPassData);
				if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
				} 
				else {
                $this->db->trans_commit();
                return true;
				}
			}
			catch (Exception $err) {
            echo $exc->getTraceAsString();
			}
	}
	
}