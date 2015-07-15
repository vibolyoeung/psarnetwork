-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2015 at 09:21 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psarnetwork_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `title_km` varchar(100) DEFAULT NULL,
  `desc_en` text,
  `desc_km` text,
  `view` int(11) DEFAULT NULL,
  `stair` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `sto_url` varchar(250) DEFAULT NULL,
  `sto_banner` varchar(250) DEFAULT NULL,
  `sto_value` text
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `user_id`, `sup_id`, `title_en`, `title_km`, `desc_en`, `desc_km`, `view`, `stair`, `image`, `sto_url`, `sto_banner`, `sto_value`) VALUES
(10, 53, 0, 'Page Title', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor luctus condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam dictum vitae erat eu euismod. Integer vehicula sapien nec sem varius auctor. Nunc laoreet orci vitae nibh fermentum, eget rutrum felis tempor. Mauris at maximus dolor, et congue risus. Sed in ligula mauris. Mauris ultricies imperdiet pulvinar. Donec nec porta augue. Etiam nec felis ac massa pellentesque aliquet ac ut mauris. Ut sed aliquam purus. Maecenas faucibus metus ut nisl pellentesque, vitae tempor leo sodales. Integer consequat ipsum vitae nisl mattis, at aliquam nulla semper. Donec sit amet aliquet nunc. Aliquam malesuada enim nec auctor tincidunt.', NULL, NULL, NULL, '1427102192.jpg', '', '1427102172.png', '{"footer_text":"ssssssssssssssssss","layout":"main-orange.css"}'),
(11, 54, 0, 'Vibol Computer Shop', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor luctus condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam dictum vitae erat eu euismod. Integer vehicula sapien nec sem varius auctor. Nunc laoreet orci vitae nibh fermentum, eget rutrum felis tempor. Mauris at maximus dolor, et congue risus. Sed in ligula mauris. Mauris ultricies imperdiet pulvinar. Donec nec porta augue. Etiam nec felis ac massa pellentesque aliquet ac ut mauris. Ut sed aliquam purus. Maecenas faucibus metus ut nisl pellentesque, vitae tempor leo sodales. Integer consequat ipsum vitae nisl mattis, at aliquam nulla semper. Donec sit amet aliquet nunc. Aliquam malesuada enim nec auctor tincidunt.', NULL, NULL, NULL, '1431164503.png', 'vibolshop', '1431164745.jpg', '{"layout":"main.css"}'),
(12, 18, 0, 'Vibol Computer Shop', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor luctus condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam dictum vitae erat eu euismod. Integer vehicula sapien nec sem varius auctor. Nunc laoreet orci vitae nibh fermentum, eget rutrum felis tempor. Mauris at maximus dolor, et congue risus. Sed in ligula mauris. Mauris ultricies imperdiet pulvinar. Donec nec porta augue. Etiam nec felis ac massa pellentesque aliquet ac ut mauris. Ut sed aliquam purus. Maecenas faucibus metus ut nisl pellentesque, vitae tempor leo sodales. Integer consequat ipsum vitae nisl mattis, at aliquam nulla semper. Donec sit amet aliquet nunc. Aliquam malesuada enim nec auctor tincidunt.', NULL, NULL, NULL, '1431237792.jpg', 'vibolshop', '1431257450.jpg', '{"layout":"main-orange.css"}'),
(13, 19, 0, 'Nimol Cloth Shop', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor luctus condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam dictum vitae erat eu euismod. Integer vehicula sapien nec sem varius auctor. Nunc laoreet orci vitae nibh fermentum, eget rutrum felis tempor. Mauris at maximus dolor, et congue risus. Sed in ligula mauris. Mauris ultricies imperdiet pulvinar. Donec nec porta augue. Etiam nec felis ac massa pellentesque aliquet ac ut mauris. Ut sed aliquam purus. Maecenas faucibus metus ut nisl pellentesque, vitae tempor leo sodales. Integer consequat ipsum vitae nisl mattis, at aliquam nulla semper. Donec sit amet aliquet nunc. Aliquam malesuada enim nec auctor tincidunt.', NULL, NULL, NULL, '1431257947.png', 'nimol', 'Nimol Cloth Shop', NULL),
(14, 20, 0, 'Somouen Phone Shop', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor luctus condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam dictum vitae erat eu euismod. Integer vehicula sapien nec sem varius auctor. Nunc laoreet orci vitae nibh fermentum, eget rutrum felis tempor. Mauris at maximus dolor, et congue risus. Sed in ligula mauris. Mauris ultricies imperdiet pulvinar. Donec nec porta augue. Etiam nec felis ac massa pellentesque aliquet ac ut mauris. Ut sed aliquam purus. Maecenas faucibus metus ut nisl pellentesque, vitae tempor leo sodales. Integer consequat ipsum vitae nisl mattis, at aliquam nulla semper. Donec sit amet aliquet nunc. Aliquam malesuada enim nec auctor tincidunt.', NULL, NULL, NULL, '1432973670.png', 'somoeun', '1432973679.jpg', '{"layout":"main-layout-user-orange.css"}'),
(15, 21, 0, '', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor luctus condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam dictum vitae erat eu euismod. Integer vehicula sapien nec sem varius auctor. Nunc laoreet orci vitae nibh fermentum, eget rutrum felis tempor. Mauris at maximus dolor, et congue risus. Sed in ligula mauris. Mauris ultricies imperdiet pulvinar. Donec nec porta augue. Etiam nec felis ac massa pellentesque aliquet ac ut mauris. Ut sed aliquam purus. Maecenas faucibus metus ut nisl pellentesque, vitae tempor leo sodales. Integer consequat ipsum vitae nisl mattis, at aliquam nulla semper. Donec sit amet aliquet nunc. Aliquam malesuada enim nec auctor tincidunt.', NULL, NULL, NULL, '', '', '', '{"layout":"main-layout-user-a.css"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `store`
--
ALTER TABLE `store`
ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
