<?php
class aboutusmodel extends CI_Model{
	
	public function getDesignation(){
	   $data=array();
	   $sql = "SELECT * FROM `desig_master` ORDER BY desig_desc";
	    $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->desig_id,
                    "desig_desc"=>$rows->desig_desc
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
    }
	
	public function insertIntoCareer($carrerdata){
		
		try {
			$this->db->trans_begin();
			$this->db->insert('career',$carrerdata);
			
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return false;
			}
			else{
				$this->db->trans_commit();
				return true;
			}
		}
		catch(Exception $err){
			echo $err->getTraceAsString();
		}
		
	}
	
}