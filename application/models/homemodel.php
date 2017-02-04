<?php

class homemodel extends CI_Model{
    
   public function getGymLocation(){
	   $data=array();
	   $sql = "SELECT BRANCH_ID,BRANCH_NAME,BRANCH_CODE FROM `branch_master` ORDER BY BRANCH_NAME";
	    $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "BRANCH_ID"=>$rows->BRANCH_ID,
                    "BRANCH_NAME"=>$rows->BRANCH_NAME,
                    "BRANCH_CODE"=>$rows->BRANCH_CODE
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