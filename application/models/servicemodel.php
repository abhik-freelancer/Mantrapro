<?php
class servicemodel extends CI_Model{
	
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
	
	public function getBranchWiseRateChart($branch){
		$data = array();
		$sql = "SELECT * FROM product_category";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"start_letter"=>$rows->start_letter,
					"category_name"=>$rows->category_name,
					"branch_name" => $this->getBranchByCode($branch),
					"package_detail" =>$this->getBranchWisePackageRate($branch,$rows->start_letter)
				);
			}
			return $data;
		}
		else{
			return $data;
		}
		
	}
	
	public function getBranchWisePackageRate($branch,$category){
		$data = array();
		$sql = "SELECT 
			  rate_detail.branch_code,
			  rate_detail.card_code,
			  card_master.CARD_ID,
			  card_master.CARD_DESC,
			  card_master.CARD_CODE,
			  card_master.CARD_PREFIX,
			  card_master.CARD_ACTIVE_DAYS,
			  rate_detail.package_rate,
			  rate_detail.renewal_rate 
			FROM
			  `rate_detail` 
			  INNER JOIN card_master 
				ON card_master.CARD_ID = rate_detail.card_id 
			WHERE `rate_detail`.branch_code = '".$branch."' 
			  AND card_master.CARD_PREFIX = '".$category."' 
			  AND card_master.IS_ACTIVE = 'Y' 
			ORDER BY card_master.CARD_CODE ";
		
		$query = $this->db->query($sql);
         if($query->num_rows()> 0){
              foreach ($query->result() as $rows) {
                $data[] = array(
                    "card_id"=>$rows->CARD_ID,
                    "card_code"=>$rows->card_code,
                    "card_name"=>$rows->CARD_DESC,
                    "branch_code"=>$rows->branch_code,
					"card_active_dys" =>$rows->CARD_ACTIVE_DAYS,
					"card_duration" =>$this->getPackageDuration($rows->CARD_ACTIVE_DAYS),
					"package_rate" =>$rows->package_rate,
					"renewal_rate" =>$rows->renewal_rate
                    );
            }
            return $data;
             
        }
		else{
             return $data;
         }
		
	}
	
	public function getBranchByCode($branch_cd){
		$branch_name = "";
		$sql = "SELECT branch_master.BRANCH_NAME FROM branch_master WHERE branch_master.BRANCH_CODE='".$branch_cd."'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$result = $query->row();
			$branch_name = $result->BRANCH_NAME;
		}
		else
		{
			$branch_name = "";
		}
		return $branch_name ;
		
	}
	
	
	
	public function getCardDetailById($cardID,$branch){
		$data = array();
		$sql="SELECT 
			  card_master.CARD_ID,
			  card_master.CARD_DESC,
			  card_master.CARD_CODE,
			  card_master.CARD_ACTIVE_DAYS,
			  rate_detail.`package_rate`,
			  rate_detail.`renewal_rate`,
			  rate_detail.`branch_code`
			FROM
			  card_master 
			INNER JOIN rate_detail
			ON rate_detail.`card_id` = card_master.CARD_ID  
			WHERE card_master.IS_ACTIVE = 'Y' 
			AND card_master.CARD_ID =".$cardID." AND rate_detail.`branch_code`='".$branch."'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$row = $query->row();
			$data = array(
				"card_id" => $row->CARD_ID,
				"card_code" => $row->CARD_CODE,
				"card_desc" => $row->CARD_DESC,
				"card_duration" => $this->getPackageDuration($row->CARD_ACTIVE_DAYS),
				"package_rate" => $row->package_rate,
				"renewal_rate" => $row->renewal_rate
				
			);
			return $data;
		}
		else{
			return $data;
		}
	}
	
	
	public function getComplFacilityDetailByBranch($cardID,$branch){
		$data = array();
		$sql = "SELECT card_detail.card_id,
				card_detail.card_code,
				card_detail.detail_description,
				card_detail.qty,
				coupon_master.coupon_title
				FROM card_detail 
				INNER JOIN coupon_master
				ON coupon_master.coupon_id=card_detail.coupon_id
				WHERE card_detail.card_id=".$cardID."
				AND card_detail.branch_cd='".$branch."'
				AND card_detail.detail_description='Complimentary'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"card_id" => $rows->card_id,
					"card_code" => $rows->card_code,
					"detail_description" => $rows->detail_description,
					"qty" => $rows->qty,
					"coupon_title" => $rows->coupon_title
				);
			}
			return $data;
		}
		else{
			return $data;
		}
	}
	
	public function getPackagePartFacilityDetailByBranch($cardID,$branch){
		$data = array();
		$sql = "SELECT card_detail.card_id,
				card_detail.card_code,
				card_detail.detail_description,
				card_detail.qty,
				coupon_master.coupon_title
				FROM card_detail 
				INNER JOIN coupon_master
				ON coupon_master.coupon_id=card_detail.coupon_id
				WHERE card_detail.card_id=".$cardID."
				AND card_detail.branch_cd='".$branch."'
				AND card_detail.detail_description='Part of Package'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"card_id" => $rows->card_id,
					"card_code" => $rows->card_code,
					"detail_description" => $rows->detail_description,
					"qty" => $rows->qty,
					"coupon_title" => $rows->coupon_title
				);
			}
			return $data;
		}
		else{
			return $data;
		}
	}
	
	
	public function getPackageDuration($card_duration){
		$duration = "";
		if($card_duration>=30){
			$getmonth = floor($card_duration/30);
				if($getmonth>=12){
					$getyear = floor($getmonth/12);
				if($getyear>1){
					$duration = $getyear." Years";
					}
					else{
						$duration = $getyear." Year";
						}
					}
					else{
						if($getmonth>1){
							$duration = $getmonth." Months";
						}else{
							$duration = $getmonth." Month";
						}
					}
		}
		else{
			$duration =$card_duration." Days";
		}
		
	return $duration;
	}
	
	
}