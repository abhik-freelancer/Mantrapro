/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.16 : Database - mantrahe_data
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

/*Table structure for table `may_i_help_you` */

DROP TABLE IF EXISTS `may_i_help_you`;

CREATE TABLE `may_i_help_you` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `branch_cd` varchar(10) DEFAULT NULL,
  `date_of_entry` datetime DEFAULT NULL,
  `emailid` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `help_category` varchar(100) NOT NULL,
  `is_called` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

/*Table structure for table `outside_bodyfat_cal` */

DROP TABLE IF EXISTS `outside_bodyfat_cal`;

CREATE TABLE `outside_bodyfat_cal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_date` datetime DEFAULT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `mobile_no` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `location` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `waist_size` decimal(10,2) DEFAULT NULL,
  `hip_size` decimal(10,2) DEFAULT NULL,
  `fat_percent` decimal(10,2) DEFAULT NULL,
  `fat_mass` decimal(10,2) DEFAULT NULL,
  `lean_body_mass` decimal(10,2) DEFAULT NULL,
  `waist_circum_point` int(10) DEFAULT NULL,
  `waist_circum_rmk` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `waist_hp_ratio` decimal(10,2) DEFAULT NULL,
  `waist_hp_point` int(10) DEFAULT NULL,
  `waist_hip_rmk` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `is_sms_sent` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `outside_harvard_test` */

DROP TABLE IF EXISTS `outside_harvard_test`;

CREATE TABLE `outside_harvard_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_date` datetime DEFAULT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `mobile_no` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `location` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `duration` double(10,2) DEFAULT NULL,
  `pulse_rate` double(10,2) DEFAULT NULL,
  `score` double(10,2) DEFAULT NULL,
  `rating` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `is_sms_sent` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `outside_pushup_test` */

DROP TABLE IF EXISTS `outside_pushup_test`;

CREATE TABLE `outside_pushup_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `entry_date` datetime DEFAULT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `mobile_no` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `location` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `repetation` int(10) DEFAULT NULL,
  `population_avg` decimal(10,2) DEFAULT NULL,
  `score` int(10) DEFAULT NULL,
  `rating` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `is_sms_sent` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `outside_sit_and_reach` */

DROP TABLE IF EXISTS `outside_sit_and_reach`;

CREATE TABLE `outside_sit_and_reach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_date` datetime DEFAULT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `mobile_no` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `location` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `distance` decimal(10,2) DEFAULT NULL,
  `rating` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `is_sms_sent` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `outside_situp_test` */

DROP TABLE IF EXISTS `outside_situp_test`;

CREATE TABLE `outside_situp_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `entry_date` datetime DEFAULT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `mobile_no` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `location` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `repetation` int(10) DEFAULT NULL,
  `pop_avg` decimal(10,2) DEFAULT NULL,
  `score` int(10) DEFAULT NULL,
  `rating` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `is_sms_sent` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
