-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2023 at 01:50 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `act`
--

DROP TABLE IF EXISTS `act`;
CREATE TABLE IF NOT EXISTS `act` (
  `actid` int NOT NULL AUTO_INCREMENT,
  `castid` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tgi` int DEFAULT NULL,
  `tht` int DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `associate` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `product` varchar(3)  COLLATE  DEFAULT NULL,
  `billed` varchar(50) DEFAULT NULL,
  `sr` varchar(50)  COLLATE  DEFAULT NULL,
  `requirement` varchar(50) DEFAULT NULL,
  `fm` varchar(50) DEFAULT NULL,
  `advance` varchar(50) DEFAULT NULL,
  `orderst` varchar(50)  COLLATE  DEFAULT NULL,
  `walkout` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `conversion` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `intime` varchar(10) NOT NULL,
  `time` text NOT NULL,
  `user` varchar(10) NOT NULL,
  PRIMARY KEY (`actid`)
) ENGINE=MyISAM AUTO_INCREMENT=63 ;

--
-- Dumping data for table `act`
--

INSERT INTO `act` (`actid`, `castid`, `date`, `tgi`, `tht`, `source`, `executive`, `associate`, `Type`, `product`, `billed`, `sr`, `requirement`, `fm`, `advance`, `orderst`, `walkout`, `reason`, `conversion`, `remarks`, `intime`, `time`, `user`) VALUES
(1, '4', '2023-03-09', 1, 0, 'Self', '1', '1', 'Gold', '1', 'No', 'Yes', 'No', 'Rajesh', 'No', 'No', 'Yes', 'xx', '100%', NULL, '', '', '1'),
(2, '3', '2023-02-11', 1, 3, 'Self', '2', '2', 'Diamond', '2', 'No', 'No', 'Yes', 'Rajesh', 'No', 'No', 'No', 'fdzvzv', '0%', 'vdrsb', '', '', '1'),
(3, '4', '2023-02-11', 1, 0, 'Self', '1', '1', 'Silver', '4', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(5, '4', '2023-02-09', 1, 0, 'Self', '1', '1', 'Gold', '3', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 's', '0%', 's', '', '', '1'),
(6, '4', '2023-02-09', 1, 0, 'Self', '1', '2', 'Gold', '2', 'No', 'Eo', 'No', 'Rajesh', 'No', 'No', 'Yes', '', '0%', '', '', '', '1'),
(23, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '5', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '16:43', '', '1'),
(12, '4', '2023-02-18', 1, 6, 'Facebook', '1', '1', 'Gold', '3', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'dsafc', '0%', 'kj', '', '15:49', '1'),
(13, '4', '2023-02-18', 1, 6, 'Self', '1', '1', 'Gold', '5', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', 'ee', '', '16:06', '1'),
(14, '4', '2023-02-18', 1, 6, 'Self', '1', '1', 'Gold', '4', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', 'de', '12:27', '', '1'),
(15, '4', '2023-02-18', 1, 6, 'Self', '1', '1', 'Gold', '2', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test Reason for non conversion', '0%', 'dddd', '12:27', '22:52', '1'),
(16, '4', '2023-02-18', 1, 6, 'Self', '1', '1', 'Gold', '3', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test Reason for non conversion', '0%', 'test Remarks', '12:27', '22:55', '1'),
(17, '4', '2023-02-18', 1, 6, 'Self', '1', '1', 'Gold', '4', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test Reason for non conversion', '0%', 'test Remarks', '12:27', '22:55', '1'),
(18, '84', '2023-02-18', 1, 7, 'Self', '1', '1', 'Gold', '3', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test Reason for non conversion', '100%', 'khygiug', '23:19', '23:20', '1'),
(19, '83', '2023-02-18', 1, 44, 'Self', '1', '1', 'Gold', '4', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'e', '0%', 'wq', '23:08', '23:21', '1'),
(20, '85', '2023-02-19', 1, 50, 'Self', '1', '6', 'Gold', '5', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test Reason for non conversion', '100%', 'hfrsr', '10:45', '10:47', '1'),
(21, '86', '2023-02-21', 1, 2, 'Self', '1', '1', 'Gold', '5', 'Yes', 'No', 'Yes', 'Rajesh', 'No', 'No', 'No', '', '100%', 'sds', '12:12', '12:12', '1'),
(22, '87', '2023-02-21', 1, 66, 'Self', '1', '1', 'Gold', '1', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', 'bbbt', '12:23', '', '1'),
(24, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '2', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(25, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '3', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(26, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '2', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(27, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '6', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(28, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '4', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(29, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '4', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(30, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '12', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(31, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', '11', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(32, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(33, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(34, '87', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(35, '4', '2023-02-22', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(36, '4', '2023-02-23', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(37, '4', '2023-02-23', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '16:53', '1'),
(38, '87', '2023-02-23', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(39, '85', '2023-02-23', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test Reason for non conversion', '0%', 's', '16:55', '16:56', '1'),
(40, '85', '2023-02-23', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test Reason for non conversion', '0%', 's', '16:55', '16:56', '1'),
(41, '85', '2023-02-23', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', 'kk', '17:01', '17:02', '1'),
(42, '9', '2023-02-24', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(43, '85', '2023-02-24', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '17:01', '', '1'),
(44, '4', '2023-02-24', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '17:01', '11:59', '1'),
(45, '87', '2023-02-28', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '17:03', '', '1'),
(46, '87', '2023-02-28', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(47, '4', '2023-03-01', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '1'),
(48, '4', '2023-03-01', 1, 0, 'Self', '1', '1', 'Gold', 'KAS', 'No', 'No', 'Yes', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '2'),
(49, '89', '2023-03-09', 1, 0, 'Self', '', '', 'Gold', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'Yes', '', '0%', '', '18:28', '', '1'),
(50, '87', '2023-03-16', 1, 0, 'Self', '', '', 'Gold', '4', 'Yes', 'Yes', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '15:09', '20:25', '8'),
(51, '85', '2023-03-16', 1, 0, 'Self', '', '', 'Gold', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'Yes', '', '0%', '', '18:18', '17:34', '8'),
(52, '85', '2023-03-16', 1, 0, 'Self', '', '', 'Diamond', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'Yes', '', '0%', '', '17:37', '17:39', '8'),
(53, '4', '2023-03-16', 1, 0, 'Self', '42', '39', 'Gold', '8', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '18:36', '23:42', '8'),
(54, '87', '2023-03-16', 1, 0, 'Self', '', '', 'Gold', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '8'),
(55, '87', '2023-03-16', 1, 0, 'Self', '2', '34', 'Gold', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '8'),
(56, '87', '2023-03-16', 1, 0, 'Self', '', '', 'Gold', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '', '8'),
(57, '87', '2023-03-16', 0, 0, 'Self', '1', '2', 'Diamond', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', '', '', '22:17', '8'),
(58, '4', '2023-03-22', 1, 0, 'Self', '1', '3', 'Gold', '5', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'test', '100%', 'test', '15:18', '15:19', '1'),
(59, '103', '2023-03-26', 1, 0, 'Self', '5', '10', 'Gold', '9', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'dsafc', '100%', 'jh', '12:34', '13:36', '8'),
(60, '4', '2023-03-26', 1, 0, 'Self', '1', '2', 'Gold', '5', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'dsafc', '100%', 'm kjb', '13:41', '13:42', '8'),
(61, '4', '2023-03-26', 1, 0, 'Self', '2', '6', 'Gold', '3', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'dsafc', '100%', 'fx', '16:05', '16:06', '8'),
(62, '87', '2023-03-28', 1, 0, 'Self', '1', '3', 'Gold', '2', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '0%', 'kknm', '14:36', '18:05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(10) DEFAULT NULL,
  `fun` varchar(50)  COLLATE  DEFAULT NULL,
  `additional_info` text,
  `uid` varchar(3)  COLLATE  NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=344 ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `timestamp`, `action`, `fun`, `additional_info`, `uid`) VALUES
(23, '2023-03-18 06:53:39', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(24, '2023-03-18 12:27:14', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(25, '2023-03-18 12:45:16', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(26, '2023-03-18 13:05:23', 'Add', 'Customer', 'Created Customer  by data2', '8'),
(27, '2023-03-18 13:05:46', 'Add', 'Customer', 'Created Customer sss by data2', '8'),
(28, '2023-03-18 13:06:27', 'Add', 'Customer', 'Created Customer Kustav Chatterjee by data2', '8'),
(29, '2023-03-18 13:07:48', 'Add', 'InCustomer', 'Customer entry Bhargab chatterjee by data2', '8'),
(30, '2023-03-18 18:19:25', 'Add', 'InCustomer', 'Customer entry  by data2', '8'),
(31, '2023-03-18 18:19:58', 'Add', 'InCustomer', 'Customer entry  by data2', '8'),
(32, '2023-03-18 18:28:06', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(33, '2023-03-18 18:31:07', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(34, '2023-03-18 18:31:17', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(35, '2023-03-18 18:37:47', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(36, '2023-03-18 18:39:36', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(37, '2023-03-18 18:41:56', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(38, '2023-03-18 18:42:12', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(39, '2023-03-18 18:43:26', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(40, '2023-03-18 19:00:07', 'Login', 'Failed_login_attempt', 'Failed login attempt for  admin from ::1', '0'),
(41, '2023-03-19 10:05:43', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data2 from ::1', '0'),
(42, '2023-03-19 10:25:04', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(43, '2023-03-19 10:25:52', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(44, '2023-03-19 10:26:04', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(45, '2023-03-19 10:26:22', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(46, '2023-03-19 10:30:59', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data2 from ::1', '0'),
(47, '2023-03-17 10:31:01', 'Login', 'Failed_login_attempt', 'Failed login attempt hhh for  data2 from ::1', '0'),
(48, '2023-03-19 10:31:03', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data2 from ::1', '0'),
(49, '2023-03-19 10:31:34', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(50, '2023-03-19 10:34:19', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(51, '2023-03-19 11:01:42', 'Login', 'Logedin', 'User data2 Logedin from 192.168.1.48', '8'),
(52, '2023-03-19 11:07:32', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(53, '2023-03-19 11:10:19', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(54, '2023-03-19 11:10:48', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(55, '2023-03-19 11:12:22', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(56, '2023-03-19 11:12:57', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(57, '2023-03-19 11:15:51', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(58, '2023-03-19 11:19:15', 'Login', 'Logedin', 'User data2 Logedin from 192.168.1.48', '8'),
(59, '2023-03-19 11:21:45', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(60, '2023-03-19 11:27:41', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(61, '2023-03-19 11:27:45', 'Error', 'PageAccess', 'Unauthorised access on by data2', '8'),
(62, '2023-03-19 11:27:46', 'Error', 'PageAccess', 'Unauthorised access on by data2', '8'),
(63, '2023-03-19 11:28:00', 'Error', 'PageAccess', 'Unauthorised access on by data2', '8'),
(64, '2023-03-19 11:28:30', 'Error', 'PageAccess', 'Unauthorised access onindex.php by data2', '8'),
(65, '2023-03-19 11:28:46', 'Error', 'PageAccess', 'Unauthorised access onindex.php by data2', '8'),
(66, '2023-03-19 11:29:42', 'Error', 'PageAccess', 'Unauthorised access onindex.php by data2', '8'),
(67, '2023-03-19 11:29:45', 'Error', 'PageAccess', 'Unauthorised access onindex.php by data2', '8'),
(68, '2023-03-19 11:31:53', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(69, '2023-03-19 11:31:58', 'Error', 'PageAccess', 'Unauthorised access on', '8'),
(70, '2023-03-19 11:32:36', 'Error', 'PageAccess', 'Unauthorised access on', '8'),
(71, '2023-03-19 11:34:28', 'Add', 'InCustomer', 'Customer entry  by data2', '8'),
(72, '2023-03-19 11:35:13', 'Error', 'PageAccess', 'Unauthorised access onindex.php by data2', '8'),
(73, '2023-03-19 11:38:32', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(74, '2023-03-19 11:40:14', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data2 from 192.168.1.48', '0'),
(75, '2023-03-19 11:40:18', 'Login', 'Logedin', 'User data2 Logedin from 192.168.1.48', '8'),
(76, '2023-03-19 11:43:07', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(77, '2023-03-19 11:43:58', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(78, '2023-03-19 11:44:21', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(79, '2023-03-19 11:44:26', 'Error', 'PageAccess', 'Unauthorised access on index.php by data2', '8'),
(80, '2023-03-20 04:03:59', 'Login', 'Logedin', 'User admin Logedin from 192.168.1.47', '1'),
(81, '2023-03-20 04:51:16', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(82, '2023-03-20 04:53:09', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(83, '2023-03-20 05:52:53', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(84, '2023-03-20 06:05:12', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(85, '2023-03-20 06:30:01', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(86, '2023-03-20 06:39:57', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(87, '2023-03-20 06:44:35', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(88, '2023-03-20 08:35:06', 'Add', 'notif', 'Created Notification ljhu by admin', '1'),
(89, '2023-03-20 08:35:17', 'Add', 'notif', 'Created Notification k;jl by admin', '1'),
(90, '2023-03-20 08:35:42', 'Add', 'notif', 'Created Notification jb by admin', '1'),
(91, '2023-03-20 09:28:10', 'Add', 'notif', 'Created Notification test by admin', '1'),
(92, '2023-03-20 13:32:47', 'Add', 'notif', 'Created Notification test by admin', '1'),
(93, '2023-03-20 13:33:01', 'Add', 'notif', 'Created Notification test by admin', '1'),
(94, '2023-03-20 13:33:12', 'Add', 'notif', 'Created Notification test by admin', '1'),
(95, '2023-03-20 13:33:26', 'Add', 'notif', 'Created Notification test by admin', '1'),
(96, '2023-03-20 13:34:15', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(97, '2023-03-20 13:35:19', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(98, '2023-03-20 13:36:09', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(99, '2023-03-20 13:37:59', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(100, '2023-03-20 13:40:43', 'Error', 'PageAccess', 'Unauthorised access on fetch_notifications.php by data2', '8'),
(101, '2023-03-20 13:40:48', 'Error', 'PageAccess', 'Unauthorised access on index.php by data2', '8'),
(102, '2023-03-20 13:41:28', 'Error', 'PageAccess', 'Unauthorised access on index.php by data2', '8'),
(103, '2023-03-20 13:41:41', 'Error', 'PageAccess', 'Unauthorised access on index.php by data2', '8'),
(104, '2023-03-20 13:42:20', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(105, '2023-03-20 13:42:33', 'Login', 'Logedin', 'User fmuser1@vdr Logedin from ::1', '9'),
(106, '2023-03-20 13:52:48', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(107, '2023-03-20 13:54:26', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(108, '2023-03-20 15:38:54', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(109, '2023-03-20 15:39:36', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(110, '2023-03-20 15:40:14', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(111, '2023-03-20 15:40:52', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(112, '2023-03-20 15:41:40', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(113, '2023-03-20 15:52:51', 'Update', 'Users', 'Enable User 8 by admin', '1'),
(114, '2023-03-20 16:03:06', 'Add', 'notif', 'Created Notification test1 by admin', '1'),
(115, '2023-03-20 16:03:24', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(116, '2023-03-20 16:04:36', 'Add', 'notif', 'Created Notification test by admin', '1'),
(117, '2023-03-20 16:08:32', 'Add', 'notif', 'Created Notification hhhhhhhhhhhhhhhhhhhh by admin', '1'),
(118, '2023-03-20 16:09:54', 'Login', 'Logedin', 'User admin Logedin from 192.168.1.50', '1'),
(119, '2023-03-20 16:23:41', 'Add', 'notif', 'Created Notification test by admin', '1'),
(120, '2023-03-20 16:28:08', 'Add', 'notif', 'Created Notification jk by admin', '1'),
(121, '2023-03-20 16:55:38', 'Add', 'notif', 'Created Notification hu by admin', '1'),
(122, '2023-03-21 04:47:00', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(123, '2023-03-21 04:48:40', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data from ::1', '0'),
(124, '2023-03-21 04:48:45', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(125, '2023-03-21 04:49:04', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(126, '2023-03-21 04:55:28', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(127, '2023-03-21 04:56:13', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(128, '2023-03-21 04:59:58', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(129, '2023-03-21 05:01:57', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(130, '2023-03-21 05:05:41', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(131, '2023-03-21 05:06:42', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(132, '2023-03-21 05:07:40', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(133, '2023-03-21 05:08:16', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(134, '2023-03-21 05:12:13', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(135, '2023-03-21 06:24:22', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(136, '2023-03-21 06:29:31', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(137, '2023-03-21 06:37:18', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(138, '2023-03-21 06:38:23', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(139, '2023-03-21 06:41:26', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(140, '2023-03-21 07:15:12', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(141, '2023-03-21 07:25:57', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(142, '2023-03-21 07:32:23', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(143, '2023-03-21 07:35:21', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(144, '2023-03-21 09:14:21', 'Add', 'notif', 'Created Notification test by data', '2'),
(145, '2023-03-21 09:14:55', 'Add', 'notif', 'Created Notification test by data', '2'),
(146, '2023-03-21 09:15:12', 'Add', 'notif', 'Created Notification test3 by data', '2'),
(147, '2023-03-21 09:15:36', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data from ::1', '0'),
(148, '2023-03-21 09:15:37', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data from ::1', '0'),
(149, '2023-03-21 09:15:40', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(150, '2023-03-21 09:16:38', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(151, '2023-03-21 09:17:20', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(152, '2023-03-21 09:18:26', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(153, '2023-03-21 09:19:57', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(154, '2023-03-21 09:20:09', 'Add', 'notif', 'Created Notification ljhu by admin', '1'),
(155, '2023-03-21 09:20:34', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(156, '2023-03-21 09:20:59', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(157, '2023-03-21 09:22:52', 'Add', 'notif', 'Created Notification ljhu by data2', '8'),
(158, '2023-03-21 09:23:05', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(159, '2023-03-21 09:24:21', 'Add', 'notif', 'Created Notification ljhu by admin', '1'),
(160, '2023-03-21 10:34:00', 'Add', 'notif', 'Created Notification jb by admin', '1'),
(161, '2023-03-21 10:37:34', 'Add', 'notif', 'Created Notification mk by admin', '1'),
(162, '2023-03-21 13:12:28', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(163, '2023-03-21 14:01:55', 'Add', 'notif', 'Created Notification s by admin', '1'),
(164, '2023-03-21 14:02:08', 'Add', 'notif', 'Created Notification qqqqqqqq by admin', '1'),
(165, '2023-03-21 14:02:43', 'Add', 'notif', 'Created Notification ddd by admin', '1'),
(166, '2023-03-22 03:26:43', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(167, '2023-03-22 03:37:56', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(168, '2023-03-22 04:33:53', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(169, '2023-03-22 04:34:28', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(170, '2023-03-22 04:34:33', 'Error', 'PageAccess', 'Unauthorised access on index.php by data', '2'),
(171, '2023-03-22 04:35:08', 'Error', 'PageAccess', 'Unauthorised access on index.php by data', '2'),
(172, '2023-03-22 04:35:13', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(173, '2023-03-22 04:35:20', 'Error', 'PageAccess', 'Unauthorised access on index.php by data', '2'),
(174, '2023-03-22 04:35:21', 'Error', 'PageAccess', 'Unauthorised access on index.php by data', '2'),
(175, '2023-03-22 04:35:49', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(176, '2023-03-22 04:36:52', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(177, '2023-03-22 04:37:00', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(178, '2023-03-22 04:38:30', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(179, '2023-03-22 05:16:16', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(180, '2023-03-22 05:34:22', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(181, '2023-03-22 05:49:01', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(182, '2023-03-22 05:49:06', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(183, '2023-03-22 05:49:18', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(184, '2023-03-22 05:49:35', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(185, '2023-03-22 05:50:23', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(186, '2023-03-22 05:51:32', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(187, '2023-03-22 05:52:53', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(188, '2023-03-22 05:53:01', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(189, '2023-03-22 05:53:17', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(190, '2023-03-22 05:53:19', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(191, '2023-03-22 05:53:20', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(192, '2023-03-22 06:00:23', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(193, '2023-03-22 06:04:22', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(194, '2023-03-22 06:04:49', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(195, '2023-03-22 06:06:53', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(196, '2023-03-22 06:10:21', 'Add', 'notif', 'Created Notification juunew by admin', '1'),
(197, '2023-03-22 06:10:28', 'Read', 'Notificaction', 'Read notification 27 by admin', '1'),
(198, '2023-03-22 06:36:26', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(199, '2023-03-22 06:47:28', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(200, '2023-03-22 06:47:29', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(201, '2023-03-22 06:47:30', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(202, '2023-03-22 06:47:32', 'Read', 'Notificaction', 'Read notification 22 by admin', '1'),
(203, '2023-03-22 07:43:02', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(204, '2023-03-22 08:06:07', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(205, '2023-03-22 08:13:57', 'Read', 'Notificaction', 'Read notification 27 by admin', '1'),
(206, '2023-03-22 08:13:58', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(207, '2023-03-22 08:13:59', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(208, '2023-03-22 08:14:00', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(209, '2023-03-22 08:14:01', 'Read', 'Notificaction', 'Read notification 22 by admin', '1'),
(210, '2023-03-22 08:29:53', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(211, '2023-03-22 08:33:06', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(212, '2023-03-22 08:35:21', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(213, '2023-03-22 08:35:29', 'Read', 'Notificaction', 'Read notification 22 by admin', '1'),
(214, '2023-03-22 08:35:30', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(215, '2023-03-22 08:35:40', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(216, '2023-03-22 08:35:41', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(217, '2023-03-22 08:36:01', 'Read', 'Notificaction', 'Read notification 27 by admin', '1'),
(218, '2023-03-22 08:41:22', 'Read', 'Notificaction', 'Read notification 27 by admin', '1'),
(219, '2023-03-22 08:41:23', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(220, '2023-03-22 08:41:24', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(221, '2023-03-22 08:41:24', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(222, '2023-03-22 08:41:25', 'Read', 'Notificaction', 'Read notification 22 by admin', '1'),
(223, '2023-03-22 08:43:21', 'Read', 'Notificaction', 'Read notification 27 by admin', '1'),
(224, '2023-03-22 08:43:23', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(225, '2023-03-22 08:43:27', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(226, '2023-03-22 08:43:34', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(227, '2023-03-22 08:43:37', 'Read', 'Notificaction', 'Read notification 22 by admin', '1'),
(228, '2023-03-22 08:46:54', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(229, '2023-03-22 08:47:22', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(230, '2023-03-22 08:47:28', 'Read', 'Notificaction', 'Read notification 25 by data', '2'),
(231, '2023-03-22 08:48:45', 'Read', 'Notificaction', 'Read notification 26 by data', '2'),
(232, '2023-03-22 08:52:41', 'Read', 'Notificaction', 'Read notification 27 by data', '2'),
(233, '2023-03-22 08:52:42', 'Read', 'Notificaction', 'Read notification 26 by data', '2'),
(234, '2023-03-22 08:52:42', 'Read', 'Notificaction', 'Read notification 25 by data', '2'),
(235, '2023-03-22 08:52:43', 'Read', 'Notificaction', 'Read notification 24 by data', '2'),
(236, '2023-03-22 08:52:44', 'Read', 'Notificaction', 'Read notification 23 by data', '2'),
(237, '2023-03-22 08:52:45', 'Read', 'Notificaction', 'Read notification 22 by data', '2'),
(238, '2023-03-22 08:52:55', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(239, '2023-03-22 08:53:00', 'Read', 'Notificaction', 'Read notification 27 by admin', '1'),
(240, '2023-03-22 08:53:01', 'Read', 'Notificaction', 'Read notification 26 by admin', '1'),
(241, '2023-03-22 09:08:51', 'Read', 'Notificaction', 'Read notification 25 by admin', '1'),
(242, '2023-03-22 09:10:57', 'Read', 'Notificaction', 'Read notification 23 by admin', '1'),
(243, '2023-03-22 09:11:01', 'Read', 'Notificaction', 'Read notification 22 by admin', '1'),
(244, '2023-03-22 09:12:00', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(245, '2023-03-22 09:12:06', 'Read', 'Notificaction', 'Read notification 23 by data', '2'),
(246, '2023-03-22 09:14:52', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(247, '2023-03-22 09:15:17', 'Read', 'Notificaction', 'Read notification 22 by data', '2'),
(248, '2023-03-22 09:16:34', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(249, '2023-03-22 09:18:28', 'Add', 'notif', 'Created Notification for all by admin', '1'),
(250, '2023-03-22 09:18:49', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(251, '2023-03-22 09:18:58', 'Read', 'Notificaction', 'Read notification 28 by admin', '1'),
(252, '2023-03-22 09:20:10', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(253, '2023-03-22 09:20:13', 'Read', 'Notificaction', 'Read notification 28 by data', '2'),
(254, '2023-03-22 09:20:53', 'Login', 'Logedin', 'User fmuser1@vdr Logedin from ::1', '9'),
(255, '2023-03-22 09:20:56', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(256, '2023-03-22 09:21:03', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(257, '2023-03-22 09:21:04', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(258, '2023-03-22 09:21:05', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(259, '2023-03-22 09:21:06', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(260, '2023-03-22 09:21:06', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(261, '2023-03-22 09:21:06', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(262, '2023-03-22 09:21:07', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(263, '2023-03-22 09:21:08', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(264, '2023-03-22 09:21:08', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(265, '2023-03-22 09:21:09', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(266, '2023-03-22 09:21:11', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(267, '2023-03-22 09:21:44', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(268, '2023-03-22 09:21:54', 'Add', 'notif', 'Created Notification edfdw by admin', '1'),
(269, '2023-03-22 09:22:16', 'Read', 'Notificaction', 'Read notification 28 by fmuser1@vdr', '9'),
(270, '2023-03-22 09:22:27', 'Read', 'Notificaction', 'Read notification 29 by fmuser1@vdr', '9'),
(271, '2023-03-22 09:22:50', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(272, '2023-03-22 09:48:31', 'Add', 'InCustomer', 'Customer entry Anik Chatterjee by admin', '1'),
(273, '2023-03-22 09:49:05', 'Add', 'OutCustomer', 'Customer Exit 4 by admin', '1'),
(274, '2023-03-22 10:21:50', 'Add', 'InCustomer', 'Customer entry Amita Kardeeee by admin', '1'),
(275, '2023-03-22 12:10:58', 'Login', 'Failed_login_attempt', 'Failed login attempt for  admin from ::1', '0'),
(276, '2023-03-22 12:11:00', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(277, '2023-03-22 13:36:07', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data from ::1', '0'),
(278, '2023-03-22 13:36:10', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(279, '2023-03-23 05:16:57', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(280, '2023-03-23 05:23:44', 'Login', 'Logedin', 'User fmuser1@vdr Logedin from ::1', '9'),
(281, '2023-03-23 05:24:46', 'Error', 'PageAccess', 'Unauthorised access on index.php by fmuser1@vdr', '9'),
(282, '2023-03-23 05:24:51', 'Login', 'Logedin', 'User fmuser1@vdr Logedin from ::1', '9'),
(283, '2023-03-23 07:09:32', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(284, '2023-03-25 10:16:31', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(285, '2023-03-25 10:16:44', 'Add', 'notif', 'Created Notification test by admin', '1'),
(286, '2023-03-26 06:26:51', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(287, '2023-03-26 06:27:26', 'Login', 'Failed_login_attempt', 'Failed login attempt for  data from ::1', '0'),
(288, '2023-03-26 06:27:30', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(289, '2023-03-26 06:27:44', 'Login', 'Logedin', 'User data2 Logedin from ::1', '8'),
(290, '2023-03-26 06:28:12', 'Add', 'Customer', 'Created Customer Amita Kar by data2', '8'),
(291, '2023-03-26 06:29:14', 'Add', 'Customer', 'Created Customer Amita Kar by data2', '8'),
(292, '2023-03-26 06:29:47', 'Add', 'InCustomer', 'Customer entry Anik Chatterjee by data2', '8'),
(293, '2023-03-26 06:30:50', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(294, '2023-03-26 06:31:31', 'Add', 'notif', 'Created Notification test by data2', '8'),
(295, '2023-03-26 06:32:01', 'Read', 'Notificaction', 'Read notification 31 by admin', '1'),
(296, '2023-03-26 06:33:18', 'Update', 'Follow Up', 'Customer Followup ID 7 by admin', '1'),
(297, '2023-03-26 07:02:50', 'Add', 'Customer', 'Created Customer Amita Kar by data2', '8'),
(298, '2023-03-26 07:04:15', 'Add', 'Customer', 'Created Customer kus by data2', '8'),
(299, '2023-03-26 07:04:42', 'Add', 'InCustomer', 'Customer entry kus by data2', '8'),
(300, '2023-03-26 07:05:20', 'Add', 'Followup', 'Customer Followup  by data2', '8'),
(301, '2023-03-26 07:05:20', 'Add', 'OutCustomer', 'Customer Exit 103 by data2', '8'),
(302, '2023-03-26 07:10:40', 'Add', 'InCustomer', 'Customer entry Anik Chatterjee by data2', '8'),
(303, '2023-03-26 07:11:59', 'Add', 'Followup', 'Customer Followup  by data2', '8'),
(304, '2023-03-26 07:11:59', 'Add', 'OutCustomer', 'Customer Exit 4 by data2', '8'),
(305, '2023-03-26 08:16:26', 'Login', 'Logedin', 'User fmuser1@vdr Logedin from ::1', '9'),
(306, '2023-03-26 08:16:41', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(307, '2023-03-26 08:18:00', 'Read', 'Notificaction', 'Read notification 30 by admin', '1'),
(308, '2023-03-26 08:33:20', 'Add', 'InCustomer', 'Customer entry Anik Chatterjee by data2', '8'),
(309, '2023-03-26 08:34:09', 'Add', 'OutCustomer', 'Customer Exit 4 by data2', '8'),
(310, '2023-03-26 10:29:40', 'Error', 'PageAccess', 'Unauthorised access on index.php by data2', '8'),
(311, '2023-03-26 10:29:51', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(312, '2023-03-26 10:30:45', 'Update', 'Users', 'Disable User 8 by admin', '1'),
(313, '2023-03-26 10:30:46', 'Update', 'Users', 'Enable User 8 by admin', '1'),
(314, '2023-03-26 10:31:39', 'Login', 'Logedin', 'User data Logedin from ::1', '2'),
(315, '2023-03-26 10:32:50', 'Add', 'notif', 'Created Notification test by data', '2'),
(316, '2023-03-26 10:33:08', 'Read', 'Notificaction', 'Read notification 32 by admin', '1'),
(317, '2023-03-26 10:43:14', 'Update', 'Follow Up', 'Customer Followup ID 15 by admin', '1'),
(318, '2023-03-27 05:19:47', 'Login', 'Failed_login_attempt', 'Failed login attempt for  admin from ::1', '0'),
(319, '2023-03-28 09:06:10', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(320, '2023-03-28 09:06:26', 'Add', 'InCustomer', 'Customer entry Amita Kardeeee by admin', '1'),
(321, '2023-03-28 09:31:54', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(322, '2023-03-28 09:32:21', 'Submit', 'Customer out', 'Customer Exit 87 by admin', '1'),
(323, '2023-03-28 09:59:44', 'Add', 'notif', 'Created Notification test by admin', '1'),
(324, '2023-03-28 09:59:48', 'Read', 'Notificaction', 'Read notification 33 by admin', '1'),
(325, '2023-03-28 10:01:23', 'Add', 'InCustomer', 'Customer entry Anik Chatterjee by admin', '1'),
(326, '2023-03-28 11:31:20', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(327, '2023-03-28 11:32:05', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(328, '2023-03-28 11:48:41', 'Add', 'notif', 'Created Notification fj by admin', '1'),
(329, '2023-03-28 11:48:46', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(330, '2023-03-28 11:48:47', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(331, '2023-03-28 11:48:48', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(332, '2023-03-28 11:48:48', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(333, '2023-03-28 11:48:49', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(334, '2023-03-28 11:48:49', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(335, '2023-03-28 11:48:49', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(336, '2023-03-28 11:48:50', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(337, '2023-03-28 11:48:50', 'Read', 'Notificaction', 'Read notification 34 by admin', '1'),
(338, '2023-03-29 13:01:36', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(339, '2023-03-29 13:02:52', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(340, '2023-03-29 13:03:36', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(341, '2023-03-29 13:18:26', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(342, '2023-03-29 16:27:54', 'Login', 'Logedin', 'User admin Logedin from ::1', '1'),
(343, '2023-03-30 06:49:46', 'Login', 'Logedin', 'User admin Logedin from ::1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `associate`
--

DROP TABLE IF EXISTS `associate`;
CREATE TABLE IF NOT EXISTS `associate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 ;

--
-- Dumping data for table `associate`
--

INSERT INTO `associate` (`id`, `name`, `status`) VALUES
(1, 'Shanker', '1'),
(2, 'Mirza', '1'),
(3, 'Ashok', '1'),
(4, 'Rajesh', '1'),
(5, 'Mahender', '1'),
(6, 'P.Prasad', '1'),
(7, 'Mahipal', '1'),
(8, 'K.Mahesh', '1'),
(9, 'Manju', '1'),
(10, 'Amareshwari', '1'),
(11, 'Anusha', '1'),
(12, 'Kajal', '1'),
(13, 'Jr.Khaja', '1'),
(14, 'Jalender', '1'),
(15, 'Bhavani', '1'),
(16, 'Omer', '1'),
(17, 'Abhilash/Gyani', '1'),
(18, 'D.Mahesh', '1'),
(19, 'SR.Khaja', '1'),
(20, 'Veerender', '1'),
(21, 'Kiran', '1'),
(22, 'Gowtham', '1'),
(23, 'Sai', '1'),
(24, 'M.Nagesh', '1'),
(25, 'Naveen', '1'),
(26, 'Mamatha', '1'),
(27, 'Hema', '1'),
(28, 'Priyanka', '1'),
(29, 'Prashanth', '1'),
(30, 'Kranthi', '1'),
(31, 'Shanker', '1'),
(32, 'Mirza', '1'),
(33, 'Ashok', '1'),
(34, 'Rajesh ', '1'),
(35, 'Mahender', '1'),
(36, 'P.Prasad', '1'),
(37, 'Mahipal', '1'),
(38, 'K.Mahesh', '1'),
(39, 'Manju', '1'),
(40, 'Anusha', '1'),
(41, 'Kajal', '1'),
(42, 'JR.Khaja', '1'),
(43, 'Rajkumar', '1'),
(44, 'Laxmi', '1'),
(45, 'Nikhil', '1'),
(46, 'Vivek', '1'),
(48, 'Test', '1'),
(49, 'Testz', '1'),
(50, 'Tests', '1');

-- --------------------------------------------------------

--
-- Table structure for table `castin`
--

DROP TABLE IF EXISTS `castin`;
CREATE TABLE IF NOT EXISTS `castin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mob` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tgi` int NOT NULL,
  `thc` int NOT NULL,
  `type` varchar(10)  COLLATE  NOT NULL,
  `time` varchar(10) NOT NULL,
  `cou_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 ;

--
-- Dumping data for table `castin`
--

INSERT INTO `castin` (`id`, `mob`, `name`, `tgi`, `thc`, `type`, `time`, `cou_id`) VALUES
(54, '79', 'Anik Chatterjee', 1, 0, 'Gold', '15:31', '4');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(20) NOT NULL,
  `msg` text  COLLATE  NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `time`, `user`, `msg`) VALUES
