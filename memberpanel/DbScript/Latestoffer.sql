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

/*Table structure for table `latest_offers` */

DROP TABLE IF EXISTS `latest_offers`;

CREATE TABLE `latest_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_title` varchar(255) DEFAULT NULL,
  `offer_desc` varchar(255) DEFAULT NULL,
  `offer_image` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `latest_offers` */

LOCK TABLES `latest_offers` WRITE;

insert  into `latest_offers`(`id`,`offer_title`,`offer_desc`,`offer_image`,`is_active`,`creation_date`) values (21,'Mantra 1 ','','subscription-offer.jpg','Y','2017-02-09'),(22,'Mantra 2','','weight-loss-offer.jpg','Y','2017-02-09'),(23,'Mantra 3','','bg3.jpg','Y','2017-02-09');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
