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

/*Table structure for table `branch_master` */

DROP TABLE IF EXISTS `branch_master`;

CREATE TABLE `branch_master` (
  `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BRANCH_CODE` varchar(5) DEFAULT NULL,
  `BRANCH_NAME` varchar(50) DEFAULT NULL,
  `LAST_SRL` int(11) DEFAULT '0',
  `E_SRL` int(11) DEFAULT '0',
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`BRANCH_ID`),
  KEY `BRANCH_CODE` (`BRANCH_CODE`),
  KEY `BRANCH_ID` (`BRANCH_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `branch_master` */

LOCK TABLES `branch_master` WRITE;

insert  into `branch_master`(`BRANCH_ID`,`BRANCH_CODE`,`BRANCH_NAME`,`LAST_SRL`,`E_SRL`,`company_id`) values (1,'SN','SINTHI',1712,451,1),(2,'IS','ISSWBM',0,0,1),(3,'BP','BARRACKPORE',304,10,1),(4,'TR','TOBBIN ROAD',304,0,1),(9,'AB','ANY BRANCH',0,0,1),(11,'CM','CHIRIAMORE',0,0,1),(10,'SC','SINTHI & CHIRIAMORE',0,0,1),(12,'HO','HEAD OFFICE',0,0,1),(13,'SM','SWASTH MANTRA',0,0,1),(14,'TX','TEXMACO ',0,0,1),(15,'MS','MAIN STOCK',0,0,1),(16,'LT','LAKE TOWN',0,0,2);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