(1, '2023-03-26 06:30:59', 'admin', 'hi'),
(2, '2023-03-26 10:31:49', 'data', 'hi'),
(3, '2023-03-26 10:32:01', 'admin', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `coustomeradd`
--

DROP TABLE IF EXISTS `coustomeradd`;
CREATE TABLE IF NOT EXISTS `coustomeradd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(100)  COLLATE  NOT NULL,
  `address` varchar(255)  COLLATE  NOT NULL,
  `mobile_no` varchar(10) COLLATE  NOT NULL,
  `mail_id` varchar(100)  COLLATE  NOT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104;

--
-- Dumping data for table `coustomeradd`
--

INSERT INTO `coustomeradd` (`id`, `cou_name`, `address`, `mobile_no`, `mail_id`, `dob`, `doa`) VALUES
(2, 'Bhargab chatterjee', 'Howrah', '8240231176', 'bhargabiam@gmail.com', '2023-02-11', '2023-02-11'),
(3, 'bhargab', 'howrah', '636326463', 'bhargabiam@gmail.com', '2023-02-01', '2023-02-09'),
(4, 'Anik Chatterjee', 'Chatterjee Builders.\r\nBallavbati, Munshirhut,', '79', 'kustav@live.com', '2023-02-14', '2023-02-14'),
(5, 'Bhargab chatterjee', 'gg', '8240231176', 'kustav@live.com', '2023-02-15', '2023-02-16'),
(6, 'Bhargab chatterjee', 'gg', '797', 'kustav@live.com', '2023-02-16', '2023-02-16'),
(7, 'Bhargab chatterjee', 'gg', '5779476', 'kustav@live.com', '2023-02-15', '2023-02-23'),
(8, 'Bhargab chatterjee', 'gg', '444', 'kustav@live.com', '2023-02-09', '2023-02-10'),
(9, 'Bhargab chatterjee', 'gg', '5779', 'kustav@live.com', '2023-02-16', '2023-02-15'),
(10, 'Bhargab chatterjee', 'gg', '667544', 'kustav@live.com', '2023-02-01', '2023-02-16'),
(11, 'Bhargab chatterjee', 'gg', '57', 'kustav@live.com', '2023-02-01', '2023-03-07'),
(12, 'Bhargab chatterjee', 'gg', '57', 'kustav@live.com', '2023-02-01', '2023-03-07'),
(13, 'df', 'ffh', '333', 'kustav@live.com', '2023-02-01', '2023-02-16'),
(14, 'Bhargab chatterjee', 'gg', '577', 'kustav@live.com', '2023-02-08', '2023-02-16'),
(15, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(16, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(17, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(18, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(19, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(20, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(21, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(22, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(23, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(24, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(25, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(26, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(27, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(28, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(29, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(30, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(31, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(32, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(33, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(34, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(35, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(36, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(37, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(38, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(39, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(40, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(41, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(42, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(43, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(44, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(45, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(46, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(47, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(48, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(49, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(50, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(51, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(52, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(53, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(54, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(55, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(56, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(57, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(58, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(59, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(60, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(61, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(62, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(63, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(64, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(65, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(66, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(67, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(68, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(69, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(70, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(71, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(72, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(73, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(74, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(75, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(76, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(77, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(78, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(79, '356', '', '0', '', '0000-00-00', '0000-00-00'),
(83, 'trisha', 'lknccn', '8900089798', 'kustav@live.com', '2023-02-01', '2023-02-09'),
(84, 'trisha', 'Building no 1240\r\nWay no 277 Ghsla Sanniah\r\nSultanate of Oman', '1234567890', 'kustav@live.com', '2023-02-18', '2023-02-18'),
(85, 'Kustav Chatterjee', 'Building no 1240\r\nWay no 277 Ghsla Sanniah\r\nSultanate of Oman', '9609424242', '', '0000-00-00', '0000-00-00'),
(86, 'Amita Kar', 'C/O Dr. Aloke Ranjan Sarbadhikary Vill:- Bhursit Brahamanpara PO: Munshirhut\r\nDist: Howrah', '8900089798', 'trisha9851@gmail.com', '0000-00-00', '0000-00-00'),
(87, 'Amita Kardeeee', 'C/O Dr. Aloke Ranjan Sarbadhikary Vill:- Bhursit Brahamanpara PO: Munshirhut\r\nDist: Howrah', '8900089798', 'trisha9851@gmail.com', '0000-00-00', '0000-00-00'),
(88, 'Anik Chatterjee', 'Chatterjee Builders.\r\nBallavbati, Munshirhut,', '6546546543', '', '0000-00-00', '0000-00-00'),
(89, 'Kustav Chatterjee', 'Building no 1240\r\nWay no 277 Ghsla Sanniah\r\nSultanate of Oman', '8765432144', 'kustav@live.com', '2023-03-02', '2023-03-09'),
(90, 'Anik', 'Chatterjee Builders.\r\nBallavbati, Munshirhut,', '7980557599', 'kustav@live.com', '2023-01-12', '0000-00-00'),
(91, 'Truisjbvo', 'jldbviubgvibvvn  knuob', '9609423341', '', '2023-01-04', '2023-03-14'),
(92, 'Kustav Chatterjee', 'jldbviubgvibvvn  knuob', '1234567811', 'kustav@live.com', '2023-01-04', '2023-03-14'),
(93, 'Kustav Chatterjee', 'jldbviubgvibvvn  knuob', '1234567811', 'kustav@live.com', '2023-01-04', '2023-03-14'),
(94, 'eefewv rf', 'edfvrwvrbrb', '1231234569', 'sfz@jfvg.com', '2023-03-03', '2023-03-17'),
(95, 'Kustav Chatterjee', 'Building no 1240\r\nWay no 277 Ghsla Sanniah\r\nSultanate of Oman', '9808535722', 'kustav@live.com', '0000-00-00', '0000-00-00'),
(96, 'KFVMKFN', 'LN;KNVKVNFLN', '1234567891', 'SMCDIVNIY@LOJHIUFHON.COM', '0000-00-00', '0000-00-00'),
(97, 'sss', 'Galaxy Royale Gaur City 2\r\nB315', '9808535711', 'kustav@live.com', '2023-03-01', '2023-02-27'),
(98, 'sss', 'Galaxy Royale Gaur City 2\r\nB315', '9808535711', 'kustav@live.com', '2023-03-01', '2023-02-27'),
(99, 'Kustav Chatterjee', 'Building no 1240\r\nWay no 277 Ghsla Sanniah\r\nSultanate of Oman', '9808535711', 'kustav@live.com', '2023-03-02', '2023-03-01'),
(100, 'Amita Kar', 'C/O Dr. Aloke Ranjan Sarbadhikary Vill:- Bhursit Brahamanpara PO: Munshirhut\r\nDist: Howrah', '0890008979', 'trisha9851@gmail.com', '0000-00-00', '0000-00-00'),
(101, 'Amita Kar', 'C/O Dr. Aloke Ranjan Sarbadhikary Vill:- Bhursit Brahamanpara PO: Munshirhut\r\nDist: Howrah', '0890008979', 'trisha9851@gmail.com', '0000-00-00', '0000-00-00'),
(102, 'Amita Kar', 'C/O Dr. Aloke Ranjan Sarbadhikary Vill:- Bhursit Brahamanpara PO: Munshirhut\r\nDist: Howrah', '9609423343', 'trisha9851@gmail.com', '2023-03-26', '2023-03-26'),
(103, 'kus', 'fdfdty', '9609423342', 'trisha9851@gmail.com', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `executive`
--

DROP TABLE IF EXISTS `executive`;
CREATE TABLE IF NOT EXISTS `executive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 ;

--
-- Dumping data for table `executive`
--

INSERT INTO `executive` (`id`, `name`, `status`) VALUES
(1, 'km', 1),
(2, 'Mirza', 1),
(3, 'Ashok', 1),
(4, 'Rajesh', 1),
(5, 'Mahender', 1),
(6, 'P.Prasad', 1),
(7, 'Mahipal', 1),
(8, 'K.Mahesh', 1),
(9, 'Manju', 1),
(10, 'Amareshwari', 1),
(11, 'Anusha', 1),
(12, 'Kajal', 1),
(13, 'Jr.Khaja', 1),
(14, 'Jalender', 1),
(15, 'Bhavani', 1),
(16, 'Omer', 1),
(17, 'Abhilash/Gyani', 1),
(18, 'D.Mahesh', 1),
(19, 'SR.Khaja', 1),
(20, 'Veerender', 1),
(21, 'Kiran', 1),
(22, 'Gowtham', 1),
(23, 'Sai', 1),
(24, 'M.Nagesh', 1),
(25, 'Naveen', 1),
(26, 'Mamatha', 1),
(27, 'Hema', 1),
(28, 'Priyanka', 1),
(29, 'Prashanth', 1),
(30, 'Kranthi', 1),
(31, 'Shanker', 1),
(32, 'Mirza', 1),
(33, 'Ashok', 1),
(34, 'Rajesh ', 1),
(35, 'Mahender', 1),
(36, 'P.Prasad', 1),
(37, 'Mahipal', 1),
(38, 'K.Mahesh', 1),
(39, 'Manju', 1),
(40, 'Anusha', 1),
(41, 'Kajal', 1),
(42, 'JR.Khaja', 1),
(43, 'Rajkumar', 1),
(44, 'Laxmi', 1),
(45, 'Nikhil', 1),
(46, 'Vivek', 1);

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

DROP TABLE IF EXISTS `followup`;
CREATE TABLE IF NOT EXISTS `followup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `castid` varchar(10) NOT NULL,
  `castname` varchar(50) NOT NULL,
  `cast_mob` varchar(10) NOT NULL,
  `remarks` varchar(500)  COLLATE  NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `status` varchar(1)  COLLATE  NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL,
  `remarks_his` varchar(5000) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 ;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`id`, `castid`, `castname`, `cast_mob`, `remarks`, `updated_by`, `status`, `date`, `remarks_his`, `createdby`, `createdat`) VALUES
(7, '85', 'Kustav Chatterjee', '9609424242', 'ask again', 'admin', '1', '2023-03-28 07:34:00', 'khjhfugcyx by  at 2023-03-01 02:29:32-------asked to call again by  at 2023-03-02 13:51:00-------', '', '2023-02-24 06:12:09'),
(8, '85', 'Kustav Chatterjee', '9609424242', ';kkn', '', '1', '2023-03-01 18:30:00', '', '', '2023-02-24 06:12:09'),
(13, '4', 'Anik Chatterjee', '79', 'closed', 'data', '0', '0000-00-00 00:00:00', 'test  by admin at 2023-03-02 17:55:00-------call again  by admin at 2023-03-04 17:56:00-------', 'admin', '2023-03-01 12:25:39'),
(12, '87', 'Amita Kardeeee', '8900089798', 'jbkbvk', 'admin', '1', '2023-03-24 19:32:00', 'test final by admin at 2023-03-01 14:21:00-------1st followup asked to call again  by admin at 2023-03-02 14:24:00-------call closed by admin at 2023-02-28 15:24:00-------call closed by admin at 2023-02-28 15:24:00-------hh by admin at 2023-03-09 02:47:20-------', 'admin', '2023-02-28 07:50:10'),
(14, '4', 'Anik Chatterjee', '79', 'call closed ', 'data', '0', '2023-03-08 12:36:00', 'sd by data at 2023-03-02 18:00:00-------call again  by admin at 2023-03-08 18:04:00-------', 'data', '2023-03-01 12:30:46'),
(15, '', 'kus', '9609423342', 'vxbvbm', 'admin', '1', '2023-03-29 14:47:00', 'lh by data2 at 2023-03-27 13:36:00-------', 'data2', '2023-03-26 07:05:20'),
(16, '', 'Anik Chatterjee', '79', 'kl', 'data2', '1', '2023-03-29 08:12:00', '', 'data2', '2023-03-26 07:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int NOT NULL,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exptime` timestamp NOT NULL,
  `sub` varchar(20)  COLLATE  NOT NULL,
  `msg` varchar(150)  COLLATE  NOT NULL,
  `user` varchar(1000) NOT NULL,
  `ack` varchar(1000)  COLLATE  NOT NULL,
  `fromuser` varchar(30) NOT NULL,
  `status` varchar(1)  COLLATE  NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35  ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `time`, `exptime`, `sub`, `msg`, `user`, `ack`, `fromuser`, `status`) VALUES
