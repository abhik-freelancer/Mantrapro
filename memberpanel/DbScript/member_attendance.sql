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

/*Table structure for table `member_attendance` */

DROP TABLE IF EXISTS `member_attendance`;

CREATE TABLE `member_attendance` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `att_date` date DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `membershipno` varchar(50) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  `workout_time` int(11) DEFAULT '0',
  `validity_string` varchar(50) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `mem_weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`tran_id`),
  KEY `indx_memid` (`member_id`),
  KEY `indx_memshipno` (`membershipno`),
  KEY `indx_attdate` (`att_date`)
) ENGINE=InnoDB AUTO_INCREMENT=349079 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
