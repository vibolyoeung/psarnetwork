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

/*Table structure for table `m_page` */

DROP TABLE IF EXISTS `m_page`;

CREATE TABLE `m_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_user_id` int(11) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `title_km` varchar(50) DEFAULT NULL,
  `short_desc_en` text,
  `short_desc_km` text,
  `status` int(1) DEFAULT '1',
  `create_at` varchar(50) DEFAULT NULL,
  `update_at` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'static',
  `position` int(11) DEFAULT NULL,
  `page_belong_to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `m_page` */

insert  into `m_page`(`id`,`sys_user_id`,`title_en`,`title_km`,`short_desc_en`,`short_desc_km`,`status`,`create_at`,`update_at`,`type`,`position`,`page_belong_to`) values (19,2,'Contact','ទំនាក់ទំនង','<span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span><span style=\"font-size: 13.3333330154419px;\">រថរេងរងthis is my testing&nbsp;</span>','',1,'2015-07-20',NULL,'static',NULL,1),(21,2,'ssssDOeun','sss','ssssssss','sssssssss',1,'2015-07-21','2015-07-21','static',NULL,1),(25,2,'Contact us','ទំនាក់ទំនង','sss','ssss',1,'2015-07-21','2015-07-21','static',1,2),(26,2,'About Us','អំពីពួកយើង','សស','',1,'2015-07-21',NULL,'static',1,2),(27,2,'Test','Test','','',1,'2015-07-21',NULL,'static',2,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
