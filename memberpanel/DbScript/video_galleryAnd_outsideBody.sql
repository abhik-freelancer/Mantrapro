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

/*Data for the table `outside_bodyfat_cal` */

insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (17,'2016-11-19 00:00:00','Mithilesh ','Routh','MALE','9883772618','kumarrouth93@gmail.com','FE','55.00','32.00','30.00','20.00','11.00','44.00',5,'Low','1.07',-10,'High Risk','Y');
insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (19,'2016-11-21 00:00:00','Test','Mithi','MALE','9883772618','','FE','65.00','32.00','30.00','16.00','10.00','55.00',5,'Low','1.07',-10,'High Risk','Y');
insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (20,'2016-11-21 00:00:00','Mith','Test','MALE','1234561234','','FE','60.00','34.00','32.00','24.00','15.00','45.00',5,'Low','1.06',-10,'High Risk','N');
insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (21,'2016-11-21 00:00:00','Suraj','Sharma','MALE','1212121212','','FE','60.00','34.00','38.00','24.00','15.00','45.00',5,'Low','0.89',15,'Healthy','N');
insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (22,'2016-11-26 00:00:00','Mith','R','MALE','9883772618','','FE','60.00','30.00','32.00','12.00','7.00','53.00',15,'Very Low','0.94',15,'Healthy','Y');
insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (23,'2017-02-22 00:00:00','Mithilesh','Routh','M','9883772618','','FE','60.00','40.00','40.00','42.89','26.00','106.28',0,'High','1.00',15,'Healthy','N');
insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (24,'2017-02-22 00:00:00','Mithilesh','Routh','M','9883772618','','FE','80.00','32.00','36.00','11.29','9.00','167.37',5,'Low','0.89',15,'Healthy','N');
insert  into `outside_bodyfat_cal`(`id`,`entry_date`,`first_name`,`last_name`,`gender`,`mobile_no`,`email`,`location`,`weight`,`waist_size`,`hip_size`,`fat_percent`,`fat_mass`,`lean_body_mass`,`waist_circum_point`,`waist_circum_rmk`,`waist_hp_ratio`,`waist_hp_point`,`waist_hip_rmk`,`is_sms_sent`) values (25,'2017-02-22 00:00:00','Mithilesh','Routh','FEMALE','9883772618','das@df.cvb','2','54.00','34.00','34.00','45.84','25.00','94.05',5,'Low','1.00',-10,'High risk','N');

/*Table structure for table `videogallery` */

DROP TABLE IF EXISTS `videogallery`;

CREATE TABLE `videogallery` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `videotitle` varchar(255) DEFAULT NULL,
  `videolink` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `videogallery` */

insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (5,'Mantra Barraackpore','https://www.youtube.com/watch?v=ci6k6WfSbJs','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (6,'Mantra Gym','https://www.youtube.com/watch?v=fh0qt9GWl2w','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (7,'Mantra Gym 3 ','https://www.youtube.com/watch?v=bMjXvJPh5bg','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (8,'Mantra Gym 4','https://www.youtube.com/watch?v=7o8BSQT1s1Y','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (9,'Mantra Gym 5','https://www.youtube.com/watch?v=I8k45McPrPA','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (10,'Mantra Gym 6','https://www.youtube.com/watch?v=lNC79mlAVYQ','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (11,'Mantra Gym 7','https://www.youtube.com/watch?v=2ni-lknxx3c','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (12,'Mantra Gym 8',' https://www.youtube.com/watch?v=ghvo5YmYicg','Y');
insert  into `videogallery`(`id`,`videotitle`,`videolink`,`is_active`) values (14,'MANTRA DUMDUM CHIRIYAMORE BRANCH','https://www.youtube.com/watch?v=mm-tnM6ShtI','Y');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
