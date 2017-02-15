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

/*Table structure for table `body_composition` */

DROP TABLE IF EXISTS `body_composition`;

CREATE TABLE `body_composition` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_entry` date DEFAULT NULL,
  `date_of_collection` date DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `membership_no` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `waist` decimal(10,2) DEFAULT NULL,
  `fat_per` decimal(10,2) DEFAULT NULL,
  `fat_mass` decimal(10,2) DEFAULT NULL,
  `lean_body_mass` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `validity_string` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `entry_from` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `branch_code` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `card_code` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fin_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `hip` decimal(10,2) DEFAULT NULL,
  `waist_point` decimal(10,2) DEFAULT NULL,
  `waist_remarks` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `waist_hip_ratio` double(10,2) DEFAULT NULL,
  `waist_hip_point` int(11) DEFAULT NULL,
  `waist_hip_remarks` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21781 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
