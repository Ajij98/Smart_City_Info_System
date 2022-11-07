-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2022-03-28 16:01:52
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for db_scis
DROP DATABASE IF EXISTS `db_scis`;
CREATE DATABASE IF NOT EXISTS `db_scis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_scis`;


-- Dumping structure for table db_scis.tb_area
DROP TABLE IF EXISTS `tb_area`;
CREATE TABLE IF NOT EXISTS `tb_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `area_added_on` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table db_scis.tb_area: ~11 rows (approximately)
DELETE FROM `tb_area`;
/*!40000 ALTER TABLE `tb_area` DISABLE KEYS */;
INSERT INTO `tb_area` (`area_id`, `city_id`, `city_name`, `area_name`, `area_added_on`, `added_by`, `entry_time`) VALUES
	(1, 2, 'Chattogram', 'Agrabad', '2022-03-27', 'Admin', '2022-03-27 14:03:47'),
	(2, 2, 'Chattogram', 'Muradpur', '2022-03-27', 'Admin', '2022-03-27 14:04:00'),
	(3, 2, 'Chattogram', 'JEC', '2022-03-27', 'Admin', '2022-03-27 14:04:07'),
	(4, 2, 'Chattogram', '2 No Gate', '2022-03-27', 'Admin', '2022-03-27 14:04:22'),
	(5, 2, 'Chattogram', 'Boddarhat', '2022-03-27', 'Admin', '2022-03-27 14:04:30'),
	(6, 2, 'Chattogram', 'Chawkbazar', '2022-03-27', 'Admin', '2022-03-27 14:04:40'),
	(7, 2, 'Chattogram', 'New Market', '2022-03-27', 'Admin', '2022-03-27 14:04:50'),
	(8, 2, 'Chattogram', 'Potenga', '2022-03-27', 'Admin', '2022-03-27 14:04:59'),
	(9, 2, 'Chattogram', 'A. K. Khan', '2022-03-27', 'Admin', '2022-03-27 14:05:10'),
	(10, 2, 'Chattogram', 'Alonkhar', '2022-03-27', 'Admin', '2022-03-27 14:05:22'),
	(11, 2, 'Chattogram', 'Vhatiyari', '2022-03-27', 'Admin', '2022-03-27 14:05:32');
/*!40000 ALTER TABLE `tb_area` ENABLE KEYS */;


-- Dumping structure for table db_scis.tb_city
DROP TABLE IF EXISTS `tb_city`;
CREATE TABLE IF NOT EXISTS `tb_city` (
  `city_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `city_code` int(11) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `city_added_on` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_scis.tb_city: ~7 rows (approximately)
DELETE FROM `tb_city`;
/*!40000 ALTER TABLE `tb_city` DISABLE KEYS */;
INSERT INTO `tb_city` (`city_id`, `city_code`, `city_name`, `city_added_on`, `added_by`, `entry_time`) VALUES
	(1, 499103, 'Dhaka', '2022-03-27', 'Admin', '2022-03-27 08:21:09'),
	(2, 728399, 'Chattogram', '2022-03-27', 'Admin', '2022-03-27 08:23:07'),
	(3, 324330, 'Khulna', '2022-03-27', 'Admin', '2022-03-27 08:23:15'),
	(4, 956988, 'Barishal', '2022-03-27', 'Admin', '2022-03-27 08:23:27'),
	(5, 947986, 'Rajshahi', '2022-03-28', 'Admin', '2022-03-27 08:23:53'),
	(6, 466179, 'Rangpur', '2022-03-27', 'Admin', '2022-03-27 08:24:11'),
	(7, 980432, 'Sylhet', '2022-03-27', 'Admin', '2022-03-27 08:24:28');
/*!40000 ALTER TABLE `tb_city` ENABLE KEYS */;


-- Dumping structure for table db_scis.tb_place
DROP TABLE IF EXISTS `tb_place`;
CREATE TABLE IF NOT EXISTS `tb_place` (
  `place_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  `place_name` varchar(255) DEFAULT NULL,
  `place_img` varchar(255) DEFAULT NULL,
  `place_description` varchar(255) DEFAULT NULL,
  `place_loc_details` varchar(255) DEFAULT NULL,
  `place_gmap_link` varchar(255) DEFAULT NULL,
  `place_added_on` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_scis.tb_place: ~0 rows (approximately)
DELETE FROM `tb_place`;
/*!40000 ALTER TABLE `tb_place` DISABLE KEYS */;
INSERT INTO `tb_place` (`place_id`, `city_id`, `city_name`, `type_name`, `area_name`, `place_name`, `place_img`, `place_description`, `place_loc_details`, `place_gmap_link`, `place_added_on`, `added_by`, `entry_time`) VALUES
	(1, 2, 'Chattogram', 'Bank', 'Agrabad', 'Sonali Bank Limited', 'place_image/cc76997fc37c0c22b37277383d8338d3SBL_1.jpg', 'A smart city is a municipality that uses information and communication technologies (ICT) to increase operational efficiency, share information.', 'Sheik Mujib Road, Agrabad, Chattogram', 'https://goo.gl/maps/1grubfBZJeXxaeU37', '2022-03-27', 'Admin', '2022-03-27 16:17:44');
/*!40000 ALTER TABLE `tb_place` ENABLE KEYS */;


-- Dumping structure for table db_scis.tb_type
DROP TABLE IF EXISTS `tb_type`;
CREATE TABLE IF NOT EXISTS `tb_type` (
  `type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `type_added_on` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_scis.tb_type: ~9 rows (approximately)
DELETE FROM `tb_type`;
/*!40000 ALTER TABLE `tb_type` DISABLE KEYS */;
INSERT INTO `tb_type` (`type_id`, `city_id`, `city_name`, `type_name`, `type_added_on`, `added_by`, `entry_time`) VALUES
	(1, 2, 'Chattogram', 'Bank', '2022-03-27', 'Admin', '2022-03-27 13:01:13'),
	(2, 2, 'Chattogram', 'Tourist Place', '2022-03-27', 'Admin', '2022-03-27 13:01:27'),
	(3, 2, 'Chattogram', 'Mosque', '2022-03-27', 'Admin', '2022-03-27 13:01:39'),
	(4, 2, 'Chattogram', 'Hotel', '2022-03-27', 'Admin', '2022-03-27 13:01:57'),
	(5, 2, 'Chattogram', 'Restaurant', '2022-03-27', 'Admin', '2022-03-27 13:02:10'),
	(6, 2, 'Chattogram', 'Police Station', '2022-03-27', 'Admin', '2022-03-27 13:02:26'),
	(7, 2, 'Chattogram', 'School', '2022-03-27', 'Admin', '2022-03-27 13:02:33'),
	(8, 2, 'Chattogram', 'College', '2022-03-27', 'Admin', '2022-03-27 13:02:42'),
	(9, 2, 'Chattogram', 'University', '2022-03-27', 'Admin', '2022-03-27 13:02:53');
/*!40000 ALTER TABLE `tb_type` ENABLE KEYS */;


-- Dumping structure for table db_scis.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_scis.tb_user: ~2 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `phone`, `address`, `user_name`, `password`, `user_type`, `entry_time`) VALUES
	(1, 'Md Shanto', '01625137629', 'Muradpur, Chattogram', 'Admin', '12345', 'Admin', '2022-03-27 06:51:33'),
	(2, 'Md Sajidur Rahman', '01856474588', '2 No. Gate, East Nasirabad', 'Sajid', '12345', 'General User', '2022-03-27 06:54:47');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
