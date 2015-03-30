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
  `view` int(11) DEFAULT '0',
  `s_category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `top_up` varchar(255) DEFAULT NULL,
  `point_to_view` int(11) DEFAULT '0',
  `publish_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_store_product` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`id`,`title`,`price`,`product_service_type_id`,`thumbnail`,`pictures`,`created_date`,`expire_date`,`pro_condition_id`,`pro_status`,`pro_transfer_type_id`,`is_publish`,`contact_info`,`file_quotation`,`description`,`view`,`s_category_id`,`store_id`,`user_id`,`top_up`,`point_to_view`,`publish_date`) values (8,'Officia ea quia incidunt tempora facere blanditiis pariatur Consequatur qui ad mollitia quia minus c',813,NULL,'b094700203b967e8a0180114b0286d22adadb86e.png','[{\"pic\":\"b094700203b967e8a0180114b0286d22adadb86e.png\"},{\"pic\":\"52859b55a2434217b736fe2cbfaedb998fab7951.png\"},{\"pic\":\"8a8f27055195fd80596ac012c837e8d6268051f0.jpg\"},{\"pic\":\"3b765ba8e7fc29a05420c373616209e18fe6647f.jpg\"}]','2015-03-28',NULL,0,2,5,0,'{\"contactName\":\"Officia ea quia incidunt tempora facere blanditiis pariatur Consequatur qui ad mollitia quia minus corrupti neque dolorum mollitia laboriosam et\",\"contactEmail\":\"rawecy@yahoo.com\",\"contactHP\":\"+783-84-9309860\",\"contactLocation\":\"Banteay Meanchey\"}','','Enim et dolorem delectus, quisquam laborum. Proident, et minim odit labore dignissimos.',0,57,16,16,'2015-03-28 18:13:48',0,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
