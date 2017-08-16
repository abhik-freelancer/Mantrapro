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
		//echo $this->db->last_query();
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
				coupon_master.coupon_title,
				card_detail.branch_cd
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
					//"workoutdetail" => $this->getWorkOutFacility($rows->card_id,$rows->branch_cd),
					//"healthandfitnessdetail" => $this->getHealthAndFitnessFacility($rows->card_id,$rows->branch_cd)
				);
			}
			return $data;
		}
		else{
			return $data;
		}
	}
	
	public function getWorkOutFacility($cardID,$branch)
	{
		$data = array();
		$sql="SELECT 
				card_detail.qty,
				coupon_master.coupon_title
				FROM card_detail 
				INNER JOIN coupon_master
				ON coupon_master.coupon_id=card_detail.coupon_id
				WHERE card_detail.card_id=".$cardID."
				AND card_detail.branch_cd='".$branch."'
				AND card_detail.sub_description='W/OUT'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"workoutqty" => $rows->qty,
					"workout_coupon_title" => $rows->coupon_title
				);
			}
			return $data;
		}
		else{
			return $data;
		}
	}
	
	public function getHealthAndFitnessFacility($cardID,$branch)
	{
		$data = array();
		$sql="SELECT 
				card_detail.qty,
				coupon_master.coupon_title
				FROM card_detail 
				INNER JOIN coupon_master
				ON coupon_master.coupon_id=card_detail.coupon_id
				WHERE card_detail.card_id=".$cardID."
				AND card_detail.branch_cd='".$branch."'
				AND card_detail.sub_description='H and F'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"HF_qty" => $rows->qty,
					"HF_coupon_title" => $rows->coupon_title
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
	
	// get current year
	//getFinancialYear Using Cuurent Date
	
	public function getFinancialYear(){
		$currDt = date("Y-m-d");
		$data = array();
		$where = "starting_date <= '".$currDt."' AND ending_date >= '".$currDt."'";
		$this->db->select('*');
		$this->db->from('year_master');
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			$row = $query->row();
			
			
			$data = array(
				"year_id" => $row->year_id,
				"starting_date" => $row->starting_date,
				"ending_date" => $row->ending_date,
				"service_tax" => $row->service_tax
			);
			
			return $data;
		}
		else{
			return $data;
		}
	
	}
	
	// Getting Latest Serial No By Branch and Package
	
	public function getSerialNoByBranchAndPackage($branch,$package)
	{
		$latestSerialNo = 0;
		$where = array(
			"CUS_BRANCH" => $branch,
			"CUS_CARD" => $package
		);
		$this->db->select('MAX(customer_master.SRL_NO) AS latestSerialNo')
				 ->from('customer_master')
				 ->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$latestSerialNo = $row->latestSerialNo;
			
		}
		else
		{
			$latestSerialNo = 0;
		}
		return $latestSerialNo;
	}
	
	// Getting Max receipt no by branch and yearId
	public function getMaxReceiptNoByBranchAndYear($branch,$yearID)
	{
		$latestReceiptNo = 0;
		$where = array(
			"BRANCH_CODE" => $branch,
			"FIN_ID" => $yearID
		);
		$this->db->select('MAX(payment_master.RCPT_NO) AS latestReceiptNo')
				 ->from('payment_master')
				 ->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$latestReceiptNo = $row->latestReceiptNo;
			
		}
		else
		{
			$latestReceiptNo = 0;
		}
		return $latestReceiptNo;
	}
	
	public function getLastSerialNoForMemCode()
	{
		$data = array();
		$this->db->select('MAX(serial_table.`latest_srl`) AS maxSerialNo,serial_table.id AS TableID')
				 ->from('serial_table');
				
		$query = $this->db->get();
		//echo $this->db->last_query();
		
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$data = array(
				"maxSerialNo" => $row->maxSerialNo,
				"tableID" => $row->TableID
			);
		}
		else
		{
			$data = array();
		}
		return $data;
	}
	
	public function updateSerialTable($updArry,$tblId)
	{
		try
		{
			$updateArray =array();
			$this->db->trans_begin();
			
			// update serial_master
			$this->db->where('serial_table.id', $tblId);
			$this->db->update('serial_table', $updArry); 
			
			if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } 
			else {
                $this->db->trans_commit();
                return true;
            }
		}
		catch (Exception $exc) 
		{
            echo $exc->getTraceAsString();
        }
	}
	
	
	public function getCardDuration($card)
	{
		$card_duration = 0;
		$where = array(
			"CARD_CODE" => $card,
			"IS_ACTIVE" => 'Y'
		);
		$this->db->select('card_master.CARD_ACTIVE_DAYS')
				 ->from('card_master')
				 ->where($where);
		
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$card_duration = $row->CARD_ACTIVE_DAYS;
			
		}
		else
		{
			$card_duration = 0;
		}
		return $card_duration;
				
		
	}
	
	// Getting Sub Group ID
	
	public function getSubGroupId($param)
	{
		$sub_group_id = 0;
		$sql = "SELECT 
				sub_group_master.sub_group_id,
				sub_group_master.sub_group_desc
				FROM sub_group_master
				LEFT JOIN group_master
				ON group_master.group_id=sub_group_master.group_id
				WHERE sub_group_master.sub_group_desc='".$param."'
				AND sub_group_master.is_active='Y'";
			$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$sub_group_id = $row->sub_group_id;
			
		}
		else
		{
			$sub_group_id = 0;
		}
		return $sub_group_id;
	}
	
	public function insertAllRecords($account_master=array(),$customer_insert=array(),$payment_insert=array(),$online_payment=array())
	{
		
		try
		{
			$updatePayment =array();
			$updateCustomer =array();
			$updateOnlinePayment =array();
		
			$this->db->trans_begin();
			// insert into account_master
            $this->db->insert('account_master', $account_master);
			
			//insert into customer_master
			$this->db->insert('customer_master', $customer_insert);
			$customer_master_id = $this->db->insert_id();
			
			//insert into payment_master
			$this->db->insert('payment_master', $payment_insert);
			$payment_master_id = $this->db->insert_id();
			
			// update payment_master 
			$updatePayment['CUST_ID'] = $customer_master_id;
			$this->db->where('PAYMENT_ID', $payment_master_id);
			$this->db->update('payment_master', $updatePayment); 
			
			// update customer_master 
			$updateCustomer['PAYMENT_ID'] = $payment_master_id;
			$this->db->where('CUS_ID', $customer_master_id);
			$this->db->update('customer_master', $updateCustomer); 
			
			//insert into online_payment_status
			$this->db->insert('online_payment_status', $online_payment);
			$online_payment_id = $this->db->insert_id();
			
			// update online_payment_status
			$updateOnlinePayment['payment_master_id'] = $payment_master_id;
			$this->db->where('id', $online_payment_id );
			$this->db->update('online_payment_status', $updateOnlinePayment); 
			
			
			if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } 
			else {
                $this->db->trans_commit();
                return true;
            }
		}
		catch (Exception $exc) 
		{
            echo $exc->getTraceAsString();
        }
	}
	
	public function insertIntoOnlinePaymentStatus($online_payment=array())
	{
		try
		{
		//insert into online_payment_status
			$this->db->insert('online_payment_status', $online_payment);
			$online_payment_id = $this->db->insert_id();
			
			if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } 
			else {
                $this->db->trans_commit();
                return true;
            }
		}
		catch (Exception $exc) 
		{
            echo $exc->getTraceAsString();
        }
	}
	
	
	
	
}