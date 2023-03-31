-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2023 at 07:29 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saenterp_ulm`
--

-- --------------------------------------------------------

--
-- Table structure for table `act`
--

CREATE TABLE `act` (
  `actid` int(11) NOT NULL,
  `castid` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tgi` varchar(11) DEFAULT NULL,
  `tht` varchar(11) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `associate` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `product` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `billed` varchar(50) DEFAULT NULL,
  `sr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `requirement` varchar(50) DEFAULT NULL,
  `fm` varchar(50) DEFAULT NULL,
  `advance` varchar(50) DEFAULT NULL,
  `orderst` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `walkout` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `conversion` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `intime` varchar(10) NOT NULL,
  `time` text NOT NULL,
  `user` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `act`
--

INSERT INTO `act` (`actid`, `castid`, `date`, `tgi`, `tht`, `source`, `executive`, `associate`, `Type`, `product`, `billed`, `sr`, `requirement`, `fm`, `advance`, `orderst`, `walkout`, `reason`, `conversion`, `remarks`, `intime`, `time`, `user`) VALUES
(1, '1', '2023-03-28', '1', '', 'Self', '1', '2', 'Gold', '38', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'l', '100%', ',', '14:18', '20:14', '1'),
(2, '1', '2023-03-28', '1', '', 'Self', '1', '2', 'Gold', '38', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'l', '100%', ',', '14:18', '20:14', '1'),
(3, '1', '2023-03-28', '1', '', 'Self', '1', '1', 'Gold', '', 'No', 'No', 'No', 'Rajesh', 'No', 'No', 'No', 'l', '0%', 'kk', '16:13', '17:15', '1'),
(4, '2', '2023-03-28', '2', '2', 'Facebook', '1', '2', 'Diamond', '38', 'Yes', 'No', 'No', 'Rajesh', 'No', 'No', 'No', '', '100%', '', '15:16', '15:16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `action` varchar(10) DEFAULT NULL,
  `fun` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `uid` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `timestamp`, `action`, `fun`, `additional_info`, `uid`) VALUES
(1, '2023-03-28 06:20:57', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(2, '2023-03-28 06:21:22', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(3, '2023-03-28 06:24:14', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(4, '2023-03-28 06:39:21', 'Login', 'Failed_login_attempt', 'Failed login attempt for  admin from 103.208.68.175', '0'),
(5, '2023-03-28 06:39:25', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(6, '2023-03-28 06:42:08', 'Login', 'Failed_login_attempt', 'Failed login attempt for  admin from 103.208.68.175', '0'),
(7, '2023-03-28 06:42:12', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(8, '2023-03-28 08:23:33', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(9, '2023-03-28 08:23:51', 'Add', 'Customer', 'Created Customer Anik Chatterjee by admin', '1'),
(10, '2023-03-28 08:26:22', 'Update', 'Users', 'Disable User 2 by admin', '1'),
(11, '2023-03-28 08:26:24', 'Update', 'Users', 'Enable User 2 by admin', '1'),
(12, '2023-03-28 08:29:27', 'Add', 'Executive', 'Created Executive Test by admin', '1'),
(13, '2023-03-28 08:29:30', 'Update', 'Executive', 'Disable Executive 1 by admin', '1'),
(14, '2023-03-28 08:29:32', 'Update', 'Executive', 'Enable Executive 1 by admin', '1'),
(15, '2023-03-28 08:30:23', 'Add', 'Associate', 'Created Associate Test by admin', '1'),
(16, '2023-03-28 08:46:50', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(17, '2023-03-28 08:47:09', 'Add', 'Associate', 'Created Associate Testa by admin', '1'),
(18, '2023-03-28 08:48:01', 'Add', 'Product', 'Created Product TestProduct by admin', '1'),
(19, '2023-03-28 08:50:08', 'Add', 'InCustomer', 'Customer entry Anik Chatterjee by admin', '1'),
(20, '2023-03-28 09:29:27', 'Login', 'Logedin', 'User admin Logedin from 103.208.68.175', '1'),
(21, '2023-03-28 09:42:02', 'Add', 'Followup', 'Customer Followup  by admin', '1'),
(22, '2023-03-28 09:42:02', 'Submit', 'Customer out', 'Customer Exit 1 by admin', '1'),
(23, '2023-03-28 09:43:07', 'Add', 'InCustomer', 'Customer entry Anik Chatterjee by admin', '1'),
(24, '2023-03-28 09:43:53', 'Add', 'Followup', 'Customer Followup  by admin', '1'),
(25, '2023-03-28 09:43:53', 'Submit', 'Customer out', 'Customer Exit 1 by admin', '1'),
(26, '2023-03-28 09:44:00', 'Login', 'Logedin', 'User admin Logedin from 183.82.103.142', '1'),
(27, '2023-03-28 09:44:55', 'Update', 'Follow Up', 'Customer Followup ID 1 by admin', '1'),
(28, '2023-03-28 09:45:20', 'Update', 'Follow Up', 'Customer Followup ID 1 by admin', '1'),
(29, '2023-03-28 09:45:36', 'Add', 'Customer', 'Created Customer chotu by admin', '1'),
(30, '2023-03-28 09:46:10', 'Add', 'InCustomer', 'Customer entry chotu by admin', '1'),
(31, '2023-03-28 09:46:43', 'Submit', 'Customer out', 'Customer Exit 2 by admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `associate`
--

CREATE TABLE `associate` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `associate`
--

INSERT INTO `associate` (`id`, `name`, `status`) VALUES
(1, 'Test', '1'),
(2, 'Testa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `castin`
--

CREATE TABLE `castin` (
  `id` int(11) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tgi` varchar(2) NOT NULL,
  `thc` varchar(2) NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` varchar(10) NOT NULL,
  `cou_id` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` varchar(20) NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `time`, `user`, `msg`) VALUES
