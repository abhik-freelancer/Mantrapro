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
	
	public function getMemberFamilyByRelation($cutomerID = NULL,$relationshipID = NULL){
		$data = array();
		$where = array(
			"members_family.membership_id" => $cutomerID,
			"members_family.relationship_id" => $relationshipID
		);
			$this->db->select("members_family.id,members_family.name")
					 ->from("members_family")
					 ->where($where)
					 ->order_by("members_family.name","DESC");
					 
			$query = $this->db->get();
			
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){
				$data[] = array(
					"id" => $rows->id,
					"familyname" => $rows->name
				);
			}
			return $data;
		}
		else{
			return $data;
		}
		
	}
	
	
	public function getBloodPresureData($fromDt=NULL,$toDate=NULL,$relatinshipId=NULL,$memFamilyId=NULL,$customerId=NULL){
		$data = array();
		if($fromDt!="" AND $toDate!=""){
			$dateWhere = ' AND collection_date BETWEEN "'. date('Y-m-d',strtotime($fromDt)). '" AND "'.date('Y-m-d',strtotime($toDate)).'"';
		}
		else{
			$dateWhere = '';
			}
		if($relatinshipId!="0"){
			$whereRelationshipId = " AND member_family_bp_test.relationship_id=".$relatinshipId;
		}
		else{
			$whereRelationshipId = '';
		}
		if($relatinshipId!="0" AND $memFamilyId!="0"){
			$whRelationshpAndFamily = " AND member_family_bp_test.relationship_id=".$relatinshipId." AND member_family_bp_test.member_family_id=".$memFamilyId."";
			
		}
		else{
			$whRelationshpAndFamily="";
		}
		
		$sql = "SELECT 
			  member_family_bp_test.`id` AS bp_test_ID,
			  member_family_bp_test.`systolic`,
			  member_family_bp_test.`diastolic`,
			  member_family_bp_test.`pulse_rate`,
			  member_family_bp_test.`collection_date`,
			  members_family.`name`,
			  relationship_master.`relation`
			FROM
			  member_family_bp_test 
			  INNER JOIN members_family
			  ON members_family.`id` = member_family_bp_test.`member_family_id`
			  INNER JOIN relationship_master
			  ON relationship_master.`id`=members_family.`relationship_id`
			WHERE members_family.`membership_id`=".$customerId. " ".$dateWhere."".$whereRelationshipId." ".$whRelationshpAndFamily." ";
		
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"bpTestID" => $rows->bp_test_ID,
					"name" => $rows->name,
					"relation" => $rows->relation,
					"collection_date" => $rows->collection_date,
					"systolic" => $rows->systolic,
					"diastolic" => $rows->diastolic,
					"pulse_rate" => $rows->pulse_rate,
					"userid" => 0,
					"dataFrom" => "F" // F = Family , data taken from table member_family_bp_test
				);
			}
			return $data;
		}else{
			return $data;
		}
	
	}
	
	function getMemberBloodPressureData($fromDt=NULL,$toDate=NULL,$customerId=NULL){
		$data = array();
		if($fromDt!="" AND $toDate!=""){
			$dateWhere = ' AND collection_date BETWEEN "'. date('Y-m-d',strtotime($fromDt)). '" AND "'.date('Y-m-d',strtotime($toDate)).'"';
		}
		else{
			$dateWhere = '';
			}
		
		$sql = "SELECT * FROM gen_medical_ass WHERE gen_medical_ass.member_id=".$customerId." ".$dateWhere." ORDER BY date_of_col DESC" ;
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"bpTestID" => $rows->tran_id,
					"name" => $rows->mmbership_no,
					"relation" => 'Self',
					"collection_date" => $rows->date_of_col,
					"systolic" => $rows->systolic_msr,
					"diastolic" => $rows->diastolic_msr,
					"pulse_rate" => $rows->pulse_msr,
					"userid" => $rows->user_id,
					"dataFrom" => "S" // S = Self (member self data) , Data taken from gen_medical_ass table
				);
			}
			return $data;
		}else{
			return $data;
		}
	}
	
	public function getBloodPressureDataById($bldprID = NULL,$from = ""){
		if($from=="S"){
			$data =  $this->getBloodPrsrMemberdataById($bldprID);
		}
		else{
			// $from == "F"
			$data =  $this->getBloodPrsrFamilyDataById($bldprID);
		}
		return $data;
	}
	
	public function getBloodPrsrMemberdataById($bldprID){
		$data = array();
		$where = array("tran_id"=>$bldprID);
		$this->db->select("*")
				->from("gen_medical_ass")
				->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0){
				$row = $query->row();
				$data = array(
					"bpTestID" => $row->tran_id,
					"nameid" => $row->mmbership_no,
					"name" => "",
					"relation" => 18 , // Self
					"collection_date" => $row->date_of_col,
					"systolic" => $row->systolic_msr,
					"diastolic" => $row->diastolic_msr,
					"pulse_rate" => $row->pulse_msr,
					"dataFrom" => "S" // S = Self (member self data) , Data taken from gen_medical_ass table
				);
				return $data;
			}
			else{
				return $data;
			}
	}
	
	public function getBloodPrsrFamilyDataById($bldprID){
		$data = array();
		$where = array("member_family_bp_test.id"=>$bldprID);
		$this->db->select("member_family_bp_test.id,
						   member_family_bp_test.member_family_id,
						   member_family_bp_test.relationship_id,
						   member_family_bp_test.collection_date,
						   member_family_bp_test.systolic,
						   member_family_bp_test.diastolic,
						   member_family_bp_test.pulse_rate,
						   members_family.name
						 ")
				->from("member_family_bp_test")
				->join("members_family","members_family.id=member_family_bp_test.member_family_id","inner")
				->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0){
				$row = $query->row();
				$data = array(
					"bpTestID" => $row->id,
					"nameid" => $row->member_family_id,
					"name" => $row->name,
					"relation" => $row->relationship_id,
					"collection_date" => $row->collection_date,
					"systolic" => $row->systolic,
					"diastolic" => $row->diastolic,
					"pulse_rate" => $row->pulse_rate,
					"dataFrom" => "S" // S = Self (member self data) , Data taken from gen_medical_ass table
				);
				return $data;
			}
			else{
				return $data;
			}
	}
	
	
	public function insertIntoMemberFamilyBPTest($insertArray){
		try{
            $this->db->trans_begin();
            $this->db->insert('member_family_bp_test', $insertArray);

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
	
	public function insertIntoGeneralMedicalAssmnt($insertArray){
		try{
            $this->db->trans_begin();
            $this->db->insert('gen_medical_ass', $insertArray);

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
	
}







