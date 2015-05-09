/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.17 : Database - psarnetwork_db
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

/*Table structure for table `s_category` */

DROP TABLE IF EXISTS `s_category`;

CREATE TABLE `s_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(150) DEFAULT NULL,
  `name_km` varchar(200) DEFAULT NULL,
  `m_cat_id` int(11) NOT NULL,
  `m_title` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_publish` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_category` (`user_id`),
  CONSTRAINT `fk_user_category` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `s_category` */

insert  into `s_category`(`id`,`name_en`,`name_km`,`m_cat_id`,`m_title`,`user_id`,`parent_id`,`order`,`is_publish`) values (1,'Computer , Software,Network,Hardware','Computer , Software,Network,Hardware',20,NULL,53,0,0,1),(2,'Computer-Accessory','Computer-Accessory',73,NULL,53,20,1,1),(3,'Blank Media','Blank Media',80,NULL,53,73,2,1),(4,'Electronic Consumer','Electronic Consumer',103,NULL,53,0,3,1),(5,'Phone','Phone',104,NULL,53,103,4,1),(6,'Ecom','Ecom',109,NULL,53,104,5,1),(7,'Home Phone','Home Phone',107,NULL,53,104,5,1);

/*Table structure for table `s_page` */

DROP TABLE IF EXISTS `s_page`;

CREATE TABLE `s_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `m_page_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `position` int(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'static',
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_user_page_id` (`user_id`),
  CONSTRAINT `fk_user_page_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `s_page` */

insert  into `s_page`(`id`,`user_id`,`m_page_id`,`title`,`description`,`position`,`order`,`type`,`status`) values (17,53,20,'New Arrival Products',NULL,NULL,1,'widget',1),(18,53,21,'Hot Promotion Products',NULL,NULL,2,'widget',1),(19,53,22,'Secondhand Products',NULL,NULL,4,'widget',1),(20,53,23,'Monthly Pay  Products',NULL,NULL,3,'widget',1),(21,53,24,'Urgent Sale',NULL,NULL,5,'widget',1),(22,53,25,'test',NULL,NULL,6,'widget',1),(23,53,18,'sfdfssssssssssss',NULL,2,NULL,'static',1);

/*Table structure for table `store` */

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `title_zh` varchar(100) DEFAULT NULL,
  `desc_en` text,
  `desc_zh` text,
  `view` int(11) DEFAULT NULL,
  `stair` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `sto_url` varchar(250) DEFAULT NULL,
  `sto_banner` varchar(250) DEFAULT NULL,
  `sto_value` text,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `store` */

insert  into `store`(`id`,`user_id`,`sup_id`,`title_en`,`title_zh`,`desc_en`,`desc_zh`,`view`,`stair`,`image`,`sto_url`,`sto_banner`,`sto_value`) values (10,53,0,'Page Title',NULL,NULL,NULL,NULL,NULL,'1427102192.jpg','','1427102172.png','{\"footer_text\":\"ssssssssssssssssss\",\"layout\":\"main-orange.css\"}');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password_temp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `create_at` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `update_at` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `account_type` int(11) DEFAULT NULL,
  `account_role` int(11) DEFAULT NULL,
  `client_type` int(11) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `address` text,
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`password`,`password_temp`,`status`,`create_at`,`update_at`,`remember_token`,`user_type`,`account_type`,`account_role`,`client_type`,`telephone`,`address`,`user_name`) values (2,'KOCH Doeun','doeunkoch@gmail.com','8843028fefce50a6de50acdf064ded27',NULL,1,'2014-12-04',NULL,'twRzIC28EZ3cyZHWAZuYeAki3GHmeKEIol8uibUachKg3fjWNlY8Hp9tcSyI',1,NULL,NULL,NULL,'0972793573','Phnom Penh','admin'),(53,'Cynthia Guy wwwwww','admin@gmail.com','8843028fefce50a6de50acdf064ded27',NULL,1,'2015-03-22','2015-05-09',NULL,4,1,NULL,5,'+717-41-8789968','{\"province\":\"\",\"disctict\":null,\"g_latitude_longitude\":\"11.718469,104.939690\"}','');

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `permission` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `user_type` */

insert  into `user_type`(`id`,`name`,`permission`) values (1,'Observer','a:2:{s:6:\"access\";a:45:{i:0;s:23:\"admin/front-end-setting\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:22:\"admin/back-end-setting\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:16:\"admin/slideshows\";i:29;s:17:\"admin/status-page\";i:30;s:15:\"admin/edit-page\";i:31;s:17:\"admin/create-page\";i:32;s:11:\"admin/pages\";i:33;s:23:\"admin/user-group-delete\";i:34;s:21:\"admin/user-group-edit\";i:35;s:20:\"admin/user-group-add\";i:36;s:16:\"admin/user-group\";i:37;s:15:\"admin/dashboard\";i:38;s:21:\"admin/change-password\";i:39;s:13:\"admin/profile\";i:40;s:12:\"admin/status\";i:41;s:12:\"admin/delete\";i:42;s:10:\"admin/edit\";i:43;s:12:\"admin/create\";i:44;s:11:\"admin/users\";}s:6:\"modify\";a:44:{i:0;s:23:\"admin/front-end-setting\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:22:\"admin/back-end-setting\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:22:\"admin/create-slideshow\";i:29;s:16:\"admin/slideshows\";i:30;s:17:\"admin/status-page\";i:31;s:15:\"admin/edit-page\";i:32;s:17:\"admin/create-page\";i:33;s:11:\"admin/pages\";i:34;s:23:\"admin/user-group-delete\";i:35;s:21:\"admin/user-group-edit\";i:36;s:20:\"admin/user-group-add\";i:37;s:16:\"admin/user-group\";i:38;s:15:\"admin/dashboard\";i:39;s:12:\"admin/status\";i:40;s:12:\"admin/delete\";i:41;s:10:\"admin/edit\";i:42;s:12:\"admin/create\";i:43;s:11:\"admin/users\";}}'),(2,'Supervisor','a:2:{s:6:\"access\";a:45:{i:0;s:4:\"sfdf\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:18:\"admin/setting-list\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:16:\"admin/slideshows\";i:29;s:17:\"admin/status-page\";i:30;s:15:\"admin/edit-page\";i:31;s:17:\"admin/create-page\";i:32;s:11:\"admin/pages\";i:33;s:23:\"admin/user-group-delete\";i:34;s:21:\"admin/user-group-edit\";i:35;s:20:\"admin/user-group-add\";i:36;s:16:\"admin/user-group\";i:37;s:15:\"admin/dashboard\";i:38;s:21:\"admin/change-password\";i:39;s:13:\"admin/profile\";i:40;s:12:\"admin/status\";i:41;s:12:\"admin/delete\";i:42;s:10:\"admin/edit\";i:43;s:12:\"admin/create\";i:44;s:11:\"admin/users\";}s:6:\"modify\";a:44:{i:0;s:4:\"sfdf\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:18:\"admin/setting-list\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:22:\"admin/create-slideshow\";i:29;s:16:\"admin/slideshows\";i:30;s:17:\"admin/status-page\";i:31;s:15:\"admin/edit-page\";i:32;s:17:\"admin/create-page\";i:33;s:11:\"admin/pages\";i:34;s:23:\"admin/user-group-delete\";i:35;s:21:\"admin/user-group-edit\";i:36;s:20:\"admin/user-group-add\";i:37;s:16:\"admin/user-group\";i:38;s:15:\"admin/dashboard\";i:39;s:12:\"admin/status\";i:40;s:12:\"admin/delete\";i:41;s:10:\"admin/edit\";i:42;s:12:\"admin/create\";i:43;s:11:\"admin/users\";}}'),(3,'Watcher','a:2:{s:6:\"access\";a:45:{i:0;s:4:\"sfdf\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:18:\"admin/setting-list\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:16:\"admin/slideshows\";i:29;s:17:\"admin/status-page\";i:30;s:15:\"admin/edit-page\";i:31;s:17:\"admin/create-page\";i:32;s:11:\"admin/pages\";i:33;s:23:\"admin/user-group-delete\";i:34;s:21:\"admin/user-group-edit\";i:35;s:20:\"admin/user-group-add\";i:36;s:16:\"admin/user-group\";i:37;s:15:\"admin/dashboard\";i:38;s:21:\"admin/change-password\";i:39;s:13:\"admin/profile\";i:40;s:12:\"admin/status\";i:41;s:12:\"admin/delete\";i:42;s:10:\"admin/edit\";i:43;s:12:\"admin/create\";i:44;s:11:\"admin/users\";}s:6:\"modify\";a:44:{i:0;s:4:\"sfdf\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:18:\"admin/setting-list\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:22:\"admin/create-slideshow\";i:29;s:16:\"admin/slideshows\";i:30;s:17:\"admin/status-page\";i:31;s:15:\"admin/edit-page\";i:32;s:17:\"admin/create-page\";i:33;s:11:\"admin/pages\";i:34;s:23:\"admin/user-group-delete\";i:35;s:21:\"admin/user-group-edit\";i:36;s:20:\"admin/user-group-add\";i:37;s:16:\"admin/user-group\";i:38;s:15:\"admin/dashboard\";i:39;s:12:\"admin/status\";i:40;s:12:\"admin/delete\";i:41;s:10:\"admin/edit\";i:42;s:12:\"admin/create\";i:43;s:11:\"admin/users\";}}'),(4,'client','a:2:{s:6:\"access\";a:45:{i:0;s:4:\"sfdf\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:18:\"admin/setting-list\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:16:\"admin/slideshows\";i:29;s:17:\"admin/status-page\";i:30;s:15:\"admin/edit-page\";i:31;s:17:\"admin/create-page\";i:32;s:11:\"admin/pages\";i:33;s:23:\"admin/user-group-delete\";i:34;s:21:\"admin/user-group-edit\";i:35;s:20:\"admin/user-group-add\";i:36;s:16:\"admin/user-group\";i:37;s:15:\"admin/dashboard\";i:38;s:21:\"admin/change-password\";i:39;s:13:\"admin/profile\";i:40;s:12:\"admin/status\";i:41;s:12:\"admin/delete\";i:42;s:10:\"admin/edit\";i:43;s:12:\"admin/create\";i:44;s:11:\"admin/users\";}s:6:\"modify\";a:44:{i:0;s:4:\"sfdf\";i:1;s:27:\"admin/client-user-type-edit\";i:2;s:22:\"admin/client-user-type\";i:3;s:27:\"admin/setting-add-slideshow\";i:4;s:36:\"admin/setting-delete-permission-name\";i:5;s:33:\"admin/setting-add-permission-name\";i:6;s:18:\"admin/setting-list\";i:7;s:19:\"admin/edit-category\";i:8;s:17:\"admin/delete-page\";i:9;s:19:\"admin/list-district\";i:10;s:19:\"admin/delete-market\";i:11;s:17:\"admin/edit-market\";i:12;s:19:\"admin/create-market\";i:13;s:13:\"admin/markets\";i:14;s:21:\"admin/status-category\";i:15;s:21:\"admin/delete-category\";i:16;s:17:\"admin/delete-page\";i:17;s:21:\"admin/create-category\";i:18;s:16:\"admin/categories\";i:19;s:26:\"admin/status-advertisement\";i:20;s:26:\"admin/delete-advertisement\";i:21;s:24:\"admin/edit-advertisement\";i:22;s:24:\"admin/list-ads-positions\";i:23;s:26:\"admin/create-advertisement\";i:24;s:20:\"admin/advertisements\";i:25;s:22:\"admin/status-slideshow\";i:26;s:22:\"admin/delete-slideshow\";i:27;s:20:\"admin/edit-slideshow\";i:28;s:22:\"admin/create-slideshow\";i:29;s:16:\"admin/slideshows\";i:30;s:17:\"admin/status-page\";i:31;s:15:\"admin/edit-page\";i:32;s:17:\"admin/create-page\";i:33;s:11:\"admin/pages\";i:34;s:23:\"admin/user-group-delete\";i:35;s:21:\"admin/user-group-edit\";i:36;s:20:\"admin/user-group-add\";i:37;s:16:\"admin/user-group\";i:38;s:15:\"admin/dashboard\";i:39;s:12:\"admin/status\";i:40;s:12:\"admin/delete\";i:41;s:10:\"admin/edit\";i:42;s:12:\"admin/create\";i:43;s:11:\"admin/users\";}}'),(6,'Group Managment','a:1:{s:6:\"access\";a:22:{i:0;s:27:\"admin/client-user-type-edit\";i:1;s:22:\"admin/client-user-type\";i:2;s:27:\"admin/setting-add-slideshow\";i:3;s:36:\"admin/setting-delete-permission-name\";i:4;s:33:\"admin/setting-add-permission-name\";i:5;s:18:\"admin/setting-list\";i:6;s:19:\"admin/edit-category\";i:7;s:17:\"admin/delete-page\";i:8;s:19:\"admin/list-district\";i:9;s:19:\"admin/delete-market\";i:10;s:17:\"admin/edit-market\";i:11;s:19:\"admin/create-market\";i:12;s:13:\"admin/markets\";i:13;s:21:\"admin/status-category\";i:14;s:21:\"admin/delete-category\";i:15;s:17:\"admin/delete-page\";i:16;s:21:\"admin/create-category\";i:17;s:16:\"admin/categories\";i:18;s:26:\"admin/status-advertisement\";i:19;s:26:\"admin/delete-advertisement\";i:20;s:24:\"admin/edit-advertisement\";i:21;s:24:\"admin/list-ads-positions\";}}');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
