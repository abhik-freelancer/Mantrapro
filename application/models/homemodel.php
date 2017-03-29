<?php

class homemodel extends CI_Model{
    
   public function getWebBranch(){
	   $data=array();
	   $sql = "SELECT id,branch_name,branch_code FROM `web_branch` ORDER BY branch_name";
	    $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "branch_name"=>$rows->branch_name,
                    "branch_code"=>$rows->branch_code
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
    }
	 
	public function InsertIntoFreeGuestPass($guestPassData){
		try{
                $this->db->insert("free_guest_pass",$guestPassData);
				if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
				} 
				else {
                $this->db->trans_commit();
                return true;
				}
			}
			catch (Exception $err) {
            echo $exc->getTraceAsString();
			}
	}
	
	
	public function getAllTestimonial(){
		$data=array();
		$sql = "SELECT * FROM testimonial WHERE testimonial.`is_active`='Y' ORDER BY `id` DESC";
		 $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "name"=>$rows->name,
                    "occupation"=>$rows->occupation,
                    "testimonialImage"=>$rows->testimonialImage,
                    "location"=>$rows->location,
                    "comment"=>$rows->comment,
					"excerpt_comment"=>$this->getExcerptWord($rows->comment,20)
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
	} 
	
	
	
	public function getTestimonialForActiveCls(){
		$data=array();
		$sql = "SELECT * FROM testimonial WHERE testimonial.`is_active`='Y' ORDER BY `id` DESC LIMIT 2 ";
		 $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "name"=>$rows->name,
                    "occupation"=>$rows->occupation,
                    "testimonialImage"=>$rows->testimonialImage,
                    "location"=>$rows->location,
                    "comment"=>$this->getExcerptWord($rows->comment,25)
                  //  "comment"=>$rows->comment
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
	} 
	
	public function getTestimonialForWithoutActiveCls(){
		$data=array();
		$sql = "SELECT * FROM testimonial WHERE testimonial.`is_active`='Y' ORDER BY `id` DESC LIMIT 100 OFFSET 2 ";
		 $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "name"=>$rows->name,
                    "occupation"=>$rows->occupation,
                    "testimonialImage"=>$rows->testimonialImage,
                    "location"=>$rows->location,
                    "comment"=>$this->getExcerptWord($rows->comment,25)
                   // "comment"=>$rows->comment
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
	} 
	
	public function getExcerptWord($string,$limit){
		$words = explode( ' ', $string );
		return implode( ' ', array_slice( $words, 0, $limit ));
	}
	
	
	public function getAllEvents($today_dt){
		$data = array();
		$sql = "SELECT 
				id,
				LEFT(event_title, 50) AS event_title,
				LEFT(event_desc, 100) AS short_desc,
				event_date,from_time,to_time,
				branch_master.BRANCH_NAME
				FROM event
				LEFT JOIN branch_master 
				ON branch_master.BRANCH_ID = event.branch
				WHERE event.`event_date` >= '".$today_dt."' AND event.`is_active`='Y' GROUP BY event_date ORDER BY event_date ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"id" => $rows->id,
					"event_title" => $rows->event_title,
					"short_desc" => $rows->short_desc,
					"branch" => $rows->BRANCH_NAME,
					"event_date" => $rows->event_date,
					"from_time" => $rows->from_time,
					"to_time" => $rows->to_time
				);
			}
			return $data;
		}
		else{
			return $data;
		}
	}
	
	
	public function getEventDetails($eventDt){
		$data = array();
		$sql = "SELECT 
				id,
				event_title,
				event_desc,
				event_date,from_time,to_time,
				branch_master.BRANCH_NAME
				FROM event
				LEFT JOIN branch_master 
				ON branch_master.BRANCH_ID = event.branch WHERE 
				event.`event_date` BETWEEN '".$eventDt."' AND '".$eventDt."' AND event.`is_active`='Y'";
				
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"id" => $rows->id,
					"event_title" => $rows->event_title,
					"event_desc" => $rows->event_desc,
					"branch" => $rows->BRANCH_NAME,
					"event_date" => $rows->event_date,
					"from_time" => $rows->from_time,
					"to_time" => $rows->to_time
				);
			}
			return $data;
		}
		else{
			return $data;
		}
		
	}
	
	public function InsertIntoMayIHelp($insertMayIHelpData){
		try{
            $this->db->insert("may_i_help_you",$insertMayIHelpData);
			if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
				} 
				else {
                $this->db->trans_commit();
                return true;
				}
			}
			catch (Exception $err) {
            echo $exc->getTraceAsString();
			}
	}
	
	public function getLatestOffer(){
		$data = array();
		 $sql = "SELECT * FROM latest_offers WHERE latest_offers.is_active='Y'";
		 $query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "id"=>$rows->id,
                    "offer_title"=>$rows->offer_title,
                    "offer_desc"=>$rows->offer_desc,
                    "offer_image"=>$rows->offer_image
                    );
            }
			return $data;
        }
		else{
             return $data;
         }
	}
	
	
	
}