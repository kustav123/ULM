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
  `product` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `billed` varchar(50) DEFAULT NULL,
  `sr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `requirement` varchar(50) DEFAULT NULL,
  `fm` varchar(50) DEFAULT NULL,
  `advance` varchar(50) DEFAULT NULL,
  `orderst` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `walkout` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `conversion` varchar(50) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `intime` varchar(10) NOT NULL,
  `time` text NOT NULL,
  `user` varchar(10) NOT NULL,
  PRIMARY KEY (`actid`)
) ;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(10) DEFAULT NULL,
  `fun` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `additional_info` text,
  `uid` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `associate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);

INSERT INTO `associate` ( `name`, `status`) VALUES
( 'Shanker', '1'),
( 'Mirza', '1'),
( 'Ashok', '1'),
( 'Rajesh', '1'),
('Mahender', '1'),
( 'P.Prasad', '1'),
( 'Mahipal', '1'),
( 'K.Mahesh', '1'),
( 'Manju', '1'),
( 'Amareshwari', '1'),
( 'Anusha', '1'),
( 'Kajal', '1'),
( 'Jr.Khaja', '1'),
( 'Jalender', '1'),
( 'Bhavani', '1'),
( 'Omer', '1'),
( 'Abhilash/Gyani', '1'),
( 'D.Mahesh', '1'),
( 'SR.Khaja', '1'),
( 'Veerender', '1'),
( 'Kiran', '1'),
( 'Gowtham', '1'),
( 'Sai', '1'),
( 'M.Nagesh', '1'),
( 'Naveen', '1'),
( 'Mamatha', '1'),
( 'Hema', '1'),
( 'Priyanka', '1'),
( 'Prashanth', '1'),
( 'Kranthi', '1'),
( 'Shanker', '1'),
( 'Mirza', '1'),
( 'Ashok', '1'),
( 'Rajesh ', '1'),
( 'Mahender', '1'),
( 'P.Prasad', '1'),
( 'Mahipal', '1'),
( 'K.Mahesh', '1'),
( 'Manju', '1'),
( 'Anusha', '1'),
( 'Kajal', '1'),
( 'JR.Khaja', '1'),
( 'Rajkumar', '1'),
('Laxmi', '1'),
( 'Nikhil', '1'),
( 'Vivek', '1')
;

CREATE TABLE IF NOT EXISTS `castin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mob` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tgi` int NOT NULL,
  `thc` int NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` varchar(10) NOT NULL,
  `cou_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(20) NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
); 
CREATE TABLE IF NOT EXISTS `coustomeradd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_no` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `mail_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `doa` date NOT NULL,
  `DND` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'No',
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `executive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ;
INSERT INTO `executive` ( `name`, `status`) VALUES
( 'Shanker', '1'),
( 'Mirza', '1'),
( 'Ashok', '1'),
( 'Rajesh', '1'),
('Mahender', '1'),
( 'P.Prasad', '1'),
( 'Mahipal', '1'),
( 'K.Mahesh', '1'),
( 'Manju', '1'),
( 'Amareshwari', '1'),
( 'Anusha', '1'),
( 'Kajal', '1'),
( 'Jr.Khaja', '1'),
( 'Jalender', '1'),
( 'Bhavani', '1'),
( 'Omer', '1'),
( 'Abhilash/Gyani', '1'),
( 'D.Mahesh', '1'),
( 'SR.Khaja', '1'),
( 'Veerender', '1'),
( 'Kiran', '1'),
( 'Gowtham', '1'),
( 'Sai', '1'),
( 'M.Nagesh', '1'),
( 'Naveen', '1'),
( 'Mamatha', '1'),
( 'Hema', '1'),
( 'Priyanka', '1'),
( 'Prashanth', '1'),
( 'Kranthi', '1'),
( 'Shanker', '1'),
( 'Mirza', '1'),
( 'Ashok', '1'),
( 'Rajesh ', '1'),
( 'Mahender', '1'),
( 'P.Prasad', '1'),
( 'Mahipal', '1'),
( 'K.Mahesh', '1'),
( 'Manju', '1'),
( 'Anusha', '1'),
( 'Kajal', '1'),
( 'JR.Khaja', '1'),
( 'Rajkumar', '1'),
('Laxmi', '1'),
( 'Nikhil', '1'),
( 'Vivek', '1')
;

CREATE TABLE IF NOT EXISTS `followup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `castid` varchar(10) NOT NULL,
  `castname` varchar(50) NOT NULL,
  `cast_mob` varchar(10) NOT NULL,
  `remarks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL,
  `remarks_his` varchar(5000) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastact` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int NOT NULL,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(1000) NOT NULL
);
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exptime` timestamp NOT NULL,
  `sub` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `msg` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user` varchar(1000) NOT NULL,
  `ack` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fromuser` varchar(30) NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `product` ( `name`, `status`) VALUES
( 'Tikka(Papidibilla)', 1),
( 'Tikka(Papidibilla)', 1),
( 'Bore(Mathapatti)', 1),
( 'Mati(Matilu)', 1),
( 'Earrings(Kammalu)', 1),
( 'Nath(Mukkupudaka)', 1),
( 'Nosepin', 1),
( 'Jada(Jadalu)', 1),
( 'Hair Pin(Jadabilla)', 1),
( 'Choker', 1),
( 'Necklace', 1),
( 'Haram', 1),
( 'Black Beads', 1),
( 'Kante', 1),
( 'Chain', 1),
( 'Sutram Chain', 1),
( 'Finger Ring', 1),
( 'Ring With Bracelet', 1),
( 'Bracelet', 1),
( 'Armlet(Bhajuban)', 1),
( 'Oddiyanam', 1),
( 'Vanky', 1),
( 'Kandholi', 1),
( 'Bangles', 1),
( 'Kadda(Kadiyam)', 1),
( 'Pendant(Pathakam)', 1),
( 'Brooch', 1),
( 'Anklet(Pattilu)', 1),
( 'NKL/Earrings', 1),
( 'BB/PNDT', 1),
( 'Chain/PNDT', 1),
( 'BANG/FRNG', 1),
( 'Haram/CHK', 1),
( 'Mathapatti/Tikka', 1),
( 'Earrings/Mattis ', 1),
('Others', 1),
( 'SET', 1);


CREATE TABLE IF NOT EXISTS `ptype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `page` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `role` (`id`, `name`, `page`) VALUES
(1, 'Admin', ''),
(2, 'C.M.R', 'ajax.php,addcus.php,in.php,out.php,fup.php,update.php,activity.php,mess.php'),
(3, 'FM', 'ajax.php,fup.php,update.php,fm_index.php,activity.php,mess.php');
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
) ;

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`, `mob`, `status`, `fname`, `lname`, `onstatus`) VALUES
(1, 'admin', '$2y$10$DE8XFFa.9f4E4Pe6FPJyd.2yxR/EqngPCizob.D.PgfkSClj..psC', '2023-02-21 00:14:44', 1, '', 1, 'admin', 'user', 1);