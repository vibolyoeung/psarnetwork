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

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `product_service_type_id` int(11) DEFAULT NULL,
  `thumbnail` text,
  `pictures` text,
  `created_date` varchar(20) DEFAULT NULL,
  `expire_date` varchar(20) DEFAULT NULL,
  `pro_condition_id` int(11) DEFAULT NULL,
  `pro_status` int(11) DEFAULT NULL,
  `pro_transfer_type_id` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `contact_info` text,
  `file_quotation` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`id`,`title`,`price`,`product_service_type_id`,`thumbnail`,`pictures`,`created_date`,`expire_date`,`pro_condition_id`,`pro_status`,`pro_transfer_type_id`,`is_publish`,`contact_info`,`file_quotation`,`description`) values (1,'product-slide',20,1,NULL,'1413631092.jpg','2014/11/10','2014/11/26',NULL,1,NULL,NULL,NULL,NULL,'Long Desc'),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
