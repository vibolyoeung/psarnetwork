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

/*Table structure for table `province` */

DROP TABLE IF EXISTS `province`;

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name_en` varchar(255) DEFAULT NULL,
  `province_ordering` int(11) DEFAULT NULL,
  `province_lat_long` varchar(100) DEFAULT NULL,
  `province_name_km` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `province` */

insert  into `province`(`province_id`,`province_name_en`,`province_ordering`,`province_lat_long`,`province_name_km`) values (1,'Phnom Penh',1,'11.578925,104.920006',NULL),(2,'Rattanak Kiri',2,'13.915406,107.099762',NULL),(3,'Mondul Kiri',3,'12.846616,107.110748',NULL),(4,'Siem Reap',4,'13.369788,103.864224',NULL),(5,'Preah Sihanouk',5,'10.752366,103.776627',NULL),(6,'Stung Treng',6,'13.648656,105.973663',NULL),(7,'Kratie',7,'12.910875,105.96817',NULL),(8,'Preah Vihear',8,'14.072645,104.850311',NULL),(9,'Kampot',9,'10.763159,104.380875',NULL),(10,'Kep',10,'10.545196,104.355984',NULL),(11,'Koh Kong',11,'11.722167,103.358459',NULL),(12,'Kampong Thom',12,'12.969766,105.210113',NULL),(13,'Kandal',13,'11.432917,105.122452',NULL),(14,'Takeo',14,'10.960068,104.809341',NULL),(15,'Battambang',15,'13.098205,102.979889',NULL),(16,'Kampong Cham',16,'12.136005,105.679779',NULL),(17,'Kampong Chhnang',17,'12.178965,104.559402',NULL),(18,'Kampong Speu',18,'11.648201,104.391861',NULL),(19,'Pursat',19,'12.436577,103.641815',NULL),(20,'Oddar Meanchey',20,'14.232438,103.633575',NULL),(21,'Pailin',21,'12.922922,102.673302',NULL),(22,'Prey Veng',22,'11.414072,105.502853',NULL),(23,'Svay Rieng',23,'11.182444,105.825577',NULL),(24,'Banteay Meanchey',24,'13.816744,102.90802','បន្ទាយមានជ័យ'),(25,'Tbong Khmum',25,'11.961187, 105.634747',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
