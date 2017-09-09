<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class archivereportmodel extends CI_Model{
    
	
	public function getMemberArchiveReportByPhone($cus_phone)
	{
		$data = array();
		$sql = "SELECT customer_master.MEMBERSHIP_NO FROM customer_master WHERE customer_master.CUS_PHONE='".$cus_phone."'";
		$query = $this->db->query($sql);
		
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
                $data[] = array(
					"scanned_report" => $this->getMemberScannedReport($row->MEMBERSHIP_NO)
				);
            }
            return $data;
        } else {

            return $data;
        }
	}
	
	private function getMemberScannedReport($membership)
	{
		$data = array();
		$sql = "SELECT * from scanned_report WHERE scanned_report.membership_no='".$membership."'";
		$query = $this->db->query($sql);
		
		if($query->num_rows() > 0) {
			
            foreach($query->result() as $row){
                $data[] = array(
					"date_of_report" => $row->date_of_report,
					"date_of_entry" => $row->date_of_report,
					"therapy_name" => $this->getTherapyById($row->therapy_id),
					"membership_no" => $row->membership_no,
					"validity_string" => $row->validity_string,
					"report_path" => $row->report_path,
				);
            }
            return $data;
        } else {

            return $data;
        }
	}
	
	
	public function getTherapyById($therapyid)
	{
		$therapy_name = "";
		$sql = "SELECT * from therapy_type WHERE therapy_type.id=".$therapyid;
		$query = $this->db->query($sql);
		
		if($query->num_rows() > 0) {
            $row = $query->row();
			$therapy_name = $row->therapy_type;
			return $therapy_name;
        }
		else{
			return $therapy_name;
		}
	}
	

}
