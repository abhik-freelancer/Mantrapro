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

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) DEFAULT NULL,
  `event_desc` text,
  `branch` int(11) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `from_time` varchar(20) DEFAULT NULL,
  `to_time` varchar(20) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Data for the table `event` */

LOCK TABLES `event` WRITE;

insert  into `event`(`id`,`event_title`,`event_desc`,`branch`,`event_date`,`from_time`,`to_time`,`is_active`) values (15,'MFPL (Mantra Foot ball Premier league)',NULL,NULL,'2015-09-06','9 am','5 am','Y'),(16,'14th birthday celebration party of Mantra',NULL,NULL,'2015-09-09','7 pm','9 pm','Y'),(17,'Serampore Cheshire Home visit and lunch distribution programme',NULL,NULL,'2015-09-20','11 am','4 pm','Y'),(18,'Mantra Dandiya Night ',NULL,NULL,'2015-10-18','6 pm','9 pm','Y'),(19,'Puja Parikarama with cheshier home inmates',NULL,NULL,'2015-10-19','7 AM','4 PM','Y'),(20,'Chiriamore branch Bijaya Dasami Adda',NULL,NULL,'2015-10-31','','','Y'),(21,'Barrackpore branch Bijaya Dasami Adda',NULL,NULL,'2015-11-01','','','Y'),(22,'MCPL( Mantra Cricket Premier League) ',NULL,NULL,'2015-12-20','8 AM','4PM','Y'),(23,'Mantra Annual sports Meet ',NULL,NULL,'2016-01-10','8 AM','4 PM','Y'),(24,'Mantra Picnic ',NULL,NULL,'2016-01-17','8 AM','6 PM','Y'),(25,' MANTRA  FAGUN USTAV CELEBRATION\r\n\r\n\r\n \r\n  2016  PRAGATI SANGHA MAIDAN B.T.ROAD',NULL,NULL,'2016-03-22','4 pm ','10 pm','Y'),(26,'Blood and Eye donation camp',NULL,NULL,'2016-03-27','','','N'),(27,'MEDITATION CLASS AT BARRACKPORE BRANCH',NULL,NULL,'2016-03-21','6.30','7.30','Y'),(28,'MADITATION CLASS BARRACKPORE BRANCH',NULL,NULL,'2016-04-18','6.30','7.39','Y'),(29,'MONTHLY MEDITATION CLASS (BARRACKPORE BRANCH)(FROM 7.00 AM TO 8.00 AM)',NULL,NULL,'2016-06-20','7.00 AM','8.00 AM','Y'),(30,'FITNESS RETRIP (BOOT CAMP)FROM 16TH DEC TO 18TH DEC, 2016',NULL,NULL,'2016-12-16','7 AM','8 PM','Y'),(31,'BLOOD DONETION CAMP & FREE MEDICAL CHECK UP CAMP ( BARRACKPORE BRANCH)',NULL,NULL,'2017-02-12','8 AM','4 PM','Y'),(32,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (EVENING)',NULL,NULL,'2016-09-27','7:30 PM','8:30 PM','Y'),(33,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (EVENING)',NULL,NULL,'2016-10-25','7:30 PM','8:30 PM','Y'),(34,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (MORNING)',NULL,NULL,'2016-11-12','6:30AM','9:30 AM','Y'),(35,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (EVENING)',NULL,NULL,'2016-11-29','7:30 PM','8:30 PM','Y'),(36,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (MORNING)',NULL,NULL,'2016-12-10','6:30 AM','9:30 AM','Y'),(37,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (EVENING)',NULL,NULL,'2016-12-27','7:30 PM','8:30 PM','Y'),(38,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (MORNING)',NULL,NULL,'2017-01-14','6:30 AM','9:30 AM','Y'),(39,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (EVENING)',NULL,3,'2017-01-31','7:30 PM','8:30 PM','Y'),(40,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (MORNING)',NULL,16,'2017-02-11','6:30 AM','9:30 AM','Y'),(41,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (EVENING)','meditation class at dumdum chiriamore branch (evening)',11,'2017-02-28','7:30 PM','8:30PM','Y'),(42,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (MORNING)','meditation class at dumdum chiriamore branch (morning)',11,'2017-03-11','6:30AM','9:30AM','Y'),(43,'MEDITATION CLASS AT DUMDUM CHIRIAMORE BRANCH (EVENING)','meditation class at dumdum chiriamore branch (evening)',3,'2017-03-28','7:30 PM','8:30 PM','Y'),(44,'TEST','This is event description',3,'2017-02-08','4:30 PM','7:30 PM','Y'),(45,'TEST2','This is event description2',3,'2017-02-08','4:00 PM','8:30 PM','Y'),(46,'Test3','This is event description2',16,'2017-02-08','3:30 PM','6:30 PM','Y');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
