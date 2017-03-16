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
					"dietry_mamngment_id"=>$rows->tran_id,
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
                    "weight"=>$rows->weight,
					"userid" => $rows->user_id
					);
            
                
                   
              }
               return $data;
             
         }else{
             return $data;
         }
		
	}
	
	public function getDietryManagmentDataById($dietManagmentId=NULL){
		$data = array();
		$where = array("tran_id" => $dietManagmentId);
		
		$this->db->select('*')
				 ->from('diet_management')
		         ->where($where);
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			$row = $query->row();
			$data = array(
			"dietry_mamngment_id"=>$row->tran_id,
            "member_id"=>$row->member_id,
            "membership_no"=>$row->membership_no,
            "date_of_entry"=>$row->date_of_entry,
            "date_of_collection"=>$row->date_of_collection,
            "meal1"=>$row->meal1,
            "meal2"=>$row->meal2,
            "meal3"=>$row->meal3,
            "meal4"=>$row->meal4,
            "meal5"=>$row->meal5,
            "meal6"=>$row->meal6,
            "meal7"=>$row->meal7,
            "meal8"=>$row->meal8,
            "carbs"=>$row->carbs,
            "protein"=>$row->protein,
            "weight"=>$row->weight
			);
			return $data;
		}
		else{
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
	
	// updateMemberDietarymanagment
	
	public function updateMemberDietarymanagment($updArry,$dietmanagmentID){
		 try {
            $this->db->trans_begin();
			$this->db->where('tran_id', $dietmanagmentID);
            $this->db->update('diet_management', $updArry);

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
	
	
	// get Diet Chart List of Member
	public function getDietChartList($membership_no){
		$data = array();
		$where = array(
			"membership_no" => $membership_no
		);
		$this->db->select('*')
				  ->from('diet_chart')
				  ->where($where)
				  ->order_by('diet_chart.diet_date','desc');
		$query = $this->db->get();
		//$this->db->last_query();
		
		if($query->num_rows() > 0){
			foreach($query->result() as $rows){
				$data[] = array(
				"dietchartid" => $rows->id,
				"membership_no" => $rows->membership_no,
				"diet_date" => $rows->diet_date,
				"diet_content" => $rows->diet_content
				);
			}
			return $data;
		}
		else{
			return $data;
		}
		
	}
	
	// get Diet Chart Member
	
	public function getDietChart($dietchartId = NULL){
		$data = array();
		$where = array("id"=>$dietchartId);
		
		$this->db->select('*')
				 ->from('diet_chart')
				 ->where($where)
				 ->order_by('diet_date','DESC');
		$query = $this->db->get();
		if($query->num_rows()>0){
			$row = $query->row();
			$data = array(
				"dietchartid" => $row->id,
				"diet_date" => $row->diet_date,
				"diet_content" => $row->diet_content
			);
		}
		else{
			$data ;
		}
		return $data;
		
		
	}
	
	
	
}