-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2020 at 10:23 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `address3` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `hometp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `NIC` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `title`, `fname`, `lname`, `address1`, `address2`, `address3`, `contact`, `hometp`, `email`, `NIC`) VALUES
(1, 'Mr.', 'dinuth', 'shamen', 'test', 'test', 'test', 'test', 'test', 'test@gmail.com', NULL),
(2, 'Mr.', 'tiron', 'madushanka', 'testa', 'testa', 'testa3', 'contact', '03122525', 'dinuth@skkk.com', NULL),
(16, 'Mrs.', 'Sachini', 'himasha', 'dunakadeniya', 'welipennagahamulla', '60240', '0770260916', '0373875085', 'dinuthshamen@gmail.com', '951250589v');

-- --------------------------------------------------------

--
-- Table structure for table `deposited_things`
--

CREATE TABLE `deposited_things` (
  `dt_id` int(11) NOT NULL,
  `job_id` bigint(16) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deposited_things`
--

INSERT INTO `deposited_things` (`dt_id`, `job_id`, `description`) VALUES
(31, 200702220223, 'helmat'),
(32, 200702220223, 'carpet'),
(33, 200702220223, 'keyset'),
(34, 200702225547, 'helmat'),
(35, 200702230734, 'helmat'),
(36, 200703000154, 'helmat'),
(37, 200703133959, 'carpet'),
(38, 200705151702, 'carpet');

-- --------------------------------------------------------

--
-- Table structure for table `extra_services`
--

CREATE TABLE `extra_services` (
  `es_id` int(11) NOT NULL,
  `es_name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `extra_services`
--

INSERT INTO `extra_services` (`es_id`, `es_name`, `description`) VALUES
(1, 'welding', ''),
(2, 'paint', ''),
(3, 'light', ''),
(4, 'wiring', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE `group_permission` (
  `group_id` int(11) NOT NULL,
  `add_new_customer` tinyint(1) NOT NULL,
  `customer_information` tinyint(1) NOT NULL,
  `add_new_vehical` tinyint(1) NOT NULL,
  `vehical_information` tinyint(1) NOT NULL,
  `create_job` tinyint(1) NOT NULL,
  `job_status_change` tinyint(1) NOT NULL,
  `job_delete` int(11) NOT NULL,
  `job_information` tinyint(1) NOT NULL,
  `user_manage` tinyint(1) NOT NULL,
  `user_group` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`group_id`, `add_new_customer`, `customer_information`, `add_new_vehical`, `vehical_information`, `create_job`, `job_status_change`, `job_delete`, `job_information`, `user_manage`, `user_group`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(3, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0),
(4, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(1050) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `unit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `GRN_price` decimal(10,2) NOT NULL,
  `Sale_price` decimal(10,2) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `product_name`, `qty`, `unit`, `GRN_price`, `Sale_price`, `created_date`) VALUES
