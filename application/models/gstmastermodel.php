<?php 
class gstmastermodel extends CI_Model{
	
	public function getGSTRate($gstType)
	{
		$data = array();
		$where = array(
			"gst_master.gstType" => $gstType
		);
		$this->db->select('*');
		$this->db->from('gst_master');
		$this->db->where($where);
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"gstID" => $rows->id,
					"rate" => $rows->rate
				);
			}
			return $data;
		}
		else
		{
			return $data;
		}
	}
	
	public function GetGSTRateByIdAndType($type,$id)
	{
		$rate = 0;
		$where = array(
			"gst_master.gstType" => $type,
			"gst_master.id" => $id
		);
		
		$this->db->select('*');
		$this->db->from('gst_master');
		$this->db->where($where);
		$query = $this->db->get();
	//	echo $this->db->last_query();
		
		if($query->num_rows()>0){
			
			$row = $query->row();
			$rate = $row->rate;
		}
		
		return $rate;
	}
	
	
}