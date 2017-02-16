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
               WHERE blood_test.`membership_no` ='MHBPW1500000097' AND blood_test.`validity_string` ='2016-09-28 - 2017-09-28'";
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

}
