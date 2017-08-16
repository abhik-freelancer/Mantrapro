<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of healthassetvaluemodel
 *
 * @author pc1
 */
class healthassetvaluemodel extends CI_Model {
 
    public function getLatestHAVdata($membershipno,$validity){
        $havdata=array();
       $sql = "SELECT 
				hav_master.id, 
				hav_master.hav_total_score,
				hav_master.hav_total_percent,
				hav_master.hav_total_max, 
				hav_master.total_attendence,
				hav_master.month,
				hav_master.year 
				FROM hav_master 
				WHERE hav_master.membership_no='".$membershipno."' AND hav_master.validity_string = '".$validity."' 
				ORDER BY hav_master.id DESC LIMIT 1";
				
        
        
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $havdata =array(
                    "id" => $row->id,
                    "hav_total_score"=>$row->hav_total_score,
                    "hav_total_percent"=>$row->hav_total_percent,
                    "hav_total_max"=>$row->hav_total_max,
                    "total_attendence"=>$row->total_attendence,
                    "month"=>$row->month,
                    "year"=>$row->year
                        
                    
                );
                    
        }
        
        return $havdata;
    }
    
    public function getLatestHAVBloodPresure($membershipno,$validity){
        $data=array();
        $sql="SELECT 
                `hav_master`.`id`,
                DATE_FORMAT(`hav_master`.`bp_col_date`,'%d-%m-%Y') AS bp_col_date,
                `hav_master`.`bp_systolic`,
                `hav_master`.`bp_diastolic`,hav_master.`bp_remarks`,
                 hav_master.`bp_score`
                FROM
                `hav_master` WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "bp_col_date"=>$row->bp_col_date,
                    "bp_systolic"=>$row->bp_systolic,
                    "bp_diastolic"=>$row->bp_diastolic,
                    "bp_remarks"=>$row->bp_remarks,
                    "bp_score"=>$row->bp_score
                   
                        
                    
                );
                    
        }
        
        return $data;         
        
    }
    
    public function getLatestOxygenSaturationLevel($membershipno,$validity){
        
        $data=array();
        $sql="SELECT 
			`hav_master`.`id`,
			 DATE_FORMAT(`hav_master`.`oxy_date`,'%d-%m-%Y') AS oxyDt,
			`hav_master`.`oxy_sat_level`,
			`hav_master`.`oxy_score`,
			`hav_master`.`oxy_remarks`,
			`hav_master`.`oxy_max`
			 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "oxyDt"=>$row->oxyDt,
                    "oxy_sat_level"=>$row->oxy_sat_level,
                    "oxy_score"=>$row->oxy_score,
                    "oxy_remarks"=>$row->oxy_remarks,
                    "oxy_max"=>$row->oxy_max
                    
                );
                    
        }
        
        return $data; 
        
    }
    
    public function getLatestStrengthRmData($membershipno,$validity){
        
        $data=array();
        $sql="SELECT 
			`hav_master`.`id`,
			DATE_FORMAT(`hav_master`.`rm_date`,'%d-%m-%Y') AS rmDate,
			`hav_master`.`rm_exc_desc`,
			`hav_master`.`rm_weight_lftd`,
			`hav_master`.`rm_result`,
			`hav_master`.`rm_remarks`,
			`hav_master`.`rm_score`,
			`hav_master`.`rm_max`
			 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "rmDate"=>$row->rmDate,
                    "rm_exc_desc"=>$row->rm_exc_desc,
                    "rm_weight_lftd"=>$row->rm_weight_lftd,
                    "rm_result"=>$row->rm_result,
                    "rm_remarks"=>$row->rm_remarks,   
                    "rm_score"=>$row->rm_score,
                    "rm_max"=>$row->rm_max
                    
                );
                    
        }
        
        return $data; 
        
    }
    
    
    public function getLatestVo2Max($membershipno,$validity){
        
        $data=array();
        $sql=" 
			SELECT 
                        `hav_master`.`id`,
                         DATE_FORMAT(`hav_master`.`vo2max_date`,'%d-%m-%Y') AS vo2max_date,
                        `hav_master`.`vo2max_heart_rate`,
                        `hav_master`.`vo2max_duration`,
                        `hav_master`.`vo2max_mets`,
                        `hav_master`.`vo2max_vomax`,
                        `hav_master`.`vo2max_score`,
                        `hav_master`.`vo2max_max_score`,
                        `hav_master`.`vo2max_rmks`
		 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "vo2max_date"=>$row->vo2max_date,
                    "vo2max_heart_rate"=>$row->vo2max_heart_rate,
                    "vo2max_duration"=>$row->vo2max_duration,
                    "vo2max_vomax"=>$row->vo2max_vomax,
                    "vo2max_score"=>$row->vo2max_score,   
                    "vo2max_rmks"=>$row->vo2max_rmks,
                    "vo2max_mets"=>$row->vo2max_mets
                    
                );
                    
        }
        
        return $data; 
        
    }
    
    public function getLatestSitupTest($membershipno,$validity){
        
        $data=array();
        $sql=" SELECT 
		`hav_master`.`id`,
		 DATE_FORMAT(`hav_master`.`site_up_date`,'%d-%m-%Y') AS siteUpDt,
		`hav_master`.`site_up_repetation`,
		`hav_master`.`site_up_score`,
		`hav_master`.`site_up_max`,
		`hav_master`.`site_up_rmks`
		 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "siteUpDt"=>$row->siteUpDt,
                    "site_up_repetation"=>$row->site_up_repetation,
                    "site_up_score"=>$row->site_up_score,
                    "site_up_max"=>$row->site_up_max,
                    "site_up_rmks"=>$row->site_up_rmks
                   
                    
                );
                    
        }
        
        return $data; 
        
    }
    
    
    
    
    public function getLatestPushUp($membershipno,$validity){
        $data=array();
        $sql="SELECT 
		`hav_master`.`id`,
		 DATE_FORMAT(`hav_master`.`push_up_date`,'%d-%m-%Y') AS pushUpDt,
		`hav_master`.`push_up_repetation`,
		`hav_master`.`push_up_score`,
		`hav_master`.`push_up_max`,
		`hav_master`.`push_up_rmks`
		 FROM `hav_master` WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "pushUpDt"=>$row->pushUpDt,
                    "push_up_repetation"=>$row->push_up_repetation,
                    "push_up_score"=>$row->push_up_score,
                    "push_up_max"=>$row->push_up_max,
                    "push_up_rmks"=>$row->push_up_rmks
                );
        }
        
        return $data;  
    }
	
	public function getLatestSitAndReach($membershipno,$validity){
		$data = array();
		 $sql="SELECT 
		`hav_master`.`id`,
		 DATE_FORMAT(`hav_master`.`sit_nd_reach_date`,'%d-%m-%Y') AS sitandreachDt,
		`hav_master`.`sit_nd_reach_age`,
		`hav_master`.`sit_nd_reach_distance`,
		`hav_master`.`sit_nd_reach_avg_pop`,
		`hav_master`.`sit_nd_reach_score`,
		`hav_master`.`sit_nd_reach_rating`
		 FROM `hav_master` WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "sitandreachDt"=>$row->sitandreachDt,
                    "sit_nd_reach_age"=>$row->sit_nd_reach_age,
                    "sit_nd_reach_distance"=>$row->sit_nd_reach_distance,
                    "sit_nd_reach_avg_pop"=>$row->sit_nd_reach_avg_pop,
                    "sit_nd_reach_score"=>$row->sit_nd_reach_score,
                    "sit_nd_reach_rating"=>$row->sit_nd_reach_rating
                );
        }
		return $data;
        
	}
	
	public function getLatestHarvardStepTest($membershipno,$validity){
		$sql = "SELECT 
			`hav_master`.`id`,
			 DATE_FORMAT(`hav_master`.`harvard_col_dt`,'%d-%m-%Y') AS harvardColDt,
			`hav_master`.`harvard_duration`,
			`hav_master`.`harvard_pulse_rate`,
			`hav_master`.`harvard_score`,
			`hav_master`.`harvard_rating`,
			`hav_master`.`harvard_max_score`
			 FROM `hav_master` 
			 WHERE `hav_master`.`id` =
			 ( SELECT  MAX(`hav_master`.`id`) FROM hav_master WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$row = $query->row();
			$data = array(
				"id" => $row->id,
                "harvardColDt"=>$row->harvardColDt,
                "duration"=>$row->harvard_duration,
                "pulse_rate"=>$row->harvard_pulse_rate,
                "harvard_score"=>$row->harvard_score,
                "harvard_rating"=>$row->harvard_rating,
                "harvard_max_score"=>$row->harvard_max_score
			);
		}
	}
   
    public function getLatestUpperBodyjoinmobility($membershipno,$validity){
        $data=array();
        $sql="SELECT `hav_master`.`id`,
			 DATE_FORMAT(`hav_master`.`ortho_date`,'%d-%m-%Y') AS OrthoDate,
			`hav_master`.`cervical_score`,
			`hav_master`.`cervical_total`,
			`hav_master`.`dorsal_score`,
			`hav_master`.`dorsal_total`,
			`hav_master`.`lumber_score`,
			`hav_master`.`lumber_total`,
			`hav_master`.`shldr_lft_score`,
			`hav_master`.`shldr_lft_total`,
			`hav_master`.`shldr_rght_score`,
			`hav_master`.`shldr_rght_total`,
			`hav_master`.`core_score`,
			`hav_master`.`core_total`
			 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "OrthoDate"=>$row->OrthoDate,
                    "cervical_score"=>$row->cervical_score,
                    "cervical_total"=>$row->cervical_total,
                    "dorsal_score"=>$row->dorsal_score,
                    "dorsal_total"=>$row->dorsal_total,
                    "lumber_score"=>$row->lumber_score,
                    "lumber_total"=>$row->lumber_total,
                    "shldr_lft_score"=>$row->shldr_lft_score,
                    "shldr_lft_total"=>$row->shldr_lft_total,
                    "shldr_rght_score"=>$row->shldr_rght_score,
                    "shldr_rght_total"=>$row->shldr_rght_total,
                    "core_score"=>$row->core_score,
                    "core_total"=>$row->core_total,
                    "uprortho_score_total"=>($row->cervical_score+$row->dorsal_score+$row->lumber_score+$row->shldr_lft_score+$row->shldr_rght_score+$row->core_score),
                    "uprortho_max_total"=>($row->cervical_total+$row->dorsal_total+$row->lumber_total+$row->shldr_lft_total+$row->shldr_rght_total+$row->core_total)
                
                   );
                    
        }
        
        return $data;  
    }

    public function getLatestLowerBodyjoinmobility($membershipno,$validity){
        $data=array();
        $sql="SELECT 
		`hav_master`.`id`,
		 DATE_FORMAT(`hav_master`.`ortho_date`,'%d-%m-%Y') AS OrthoDate,
		`hav_master`.`hip_right_score`,
		`hav_master`.`hip_right_total`,
		`hav_master`.`hip_left_score`,
		`hav_master`.`hip_left_total`,
		`hav_master`.`ankel_lft_score`,
		`hav_master`.`ankel_lft_total`,
		`hav_master`.`ankel_rght_score`,
		`hav_master`.`ankel_rght_total`,
		`hav_master`.`knee_lft_score`,
		`hav_master`.`knee_lft_total`,
		`hav_master`.`knee_rght_score`,
		`hav_master`.`knee_rght_total`
		 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "OrthoDate"=>$row->OrthoDate,
                    "hip_right_score"=>$row->hip_right_score,
                    "hip_right_total"=>$row->hip_right_total,
                    "hip_left_score"=>$row->hip_left_score,
                    "hip_left_total"=>$row->hip_left_total,
                    "ankel_lft_score"=>$row->ankel_lft_score,
                    "ankel_lft_total"=>$row->ankel_lft_total,
                    "ankel_rght_score"=>$row->ankel_rght_score,
                    "ankel_rght_total"=>$row->ankel_rght_total,
                    "knee_lft_score"=>$row->knee_lft_score,
                    "knee_lft_total"=>$row->knee_lft_total,
                    "knee_rght_score"=>$row->knee_rght_score,
                    "knee_rght_total"=>$row->knee_rght_total,
                    "lwr_score_total"=>($row->hip_right_score+$row->hip_left_score+$row->ankel_rght_score+$row->ankel_lft_score+$row->knee_rght_score+$row->knee_lft_score),
                    "lwr_max_total"=>($row->hip_right_total+$row->hip_left_total+$row->ankel_rght_total+$row->ankel_lft_total+$row->knee_rght_total+$row->knee_lft_total)
                
                   );
                    
        }
        
        return $data;  
    }
    
    public function getMuscleOrthoFlex($membershipno,$validity){
        $data=array();
        $sql="SELECT 
		 `hav_master`.`id`,
		  DATE_FORMAT(`hav_master`.`ortho_date`,'%d-%m-%Y') AS OrthoDate,
		 `hav_master`.`rght_sd_msl_score`,
		 `hav_master`.`rght_sd_msl_total`,
		 `hav_master`.`lft_sd_msl_score`,
		 `hav_master`.`lft_sd_msl_total`
		  FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "OrthoDate"=>$row->OrthoDate,
                    "rght_sd_msl_score"=>$row->rght_sd_msl_score,
                    "rght_sd_msl_total"=>$row->rght_sd_msl_total,
                    "lft_sd_msl_score"=>$row->lft_sd_msl_score,
                    "lft_sd_msl_total"=>$row->lft_sd_msl_total,
                    "muscle_score_total"=>($row->rght_sd_msl_score+$row->lft_sd_msl_score),
                    "muscle_max_score_total"=>($row->rght_sd_msl_total+$row->lft_sd_msl_total)
                    );
                    
        }
        
        return $data;  
    }
    
     public function getBodycompoassmnt($membershipno,$validity){
        $data=array();
        $sql="SELECT 
			 `hav_master`.`id`,
			  DATE_FORMAT(`hav_master`.`body_date`,'%d-%m-%Y') AS BodyCmpDate,
			 `hav_master`.`body_weight`,
			 `hav_master`.`body_fat_per`,
			 `hav_master`.`body_remarks`,
			 `hav_master`.`body_score`,
			 `hav_master`.`body_max`,
			 `hav_master`.`body_lean_mass`
			  FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "BodyCmpDate"=>$row->BodyCmpDate,
                    "body_weight"=>$row->body_weight,
                    "body_fat_per"=>$row->body_fat_per,
                    "body_remarks"=>$row->body_remarks,
                    "body_score"=>$row->body_score,
                    "body_max"=>($row->body_max),
                    "body_lean_mass"=>($row->body_lean_mass)
                    );
                    
        }
        
        return $data;  
    }
     public function getWaistHipRatio($membershipno,$validity){
        $data=array();
        $sql="SELECT 
			`hav_master`.`id`,
			 DATE_FORMAT(`hav_master`.`body_date`,'%d-%m-%Y') AS BodyCmpDate,
			`hav_master`.`body_waist`,
			`hav_master`.`body_waist_remrk`,
			`hav_master`.`body_waist_score`,
			`hav_master`.`body_waist_max`,
			`hav_master`.`body_waist_hip_ratio`,
			`hav_master`.`bdy_wst_hip_score`,
			`hav_master`.`bdy_wst_hip_max`,
			`hav_master`.`bdy_wst_hip_rmk`
			 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "BodyCmpDate"=>$row->BodyCmpDate,
                    "body_waist"=>$row->body_waist,
                    "body_waist_remrk"=>$row->body_waist_remrk,
                    "body_waist_score"=>$row->body_waist_score,
                    "body_waist_max"=>$row->body_waist_max,
                    "body_waist_hip_ratio"=>($row->body_waist_hip_ratio),
                    "bdy_wst_hip_score"=>($row->bdy_wst_hip_score),
                    "bdy_wst_hip_max"=>$row->bdy_wst_hip_max,
                    "bdy_wst_hip_rmk"=>$row->bdy_wst_hip_rmk
                    );
                    
        }
        
        return $data;  
    }
    
     public function getGirthmsrmnt($membershipno,$validity){
        $data=array();
        $sql="SELECT 
			`hav_master`.`id`,
			  DATE_FORMAT(`hav_master`.`bdy_grth_date`,'%d-%m-%Y') AS BodyGrthDate,
			 `hav_master`.`upr_bdy_neck`,
			 `hav_master`.`upr_bdy_chst`,
			 `hav_master`.`upr_bdy_chst_expnd`,
			 `hav_master`.`upr_bdy_shldr`,
			 `hav_master`.`upr_bdy_bicps_flx`,
			 `hav_master`.`upr_bdy_bicp_extnt`,
                         
			 `hav_master`.`upr_abodmen`,
			 `hav_master`.`mid_abdomen`,
			 `hav_master`.`lwr_abdomen`,
                         `hav_master`.`lwr_bdy_thigh`,
                         `hav_master`.`lwr_bdy_calf`
			 FROM `hav_master`
                         WHERE `hav_master`.`id` =(
                 SELECT 
                MAX(`hav_master`.`id`) FROM hav_master
                WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
                $row = $query->row();
                $data =array(
                    "id" => $row->id,
                    "BodyGrthDate"=>$row->BodyGrthDate,
                    "upr_bdy_neck"=>$row->upr_bdy_neck,
                    "upr_bdy_chst"=>$row->upr_bdy_chst,
                    "upr_bdy_chst_expnd"=>$row->upr_bdy_chst_expnd,
                    "upr_bdy_shldr"=>$row->upr_bdy_shldr,
                    "upr_bdy_bicps_flx"=>$row->upr_bdy_bicps_flx,
                    "upr_bdy_bicp_extnt"=>($row->upr_bdy_bicp_extnt),
                    "upr_abodmen"=>$row->upr_abodmen,
                    "mid_abdomen"=>$row->mid_abdomen,
                    "lwr_abdomen"=>$row->lwr_abdomen,
                    "lwr_bdy_thigh"=>$row->lwr_bdy_thigh,
                    "lwr_bdy_calf"=>$row->lwr_bdy_calf
                    
                    
                    );
                    
        }
        
        return $data;  
    }
    
    public function getBloodTest($membershipno,$validity){
		$data=array();
        $sql="SELECT 
			`hav_master`.`id` AS havmasterID,
             DATE_FORMAT( `hav_blood_detail`.`date`,'%d-%m-%Y' ) AS bldTestDt,
                `blood_test_master`.`test_desc`,
                `hav_blood_detail`.`reading`,
                `hav_blood_detail`.`remarks`,
                `hav_blood_detail`.`score`,
                `hav_blood_detail`.`max` AS max_score,
                `hav_master`.`membership_id` 
            FROM
              `hav_blood_detail` 
              INNER JOIN `blood_test_master` 
                ON `blood_test_master`.`blood_id` = `hav_blood_detail`.`tested_id` 
              INNER JOIN `hav_master` 
                ON `hav_master`.`id` = `hav_blood_detail`.`hav_mstr_id` 
            WHERE `hav_master`.`id` =(
              SELECT 
             MAX(`hav_master`.`id`) FROM hav_master
             WHERE `hav_master`.`membership_no` ='".$membershipno."' AND `hav_master`.`validity_string` = '".$validity."' )";
        
       $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach($query->result() as $rows){
                $data[] =array(
					"havmasterID" => $rows->havmasterID,
                    "bldTestDt" => $rows->bldTestDt,
                    "test_desc" => $rows->test_desc,
                    "reading" => $rows->reading,
                    "remarks" => $rows->remarks,
                    "score" => $rows->score,
                    "max_score" => $rows->max_score
                    );
			}
			return $data;
                    
        }
		else{
        
        return $data;
		}		
    }
}