(34, '2023-03-28 11:48:41', '2023-03-29 11:48:41', 'fj', 'kk', 'admin, data, data2, fmuser1@vdr', 'admin,admin,admin,admin,admin,admin,admin,admin,admin,', 'admin', '1'),
(31, '2023-03-26 06:31:31', '2023-03-27 06:31:31', 'test', 'jugydfdrxtx', 'admin, data, data2', 'admin,', 'data2', '1'),
(33, '2023-03-28 09:59:44', '2023-03-29 09:59:44', 'test', ',j', 'admin, data, data2', 'admin,', 'admin', '1'),
(32, '2023-03-26 10:32:50', '2023-03-27 10:32:50', 'test', 'ddddddfd vbfbf', 'admin, data, data2', 'admin,', 'data', '1'),
(30, '2023-03-25 10:16:44', '2023-03-26 10:16:44', 'test', 'fefdsfvdw', 'admin, data, data2', 'admin,', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38  ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `status`) VALUES
(1, 'Tikka(Papidibilla)', 1),
(2, 'Tikka(Papidibilla)', 1),
(3, 'Bore(Mathapatti)', 1),
(4, 'Mati(Matilu)', 1),
(5, 'Earrings(Kammalu)', 1),
(6, 'Nath(Mukkupudaka)', 1),
(7, 'Nosepin', 1),
(8, 'Jada(Jadalu)', 1),
(9, 'Hair Pin(Jadabilla)', 1),
(10, 'Choker', 1),
(11, 'Necklace', 1),
(12, 'Haram', 1),
(13, 'Black Beads', 1),
(14, 'Kante', 1),
(15, 'Chain', 1),
(16, 'Sutram Chain', 1),
(17, 'Finger Ring', 1),
(18, 'Ring With Bracelet', 1),
(19, 'Bracelet', 1),
(20, 'Armlet(Bhajuban)', 1),
(21, 'Oddiyanam', 1),
(22, 'Vanky', 1),
(23, 'Kandholi', 1),
(24, 'Bangles', 1),
(25, 'Kadda(Kadiyam)', 1),
(26, 'Pendant(Pathakam)', 1),
(27, 'Brooch', 1),
(28, 'Anklet(Pattilu)', 1),
(29, 'NKL/Earrings', 1),
(30, 'BB/PNDT', 1),
(31, 'Chain/PNDT', 1),
(32, 'BANG/FRNG', 1),
(33, 'Haram/CHK', 1),
(34, 'Mathapatti/Tikka', 1),
(35, 'Earrings/Mattis ', 1),
(36, 'Others', 1),
(37, 'SET', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ptype`
--

DROP TABLE IF EXISTS `ptype`;
CREATE TABLE IF NOT EXISTS `ptype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3  ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `page` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5  ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `page`) VALUES
(1, 'Admin', ''),
(2, 'C.M.R', 'ajax.php,addcus.php,in.php,out.php,fup.php,update.php,activity.php,mess.php'),
(3, 'FM', 'ajax.php,fup.php,update.php,fm_index.php,activity.php,mess.php');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `castid` varchar(50)  COLLATE  NOT NULL,
  `date` text NOT NULL,
  `tgi` text NOT NULL,
  `tht` text NOT NULL,
  `s` text NOT NULL,
  `ex` text NOT NULL
) ENGINE=MyISAM  ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`castid`, `date`, `tgi`, `tht`, `s`, `ex`) VALUES
('4', '0', '0', '0', '0', '0'),
('4', '0', '0', '0', '0', '0'),
('4', '0', '0', '0', '0', '0'),
('2', '0', '0', '0', '0', '0'),
('4', '2023-02-09', '1', '', 'Self', ''),
('4', '2023-02-13', '1', '6', 'Self', 'gfjgc'),
('dddd', 'Gold', 'KASULAPERU', 'Yes', 'Yes', 'Yes'),
('Rajesh', 'No', 'No', 'No', 'w', '100%');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` int DEFAULT NULL,
  `mob` varchar(10) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `onstatus` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=13  ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`, `mob`, `status`, `fname`, `lname`, `onstatus`) VALUES
