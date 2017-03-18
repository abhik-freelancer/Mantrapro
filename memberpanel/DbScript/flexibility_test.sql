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

/*Table structure for table `flexibility_test` */

DROP TABLE IF EXISTS `flexibility_test`;

CREATE TABLE `flexibility_test` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_collection` date NOT NULL,
  `date_of_entry` date NOT NULL,
  `member_id` int(11) NOT NULL,
  `membership_no` varchar(30) NOT NULL,
  `validity_string` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `distance` double(10,2) DEFAULT NULL,
  `population_avg` double(10,2) DEFAULT NULL,
  `score` double(10,2) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  `entry_from` varchar(30) DEFAULT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `card_code` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `fin_id` int(11) NOT NULL,
  PRIMARY KEY (`tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2645 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
