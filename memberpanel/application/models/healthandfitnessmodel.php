<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of healthandfitness
 *
 * @author pc1
 */
class healthandfitnessmodel extends CI_Model {

    //put your code here
    public function getVo2MaxResult($membershipno, $validitystring) {
        $data = array();
        $sql = "SELECT
                `tran_id`,
               DATE_FORMAT(`date_of_entry`,'%d-%m-%Y') AS date_of_entry,
                `date_of_collection`,`member_id`,
                `membership_no`,`age`, `weight`,`heart_rate`,`minutes`,`seconds`,
                `mets`,`vomax`,`population_avg`,
                `score`, `rating`,
                `programme`, `validity_string`,
                `entry_from`,`branch_code`,`card_code`,`user_id`,`fin_id`
              FROM `vo2_max` WHERE vo2_max.`membership_no` ='" . $membershipno . "' AND vo2_max.`validity_string` ='" . $validitystring . "'
              ORDER BY date_of_entry DESC  ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "tran_id" => $row->tran_id,
                    "date_of_entry" => $row->date_of_entry,
                    "heart_rate" => $row->heart_rate,
                    "duration" => $row->minutes,
                    "mets" => $row->mets,
                    "vomax" => $row->vomax,
                    "rating" => $row->rating,
                    "score" => $row->score,
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    public function getPushUpTest($memshipno, $validitystring) {
        $data = array();
        $sql = "SELECT
                `tran_id`,
                date_format(`date_of_entry`,'%d-%m-%Y') as date_of_entry,
                `date_of_collection`,`member_id`,`membership_no`,
                `age`,`repitions`,`population_avg`,`score`,
                `rating`,`validity_string`,`entry_from`,
                `branch_code`,`card_code`,
                `user_id`,`fin_id`
               FROM `push_up_test`
               WHERE  push_up_test.`membership_no` = '" . $memshipno . "' AND push_up_test.`validity_string` ='" . $validitystring . "'"
                . " ORDER BY push_up_test.date_of_entry DESC";


        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "tran_id" => $row->tran_id,
                    "date_of_entry" => $row->date_of_entry,
                    "repitions" => $row->repitions,
                    "population_avg" => $row->population_avg,
                    "rating" => $row->rating,
                    "score" => $row->score
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    public function getSitUpTest($membershipno, $validitystring) {
        $data = array();
        $sql = "SELECT `tran_id`,
                        DATE_FORMAT(`date_of_entry`,'%d-%m-%Y') AS date_of_entry,
                        `date_of_collection`,`member_id`,
                        `membership_no`,`age`,`repitions`,`population_avg`,
                        `score`,`rating`,`validity_string`,`entry_from`,`branch_code`,
                        `card_code`,`user_id`,`fin_id`
                FROM `sit_up_test`
                WHERE sit_up_test.`membership_no` ='" . $membershipno . "' AND sit_up_test.`validity_string`='" . $validitystring . "'
                ORDER BY sit_up_test.date_of_entry ";


        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "tran_id" => $row->tran_id,
                    "date_of_entry" => $row->date_of_entry,
                    "repitions" => $row->repitions,
                    "population_avg" => $row->population_avg,
                    "rating" => $row->rating,
                    "score" => $row->score
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    public function Onerepeationmaxtest($membershipno, $validitystring) {
        $data = array();
        $sql = "SELECT
                `tran_id`,
                `date_of_entry`,`date_of_collection`,
                `member_id`,`membership_no`,`weight_lifted`,
                `no_of_rptn`,`rm_result`,`validity_string`,
                `entry_from`,`branch_code`,`card_code`,
                `user_id`, `fin_id`,`exercise_desc`, `body_weight`
              FROM `rm_test`
              WHERE rm_test.`membership_no` = '" . $membershipno . "' AND rm_test.`validity_string`='" . $validitystring . "' ORDER BY date_of_entry DESC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "tran_id" => $row->tran_id,
                    "date_of_entry" => $row->date_of_entry,
                    "exercise_desc" => $row->exercise_desc,
                    "weight_lifted" => $row->weight_lifted,
                    "no_of_rptn" => $row->no_of_rptn,
                    "rm_result" => $row->rm_result,
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    public function getSitandReachTest($membershipno, $validitystring) {

        $data = array();
        $sql = "SELECT
            `tran_id`,
            `date_of_collection`,
            `date_of_entry`,
            `member_id`,
            `membership_no`,
            `validity_string`,
            `age`,
            `distance`,
            `population_avg`,
            `score`,
            `rating`,
            `entry_from`,
            `branch_code`,
            `card_code`,
            `user_id`,
            `fin_id`
        FROM `flexibility_test`
        WHERE flexibility_test.`membership_no` ='" . $membershipno . "' AND flexibility_test.`validity_string`='" . $validitystring . "' ORDER BY date_of_entry DESC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "tran_id" => $row->tran_id,
                    "date_of_entry" => $row->date_of_entry,
                    "distance" => $row->distance,
                    "rating" => $row->rating,
                    "score" => $row->score,
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    public function getGeneralMedicalassesment($membershipno) {
        $data = array();
        $sql = "SELECT 
                `tran_id`,
                DATE_FORMAT(`date_of_col`,'%d-%m-%Y') AS date_of_col,
                `member_id`,
                `mmbership_no`,
                `branch_code`,
                `card_code`,
                DATE_FORMAT(`blood_prs_date`,'%d-%m-%Y') AS blood_prs_date,
                `blood_prs_time`,
                `blood_prs_am_pm`,`systolic_msr`,`diastolic_msr`,
                `pulse_msr`,`prs_remarj`,
                date_format(`oxy_date`,'%d-%m-%Y') as oxy_date,
                `oxy_time`,
                `oxy_am_pm`,`oxy_sat_level`,`oxy_note`,
                
                date_format(`visual_date`,'%d-%m-%Y') as visual_date,
                `visual_time`,`visual_am_pm`,
                `right_eye`,`left_eye`,`visual_remark`,`user_id`,
                `fin_id`,`trainer_id` 
              FROM
                `gen_medical_ass` 
              WHERE   gen_medical_ass.`mmbership_no` = '" . $membershipno . "' ORDER BY date_of_col desc";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "tran_id" => $row->tran_id,
                    "date_of_col" => $row->date_of_col,
                    "member_id" => $row->member_id,
                    "mmbership_no" => $row->mmbership_no,
                    "branch_code" => $row->branch_code,
                    "card_code" => $row->card_code,
                    "blood_prs_date" => $row->blood_prs_date,
                    "blood_prs_time" => $row->blood_prs_time,
                    "blood_prs_am_pm" => $row->blood_prs_am_pm,
                    "systolic_msr" => $row->systolic_msr,
                    "diastolic_msr" => $row->diastolic_msr,
                    "pulse_msr" => $row->pulse_msr,
                    "prs_remarj" => $row->prs_remarj,
                    "oxy_date" => $row->oxy_date,
                    "oxy_time" => $row->oxy_time,
                    "oxy_am_pm" => $row->oxy_am_pm,
                    "oxy_sat_level" => $row->oxy_sat_level,
                    "oxy_note" => $row->oxy_note,
                    "visual_date" => $row->visual_date,
                    "visual_time" => $row->visual_time,
                    "visual_am_pm" => $row->visual_am_pm,
                    "right_eye" => $row->right_eye,
                    "left_eye" => $row->left_eye,
                    "visual_remark" => $row->visual_remark
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    public function getBloodTest($membershipno, $validitystring) {
        $data = array();
        $sql = "SELECT `blood_test`.`tran_id`,
                blood_test.`test_id`,blood_test_master.`test_desc`,unit_master.`unit_desc`,
                blood_test_detail.`lower_range`,blood_test_detail.`upper_range`,
                date_format(blood_test.`date_of_entry`,'%d-%m-%Y') as date_of_entry,
                date_format(blood_test.`date_of_collection`,'%d-%m-%Y') as date_of_collection,
                blood_test.`membership_no`,
                blood_test.`reading`,blood_test.`validity_string`
               FROM
               blood_test
               INNER JOIN `blood_test_master` ON blood_test.`test_id` = blood_test_master.`blood_id`
               LEFT JOIN `blood_test_detail` ON `blood_test_master`.`blood_id` = blood_test_detail.`blood_id`
               LEFT JOIN `unit_master` ON blood_test_master.`unit_id` = unit_master.`unit_id`
               WHERE blood_test.`membership_no` ='".$membershipno."' AND blood_test.`validity_string` ='".$validitystring."'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "tran_id" => $row->tran_id,
                    "date_of_collection" => $row->date_of_collection,
                    "unit_desc" => $row->unit_desc,
                    "membership_no" => $row->membership_no,
                    "reading" => $row->reading,
                    "test_desc" => $row->test_desc,
                    "lower_range" => $row->lower_range,
                    "upper_range" => $row->upper_range,
                    "progresspercentage"=>  $this->getBloodprogressPercentage($row->lower_range, $row->upper_range, $row->reading)
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    private function getBloodprogressPercentage($lowerrange, $upperrange, $reading) {
        $percentage = 0;
        $midpoint = 0;
        $slRangePoint = 0;
        $cursorposition = 0;
        if ($lowerrange != "" && $upperrange != "") {
            $midpoint = ($lowerrange + $upperrange) / 2;

            if ($reading > $midpoint) {
                $slRangePoint = $reading - $midpoint;
                $cursorposition = $midpoint + $slRangePoint;
            } else if ($reading < $midpoint) {
                $slRangePoint = $reading - $lowerrange;
                $cursorposition = $lowerrange + $slRangePoint;
            } else {
                $cursorposition = $midpoint;
            }

            $diff = $cursorposition - $lowerrange;
            $actualdiff = $upperrange - $lowerrange;
            $percentage = ceil(($diff / $actualdiff) * (100));
            return $percentage;
        } else {
            return $percentage;
        }
    }
    
    
    public function getSpineCrvicalData($membershipno,$validity){
        $data =array();
        $sql= "SELECT
                    crv_spine_flexion ,                          
                    crv_spine_extension    ,   
                    crv_spine_right_rotation  ,
                    crv_spine_left_rotation ,  
                    crv_spine_right_lat_flx  , 
                    crv_spine_left_lat_flx ,
                    date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y')as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "crv_spine_flexion" => $row->crv_spine_flexion,
                    "crv_spine_extension" => $row->crv_spine_extension,
                    "crv_spine_right_rotation" => $row->crv_spine_right_rotation,
                    "crv_spine_left_rotation" => $row->crv_spine_left_rotation,
                    "crv_spine_right_lat_flx" => $row->crv_spine_right_lat_flx,
                    "crv_spine_left_lat_flx" => $row->crv_spine_left_lat_flx,
                    "date_of_collection" => $row->date_of_collection,
                    
                );
            }
            return $data;
        } else {

            return $data;
        }
    }

    
    
    public function getSpineDorsalData($membershipno,$validity){
        $data =array();
        $sql= "SELECT
                    dor_spine_flexion ,        
                    dor_spine_extension   ,    
                    dor_spine_right_lat_flx  , 
                    dor_spine_left_lat_flx  , 
                    date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "dor_spine_flexion" => $row->dor_spine_flexion,
                    "dor_spine_extension" => $row->dor_spine_extension,
                    "dor_spine_right_lat_flx" => $row->dor_spine_right_lat_flx,
                    "dor_spine_left_lat_flx" => $row->dor_spine_left_lat_flx,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    public function lumberSpine($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                    `lmb_spine_flexion`,
                    `lmb_spine_extension`,
                    `lmb_spine_right_lat_flx`,
                    `lmb_spine_left_lat_flx`, 
                    date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "lmb_spine_flexion" => $row->lmb_spine_flexion,
                    "lmb_spine_extension" => $row->lmb_spine_extension,
                    "lmb_spine_right_lat_flx" => $row->lmb_spine_right_lat_flx,
                    "lmb_spine_left_lat_flx" => $row->lmb_spine_left_lat_flx,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    public function getRightShoulderHealth($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                    `shoulder_rgt_flx`,
                    `shoulder_rgt_ext`,
                    `shoulder_rgt_int`, 
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "shoulder_rgt_flx" => $row->shoulder_rgt_flx,
                    "shoulder_rgt_ext" => $row->shoulder_rgt_ext,
                    "shoulder_rgt_int" => $row->shoulder_rgt_int,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    public function getLeftShoulderHealth($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                   `shoulder_lft_flx`,
                    `shoulder_lft_ext`,
                    `shoulder_lft_int`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "shoulder_lft_flx" => $row->shoulder_lft_flx,
                    "shoulder_lft_ext" => $row->shoulder_lft_ext,
                    "shoulder_lft_int" => $row->shoulder_lft_int,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    //Scapular Dyskinesia
    public function getScapularDyskinesia($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                   `dys_lft_scp`,
                    `dys_rgt_scp`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "dys_lft_scp" => $row->dys_lft_scp,
                    "dys_rgt_scp" => $row->dys_rgt_scp,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    public function getCoreStability($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                  core_stability,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "core_stability" => $row->core_stability,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
        
    }
    
    public function getRightHeapHealth($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                  hip_rgt_flx,
                 `hip_rgt_extn`,
                  `hip_rgt_ext_rot`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "hip_rgt_flx" => $row->hip_rgt_flx,
                    "hip_rgt_extn"=>$row->hip_rgt_extn,
                    "hip_rgt_ext_rot"=>$row->hip_rgt_ext_rot,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    public function getLeftHeapHealth($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                    `hip_lft_flx`,
                    `hip_lft_extn`,
                    `hip_lft_ext_rot`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "hip_lft_flx" => $row->hip_lft_flx,
                    "hip_lft_extn"=>$row->hip_lft_extn,
                    "hip_lft_ext_rot"=>$row->hip_lft_ext_rot,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    public function getRightAnkle($membershipno,$validity){
         $data=array();
        $sql= "SELECT
                    `rgt_ank_dsr_flx`,
                    `rgt_ank_pln_flx`,
                    `rgt_ank_flat_foot`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "rgt_ank_dsr_flx" => $row->rgt_ank_dsr_flx,
                    "rgt_ank_pln_flx"=>$row->rgt_ank_pln_flx,
                    "rgt_ank_flat_foot"=>$row->rgt_ank_flat_foot,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
     public function getLeftAnkle($membershipno,$validity){
         $data=array();
        $sql= "SELECT
                   `lft_ank_dsr_flx`,
                    `lft_ank_pln_flx`,
                    `lft_ank_flat_foot`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "lft_ank_dsr_flx" => $row->lft_ank_dsr_flx,
                    "lft_ank_pln_flx"=>$row->lft_ank_pln_flx,
                    "lft_ank_flat_foot"=>$row->lft_ank_flat_foot,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    public function getRightKnee($membershipno,$validity){
         $data=array();
        $sql= "SELECT
                   `rgt_knee_flx`,
                    `rgt_knee_extn`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "rgt_knee_flx" => $row->rgt_knee_flx,
                    "rgt_knee_extn"=>$row->rgt_knee_extn,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    public function getLeftKnee($membershipno,$validity){
         $data=array();
        $sql= "SELECT
                   `lft_knee_flx`,
                    `lft_knee_extn`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "lft_knee_flx" => $row->lft_knee_flx,
                    "lft_knee_extn"=>$row->lft_knee_extn,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    
    public function getMusclesRight($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                   `Latissimus_dorsi`,
                    `ilio_rgt`,
                    `itb_rgt`,
                    `pectorals`,
                    `hamstrings`,
                    `rectus_femoris`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "Latissimus_dorsi" => $row->Latissimus_dorsi,
                    "ilio_rgt"=>$row->ilio_rgt,
                    "itb_rgt"=>$row->itb_rgt,
                    "pectorals"=>$row->pectorals,
                    "hamstrings"=>$row->hamstrings,
                    "rectus_femoris"=>$row->rectus_femoris,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    
    public function getMusclesLeft($membershipno,$validity){
        $data=array();
        $sql= "SELECT
                   `Latissimus_dorsi_lft`,
                    `ilio_lft`,
                    `itb_lft`,
                    `pectorals_lft`,
                    `hamstrings_lft`,
                    `rectus_femoris_lft`,
                    `gastrosoleus_lft`,
                     date_format(ortho_screening.`date_of_collection`,'%d-%m-%Y') as date_of_collection
                    FROM 
                    `ortho_screening`
                    WHERE ortho_screening.`membership_no` ='".$membershipno."' AND "
                . " ortho_screening.`validity_string`='".$validity."' ORDER BY date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "Latissimus_dorsi_lft" => $row->Latissimus_dorsi_lft,
                    "ilio_lft"=>$row->ilio_lft,
                    "itb_lft"=>$row->itb_lft,
                    "pectorals_lft"=>$row->pectorals_lft,
                    "hamstrings_lft"=>$row->hamstrings_lft,
                    "rectus_femoris_lft"=>$row->rectus_femoris_lft,
                    "date_of_collection"=>$row->date_of_collection
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
    public function getBodyfatpercentage($membershipno,$validity){
        $data=array();
      $sql= "SELECT
					  body_composition.`tran_id`,
					  body_composition.`date_of_entry`,
					  body_composition.`date_of_collection`,
					  body_composition.`weight`,
					  body_composition.`fat_per`,
					  body_composition.`fat_mass`,
					  body_composition.`lean_body_mass`,
					  body_composition.`image_name`,
					  body_composition.`entry_from`,
					  body_composition.`hip`,
					  body_composition.`waist_point`,
					  body_composition.`waist_remarks`,
					  body_composition.`waist_hip_ratio`,
					  body_composition.`waist_hip_remarks`
               FROM `body_composition`
               WHERE body_composition.`membership_no` ='".$membershipno."' AND body_composition.`validity_string`='".$validity."' ORDER BY body_composition.date_of_collection DESC"; 
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    "weight" => $row->weight,
                    "fat_per"=>$row->fat_per,
                    "fat_mass"=>$row->fat_mass,
                    "lean_body_mass"=>$row->lean_body_mass,
                    "date_of_collection"=>$row->date_of_collection,
					"image_name"=>$row->image_name,
					"entry_from"=>$row->entry_from
                    
                );
            }
            return $data;
        } else {

            return $data;
        }
    }
    
	public function getBodyGrith($membershipno,$validity)
	{
		$sql = "SELECT * FROM `body_grith` 
				WHERE `body_grith`.membership_no = '".$membershipno."' AND 
				body_grith.validity_string = '".$validity."' ORDER BY date_of_collection DESC";
		 $query = $this->db->query($sql);	
		 
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                   "entry_date" => $row->date_of_entry,
                   "date_of_collection" => date("d-m-Y",strtotime($row->date_of_collection)),
                   "neck" => $row->neck,
                   "chest" => $row->chest,
                   "chest_expansion" => $row->chest_expansion,
                   "shoulder_length" => $row->shoulder_length,
                   "hip" => $row->hip,
                   "thigh" => $row->thigh,
                   "calf" => $row->calf,
                   "biceps_fles" => $row->biceps_fles,
                   "biceps_extn" => $row->biceps_extn,
                   "upper_abd" => $row->upper_abd,
                   "mid_abd" => $row->mid_abd,
                   "low_abd" => $row->low_abd
                );
            }
            return $data;
        } 
		else{

            return $data;
        }
			
	}
	
 
	public function getBodyLength($membershipno,$validity)
	{
		$data = array();
		$sql = "SELECT * FROM `body_length` 
				WHERE `body_length`.membership_no = '".$membershipno."' AND 
				body_length.validity_string = '".$validity."' ORDER BY date_of_collection DESC";
		 $query = $this->db->query($sql);	
		 
		if ($query->num_rows() > 0)
		{
            foreach ($query->result() as $row) 
			{
                $data[] = array(
                   "entry_date" => $row->date_of_entry,
                   "date_of_collection" => date("d-m-Y",strtotime($row->date_of_collection)),
                   "standing_height" => $row->standing_height,
                   "seating_height" => $row->seating_height
                );
            }
            return $data;
        } 
		else
		{
			return $data;
        }
	}    
    
    
}