(1, 'Engine Oil', '100.00', 'L', '1000.00', '1200.00', '2020-06-29'),
(2, 'Service Charge', '0.00', '', '0.00', '700.00', '2020-06-29'),
(3, 'Oil Filter', '15.00', 'Nos', '200.00', '220.00', '2020-06-29'),
(5, 'test6', '25.00', 'L', '2250.50', '3000.50', '2020-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoice_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`invoice_no`, `product_id`, `description`, `qty`, `amount`) VALUES
(1, 1, 'castrol', '5.00', '1200.00'),
(1, 2, 'kasun', NULL, '700.00'),
(1, 3, 'brand new', '1.00', '220.00'),
(2, 1, 'caltex 1.5L bottle', '0.00', '1250.00'),
(2, 2, '', '0.00', '700.00'),
(2, 3, 'Brand new - servo', '1.00', '220.00'),
(3, 1, 'caltex 1.5l bottle', '1.00', '1200.00'),
(3, 2, '', '0.00', '700.00'),
(3, 3, '', '1.00', '220.00'),
(4, 1, 'Caltex 500ml', '0.50', '250.00'),
(4, 2, '', '0.00', '700.00'),
(5, 1, 'sdsd', '0.00', '1200.00'),
(6, 1, 'DFLKDLFKJ', '50.00', '1200.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_header`
--

CREATE TABLE `invoice_header` (
  `invoice_no` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `is_cancelled` tinyint(1) NOT NULL,
  `is_print` tinyint(1) NOT NULL,
  `is_done` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice_header`
--

INSERT INTO `invoice_header` (`invoice_no`, `date_time`, `job_id`, `amount`, `discount`, `user_name`, `is_cancelled`, `is_print`, `is_done`) VALUES
(1, '2020-07-02 10:08:07', 200702220223, '2120.00', '20.00', 'admin', 0, 1, 1),
(2, '2020-07-02 10:57:59', 200702225547, '2170.00', '0.00', 'admin', 0, 1, 1),
(3, '2020-07-02 11:09:33', 200702230734, '2120.00', '0.00', 'admin', 0, 1, 1),
(4, '2020-07-03 12:07:56', 200703000154, '950.00', '0.00', 'admin', 0, 1, 1),
(5, '2020-07-03 05:01:00', 200703133959, '0.00', '0.00', 'admin', 0, 0, 0),
(6, '2020-07-05 03:05:13', 200703133959, '0.00', '0.00', 'admin', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_extra_services`
--

CREATE TABLE `job_extra_services` (
  `extra_service_id` int(11) NOT NULL,
  `service_job_id` bigint(16) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_extra_services`
--

INSERT INTO `job_extra_services` (`extra_service_id`, `service_job_id`, `active`) VALUES
(1, 200702220223, 1),
(1, 200703133959, 1),
(2, 200703133959, 1),
(2, 200705151702, 1),
(4, 200702225547, 1),
(4, 200702230734, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

CREATE TABLE `job_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_status`
--

INSERT INTO `job_status` (`status_id`, `status`, `button`) VALUES
(1, 'Pending', 'btn btn-light btn-xs'),
(2, 'After 3', 'btn btn-warning btn-xs'),
(3, 'After 2', 'btn btn-warning btn-xs'),
(4, 'Next', 'btn btn-warning btn-xs'),
(5, 'Started', 'btn btn-danger btn-xs'),
(6, 'Testing', 'btn btn-success btn-xs'),
(7, 'Customer Rejected', 'btn btn-secondary btn-xs'),
(8, 'Rejected', 'btn btn-secondary btn-xs'),
(9, 'Done', 'btn btn-success btn-xs');

-- --------------------------------------------------------

--
-- Table structure for table `service_job`
--

CREATE TABLE `service_job` (
  `job_id` bigint(16) NOT NULL,
  `date_time` datetime NOT NULL,
  `ve_no` varchar(15) NOT NULL,
  `service_type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `service_millage` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `status_message` varchar(250) NOT NULL,
  `Is_print` tinyint(1) NOT NULL,
  `closed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_job`
--

INSERT INTO `service_job` (`job_id`, `date_time`, `ve_no`, `service_type`, `description`, `service_millage`, `status`, `user`, `status_message`, `Is_print`, `closed`) VALUES
(620450007, '2020-06-21 12:30:54', 'NW-BCE-5555', 1, 'asdasdasd', 12321321, 9, '', '', 0, 1),
(621283004, '2020-06-21 10:00:38', 'NE-VVV-1234', 1, 'kjbkjhkjhkj', 321321, 9, '', '', 0, 1),
(200702220223, '2020-07-02 10:03:08', 'NW-BCR-8612', 2, 'check air cleaner,', 355560, 9, 'admin', 'checked air cleaner.', 1, 1),
(200702225547, '2020-07-02 10:56:32', 'NE-VVV-1234', 1, 'change to chain sprocket', 65654, 9, 'admin', 'next', 1, 1),
(200702230734, '2020-07-02 11:08:10', 'NW-BCR-8612', 1, 'battry case', 65465465, 9, 'admin', 'Battry changed, change oil filter', 1, 1),
(200703000154, '2020-07-03 12:02:27', 'NE-VVV-1234', 1, 'Udubaddawa, check oil level', 63636, 9, 'admin', 'Oil level filled,  redy to eco test. ', 1, 1),
(200703133959, '2020-07-03 01:40:07', 'NE-VVV-1234', 1, 'test', 2121321, 2, 'admin', 'get', 1, 0),
(200705151702, '2020-07-05 03:17:13', 'NW-BCE-5555', 2, 'sdosdos [sldk; sd;ksldk s;ldks ', 654654, 1, 'admin', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  `includes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`type_id`, `type_name`, `includes`) VALUES
(1, 'Full Service', ''),
(2, 'Eco Test', ''),
(3, 'Repair', ''),
(4, 'Accidental', '');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `submit_user` varchar(20) NOT NULL,
  `is_completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(20) NOT NULL,
  `full_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_group` int(11) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `full_name`, `user_group`, `password`, `created_date`, `phone`) VALUES
('aa', 'aa', 1, '4124bc0a9335c27f086f24ba207a4912', '2020-06-20 13:32:55', 'aa'),
('admin', 'admin', 1, '21232f297a57a5a743894a0e4a801fc3', '2020-06-20 13:22:55', '0770260916'),
('dd', 'dd', 1, '1aabac6d068eef6a7bad3fdf50a05cc8', '2020-06-20 13:31:15', 'dd'),
('dinuth', 'dinuth', 1, '70d93a84b6b73216b3220611aef3c8bb', '2020-06-20 13:25:22', '0770225665'),
('shenith', 'shenith', 3, '21232f297a57a5a743894a0e4a801fc3', '2020-06-22 13:03:53', '0770260916'),
('superadmin', 'Dinuth Shamen', 1, '21232f297a57a5a743894a0e4a801fc3', '2020-06-20 12:47:02', '0770260916'),
('thushan', 'thushan', 1, '21232f297a57a5a743894a0e4a801fc3', '2020-06-21 13:14:13', '32312');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`, `created_date`) VALUES
(1, 'Superadmin', '0000-00-00 00:00:00'),
(2, 'Administrator', '2020-06-20 10:30:28'),
(3, 'Manager', '0000-00-00 00:00:00'),
(4, 'Cashier', '2020-06-20 10:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `catid` int(11) NOT NULL,
  `catname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`catid`, `catname`) VALUES
(1, 'MOTOBIKE'),
(2, 'CAR'),
(3, 'THREEWIL'),
(5, 'VAN');

-- --------------------------------------------------------

--
-- Table structure for table `vehical`
--

CREATE TABLE `vehical` (
  `Vno` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Vowner` int(11) NOT NULL,
  `vcat` int(11) DEFAULT NULL,
  `vtype` int(11) DEFAULT NULL,
  `vmodel` int(11) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `milage` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehical`
--

INSERT INTO `vehical` (`Vno`, `Vowner`, `vcat`, `vtype`, `vmodel`, `description`, `milage`, `image`) VALUES
('NE-VVV-1234', 1, 1, 5, 6, 'test', 2121321, 'images/uploard/15925876360.png'),
('NW-BCE-5555', 1, 1, 5, 6, 'test yuga', 654654, 'images/uploard/15924137190.png'),
('NW-BCR-8612', 16, 1, 1, 3, 'platina', 65465465, 'images/uploard/15937075400.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vmodel`
--

CREATE TABLE `vmodel` (
  `vmid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `modelname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vmodel`
--

INSERT INTO `vmodel` (`vmid`, `typeid`, `modelname`) VALUES
(1, 1, 'CT -100CC'),
(2, 1, 'DISCOVERY -100CC'),
(3, 1, 'PLATINA -100CC'),
(4, 1, 'PALSAR -135CC'),
(5, 5, 'DIO'),
(6, 5, 'DREAM YUGA'),
(8, 1, 'DISCOVERY 125CC');

-- --------------------------------------------------------

--
-- Table structure for table `vtype`
--

CREATE TABLE `vtype` (
  `typeid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `typename` varchar(150) NOT NULL,
  `logo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vtype`
--

INSERT INTO `vtype` (`typeid`, `catid`, `typename`, `logo`) VALUES
(1, 1, 'BAJAJ-MB', 'images\\bajaj.png'),
(2, 1, 'SUZUKI-MB', ''),
(3, 2, 'TOYOTA', ''),
(4, 2, 'HONDA -CAR', 'images\\honda.png'),
(5, 1, 'HONDA-MB', 'images\\honda.png'),
(11, 1, 'YAMAHA-MB', 'images/yamaha.png'),
(12, 1, 'TVS-MB', 'images/tvs.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `deposited_things`
--
ALTER TABLE `deposited_things`
  ADD PRIMARY KEY (`dt_id`),
  ADD KEY `job_idFK` (`job_id`);

--
-- Indexes for table `extra_services`
--
ALTER TABLE `extra_services`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_no`,`product_id`),
  ADD KEY `product_id_FK` (`product_id`);

--
-- Indexes for table `invoice_header`
--
ALTER TABLE `invoice_header`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `user_name_FK` (`user_name`),
  ADD KEY `Job_id_FK` (`job_id`);

--
-- Indexes for table `job_extra_services`
--
ALTER TABLE `job_extra_services`
  ADD PRIMARY KEY (`extra_service_id`,`service_job_id`),
  ADD KEY `sjid` (`service_job_id`);

--
-- Indexes for table `job_status`
--
ALTER TABLE `job_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `service_job`
--
ALTER TABLE `service_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `service_type` (`service_type`),
  ADD KEY `vehno` (`ve_no`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `vehical`
--
ALTER TABLE `vehical`
  ADD PRIMARY KEY (`Vno`);

--
-- Indexes for table `vmodel`
--
ALTER TABLE `vmodel`
  ADD PRIMARY KEY (`vmid`,`typeid`),
  ADD KEY `TYPE_FK` (`typeid`);

--
-- Indexes for table `vtype`
--
ALTER TABLE `vtype`
  ADD PRIMARY KEY (`typeid`,`catid`),
  ADD KEY `CATID_FK` (`catid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `deposited_things`
--
ALTER TABLE `deposited_things`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `extra_services`
--
ALTER TABLE `extra_services`
  MODIFY `es_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_header`
--
ALTER TABLE `invoice_header`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `job_status`
--
ALTER TABLE `job_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_job`
--
ALTER TABLE `service_job`
  MODIFY `job_id` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200705151703;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vmodel`
--
ALTER TABLE `vmodel`
  MODIFY `vmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vtype`
--
ALTER TABLE `vtype`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposited_things`
--
ALTER TABLE `deposited_things`
  ADD CONSTRAINT `job_idFK` FOREIGN KEY (`job_id`) REFERENCES `service_job` (`job_id`);

--
-- Constraints for table `group_permission`
--
ALTER TABLE `group_permission`
  ADD CONSTRAINT `group` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`group_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `inv_no_FK` FOREIGN KEY (`invoice_no`) REFERENCES `invoice_header` (`invoice_no`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_id_FK` FOREIGN KEY (`product_id`) REFERENCES `inventory` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `invoice_header`
--
ALTER TABLE `invoice_header`
  ADD CONSTRAINT `Job_id_FK` FOREIGN KEY (`job_id`) REFERENCES `service_job` (`job_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_name_FK` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `job_extra_services`
--
ALTER TABLE `job_extra_services`
  ADD CONSTRAINT `esid` FOREIGN KEY (`extra_service_id`) REFERENCES `extra_services` (`es_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sjid` FOREIGN KEY (`service_job_id`) REFERENCES `service_job` (`job_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `service_job`
--
ALTER TABLE `service_job`
  ADD CONSTRAINT `service_type` FOREIGN KEY (`service_type`) REFERENCES `service_types` (`type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `job_status` (`status_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vehno` FOREIGN KEY (`ve_no`) REFERENCES `vehical` (`Vno`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vmodel`
--
ALTER TABLE `vmodel`
  ADD CONSTRAINT `TYPE_FK` FOREIGN KEY (`typeid`) REFERENCES `vtype` (`typeid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `vtype`
--
ALTER TABLE `vtype`
  ADD CONSTRAINT `CATID_FK` FOREIGN KEY (`catid`) REFERENCES `vcategory` (`catid`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
