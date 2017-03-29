<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class applicationsmodel extends CI_Model{
    
	public function getApplicationExtLimitDys($cardCode){
		$extensionDys = 0;
		$where = array("CARD_CODE" => $cardCode);
		$this->db->select('application_limit_days');
		$this->db->from('card_master');
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0) {
            $row = $query->row();
			$extensionDys = $row->application_limit_days;
			return $extensionDys;
        }
		else{
			return $extensionDys;
		}
		
	}
	
	public function getIsMemberAlreadyApplied($membershipno,$validity){
		$isApplied = '';
		$where = array(
		"membershipno" => $membershipno,
		"validity_string" => $validity
		);
		$this->db->select('*');
		$this->db->from('members_application_ext');
		$this->db->where($where);
		$query = $this->db->get();
		$total_rows = $query->num_rows();
		if($total_rows>0){
			 $isApplied = 'Y';
		}
		else{
			$isApplied = 'N';
		}
		return $isApplied;
		
	}
	
	public function insertMemberApplicationExt($insertArray){
		try {
                $this->db->trans_begin();
                $this->db->insert('members_application_ext', $insertArray);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        } catch (Exception $err) {
            echo $exc->getTraceAsString();
        }
	}
    
}
