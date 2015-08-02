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
  `admin_status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_store_product` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`id`,`title`,`price`,`product_service_type_id`,`thumbnail`,`pictures`,`created_date`,`expire_date`,`pro_condition_id`,`pro_status`,`pro_transfer_type_id`,`is_publish`,`contact_info`,`file_quotation`,`description`,`view`,`s_category_id`,`store_id`,`user_id`,`top_up`,`point_to_view`,`publish_date`,`admin_status`) values (24,'Aut quae ullam nihil quo ea sed necessitatibus suscipit',418,NULL,'256d068d034ae1c5d0f3d92b9f9263143c2b8c7d.jpg','[{\"pic\":\"256d068d034ae1c5d0f3d92b9f9263143c2b8c7d.jpg\"},{\"pic\":\"80f643f94a37d037c3127f354ecd0c7f2c163364.jpg\"},{\"pic\":\"0d099205edaeac1f261c99563ed98f75bc9aeedc.jpg\"}]',NULL,NULL,3,3,5,1,'{\"contactName\":\"dara\",\"contactEmail\":\"dara@gmail.com\",\"contactHP\":\"0972793573\",\"contactLocation\":\"Banteay Meanchey\"}','295f4190f346ab83f0f09ecb2b9beb7be6fdf05e.jpg','In assumenda quae dolore facere dolorem ipsum, labore praesentium dolores aut illum, totam.',0,90,12,29,'2015-05-30 16:34:21',0,'',1),(25,'Ut quia laudantium incidunt a omnis animi sit cum reprehenderit at dolor laboris aut repellendus Dol',673,NULL,'e4a9f8087fbe6ff7f1a7a8b40365c9f1c20751ce.jpg','[{\"pic\":\"e4a9f8087fbe6ff7f1a7a8b40365c9f1c20751ce.jpg\"},{\"pic\":\"91f3f4b26be02fc4f0444c411aac4d51b0578383.png\"}]',NULL,NULL,2,3,2,1,'{\"contactName\":\"vibols\",\"contactEmail\":\"vibol@gmail.com\",\"contactHP\":\"0972793574\",\"contactLocation\":\"Banteay Meanchey\"}',NULL,'Voluptates sed cupidatat eveniet, ad in incididunt dolores dicta aut nobis quia ex non dolores eum eu aut autem.',0,43,12,33,'2015-05-31 09:14:11',0,'15/05/2015',1),(26,'Test',12,NULL,'0407e2f740dc85956235641cdc3f71a70e74918a.jpg','[{\"pic\":\"0407e2f740dc85956235641cdc3f71a70e74918a.jpg\"},{\"pic\":\"06556f50f75c19639baba5acc0135fd1960e0d23.jpg\"},{\"pic\":\"7419a8edc1fcb4d389bd5bc52e00ea48f998b55c.jpg\"}]',NULL,NULL,1,1,2,1,'{\"contactName\":\"Free Demo\",\"contactEmail\":\"freedemo@gmail.com\",\"contactHP\":\"0972793574\",\"contactLocation\":\"Banteay Meanchey\"}',NULL,'test',0,22,18,36,'2015-07-31 23:05:25',0,'01/08/2015',1),(27,'Test1',20,NULL,'8a840e6a79eacbfd21d655a7cc87c122dc89e5bf.jpg','[{\"pic\":\"8a840e6a79eacbfd21d655a7cc87c122dc89e5bf.jpg\"},{\"pic\":\"9dda988fa2ad2808280a6f49624f0bbc9de16edc.jpg\"}]',NULL,NULL,1,1,1,1,'{\"contactName\":\"Free Demo\",\"contactEmail\":\"freedemo@gmail.com\",\"contactHP\":\"0972793574\",\"contactLocation\":\"Banteay Meanchey\"}',NULL,'test1',0,19,18,36,'2015-07-31 23:06:02',0,'01/08/2015',1),(28,'Premium',12,NULL,'afeadf2f4a4ade0556849696dfd04675907b1831.jpg','[{\"pic\":\"afeadf2f4a4ade0556849696dfd04675907b1831.jpg\"},{\"pic\":\"b4a6875b245e29d99144ee33a5e48e1243d3007d.jpg\"}]',NULL,NULL,1,1,1,1,'{\"contactName\":\"premium\",\"contactEmail\":\"premiumdemo@gmail.com\",\"contactHP\":\"0972793575\",\"contactLocation\":\"Phnom Penh\"}',NULL,'test Premium',0,91,19,37,'2015-07-31 23:38:26',0,'01/08/2015',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
