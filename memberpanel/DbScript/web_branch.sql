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

/*Table structure for table `web_branch` */

DROP TABLE IF EXISTS `web_branch`;

CREATE TABLE `web_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `branch_code` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `phone_no` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `gym_tour_link` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `web_branch` */

insert  into `web_branch`(`id`,`branch_name`,`branch_code`,`address`,`phone_no`,`gym_tour_link`) values (1,'SINTHI','SN','OM Tower, 36/C, B.T. Road, Kolkata- 700 002','033 2546 8273, 90076 05628',NULL);
insert  into `web_branch`(`id`,`branch_name`,`branch_code`,`address`,`phone_no`,`gym_tour_link`) values (2,'IISWBM','IS','College Square West, Behind Calcutta University, Kolkata, West Bengal 700073','+91- 33 - 2241 3756 / 5792 / 8694/8695',NULL);
insert  into `web_branch`(`id`,`branch_name`,`branch_code`,`address`,`phone_no`,`gym_tour_link`) values (3,'BARRACKPORE','BP','4/2, S.N. Banerjee Road, Kolkata- 700 120','033 2545 2738, 97484 88321',NULL);
insert  into `web_branch`(`id`,`branch_name`,`branch_code`,`address`,`phone_no`,`gym_tour_link`) values (4,'CHIRIAMORE','CM','29F, B.T. Road, (Ground Floor) Kolkata- 700 002','033 2546 0427, 90077 63533','mm-tnM6ShtI');
insert  into `web_branch`(`id`,`branch_name`,`branch_code`,`address`,`phone_no`,`gym_tour_link`) values (5,'TEXMACO ','TX',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
