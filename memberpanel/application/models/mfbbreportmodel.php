<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mfbbreportmodel extends CI_Model{
	
	public function getBloodTestsForMember($cust_id)
	{
		$data = array();
		$sql="select * from blood_test where member_id=".$cust_id;
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               $data[] = $row;
            }
            return $data;
        }
		else
		{
			 return $data ;
		}
	}
	
	public function getBodyComposition($cust_id)
	{
		$data = array();
		$sql="select * from body_composition where member_id=".$cust_id." order by date_of_collection"; 
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               $data[] = $row;
            }
            return $data;
        }
		else
		{
			 return $data ;
		}
	}
	
	public function getGeneralMedical($cust_id)
	{
		$data = array();
		$sql="select * from gen_medical_ass where member_id=".$cust_id." order by date_of_col"; 
		$query = $this->db->query($sql);
		
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               $data[] = $row;
            }
            return $data;
        }
		else
		{
			 return $data ;
		}
	}
	
	public function getBloodTestData($cust_id)
	{
		$data = array();
		$sql="select * from blood_test where member_id=".$cust_id;
		$query = $this->db->query($sql);
		
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               //$data[] = $row;
			   $data[] = array(
			   "date_of_collection" => $row->date_of_collection,
			   "reading" => $row->reading,
			   "bloodtestData" => $this->GetBloodMasterData($row->test_id)
			   );
            }
            return $data;
        }
		else
		{
			 return $data ;
		}
	}
	
	public function GetBloodMasterData($id)
	{
		$data = array();
		$sql="select * from blood_test_master where blood_id=".$id;
		$query = $this->db->query($sql);
		 if ($query->num_rows() > 0) {
				$rows = $query->row();
				 $data = array(
				   "bloodtestname" => $rows->test_desc,
				   "unitname" => $this->getUnitNameById($rows->unit_id)
				   );
            
            return $data;
        }
		else
		{
			 return $data ;
		}
		
	}
	
	public function getUnitNameById($unitid)
	{
		 $unitname = "";
		 $sql="SELECT * FROM unit_master WHERE unit_id =".$unitid;
		 $query = $this->db->query($sql);
		 if ($query->num_rows() > 0) {
			$row = $query->row();
			
			$unitname = $row->unit_desc;
			return $unitname;
		}
		else
		{
			 return $unitname ;
		}
	}
	
	public function getGeneralFitness($cust_id)
	{
		$data = array();
		$sql = "select date_of_collection from vo2_max where member_id=".$cust_id." union select date_of_collection from rm_test where member_id=".$cust_id." union select date_of_collection from sit_up_test where member_id=".$cust_id." union select date_of_collection from push_up_test where member_id=".$cust_id.""; 
		
		$query = $this->db->query($sql);
		//echo $this->db->last_query($query);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               //$data[] = $row;
			   $data[] = array(
			   "date_of_collection" => $row->date_of_collection,
			   "getVO" => $this->getVO($cust_id,$row->date_of_collection),
			   "getPush" => $this->getPush($cust_id,$row->date_of_collection),
			   "getSit" => $this->getSit($cust_id,$row->date_of_collection),
			   "getRM" => $this->getRM($cust_id,$row->date_of_collection)
			   );
            }
            return $data;
        }
		else
		{
			 return $data ;
		}
	}
	
	public function getVO($cust_id,$dt)
	{
		$data = array();
		$sql="select * from vo2_max where member_id=".$cust_id." and date_of_collection between '".$dt."' and '".$dt."'"; 
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               $data[] = $row;
			}
            return $data;
        }
		else
		{
			 return $data ;
		}
	}
	
	public function getPush($cust_id,$dt)
	{
		$data = array();
		$sql="select * from push_up_test where member_id=".$cust_id." and date_of_collection between '".$dt."' and '".$dt."'"; 
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               $data[] = $row;
			}
            return $data;
        }
		else
		{
			 return $data;
		}
	}
	
	public function getSit($cust_id,$dt)
	{
		$data = array();
		$sql="select * from sit_up_test where member_id=".$cust_id." and date_of_collection between '".$dt."' and '".$dt."'"; 
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               $data[] = $row;
			}
            return $data;
        }
		else
		{
			 return $data ;
		}
	}
	
	public function getRM($cust_id,$dt)
	{
		$data = array();
		$sql="select * from rm_test where member_id=".$cust_id." and date_of_collection between '".$dt."' and '".$dt."'"; 
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
               $data[] = $row;
			}
            return $data;
        }
		else
		{
			 return $data;
		}
	}
	
	
	public function getDietCount($cust_id,$mealno)
	{
		$count = 0;
		$sql="select count(*) as cnt from diet_management where member_id=".$cust_id." and $mealno='Y'";
		
		/* echo "<br>";
		echo $this->db->last_query($sql);
		echo "<br>"; */
		
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            $row = $query->row();
			$count = $row->cnt;
			return $count;
        }
		else
		{
			 return $count;
		}
	}
	
	public function getDietCountNo($cust_id,$mealno)
	{
		$count = 0;
		$sql="select count(*) as cnt from diet_management where member_id=".$cust_id." and $mealno!='Y'";
		 
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            $row = $query->row();
			$count = $row->cnt;
			return $count;
        }
		else
		{
			 return $count;
		}
		
	}
	
	
	
}