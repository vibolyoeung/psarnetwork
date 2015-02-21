/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.12-log 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `account_role` (
	`rol_id` int ,
	`rol_name` varchar ,
	`acc_type_id` int 
); 
insert into `account_role` (`rol_id`, `rol_name`, `acc_type_id`) values('1','Supplier','0');
insert into `account_role` (`rol_id`, `rol_name`, `acc_type_id`) values('2','Distributor','0');
insert into `account_role` (`rol_id`, `rol_name`, `acc_type_id`) values('3','Retialer','0');
insert into `account_role` (`rol_id`, `rol_name`, `acc_type_id`) values('4','Personal','0');
