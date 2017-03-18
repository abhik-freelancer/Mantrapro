/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.11 : Database - mantrahe_data
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mantrahe_data` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mantrahe_data`;

/*Table structure for table `gen_medical_ass` */

DROP TABLE IF EXISTS `gen_medical_ass`;

CREATE TABLE `gen_medical_ass` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_col` date DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `mmbership_no` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `branch_code` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `card_code` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `blood_prs_date` date DEFAULT NULL,
  `blood_prs_time` int(11) DEFAULT NULL,
  `blood_prs_am_pm` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `systolic_msr` double(10,2) DEFAULT NULL,
  `diastolic_msr` double(10,2) DEFAULT NULL,
  `pulse_msr` double(10,2) DEFAULT NULL,
  `prs_remarj` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `oxy_date` date DEFAULT NULL,
  `oxy_time` int(11) DEFAULT NULL,
  `oxy_am_pm` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `oxy_sat_level` double(10,2) DEFAULT NULL,
  `oxy_note` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `visual_date` date DEFAULT NULL,
  `visual_time` int(11) DEFAULT NULL,
  `visual_am_pm` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `right_eye` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `left_eye` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `visual_remark` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fin_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19724 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
