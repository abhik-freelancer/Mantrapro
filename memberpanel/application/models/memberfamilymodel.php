<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class memberfamilymodel extends CI_Model{
	
	public function getRelationshipList(){
		$data = array();
		$this->db->select('*')
				->from('relationship_master');
		$query = $this->db->get();
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"id" => $rows->id,
					"relation" => $rows->relation
				);
			}
			return $data;
		}else{
			return $data;
		}
	}
	
	public function getMemberFamilyList($customerId = NULL){
		$data = array();
		$where = array("membership_id"=>$customerId);
		
		$this->db->select('
						members_family.id AS memberFamilyID ,
						members_family.name,
						members_family.age, 
						relationship_master.relation,
						blood_group.bld_group_code')
				->from('members_family')
				->join('relationship_master', 'relationship_master.id=members_family.relationship_id', 'inner')
				->join('blood_group', 'blood_group.id=members_family.blood_group_id', 'left')
				->where($where);
		$query = $this->db->get();
		
	//	echo $this->db->last_query();
		
		if($query->num_rows()>0){
			foreach($query->result() as $rows):
				$data[] = array(
					"memberFamilyID" => $rows->memberFamilyID,
					"name" => $rows->name,
					"age" => $rows->age,
					"relation" => $rows->relation,
					"bld_group_code" => $rows->bld_group_code
				);
			endforeach;
			
			return $data;
		}else{
			return $data;
		}

	}
	
	public function insertintoMemberFamily($insertArray){
		
		try{
            $this->db->trans_begin();
            $this->db->insert('members_family', $insertArray);

            if($this->db->trans_status() === FALSE) {
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
	
	
	public function getMemberFamilyDataById($memberFamilyID = NULL){
		$data = array();
		$where = array("members_family.id"=>$memberFamilyID);
			$this->db->select('
						members_family.id AS memberFamilyID ,
						members_family.name,
						members_family.age, 
						members_family.gender, 
						members_family.relationship_id,
						members_family.blood_group_id')
				->from('members_family')
				->where($where);
		$query = $this->db->get();
		
			if($query->num_rows() > 0){
				$row = $query->row();
				$data = array(
					"memberFamilyID" => $row->memberFamilyID,
					"name" => $row->name,
					"gender" => $row->gender,
					"age" => $row->age,
					"relationship_id" => $row->relationship_id,
					"blood_group_id" => $row->blood_group_id
				);
				return $data;
			}
			else{
				return $data;
			}
	}
	
	public function updateMemberFamily($updateArry,$memberFamilyID){
		try {
            $this->db->trans_begin();
			$this->db->where('id', $memberFamilyID);
            $this->db->update('members_family', $updateArry);

            if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        } catch (Exception $err) {
            echo $err->getTraceAsString();
        }
		
	}
	
}