(1, '2023-03-28 09:46:50', 'admin', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `coustomeradd`
--

CREATE TABLE `coustomeradd` (
  `id` int(11) NOT NULL,
  `cou_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_no` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `coustomeradd`
--

INSERT INTO `coustomeradd` (`id`, `cou_name`, `address`, `mobile_no`, `mail_id`, `dob`, `doa`) VALUES
(1, 'Anik Chatterjee', 'Chatterjee Builders.\r\nBallavbati, Munshirhut,', '7980557596', 'kustav@live.com', '2023-03-01', '2023-03-01'),
(2, 'chotu', 'Hyderabad', '9641365918', 'kustav@live', '2023-03-02', '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `executive`
--

CREATE TABLE `executive` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `executive`
--

INSERT INTO `executive` (`id`, `name`, `status`) VALUES
(1, 'Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `id` int(11) NOT NULL,
  `castid` varchar(10) NOT NULL,
  `castname` varchar(50) NOT NULL,
  `cast_mob` varchar(10) NOT NULL,
  `remarks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks_his` varchar(5000) NOT NULL DEFAULT '-',
  `createdby` varchar(30) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`id`, `castid`, `castname`, `cast_mob`, `remarks`, `updated_by`, `status`, `date`, `remarks_his`, `createdby`, `createdat`) VALUES
(1, '1', 'Anik Chatterjee', '7980557596', 'lmml', 'admin', '1', '2023-04-06 18:19:00', '-s by admin at 2023-03-29 20:14:00-------,lm by admin at 2023-03-29 15:14:00-------', 'admin', '2023-03-28 09:42:02'),
(2, '1', 'Anik Chatterjee', '7980557596', 'kk', 'admin', '1', '2023-03-28 17:16:00', '-', 'admin', '2023-03-28 09:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `exptime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sub` varchar(20) NOT NULL,
  `msg` varchar(150) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `ack` varchar(1000) NOT NULL,
  `fromuser` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `status`) VALUES
(38, 'TestProduct', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ptype`
--

CREATE TABLE `ptype` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `page` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `page`) VALUES
(1, 'Admin', ''),
(2, 'C.M.R', 'ajax.php,addcus.php,in.php,out.php,fup.php,update.php,activity.php,mess.php'),
(3, 'FM', 'ajax.php,fup.php,update.php,fm_index.php,activity.php,mess.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` int(11) DEFAULT NULL,
  `mob` varchar(10) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 1,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `onstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`, `mob`, `status`, `fname`, `lname`, `onstatus`) VALUES
(1, 'admin', '$2y$10$DE8XFFa.9f4E4Pe6FPJyd.2yxR/EqngPCizob.D.PgfkSClj..psC', '2023-02-21 00:14:44', 1, '0', 1, 'admin', 'user', 0),
(2, 'democmr', '$2y$10$XnirmobaNW2E6ZO7wYcC.OUKGx6uIBb91Apayw8nYSr/Zv/Jnkiey', '2023-03-28 08:42:55', 1, '0', 1, 'demo', 'user', 0),
(3, 'data2', '$2y$10$nIZWt7jbhu/CQ36K7gMQlul7NAIqych2F4qhIljl7FgkvRK6h4k/.', '2023-03-09 18:12:19', 1, '0', 1, 'user', 'name', 0),
(4, 'fmuser1@vdr', '$2y$10$nIZWt7jbhu/CQ36K7gMQlul7NAIqych2F4qhIljl7FgkvRK6h4k/.', '2023-03-16 14:36:15', 1, '0', 1, 'aaa', 'eeee', 0),
(5, 'wsee@vdr', '$2y$10$7UO3BJ/AWz8DoVcMjFRigOBobRxMoIz/8cRhpGm.RVSX8OPI340Qa', '2023-03-30 16:25:30', 1, '0', 1, 'www', 'wwww', 0),
(6, 'xxxx@vdr', '$2y$10$CrLZwgYSlrhe3jFV12BBneNi2ddBdT/mFFXPlnY7zsF2B2.SXn.d6', '2023-03-30 16:25:46', 1, '0', 1, 'aaa', 'xxxx', 0),
(7, 'qecqe@vdr', '$2y$10$rPg3/GGAiuLxfY1f10NrJu8LzO2TJsTUUaO6oHmZ5jrzoc3QrBEKS', '2023-03-30 16:26:07', 1, '0', 1, 'eeee', 'ccewcqc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `walkout_tmp`
--

CREATE TABLE `walkout_tmp` (
  `id` int(11) NOT NULL,
  `actid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `act`
--
ALTER TABLE `act`
  ADD PRIMARY KEY (`actid`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associate`
--
ALTER TABLE `associate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `castin`
--
ALTER TABLE `castin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coustomeradd`
--
ALTER TABLE `coustomeradd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `executive`
--
ALTER TABLE `executive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ptype`
--
ALTER TABLE `ptype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `walkout_tmp`
--
ALTER TABLE `walkout_tmp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `act`
--
ALTER TABLE `act`
  MODIFY `actid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `associate`
--
ALTER TABLE `associate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `castin`
--
ALTER TABLE `castin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coustomeradd`
--
ALTER TABLE `coustomeradd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `executive`
--
ALTER TABLE `executive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ptype`
--
ALTER TABLE `ptype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `walkout_tmp`
--
ALTER TABLE `walkout_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
