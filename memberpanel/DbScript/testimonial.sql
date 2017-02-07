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

/*Table structure for table `testimonial` */

DROP TABLE IF EXISTS `testimonial`;

CREATE TABLE `testimonial` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `testimonialImage` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `testimonial` */

insert  into `testimonial`(`id`,`name`,`occupation`,`testimonialImage`,`location`,`comment`,`is_active`) values (14,'Shib Sankar Banerjee','Retired person','292579_352_2559shib_sankar_banerjee.jpg','Barrackpore','Mantra has become a part of my life. It has changed my lifestyle and helped me to keep good and sound health at my 61 years of age.','Y');
insert  into `testimonial`(`id`,`name`,`occupation`,`testimonialImage`,`location`,`comment`,`is_active`) values (15,'Papiya Roy','Housewife','932954_279_8703papiya_roy.jpg','Dunlop, Baranagar','In the busy and hectic life of today with all sinful food habit, the MMWL package from MANTRA is really a blessing from heaven.','Y');
insert  into `testimonial`(`id`,`name`,`occupation`,`testimonialImage`,`location`,`comment`,`is_active`) values (16,'Manasi Roy','Service','88388_763_7058manasi_roy.jpg','Barrackpore','I feel like Mantra is a time machine, because I have got my teenage energy and fitness back. Thanks a lot to Mantra.','Y');
insert  into `testimonial`(`id`,`name`,`occupation`,`testimonialImage`,`location`,`comment`,`is_active`) values (17,'Arpita Mondal','Student','602268_48_862arpita_mondal.jpg','Naihati','Nu Mantra is a very good health club. Here I could learn many things, like different exercises related to my health and how can I remain fit. Along with this the diet counseling has helped me a lot. Everyone is very friendly here and the atmosphere is also very good.','Y');
insert  into `testimonial`(`id`,`name`,`occupation`,`testimonialImage`,`location`,`comment`,`is_active`) values (18,'Aditi Mukherjee','Teacher','714938_141_8535aditi_mukherjee.jpg','Barrackpore','Mantra is a health club where everything is done scientifically. The weight loss package is healthy, scientific and fruitful.','Y');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
