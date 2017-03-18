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

/*Table structure for table `unit_master` */

DROP TABLE IF EXISTS `unit_master`;

CREATE TABLE `unit_master` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `unit_master` */

LOCK TABLES `unit_master` WRITE;

insert  into `unit_master`(`unit_id`,`unit_desc`) values (3,'mg/dl '),(2,'mmol/L '),(4,'g/dL '),(5,'U/L '),(6,'ug/ml '),(7,'ng/mL '),(8,'cu.mm'),(9,'cu/mm '),(10,'percent '),(11,'cu.microns '),(12,'micro-micro gra'),(13,'micro-micro grams '),(14,'mcg/dL '),(15,'mlU/L '),(16,'mm/hour '),(17,'mmol/mol'),(18,'%');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
