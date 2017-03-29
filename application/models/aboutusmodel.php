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
	
	public function getTeamMantra($category){
		$data = array();
		$sql = "SELECT team_mantra.name,
				team_mantra.about,
				team_mantra.designation,
				team_mantra.description,
				team_mantra.specialization,
				team_mantra.branch,
				team_mantra.image,
				branch_master.BRANCH_NAME
				FROM team_mantra
				INNER JOIN branch_master
				ON team_mantra.branch = branch_master.BRANCH_CODE
				WHERE team_mantra.category = '".$category."' AND team_mantra.is_active='Y' ORDER BY team_mantra.branch ,team_mantra.name DESC";
				
		$query = $this->db->query($sql);		
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"name" => $rows->name,
					"about" => $rows->about,
					"designation" => $rows->designation,
					"certification" => $rows->description,
					"specialization" => $rows->specialization,
					"branch" => $rows->BRANCH_NAME,
					"image" => $rows->image
				);
			}
			return $data;
		}
		else{
			return $data;
		}
		
	}
	
	
	
	
	
	
}