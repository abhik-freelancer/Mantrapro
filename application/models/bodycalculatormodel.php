<?php 

class bodycalculatormodel extends CI_Model{
	
	public function getLocation(){
		$data = array();
		$sql = "SELECT * FROM location ORDER BY loc_name";
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
            echo $exc->getTraceAsString();
        }
	}
	
}