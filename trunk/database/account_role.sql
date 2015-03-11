CREATE TABLE `account_role` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(100) DEFAULT NULL,
  `acc_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

insert  into `account_role`(`rol_id`,`rol_name`,`acc_type_id`) values (1,'Supplier',0),(2,'Distributor',0),(3,'Retialer',0),(4,'Personal',0);


