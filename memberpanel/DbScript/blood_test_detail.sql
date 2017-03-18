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

/*Table structure for table `blood_test_detail` */

DROP TABLE IF EXISTS `blood_test_detail`;

CREATE TABLE `blood_test_detail` (
  `dtl_id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_id` int(11) NOT NULL,
  `lower_range` decimal(10,2) NOT NULL,
  `upper_range` decimal(10,2) NOT NULL,
  `comments` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`dtl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `blood_test_detail` */

LOCK TABLES `blood_test_detail` WRITE;

insert  into `blood_test_detail`(`dtl_id`,`blood_id`,`lower_range`,`upper_range`,`comments`,`points`) values (1,1,'70.00','100.00','Normal',15),(2,6,'20.00','200.00',NULL,NULL),(3,19,'11.00','15.00',NULL,NULL),(4,20,'0.90','4.00','Normal',NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
