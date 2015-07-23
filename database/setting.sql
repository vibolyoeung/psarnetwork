/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.12-log : Database - psarnetwork_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`psarnetwork_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `psarnetwork_db`;

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_value` varchar(200) DEFAULT NULL,
  `setting_type` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `setting` */

insert  into `setting`(`id`,`setting_value`,`setting_type`) values (1,'10','setting_display_number_slideshow'),(2,'3','setting_view_mode_latest_product'),(3,'10','setting_view_mode_enterprise_store'),(4,'3','setting_view_mode_buyer_request');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
