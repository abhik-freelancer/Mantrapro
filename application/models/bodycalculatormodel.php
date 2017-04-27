<?php 

class bodycalculatormodel extends CI_Model{
	
	public function getLocation(){
		$data = array();
		$sql = "SELECT * FROM location  WHERE loc_code NOT IN ('FE','SELF') ORDER BY loc_name";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			foreach($query->result() as $rows){
				$data[]=array(
					"id" => $rows->loc_id, 
					"loc_code" => $rows->loc_code, 
					"loc_name" => $rows->loc_name 
				);
			}
			return $data;
		}
		else{
			return $data;
		}
	}
	
	public function getBodyFatPercentage($weight,$waist,$hip,$sex){
        
        $healthStatus=array();
        $weight= $weight * 2.20462;
        $mBf=0;
        $bodyFatPercentage=0;
        $bodyFatMass = 0;
        $bodyLeanMass = 0;
        $waistCircumferenceValue=0;
        $waistCircumferenceAssesment="";
        $waistHipRatio = "";
        
        $waistHipRatioValue=0;
        $waistHipRatioAssesment="";
        
        if($sex!=""){
            if($hip!=0 && $waist!=0){
                $waistHipRatio = round(($waist / $hip),2);
            }else{
                $waistHipRatio=0;
            }
            
            if($sex=="M"){
                
                $mBf = -98.42 + 4.15 * $waist - 0.082 * $weight;
                //waist curcumference
                if($waist >0 && $waist <31.5){
                    $waistCircumferenceValue=15;
                    $waistCircumferenceAssesment="Very Low";
                }elseif($waist>=31.5 && $waist<39){
                    $waistCircumferenceValue=5;
                    $waistCircumferenceAssesment="Low";
                }elseif($waist>=39 && $waist<47){
                    $waistCircumferenceValue=0;
                    $waistCircumferenceAssesment="High";
                }elseif($waist >=47){
                    $waistCircumferenceValue=10;
                    $waistCircumferenceAssesment="Very High";
                }
                
                if($waistHipRatio<=1){
                    $waistHipRatioValue=15;
                    $waistHipRatioAssesment="Healthy";
                }else{
                    $waistHipRatioValue = -10;
                    $waistHipRatioAssesment = "High risk";
                }
                
            }else{ 
                $mBf = (-76.76) + (4.15 * $waist) - (0.082 * $weight);
                //waist curcumference
                if($waist >0 && $waist <28.5){
                    $waistCircumferenceValue=15;
                    $waistCircumferenceAssesment="Very Low";
                }elseif($waist>=28.5 && $waist<35.5){
                    $waistCircumferenceValue=5;
                    $waistCircumferenceAssesment="Low";
                }elseif($waist>=35.5 && $waist<43.5){
                    $waistCircumferenceValue=0;
                    $waistCircumferenceAssesment="High";
                }elseif($waist >=43.5){
                    $waistCircumferenceValue=10;
                    $waistCircumferenceAssesment="Very High";
                }
                
                
                if($waistHipRatio<=0.8){
                    $waistHipRatioValue=15;
                    $waistHipRatioAssesment="Healthy";
                }else{
                    $waistHipRatioValue = -10;
                    $waistHipRatioAssesment = "High risk";
                }
            }
            
            
            if($weight!=0){
                $bodyFatPercentage = $mBf / $weight ;
                $bodyFatPercentage = round($bodyFatPercentage * 100,2);
            }
            
            $bodyFatMass = round((($weight * $bodyFatPercentage)/100)/(2.20462));
            $bodyLeanMass = round(($weight - $bodyFatMass),2);
            
            
            
        }
        $healthStatus=array(
			"bodyFatPercentage"=>$bodyFatPercentage,
            "bodyFatMass"=>$bodyFatMass,
            "bodyLeanMass"=>$bodyLeanMass,
			"waisthipRatio" => $waistHipRatio,
            "waistcurcumferencevalue"=>$waistCircumferenceValue,
            "waistcurcumferenceassesment"=>$waistCircumferenceAssesment,
			"waistHipRatioValue"=>$waistHipRatioValue,
            "waistHipRatioAssessment"=>$waistHipRatioAssesment
        );
        return $healthStatus;
        
    }
	
	public function InsertIntoOutsideBodyFat($outsidebodyfat){
		try {
            $this->db->trans_begin();
            $this->db->insert('outside_bodyfat_cal',$outsidebodyfat);

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
            echo $err->getTraceAsString();
        }
	}
	
	
	public function getHarvardTestResult($no_of_sec,$pulse_rate,$gender){
		$harvardtestResult=array();
		$score = 0;
		$rating = "";
		$score = round(($no_of_sec*100)/($pulse_rate*2),2);
		if($gender=="MALE"){
			if($score >=0 && $score<55){$rating = "Poor";}
			elseif($score >=55 && $score<65){$rating = "Below Average";}
			elseif($score >=65 && $score<80){$rating = "Average";}
			elseif($score >=80 && $score<91){$rating = "Above Average";}
			elseif($score >=91){$rating = "Excellent";}
		}
		else{
			if($score >=0 && $score<50){$rating = "Poor";}
			elseif($score >=50 && $score<60){$rating = "Below Average";}
			elseif($score >=60 && $score<75){$rating = "Average";}
			elseif($score >=75 && $score<85){$rating = "Above Average";}
			elseif($score >=85){$rating = "Excellent";}
		}
		
		$harvardtestResult = array(
			"harvardtestScore" =>$score,
			"harvardtestRating" =>$rating
		);
		return $harvardtestResult;
			
	}
	
	public function InsertOutsideHarvardTest($outsideharvardtest){
		
		try {
			$this->db->trans_begin();
			$this->db->insert('outside_harvard_test',$outsideharvardtest);
			
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return false;
			}
			else{
				$this->db->trans_commit();
				return true;
			}
		}
		catch(Exception $err){
			echo $err->getTraceAsString();
		}
		
	}
	
	public function getSitAndReachTestResult($gender,$distance){
		$sitandreachval = array();
		$rating = "";
		
		if($gender=="MALE"){
			
			if($distance < -7.5){
				$rating = "Very Poor";
			}
			elseif($distance >= -7.5 && $distance < -3){
				$rating = "Poor";
			}
			elseif($distance >= -3 && $distance < 0){
				$rating = "Fair";
			}
			elseif($distance>=0 && $distance < 2.5){
				$rating = "Average";
			}
			elseif($distance>=2.5 && $distance < 6.5){
				$rating = "Good";
			}
			elseif($distance>=6.5 && $distance < 10.5){
				$rating = "Excellent";
			}
			elseif($distance >= 10.5){
				$rating ="Super";
			}
 			
			
		}
		else{
			
			if($distance < -6){
				$rating = "Very Poor";
			}
			elseif($distance >= -6 && $distance < -2.5){
				$rating = "Poor";
			}
			elseif($distance >= -2.5 && $distance < 0.5){
				$rating = "Fair";
			}
			elseif($distance>=0.5 && $distance < 4.5){
				$rating = "Average";
			}
			elseif($distance>=4.5 && $distance < 8){
				$rating = "Good";
			}
			elseif($distance>=8 && $distance < 11.5){
				$rating = "Excellent";
			}
			elseif($distance >= 11.5){
				$rating ="Super";
			}
			
		}
		
		$sitandreachval = array(
			"distance" => $distance,
			"rating" => $rating
		);
		
		return $sitandreachval;
		
	}
	
	public function InsertintoSitAndReach($outsidesitandreach){
		
		try {
			$this->db->trans_begin();
			$this->db->insert('outside_sit_and_reach',$outsidesitandreach);
			
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return false;
			}
			else{
				$this->db->trans_commit();
				return true;
			}
		}
		catch(Exception $err){
			echo $err->getTraceAsString();
		}
		
	}
	
	public function getPushUpTestResult($gender,$age,$repetitions){
		$pushupresult = array();
		$popAvg = 0;
		$StandDev=0;
		$Zscore=0;
		$score = 0;
		$rating="";
		
		if($gender=="MALE"){
			$popAvg = round(70.592*pow(10,-0.010502*$age));
		}
		elseif($gender=="FEMALE"){
			$popAvg = round(35.405-0.49*$age);
		}
		
		if ($gender == "MALE" && $repetitions<=$popAvg) {
			$StandDev = 179.35*pow($age,-0.69961);
		}
		elseif ($gender == "MALE" && $repetitions>$popAvg) {
			 $StandDev = 14.5 ;
		}
		
		if ($gender == "FEMALE" && $repetitions<=$popAvg) {
			 $StandDev = 28.155-0.39*$age ;
		}
		elseif ($gender == "FEMALE" && $repetitions>$popAvg) {
			 $StandDev = 22.279+0.084286*$age-0.0028571*pow($age,2) ;
		}
		
		
		$Zscore = ($repetitions-$popAvg)/$StandDev;
		$PE= exp(-1.8355027*(abs($Zscore)-0.23073201)) ;
		$PercRegress = -0.41682992*($PE-1)/($PE+1)+0.58953708 ;
		if ($Zscore > 0) {
			$score = round($PercRegress*100) ;
		}
		elseif($Zscore <= 0) {
			$score = round((1-$PercRegress)*100) ;
		}
		
		if ($Zscore >= 1) {
			 $rating ="Excellent";
		}
		elseif ($Zscore < 1 && $Zscore >= 0.5) {
			 $rating ="Good";
		}
		elseif ($Zscore < 0.5 && $Zscore >= -0.5) {
			 $rating ="Average";
		}
		elseif ($Zscore < -0.5 && $Zscore >= -1) {
			 $rating ="Fair";
		}
		elseif ($Zscore < -1) {
			 $rating ="Poor";
		}
		
		$pushupresult = array(
			"popaverage" => $popAvg,
			"score" => $score,
			"rating" => $rating
		);
		return $pushupresult;
	}
	

    public function InsertintoOutsidePushUp($outsidepushuptest){
		
		try {
			$this->db->trans_begin();
			$this->db->insert('outside_pushup_test',$outsidepushuptest);
			
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return false;
			}
			else{
				$this->db->trans_commit();
				return true;
			}
		}
		catch(Exception $err){
			echo $err->getTraceAsString();
		}
		
	}
	
	public function getSitUpTestResult($gender,$age,$repetitions){
		$situpresult = array();
		$popAvg = 0;
		$StandDev=0;
		$Zscore=0;
		$score = 0;
		$rating="";
		
		if($gender == "MALE") {
			$popAvg = round(66.81*pow(10,-0.009241*$age));
		}
		elseif ($gender == "FEMALE") {
		    $popAvg = round(66.864*pow(10,-0.011029*$age));
		}
		if($repetitions<=$popAvg) {
			$StandDev =6.5;
		}
		elseif($repetitions>$popAvg) {
		    $StandDev =7.5;
		}
		$Zscore = ($repetitions-$popAvg)/$StandDev;
		$PE= exp(-1.8355027*(abs($Zscore)-0.23073201));
	    $PercRegress= -0.41682992*($PE-1)/($PE+1)+0.58953708;
		if($Zscore > 0) {
			$score = round($PercRegress*100);
		}
		elseif($Zscore <= 0) {
			$score = round((1-$PercRegress)*100);
		}
		if ($Zscore >= 1) {
			$rating ="Excellent";
		}
	    elseif($Zscore < 1 && $Zscore >= 0.5) {
			$rating ="Good";
		}
		elseif($Zscore < 0.5 && $Zscore >= -0.5) {
			$rating ="Average";
		}
		elseif($Zscore < -0.5 && $Zscore >= -1) {
			$rating ="Fair";
		}
		elseif($Zscore < -1) {
			$rating ="Poor";
		}
		
		$situpresult = array(
			"popaverage" => $popAvg,
			"score" => $score,
			"rating" => $rating
		);
		return $situpresult;
	}
	
	public function InsertintoOutsideSitUp($outsidesituptest){
		
		try {
			$this->db->trans_begin();
			$this->db->insert('outside_situp_test',$outsidesituptest);
			
			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return false;
			}
			else{
				$this->db->trans_commit();
				return true;
			}
		}
		catch(Exception $err){
			echo $err->getTraceAsString();
		}
		
	}
	
	
	
	
}