(1, 'admin', '$2y$10$DE8XFFa.9f4E4Pe6FPJyd.2yxR/EqngPCizob.D.PgfkSClj..psC', '2023-02-21 00:14:44', 1, '', 1, 'admin', 'user', 1),
(2, 'data', '$2y$10$nIZWt7jbhu/CQ36K7gMQlul7NAIqych2F4qhIljl7FgkvRK6h4k/.', '2023-03-07 16:02:23', 1, '', 1, 'data', 'user', 0),
(8, 'data2', '$2y$10$nIZWt7jbhu/CQ36K7gMQlul7NAIqych2F4qhIljl7FgkvRK6h4k/.', '2023-03-09 18:12:19', 2, '', 1, 'user', 'name', 0),
(9, 'fmuser1@vdr', '$2y$10$nIZWt7jbhu/CQ36K7gMQlul7NAIqych2F4qhIljl7FgkvRK6h4k/.', '2023-03-16 14:36:15', 3, '', 1, 'aaa', 'eeee', 1),
(10, 'wsee@vdr', '$2y$10$7UO3BJ/AWz8DoVcMjFRigOBobRxMoIz/8cRhpGm.RVSX8OPI340Qa', '2023-03-30 16:25:30', 1, '', 1, 'www', 'wwww', 0),
(11, 'xxxx@vdr', '$2y$10$CrLZwgYSlrhe3jFV12BBneNi2ddBdT/mFFXPlnY7zsF2B2.SXn.d6', '2023-03-30 16:25:46', 1, '', 1, 'aaa', 'xxxx', 0),
(12, 'qecqe@vdr', '$2y$10$rPg3/GGAiuLxfY1f10NrJu8LzO2TJsTUUaO6oHmZ5jrzoc3QrBEKS', '2023-03-30 16:26:07', 1, '', 1, 'eeee', 'ccewcqc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `walkout_tmp`
--

DROP TABLE IF EXISTS `walkout_tmp`;
CREATE TABLE IF NOT EXISTS `walkout_tmp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `actid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
