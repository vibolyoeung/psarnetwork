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

/*Table structure for table `product_transfer_type` */

DROP TABLE IF EXISTS `product_transfer_type`;

CREATE TABLE `product_transfer_type` (
  `ptt_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ptt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `product_transfer_type` */

insert  into `product_transfer_type`(`ptt_id`,`name`) values (1,'Sale'),(2,'Buy'),(3,'Rent'),(4,'Monthly Pay'),(5,'Promotion'),(6,'Other');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
