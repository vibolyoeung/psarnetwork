-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2015 at 03:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
-- Table structure for table `m_category`
--

CREATE TABLE IF NOT EXISTS `m_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) DEFAULT NULL,
  `name_km` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `m_category`
--

INSERT INTO `m_category` (`id`, `name_en`, `name_km`, `parent_id`, `status`) VALUES
(19, 'Electronic', 'អេឡិចត្រូនិច', 0, 1),
(20, 'Computer&Network', 'កុំព្យូទ័រ&បណ្តាញ', 19, 1),
(21, 'Software', 'Software', 20, 1),
(22, 'System Sale', 'System Sale', 21, 1),
(23, 'Software Development', 'Software Development', 21, 1),
(24, 'Software Mantainnace', 'Software Mantainnace', 21, 1),
(25, 'Hardware &Computer', 'Hardware &Computer', 20, 1),
(26, 'KWM-Switch', 'KWM-Switch', 25, 1),
(27, 'Network-Carbinet', 'Network-Carbinet', 25, 1),
(28, 'Router', 'Router', 25, 1),
(29, 'Switch', 'Switch', 25, 1),
(30, 'Hub', 'Hub', 25, 1),
(31, 'UMPC', 'UMPC', 25, 1),
(32, 'Networking-Storage', 'Networking-Storage', 25, 1),
(33, 'Laptop', 'Laptop', 25, 1),
(34, 'Mini-Laptop', 'Mini-Laptop', 25, 1),
(35, 'Desktop', 'Desktop', 25, 1),
(36, 'Server', 'Server', 25, 1),
(37, 'PDAs', 'PDAs', 25, 1),
(38, 'Tablet PC', 'Tablet PC', 25, 1),
(39, 'Tablet PC Stand', 'Tablet PC Stand', 25, 1),
(40, 'Tablet Stylus Pen', 'Tablet Stylus Pen', 25, 1),
(41, 'Printer', 'Printer', 25, 1),
(42, 'Scanner', 'Scanner', 25, 1),
(43, 'UPS', 'UPS', 25, 1),
(44, 'ATM', 'ATM', 25, 1),
(45, 'Projector', 'Projector', 25, 1),
(46, 'Network-Accessory', 'Network-Accessory', 20, 1),
(47, 'Computer Cable&connector', 'Computer Cable&connector', 46, 1),
(48, 'Phone Cable&Connector', 'Phone Cable&Connector', 46, 1),
(49, 'Camara Cable&Connector', 'Camara Cable&Connector', 46, 1),
(50, 'Firewall & VPN Modem', 'Firewall & VPN Modem', 46, 1),
(51, 'Cable Criper', 'Cable Criper', 46, 1),
(52, 'Network Testing Device', 'Network Testing Device', 46, 1),
(53, 'Phone Puncher', 'Phone Puncher', 46, 1),
(54, 'Trunk cable', 'Trunk cable', 46, 1),
(55, 'Computer-Component', 'Computer-Component', 20, 1),
(56, 'Mother Board', 'Mother Board', 55, 1),
(57, 'Powersuply', 'Powersuply', 55, 1),
(58, 'Ram', 'Ram', 55, 1),
(59, 'CPU', 'CPU', 55, 1),
(60, 'Hard Disk', 'Hard Disk', 55, 1),
(61, 'Sound Card', 'Sound Card', 55, 1),
(62, 'VGA Card', 'VGA Card', 55, 1),
(63, 'Network Card', 'Network Card', 55, 1),
(64, 'USB Port', 'USB Port', 55, 1),
(65, 'Monitor', 'Monitor', 55, 1),
(66, 'Laptop-Battery', 'Laptop-Battery', 55, 1),
(67, 'KeyBoard', 'KeyBoard', 55, 1),
(68, 'Mouse', 'Mouse', 55, 1),
(69, 'DVD Room', 'DVD Room', 55, 1),
(70, 'CD Room', 'CD Room', 55, 1),
(71, 'Case&Towers', 'Case&Towers', 55, 1),
(72, 'Rak', 'Rak', 55, 1),
(73, 'Computer-Accessory', 'Computer-Accessory', 20, 1),
(74, 'Fan&Cooling', 'Fan&Cooling', 73, 1),
(75, 'Screen-Protector', 'Screen-Protector', 73, 1),
(76, 'Keyboard-Cover', 'Keyboard-Cover', 73, 1),
(77, 'Mouse Pad', 'Mouse Pad', 73, 1),
(78, 'USB Flash', 'USB Flash', 73, 1),
(79, 'External Hard Disk', 'External Hard Disk', 73, 1),
(80, 'Blank Media', 'Blank Media', 73, 1),
(81, 'Floopy Disk', 'Floopy Disk', 73, 1),
(82, 'DVD Disk', 'DVD Disk', 73, 1),
(83, 'CD Disk', 'CD Disk', 73, 1),
(84, 'Computer-Bag', 'Computer-Bag', 73, 1),
(85, 'Laptop-Bag', 'Laptop-Bag', 73, 1),
(86, 'Laptop-Loling Pad', 'Laptop-Loling Pad', 73, 1),
(87, 'Card Reader', 'Card Reader', 73, 1),
(88, 'Modem', 'Modem', 73, 1),
(89, 'USB Gaget', 'USB Gaget', 73, 1),
(90, 'USB Hub', 'USB Hub', 73, 1),
(91, 'Cleaner-Sweeper', 'Cleaner-Sweeper', 73, 1),
(92, 'Screen-Cleaning Water', 'Screen-Cleaning Water', 73, 1),
(93, 'Computer-Headset', 'Computer-Headset', 73, 1),
(94, 'Computer-Speaker', 'Computer-Speaker', 73, 1),
(95, 'VGA Cable Connector', 'VGA Cable Connector', 73, 1),
(96, 'Power Cable Connector', 'Power Cable Connector', 73, 1),
(98, 'Installation Service', 'Installation Service', 20, 1),
(99, 'Server Setup Envirement', 'Server Setup Envirement', 98, 1),
(100, 'Firewall & VPN Connection', 'Firewall & VPN Connection', 98, 1),
(101, 'Cable Installation Structure', 'Cable Installation Structure', 98, 1),
(102, 'Replication Database Syncronize', 'Replication Database Syncronize', 98, 1),
(103, 'Electronic Consumer', 'Electronic Consumer', 19, 1),
(104, 'Phone', 'Phone', 103, 1),
(105, 'Smart  Phone (Cell Phone)', 'Smart  Phone (Cell Phone)', 104, 1),
(106, 'Normal Phone(Cell Phone)', 'Normal Phone(Cell Phone)', 104, 1),
(107, 'Home Phone', 'Home Phone', 104, 1),
(108, 'Office Desk phone', 'Office Desk phone', 104, 1),
(109, 'Ecom', 'Ecom', 104, 1),
(111, 'Dress', 'រូប', 110, 1),
(112, 'Jean', 'ខោខាវប៊យ', 110, 1),
(113, 'Home Appliance', 'អេឡិចត្រូនិចលំនៅដ្ឋាន', 19, 1),
(114, 'General Appliance', 'គ្រឿងអេឡិចត្រូនិចទូទៅ', 113, 1),
(115, 'Cleaning Appliance', 'អេឡិចត្រូនិចសំអាត', 114, 1),
(116, 'Air Condictioning Appliance', 'Air Condictioning Appliance', 114, 1),
(117, 'Hand Dryers', 'Hand Dryers', 114, 1),
(118, 'Home Heater', 'Home Heater', 114, 1),
(119, 'Kitchen Appliance', 'Kitchen Appliance', 113, 1),
(120, 'Lundry Appliance', 'Lundry Appliance', 114, 1),
(121, 'Transportation', 'Transportation', 0, 1),
(122, 'Car', 'Car', 121, 1),
(123, 'Truck', 'Truck', 121, 1),
(124, 'Moto Cycle', 'Moto Cycle', 121, 1),
(125, 'Bicycle', 'Bicycle', 121, 1),
(126, 'RealEstate', 'RealEstate', 0, 1),
(127, 'House&Land&Building', 'House&Land&Building', 126, 1),
(128, 'Contruction Product & Service', 'Contruction Product & Service', 126, 1),
(129, 'Light & Lighting', 'Light & Lighting', 126, 1),
(130, 'Furniture', 'Furniture', 126, 1),
(131, 'Fashion', 'Fashion', 0, 1),
(132, 'Clothes', 'សំលៀបបំពាក់', 131, 1),
(133, 'Shoes', 'ស្បែកជើង', 131, 1),
(134, 'Bag​ and Lugages', 'កាបូប​ ​និង វ៉ាលី', 131, 1),
(135, 'Jewelry', 'អលង្ការ', 131, 1),
(136, 'Marchinery', 'គ្រឿងម៉ាស៊ីន', 0, 1),
(137, 'All Marchinery', 'Marchinery', 136, 1),
(138, 'Tools', 'Tools', 136, 1),
(139, 'Measurement& Analyze Intrutment', 'Measurement& Analyze Intrutment', 136, 1),
(140, 'Food & Meal', 'អាហារ', 0, 1),
(141, 'Health & Beauty', 'សុខភាព&សម្រស់', 0, 1),
(142, 'Entertainment', 'កម្សាន្ត', 0, 1),
(143, 'Sport & Parking', 'កីឡា&លំហែ', 0, 1),
(144, 'Gift&Toy', 'វត្ថុុ& អនុស្សាវរីយ', 0, 1),
(145, 'Chemical', 'ឧសថ', 0, 1),
(146, 'Packing&Office', 'Packing&Office', 0, 1),
(147, 'Others', 'ផ្សេងៗទៀត', 0, 1),
(148, 'Training&School', 'ការបណ្តុុុះបណ្តាល', 147, 1),
(149, 'Job', 'ការងារ', 147, 1),
(150, 'Hotel & Guesse house', 'សណ្ឋាគារ&ផ្ទះសំណាក់', 147, 1),
(151, 'Restaurant & Food shop', 'ភោជនីយដ្ឋាន', 147, 1),
(152, 'Business & Service', 'ជំនួយ និង​សេវាកម្ម', 147, 1),
(153, 'Lost & Found', 'បាត់បង់ & រើសបាន', 147, 1),
(154, 'Annoucement & Events', 'ប្រកាស​&ព្រឹត្តិការណ៍', 147, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
