<?php 

class contactmodel extends CI_Model{
	
	public function getContactDetailByBranch($branchId){
		$sql ="SELECT * FROM web_branch WHERE `web_branch`.`id`=".$branchId;
		$query = $this->db->query($sql);
        if($query->num_rows()> 0){
            $row = $query->row();
            $data =array(
					"id" => $row->id,
					"brnach" => $row->branch_name,
					"branch_code" => $row->branch_code,
					"address" => $row->address,
					"phone_no" => $row->phone_no,
					"gym_tour_link" => $row->gym_tour_link
            );

          return $data;
        }
        else{
            return $data=array();
        }
	}
	
	public function InsertintoWebEnquiry($insertArray){
		try{
            $this->db->insert("web_enquiry",$insertArray);
			if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
			} 
			else {
                $this->db->trans_commit();
                return true;
			}
		}
		
		catch (Exception $err){
            echo $err->getTraceAsString();
		}
	}
	
}