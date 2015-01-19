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

/*Table structure for table `market` */

DROP TABLE IF EXISTS `market`;

CREATE TABLE `market` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(100) DEFAULT NULL,
  `title_km` varchar(100) DEFAULT NULL,
  `created_date` varchar(100) DEFAULT NULL,
  `modify_date` varchar(100) DEFAULT NULL,
  `desc_en` text,
  `desc_km` text,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `amount_stair` varchar(100) DEFAULT NULL,
  `market_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `market` */

insert  into `market`(`id`,`title_en`,`title_km`,`created_date`,`modify_date`,`desc_en`,`desc_km`,`province_id`,`district_id`,`image`,`amount_stair`,`market_type`) values (8,'esss-update','ss-update','2014-11-11','2014-12-02','sfds','sss',1,172,'1415719636.jpg','10',2),(9,'Sovana','At The Old','2014-12-04',NULL,'this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me this is the testing of me ','',2,125,'1417698209.png','4',5),(10,'IT companyddddddddd','That isស្វែង','2014-12-04','2015-01-19','This is phom Pehn City company This is phom Pehn City company This is phom Pehn City company This is phom Pehn City company This is phom Pehn City company t isស្វែង','This is phom Pehn City company This is phom Pehn City company This is phom Pehn City company This is phom Pehn City company This is phom Pehn City company t isស្វែងt isស្វែង',6,146,'1417698382.png','2',3),(11,'dzfdf-updated','kfsdf-updated','2015-01-19','2015-01-19','sdf-updated','ssdfd-updated',2,126,'1421684060.jpg','2',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
