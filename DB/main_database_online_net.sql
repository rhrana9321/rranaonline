-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 05:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_net`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_head_table`
--

CREATE TABLE `account_head_table` (
  `id` int(1) NOT NULL,
  `name` longtext NOT NULL,
  `details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_head_table`
--

INSERT INTO `account_head_table` (`id`, `name`, `details`) VALUES
(1, 'Sawon', 'stuff'),
(2, 'Muktar', 'Stuff'),
(3, 'Badhol', 'Sekher gao'),
(4, 'Karent bil', 'office'),
(5, 'Office Vara', 'woner'),
(6, 'Bipul', 'tetutola'),
(7, 'Jakir', 'jamaldi'),
(8, 'Bashar membar', 'mohammadpure'),
(9, 'Puji', ''),
(10, 'customers due bill', ''),
(11, 'Auto vara', 'potidin'),
(12, 'Dairy', 'office jonn'),
(13, 'Chata', 'office jonn'),
(14, 'Bag', 'officer jonn'),
(15, 'Dhaka vara', 'mal kina'),
(16, 'সার্ভিসিং মালামাল', 'Old product'),
(17, 'Sekh monir', 'patner'),
(18, 'Gaffar mama', 'patner'),
(19, 'Samol vai', 'patner'),
(20, 'Afjal', 'patner'),
(21, 'Razib Hossain Rana', 'patner'),
(22, 'মালামাল', 'office/নেট'),
(23, 'সার্ভিস চার্জ', 'নেট'),
(24, 'Bill', 'net');

-- --------------------------------------------------------

--
-- Table structure for table `account_statement_table`
--

CREATE TABLE `account_statement_table` (
  `acc_id` int(11) NOT NULL,
  `c_date` date NOT NULL,
  `particular` longtext NOT NULL,
  `client` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `expence_id` int(11) NOT NULL,
  `others_income` int(11) NOT NULL,
  `credit` double NOT NULL,
  `debit` double NOT NULL,
  `balance` double NOT NULL,
  `month_name` int(11) NOT NULL,
  `history_record` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_statement_table`
--

INSERT INTO `account_statement_table` (`acc_id`, `c_date`, `particular`, `client`, `customer_id`, `payment_id`, `expence_id`, `others_income`, `credit`, `debit`, `balance`, `month_name`, `history_record`) VALUES
(2, '2020-06-16', 'June Months Connection charge payment of Simran', 0, 0, 0, 0, 0, 1800, 0, 0, 6, ''),
(6, '2020-06-01', 'deloyar', 0, 0, 0, 0, 2, 1000, 0, 0, 6, ''),
(7, '2020-06-01', 'total bill', 0, 0, 0, 0, 3, 4400, 0, 0, 6, ''),
(9, '2020-06-16', 'June Months Connection charge payment of Jinnat vai', 0, 0, 0, 0, 0, 1000, 0, 0, 6, ''),
(10, '2020-06-07', 'total bill-net', 0, 0, 0, 0, 5, 3600, 0, 0, 6, ''),
(11, '2020-06-07', 'tisha-cable bill', 0, 0, 0, 0, 6, 600, 0, 0, 6, ''),
(12, '2020-06-09', 'total bill', 0, 0, 0, 0, 7, 1100, 0, 0, 6, ''),
(13, '2020-06-09', 'sabbir-cable bill net', 0, 0, 0, 0, 8, 600, 0, 0, 6, ''),
(14, '2020-06-11', 'total bill', 0, 0, 0, 0, 9, 900, 0, 0, 6, ''),
(15, '2020-06-12', 'total bill', 0, 0, 0, 0, 10, 2400, 0, 0, 6, ''),
(16, '2020-06-09', 'net/afol sopon', 0, 0, 0, 0, 11, 400, 0, 0, 6, ''),
(17, '2020-06-14', 'total bill', 0, 0, 0, 0, 12, 600, 0, 0, 6, ''),
(18, '2020-06-15', 'total bill', 0, 0, 0, 0, 13, 1800, 0, 0, 6, ''),
(19, '2020-06-17', 'total bill', 0, 0, 0, 0, 14, 3400, 0, 0, 6, ''),
(20, '2020-06-18', 'total bill', 0, 0, 0, 0, 15, 1100, 0, 0, 6, ''),
(22, '2020-06-20', 'total bill-d bank/kalam', 0, 0, 0, 0, 17, 1500, 0, 0, 6, ''),
(23, '2020-06-21', 'June Months connecting charge of  Taijul/sahajala', 76, 76, 0, 0, 0, 200, 0, 0, 6, ''),
(24, '2020-06-21', 'June Months Bill collection of Simran', 41, 0, 6, 0, 0, 1000, 0, 0, 6, ''),
(25, '2020-06-07', 'net malamal', 0, 0, 0, 3, 0, 0, 18980, 0, 6, ''),
(27, '2020-06-21', 'gaffar/sahin', 0, 0, 0, 0, 18, 500, 0, 0, 6, ''),
(29, '2020-06-22', 'kamrul cable ', 0, 0, 0, 0, 20, 1500, 0, 0, 6, ''),
(30, '2020-06-21', 'choyon-7600-anik-7000', 0, 0, 0, 0, 21, 14600, 0, 0, 6, ''),
(31, '2020-06-21', 'anik/choyon net', 0, 0, 0, 4, 0, 0, 12460, 0, 6, ''),
(32, '2020-06-21', 'router sell,', 0, 0, 0, 5, 5, 0, 7250, 0, 6, ''),
(33, '2020-06-21', 'razib', 0, 0, 0, 6, 0, 0, 500, 0, 6, ''),
(34, '2020-06-27', 'net bill-june', 0, 0, 0, 7, 0, 0, 20000, 0, 6, ''),
(35, '2020-06-22', 'June Months Bill collection of Tamim', 36, 0, 8, 0, 0, 600, 0, 0, 6, ''),
(36, '2020-06-22', 'June Months Bill collection of Tamim', 36, 0, 9, 0, 0, 400, 0, 0, 6, ''),
(37, '2020-06-21', 'June Months Bill collection of Taijul/sahajala', 76, 0, 10, 0, 0, 500, 0, 0, 6, ''),
(38, '2020-06-21', 'June Months Bill collection of Halim vai', 19, 0, 11, 0, 0, 500, 0, 0, 6, ''),
(39, '2020-06-21', 'June Months Bill collection of Halim vai', 19, 0, 12, 0, 0, 500, 0, 0, 6, ''),
(40, '2020-06-21', 'June Months Bill collection of Rasel', 14, 0, 13, 0, 0, 500, 0, 0, 6, ''),
(41, '2020-06-21', 'June Months Bill collection of Kaium', 60, 0, 14, 0, 0, 500, 0, 0, 6, ''),
(42, '2020-06-21', 'June Months Bill collection of Nadim', 62, 0, 15, 0, 0, 500, 0, 0, 6, ''),
(44, '2020-06-29', 'rakib-Febr-may-june', 0, 0, 0, 0, 22, 2000, 0, 0, 6, ''),
(45, '2020-06-29', 'June Months Bill collection of Rakib', 26, 0, 17, 0, 0, 500, 0, 0, 6, ''),
(46, '2020-06-30', 'June Months Bill collection of Aowlad', 16, 0, 18, 0, 0, 1000, 0, 0, 6, ''),
(48, '2020-06-30', 'June Months Opeaning amount of  Mobarok', 78, 78, 0, 0, 0, 500, 0, 0, 6, ''),
(49, '2020-06-30', 'June Months connecting charge of  Mobarok', 78, 78, 0, 0, 0, 800, 0, 0, 6, ''),
(50, '2020-06-30', 'June Months Opeaning amount of Anish', 79, 79, 0, 0, 0, 500, 0, 0, 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `add_complain_table`
--

CREATE TABLE `add_complain_table` (
  `id` int(1) NOT NULL,
  `customer_id` longtext NOT NULL,
  `template` longtext NOT NULL,
  `details` longtext NOT NULL,
  `note` longtext NOT NULL,
  `employee` longtext NOT NULL,
  `sms_check` int(11) NOT NULL,
  `complain_date` varchar(100) NOT NULL,
  `complain_time` varchar(100) NOT NULL,
  `customer_address` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `customer_mobile` longtext NOT NULL,
  `solve_date` varchar(100) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `add_customer_sms_table`
--

CREATE TABLE `add_customer_sms_table` (
  `id` int(1) NOT NULL,
  `header_sms` longtext NOT NULL,
  `sms_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_customer_sms_table`
--

INSERT INTO `add_customer_sms_table` (`id`, `header_sms`, `sms_details`) VALUES
(1, 'আসসালামুয়ালাইকুম', 'দয়া করে আপনার বিলগুলো পরিশোধ করুন');

-- --------------------------------------------------------

--
-- Table structure for table `admin_manage`
--

CREATE TABLE `admin_manage` (
  `id` int(11) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email_address` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `present_address` varchar(100) NOT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `select_gender` varchar(23) NOT NULL,
  `national_id_no` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `image` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_manage`
--

INSERT INTO `admin_manage` (`id`, `full_name`, `user_name`, `email_address`, `password`, `mobile_no`, `present_address`, `permanent_address`, `select_gender`, `national_id_no`, `status`, `image`) VALUES
(6, 'md sawkat hossain', 'admin', 'mdsawkathossain1@gmail.co', 'admin', '01854278070', 'rampura,dhaka', 'shibchar,madaripur', 'Male', '3.23232e15', 'Active', '1437724349.18.56.jpg'),
(7, 'hridoy khan', 'busyboy63', 'hridoykhan12@gmail.com', 'admin', '01956985521', 'khilkhet,dhaka', 'Shibchar,madaripur', 'Male', '5.64656e15', 'Inactive', '1437819313.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `agrim_manage_table`
--

CREATE TABLE `agrim_manage_table` (
  `agrim_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `mobile` varchar(22) CHARACTER SET utf8 NOT NULL,
  `address` longtext CHARACTER SET utf8 NOT NULL,
  `datetime` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Pur_ager_sabeg_taka` double NOT NULL,
  `cus_due_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agrim_manage_table`
--

INSERT INTO `agrim_manage_table` (`agrim_id`, `name`, `email`, `mobile`, `address`, `datetime`, `Pur_ager_sabeg_taka`, `cus_due_amount`) VALUES
(1, 'Saiful-agrim', '', '01853951775', 'Dhaka', '', 0, 0),
(3, 'lal-agrim', '', '01971321922', '32 dhaka', 'August 28-2019/12:53:44am: ', 0, 0),
(4, 'a-agrim', '', '01853951775', 'Dhaka', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `basic_manage`
--

CREATE TABLE `basic_manage` (
  `id` int(50) NOT NULL,
  `page_title` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `web_logo` varchar(50) NOT NULL,
  `status` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(45) NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1rb6cj1luhveriv93brmu8e86maab9bp', '::1', '0000-00-00 00:00:00', '__ci_last_regenerate|i:1518414130;invalidUser|s:0:\"\";userid|s:1:\"6\";email|s:5:\"admin\";'),
('93bnfjpnjesj42h4rv14j89m8tj1fdle', '::1', '0000-00-00 00:00:00', '__ci_last_regenerate|i:1518414478;invalidUser|s:0:\"\";userid|s:1:\"6\";email|s:5:\"admin\";mg|s:10:\"Hello wold\";'),
('9ebk0h80cd0g5duejvq3h6vb9dm7865g', '::1', '0000-00-00 00:00:00', '__ci_last_regenerate|i:1518415919;invalidUser|s:0:\"\";userid|s:1:\"6\";email|s:5:\"admin\";mg|s:10:\"Hello wold\";');

-- --------------------------------------------------------

--
-- Table structure for table `complain_template_table`
--

CREATE TABLE `complain_template_table` (
  `id` int(1) NOT NULL,
  `comments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complain_template_table`
--

INSERT INTO `complain_template_table` (`id`, `comments`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(4, 'd'),
(5, 'e'),
(6, 'uhuhyu'),
(7, 'kjmij'),
(8, 'knyghb bsd ');

-- --------------------------------------------------------

--
-- Table structure for table `connecting_charge_report_table`
--

CREATE TABLE `connecting_charge_report_table` (
  `connecting_report_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` double NOT NULL,
  `cdate_time` varchar(1000) NOT NULL,
  `monthly_name` int(11) NOT NULL,
  `yearly_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connecting_charge_report_table`
--

INSERT INTO `connecting_charge_report_table` (`connecting_report_id`, `customer_id`, `payment_date`, `amount`, `cdate_time`, `monthly_name`, `yearly_name`) VALUES
(1, 41, '2020-06-16', 1800, '25/06/2020 11:56:34 am', 6, 2020),
(2, 74, '2020-06-25', 0, '25/06/2020 01:28:45 pm', 6, 2020),
(3, 66, '2020-06-16', 1000, '07/06/2020 09:03:06 am', 6, 2020),
(4, 75, '2020-06-27', 0, '27/06/2020 07:35:19 pm', 6, 2020),
(5, 76, '2020-06-21', 200, '21/06/2020 08:57:57 am', 6, 2020),
(6, 77, '2020-06-30', 800, '30/06/2020 09:15:44 pm', 6, 2020),
(7, 78, '2020-06-30', 800, '30/06/2020 09:18:18 pm', 6, 2020),
(8, 79, '2020-06-30', 500, '30/06/2020 09:23:23 pm', 6, 2020),
(9, 80, '2020-06-30', 0, '30/06/2020 09:29:30 pm', 6, 2020),
(10, 81, '2020-06-30', 0, '30/06/2020 09:31:02 pm', 6, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `custo_id` int(11) NOT NULL,
  `customer_id_create` longtext NOT NULL,
  `name` varchar(100) NOT NULL,
  `previus_months_due` double NOT NULL,
  `running_bill` double NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `regularmobile` varchar(22) NOT NULL,
  `email` longtext NOT NULL,
  `national_id` longtext NOT NULL,
  `details` longtext NOT NULL,
  `zone` int(11) NOT NULL,
  `opening_amount` double DEFAULT 0,
  `running_month_due_amount` double DEFAULT 0,
  `connect_charge` double DEFAULT 0,
  `connection_charge_due_amount` double DEFAULT 0,
  `con_date` date NOT NULL,
  `package` int(11) NOT NULL,
  `Clint_IP` longtext NOT NULL,
  `taka` double NOT NULL,
  `bill_date` double NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` longtext NOT NULL,
  `logo_image` longtext NOT NULL,
  `previus_due_note` longtext CHARACTER SET utf8 NOT NULL,
  `village` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`custo_id`, `customer_id_create`, `name`, `previus_months_due`, `running_bill`, `mobile`, `regularmobile`, `email`, `national_id`, `details`, `zone`, `opening_amount`, `running_month_due_amount`, `connect_charge`, `connection_charge_due_amount`, `con_date`, `package`, `Clint_IP`, `taka`, `bill_date`, `status`, `remarks`, `logo_image`, `previus_due_note`, `village`) VALUES
(1, '1001', 'md ador', 1000, 600, '01305931399', '', '', '', 'Mohammadpure', 1, 0, NULL, 0, NULL, '2020-06-23', 1, 'lc.ador', 600, 5, 1, '', '', 'april-may-2020', 'Mohammadpur'),
(2, '1002', 'Sahadat', 1000, 600, '01880975437', '', '', '', 'Mohammadpure', 1, 0, NULL, 0, NULL, '2020-06-23', 1, 'lc.sahadat', 600, 5, 1, '', '', 'april-may-2020', 'Mohammadpur'),
(3, '1003', 'Hridoy', 0, 600, '01956000478', '', '', '', 'Mohammadpure', 1, 0, NULL, 0, NULL, '2020-06-23', 1, 'lc.siyab', 600, 5, 1, '', '', '', 'Mohammadpur'),
(4, '1004', 'razibrana', 0, 600, '01913193557', '', '', '', 'Mohammadpure', 21, 0, NULL, 0, NULL, '2020-06-23', 1, 'lc.rana', 600, 5, 1, '', '', '', 'Mohammadpur'),
(5, '1005', 'Kamrul', 0, 600, '01991446223', '', '', '', 'Bazar, Mohammadpure', 22, 0, NULL, 0, NULL, '2020-06-23', 1, 'lc.dihamoni', 600, 5, 1, '', '', '', 'Mohammadpur'),
(6, '1006', 'Siyam', 0, 600, '01706319558', '', '', '', 'Bazar, Mohammadpure', 22, 0, NULL, 0, NULL, '2020-06-23', 1, 'lc.siyam', 600, 5, 1, '', '', '', 'Mohammadpur'),
(7, '1007', 'Tisha', 600, 600, '01884014278', '', '', '', 'Bazar, Mohammadpure', 22, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.tisha', 600, 5, 1, '', '', 'may-2020', 'Mohammadpur'),
(8, '1008', 'Kalam', 0, 600, '01878801167', '', '', '', 'Bazar, Mohammadpure', 22, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.kalam', 600, 5, 1, '', '', '', 'Mohammadpur'),
(9, '1009', 'Sekandar', 1800, 600, '01642302578', '', '', '', 'Bazar, Mohammadpure', 22, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.sikandar', 600, 5, 1, '', '', 'march-may-2020', 'Mohammadpur'),
(10, '1010', 'Liton', 1200, 600, '01820507015', '', '', '', 'Stand, Mohammadpure', 2, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.liton', 600, 5, 1, '', '', 'april-may-2020', 'Mohammadpur'),
(11, '1011', 'Kawsar vai', 1200, 600, '01718881703', '', '', '', 'Stand, Mohammadpure', 2, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.kawsar', 600, 5, 1, '', '', 'april-may-2020', 'Mohammadpur'),
(12, '1012', 'D-Bank', 0, 600, '', '', '', '', 'Stand, Mohammadpure', 2, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.rjkalam', 600, 5, 1, '', '', '', 'Mohammadpur'),
(13, '1013', 'Delowar', 0, 600, '01858617424', '', '', '', 'Stand, Mohammadpure', 2, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.hannan', 600, 5, 1, '', '', '', 'Mohammadpur'),
(14, '1014', 'Rasel', 1300, 600, '01935641775', '', '', '', 'Noya Mohammadpure', 19, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.rasel', 600, 5, 1, '', '', 'march-may-2020', 'Noya Mohammadpure'),
(15, '1015', 'Azizul', 600, 600, '01995531504', '', '', '', 'Noya Mohammadpure', 19, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.azizul', 600, 5, 1, '', '', 'may-2020', 'Noya Mohammadpure'),
(16, '1016', 'Aowlad', 200, 600, '01818014729', '', '', '', 'Noya Mohammadpure', 19, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.aowlad', 600, 5, 1, '', '', 'april-may-2020', 'Noya Mohammadpure'),
(17, '1017', 'Sahin/gaffar', 1200, 600, '01939010766', '', '', '', 'Noya Mohammadpure', 19, 0, NULL, 0, 200, '2020-06-01', 1, 'lc.gaffar', 600, 5, 1, '', '', 'april-may-2020', 'Noya Mohammadpure'),
(18, '1018', 'Monirul vai', 0, 600, '01911202846', '', '', '', 'Noya Mohammadpure', 20, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.monirul', 600, 5, 1, '', '', '', 'Noya Mohammadpure'),
(19, '1019', 'Halim vai', 100, 0, '01986422328', '', '', '', 'Noya Mohammadpure', 20, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.halim', 500, 5, 1, '', '', 'may-2020', 'Noya Mohammadpure'),
(20, '1020', 'Nurul', 800, 600, '00', '', '', '', 'Noya Mohammadpure', 20, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.nurul', 600, 5, 1, '', '', 'may-2020', 'Noya Mohammadpure'),
(21, '1021', 'Rakib', 0, 600, '01871095298', '', '', '', 'Noya Mohammadpure', 20, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.mamun', 600, 5, 1, '', '', '', 'Noya Mohammadpure'),
(22, '1022', 'Tarek vai', 0, 600, '00', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.tarek', 600, 5, 1, '', '', '', 'Noya kandargao'),
(23, '1023', 'Afjal vai/sopon', 0, 600, '01877174000', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.afjol', 600, 5, 1, '', '', '', 'Noya kandargao'),
(24, '1024', 'Ripon vai', 0, 600, '01866638289', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.ripon', 600, 5, 1, '', '', '', 'Noya kandargao'),
(25, '1025', 'Milon vai', 0, 600, '01822244430', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.milon', 600, 5, 1, '', '', '', 'Noya kandargao'),
(26, '1026', 'Rakib', 0, 0, '01877642115', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.rakib', 500, 5, 1, '', '', '', 'Noya kandargao'),
(27, '1027', 'Dr.tarek', 0, 600, '01730186675', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.dactar', 600, 5, 1, '', '', '', 'Noya kandargao'),
(28, '1028', 'Saiful', 0, 600, '', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.saiful', 600, 5, 1, '', '', '', 'Noya kandargao'),
(29, '1029', 'Arif', 600, 600, '01922676763', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.arif', 600, 5, 1, '', '', 'may-2020', 'Noya kandargao'),
(30, '1030', 'Mucha', 0, 600, '01879886264', '', '', '', 'stand, kandargao ', 3, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.musa', 600, 5, 1, '', '', '', 'Noya kandargao'),
(31, '1031', 'Masud vai', 0, 600, '', '', '', '', 'Bazar, Luterchar', 8, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.masud', 600, 5, 1, '', '', '', 'Luterchar'),
(32, '1032', 'Uonion office', 700, 1000, '', '', '', '', 'Bazar, Luterchar', 8, 0, NULL, 0, NULL, '2020-06-01', 2, 'lc.lutercharup', 1000, 5, 1, '', '', 'may-2020', 'Luterchar'),
(33, '1033', 'Shamol vai', 0, 600, '01922616710', '', '', '', 'Bazar, Luterchar', 21, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.shamol', 600, 5, 1, '', '', '', 'Luterchar'),
(34, '1034', 'Uzzol vai', 0, 600, '', '', '', '', 'Bazar, Luterchar', 8, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.tawfin', 600, 5, 1, '', '', '', 'Luterchar'),
(35, '1035', 'Mohsin/sekh monir', 0, 600, '', '', '', '', 'orola khamba, Luterchar', 21, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.mohsin', 600, 5, 1, '', '', '', 'Luterchar'),
(36, '1036', 'Tamim', 200, 0, '01758985320', '', '', '', 'orola khamba, Luterchar', 9, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.tamim', 600, 5, 1, '', '', 'may-2020', 'Luterchar'),
(37, '1037', 'Nahid', 0, 600, '01837116987', '', '', '', 'orola khamba, Luterchar', 9, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.nahid', 600, 5, 1, '', '', '', 'Luterchar'),
(38, '1038', 'Mahin', 0, 600, '01852060592', '', '', '', 'orola khamba, Luterchar', 9, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.mahin', 600, 5, 1, '', '', '', 'Luterchar'),
(39, '1039', 'Sumon', 0, 600, '01784590231', '', '', '', 'orola khamba, Luterchar', 9, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.elma', 600, 5, 1, '', '', '', 'Luterchar'),
(40, '1040', 'Rayhan', 600, 600, '01782684712', '', '', '', 'orola khamba, Luterchar', 9, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.rayhan', 600, 5, 1, '', '', 'may-2020', 'Luterchar'),
(41, '1041', 'Simran', 0, 0, '', '', '', '', 'high school, Luterchar', 16, 0, 0, NULL, 0, '2020-06-01', 2, 'lc.simran', 1000, 5, 1, '', '', '', 'Dhori luterchar'),
(42, '1042', 'High school', 2000, 1000, '', '', '', '', 'high school, Luterchar', 16, 0, NULL, 0, NULL, '2020-06-01', 2, 'lc.highschool', 1000, 5, 1, '', '', 'april-may-2020', 'Dhori luterchar'),
(43, '1043', 'Mahabub sikdar', 0, 600, '', '', '', '', 'chayarman bari, Luterchar', 21, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.delowr', 600, 5, 1, '', '', '', 'Dhori luterchar'),
(44, '1044', 'Hridoy', 600, 600, '01875394730', '', '', '', 'chayarman bari, Luterchar', 17, 0, NULL, 0, 750, '2020-06-01', 1, 'lc.ridoy1', 600, 5, 1, '', '', 'may-2020', 'Dhori luterchar'),
(45, '1045', 'Chayon', 0, 600, '01677047764', '', '', '', 'chayarman bari, Luterchar', 17, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.chyon', 600, 5, 1, '', '', '', 'Dhori luterchar'),
(46, '1046', 'Chayarman', 0, 600, '', '', '', '', 'chayarman bari, Luterchar', 17, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.chayarman', 600, 5, 1, '', '', '', 'Luterchar'),
(47, '1047', 'Habib sikdar', 0, 600, '', '', '', '', 'chayarman bari, Luterchar', 17, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.', 600, 5, 1, '', '', '', 'Luterchar'),
(48, '1048', 'Helal sikdar', 0, 600, '', '', '', '', 'chayarman bari, Luterchar', 17, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.sikdar', 600, 5, 1, '', '', '', 'Luterchar'),
(49, '1049', 'Monir', 0, 600, '01811289352', '', '', '', 'emran bari, kandargao', 5, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.monir', 600, 5, 1, '', '', '', 'Kandargao'),
(50, '1050', 'Jubayer', 0, 600, '0193266354', '', '', '', 'emran bari, kandargao', 5, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.jubayer', 600, 5, 1, '', '', '', 'Kandargao'),
(51, '1051', 'Masum hujur', 0, 600, '', '', '', '', 'emran bari, kandargao', 5, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.masum', 600, 5, 1, '', '', '', 'Kandargao'),
(52, '1052', 'Rony/mazarul', 0, 600, '01874505031', '', '', '', 'arif bari, kandargao', 6, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.muzzamel', 600, 5, 1, '', '', '', 'Kandargao'),
(53, '1053', 'Khokon vai', 0, 600, '01956870314', '', '', '', 'arif bari, kandargao', 6, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.khokon', 600, 5, 1, '', '', '', 'Kandargao'),
(54, '1054', 'Moyna apa', 0, 600, '', '', '', '', 'mosjid samne, kandargao', 7, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.moyna', 600, 5, 1, '', '', '', 'Kandargao'),
(55, '1055', 'Kamrul hujur', 2400, 600, '01643352930', '', '', '', 'mosjid samne, kandargao', 7, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.kamrul', 600, 5, 1, '', '', 'Feb-may-2020', 'Kandargao'),
(56, '1056', 'Sabbir', 0, 600, '', '', '', '', 'mosjid samne, kandargao', 7, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.sakil', 600, 5, 1, '', '', '', 'Kandargao'),
(57, '1057', 'Simul', 0, 600, '01955920883', '', '', '', 'mosjid samne, kandargao', 7, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.simul', 600, 5, 1, '', '', '', 'Kandargao'),
(58, '1058', 'Raziya', 0, 600, '', '', '', '', 'mosjid samne, kandargao', 7, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.hannan', 600, 5, 1, '', '', '', 'Kandargao'),
(59, '1059', 'Jony/mithu', 500, 1000, '', '', '', '', 'mosjid samne, kandargao', 7, 0, NULL, 0, NULL, '2020-06-01', 2, 'lc.joni', 1000, 5, 1, '', '', 'june', 'Kandargao'),
(60, '1060', 'Kaium', 0, 0, '', '', '', '', 'mosjid samne, kandargao', 7, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.kaium', 500, 5, 1, '', '', '', 'Kandargao'),
(61, '1061', 'Rubel vai', 0, 600, '01845141450', '', '', '', 'Rubel bari, Luterchar', 10, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.rubel', 600, 5, 1, '', '', '', 'Luterchar'),
(62, '1062', 'Nadim', 0, 0, '01822645561', '', '', '', 'Rubel bari, Luterchar', 10, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.nadim', 500, 5, 1, '', '', '', 'Luterchar'),
(63, '1063', 'Nijamuddin', 0, 600, '01874362992', '', '', '', 'Rubel bari, Luterchar', 10, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.nijamuddin', 600, 5, 1, '', '', '', 'Luterchar'),
(64, '1064', 'Masud', 0, 600, '01843758897', '', '', '', 'Rubel bari, Luterchar', 10, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.masud1', 600, 5, 1, '', '', '', 'Luterchar'),
(65, '1065', 'Nazrul driver', 1200, 600, '01819099126', '', '', '', 'jakariya bari, Luterchar', 11, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.nazrul', 600, 5, 1, '', '', 'april-may-2020', 'Luterchar'),
(66, '1066', 'Jinnat vai', 0, 600, '01956753926', '', '', '', 'jakariya bari, Luterchar', 11, 0, 0, 0, 0, '2020-06-01', 1, 'lc.jinnat', 600, 5, 1, '', '', '', 'Luterchar'),
(67, '1067', 'Muzammel membar', 0, 600, '', '', '', '', 'jakariya bari, Luterchar', 11, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.rimon', 600, 5, 1, '', '', '', 'Luterchar'),
(68, '1068', 'Gaffar mama', 0, 600, '01740893957', '', '', '', 'Gaffar bari, Luterchar', 14, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.mahi', 600, 5, 1, '', '', '', 'Luterchar'),
(69, '1069', 'Eyasin', 0, 600, '01788450840', '', '', '', 'Gaffar bari, Luterchar', 14, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.eyasin', 600, 5, 1, '', '', '', 'Luterchar'),
(70, '1070', 'Sahalom bai', 0, 600, '01870234072', '', '', '', 'sahalom bari, Luterchar', 21, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.sahalom', 600, 5, 1, '', '', '', 'Luterchar'),
(71, '1071', 'Aklima', 0, 600, '01879701432', '', '', '', 'sahalom bari, Luterchar', 15, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.akib', 600, 5, 1, '', '', '', 'Luterchar'),
(72, '1072', 'Foysal', 0, 600, '01826183406', '', '', '', 'sahalom bari, Luterchar', 15, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.foysal', 600, 5, 1, '', '', '', 'Luterchar'),
(73, '1073', 'Office', 0, 600, '01913193557', '', '', '', 'Office', 22, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.office', 600, 5, 1, '', '', '', 'Mohammadpur'),
(75, '1074', 'Saown', 0, 600, '01683956850', '', '', '', 'kandargao', 21, 0, NULL, 0, NULL, '2020-06-01', 1, 'lc.gaffar2', 600, 5, 1, '', '', '', 'Kandargao'),
(76, '1075', 'Taijul/sahajala', 0, 0, '', '', '', '', 'Noya Mohammadpure', 20, 0, NULL, 200, NULL, '2020-06-21', 1, 'lc.office', 500, 5, 1, '', '', '', 'Noya Mohammadpure'),
(78, '1076', 'Mobarok', 0, 500, '01726522570', '', '', '', 'rubel bari luterchar', 10, 500, NULL, 800, NULL, '2020-06-30', 1, 'lc.roton', 500, 10, 1, '', '', '', 'Luterchar'),
(79, '1077', 'Anish', 0, 500, '', '', '', '', 'Noya mohammadpure', 20, 0, NULL, 500, NULL, '2020-06-30', 1, 'lc.anish', 500, 10, 1, '', '', '', 'Noya Mohammadpure'),
(80, '1078', 'Choyon', 0, 1000, '01677047764', '', '', '', 'cheyarman bari luterchar', 16, 0, NULL, 0, NULL, '2020-06-30', 2, 'lc.choyon2', 1000, 10, 1, '', '', '', 'Luterchar'),
(81, '1079', 'Anik sikdar', 0, 1000, '01676151810', '', '', '', 'cheyarman bari luterchar', 17, 0, 2000, 0, 600, '2020-06-30', 2, 'lc.anik', 1000, 10, 1, '', '', '', 'Luterchar');

-- --------------------------------------------------------

--
-- Table structure for table `due_customer_sms_table`
--

CREATE TABLE `due_customer_sms_table` (
  `id` int(1) NOT NULL,
  `header_sms` longtext NOT NULL,
  `sms_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `auto_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(22) NOT NULL,
  `regularmobile` varchar(22) NOT NULL,
  `email` longtext NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `national_id` longtext NOT NULL,
  `con_date` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `remarks` longtext NOT NULL,
  `logo_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`auto_id`, `employee_id`, `name`, `mobile`, `regularmobile`, `email`, `blood_group`, `national_id`, `con_date`, `designation`, `details`, `remarks`, `logo_image`) VALUES
(5, 1001, 'Razib Hossain Rana', '01913193557', '01617720190', 'rhrana11@gmail.com', '', '3423432', '01-12-2013', 'MD/CEO', 'Mohammodpur', '', '1589776928.jpg'),
(6, 1002, 'Gaffar', '01922328071', 'dgfhdfg', 'sss@gmail.com', '', '3423432', '12-05-2020', 'yhjyh', 'ghgfh', '', ''),
(7, 1003, 'Sekh Monir', '01922328071', '01917720130', 'rhrana12@gmail.com', '', '3423432', '20-05-2020', 'rrt', 'yjhyhu', '', ''),
(8, 1004, 'Samol ', '01922328071', '01917720130', 'rhrana12@gmail.com', '', '3423432', '27-05-2020', 'tyhy', 'retre', '', ''),
(9, 1005, 'afjal', '01922328071', '01917720130', 'demo@easyispbilling.com', '', '3423432', '02-06-2020', 'tyhy', 'retgret', '', ''),
(10, 1006, 'Moktar', '01922328071', '01917720130', 'demo@easyispbilling.com', '', '3423432', '19-05-2020', 'suparvaiser', 'grtyrtey', '', '1589777177.jpg'),
(11, 1007, 'Sawon', '01913193557', '01917720130', 'rhrana12@gmail.com', '', '3423432', '19-05-2020', 'junior Technical Support Execu', '', '', '1590475027.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `expense_table`
--

CREATE TABLE `expense_table` (
  `id` int(1) NOT NULL,
  `header_name` int(11) NOT NULL,
  `amount` double NOT NULL,
  `details` longtext NOT NULL,
  `cdate` date NOT NULL,
  `last_update` date NOT NULL,
  `month_name` int(11) NOT NULL,
  `year_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense_table`
--

INSERT INTO `expense_table` (`id`, `header_name`, `amount`, `details`, `cdate`, `last_update`, `month_name`, `year_name`) VALUES
(3, 22, 18980, 'net malamal', '2020-06-07', '2020-06-07', 6, 2020),
(4, 22, 12460, 'anik/choyon net', '2020-06-21', '2020-06-21', 6, 2020),
(5, 22, 7250, 'router sell,', '2020-06-21', '2020-06-21', 6, 2020),
(6, 15, 500, 'razib', '2020-06-21', '2020-06-21', 6, 2020),
(7, 7, 20000, 'net bill-june', '2020-06-27', '2020-06-27', 6, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `inactive_customer_sms_table`
--

CREATE TABLE `inactive_customer_sms_table` (
  `id` int(1) NOT NULL,
  `sms_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inactive_customer_sms_table`
--

INSERT INTO `inactive_customer_sms_table` (`id`, `sms_details`) VALUES
(1, 'hlw world');

-- --------------------------------------------------------

--
-- Table structure for table `index_email`
--

CREATE TABLE `index_email` (
  `id` int(11) NOT NULL,
  `email` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_add_table`
--

CREATE TABLE `item_add_table` (
  `id` int(1) NOT NULL,
  `name` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `store` double NOT NULL,
  `cdate` date NOT NULL,
  `note` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_add_table`
--

INSERT INTO `item_add_table` (`id`, `name`, `type`, `price`, `store`, `cdate`, `note`) VALUES
(1, 7, 'Cable', 3225, 2, '2020-06-25', 'mixer cable 600 miter'),
(2, 2, 'Instruments', 690, 7, '2020-06-25', 'Tp link'),
(3, 1, 'Instruments', 1150, 5, '2020-06-25', 'D-link'),
(4, 9, 'Instruments', 2, 100, '2020-06-25', '1 packet'),
(5, 10, 'Instruments', 30, 15, '2020-06-25', 'Power cable'),
(6, 4, 'Instruments', 60, 5, '2020-06-25', 'Tp link'),
(7, 6, 'Instruments', 1000, 1, '2020-06-25', 'router 1 antina'),
(8, 3, 'Instruments', 80, 3, '2020-06-27', 'Old'),
(10, 12, 'Instruments', 60, 6, '2020-06-27', 'Old'),
(11, 6, 'Instruments', 1600, 1, '2020-06-30', 'router 3 antina'),
(12, 6, 'Instruments', 1420, 4, '2020-06-30', 'router 2 antina');

-- --------------------------------------------------------

--
-- Table structure for table `item_manage_table`
--

CREATE TABLE `item_manage_table` (
  `id` int(1) NOT NULL,
  `name` longtext NOT NULL,
  `Brand` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `in_qty` double NOT NULL,
  `out_qty` double NOT NULL,
  `price` double NOT NULL,
  `store` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_manage_table`
--

INSERT INTO `item_manage_table` (`id`, `name`, `Brand`, `type`, `in_qty`, `out_qty`, `price`, `store`) VALUES
(1, 'MC', 'D-link', 'Instruments', 5, 0, 1150, 5),
(2, 'Swich-8port', 'Tp-link', 'Instruments', 7, 0, 690, 7),
(3, 'Pachcore', 'DBC', 'Instruments', 6, 0, 80, 6),
(4, 'TG box', 'D-link', 'Instruments', 5, 0, 60, 5),
(5, 'Microtik', 'Ripon', 'Instruments', 0, 0, 0, 0),
(6, 'Router', 'Tp-link', 'Instruments', 6, 0, 1420, 6),
(7, 'Cat 6', 'ADP', 'Cable', 2, 0, 3225, 2),
(8, 'Cat 5', 'ADP', 'Cable', 0, 0, 0, 0),
(9, 'Connector', 'D-link', 'Instruments', 100, 0, 2, 100),
(10, 'Ac cot', 'D-link', 'Instruments', 15, 0, 30, 15),
(11, 'Router', 'Toto', 'Instruments', 0, 0, 0, 0),
(12, 'Ataptar-mc', 'D-link', 'Instruments', 6, 0, 60, 6);

-- --------------------------------------------------------

--
-- Table structure for table `item_out_table`
--

CREATE TABLE `item_out_table` (
  `id` int(1) NOT NULL,
  `name` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `store` double NOT NULL,
  `cdate` date NOT NULL,
  `note` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report_table`
--

CREATE TABLE `monthly_report_table` (
  `monthly_id` int(11) NOT NULL,
  `month_name` int(11) NOT NULL,
  `yearly_name` int(11) NOT NULL,
  `month_running_date` date NOT NULL,
  `dat_total_bill_collection` double NOT NULL,
  `day_total_connection_charge` double NOT NULL,
  `day_total_others_income` double NOT NULL,
  `total_opaning_amount` double NOT NULL,
  `total_opaning_balance` double NOT NULL,
  `day_total_expence` double NOT NULL,
  `day_total_discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_report_table`
--

INSERT INTO `monthly_report_table` (`monthly_id`, `month_name`, `yearly_name`, `month_running_date`, `dat_total_bill_collection`, `day_total_connection_charge`, `day_total_others_income`, `total_opaning_amount`, `total_opaning_balance`, `day_total_expence`, `day_total_discount`) VALUES
(1, 6, 2020, '2020-06-16', 1000, 2800, 0, 0, 1000, 0, 0),
(2, 5, 2020, '2020-05-31', 0, 0, 1000, 0, 0, 0, 0),
(3, 6, 2020, '2020-06-01', 0, 0, 4400, 0, 0, 0, 0),
(4, 6, 2020, '2020-06-07', 0, 0, 4200, 0, 0, 18980, 0),
(5, 6, 2020, '2020-06-09', 0, 0, 1700, 0, 0, 0, 0),
(6, 6, 2020, '2020-06-11', 0, 0, 900, 0, 0, 0, 0),
(7, 6, 2020, '2020-06-12', 0, 0, 2800, 0, 0, 0, 0),
(8, 6, 2020, '2020-06-15', 0, 0, 1800, 0, 0, 0, 0),
(9, 6, 2020, '2020-06-17', 0, 0, 3400, 0, 0, 0, 0),
(10, 6, 2020, '2020-06-18', 0, 0, 1100, 0, 0, 0, 0),
(11, 6, 2020, '2020-06-20', 0, 0, 1500, 0, 0, 0, 0),
(12, 6, 2020, '2020-06-14', 0, 0, 600, 0, 0, 0, 0),
(13, 6, 2020, '2020-06-21', 3000, 200, 15100, 0, 0, 20210, 0),
(14, 6, 2020, '2020-06-22', 1000, 0, 1500, 0, 0, 0, 0),
(15, 6, 2020, '2020-06-27', 0, 0, 0, 0, 0, 20000, 0),
(16, 6, 2020, '2020-06-29', 500, 0, 2000, 0, 0, 0, 0),
(17, 6, 2020, '2020-06-30', 1000, 800, 0, 1000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `occational_customer_sms_table`
--

CREATE TABLE `occational_customer_sms_table` (
  `id` int(1) NOT NULL,
  `sms_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occational_customer_sms_table`
--

INSERT INTO `occational_customer_sms_table` (`id`, `sms_details`) VALUES
(1, 'Eid Mubarok fdsadsa scdswadwaq asdcsawdsad');

-- --------------------------------------------------------

--
-- Table structure for table `other_income_table`
--

CREATE TABLE `other_income_table` (
  `id` int(1) NOT NULL,
  `header_name` int(11) NOT NULL,
  `amount` double NOT NULL,
  `details` longtext NOT NULL,
  `cdate` date NOT NULL,
  `last_update` date NOT NULL,
  `monthly_name` int(11) NOT NULL,
  `yearly_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other_income_table`
--

INSERT INTO `other_income_table` (`id`, `header_name`, `amount`, `details`, `cdate`, `last_update`, `monthly_name`, `yearly_name`) VALUES
(2, 23, 1000, 'deloyar', '2020-05-31', '2020-06-01', 5, 2020),
(3, 24, 4400, 'total bill', '2020-06-01', '2020-06-01', 6, 2020),
(5, 24, 3600, 'total bill-net', '2020-06-07', '2020-06-07', 6, 2020),
(6, 23, 600, 'tisha-cable bill', '2020-06-07', '2020-06-07', 6, 2020),
(7, 24, 1100, 'total bill', '2020-06-09', '2020-06-09', 6, 2020),
(8, 23, 600, 'sabbir-cable bill net', '2020-06-09', '2020-06-09', 6, 2020),
(9, 24, 900, 'total bill', '2020-06-11', '2020-06-11', 6, 2020),
(10, 24, 2400, 'total bill', '2020-06-12', '2020-06-12', 6, 2020),
(11, 23, 400, 'net/afol sopon', '2020-06-12', '2020-06-09', 6, 2020),
(12, 24, 600, 'total bill', '2020-06-14', '2020-06-12', 6, 2020),
(13, 24, 1800, 'total bill', '2020-06-15', '2020-06-15', 6, 2020),
(14, 24, 3400, 'total bill', '2020-06-17', '2020-06-17', 6, 2020),
(15, 24, 1100, 'total bill', '2020-06-18', '2020-06-18', 6, 2020),
(17, 24, 1500, 'total bill-d bank/kalam', '2020-06-20', '2020-06-20', 6, 2020),
(18, 23, 500, 'gaffar/sahin', '2020-06-21', '2020-06-21', 6, 2020),
(20, 23, 1500, 'kamrul cable ', '2020-06-22', '2020-06-22', 6, 2020),
(21, 23, 14600, 'choyon-7600-anik-7000', '2020-06-21', '2020-06-21', 6, 2020),
(22, 24, 2000, 'rakib-Febr-may-june', '2020-06-29', '2020-06-29', 6, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `package_table`
--

CREATE TABLE `package_table` (
  `id` int(1) NOT NULL,
  `name` longtext NOT NULL,
  `Speed` varchar(250) NOT NULL,
  `direct_value` double NOT NULL,
  `amount` double NOT NULL,
  `kb_count` double DEFAULT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_table`
--

INSERT INTO `package_table` (`id`, `name`, `Speed`, `direct_value`, `amount`, `kb_count`, `status`) VALUES
(1, 'Mini(600)', '512KBps', 512, 600, 512, 'KBps'),
(2, 'P1(1000)', '1MBps', 1, 1000, 1024, 'MBps'),
(3, 'P2(1200)', '1.5MBps', 1.5, 1200, 1536, 'MBps'),
(4, 'P3(1400)', '2MBps', 2, 1400, 2048, 'MBps'),
(5, 'P4(1600)', '2.5MBps', 2.5, 1600, 2560, 'MBps'),
(6, 'MICRO (1800)', '3MBps', 3, 1800, 3072, 'MBps'),
(7, 'P6(2000)', '4MBps', 4, 2000, 4096, 'MBps'),
(8, 'P7(2200)', '5MBps', 5, 2200, 5120, 'MBps');

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `due_bill_amount` double NOT NULL,
  `month_name` varchar(100) NOT NULL,
  `payment_date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `discount` double NOT NULL,
  `amount` double NOT NULL,
  `details` longtext NOT NULL,
  `cdate_time` varchar(1000) NOT NULL,
  `monthly_name` int(11) NOT NULL,
  `yearly_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`payment_id`, `customer_id`, `due_bill_amount`, `month_name`, `payment_date`, `type`, `discount`, `amount`, `details`, `cdate_time`, `monthly_name`, `yearly_name`) VALUES
(1, 41, 0, 'June', '2020-06-25', 'Opaning_amount', 0, 0, 'Running Month Amount', '25/06/2020 11:56:34 am', 6, 2020),
(2, 41, 0, 'June', '2020-06-25', 'Connect_charge', 0, 1800, 'Connect charge', '25/06/2020 11:56:34 am', 0, 0),
(3, 66, 0, 'June', '2020-06-07', 'Opaning_amount', 0, 0, 'Running Month Amount', '07/06/2020 09:03:06 am', 6, 2020),
(4, 66, 0, 'June', '2020-06-07', 'Connect_charge', 0, 1000, 'Connect charge', '07/06/2020 09:03:06 am', 0, 0),
(5, 76, 0, 'June', '2020-06-21', 'Connect_charge', 0, 200, 'Connect charge', '21/06/2020 08:57:58 am', 0, 0),
(6, 41, 0, 'June', '2020-06-21', 'Monthly', 0, 1000, 'Dish Bill Monthly', '21/06/2020 10:13:43 pm', 6, 2020),
(8, 36, 600, 'June', '2020-06-22', 'Monthly', 0, 600, 'Dish Bill Monthly', '22/06/2020 09:28:01 am', 6, 2020),
(9, 36, 200, 'June', '2020-06-22', 'Pre_due', 0, 400, 'Dish Bill Monthly', '22/06/2020 09:28:25 am', 6, 2020),
(10, 76, 0, 'June', '2020-06-21', 'Monthly', 0, 500, 'Dish Bill Monthly', '21/06/2020 11:58:00 am', 6, 2020),
(11, 19, 600, 'June', '2020-06-21', 'Monthly', 0, 500, 'Dish Bill Monthly', '21/06/2020 11:58:48 am', 6, 2020),
(12, 19, 100, 'May', '2020-06-21', 'Pre_due', 0, 500, 'Dish Bill Monthly', '21/06/2020 11:59:15 am', 6, 2020),
(13, 14, 1300, 'June', '2020-06-21', 'Pre_due', 0, 500, 'Dish Bill Monthly', '21/06/2020 12:00:26 pm', 6, 2020),
(14, 60, 0, 'June', '2020-06-21', 'Monthly', 0, 500, 'Dish Bill Monthly', '21/06/2020 12:01:23 pm', 6, 2020),
(15, 62, 0, 'June', '2020-06-21', 'Monthly', 0, 500, 'Dish Bill Monthly', '21/06/2020 12:01:53 pm', 6, 2020),
(17, 26, 0, 'June', '2020-06-29', 'Monthly', 0, 500, 'Dish Bill Monthly', '29/06/2020 04:01:03 pm', 6, 2020),
(18, 16, 200, 'June', '2020-06-30', 'Pre_due', 0, 1000, 'Dish Bill Monthly', '30/06/2020 09:13:28 pm', 6, 2020),
(20, 78, 0, 'June', '2020-06-30', 'Opaning_amount', 0, 500, 'Running Month Amount', '30/06/2020 09:18:18 pm', 0, 0),
(21, 78, 0, 'June', '2020-06-30', 'Connect_charge', 0, 800, 'Connect charge', '30/06/2020 09:18:18 pm', 0, 0),
(22, 79, 0, 'June', '2020-06-30', 'Opaning_amount', 0, 500, 'Connect charge', '30/06/2020 09:23:23 pm', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pre_customer_report_table`
--

CREATE TABLE `pre_customer_report_table` (
  `pre_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` double NOT NULL,
  `details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pre_customer_report_table`
--

INSERT INTO `pre_customer_report_table` (`pre_id`, `customer_id`, `payment_date`, `amount`, `details`) VALUES
(1, 1, '2020-06-23', 1000, 'april-may-2020'),
(2, 2, '2020-06-23', 1000, 'april-may-2020'),
(3, 3, '2020-06-23', 0, ''),
(4, 4, '2020-06-23', 0, ''),
(5, 5, '2020-06-23', 0, ''),
(6, 6, '2020-06-23', 0, ''),
(7, 7, '2020-06-23', 600, 'may-2020'),
(8, 8, '2020-06-23', 0, ''),
(9, 9, '2020-06-23', 1800, 'march-may-2020'),
(10, 10, '2020-06-23', 1200, 'april-may-2020'),
(11, 11, '2020-06-23', 1200, 'april-may-2020'),
(12, 12, '2020-06-23', 0, ''),
(13, 13, '2020-06-23', 0, ''),
(14, 14, '2020-06-23', 1800, 'march-may-2020'),
(15, 15, '2020-06-23', 600, 'may-2020'),
(16, 16, '2020-06-23', 1200, 'april-may-2020'),
(17, 17, '2020-06-23', 1200, 'april-may-2020'),
(18, 18, '2020-06-23', 0, ''),
(19, 19, '2020-06-23', 600, 'may-2020'),
(20, 20, '2020-06-23', 800, 'may-2020'),
(21, 21, '2020-06-23', 0, ''),
(22, 22, '2020-06-24', 0, ''),
(23, 23, '2020-06-24', 0, ''),
(24, 23, '2020-06-24', 0, ''),
(25, 24, '2020-06-24', 0, ''),
(26, 25, '2020-06-24', 0, ''),
(27, 26, '2020-06-24', 0, ''),
(28, 27, '2020-06-24', 0, ''),
(29, 28, '2020-06-24', 0, ''),
(30, 29, '2020-06-24', 600, 'may-2020'),
(31, 30, '2020-06-24', 0, ''),
(32, 31, '2020-06-24', 0, ''),
(33, 32, '2020-06-24', 700, 'may-2020'),
(34, 33, '2020-06-24', 0, ''),
(35, 34, '2020-06-24', 0, ''),
(36, 35, '2020-06-24', 0, ''),
(37, 35, '2020-06-24', 0, ''),
(38, 36, '2020-06-24', 600, 'may-2020'),
(39, 37, '2020-06-24', 0, ''),
(40, 38, '2020-06-24', 0, ''),
(41, 39, '2020-06-24', 0, ''),
(42, 40, '2020-06-24', 600, 'may-2020'),
(43, 41, '2020-06-24', 0, ''),
(44, 42, '2020-06-24', 2000, 'april-may-2020'),
(45, 43, '2020-06-24', 0, ''),
(46, 44, '2020-06-24', 600, 'may-2020'),
(47, 45, '2020-06-24', 0, ''),
(48, 46, '2020-06-24', 0, ''),
(49, 43, '2020-06-24', 0, ''),
(50, 47, '2020-06-24', 0, ''),
(51, 48, '2020-06-24', 0, ''),
(52, 49, '2020-06-24', 0, ''),
(53, 50, '2020-06-24', 0, ''),
(54, 51, '2020-06-24', 0, ''),
(55, 52, '2020-06-24', 0, ''),
(56, 53, '2020-06-24', 0, ''),
(57, 52, '2020-06-24', 0, ''),
(58, 54, '2020-06-24', 0, ''),
(59, 55, '2020-06-24', 2400, 'Feb-may-2020'),
(60, 56, '2020-06-24', 0, ''),
(61, 57, '2020-06-24', 0, ''),
(62, 58, '2020-06-24', 0, ''),
(63, 59, '2020-06-24', 500, 'june'),
(64, 60, '2020-06-24', 0, ''),
(65, 61, '2020-06-24', 0, ''),
(66, 62, '2020-06-24', 0, ''),
(67, 63, '2020-06-24', 0, ''),
(68, 64, '2020-06-24', 0, ''),
(69, 65, '2020-06-24', 1200, 'april-may-2020'),
(70, 66, '2020-06-24', 0, ''),
(71, 67, '2020-06-24', 0, ''),
(72, 68, '2020-06-24', 0, ''),
(73, 69, '2020-06-24', 0, ''),
(74, 70, '2020-06-24', 0, ''),
(75, 71, '2020-06-24', 0, ''),
(76, 72, '2020-06-24', 0, ''),
(77, 73, '2020-06-24', 0, ''),
(78, 74, '2020-06-25', 0, ''),
(79, 75, '2020-06-27', 0, ''),
(80, 76, '2020-06-21', 0, ''),
(81, 76, '2020-06-30', 0, ''),
(82, 62, '2020-06-30', 0, ''),
(83, 19, '2020-06-30', 0, 'may-2020'),
(84, 60, '2020-06-21', 0, ''),
(85, 26, '2020-06-30', 0, ''),
(86, 77, '2020-06-30', 0, ''),
(87, 78, '2020-06-30', 0, ''),
(88, 79, '2020-06-30', 0, ''),
(89, 80, '2020-06-30', 0, ''),
(90, 81, '2020-06-30', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `remarks_table`
--

CREATE TABLE `remarks_table` (
  `remarks_id` int(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cdate_time` varchar(1000) NOT NULL,
  `comments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(111) NOT NULL,
  `UserId` varchar(111) CHARACTER SET utf8 NOT NULL,
  `password` varchar(111) CHARACTER SET utf8 NOT NULL,
  `companyname` varchar(111) NOT NULL,
  `title` longtext NOT NULL,
  `address` longtext NOT NULL,
  `company_mobile` varchar(111) NOT NULL,
  `com_email` varchar(99) NOT NULL,
  `type` varchar(10) NOT NULL,
  `logo_image` longtext DEFAULT NULL,
  `sms_cname` longtext NOT NULL,
  `sms_user` longtext NOT NULL,
  `sms_password` longtext NOT NULL,
  `sms_sender` varchar(100) NOT NULL,
  `support_num` varchar(100) NOT NULL,
  `excel_company_name` longtext NOT NULL,
  `excel_company_title` longtext NOT NULL,
  `excel_company_keyword` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `UserId`, `password`, `companyname`, `title`, `address`, `company_mobile`, `com_email`, `type`, `logo_image`, `sms_cname`, `sms_user`, `sms_password`, `sms_sender`, `support_num`, `excel_company_name`, `excel_company_title`, `excel_company_keyword`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Meghnalink.com', 'Meghnalink.com', 'Mohammadpure,luterchar,meghna,comilla-3516', '01854238062', 'meghnalinkdotcom@gmail.com', 'Superadmin', '1592650964.png', 'xzzX', 'zxZX', 'zXzX', '243234', '234234234', 'rrrr', 'rrr', 'CCL');

-- --------------------------------------------------------

--
-- Table structure for table `village_table`
--

CREATE TABLE `village_table` (
  `id` int(1) NOT NULL,
  `name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `village_table`
--

INSERT INTO `village_table` (`id`, `name`) VALUES
(2, 'Noya Mohammadpure'),
(3, 'Mohammadpur'),
(4, 'Sonapure'),
(5, 'Luterchar'),
(6, 'Dhori luterchar'),
(7, 'Kandargao'),
(8, 'Noya kandargao'),
(9, 'Abdullah pure'),
(10, 'Sekher gao'),
(15, 'Luterchar chok');

-- --------------------------------------------------------

--
-- Table structure for table `zone_table`
--

CREATE TABLE `zone_table` (
  `id` int(1) NOT NULL,
  `zoneName` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone_table`
--

INSERT INTO `zone_table` (`id`, `zoneName`) VALUES
(1, 'razib'),
(2, 'mpure stand'),
(3, 'KN stand'),
(4, 'Ujjol bari'),
(5, 'Emran'),
(6, 'Arif'),
(7, 'Mosjid'),
(8, 'Lc-bazar'),
(9, 'Orola khamba'),
(10, 'Rubel bari'),
(11, 'Jakariya'),
(14, 'Gaffar bari'),
(15, 'Sahalom bari'),
(16, 'High school'),
(17, 'R-cheyarman'),
(18, 'Choyon'),
(19, 'Azizul'),
(20, 'Kadir bari'),
(21, 'Free zone'),
(22, 'Office zone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_head_table`
--
ALTER TABLE `account_head_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_statement_table`
--
ALTER TABLE `account_statement_table`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `add_complain_table`
--
ALTER TABLE `add_complain_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_customer_sms_table`
--
ALTER TABLE `add_customer_sms_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_template_table`
--
ALTER TABLE `complain_template_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connecting_charge_report_table`
--
ALTER TABLE `connecting_charge_report_table`
  ADD PRIMARY KEY (`connecting_report_id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`custo_id`);

--
-- Indexes for table `due_customer_sms_table`
--
ALTER TABLE `due_customer_sms_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `expense_table`
--
ALTER TABLE `expense_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inactive_customer_sms_table`
--
ALTER TABLE `inactive_customer_sms_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_add_table`
--
ALTER TABLE `item_add_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_manage_table`
--
ALTER TABLE `item_manage_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_out_table`
--
ALTER TABLE `item_out_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_report_table`
--
ALTER TABLE `monthly_report_table`
  ADD PRIMARY KEY (`monthly_id`);

--
-- Indexes for table `occational_customer_sms_table`
--
ALTER TABLE `occational_customer_sms_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_income_table`
--
ALTER TABLE `other_income_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_table`
--
ALTER TABLE `package_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pre_customer_report_table`
--
ALTER TABLE `pre_customer_report_table`
  ADD PRIMARY KEY (`pre_id`);

--
-- Indexes for table `remarks_table`
--
ALTER TABLE `remarks_table`
  ADD PRIMARY KEY (`remarks_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `village_table`
--
ALTER TABLE `village_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone_table`
--
ALTER TABLE `zone_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_head_table`
--
ALTER TABLE `account_head_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `account_statement_table`
--
ALTER TABLE `account_statement_table`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `add_complain_table`
--
ALTER TABLE `add_complain_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_customer_sms_table`
--
ALTER TABLE `add_customer_sms_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complain_template_table`
--
ALTER TABLE `complain_template_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `connecting_charge_report_table`
--
ALTER TABLE `connecting_charge_report_table`
  MODIFY `connecting_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `custo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `due_customer_sms_table`
--
ALTER TABLE `due_customer_sms_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expense_table`
--
ALTER TABLE `expense_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inactive_customer_sms_table`
--
ALTER TABLE `inactive_customer_sms_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_add_table`
--
ALTER TABLE `item_add_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item_manage_table`
--
ALTER TABLE `item_manage_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item_out_table`
--
ALTER TABLE `item_out_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_report_table`
--
ALTER TABLE `monthly_report_table`
  MODIFY `monthly_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `occational_customer_sms_table`
--
ALTER TABLE `occational_customer_sms_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_income_table`
--
ALTER TABLE `other_income_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `package_table`
--
ALTER TABLE `package_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pre_customer_report_table`
--
ALTER TABLE `pre_customer_report_table`
  MODIFY `pre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `remarks_table`
--
ALTER TABLE `remarks_table`
  MODIFY `remarks_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `village_table`
--
ALTER TABLE `village_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `zone_table`
--
ALTER TABLE `zone_table`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
