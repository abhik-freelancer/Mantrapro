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
	
	
	public function getTestimonialForActiveCls(){
		$data=array();
		$sql = "SELECT * FROM testimonial WHERE testimonial.`is_active`='Y' ORDER BY `id`  LIMIT 2 ";
		 $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "name"=>$rows->name,
                    "occupation"=>$rows->occupation,
                    "testimonialImage"=>$rows->testimonialImage,
                    "location"=>$rows->location,
                    "comment"=>$rows->comment
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
	} 
	
	public function getTestimonialForWithoutActiveCls(){
		$data=array();
		$sql = "SELECT * FROM testimonial WHERE testimonial.`is_active`='Y' ORDER BY `id`  LIMIT 100 OFFSET 2 ";
		 $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "name"=>$rows->name,
                    "occupation"=>$rows->occupation,
                    "testimonialImage"=>$rows->testimonialImage,
                    "location"=>$rows->location,
                    "comment"=>$rows->comment
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
	} 
	
	
	
	
}