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

/*Table structure for table `blood_test_master` */

DROP TABLE IF EXISTS `blood_test_master`;

CREATE TABLE `blood_test_master` (
  `blood_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_desc` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `blood_test_master` */

LOCK TABLES `blood_test_master` WRITE;

insert  into `blood_test_master`(`blood_id`,`test_desc`,`coupon_id`,`unit_id`) values (1,'Fasting Plasma Glucose (FPG)',34,3),(3,'Oral Glucose Tolerance Test ( OGTT)',0,3),(4,'Random /  plasma Glucose Test:',0,3),(5,'HbA1c',0,18),(6,'Postprandial glucose test (PPG)',0,3),(7,'LDL Cholesterol',0,2),(8,'Total Cholesterol',0,2),(9,'HDL Cholesterol',0,2),(10,'Fasting Triglycerides',0,2),(11,'Non-HDL Cholesterol',0,2),(12,'Non-HDL Cholesterol',0,3),(13,'SODIUM',0,2),(14,'POTASSIUM  ',0,2),(15,'MAGNESIUM  ',0,3),(16,'BLOOD UREA NITROGEN  ',0,3),(17,'CREATININE',0,3),(18,'URIC ACID  ',0,3),(19,'HEMOGLOBIN',0,4),(20,'TSH ',0,15),(21,'T4 ',0,14),(22,'T7 ',0,14),(23,'T3',0,18);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
