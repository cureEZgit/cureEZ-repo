-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2021 at 03:18 AM
-- Server version: 10.3.28-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waynet_cureez`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_booking`
--

CREATE TABLE `appointment_booking` (
  `id` int(11) NOT NULL,
  `doctor_id` int(200) NOT NULL,
  `booking_date` varchar(200) NOT NULL,
  `type_id` varchar(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `discount` int(100) NOT NULL DEFAULT 0,
  `tax` int(100) NOT NULL DEFAULT 0,
  `internet_charge` int(100) NOT NULL DEFAULT 0,
  `final_price` int(100) NOT NULL DEFAULT 0,
  `time_slot` longblob NOT NULL,
  `start_time_slot` varchar(100) NOT NULL,
  `end_time_slot` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `close_code` varchar(200) NOT NULL,
  `user_prescription` varchar(300) NOT NULL,
  `prescription` varchar(300) NOT NULL,
  `status` enum('Pending','Accepted','Cancelled','Completed') NOT NULL DEFAULT 'Pending',
  `cancelled_by` enum('','Doctor','User') DEFAULT '',
  `cancel_reason` text NOT NULL,
  `cancel_time` varchar(200) DEFAULT NULL,
  `closing_time` datetime NOT NULL,
  `order_id` varchar(300) DEFAULT NULL,
  `payment_id` varchar(300) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_booking`
--

INSERT INTO `appointment_booking` (`id`, `doctor_id`, `booking_date`, `type_id`, `amount`, `discount`, `tax`, `internet_charge`, `final_price`, `time_slot`, `start_time_slot`, `end_time_slot`, `duration`, `user_id`, `close_code`, `user_prescription`, `prescription`, `status`, `cancelled_by`, `cancel_reason`, `cancel_time`, `closing_time`, `order_id`, `payment_id`, `payment_status`) VALUES
(57, 20, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, '01:00 PM', '02:00 pm', '45', 11, '88376', 'user_prescription_60b9d62302290.png', '', 'Cancelled', 'User', 'nsns', '2021-06-04 07:29:09', '0000-00-00 00:00:00', NULL, NULL, NULL),
(56, 22, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, '06:00 PM', '07:00 pm', '45', 11, '21203', 'user_prescription_60b9d51c86d44.png', '', 'Cancelled', 'User', 'bsbs', '2021-06-04 07:29:16', '0000-00-00 00:00:00', NULL, NULL, NULL),
(7, 8, '2021-06-03', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2231323a303020706d223b7d, '12:00 PM', '12:30 pm', '30', 9, '79970', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(55, 6, '2021-06-04', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230333a303020706d223b7d, '03:00 PM', '03:30 pm', '30', 11, '13881', 'user_prescription_60b9d4e8e82bb.png', '', 'Cancelled', 'User', 'sbbsbs', '2021-06-04 07:29:23', '0000-00-00 00:00:00', NULL, NULL, NULL),
(54, 4, '2021-06-04', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230313a303020706d223b7d, '01:00 PM', '01:30 pm', '30', 11, '12490', 'user_prescription_60b9d4accd8e5.png', '', 'Cancelled', 'User', 'bsbsb', '2021-06-04 07:29:34', '0000-00-00 00:00:00', NULL, NULL, NULL),
(53, 22, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, '05:00 PM', '06:00 pm', '45', 11, '11219', 'user_prescription_60b9d457b29da.png', '', 'Cancelled', 'User', 'jsjwjw', '2021-06-04 07:29:59', '0000-00-00 00:00:00', NULL, NULL, NULL),
(52, 22, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, '04:00 PM', '05:00 pm', '45', 11, '67138', 'user_prescription_60b9d423a48f6.png', '', 'Cancelled', 'User', 'jsjw', '2021-06-04 07:30:59', '0000-00-00 00:00:00', NULL, NULL, NULL),
(51, 22, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, '02:00 PM', '03:00 pm', '45', 11, '73211', 'user_prescription_60b9d41057a69.png', '', 'Cancelled', 'User', 'wjjwjw', '2021-06-04 07:31:08', '0000-00-00 00:00:00', NULL, NULL, NULL),
(50, 22, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, '02:30 PM', '03:30 pm', '45', 11, '63157', 'user_prescription_60b9c7975d340.png', '', 'Cancelled', 'Doctor', 'jejee', '2021-06-04 06:43:40', '0000-00-00 00:00:00', NULL, NULL, NULL),
(49, 22, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, '01:00 PM', '02:00 pm', '45', 11, '45462', 'user_prescription_60b9c77bec0ab.png', '', 'Cancelled', 'Doctor', 'jwhehehe', '2021-06-04 06:43:45', '0000-00-00 00:00:00', NULL, NULL, NULL),
(48, 22, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, '12:00 PM', '01:00 pm', '45', 11, '19467', 'user_prescription_60b9c765629d3.png', '', 'Cancelled', 'Doctor', 'whhwhwhe', '2021-06-04 06:43:50', '0000-00-00 00:00:00', NULL, NULL, NULL),
(47, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230353a303020706d223b7d, '05:00 PM', '05:30 pm', '15', 11, '58834', 'user_prescription_60b9c600e572f.png', '', 'Cancelled', 'User', 'jsjsj', '2021-06-04 07:31:36', '0000-00-00 00:00:00', NULL, NULL, NULL),
(46, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230343a333020706d223b7d, '04:30 PM', '05:00 pm', '15', 11, '10022', 'user_prescription_60b9c5f2838ec.png', '', 'Cancelled', 'User', 'jsjjwjw', '2021-06-04 07:31:43', '0000-00-00 00:00:00', NULL, NULL, NULL),
(45, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '15', 11, '49676', 'user_prescription_60b9c5e2373b7.png', '', 'Cancelled', 'User', 'nwjsjjs', '2021-06-04 07:31:50', '0000-00-00 00:00:00', NULL, NULL, NULL),
(44, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230333a333020706d223b7d, '03:30 PM', '04:00 pm', '15', 11, '35908', 'user_prescription_60b9c1bfed042.png', '', 'Cancelled', 'User', 'zjsjsjsj', '2021-06-04 07:32:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(43, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230333a303020706d223b7d, '03:00 PM', '03:30 pm', '15', 11, '57596', 'user_prescription_60b9c1af01d64.png', '', 'Cancelled', 'User', 'jejee jwjwjw', '2021-06-04 07:32:29', '0000-00-00 00:00:00', NULL, NULL, NULL),
(42, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230323a333020706d223b7d, '02:30 PM', '03:00 pm', '15', 11, '63445', 'user_prescription_60b9c18e9dd85.png', '', 'Cancelled', 'User', 'sjhsjs', '2021-06-04 07:33:08', '0000-00-00 00:00:00', NULL, NULL, NULL),
(26, 21, '2021-06-03', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '15', 30, '29800', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(27, 20, '2021-06-03', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, '04:30 PM', '05:30 pm', '45', 30, '76814', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(28, 20, '2021-06-03', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, '04:00 PM', '05:00 pm', '45', 9, '27994', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(29, 6, '2021-06-03', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '30', 9, '38597', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(30, 8, '2021-06-03', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '30', 9, '62187', '', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(41, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 11, '44448', 'user_prescription_60b9c18064050.png', '', 'Cancelled', 'User', 'jwjajjsjs', '2021-06-04 07:33:16', '0000-00-00 00:00:00', NULL, NULL, NULL),
(32, 5, '2021-06-03', 'video', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230353a303020706d223b7d, '05:00 PM', '05:30 pm', '30', 30, '21379', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(40, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2231323a303020706d223b7d, '12:00 PM', '12:30 pm', '15', 11, '89931', 'user_prescription_60b9c16a07387.png', '', 'Cancelled', 'User', 'hwjwjw', '2021-06-04 07:33:22', '0000-00-00 00:00:00', NULL, NULL, NULL),
(39, 21, '2021-06-04', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2231313a333020616d223b7d, '11:30 AM', '12:00 pm', '15', 11, '71322', 'user_prescription_60b9c159abf6c.png', '', 'Cancelled', 'User', 'guvuuhb', '2021-06-04 11:50:17', '0000-00-00 00:00:00', NULL, NULL, NULL),
(38, 22, '2021-06-04', 'video', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230393a303020616d223b693a313b733a383a2230393a333020616d223b7d, '09:00 AM', '10:00 am', '45', 11, '72874', 'user_prescription_60b8b55f1e1d7.png', '', 'Cancelled', 'Doctor', 'whwhwhw', '2021-06-04 06:43:59', '0000-00-00 00:00:00', NULL, NULL, NULL),
(37, 22, '2021-06-03', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, '04:30 PM', '05:30 pm', '45', 11, '93039', 'user_prescription_60b8b4badb6a4.png', 'prescription_60b8b75e15781.png', 'Completed', '', '', NULL, '2021-06-03 11:05:02', NULL, NULL, NULL),
(58, 21, '2021-06-05', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '15', 11, '13560', '', '', 'Cancelled', 'User', 'gugugu', '2021-06-04 11:51:22', '0000-00-00 00:00:00', NULL, NULL, NULL),
(59, 2, '2021-06-04', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230363a333020706d223b7d, '06:30 PM', '07:00 pm', '30', 11, '63790', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(60, 7, '2021-06-10', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2231323a333020706d223b7d, '12:30 PM', '01:00 pm', '30', 29, '88204', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(61, 22, '2021-06-05', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, '12:30 PM', '01:30 pm', '45', 11, '72078', 'user_prescription_60bb1b2ee850e.png', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(62, 9, '2021-06-06', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230343a333020706d223b7d, '04:30 PM', '05:00 pm', '15', 28, '60441', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(63, 8, '2021-06-07', 'audio', 400, 0, 0, 0, 400, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '30', 11, '27345', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(64, 22, '2021-06-07', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, '12:30 PM', '01:30 pm', '45', 11, '92069', 'user_prescription_60bdbdf6ddc7e.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(65, 22, '2021-06-07', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, '02:00 PM', '03:00 pm', '45', 31, '18630', 'user_prescription_60bdccad17496.png', '', 'Cancelled', 'User', 'time is not suitable for me....', '2021-06-07 07:37:55', '0000-00-00 00:00:00', NULL, NULL, NULL),
(66, 4, '2021-06-07', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '30', 31, '18139', 'user_prescription_60bdce61ede92.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(67, 6, '2021-06-07', 'audio', 300, 0, 0, 0, 300, 0x613a313a7b693a303b733a383a2230333a303020706d223b7d, '03:00 PM', '03:30 pm', '30', 31, '88235', 'user_prescription_60bde4f39c807.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL),
(68, 21, '2021-06-07', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '15', 32, '91586', '', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0607214762', '', NULL),
(69, 8, '2021-06-07', 'audio', 3, 0, 0, 0, 3, 0x613a313a7b693a303b733a383a2230353a303020706d223b7d, '05:00 PM', '05:30 pm', '30', 32, '98589', '', 'prescription_60be005bc5cb7.png', 'Completed', '', '', NULL, '2021-06-07 11:17:47', '0607212171', '', NULL),
(70, 21, '2021-06-10', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2231313a333020616d223b7d, '11:30 AM', '12:00 pm', '15', 28, '61298', 'user_prescription_60be0080dd4c2.png', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0607214831', '', NULL),
(71, 8, '2021-06-07', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230363a303020706d223b7d, '06:00 PM', '06:30 pm', '30', 9, '18280', '', 'prescription_60be0f1c32a7d.png', 'Completed', '', '', NULL, '2021-06-07 12:20:44', '0607211011', '', NULL),
(72, 21, '2021-06-08', 'video', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 28, '73694', 'user_prescription_60be129bc00bb.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0607216965', '', NULL),
(73, 21, '2021-06-10', 'video', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2230323a333020706d223b7d, '02:30 PM', '03:00 pm', '15', 28, '66601', 'user_prescription_60be150fdd2fd.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0607212073', '', NULL),
(74, 21, '2021-06-08', 'audio', 0, 0, 0, 0, 0, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '15', 28, '77747', 'user_prescription_60be16410575f.png', 'prescription_60be173edb63b.png', 'Completed', '', '', NULL, '2021-06-07 12:55:26', '0607213450', '', NULL),
(75, 24, '2021-06-08', 'audio', 50, 0, 0, 0, 50, 0x613a313a7b693a303b733a383a2231313a303720616d223b7d, '11:07 AM', '11:37 am', '30', 35, '95219', 'user_prescription_60befe693b00e.png', 'prescription_60bf07fac714d.png', 'Completed', '', '', NULL, '2021-06-08 06:02:34', '0608218765', '', NULL),
(76, 24, '2021-06-09', 'audio', 50, 0, 0, 0, 50, 0x613a313a7b693a303b733a383a2230313a303720706d223b7d, '01:07 PM', '01:37 pm', '30', 35, '72471', 'user_prescription_60c06e6802b38.png', 'prescription_60c071d6be61f.png', 'Completed', '', '', NULL, '2021-06-09 07:46:30', '0609214495', '', NULL),
(77, 8, '2021-06-09', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a333020706d223b7d, '02:30 PM', '03:00 pm', '30', 9, '84326', '', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0609215463', '', NULL),
(78, 24, '2021-06-09', 'audio', 50, 0, 0, 0, 50, 0x613a313a7b693a303b733a383a2230313a333720706d223b7d, '01:37 PM', '02:07 pm', '30', 35, '90646', 'user_prescription_60c07189edd66.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0609216867', '', NULL),
(79, 24, '2021-06-09', 'audio', 50, 0, 0, 0, 50, 0x613a313a7b693a303b733a383a2230323a303720706d223b7d, '02:07 PM', '02:37 pm', '30', 35, '62400', 'user_prescription_60c07386d517f.png', '', 'Cancelled', 'Doctor', 'uu', '2021-06-09 07:54:54', '0000-00-00 00:00:00', '0609216195', '', NULL),
(80, 8, '2021-06-09', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230333a303020706d223b7d, '03:00 PM', '03:30 pm', '30', 9, '39472', '', '', 'Cancelled', 'User', 'bjbibi', '2021-06-09 07:54:32', '0000-00-00 00:00:00', '0609218356', '', NULL),
(81, 20, '2021-06-09', 'audio', 0, 0, 0, 0, 0, 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, '02:30 PM', '03:30 pm', '45', 9, '11306', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0609215271', '', NULL),
(82, 23, '2021-06-16', 'physical', 3, 0, 0, 0, 3, 0x613a313a7b693a303b733a383a2231323a333020706d223b7d, '12:30 PM', '01:00 pm', '30', 36, '34681', 'user_prescription_60c33d36cefbe.png', '', 'Completed', '', '', NULL, '2021-06-11 10:45:53', '0611219121', '', NULL),
(83, 8, '2021-06-11', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230353a333020706d223b7d, '05:30 PM', '06:00 pm', '30', 9, '72183', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0611219055', '', NULL),
(84, 8, '2021-06-11', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230363a303020706d223b7d, '06:00 PM', '06:30 pm', '30', 11, '19722', 'user_prescription_60c350f32e75d.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0611216585', '', NULL),
(85, 8, '2021-06-11', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230363a333020706d223b7d, '06:30 PM', '07:00 pm', '30', 11, '54163', 'user_prescription_60c3528dd593b.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0611219493', '', NULL),
(86, 8, '2021-06-11', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230373a303020706d223b7d, '07:00 PM', '07:30 pm', '30', 11, '82996', 'user_prescription_60c3536c79e51.png', 'prescription_60c354013855f.png', 'Completed', '', '', NULL, '2021-06-11 12:16:01', '0611219517', '', NULL),
(87, 8, '2021-06-12', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '30', 11, '78340', 'user_prescription_60c4213343255.png', 'prescription_60c44d04cdc5f.png', 'Completed', '', '', NULL, '2021-06-12 05:58:28', '0612214983', '', NULL),
(88, 8, '2021-06-12', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231323a303020706d223b7d, '12:00 PM', '12:30 pm', '30', 11, '58492', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0612215751', '', NULL),
(89, 8, '2021-06-12', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231323a333020706d223b7d, '12:30 PM', '01:00 pm', '30', 11, '35727', 'user_prescription_60c4518ac4ff2.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0612215033', '', NULL),
(90, 8, '2021-06-12', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230313a303020706d223b7d, '01:00 PM', '01:30 pm', '30', 11, '41363', 'user_prescription_60c451e7c0e81.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0612219566', '', NULL),
(91, 8, '2021-06-12', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a333020706d223b7d, '02:30 PM', '03:00 pm', '30', 11, '42980', 'user_prescription_60c4523a4ba8b.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0612213248', '', NULL),
(92, 26, '2021-06-17', 'video', 250, 0, 0, 0, 250, 0x613a313a7b693a303b733a383a2230363a303020706d223b7d, '06:00 PM', '06:30 pm', '15', 28, '97786', '', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0612214252', '', NULL),
(93, 26, '2021-06-16', 'audio', 200, 0, 0, 0, 200, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '15', 28, '63736', 'user_prescription_60c466e410e5f.png', 'prescription_60c4682888471.png', 'Completed', '', '', NULL, '2021-06-12 07:54:16', '0612213381', '', NULL),
(94, 21, '2021-06-13', 'video', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '15', 28, '97209', 'user_prescription_60c49b16ac720.png', '', 'Cancelled', 'User', 'I am traveling ', '2021-06-12 11:51:18', '0000-00-00 00:00:00', '0612216190', '', NULL),
(95, 21, '2021-06-14', 'physical', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '15', 28, '47554', 'user_prescription_60c4ad3c9dcfe.png', '', 'Completed', '', '', NULL, '2021-06-12 12:52:44', '0612212972', '', NULL),
(96, 21, '2021-06-14', 'video', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231323a303020706d223b7d, '12:00 PM', '12:30 pm', '15', 28, '57265', 'user_prescription_60c6e68d90529.png', 'prescription_60c6ee852d7ae.png', 'Completed', '', '', NULL, '2021-06-14 05:52:05', '0614212608', '', NULL),
(97, 21, '2021-06-14', 'video', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230333a303020706d223b7d, '03:00 PM', '03:30 pm', '15', 28, '88591', 'user_prescription_60c6ede57b248.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0614216318', '', NULL),
(98, 21, '2021-06-16', 'video', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '15', 28, '93503', 'user_prescription_60c8dd708d2ed.png', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0615213583', '', NULL),
(99, 21, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231303a333020616d223b7d, '10:30 AM', '11:00 am', '15', 28, '19382', 'user_prescription_60c8e04fc82e0.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0615214655', '', NULL),
(100, 23, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230313a303020706d223b7d, '01:00 PM', '01:30 pm', '30', 9, '51043', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616218630', '', NULL),
(101, 21, '2021-06-16', 'video', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '15', 28, '49894', 'user_prescription_60c989ef9c2f5.png', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0616212871', '', NULL),
(102, 23, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231323a303020706d223b7d, '12:00 PM', '12:30 pm', '30', 11, '27113', 'user_prescription_60c98c419d720.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616218774', '', NULL),
(103, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a333020616d223b7d, '11:30 AM', '12:00 pm', '30', 11, '91281', 'user_prescription_60c98c9e1e1c2.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616213114', '', NULL),
(104, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230313a303020706d223b7d, '01:00 PM', '01:30 pm', '30', 11, '32900', 'user_prescription_60c9a1c466760.png', '', 'Cancelled', 'User', 'am not suitable for this time..', '2021-06-16 07:03:21', '0000-00-00 00:00:00', '0616216953', '', NULL),
(105, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230313a303020706d223b7d, '01:00 PM', '01:30 pm', '30', 11, '10152', 'user_prescription_60c9a261a0590.png', '', 'Cancelled', 'User', 'I am not suitable', '2021-06-16 07:05:11', '0000-00-00 00:00:00', '0616216089', '', NULL),
(106, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230313a303020706d223b7d, '01:00 PM', '01:30 pm', '30', 11, '95804', 'user_prescription_60c9a8879be9b.png', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0616212945', '', NULL),
(107, 9, '2021-06-16', 'audio', 100, 0, 0, 0, 100, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 11, '87871', 'user_prescription_60c9a94a181e9.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616212991', '', NULL),
(108, 21, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 11, '26794', 'user_prescription_60c9a9a679952.png', '', 'Cancelled', 'User', 'Chu jvj', '2021-06-16 07:37:37', '0000-00-00 00:00:00', '0616214038', '', NULL),
(109, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a333020706d223b7d, '02:30 PM', '03:00 pm', '30', 11, '78174', 'user_prescription_60c9ab7e32c4d.png', '', 'Cancelled', 'Doctor', 'noooooooo', '2021-06-16 07:43:52', '0000-00-00 00:00:00', '0616219847', '', NULL),
(110, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a333020706d223b7d, '02:30 PM', '03:00 pm', '30', 11, '94557', 'user_prescription_60c9abef8ff59.png', '', 'Cancelled', 'Doctor', 'yesssssss', '2021-06-16 07:46:20', '0000-00-00 00:00:00', '0616211813', '', NULL),
(111, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '30', 37, '70648', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616212805', '', NULL),
(112, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230343a333020706d223b7d, '04:30 PM', '05:00 pm', '30', 38, '88741', '', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0616211596', '', NULL),
(113, 23, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230343a333020706d223b7d, '04:30 PM', '05:00 pm', '30', 39, '26016', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616215234', '', NULL),
(114, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230363a303020706d223b7d, '06:00 PM', '06:30 pm', '30', 40, '75410', 'user_prescription_60c9e85c97763.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616211646', '', NULL),
(115, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230363a333020706d223b7d, '06:30 PM', '07:00 pm', '30', 40, '80233', 'user_prescription_60c9e8e931c69.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616218999', '', NULL),
(116, 8, '2021-06-16', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230373a303020706d223b7d, '07:00 PM', '07:30 pm', '30', 40, '60084', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616219009', '', NULL),
(117, 8, '2021-06-17', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '30', 41, '43284', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616215316', '', NULL),
(118, 23, '2021-06-17', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '30', 41, '49761', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0616212763', '', NULL),
(119, 21, '2021-06-18', 'video', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '15', 28, '56786', '', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0617219384', '', NULL),
(120, 21, '2021-06-18', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 28, '22622', '', '', 'Cancelled', 'User', 'unable to attend', '2021-06-18 06:44:15', '0000-00-00 00:00:00', '0618213568', '', NULL),
(121, 21, '2021-06-18', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 28, '55230', '', '', 'Cancelled', 'User', 'so enjoys', '2021-06-18 06:46:02', '0000-00-00 00:00:00', '0618211913', '', NULL),
(122, 21, '2021-06-18', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 28, '38000', '', 'prescription_60cc55f39ba03.png', 'Completed', '', '', NULL, '2021-06-18 08:14:43', '0618219966', '', NULL),
(123, 21, '2021-06-19', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '15', 28, '63143', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0618212753', '', NULL),
(124, 8, '2021-06-18', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230333a303020706d223b7d, '03:00 PM', '03:30 pm', '30', 9, '24137', 'user_prescription_60cc6505114ae.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0618211796', '', NULL),
(125, 8, '2021-06-18', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230343a333020706d223b7d, '04:30 PM', '05:00 pm', '30', 41, '84121', 'user_prescription_60cc7c93616c0.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0618215998', '', NULL),
(126, 8, '2021-06-21', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '30', 41, '91824', 'user_prescription_60d0209584c54.png', '', 'Cancelled', 'Doctor', 'work...', '2021-06-21 05:17:43', '0000-00-00 00:00:00', '0621214513', '', NULL),
(127, 8, '2021-06-21', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a333020616d223b7d, '11:30 AM', '12:00 pm', '30', 41, '40136', '', '', 'Completed', '', '', NULL, '2021-06-21 05:53:39', '0621211770', '', NULL),
(128, 8, '2021-06-21', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231323a303020706d223b7d, '12:00 PM', '12:30 pm', '30', 41, '54373', 'user_prescription_60d028ec3fd9b.png', 'prescription_60d0298e6b0f3.png', 'Completed', '', '', NULL, '2021-06-21 05:54:22', '0621212524', '', NULL),
(129, 8, '2021-06-22', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '30', 41, '88485', '', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0621218478', '', NULL),
(130, 8, '2021-06-21', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '30', 41, '33244', 'user_prescription_60d069edb9b1d.png', '', 'Cancelled', 'Doctor', 'bshs', '2021-06-21 10:34:34', '0000-00-00 00:00:00', '0621219550', '', NULL),
(131, 8, '2021-06-22', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a333020616d223b7d, '11:30 AM', '12:00 pm', '30', 41, '28211', 'user_prescription_60d06a385882c.png', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0621219475', '', NULL),
(132, 26, '2021-06-21', 'video', 250, 0, 0, 0, 250, 0x613a313a7b693a303b733a383a2230353a303020706d223b7d, '05:00 PM', '05:30 pm', '15', 28, '14015', 'user_prescription_60d075c69ea7b.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0621218713', '', NULL),
(133, 27, '2021-06-22', 'audio', 1, 0, 0, 0, 1, 0x613a323a7b693a303b733a383a2231323a303120706d223b693a313b733a383a2231323a333120706d223b7d, '12:01 PM', '01:01 pm', '45', 41, '29933', 'user_prescription_60d17f380a4e2.png', '', 'Accepted', '', '', NULL, '0000-00-00 00:00:00', '0622214053', '', NULL),
(134, 26, '2021-06-22', 'audio', 200, 0, 0, 0, 200, 0x613a313a7b693a303b733a383a2231323a333020706d223b7d, '12:30 PM', '01:00 pm', '15', 9, '18226', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0622214256', '', NULL),
(135, 27, '2021-06-22', 'audio', 1, 0, 0, 0, 1, 0x613a323a7b693a303b733a383a2230313a303120706d223b693a313b733a383a2230313a333120706d223b7d, '01:01 PM', '02:01 pm', '45', 9, '67106', '', 'prescription_60d185f8af744.png', 'Completed', '', '', NULL, '2021-06-22 06:40:56', '0622215355', '', NULL),
(136, 29, '2021-06-22', 'video', 250, 0, 0, 0, 250, 0x613a313a7b693a303b733a383a2230323a303020706d223b7d, '02:00 PM', '02:30 pm', '15', 42, '24397', 'user_prescription_60d1933f46f70.png', 'prescription_60d193d59c1cf.png', 'Completed', '', '', NULL, '2021-06-22 07:40:05', '0622219010', '', NULL),
(137, 25, '2021-06-22', 'audio', 200, 0, 0, 0, 200, 0x613a313a7b693a303b733a383a2230333a303020706d223b7d, '03:00 PM', '03:30 pm', '15', 42, '92485', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0622212296', '', NULL),
(138, 27, '2021-06-22', 'audio', 1, 0, 0, 0, 1, 0x613a323a7b693a303b733a383a2230353a303120706d223b693a313b733a383a2230353a333120706d223b7d, '05:01 PM', '06:01 pm', '45', 41, '55361', '', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0622218572', '', NULL),
(139, 29, '2021-06-24', 'audio', 200, 0, 0, 0, 200, 0x613a313a7b693a303b733a383a2231323a303020706d223b7d, '12:00 PM', '12:30 pm', '15', 28, '43988', 'user_prescription_60d4258be0792.png', 'prescription_60d4266677a39.png', 'Completed', '', '', NULL, '2021-06-24 06:29:58', '0624213783', '', NULL),
(140, 29, '2021-06-29', 'video', 250, 0, 0, 0, 250, 0x613a313a7b693a303b733a383a2231303a303020616d223b7d, '10:00 AM', '10:30 am', '15', 28, '45130', 'user_prescription_60da997a38c2d.png', 'prescription_60da9a236ef99.png', 'Completed', '', '', NULL, '2021-06-29 03:57:23', '0629215578', '', NULL),
(141, 3, '2021-06-29', 'audio', 100, 0, 0, 0, 100, 0x613a313a7b693a303b733a383a2230343a303020706d223b7d, '04:00 PM', '04:30 pm', '30', 44, '67257', 'user_prescription_60daf3764800d.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0629217522', '', NULL),
(142, 25, '2021-07-06', 'audio', 200, 0, 0, 0, 200, 0x613a313a7b693a303b733a383a2230373a303320706d223b7d, '07:03 PM', '07:33 pm', '15', 28, '67432', 'user_prescription_60e320ba72fa7.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0705212531', '', NULL),
(143, 29, '2021-07-06', 'video', 250, 0, 0, 0, 250, 0x613a313a7b693a303b733a383a2231303a333020616d223b7d, '10:30 AM', '11:00 am', '15', 28, '28938', '', 'prescription_60e322423e1c0.png', 'Completed', '', '', NULL, '2021-07-05 15:16:18', '0705219762', '', NULL),
(144, 8, '2021-07-14', 'audio', 1, 0, 0, 0, 1, 0x613a313a7b693a303b733a383a2231313a303020616d223b7d, '11:00 AM', '11:30 am', '30', 44, '87171', 'user_prescription_60ee766586668.png', '', 'Pending', '', '', NULL, '0000-00-00 00:00:00', '0714212572', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cancel_reason`
--

CREATE TABLE `cancel_reason` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel_reason`
--

INSERT INTO `cancel_reason` (`id`, `name`) VALUES
(1, 'Time not suitabele'),
(2, 'Car key missing');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_timeslot`
--

CREATE TABLE `cancel_timeslot` (
  `id` int(11) NOT NULL,
  `booking_id` int(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `ramp_id` int(100) NOT NULL,
  `wash_type` int(100) NOT NULL,
  `position_id` int(100) NOT NULL,
  `time_slot` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel_timeslot`
--

INSERT INTO `cancel_timeslot` (`id`, `booking_id`, `booking_date`, `ramp_id`, `wash_type`, `position_id`, `time_slot`) VALUES
(1, 23, '2020-06-07', 1, 4, 3, 0x613a333a7b693a303b733a383a2230323a343520706d223b693a313b733a383a2230333a303020706d223b693a323b733a383a2231323a313520616d223b7d),
(2, 26, '2020-06-25', 1, 4, 3, 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230323a343520706d223b7d),
(3, 28, '2020-06-26', 1, 4, 3, 0x613a323a7b693a303b733a383a2231303a333020616d223b693a313b733a383a2231303a343520616d223b7d),
(4, 32, '2020-07-03', 1, 4, 3, 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a313520706d223b7d),
(5, 37, '2020-07-03', 1, 3, 7, 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2231323a313520616d223b7d),
(6, 34, '2020-07-03', 1, 4, 1, 0x613a323a7b693a303b733a383a2230333a313520706d223b693a313b733a383a2230333a333020706d223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `status`) VALUES
(1, 'Diabetologist', '1622465680.png', 1),
(2, 'Gastroenterologist', '1622465671.png', 1),
(4, 'ENT Specialist', '1622465660.png', 1),
(5, 'Dentist', '1622465650.png', 1),
(12, 'Endocrinologist', '1622465628.png', 1),
(13, 'Neurologist', '1622465618.png', 1),
(14, 'Psychotherapist', '1622465604.png', 1),
(16, 'Orthopaedic', '1622468128.jpeg', 1),
(18, 'General Medicine', '1622716710.jpeg', 1),
(19, 'Homeopathy', '1623480408.jpeg', 1),
(21, 'Ayurveda', '1623480607.jpeg', 1),
(22, 'Rheumatologist', '1624341435.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `rating` varchar(100) NOT NULL DEFAULT '3.0',
  `status` int(11) NOT NULL DEFAULT 0,
  `entry_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `name`, `email`, `mobile`, `image`, `address`, `latitude`, `longitude`, `city`, `state`, `rating`, `status`, `entry_time`) VALUES
(2, 'Multicare Homeopathy Clinic', 'pt.care@multicarehom', '09937412150', '1596454050.png', 'HIG-4/4, Nandankanan Rd, Housing Board Colony, Chandrasekharpur', '20.32797', '85.82054', 'Bhubaneswar', '', '3.0', 0, '2020-08-03 11:27 am'),
(3, 'Unique Ayur Clinic', 'uniqueayurclinic@gma', '08339902233', '1596454678.png', 'IRC Village, Ekamra Kanan Road, Jaydev Vihar', '20.28972', '85.81839', 'Bhubaneswar', '', '3.0', 0, '2020-08-03 11:37 am');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_speciality`
--

CREATE TABLE `clinic_speciality` (
  `id` int(11) NOT NULL,
  `clinic_id` int(100) NOT NULL,
  `speciality` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_speciality`
--

INSERT INTO `clinic_speciality` (`id`, `clinic_id`, `speciality`) VALUES
(4, 2, 4),
(3, 2, 5),
(5, 2, 2),
(16, 3, 2),
(15, 3, 3),
(14, 3, 4),
(13, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `regd_no` varchar(200) NOT NULL,
  `uniq_id` varchar(12) NOT NULL,
  `clinic_name` varchar(100) DEFAULT NULL,
  `name` varchar(70) NOT NULL,
  `age` varchar(60) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(300) NOT NULL,
  `forgot_password_code` varchar(100) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `cover_pic` varchar(200) DEFAULT NULL,
  `education` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `practice_starts` date NOT NULL,
  `description` text DEFAULT NULL,
  `audio_price` varchar(200) DEFAULT NULL,
  `video_price` varchar(100) DEFAULT NULL,
  `physical_price` varchar(100) DEFAULT NULL,
  `speciality` varchar(200) NOT NULL,
  `language` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(200) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'Odisha',
  `open_time` varchar(100) DEFAULT NULL,
  `close_time` varchar(100) DEFAULT NULL,
  `off_day` varchar(200) DEFAULT NULL,
  `break_from` varchar(200) DEFAULT NULL,
  `break_to` varchar(100) DEFAULT NULL,
  `slot_booking` varchar(200) DEFAULT NULL,
  `rating` varchar(30) NOT NULL,
  `entry_time` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `regd_no`, `uniq_id`, `clinic_name`, `name`, `age`, `gender`, `email`, `password`, `forgot_password_code`, `mobile`, `cover_pic`, `education`, `experience`, `practice_starts`, `description`, `audio_price`, `video_price`, `physical_price`, `speciality`, `language`, `address`, `city`, `latitude`, `longitude`, `state`, `open_time`, `close_time`, `off_day`, `break_from`, `break_to`, `slot_booking`, `rating`, `entry_time`, `status`) VALUES
(1, '1112', 'DDE001', 'Multicare Clinic', 'Dr.Sravan Kumar', '45', 'male', 'itishree.wayindia@gmail.com', 'password', '', '7205706237', '1596717130.png', 'MBBS', ' 5years exp.', '2021-01-01', '  Dr.Sravan Kumar is an experienced Neurologist Specialist in Badambadi, Cuttack. He is currently practising at sneha clinic in Badambadi, Cuttack. Don’t wait in a queue, book an instant appointment online with Dr.Sravan Kumar on Lybrate.com.', '100', '200', '300', '5', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', 'qr no-1r/15,ouat colony,unit-8', 'Bhubaneswar', '20.3280', '83.25785', '', '10:00 AM', '8:00 PM', 'Sun', '1:01 PM', '2:01 PM', '15', '3', '2020-08-06 12:32 pm', 1),
(2, '0288', 'DDI001', 'Multicare Homeopathy Clinic', 'Dr.RangadharSatapathy', '45', 'male', 'rangadhara@gmail.com', 'rama', '', '09937412150', '1596774804.jpeg', 'BHMS, MD', '28years exp.', '2021-01-01', ' Dr. Rangadhar Satapathy is a trusted Homeopath in Chandrasekharpur, Bhubaneswar. He has been a successful Homeopath for the last 25 years. He has completed BHMS. He is currently practising at Multicare Homeopathy Center in Chandrasekharpur, Bhubaneswar. Book an appointment online with Dr. Rangadhar Satapathy on Lybrate.com.', '100', '200', '300', '1', 'a:2:{i:0;s:5:\"hindi\";i:1;s:7:\"english\";}', 'HIG-4/4,  Housing Board Colony, Chandrasekharpur', 'Bhubaneswar', '20.3280', '85.8205', '', '10:00 AM', '8:00 PM', 'Sun', '1:00 PM', '2:00 PM', '30', '3', '2020-08-07 04:33 am', 1),
(3, '1524', 'DDE002', 'Dr Shubhransu Patro\'s Clinic', 'Dr Shubhransu Patro', '39', 'male', 'Shubhransu@gmailo.com', '', '', '9438330352', '1596775685.jpeg', 'MBBS - M.K.C.G Medical college, Berhampur', ' 26years exp.', '2021-01-01', ' Faculty in General Medicine with more than twenty years of post P.G. experience and around 50 publications in different journals.', '100', '200', '300', '5', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', 'Sailashree Vihar,Bhubaneswar', 'Bhubaneswar', '20.3329', '85.8070', '', '10:00 AM', '8:00 PM', 'Sun', '1:00 PM', '2:00 PM', '30', '3', '2020-08-07 04:48 am', 1),
(4, '', 'DPS002', 'APEX CARE', 'Dr. PranabMahapatra', '48', 'male', 'pranabmahapatra@gmail.com', 'password', '', '9438730738', '1596776313.jpeg', 'MBBS - V.S.S Medical College', ' 25years exp.', '2021-01-01', ' Dr. Pranab Mahapatra is a renowned Psychiatrist in Jaydev Vihar, Bhubaneswar. He has over 25 years of experience as a Psychiatrist. He studied and completed MBBS, MD - Neuropsychiatry . You can meet Dr. Pranab Mahapatra personally at APEX CARE in Jaydev Vihar, Bhubaneswar. Save your time and book an appointment online with Dr. Pranab Mahapatra on Lybrate.com.', '100', '200', '300', '14', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', '#Plot No 2540, Jaydev Vihar,Bhubaneswar', 'Bhubaneswar', '20.2962', '85.8251', '', '10:00 AM', '8:00 PM', 'Sun', '1:00 PM', '2:00 PM', '30', '3', '2020-08-07 04:58 am', 0),
(5, '', 'DPS003', 'Institute of health sciences', 'Ms.Jayashree Sarangi', '30', 'female', 'Jayashree@gmail.com', 'password', '', '06742553640', '1596777068.jpeg', 'M PHIL - S C B Medical College', ' 10years exp.', '2021-01-01', ' She has had many happy patients in her 1 year of journey as a Psychologist. She studied and completed M PHIL (Clinical Psychology) . Save your time and book an appointment online with Ms. Jayashree Sarangi on Lybrate.com.', '100', '200', '300', '14', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', 'Chandaka, Bhubaneswar (India)', 'Bhubaneswar', '20.2724', '85.8339', '', '10:00 AM', '8:00 PM', 'Sun', '1:00 PM', '2:00 PM', '30', '3', '2020-08-07 05:11 am', 1),
(6, '', 'DEN001', 'Apollo Hospitals', 'Dr Sambit Das', '48', 'male', 'Sambit@gmail.com', 'password', '', '8569845412', '1596777714.jpeg', 'MBBS; MD in Internal Medicine', ' 15yars exp.', '2021-01-01', ' Dr Sambit Das is good doctor having 15 years of experience in apollo hospital bhubaneswar.', '100', '200', '300', '12', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', 'Apollo Hospitals, 251, Old Sainik School Road', 'Bhubaneswar', '20.2961', '85.8245', '', '10:00 AM', '4:00 PM', 'Sun', '1:00 PM', '2:00 PM', '30', '3', '2020-08-07 05:21 am', 0),
(7, '', 'DGY001', ' Roy Gastro & Liver Center', 'Dr.Debasis Misra', '40', 'male', 'Debasis@gmail.com', 'password', '', '9938588180', '1596778254.png', 'MBBS - Sriram Chandra Bhanja Medical College', ' 20Years Exp', '2021-01-01', ' Dr. Debasis Misra is a trusted Gastroenterologist in Bomikhal, Bhubaneswar. He has had many happy patients in his 20 years of journey as a Gastroenterologist. He studied and completed MBBS, MD - Medicine, DM - Gastroenterology . You can visit him at Roy Gastro & Liver Center in Bomikhal, Bhubaneswar. Don’t wait in a queue, book an instant appointment online with Dr. Debasis Misra on Lybrate.com.', '100', '200', '300', '2', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', '2nd Floor, Debaki Tower, Bomikhal, Bhubaneswar', 'Bhubaneswar', '20.2858', '85.8569', '', '10:00 AM', '8:00 PM', 'Sun', '1:00 PM', '2:00 PM', '30', '3', '2020-08-07 05:30 am', 0),
(8, '0258', 'DDE003', 'yourdentist dental clinic', 'Dr.Arpita Dash', '36', 'female', 'debendra.wayindia@gmail.com', 'debendra', '', '7064719630', '1623064734.png', 'BDS - SALEM', ' 9years exp.', '2018-10-01', ' Dr. Arpita Dash is a popular Dentist in NH-5, Bhubaneswar. She has had many happy patients in her 9 years of journey as a Dentist. She has completed BDS . You can consult Dr. Arpita Dash at yourdentist dental clinic in NH-5, Bhubaneswar. Book an appointment online with Dr. Arpita Dash and consult privately on Lybrate.com.', '1', '2', '3', '5', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', 'Acharya Vihar ,Bhubaneswar', 'Bhubaneswar', '20.2954', '85.8453', '', '11:00 AM', '8:00 PM', 'Sun', '1:00 PM', '2:10 PM', '30', '3', '2020-08-07 05:42 am', 0),
(9, '12345', 'DPS001', 'sneha clinic', 'Ms.Bijayalaxmi Behera', '45', 'female', 'Bijayalaxmi@gmail.com', 'password', '', '06742435831', '1596779493.jpeg', 'MBBS,SCB College', ' 15years exp.', '2021-01-01', ' Ms. Bijayalaxmi Behera is an experienced ENT Specialist in Badambadi, Cuttack. She is currently practising at sneha clinic in Badambadi, Cuttack. Don’t wait in a queue, book an instant appointment online with Ms. Bijayalaxmi Behera on Lybrate.com.', '100', '200', '300', '14', 'a:3:{i:0;s:4:\"odia\";i:1;s:5:\"hindi\";i:2;s:7:\"english\";}', 'life clinic,  Cuttack', 'Cuttack', '20.2454', '85.8389', '', '11:00 AM', '8:00 PM', 'Sun', '1:00 PM', '2:00 PM', '15', '3', '2020-08-07 05:51 am', 0),
(20, '0257', 'DOR003', 'Sanatan Spine and Orthopedic Clinic', 'Dr. Sanatan Behera', '', '', 'sanatan@vellorecmch.com', 'rama', '', '09861043197', '1622468728.png', 'MBBS, CMCH Vellore, MS South Korea', NULL, '2021-01-01', 'Consultant spine surgeon at Kalinga Hospital', NULL, NULL, NULL, '16', NULL, 'Samanata Vihar, Nalco Square', 'Bhubaneswar', '20.315077', '85.8220649', '', '7:00 AM', '7:00 PM', 'Sun', '1:00 PM', '2:00 PM', '45', '3', '2021-05-31 01:45 pm', 0),
(22, '5487', 'DGE001', 'Odisha Clinic', 'Dr. Bijay Mishra', '', '', 'bijay@gmail.com', 'password', '', '9854789740', '1622717119.jpeg', 'MD Medicine', NULL, '2021-01-01', 'MS from CMCH vellore.', NULL, NULL, NULL, '18', NULL, 'Sahid Nagar', 'Bhubaneswar', '20', '85', '', '9:00 AM', '8:00 PM', 'Sat', '1:00 PM', '2:00 PM', '45', '3', '2021-06-03 10:45 am', 0),
(21, 'DEL1234567', 'DOR001', '', 'Dr  Test Doc1', '', '', 'test.doc1@gmail.com', 'password', '', '9845197656', 'profile_pic_60d072715197b.png', 'MBBS, MD', '15', '2021-01-01', 'to be filled later', '1', '1', '1', '16', NULL, '2nd cross', 'Bangalore', '', '', '', '10:00 AM', '5:00 PM', 'Sun', '12:00 PM', '2:00 PM', '15', '3', '2021-06-03 05:23 am', 0),
(23, '12345', 'DNE001', 'Ankita Lab', 'Ankita', '', '', 'ankita@gmail.com', '12345', '', '9999999999', '1623406746.jpeg', 'MBBS', '5year', '2021-01-01', 'Neuro surgery', '1', '2', '3', '13', NULL, 'Acharya Vihar', 'BBSR', '', '', '', '10:00 AM', '5:00 PM', 'Sun', '1:00 PM', '2:00 PM', '30', '3', '2021-06-07 11:52 am', 0),
(24, 'GHU254255H', 'DOR002', 'R & R Health Care', 'Dr. Rajan', '', '', 'rajan@gmail.com', '12345', '', '8904853490', 'profile_pic_60bef808e0056.png', 'M.B.B.S', '5 year', '2021-01-01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '50', '50', '300', '16', NULL, '4th Cross, 1st Main Rd, Talacauvery Housing Society Layout, Basavanagara', 'Bangalore', '', '', '', '10:07 AM', '3:08 PM', 'Sun', '1:00 PM', '1:20 PM', '30', '3', '2021-06-08 04:41 am', 0),
(25, 'AYUSH012021', 'DAY001', 'Ayush Clinin 01', 'Dr Ayurvedda 01', '', '', 'Ayurveda01@gmail.com', '', '', '1234567890', '1624365351.jpeg', 'BMS ayurveda', '15', '2021-01-01', 'Gold medalist in Ayurveda  from BMS college of Medicine. ', '200', '250', '350', '21', NULL, '2nd cross', 'Bangalore', '', '', '', '19:03', '20:04', 'Sun', '22:06', '22:07', '15', '3', '2021-06-12 06:56 am', 0),
(26, 'AYUSH022021', 'DHO001', 'Homeo clinic 01', 'Dr Homeo01', '', '', 'homeo01@gmail.com', '', '', '1234567890', '1623481263.jpeg', 'BMS(Homeo)', '12', '2021-01-01', 'Gold medalist from BMS college of medicine in year 2001. Gold medlist from German institute of Hemeopathic pratitioner.', '200', '250', '300', '19', NULL, '2nd cross', 'Bangalore', '', '', '', '10:00 AM', '6:30 PM', 'Sun', '1:00 PM', '2:30 PM', '15', '3', '2021-06-12 07:01 am', 0),
(27, ' 13880', 'DRH001', ' Apollo Hospitals Bhubaneshwar', 'Dr Ajit Kumar Surin', '', '', 'ajitkumarsurin@gmail.com', '', '', '3333344444', '1624365049.jpeg', 'MD (MEDICINE), PDF in Clinical Immunology and Rheumatology', NULL, '2010-08-26', ' Ajit Surin, Aswin Nair, George Jacob and Debashish Danda 2014 ,Lupus Enteritis An important cause to be considered in systemic Lupus Erythematosus patients with acute abdomen A case report, international journal of case reports in Medicine ,Vol.2014,Article ID 608426,DOI 10.5171 .2014.6084', '1', '1', '1', '22', NULL, 'Apollo Hospitals, 251, Old Sainik School Road, Unit-15, Orissa, Bhubaneswar - 751 005 Ph:0674 - 6661', 'Bhubaneswar', '', '', '', '20:02', '21:03', 'Thu', '21:03', '21:03', '45', '3', '2021-06-22 06:02 am', 1),
(28, '12345', 'DDI002', 'Mahavir Complex', 'DR. J.P. DAS', '', '', 'jpdas@gmail.com', '', '', '9337102001', '1624344325.jpeg', 'M.D, F.D', NULL, '2009-07-01', 'Best physician, MEDICINE SPECIALIST and Diabetologist', '300', '400', '500', '1', NULL, 'CRP', 'Bhubaneswar', '9.534535', '10.56756', '', '08:00', '17:00', 'Thu', '13:00', '14:00', '60', '3', '2021-06-22 06:45 am', 0),
(29, '1234567890', 'DGE002', 'B B Clinic', 'Dr  B B Singh', '', '', 'bbs@gmail.com', 'password', '', '9845197656', '1624364491.png', 'MBBS, MD', NULL, '2000-01-01', 'Gold medalist from AIIMS \ngold medalist from Neelrataan Sarkar Medical College (MBBS)\nA passionate social worker\nFRCS', '200', '250', '500', '18', NULL, '130/3 Ferns City, Doddanekundi', 'Bangalore', '13', '78', '', '10:00', '17:00', 'Sun', '13:00', '14:00', '15', '3', '2021-06-22 07:26 am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_device_data`
--

CREATE TABLE `doctor_device_data` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `device_id` text NOT NULL,
  `device_token` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_device_data`
--

INSERT INTO `doctor_device_data` (`id`, `doctor_id`, `device_id`, `device_token`) VALUES
(1, 8, '1358081b0e414b12', 'cEI6w6kjS6u2T8txWcpuRh:APA91bF0ZZTyE5vFeE31NitYIgvMTEIoxgbMctSyFjZLx3oI6hKpGzCpndIsDBQmOsDZlNf667X5B6Ni1UN30qAVy6LC1B6bWg6gHEbYurNvdnNa7yoN_FLqO3kckC7kdXlPX7cddis3'),
(2, 20, '1273da5dfda2b9e4', 'efraq2CdSqy3s6IsWS2epO:APA91bGMgsxM4YC0rsytt8mTekAbnT8uM6FUSqno35-0xk_1Oul381Vds3m6WgWc5upTkwDpYdjjVbD_rHJJCEajupRBh3peLoZHFVmTTMXnZKq2P59axiTLhj9bMW_iMgCvifxMZ2-n');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_feedback`
--

CREATE TABLE `doctor_feedback` (
  `id` int(11) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `feedback` text NOT NULL,
  `entry_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_feedback`
--

INSERT INTO `doctor_feedback` (`id`, `doctor_id`, `feedback`, `entry_time`) VALUES
(1, 8, 'test', '2021-06-18'),
(2, 8, 'shshhss', '2021-06-19'),
(3, 8, 'whwhwjwhwjjw', '2021-06-19'),
(4, 8, 'hrllo', '2021-06-21'),
(5, 8, 'deb', '2021-06-21'),
(6, 8, 'nsnw', '2021-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `entry_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `user_id`, `doctor_id`, `entry_date`) VALUES
(2, 1, 2, '2021-03-15'),
(3, 8, 15, '2021-03-15'),
(4, 9, 3, '2021-03-15'),
(5, 9, 5, '2021-03-18'),
(6, 9, 8, '2021-03-18'),
(7, 9, 7, '2021-03-19'),
(8, 9, 4, '2021-05-14'),
(9, 11, 2, '2021-05-14'),
(10, 11, 8, '2021-05-14'),
(11, 11, 4, '2021-05-14'),
(12, 11, 7, '2021-05-14'),
(13, 11, 5, '2021-05-31'),
(14, 11, 9, '2021-05-31'),
(15, 27, 4, '2021-05-31'),
(16, 11, 21, '2021-06-03'),
(17, 11, 22, '2021-06-05'),
(18, 9, 6, '2021-06-09'),
(19, 28, 21, '2021-06-16'),
(20, 37, 8, '2021-06-16'),
(21, 38, 8, '2021-06-16'),
(22, 39, 23, '2021-06-16'),
(23, 41, 8, '2021-06-16'),
(24, 41, 23, '2021-06-16'),
(25, 9, 26, '2021-06-22'),
(26, 41, 27, '2021-06-22'),
(27, 42, 25, '2021-06-22'),
(28, 41, 29, '2021-06-22'),
(29, 41, 25, '2021-06-22'),
(30, 41, 26, '2021-06-22'),
(31, 41, 21, '2021-06-22'),
(32, 41, 28, '2021-06-22'),
(33, 41, 20, '2021-06-22'),
(34, 41, 22, '2021-06-22'),
(35, 43, 23, '2021-06-22'),
(36, 43, 29, '2021-06-22'),
(37, 44, 3, '2021-06-29'),
(38, 44, 8, '2021-06-29'),
(39, 28, 29, '2021-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `feedback` blob NOT NULL,
  `entry_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedback`, `entry_time`) VALUES
(1, 3, 0x486a6a, '2020-06-19'),
(2, 21, 0x54657374, '2020-06-25'),
(3, 13, 0x2373756368206120676f6f6420736572766963655f5468616e6b20796f75, '2020-07-03'),
(4, 21, 0x48686a6a, '2020-07-03'),
(5, 41, 0x6b736b736b73, '2021-06-19'),
(6, 41, 0x646562656e647261, '2021-06-21'),
(7, 41, 0x62736e736e77, '2021-06-21'),
(8, 41, 0x686a, '2021-06-21'),
(9, 41, 0x62667268, '2021-06-21'),
(10, 41, 0x68776865686865, '2021-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `my_website`
--

CREATE TABLE `my_website` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT 'My Website',
  `name` varchar(200) NOT NULL DEFAULT 'My Website',
  `admin_panel_name` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL DEFAULT 'logo.jpg',
  `description` varchar(600) NOT NULL DEFAULT 'My website Lorem Ipsom Dolar Sit Amet',
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_website`
--

INSERT INTO `my_website` (`id`, `title`, `name`, `admin_panel_name`, `logo`, `description`, `update_date`) VALUES
(1, 'Welcome to ::News Portal', 'News Portal', 'News Portal | Admin panel', 'logo.png', 'My website Lorem Ipsom Dolar Sit Amet', '2018-09-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_test`
--

CREATE TABLE `pathology_test` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `test_info` varchar(200) NOT NULL,
  `report` varchar(200) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pathology_test`
--

INSERT INTO `pathology_test` (`id`, `name`, `test_info`, `report`, `price`) VALUES
(1, 'C-PEPTIDE FASTING, SERUM', 'Overnight fasting is mandatory.', 'Daily', 1050),
(2, 'URINE GLUCOSE', 'First morning urine sample preferred.', 'Daily', 80),
(3, 'INSULIN FASTING', 'Overnight fasting is mandatory.', 'Daily', 800),
(4, 'DIABETES PANEL BASIC', 'Special preparation as per glucose sample selected.', 'Daily', 480);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `caption` varchar(200) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `slider_order` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `type`, `parent_id`, `caption`, `title`, `image`, `link`, `status`, `slider_order`) VALUES
(1, 0, 1, 'banner', 'banner1', '1596446877.png', 'http://wayindia.net/', 1, 10),
(2, 0, 1, 'banner2', 'banner2', '1596446912.png', 'http://wayindia.net/', 1, 9),
(3, 0, 1, 'banner3', 'banner3', '1596446932.png', 'http://wayindia.net', 1, 10),
(8, 0, 1, 'Cure EZ', 'Tele Clinic', '1622526887.png', '#', 1, 5),
(12, 0, 1, 'wayindia', 'dev', '1622720784.png', '#', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `temp_appointment_booking`
--

CREATE TABLE `temp_appointment_booking` (
  `id` int(11) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `p_time` varchar(200) NOT NULL,
  `booking_date` varchar(200) NOT NULL,
  `v_type` varchar(200) NOT NULL,
  `time_slot` blob NOT NULL,
  `duration` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `discount` int(100) NOT NULL DEFAULT 0,
  `tax` int(100) NOT NULL DEFAULT 0,
  `internet_charge` int(100) NOT NULL DEFAULT 0,
  `final_price` int(100) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `prescription` varchar(300) NOT NULL,
  `order_id` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_appointment_booking`
--

INSERT INTO `temp_appointment_booking` (`id`, `doctor_id`, `user_id`, `p_time`, `booking_date`, `v_type`, `time_slot`, `duration`, `amount`, `discount`, `tax`, `internet_charge`, `final_price`, `status`, `prescription`, `order_id`) VALUES
(71, 7, 11, '01:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, 'user_prescription_60bdc78022f62.png', ''),
(70, 22, 11, '12:30 PM', '2021-06-07', 'audio', 0x613a333a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b693a323b733a383a2230313a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60bdbdf6ddc7e.png', ''),
(69, 8, 11, '11:00 AM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 400, 0, 0, 0, 400, 0, '', ''),
(68, 9, 28, '04:30 PM', '2021-06-06', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 15, 300, 0, 0, 0, 300, 0, '', ''),
(67, 22, 11, '12:30 PM', '2021-06-05', 'audio', 0x613a333a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b693a323b733a383a2230313a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60bb1b2ee850e.png', ''),
(66, 7, 29, '12:30 PM', '2021-06-10', 'audio', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(65, 2, 11, '06:30 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230363a333020706d223b693a313b733a383a2230373a303020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(64, 21, 11, '10:00 AM', '2021-06-05', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 15, 0, 0, 0, 0, 0, 0, '', ''),
(63, 20, 11, '01:00 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b693a323b733a383a2230323a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9d62302290.png', ''),
(62, 22, 11, '06:00 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b693a323b733a383a2230373a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9d51c86d44.png', ''),
(61, 6, 11, '03:00 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, 'user_prescription_60b9d4e8e82bb.png', ''),
(60, 4, 11, '01:00 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, 'user_prescription_60b9d4accd8e5.png', ''),
(59, 22, 11, '05:00 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b693a323b733a383a2230363a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9d457b29da.png', ''),
(16, 8, 9, '12:00 PM', '2021-06-03', 'audio', 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(17, 4, 9, '10:30 AM', '2021-06-03', 'audio', 0x613a323a7b693a303b733a383a2231303a333020616d223b693a313b733a383a2231313a303020616d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(18, 8, 9, '12:30 PM', '2021-06-03', 'audio', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(58, 22, 11, '04:00 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b693a323b733a383a2230353a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9d423a48f6.png', ''),
(57, 22, 11, '02:00 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b693a323b733a383a2230333a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9d41057a69.png', ''),
(56, 22, 11, '02:30 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b693a323b733a383a2230333a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c7975d340.png', ''),
(55, 22, 11, '01:00 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b693a323b733a383a2230323a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c77bec0ab.png', ''),
(54, 22, 11, '12:00 PM', '2021-06-04', 'audio', 0x613a333a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b693a323b733a383a2230313a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c765629d3.png', ''),
(53, 21, 11, '05:00 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c600e572f.png', ''),
(52, 21, 11, '04:30 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c5f2838ec.png', ''),
(51, 21, 11, '04:00 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c5e2373b7.png', ''),
(50, 21, 11, '03:30 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230333a333020706d223b693a313b733a383a2230343a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c1bfed042.png', ''),
(49, 21, 11, '03:00 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c1af01d64.png', ''),
(48, 21, 11, '02:30 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c18e9dd85.png', ''),
(47, 21, 11, '02:00 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c18064050.png', ''),
(32, 21, 30, '04:00 PM', '2021-06-03', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', ''),
(33, 20, 30, '04:30 PM', '2021-06-03', 'audio', 0x613a333a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b693a323b733a383a2230353a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, '', ''),
(34, 20, 9, '04:00 PM', '2021-06-03', 'audio', 0x613a333a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b693a323b733a383a2230353a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, '', ''),
(35, 6, 9, '04:00 PM', '2021-06-03', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(36, 8, 9, '04:00 PM', '2021-06-03', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(38, 5, 30, '05:00 PM', '2021-06-03', 'video', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', ''),
(46, 21, 11, '12:00 PM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c16a07387.png', ''),
(45, 21, 11, '11:30 AM', '2021-06-04', 'audio', 0x613a323a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60b9c159abf6c.png', ''),
(44, 22, 11, '09:00 AM', '2021-06-04', 'video', 0x613a333a7b693a303b733a383a2230393a303020616d223b693a313b733a383a2230393a333020616d223b693a323b733a383a2231303a303020616d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b8b55f1e1d7.png', ''),
(43, 22, 11, '04:30 PM', '2021-06-03', 'audio', 0x613a333a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b693a323b733a383a2230353a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60b8b4badb6a4.png', ''),
(72, 22, 31, '02:00 PM', '2021-06-07', 'audio', 0x613a333a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b693a323b733a383a2230333a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60bdccad17496.png', ''),
(73, 4, 31, '02:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, 'user_prescription_60bdce61ede92.png', ''),
(74, 2, 27, '08:00 PM', '2021-06-06', 'audio', 0x613a323a7b693a303b733a383a2230383a303020706d223b693a313b733a383a2230383a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, '', '0607215656'),
(75, 21, 31, '03:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60bde27a3bde7.png', '0607212112'),
(76, 4, 31, '03:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, 'user_prescription_60bde2ff30fbe.png', '0607216135'),
(77, 6, 31, '03:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, 'user_prescription_60bde38f3de85.png', '0607213564'),
(78, 22, 31, '03:00 PM', '2021-06-07', 'audio', 0x613a333a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b693a323b733a383a2230343a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60bde39e69615.png', '0607218083'),
(79, 8, 31, '03:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 400, 0, 0, 0, 400, 0, 'user_prescription_60bde3ad4ef1f.png', '0607214254'),
(80, 6, 31, '03:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 300, 0, 0, 0, 300, 0, 'user_prescription_60bde4f39c807.png', '0607216579'),
(81, 21, 32, '04:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0607214762'),
(82, 22, 32, '04:30 PM', '2021-06-07', 'audio', 0x613a333a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b693a323b733a383a2230353a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, '', '0607212131'),
(83, 8, 32, '04:30 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 400, 0, 0, 0, 400, 0, '', '0607213067'),
(84, 9, 32, '04:30 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 15, 300, 0, 0, 0, 300, 0, '', '0607214588'),
(85, 21, 32, '04:30 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0607214224'),
(86, 21, 32, '04:30 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0607213338'),
(87, 21, 32, '04:30 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0607219359'),
(88, 21, 32, '05:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0607212940'),
(89, 8, 32, '05:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 400, 0, 0, 0, 400, 0, '', '0607213206'),
(90, 8, 32, '05:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 400, 0, 0, 0, 400, 0, '', '0607212289'),
(91, 8, 32, '05:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 3, 0, 0, 0, 3, 0, '', '0607212171'),
(92, 8, 32, '05:30 PM', '2021-06-07', 'video', 0x613a323a7b693a303b733a383a2230353a333020706d223b693a313b733a383a2230363a303020706d223b7d, 30, 2, 0, 0, 0, 2, 0, '', '0607212459'),
(93, 21, 28, '11:30 AM', '2021-06-10', 'audio', 0x613a323a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60be0080dd4c2.png', '0607214831'),
(94, 8, 9, '05:30 PM', '2021-06-07', 'video', 0x613a323a7b693a303b733a383a2230353a333020706d223b693a313b733a383a2230363a303020706d223b7d, 30, 2, 0, 0, 0, 2, 0, '', '0607213328'),
(95, 8, 9, '06:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0607218013'),
(96, 8, 9, '06:00 PM', '2021-06-07', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0607211011'),
(97, 21, 28, '02:00 PM', '2021-06-08', 'video', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60be129bc00bb.png', '0607216965'),
(98, 21, 28, '02:30 PM', '2021-06-10', 'video', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60be150fdd2fd.png', '0607212073'),
(99, 21, 28, '10:00 AM', '2021-06-08', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60be16410575f.png', '0607213450'),
(100, 24, 35, '11:07 AM', '2021-06-08', 'audio', 0x613a323a7b693a303b733a383a2231313a303720616d223b693a313b733a383a2231313a333720616d223b7d, 30, 50, 0, 0, 0, 50, 0, 'user_prescription_60befe693b00e.png', '0608218765'),
(101, 24, 35, '01:07 PM', '2021-06-09', 'audio', 0x613a323a7b693a303b733a383a2230313a303720706d223b693a313b733a383a2230313a333720706d223b7d, 30, 50, 0, 0, 0, 50, 0, 'user_prescription_60c06bebc8c2a.png', '0609218288'),
(102, 24, 35, '01:07 PM', '2021-06-09', 'audio', 0x613a323a7b693a303b733a383a2230313a303720706d223b693a313b733a383a2230313a333720706d223b7d, 30, 50, 0, 0, 0, 50, 0, 'user_prescription_60c06e6802b38.png', '0609214495'),
(103, 8, 9, '02:30 PM', '2021-06-09', 'audio', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0609215463'),
(104, 24, 35, '01:37 PM', '2021-06-09', 'audio', 0x613a323a7b693a303b733a383a2230313a333720706d223b693a313b733a383a2230323a303720706d223b7d, 30, 50, 0, 0, 0, 50, 0, 'user_prescription_60c07189edd66.png', '0609216867'),
(105, 24, 35, '02:07 PM', '2021-06-09', 'audio', 0x613a323a7b693a303b733a383a2230323a303720706d223b693a313b733a383a2230323a333720706d223b7d, 30, 50, 0, 0, 0, 50, 0, 'user_prescription_60c07386d517f.png', '0609216195'),
(106, 8, 9, '03:00 PM', '2021-06-09', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0609218356'),
(107, 23, 9, '02:30 PM', '2021-06-09', 'audio', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0609218536'),
(108, 20, 9, '02:00 PM', '2021-06-09', 'audio', 0x613a333a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b693a323b733a383a2230333a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, '', '0609214092'),
(109, 20, 9, '02:30 PM', '2021-06-09', 'audio', 0x613a333a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b693a323b733a383a2230333a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, '', '0609215271'),
(110, 23, 9, '01:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611219183'),
(111, 23, 9, '05:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611214026'),
(112, 21, 9, '05:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0611213017'),
(113, 6, 9, '04:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 100, 0, 0, 0, 100, 0, '', '0611213309'),
(114, 23, 9, '03:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611213382'),
(115, 21, 9, '05:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0611216308'),
(116, 21, 9, '04:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, '', '0611213106'),
(117, 4, 9, '04:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 100, 0, 0, 0, 100, 0, '', '0611211632'),
(118, 23, 36, '10:00 AM', '2021-06-18', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c337d49a3f7.png', '0611215989'),
(119, 23, 36, '12:30 PM', '2021-06-15', 'audio', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c338bacae2c.png', '0611214798'),
(120, 23, 36, '12:30 PM', '2021-06-15', 'audio', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c3399708fa3.png', '0611218598'),
(121, 23, 11, '04:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c339e830e91.png', '0611216508'),
(122, 23, 11, '04:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c33a1239fc2.png', '0611219426'),
(123, 23, 11, '04:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c33a6a77bbe.png', '0611212380'),
(124, 23, 36, '12:30 PM', '2021-06-16', 'physical', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 3, 0, 0, 0, 3, 0, 'user_prescription_60c33d36cefbe.png', '0611219121'),
(125, 23, 9, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611217956'),
(126, 23, 9, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611211000'),
(127, 23, 9, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611219073'),
(128, 2, 11, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c341a67f49a.png', '0611215998'),
(129, 23, 9, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611215769'),
(130, 23, 9, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611218025'),
(131, 23, 9, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611212541'),
(132, 2, 11, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c3427d17bfb.png', '0611215869'),
(133, 23, 9, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611217225'),
(134, 2, 11, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c34380e1424.png', '0611213119'),
(135, 2, 11, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c34394d3703.png', '0611218440'),
(136, 2, 11, '04:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c343bb80b61.png', '0611216798'),
(137, 22, 11, '05:00 PM', '2021-06-11', 'audio', 0x613a333a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b693a323b733a383a2230363a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c34404d775e.png', '0611215922'),
(138, 22, 11, '05:00 PM', '2021-06-11', 'audio', 0x613a333a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b693a323b733a383a2230363a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c3443bab292.png', '0611219122'),
(139, 23, 11, '05:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c3446fedb5e.png', '0611211392'),
(140, 23, 11, '05:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611217941'),
(141, 8, 9, '05:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230353a333020706d223b693a313b733a383a2230363a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611219055'),
(142, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0611219766'),
(143, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34a604b605.png', '0611217240'),
(144, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34a7c6008d.png', '0611214734'),
(145, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34ad677929.png', '0611217970'),
(146, 8, 27, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34bdb214fc.png', '0611213621'),
(147, 22, 11, '05:30 PM', '2021-06-11', 'audio', 0x613a333a7b693a303b733a383a2230353a333020706d223b693a313b733a383a2230363a303020706d223b693a323b733a383a2230363a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c34d83817da.png', '0611218447'),
(148, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34e0976742.png', '0611215444'),
(149, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34e1c53275.png', '0611211774'),
(150, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34e381c5c2.png', '0611219288'),
(151, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34e5b15642.png', '0611215769'),
(152, 8, 9, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c34e6c79ea7.png', '0611216393'),
(153, 22, 11, '05:30 PM', '2021-06-11', 'audio', 0x613a333a7b693a303b733a383a2230353a333020706d223b693a313b733a383a2230363a303020706d223b693a323b733a383a2230363a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c35063276cb.png', '0611212965'),
(154, 22, 11, '05:30 PM', '2021-06-11', 'audio', 0x613a333a7b693a303b733a383a2230353a333020706d223b693a313b733a383a2230363a303020706d223b693a323b733a383a2230363a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c350816dbe2.png', '0611219345'),
(155, 8, 11, '06:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c350f32e75d.png', '0611216585'),
(156, 8, 11, '06:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230363a333020706d223b693a313b733a383a2230373a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c3528dd593b.png', '0611219493'),
(157, 8, 11, '07:00 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230373a303020706d223b693a313b733a383a2230373a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c3536c79e51.png', '0611219517'),
(158, 8, 11, '07:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230373a333020706d223b693a313b733a383a2230383a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c356d22e6d6.png', '0611213192'),
(159, 8, 11, '07:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230373a333020706d223b693a313b733a383a2230383a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c3578c410c5.png', '0611218708'),
(160, 8, 9, '07:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230373a333020706d223b693a313b733a383a2230383a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c35a2c6ddd4.png', '0611217122'),
(161, 8, 11, '07:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230373a333020706d223b693a313b733a383a2230383a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c35a40dcde3.png', '0611215356'),
(162, 8, 11, '07:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230373a333020706d223b693a313b733a383a2230383a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c35a75610e1.png', '0611211925'),
(163, 8, 11, '07:30 PM', '2021-06-11', 'audio', 0x613a323a7b693a303b733a383a2230373a333020706d223b693a313b733a383a2230383a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c35b03c233f.png', '0611211252'),
(164, 22, 11, '07:00 PM', '2021-06-11', 'audio', 0x613a333a7b693a303b733a383a2230373a303020706d223b693a313b733a383a2230373a333020706d223b693a323b733a383a2230383a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c360babad98.png', '0611215725'),
(165, 2, 11, '10:00 AM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 100, 0, 0, 0, 100, 0, '', '0612213767'),
(166, 23, 11, '10:00 AM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c41f99a8160.png', '0612212536'),
(167, 23, 11, '10:00 AM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c41fdd782be.png', '0612218426'),
(168, 6, 11, '10:00 AM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c4210c85ff0.png', '0612217230'),
(169, 6, 11, '10:00 AM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c4211a562eb.png', '0612219171'),
(170, 8, 11, '11:00 AM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c4213343255.png', '0612214983'),
(171, 2, 11, '10:00 AM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c4231235468.png', '0612219915'),
(172, 8, 11, '12:00 PM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0612215751'),
(173, 8, 11, '12:30 PM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c4518ac4ff2.png', '0612215033'),
(174, 8, 11, '01:00 PM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c451e7c0e81.png', '0612219566'),
(175, 8, 11, '02:30 PM', '2021-06-12', 'audio', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c4523a4ba8b.png', '0612213248'),
(176, 6, 28, '03:30 PM', '2021-06-19', 'video', 0x613a323a7b693a303b733a383a2230333a333020706d223b693a313b733a383a2230343a303020706d223b7d, 30, 200, 0, 0, 0, 200, 0, '', '0612213277'),
(177, 6, 28, '04:00 PM', '2021-06-19', 'video', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 200, 0, 0, 0, 200, 0, '', '0612216789'),
(178, 26, 28, '06:00 PM', '2021-06-17', 'video', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 15, 250, 0, 0, 0, 250, 0, '', '0612214252'),
(179, 26, 28, '01:00 PM', '2021-06-14', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 15, 200, 0, 0, 0, 200, 0, '', '0612213251'),
(180, 26, 28, '04:00 PM', '2021-06-14', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 15, 200, 0, 0, 0, 200, 0, 'user_prescription_60c46649290fe.png', '0612212157'),
(181, 26, 28, '04:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 15, 200, 0, 0, 0, 200, 0, 'user_prescription_60c466e410e5f.png', '0612213381'),
(182, 21, 28, '05:00 PM', '2021-06-12', 'video', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 15, 0, 0, 0, 0, 0, 0, 'user_prescription_60c49ac1ac8f6.png', '0612216077'),
(183, 21, 28, '10:00 AM', '2021-06-13', 'video', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c49b16ac720.png', '0612216190'),
(184, 21, 28, '11:00 AM', '2021-06-14', 'physical', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c4ad3c9dcfe.png', '0612212972'),
(185, 22, 27, '11:30 AM', '2021-06-13', 'audio', 0x613a333a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b693a323b733a383a2231323a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c59c441e22b.png', '0613216433'),
(186, 23, 36, '05:00 PM', '2021-06-15', 'physical', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 3, 0, 0, 0, 3, 0, 'user_prescription_60c5a26193efb.png', '0613216613'),
(187, 21, 28, '12:00 PM', '2021-06-14', 'video', 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c6e68d90529.png', '0614212608'),
(188, 22, 28, '01:00 PM', '2021-06-14', 'video', 0x613a333a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b693a323b733a383a2230323a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c6e72be3a7a.png', '0614213786'),
(189, 22, 28, '12:00 PM', '2021-06-14', 'video', 0x613a333a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b693a323b733a383a2230313a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c6e7629e550.png', '0614211984'),
(190, 22, 28, '02:30 PM', '2021-06-14', 'video', 0x613a333a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b693a323b733a383a2230333a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c6e78db5d81.png', '0614216574'),
(191, 21, 28, '03:00 PM', '2021-06-14', 'video', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c6ede57b248.png', '0614216318'),
(192, 23, 11, '02:00 PM', '2021-06-14', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c713896ec4f.png', '0614217861'),
(193, 23, 11, '02:30 PM', '2021-06-14', 'audio', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c713fa75691.png', '0614215273'),
(194, 22, 11, '06:00 PM', '2021-06-14', 'audio', 0x613a333a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b693a323b733a383a2230373a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c74521f2a01.png', '0614219331'),
(195, 4, 11, '06:00 PM', '2021-06-14', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60c7453c6a9d1.png', '0614219881'),
(196, 8, 11, '11:00 AM', '2021-06-15', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c82d3c21c33.png', '0615211540'),
(197, 8, 11, '06:30 PM', '2021-06-15', 'audio', 0x613a323a7b693a303b733a383a2230363a333020706d223b693a313b733a383a2230373a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c8a10f8b4cc.png', '0615212255'),
(198, 21, 28, '10:00 AM', '2021-06-16', 'video', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c8dd708d2ed.png', '0615213583'),
(199, 21, 28, '10:30 AM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231303a333020616d223b693a313b733a383a2231313a303020616d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c8e04fc82e0.png', '0615214655'),
(200, 20, 11, '10:30 AM', '2021-06-16', 'audio', 0x613a333a7b693a303b733a383a2231303a333020616d223b693a313b733a383a2231313a303020616d223b693a323b733a383a2231313a333020616d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c984912416b.png', '0616215868'),
(201, 8, 11, '11:00 AM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c984b5f3895.png', '0616212636'),
(202, 22, 11, '10:30 AM', '2021-06-16', 'audio', 0x613a333a7b693a303b733a383a2231303a333020616d223b693a313b733a383a2231313a303020616d223b693a323b733a383a2231313a333020616d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c9855e924c1.png', '0616212990'),
(203, 8, 9, '11:00 AM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616215166'),
(204, 20, 11, '11:00 AM', '2021-06-16', 'audio', 0x613a333a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b693a323b733a383a2231323a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c98796dd6a0.png', '0616214935'),
(205, 20, 11, '11:30 AM', '2021-06-16', 'audio', 0x613a333a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b693a323b733a383a2231323a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, 'user_prescription_60c987bd47447.png', '0616216543'),
(206, 6, 36, '11:00 AM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 100, 0, 0, 0, 100, 0, '', '0616211551'),
(207, 23, 36, '01:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616219122'),
(208, 23, 9, '01:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616218630'),
(209, 6, 36, '12:30 PM', '2021-06-16', 'video', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 200, 0, 0, 0, 200, 0, '', '0616217479'),
(210, 6, 36, '12:30 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 30, 100, 0, 0, 0, 100, 0, '', '0616215821'),
(211, 25, 11, '02:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 200, 0, 0, 0, 200, 0, 'user_prescription_60c989c6260af.png', '0616214263'),
(212, 21, 28, '11:00 AM', '2021-06-16', 'video', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c989ef9c2f5.png', '0616212871'),
(213, 21, 28, '11:30 AM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c98af75b9b3.png', '0616213502'),
(214, 23, 11, '02:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c98b44d18e5.png', '0616218892'),
(215, 23, 11, '12:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c98c419d720.png', '0616218774'),
(216, 8, 11, '11:30 AM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c98c9e1e1c2.png', '0616213114'),
(217, 23, 9, '02:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616215779'),
(218, 21, 11, '02:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c99c0c52a79.png', '0616212377'),
(219, 8, 11, '01:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9a1c466760.png', '0616216953'),
(220, 8, 11, '01:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9a261a0590.png', '0616216089'),
(221, 8, 11, '01:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230313a303020706d223b693a313b733a383a2230313a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9a8879be9b.png', '0616212945'),
(222, 9, 11, '02:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 100, 0, 0, 0, 100, 0, 'user_prescription_60c9a94a181e9.png', '0616212991'),
(223, 21, 11, '02:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9a9a679952.png', '0616214038'),
(224, 8, 11, '02:30 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9ab7e32c4d.png', '0616219847'),
(225, 8, 11, '02:30 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230323a333020706d223b693a313b733a383a2230333a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9abef8ff59.png', '0616211813'),
(226, 23, 36, '02:00 PM', '2021-06-16', 'physical', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 30, 3, 0, 0, 0, 3, 0, '', '0616212387'),
(227, 23, 37, '10:00 AM', '2021-06-19', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616218896'),
(228, 23, 37, '04:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616212412'),
(229, 22, 37, '04:00 PM', '2021-06-16', 'audio', 0x613a333a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b693a323b733a383a2230353a303020706d223b7d, 45, 0, 0, 0, 0, 0, 0, '', '0616213640'),
(230, 8, 37, '04:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616212805'),
(231, 22, 38, '04:30 PM', '2021-06-16', 'audio', 0x613a333a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b693a323b733a383a2230353a333020706d223b7d, 45, 0, 0, 0, 0, 0, 0, '', '0616216974'),
(232, 8, 38, '04:30 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616211596'),
(233, 23, 39, '04:30 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616215234'),
(234, 23, 40, '05:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616215937'),
(235, 8, 40, '06:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230363a303020706d223b693a313b733a383a2230363a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9e85c97763.png', '0616211646'),
(236, 8, 40, '06:30 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230363a333020706d223b693a313b733a383a2230373a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60c9e8e931c69.png', '0616218999'),
(237, 8, 40, '07:00 PM', '2021-06-16', 'audio', 0x613a323a7b693a303b733a383a2230373a303020706d223b693a313b733a383a2230373a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616219009'),
(238, 8, 41, '11:00 AM', '2021-06-17', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616215316'),
(239, 23, 41, '10:00 AM', '2021-06-17', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0616212763'),
(240, 21, 28, '10:00 AM', '2021-06-18', 'video', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 15, 1, 0, 0, 0, 1, 0, '', '0617219384'),
(241, 21, 28, '02:00 PM', '2021-06-18', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 1, 0, 0, 0, 1, 0, '', '0618213568'),
(242, 21, 28, '02:00 PM', '2021-06-18', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 1, 0, 0, 0, 1, 0, '', '0618211913'),
(243, 21, 28, '02:00 PM', '2021-06-18', 'audio', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 1, 0, 0, 0, 1, 0, '', '0618219966'),
(244, 21, 28, '10:00 AM', '2021-06-19', 'audio', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 15, 1, 0, 0, 0, 1, 0, '', '0618212753'),
(245, 8, 9, '03:00 PM', '2021-06-18', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60cc6505114ae.png', '0618211796'),
(246, 8, 41, '04:30 PM', '2021-06-18', 'audio', 0x613a323a7b693a303b733a383a2230343a333020706d223b693a313b733a383a2230353a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60cc7c93616c0.png', '0618215998'),
(247, 8, 41, '11:00 AM', '2021-06-21', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60d02089ba5f4.png', '0621215991'),
(248, 8, 41, '11:00 AM', '2021-06-21', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60d0209584c54.png', '0621214513'),
(249, 8, 41, '11:30 AM', '2021-06-21', 'audio', 0x613a323a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0621211770'),
(250, 8, 41, '12:00 PM', '2021-06-21', 'audio', 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60d028ec3fd9b.png', '0621212524'),
(251, 8, 41, '11:00 AM', '2021-06-22', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0621216452'),
(252, 8, 41, '11:00 AM', '2021-06-22', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0621218478'),
(253, 8, 41, '04:00 PM', '2021-06-21', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60d069edb9b1d.png', '0621219550'),
(254, 8, 41, '11:30 AM', '2021-06-22', 'audio', 0x613a323a7b693a303b733a383a2231313a333020616d223b693a313b733a383a2231323a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60d06a385882c.png', '0621219475'),
(255, 26, 28, '05:00 PM', '2021-06-21', 'video', 0x613a323a7b693a303b733a383a2230353a303020706d223b693a313b733a383a2230353a333020706d223b7d, 15, 250, 0, 0, 0, 250, 0, 'user_prescription_60d075c69ea7b.png', '0621218713'),
(256, 27, 41, '12:01 PM', '2021-06-22', 'audio', 0x613a333a7b693a303b733a383a2231323a303120706d223b693a313b733a383a2231323a333120706d223b693a323b733a383a2230313a303120706d223b7d, 45, 1, 0, 0, 0, 1, 0, 'user_prescription_60d17f380a4e2.png', '0622214053'),
(257, 26, 9, '12:30 PM', '2021-06-22', 'audio', 0x613a323a7b693a303b733a383a2231323a333020706d223b693a313b733a383a2230313a303020706d223b7d, 15, 200, 0, 0, 0, 200, 0, '', '0622214256'),
(258, 27, 9, '01:01 PM', '2021-06-22', 'audio', 0x613a333a7b693a303b733a383a2230313a303120706d223b693a313b733a383a2230313a333120706d223b693a323b733a383a2230323a303120706d223b7d, 45, 1, 0, 0, 0, 1, 0, '', '0622215355'),
(259, 29, 42, '02:00 PM', '2021-06-22', 'video', 0x613a323a7b693a303b733a383a2230323a303020706d223b693a313b733a383a2230323a333020706d223b7d, 15, 250, 0, 0, 0, 250, 0, 'user_prescription_60d1933f46f70.png', '0622219010'),
(260, 25, 42, '03:00 PM', '2021-06-22', 'audio', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 15, 200, 0, 0, 0, 200, 0, '', '0622212296'),
(261, 27, 41, '05:01 PM', '2021-06-22', 'audio', 0x613a333a7b693a303b733a383a2230353a303120706d223b693a313b733a383a2230353a333120706d223b693a323b733a383a2230363a303120706d223b7d, 45, 1, 0, 0, 0, 1, 0, '', '0622218572'),
(262, 29, 28, '12:00 PM', '2021-06-24', 'audio', 0x613a323a7b693a303b733a383a2231323a303020706d223b693a313b733a383a2231323a333020706d223b7d, 15, 200, 0, 0, 0, 200, 0, 'user_prescription_60d4258be0792.png', '0624213783'),
(263, 23, 36, '03:00 PM', '2021-06-28', 'physical', 0x613a323a7b693a303b733a383a2230333a303020706d223b693a313b733a383a2230333a333020706d223b7d, 30, 3, 0, 0, 0, 3, 0, '', '0627213397'),
(264, 29, 28, '10:00 AM', '2021-06-29', 'video', 0x613a323a7b693a303b733a383a2231303a303020616d223b693a313b733a383a2231303a333020616d223b7d, 15, 250, 0, 0, 0, 250, 0, 'user_prescription_60da997a38c2d.png', '0629215578'),
(265, 23, 44, '04:00 PM', '2021-06-29', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60daf30f2a2a1.png', '0629214618'),
(266, 3, 44, '04:00 PM', '2021-06-29', 'audio', 0x613a323a7b693a303b733a383a2230343a303020706d223b693a313b733a383a2230343a333020706d223b7d, 30, 100, 0, 0, 0, 100, 0, 'user_prescription_60daf3764800d.png', '0629217522'),
(267, 25, 28, '07:03 PM', '2021-07-06', 'audio', 0x613a323a7b693a303b733a383a2230373a303320706d223b693a313b733a383a2230373a333320706d223b7d, 15, 200, 0, 0, 0, 200, 0, 'user_prescription_60e320ba72fa7.png', '0705212531'),
(268, 29, 28, '10:30 AM', '2021-07-06', 'video', 0x613a323a7b693a303b733a383a2231303a333020616d223b693a313b733a383a2231313a303020616d223b7d, 15, 250, 0, 0, 0, 250, 0, '', '0705219762'),
(269, 8, 44, '11:00 AM', '2021-07-14', 'audio', 0x613a323a7b693a303b733a383a2231313a303020616d223b693a313b733a383a2231313a333020616d223b7d, 30, 1, 0, 0, 0, 1, 0, 'user_prescription_60ee766586668.png', '0714212572'),
(270, 8, 44, '03:30 PM', '2021-07-16', 'audio', 0x613a323a7b693a303b733a383a2230333a333020706d223b693a313b733a383a2230343a303020706d223b7d, 30, 1, 0, 0, 0, 1, 0, '', '0716211267'),
(271, 21, 36, '03:30 PM', '2021-07-20', 'audio', 0x613a323a7b693a303b733a383a2230333a333020706d223b693a313b733a383a2230343a303020706d223b7d, 15, 1, 0, 0, 0, 1, 0, '', '0719219283');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', 'kqewwp;[\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\\][`1\r\n\r\n', '', 'info@wayindia.com', '', NULL, NULL, NULL, 1268889823, 1625912636, 1, 'CureEZ', 'Dr. Appointment ', '0', '9999999999');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(43, 1, 1),
(44, 1, 2),
(15, 2, 1),
(16, 2, 2),
(12, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_device_data`
--

CREATE TABLE `user_device_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` text NOT NULL,
  `device_token` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_device_data`
--

INSERT INTO `user_device_data` (`id`, `user_id`, `device_id`, `device_token`) VALUES
(1, 11, 'e7d825193b9e76b3', 'd7Q6FfKbRDWJCvkPukfEOR:APA91bEBafq-Pp7czW4qsEk6pdB7V4UVvKeIlajFL4jmCILo1jqq3v6qjRZYBqJiBItPkZk9zxBremJl6ik0VGKzmx8RCUVIA8tHAfBsM7bpTJJET_kScXXnzyESOyHT9wGtbReqhtzo'),
(2, 27, '1273da5dfda2b9e4', 'deItnU2tTrWEcNzhQJkc9i:APA91bHwnSNImVyVrBkumh0iioBNwEr7hbzBhUAfy99OXvBeOhTMNq9xnXMNufzxM4Hn71pvO2CsKZaSpkpUuQcNxRNaR_rNaADgbBxlY8QogNJqQP73ZTzK3RBFfrdQzOZdp5sE3UC6'),
(3, 9, 'ca2be6f11203c151', 'c-nV4N2ASfK17hlxyBKy9x:APA91bF-c6QFJM61QAS_vMW4L9gOECrVP3a9_ARJaKSjzrgbsyChyWiwoz2NtQi5jox0Dgw909LQQf8JBhnonNonxPLUpB36I3pltUTN5rMEw1q-vAcGu4PQzwODdS15wbGBDHQRrH0r'),
(4, 28, 'e59c709e89cb4ad1', 'ciGEEdUDRwOAVd0kvueCGG:APA91bE2291EQ8a-x83ZTuHtQaCA4hZl9yWmqtO6z-ltwXwaPRA09lL0GyxzsOS0iw5_NxKnJxxsWKNRmjGjpipDJhBfewb2EwPJBxi6Wc0ucHYncfxPiYu4voSBJoDIzejCcfdxwJuR'),
(5, 29, '4a930dd70251528f', 'dCQJOJ_0Spuhlm0hxcqRAR:APA91bH5rAgmmL6VYmVmhvIOMNZ8hYc7VqzQoa1TmYvb75COC3XuWNIvjgHa2dSugAqgu-fyA97HfB47tU75lILWc1xVzD0ez2_i51vnAWl7DoKC9AZiuqzEV5nS_aC_UIZmyA_kl2ij'),
(6, 30, '93200c7fab403066', 'eEuXJL5GQ32nRRP3LbgPMF:APA91bEoGk38ubyRxQzzGeed2fnnqtskHehsVDtYLPmxQL9ejWaMu6V9QDnXjdrZ-EK7O3_Tb2r-8aNWdQMtPiewQtD4od6RvVyTdnLbWhR7b5C5o-3AIRp-RVpDkWhKnYcpuDlbnXqN'),
(7, 31, 'e7d825193b9e76b3', 'dhlwLMbvTM-YWPQbiAo6zh:APA91bGTUTdrWeglaj1rFOdkhPFxj0sUx_FBg6SQgZ2VmhC8iXAcNBcMIJpAgJuXPpktWKFa4arrO0EqjT69GPSanZbR1L7_x6fEmqoRi26UEl-7TIZ1corMaCcD5nTCRrcykx01VYFX'),
(8, 32, 'e7d825193b9e76b3', 'dhlwLMbvTM-YWPQbiAo6zh:APA91bGTUTdrWeglaj1rFOdkhPFxj0sUx_FBg6SQgZ2VmhC8iXAcNBcMIJpAgJuXPpktWKFa4arrO0EqjT69GPSanZbR1L7_x6fEmqoRi26UEl-7TIZ1corMaCcD5nTCRrcykx01VYFX'),
(9, 33, 'e7d825193b9e76b3', 'dhlwLMbvTM-YWPQbiAo6zh:APA91bGTUTdrWeglaj1rFOdkhPFxj0sUx_FBg6SQgZ2VmhC8iXAcNBcMIJpAgJuXPpktWKFa4arrO0EqjT69GPSanZbR1L7_x6fEmqoRi26UEl-7TIZ1corMaCcD5nTCRrcykx01VYFX'),
(10, 34, 'e7d825193b9e76b3', 'dhlwLMbvTM-YWPQbiAo6zh:APA91bGTUTdrWeglaj1rFOdkhPFxj0sUx_FBg6SQgZ2VmhC8iXAcNBcMIJpAgJuXPpktWKFa4arrO0EqjT69GPSanZbR1L7_x6fEmqoRi26UEl-7TIZ1corMaCcD5nTCRrcykx01VYFX'),
(11, 35, '57a18a76b0a8730d', 'dNVgSqQgSraPIV-IsZfQy2:APA91bEgHwMo5qpW097AvT3nsNnNhjtbQ831ExcfMGGaIWAB-MWL1-eL5GpSQGt17hZE_9zkdRFC8amMqixxxqI687Hc-W_9uOnz-e1VWksRLY3-raUvJ6vzsVNk9uFnw58acqRLKfQY'),
(12, 36, 'ffc39b6774798212', 'dX9obrRYStKdg80mIyT32v:APA91bFnEFCcRNOKn1dTjiM-QSL2KVCetAXhv1Lc_e-3wkT_e0Bj6EmkLuCiZUDE0590FhbLNOZEY1iSJSXDFhUT-jtt9mwXuOsorAL_RZFcRtqlcBt_fL6lKtvGogGpPwJ6iI0uwgWV'),
(13, 37, 'e7d825193b9e76b3', 'd7Q6FfKbRDWJCvkPukfEOR:APA91bEBafq-Pp7czW4qsEk6pdB7V4UVvKeIlajFL4jmCILo1jqq3v6qjRZYBqJiBItPkZk9zxBremJl6ik0VGKzmx8RCUVIA8tHAfBsM7bpTJJET_kScXXnzyESOyHT9wGtbReqhtzo'),
(14, 38, 'e7d825193b9e76b3', 'd7Q6FfKbRDWJCvkPukfEOR:APA91bEBafq-Pp7czW4qsEk6pdB7V4UVvKeIlajFL4jmCILo1jqq3v6qjRZYBqJiBItPkZk9zxBremJl6ik0VGKzmx8RCUVIA8tHAfBsM7bpTJJET_kScXXnzyESOyHT9wGtbReqhtzo'),
(15, 39, 'e7d825193b9e76b3', 'd7Q6FfKbRDWJCvkPukfEOR:APA91bEBafq-Pp7czW4qsEk6pdB7V4UVvKeIlajFL4jmCILo1jqq3v6qjRZYBqJiBItPkZk9zxBremJl6ik0VGKzmx8RCUVIA8tHAfBsM7bpTJJET_kScXXnzyESOyHT9wGtbReqhtzo'),
(16, 40, 'e7d825193b9e76b3', 'd7Q6FfKbRDWJCvkPukfEOR:APA91bEBafq-Pp7czW4qsEk6pdB7V4UVvKeIlajFL4jmCILo1jqq3v6qjRZYBqJiBItPkZk9zxBremJl6ik0VGKzmx8RCUVIA8tHAfBsM7bpTJJET_kScXXnzyESOyHT9wGtbReqhtzo'),
(17, 41, 'e7d825193b9e76b3', 'd7Q6FfKbRDWJCvkPukfEOR:APA91bEBafq-Pp7czW4qsEk6pdB7V4UVvKeIlajFL4jmCILo1jqq3v6qjRZYBqJiBItPkZk9zxBremJl6ik0VGKzmx8RCUVIA8tHAfBsM7bpTJJET_kScXXnzyESOyHT9wGtbReqhtzo'),
(18, 42, 'e59c709e89cb4ad1', 'ciGEEdUDRwOAVd0kvueCGG:APA91bE2291EQ8a-x83ZTuHtQaCA4hZl9yWmqtO6z-ltwXwaPRA09lL0GyxzsOS0iw5_NxKnJxxsWKNRmjGjpipDJhBfewb2EwPJBxi6Wc0ucHYncfxPiYu4voSBJoDIzejCcfdxwJuR'),
(19, 43, 'e7d825193b9e76b3', 'd7Q6FfKbRDWJCvkPukfEOR:APA91bEBafq-Pp7czW4qsEk6pdB7V4UVvKeIlajFL4jmCILo1jqq3v6qjRZYBqJiBItPkZk9zxBremJl6ik0VGKzmx8RCUVIA8tHAfBsM7bpTJJET_kScXXnzyESOyHT9wGtbReqhtzo'),
(20, 44, '5c59020f5555ba1c', 'dljlRdHST5uMvCLxbOZtdo:APA91bGf6V3nfn9o7ze-AaW2WwG5C0nqwHKS-tfEZHtbnggjyCbIGR8v5mk6Zna2fQr-DlX0sZeGSEe8CxjQalsSX2F12Ur0QUVDEnUg-pDXXXYYLSE0GWZ8Wkc6S-nMxT8ypvJl-O3-');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `entry_date` varchar(100) NOT NULL,
  `entry_time` varchar(200) NOT NULL,
  `entry_month` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `type`, `name`, `profile_pic`, `email`, `mobile`, `status`, `entry_date`, `entry_time`, `entry_month`) VALUES
(9, 0, 'arvind', '1622617557.png', 'Aurobindon408@gmail.com', '7205706237', 0, '2020-07-21', 'Jul', '08:01 pm'),
(11, 0, 'Debendra', '1622634682.png', 'debendrajena3@gmail.com', '7064073602', 0, '2020-07-24', 'Jul', '02:54 pm'),
(27, 0, 'Dev Datta', '1622535705.png', 'sysorissa@gmail.com', '9861340479', 0, '2021-05-31', 'May', '06:29 pm'),
(28, 0, 'Arun Kumar Singh Bangalore india', '1624516272.png', 'aksingh.email@gmail.com', '9845197656', 0, '2021-06-03', 'Jun', '10:35 am'),
(29, 0, 'PS', NULL, 'pre2singh@gmail.com', '8861646266', 0, '2021-06-03', 'Jun', '11:34 am'),
(30, 0, 'itishree debasmita', NULL, 'itishree.wayindia@gmail.com', '9778845679', 0, '2021-06-03', 'Jun', '03:30 pm'),
(37, 0, 'Mahesh', NULL, 'mahesh@gmail.com', '2222222222', 0, '2021-06-16', 'Jun', '03:32 pm'),
(31, 0, 'Debendra', NULL, 'debendrajena@gmail.com', '7064073608', 0, '2021-06-07', 'Jun', '12:57 pm'),
(32, 0, 'Rajesh', NULL, 'Rajesh@gmail.com', '3333333333', 0, '2021-06-07', 'Jun', '03:35 pm'),
(33, 0, 'Mukesh', NULL, 'mukesh@gmail.com', '3333333332', 0, '2021-06-07', 'Jun', '06:02 pm'),
(34, 0, 'mukesh', NULL, 'dnsjej@gmail.com', '4664644646', 0, '2021-06-07', 'Jun', '06:04 pm'),
(35, 0, 'Rohit Kumar', '1623129864.png', 'rohitkumr108@gmail.com', '8904853490', 0, '2021-06-08', 'Jun', '10:49 am'),
(36, 0, 'Ganesh Mishra', '1623408232.png', 'ganesh@wayindia.com', '7978462887', 0, '2021-06-11', 'Jun', '03:44 pm'),
(38, 0, 'maresh', NULL, 'maresh@gmail.com', '6646646446', 0, '2021-06-16', 'Jun', '04:01 pm'),
(39, 0, 'rajesh', NULL, 'kamesh@gmail.com', '6646444664', 0, '2021-06-16', 'Jun', '04:13 pm'),
(40, 0, 'man', NULL, 'm@gmail.com', '6464664644', 0, '2021-06-16', 'Jun', '04:35 pm'),
(41, 0, 'debendra jena', NULL, 'debendrajena31@gmail.com', '1234567890', 0, '2021-06-16', 'Jun', '10:32 pm'),
(42, 0, 'user1', '1624347677.png', 'user1@gmail.com', '9876543210', 0, '2021-06-22', 'Jun', '01:01 pm'),
(43, 0, 'rakesh pradham', NULL, 'rakesh@gmail.com', '1111111111', 0, '2021-06-22', 'Jun', '05:24 pm'),
(44, 0, 'Debendra', NULL, 'debendrajena31@gmail.com', '7978032201', 0, '2021-06-29', 'Jun', '03:42 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_booking`
--
ALTER TABLE `appointment_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_timeslot`
--
ALTER TABLE `cancel_timeslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic_speciality`
--
ALTER TABLE `clinic_speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_device_data`
--
ALTER TABLE `doctor_device_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_feedback`
--
ALTER TABLE `doctor_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_website`
--
ALTER TABLE `my_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathology_test`
--
ALTER TABLE `pathology_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_appointment_booking`
--
ALTER TABLE `temp_appointment_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_device_data`
--
ALTER TABLE `user_device_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_booking`
--
ALTER TABLE `appointment_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cancel_timeslot`
--
ALTER TABLE `cancel_timeslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clinic_speciality`
--
ALTER TABLE `clinic_speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `doctor_device_data`
--
ALTER TABLE `doctor_device_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_feedback`
--
ALTER TABLE `doctor_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `my_website`
--
ALTER TABLE `my_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pathology_test`
--
ALTER TABLE `pathology_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `temp_appointment_booking`
--
ALTER TABLE `temp_appointment_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_device_data`
--
ALTER TABLE `user_device_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
