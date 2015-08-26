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
  `created_date` varchar(20) DEFAULT NULL,
  `expire_date` varchar(20) DEFAULT NULL,
  `pro_condition_id` int(11) DEFAULT NULL,
  `pro_status` int(11) DEFAULT NULL,
  `pro_transfer_type_id` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  `contact_info` text,
  `file_quotation` text,
  `description` text,
  `view` int(11) DEFAULT '0',
  `s_category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `top_up` varchar(255) DEFAULT NULL,
  `point_to_view` int(11) DEFAULT '0',
  `publish_date` varchar(255) DEFAULT NULL,
  `admin_status` int(1) DEFAULT '1',
  `pictures` text COMMENT 'Original Images for popup/detail',
  `thumbnail` text COMMENT 'thumbnail for homepage',
  PRIMARY KEY (`id`),
  KEY `fk_store_product` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`id`,`title`,`price`,`product_service_type_id`,`created_date`,`expire_date`,`pro_condition_id`,`pro_status`,`pro_transfer_type_id`,`is_publish`,`contact_info`,`file_quotation`,`description`,`view`,`s_category_id`,`store_id`,`user_id`,`top_up`,`point_to_view`,`publish_date`,`admin_status`,`pictures`,`thumbnail`) values (24,'Aut quae ullam nihil quo ea sed necessitatibus suscipit',418,NULL,NULL,NULL,3,3,5,1,'{\"contactName\":\"dara\",\"contactEmail\":\"dara@gmail.com\",\"contactHP\":\"0972793573\",\"contactLocation\":\"Banteay Meanchey\"}','295f4190f346ab83f0f09ecb2b9beb7be6fdf05e.jpg','In assumenda quae dolore facere dolorem ipsum, labore praesentium dolores aut illum, totam.',0,90,12,29,'2015-05-30 16:34:21',0,'',1,'[{\"pic\":\"256d068d034ae1c5d0f3d92b9f9263143c2b8c7d.jpg\"},{\"pic\":\"80f643f94a37d037c3127f354ecd0c7f2c163364.jpg\"},{\"pic\":\"0d099205edaeac1f261c99563ed98f75bc9aeedc.jpg\"}]','256d068d034ae1c5d0f3d92b9f9263143c2b8c7d.jpg'),(25,'Test',12,NULL,NULL,NULL,1,1,1,1,'{\"contactName\":\"Free Demo\",\"contactEmail\":\"freedemo@gmail.com\",\"contactHP\":\"0972793574\",\"contactLocation\":\"Banteay Meanchey\"}',NULL,'sssssssss',0,21,18,36,'2015-08-05 13:30:08',0,'04/08/2015',0,'[{\"pic\":\"ffc546395b67f470763b69f68255da2c6c1303c2.jpg\"},{\"pic\":\"f1ed5175fd33559df1ab59a6ee1007558eb0333b.jpg\"},{\"pic\":\"08bdc21a15cbe371cc48a3d8449e6d53d69a6c88.jpg\"},{\"pic\":\"b374bfee95519472aac6c27651709ee2e2c6a514.jpg\"}]','ffc546395b67f470763b69f68255da2c6c1303c2.jpg'),(26,'sds',12,NULL,NULL,NULL,1,1,1,1,'{\"contactName\":\"enterprise\",\"contactEmail\":\"enterprise@gmail.com\",\"contactHP\":\"0972793570\",\"contactLocation\":\"Phnom Penh\"}',NULL,'ss',0,20,24,42,'2015-08-24 22:49:59',0,'05/08/2015',1,'[{\"pic\":\"1be705ea2d512f5cb6cc1ae785c40f06ebbd2594.png\"},{\"pic\":\"74e0a67932b259eab786dac640b8f4a7b1640ed2.png\"}]','1be705ea2d512f5cb6cc1ae785c40f06ebbd2594.png'),(27,'rsss',12,NULL,'2015-08-24',NULL,1,1,1,1,'{\"contactName\":\"enterprise\",\"contactEmail\":\"enterprise@gmail.com\",\"contactHP\":\"0972793570\",\"contactLocation\":\"Phnom Penh\"}',NULL,'ss',0,20,24,42,'2015-08-24 22:50:27',0,'31/08/2015',1,'[{\"pic\":\"7ef1b23f19bbd4c00a62423e1fc2bb18e96e866e.jpg\"},{\"pic\":\"99f1fce0c7c278109db83fda8a23ee28014b7edf.jpg\"}]','7ef1b23f19bbd4c00a62423e1fc2bb18e96e866e.jpg'),(28,'test',12,NULL,'2015-08-26',NULL,1,1,1,1,'{\"contactName\":\"enterprise\",\"contactEmail\":\"enterprise@gmail.com\",\"contactHP\":\"0972793570\",\"contactLocation\":\"Phnom Penh\"}',NULL,'sfd',0,20,24,42,'2015-08-26 20:20:21',0,'26/08/2015',1,'[{\"pic\":\"fc3db73db8d1a64830b025bcaeb73d1d7507df89.jpg\"}]','fc3db73db8d1a64830b025bcaeb73d1d7507df89.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
