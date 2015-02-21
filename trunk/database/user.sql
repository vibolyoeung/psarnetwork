/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.12-log 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `user` (
	`id` int ,
	`name` varchar ,
	`email` varchar ,
	`password` varchar ,
	`password_temp` varchar ,
	`status` int ,
	`create_at` varchar ,
	`update_at` varchar ,
	`remember_token` varchar ,
	`user_type` int ,
	`account_type` int ,
	`account_role` int ,
	`client_type` int ,
	`telephone` varchar ,
	`address` text (196605)
); 
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('2','KOCH Doeun','doeunkoch@gmail.com','$2y$10$9zwNoGkcOPhycNEP/P2xPuWkXJZmuXlT9rEV2Y.0TxQTsO9NbtlXq',NULL,'1','2014-12-04',NULL,'twRzIC28EZ3cyZHWAZuYeAki3GHmeKEIol8uibUachKg3fjWNlY8Hp9tcSyI','1',NULL,NULL,NULL,'0972793573','Phnom Penh');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('3','HOM Kimhim','kimhim.hom-updated@gmail.com','$2y$10$RY3WZxvzq9K4X/4ZGdQP.uj.usxhCXU2vmhYcC6SXuX/irnlmiJum',NULL,'1',NULL,'2014-11-26','','1',NULL,NULL,NULL,NULL,NULL);
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('4','somoeun','soungsomoeun@gmail.com','$2y$10$tEdDxdASF9CB/1YCy.Ov6uq9rbCJRey/e5sbbzxOqhdQUMV5ynRGe',NULL,'1','2014-12-04',NULL,'LunFK8BV4cKI5F8ogAi5oaNteGU2e332rOvA7WFgTBVpZi72K70GNtnuStIM','5',NULL,NULL,NULL,NULL,NULL);
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('5','vanny','vanny@gmail.com','$2y$10$o6R5JnD0IBSuI/6w5AP5FuuoWXSZhH26TpZotsjt/PTAn6r72y3Ii',NULL,'1','2014-12-28',NULL,'6J61o6Ao4dbftobegHCQ1usg9KHIoWlKQzBqnU57kKwP5E4fOlkfe97ZtZUA','6',NULL,NULL,NULL,NULL,NULL);
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('6','','socheatnews@hotmail.com',NULL,NULL,'0',NULL,NULL,NULL,'4',NULL,NULL,NULL,'1234','Location');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('7','Dalton Mcdonald','dugory@gmail.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,'0','2015-02-04',NULL,NULL,'4',NULL,NULL,NULL,'+631-21-2925409','Location');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('8','Victor Reynolds','wezevoke@yahoo.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,'0','2015-02-10',NULL,NULL,'4',NULL,'0','3','+464-36-6397289','24');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('9','Carly Ramirez','hocywyca@hotmail.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,'0','2015-02-20',NULL,NULL,'4','1','3','1','+313-92-5822870','{\"province\":\"7\",\"disctict\":\"84\",\"g_latitude_longitude\":\"12.124256,106.569373\"}');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('10','Forrest Daniels','labikorun@yahoo.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,'0','2015-02-21',NULL,NULL,'4','1','4','3','+795-12-4016595','{\"province\":\"\",\"disctict\":null,\"g_latitude_longitude\":\"\"}');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('11','Xander Swanson','dyfy@yahoo.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,'0','2015-02-21',NULL,NULL,'4','1','4','2','+987-69-7635543','{\"province\":\"14\",\"disctict\":\"157\",\"g_latitude_longitude\":\"10.833462,104.751101\"}');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('12','Brennan Sandoval','vynelij@hotmail.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,'0','2015-02-21',NULL,NULL,'4','2','3','5','+615-24-6103283','{\"province\":\"\",\"disctict\":null,\"g_latitude_longitude\":\"\"}');
insert into `user` (`id`, `name`, `email`, `password`, `password_temp`, `status`, `create_at`, `update_at`, `remember_token`, `user_type`, `account_type`, `account_role`, `client_type`, `telephone`, `address`) values('13','Simone Gross','pafynani@hotmail.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,'0','2015-02-21',NULL,NULL,'4','2','2','3','+611-91-7748939','{\"province\":\"\",\"disctict\":null,\"g_latitude_longitude\":\"\"}');
