-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2016 at 01:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `notredame`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_info`
--

CREATE TABLE IF NOT EXISTS `access_info` (
  `user_id` int(10) unsigned NOT NULL,
  `login_period` datetime NOT NULL,
  `logout_period` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access_info`
--

INSERT INTO `access_info` (`user_id`, `login_period`, `logout_period`) VALUES
(4, '2016-06-09 09:26:55', '2016-06-09 10:51:03'),
(4, '2016-07-03 09:43:18', '0000-00-00 00:00:00'),
(4, '2016-07-03 10:32:28', '0000-00-00 00:00:00'),
(4, '2016-07-03 10:58:21', '0000-00-00 00:00:00'),
(4, '2016-07-03 11:47:57', '0000-00-00 00:00:00'),
(4, '2016-07-03 12:05:33', '0000-00-00 00:00:00'),
(4, '2016-07-03 12:09:07', '0000-00-00 00:00:00'),
(4, '2016-07-03 12:53:58', '0000-00-00 00:00:00'),
(4, '2016-07-11 09:50:53', '0000-00-00 00:00:00'),
(4, '2016-07-11 10:36:57', '0000-00-00 00:00:00'),
(4, '2016-07-11 10:41:12', '2016-07-11 12:34:56'),
(4, '2016-07-11 12:35:10', '0000-00-00 00:00:00'),
(4, '2016-07-11 15:02:51', '0000-00-00 00:00:00'),
(4, '2016-07-12 09:25:58', '2016-07-12 12:25:15'),
(4, '2016-07-12 12:25:22', '0000-00-00 00:00:00'),
(4, '2016-07-12 15:24:02', '0000-00-00 00:00:00'),
(4, '2016-07-13 09:14:57', '0000-00-00 00:00:00'),
(4, '2016-07-13 13:30:16', '2016-07-13 13:32:50'),
(4, '2016-07-13 13:34:09', '0000-00-00 00:00:00'),
(4, '2016-07-14 09:06:42', '0000-00-00 00:00:00'),
(4, '2016-07-14 12:38:31', '0000-00-00 00:00:00'),
(4, '2016-07-14 13:12:06', '0000-00-00 00:00:00'),
(4, '2016-07-14 14:44:46', '0000-00-00 00:00:00'),
(4, '2016-07-14 15:11:11', '0000-00-00 00:00:00'),
(4, '2016-07-14 15:25:26', '0000-00-00 00:00:00'),
(4, '2016-07-14 15:50:10', '0000-00-00 00:00:00'),
(4, '2016-07-14 16:55:56', '0000-00-00 00:00:00'),
(4, '2016-07-14 17:05:59', '0000-00-00 00:00:00'),
(4, '2016-07-16 09:42:06', '0000-00-00 00:00:00'),
(4, '2016-07-16 11:15:49', '2016-07-16 11:32:31'),
(4, '2016-07-16 11:33:32', '2016-07-16 11:51:58'),
(4, '2016-07-16 11:36:52', '0000-00-00 00:00:00'),
(4, '2016-07-16 12:43:15', '0000-00-00 00:00:00'),
(4, '2016-07-16 13:01:49', '0000-00-00 00:00:00'),
(4, '2016-07-16 13:22:24', '0000-00-00 00:00:00'),
(4, '2016-07-16 17:51:04', '2016-07-16 17:51:25'),
(4, '2016-07-16 17:51:40', '2016-07-16 17:58:32'),
(4, '2016-07-16 17:53:21', '0000-00-00 00:00:00'),
(4, '2016-07-17 09:18:30', '0000-00-00 00:00:00'),
(4, '2016-07-17 09:28:25', '0000-00-00 00:00:00'),
(4, '2016-07-17 10:21:45', '0000-00-00 00:00:00'),
(4, '2016-07-17 12:25:54', '0000-00-00 00:00:00'),
(4, '2016-07-17 12:32:57', '0000-00-00 00:00:00'),
(4, '2016-07-17 13:26:09', '0000-00-00 00:00:00'),
(4, '2016-07-17 15:35:00', '0000-00-00 00:00:00'),
(4, '2016-07-17 16:04:35', '0000-00-00 00:00:00'),
(4, '2016-07-17 17:59:20', '0000-00-00 00:00:00'),
(4, '2016-07-17 18:18:56', '0000-00-00 00:00:00'),
(4, '2016-07-18 09:30:16', '0000-00-00 00:00:00'),
(4, '2016-07-18 10:38:44', '2016-07-18 10:40:34'),
(4, '2016-07-18 13:20:35', '0000-00-00 00:00:00'),
(4, '2016-07-18 14:24:12', '2016-07-18 15:10:03'),
(4, '2016-07-18 15:21:09', '0000-00-00 00:00:00'),
(4, '2016-07-18 15:24:41', '0000-00-00 00:00:00'),
(4, '2016-07-18 15:39:41', '2016-07-18 17:24:43'),
(4, '2016-07-18 15:42:51', '0000-00-00 00:00:00'),
(4, '2016-07-18 16:51:04', '0000-00-00 00:00:00'),
(4, '2016-07-19 09:25:12', '0000-00-00 00:00:00'),
(4, '2016-07-19 09:30:33', '0000-00-00 00:00:00'),
(4, '2016-07-19 09:34:23', '0000-00-00 00:00:00'),
(4, '2016-07-19 11:24:14', '0000-00-00 00:00:00'),
(4, '2016-07-19 12:44:29', '0000-00-00 00:00:00'),
(7, '2016-07-19 14:12:26', '0000-00-00 00:00:00'),
(4, '2016-07-19 16:16:42', '0000-00-00 00:00:00'),
(4, '2016-07-19 17:07:47', '0000-00-00 00:00:00'),
(9, '2016-07-20 09:23:51', '0000-00-00 00:00:00'),
(9, '2016-07-20 09:24:13', '0000-00-00 00:00:00'),
(9, '2016-07-20 09:25:11', '2016-07-20 11:11:34'),
(14, '2016-07-20 09:48:29', '0000-00-00 00:00:00'),
(14, '2016-07-20 11:35:35', '0000-00-00 00:00:00'),
(14, '2016-07-20 12:15:13', '0000-00-00 00:00:00'),
(14, '2016-07-20 14:45:05', '0000-00-00 00:00:00'),
(14, '2016-07-20 15:51:21', '0000-00-00 00:00:00'),
(14, '2017-07-01 16:54:31', '0000-00-00 00:00:00'),
(14, '2017-07-01 16:59:25', '0000-00-00 00:00:00'),
(14, '2016-07-14 09:27:00', '0000-00-00 00:00:00'),
(14, '2016-07-14 09:56:09', '0000-00-00 00:00:00'),
(14, '2016-07-14 10:14:35', '0000-00-00 00:00:00'),
(14, '2016-07-14 10:16:39', '0000-00-00 00:00:00'),
(14, '2016-07-14 13:35:43', '0000-00-00 00:00:00'),
(14, '2016-07-14 15:01:07', '0000-00-00 00:00:00'),
(14, '2016-07-14 15:09:30', '0000-00-00 00:00:00'),
(14, '2016-07-14 17:40:25', '0000-00-00 00:00:00'),
(14, '2016-07-14 17:59:20', '0000-00-00 00:00:00'),
(14, '2016-07-16 09:15:49', '2016-07-16 16:55:40'),
(14, '2016-07-16 09:22:22', '0000-00-00 00:00:00'),
(14, '2016-07-16 12:18:52', '0000-00-00 00:00:00'),
(14, '2016-07-16 12:31:33', '0000-00-00 00:00:00'),
(14, '2016-07-16 15:52:24', '2016-07-16 15:56:38'),
(14, '2016-07-16 15:56:50', '0000-00-00 00:00:00'),
(14, '2016-07-16 15:57:01', '0000-00-00 00:00:00'),
(14, '2016-07-16 17:01:49', '2016-07-16 17:03:00'),
(14, '2016-07-17 09:11:58', '2016-07-17 10:34:01'),
(14, '2016-07-17 10:38:37', '2016-07-17 10:38:43'),
(14, '2016-07-17 10:39:56', '2016-07-17 10:40:00'),
(14, '2016-07-17 10:40:11', '0000-00-00 00:00:00'),
(14, '2016-07-17 10:46:55', '2016-07-17 10:47:02'),
(14, '2016-07-17 10:47:31', '2016-07-17 10:47:41'),
(14, '2016-07-17 11:06:20', '2016-07-17 11:30:36'),
(14, '2016-07-17 11:06:49', '2016-07-17 11:18:51'),
(14, '2016-07-17 11:33:20', '0000-00-00 00:00:00'),
(14, '2016-07-17 11:51:41', '2016-07-17 12:01:09'),
(14, '2016-07-17 12:00:58', '0000-00-00 00:00:00'),
(14, '2016-07-17 12:15:02', '0000-00-00 00:00:00'),
(14, '2016-07-17 13:16:02', '0000-00-00 00:00:00'),
(14, '2016-07-17 16:17:25', '0000-00-00 00:00:00'),
(14, '2016-07-17 17:09:00', '0000-00-00 00:00:00'),
(14, '2016-07-18 09:29:48', '0000-00-00 00:00:00'),
(14, '2016-07-18 09:44:59', '0000-00-00 00:00:00'),
(14, '2016-07-25 10:33:57', '2016-07-25 11:22:42'),
(14, '2016-07-25 10:47:25', '0000-00-00 00:00:00'),
(14, '2016-07-25 11:09:25', '0000-00-00 00:00:00'),
(14, '2016-07-25 12:17:26', '2016-07-25 12:17:38'),
(14, '2016-07-25 14:47:42', '0000-00-00 00:00:00'),
(14, '2016-07-25 16:57:50', '0000-00-00 00:00:00'),
(14, '2016-07-25 17:06:59', '0000-00-00 00:00:00'),
(14, '2016-07-25 17:45:53', '2016-07-25 17:56:22'),
(14, '2016-07-25 18:26:28', '0000-00-00 00:00:00'),
(14, '2016-07-26 09:18:49', '0000-00-00 00:00:00'),
(14, '2016-07-26 09:34:20', '0000-00-00 00:00:00'),
(14, '2016-07-26 10:02:43', '2016-07-26 10:24:14'),
(14, '2016-07-26 10:24:28', '0000-00-00 00:00:00'),
(14, '2016-07-26 10:46:12', '0000-00-00 00:00:00'),
(14, '2016-07-26 10:48:51', '0000-00-00 00:00:00'),
(14, '2016-07-26 12:43:06', '0000-00-00 00:00:00'),
(14, '2016-07-26 13:12:05', '0000-00-00 00:00:00'),
(14, '2016-07-26 13:20:10', '0000-00-00 00:00:00'),
(14, '2016-07-26 16:24:10', '2016-07-26 16:34:22'),
(14, '2016-07-26 17:18:03', '0000-00-00 00:00:00'),
(14, '2016-07-27 09:30:24', '2016-07-27 10:29:38'),
(14, '2016-07-27 11:14:01', '2016-07-27 12:24:38'),
(14, '2016-07-27 12:32:17', '0000-00-00 00:00:00'),
(14, '2016-07-27 15:21:05', '0000-00-00 00:00:00'),
(14, '2016-07-28 09:22:47', '0000-00-00 00:00:00'),
(14, '2016-07-28 09:41:11', '0000-00-00 00:00:00'),
(14, '2016-07-28 15:16:38', '0000-00-00 00:00:00'),
(14, '2016-07-28 17:55:07', '0000-00-00 00:00:00'),
(14, '2016-07-30 09:54:17', '0000-00-00 00:00:00'),
(14, '2016-07-30 10:34:41', '0000-00-00 00:00:00'),
(14, '2016-07-30 10:49:19', '0000-00-00 00:00:00'),
(14, '2016-07-30 11:09:21', '0000-00-00 00:00:00'),
(14, '2016-07-30 12:02:42', '0000-00-00 00:00:00'),
(14, '2016-07-30 13:50:07', '0000-00-00 00:00:00'),
(14, '2016-07-31 09:17:22', '0000-00-00 00:00:00'),
(14, '2016-07-31 10:36:49', '0000-00-00 00:00:00'),
(14, '2016-07-31 10:41:53', '0000-00-00 00:00:00'),
(14, '2016-07-31 11:39:43', '2016-07-31 11:41:13'),
(14, '2016-07-31 12:57:34', '0000-00-00 00:00:00'),
(14, '2016-07-31 15:13:12', '2016-07-31 16:13:45'),
(14, '2016-07-31 15:25:18', '0000-00-00 00:00:00'),
(14, '2016-07-31 19:48:55', '0000-00-00 00:00:00'),
(14, '2016-08-01 09:43:32', '0000-00-00 00:00:00'),
(14, '2016-08-01 09:44:07', '0000-00-00 00:00:00'),
(14, '2016-08-01 09:50:40', '0000-00-00 00:00:00'),
(14, '2016-08-01 10:07:37', '0000-00-00 00:00:00'),
(14, '2016-08-01 10:25:20', '2016-08-01 12:42:39'),
(14, '2016-08-01 10:55:27', '0000-00-00 00:00:00'),
(14, '2016-08-01 12:42:46', '0000-00-00 00:00:00'),
(14, '2016-08-01 13:07:21', '2016-08-01 13:22:47'),
(14, '2016-08-01 13:36:15', '0000-00-00 00:00:00'),
(14, '2016-08-01 15:14:23', '0000-00-00 00:00:00'),
(14, '2016-08-01 16:35:03', '0000-00-00 00:00:00'),
(14, '2016-08-01 23:41:46', '0000-00-00 00:00:00'),
(14, '2016-08-02 09:02:19', '2016-08-02 10:29:02'),
(14, '2016-08-02 09:14:23', '2016-08-02 10:39:47'),
(14, '2016-08-02 09:20:13', '0000-00-00 00:00:00'),
(14, '2016-08-02 09:21:17', '2016-08-02 10:07:12'),
(14, '2016-08-02 10:09:41', '2016-08-02 10:10:20'),
(18, '2016-08-02 10:21:48', '2016-08-02 10:24:48'),
(18, '2016-08-02 10:25:11', '2016-08-02 10:26:45'),
(18, '2016-08-02 10:27:41', '2016-08-02 10:27:45'),
(18, '2016-08-02 10:28:50', '2016-08-02 10:38:45'),
(14, '2016-08-02 10:35:25', '2016-08-02 10:41:31'),
(18, '2016-08-02 10:39:13', '0000-00-00 00:00:00'),
(14, '2016-08-02 10:39:51', '0000-00-00 00:00:00'),
(18, '2016-08-02 10:41:37', '2016-08-02 11:25:53'),
(14, '2016-08-02 11:14:48', '0000-00-00 00:00:00'),
(14, '2016-08-02 11:26:05', '2016-08-02 12:10:53'),
(18, '2016-08-02 12:11:11', '2016-08-02 12:41:47'),
(14, '2016-08-02 12:42:09', '0000-00-00 00:00:00'),
(14, '2016-08-02 14:47:17', '2016-08-02 14:48:39'),
(18, '2016-08-02 14:48:58', '0000-00-00 00:00:00'),
(14, '2016-08-02 16:24:53', '0000-00-00 00:00:00'),
(14, '2016-08-02 16:46:54', '0000-00-00 00:00:00'),
(18, '2016-08-02 17:49:00', '0000-00-00 00:00:00'),
(14, '2016-08-03 09:28:13', '0000-00-00 00:00:00'),
(14, '2016-08-03 09:30:06', '2016-08-03 09:30:19'),
(14, '2016-08-03 09:31:30', '0000-00-00 00:00:00'),
(14, '2016-08-03 11:30:25', '2016-08-03 15:22:34'),
(14, '2016-08-03 11:46:19', '2016-08-03 14:03:27'),
(14, '2016-08-03 14:04:57', '2016-08-03 14:05:08'),
(19, '2016-08-03 14:05:20', '0000-00-00 00:00:00'),
(14, '2016-08-03 15:18:48', '0000-00-00 00:00:00'),
(19, '2016-08-03 15:22:44', '0000-00-00 00:00:00'),
(14, '2016-08-04 09:36:53', '0000-00-00 00:00:00'),
(14, '2016-08-04 12:17:00', '0000-00-00 00:00:00'),
(14, '2016-08-04 15:40:24', '0000-00-00 00:00:00'),
(14, '2016-08-04 16:46:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opening_date` date NOT NULL,
  `memberId` varchar(50) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `account_team` varchar(100) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `duration` varchar(3) NOT NULL,
  `installment_terms` int(3) NOT NULL,
  `installment_amount` decimal(10,2) NOT NULL,
  `closing_date` date NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `real_interest` decimal(10,2) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `opening_date`, `memberId`, `branch`, `account_team`, `account_type`, `account_number`, `duration`, `installment_terms`, `installment_amount`, `closing_date`, `interest`, `real_interest`, `details`, `status`) VALUES
(15, '2016-06-07', 'PR116JOB0001', 'PR1', 'JOB', 'GSW', 'PR116JOB0001GSW', '5', 240, '100.00', '2021-05-07', '2160.00', '26160.00', '[{"photo":"public/nominee/PR116JOB0001GSW-nom-1.jpg","name":"Sagor","guardian":"Joymongal","relation":"father","age":"18","percentage":"40"},{"photo":"public/nominee/PR116JOB0001GSW-nom-2.png","name":"Robin","guardian":"Bakul","relation":"mother","age":"25","percentage":"60"}]', 'yes'),
(16, '2016-06-07', 'PR116JOB0001', 'PR1', 'JOB', 'TMS', 'PR116JOB0001TMS', '3', 36, '500.00', '2019-05-07', '1620.00', '19620.00', '[{"photo":"public/nominee/PR116JOB0001TMS-nom-1.png","name":"Sagor","guardian":"Joymongal","relation":"father","age":"18","percentage":"100"},{"photo":"public/nominee/default-face.png","name":"","guardian":"","relation":"","age":"","percentage":""}]', 'yes'),
(17, '2016-06-09', 'PR116JOB0010', 'PR1', 'JOB', 'TMS', 'PR116JOB0010TMS', '3', 36, '1500.00', '2019-05-09', '4860.00', '58860.00', '[{"photo":"public/nominee/PR116JOB0010TMS-nom-1.jpg","name":"Unknown","guardian":"Unknown","relation":"brother","age":"19","percentage":"100"},{"photo":"public/nominee/default-face.png","name":"","guardian":"","relation":"","age":"","percentage":""}]', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `admit_instruction`
--

CREATE TABLE IF NOT EXISTS `admit_instruction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `details` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admit_instruction`
--

INSERT INTO `admit_instruction` (`id`, `details`) VALUES
(2, 'Arrive at the examination venue at least 15 minutes before the start of the examination / 35 minutes before a digital examination.'),
(3, 'The examination starts at the moment the book control begins, and you must therefore be present by 8.20 a.m. for regular written examinations and 8.10 a.m. at digital examinations.'),
(4, 'When using a laptop at digital examinations, the laptop has to be set up as soon as possible. If you are taking a law exam, the laptop must be set up before the book control.'),
(5, 'Coats, backpacks, bags, etc. must be placed as directed. Mobile phones, mp3 players, smartwatches and other electronic devices must be turned off and put away, and cannot be stored in coats or pockets.'),
(6, 'If support material, other than that which is specifically permitted, is found at or by the desk, it may be treated as an attempt to cheat and relevant procedures for cheating will be followed. '),
(7, 'The head invigilator will provide information about examination support materials that you are permitted to use during the examination. All dictionaries must be approved by the faculty before the exam and will be handed out in the exam venue by the invigilators.');

-- --------------------------------------------------------

--
-- Table structure for table `advance`
--

CREATE TABLE IF NOT EXISTS `advance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `employeeId` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `advance`
--

INSERT INTO `advance` (`id`, `date`, `employeeId`, `amount`, `balance`) VALUES
(8, '2016-04-23', '2', '17000.00', '8200.00'),
(9, '2016-06-05', '5', '20000.00', '8000.00');

-- --------------------------------------------------------

--
-- Table structure for table `ad_calender`
--

CREATE TABLE IF NOT EXISTS `ad_calender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_calender_title` varchar(255) NOT NULL,
  `ad_calender_attachment` varchar(255) NOT NULL,
  `ad_calender_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ad_calender`
--

INSERT INTO `ad_calender` (`id`, `ad_calender_title`, `ad_calender_attachment`, `ad_calender_date`) VALUES
(2, 'asdf', 'public/upload_delete/academic_calender/calender_2016-07-18_9143.pdf', '2016-07-18'),
(3, 'Download', 'public/upload_delete/academic_calender/calender_2016-07-28_2899.pdf', '2016-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attendance_date` date NOT NULL,
  `attendance_roll` varchar(100) NOT NULL,
  `attendance_class` varchar(100) NOT NULL,
  `attendance_section` varchar(100) NOT NULL,
  `attendance_session` varchar(100) NOT NULL,
  `attendance_group` varchar(100) NOT NULL,
  `attendance_shift` varchar(100) NOT NULL,
  `attendance_status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `attendance_date`, `attendance_roll`, `attendance_class`, `attendance_section`, `attendance_session`, `attendance_group`, `attendance_shift`, `attendance_status`) VALUES
(4, '2016-08-04', '11', 'Twelve', 'Section_II', '2017-2018', 'Arts', 'day', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `at_a_glance`
--

CREATE TABLE IF NOT EXISTS `at_a_glance` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `date` varchar(10) NOT NULL,
  `at_a_glance_title` varchar(255) NOT NULL,
  `at_a_glance` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `at_a_glance`
--

INSERT INTO `at_a_glance` (`id`, `date`, `at_a_glance_title`, `at_a_glance`) VALUES
(2, '2016-07-19', 'এক নজরে নটর ডেম কলেজ । ', '<p><span style="color: #000000;">এক নজরে নটর ডেম কলেজ । এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;এক নজরে নটর ডেম কলেজ ।&nbsp;</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE IF NOT EXISTS `bank_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` date NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `pre_balance` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `datetime`, `bank_name`, `holder_name`, `account_number`, `pre_balance`) VALUES
(9, '2016-08-02', 'Sonali_Bank_Limited', 'Maruf hasan Hasan', '15610550882', 50000),
(10, '2016-08-02', 'AB_Bank_Limited', 'Maruf hasan', '15610550883', 50000),
(11, '0000-00-00', 'Agrani_Bank_Limited', 'lad', '1111111111111', 500000),
(12, '0000-00-00', 'Agrani_Bank_Limited', 'Maruf hasan Sahin', '2222222222', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `path` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `date`, `path`) VALUES
(17, '2016-07-26', 'public/banner/banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `class_and_subject`
--

CREATE TABLE IF NOT EXISTS `class_and_subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CS_class` varchar(255) NOT NULL,
  `CS_group` varchar(255) NOT NULL,
  `CS_subject` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `class_and_subject`
--

INSERT INTO `class_and_subject` (`id`, `CS_class`, `CS_group`, `CS_subject`) VALUES
(1, 'Eleven', 'Arts', 'subject-b'),
(2, 'Eleven', 'Science', 'bangla_1st_paper');

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE IF NOT EXISTS `committee_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_date` varchar(255) NOT NULL,
  `member_year_from` varchar(10) NOT NULL,
  `member_year_to` varchar(10) NOT NULL,
  `member_full_name` varchar(255) NOT NULL,
  `member_post` varchar(255) NOT NULL,
  `member_mobile_number` varchar(255) NOT NULL,
  `member_address` varchar(255) NOT NULL,
  `member_photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `committee_members`
--

INSERT INTO `committee_members` (`id`, `member_date`, `member_year_from`, `member_year_to`, `member_full_name`, `member_post`, `member_mobile_number`, `member_address`, `member_photo`) VALUES
(1, '2016-07-25', '2017', '2017', 'Marufhasan', 'director', '01735189237', '  মুক্তাগাছা  ', 'public/members/member_763644.png');

-- --------------------------------------------------------

--
-- Table structure for table `daily_transaction`
--

CREATE TABLE IF NOT EXISTS `daily_transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `voucher` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `transaction_nature` varchar(100) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `transaction_by` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `daily_transaction`
--

INSERT INTO `daily_transaction` (`id`, `transaction_date`, `voucher`, `branch`, `transaction_nature`, `transaction_description`, `transaction_by`, `amount`, `status`) VALUES
(1, '2016-06-08', '1001', 'PR1', 'income', 'ব্যাংক থেকে মুনাফা প্রাপ্তি', 'Me', '15000.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_emp_id` varchar(100) NOT NULL,
  `employee_type` varchar(100) NOT NULL,
  `employee_joining` date NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_gender` text NOT NULL,
  `employee_mobile` varchar(15) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_present_address` text NOT NULL,
  `employee_permanent_address` text NOT NULL,
  `employee_designation` varchar(50) NOT NULL,
  `employee_salary` varchar(15) NOT NULL,
  `employee_photo` varchar(100) NOT NULL,
  `employee_status` varchar(20) NOT NULL,
  `employee_subject` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_emp_id`, `employee_type`, `employee_joining`, `employee_name`, `employee_gender`, `employee_mobile`, `employee_email`, `employee_present_address`, `employee_permanent_address`, `employee_designation`, `employee_salary`, `employee_photo`, `employee_status`, `employee_subject`) VALUES
(24, '001122', 'teacher', '2016-06-26', '', 'Male', '01735189210', '', 'popopopopop', 'uyuyuyuyuyuy', 'co_ordinator', '10000', '', '0', 'akaid'),
(29, '2541', 'teacher', '2016-05-01', '', 'Male', '12952485875', '', 'mymensingh', 'mymensingh', 'teacher', '5000', '', '1', 'bangla_1st_paper'),
(30, '456789', 'staff', '2016-07-05', 'Maruf hasan', 'Male', '01715189237', 'emarufhasan@gmail.com', 'Muktagachha', 'Muktagachha', 'accountant', '15000', 'public/employee/employee_456789.jpg', '1', ''),
(31, '2587456', 'staff', '2016-07-01', 'abcd', 'Male', '01254789587', 'asdfcvc@yahoo.com', 'asd afd asd ', 'asd afd asd ', 'office_assistant', '25410', 'public/employee/employee_2587456.jpg', '1', 'english'),
(32, '2548656', 'staff', '2016-07-01', 'abcd', 'Male', '01245789658', 'asdfcvc@yahoo.com', 'asd afd asd ', 'asd afd asd ', 'cooker', '25410', 'public/employee/employee_2548656.png', '1', 'math'),
(33, '12w32e', 'staff', '2015-09-02', 'dasdf', 'Male', '01547896587', 'asdfcvc@yahoo.com', 'DSF', 'DSF', 'hostel_super', '345234', 'public/employee/employee_12w32e.png', '1', 'arabic_writing'),
(34, '2134213', 'teacher', '2016-07-12', '', 'Male', '06859874587', '', 'dfsz g', 'dfsz g', 'co_ordinator', '2345345', '', '1', 'hadith'),
(35, '1234566541', 'staff', '2016-07-10', 'Maruf hasan', 'Male', '01751445578', 'aaslkdfjlasdf@gmail.com', 'Muktagachha', 'Muktagachha', 'hostel_super', '15000', 'public/employee/employee_1234566541.png', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payment`
--

CREATE TABLE IF NOT EXISTS `employee_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payDate` date NOT NULL,
  `employeeId` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bonus` decimal(10,2) NOT NULL,
  `method` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_date` date NOT NULL,
  `gallery_title` varchar(255) NOT NULL,
  `gallery_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_date`, `gallery_title`, `gallery_path`) VALUES
(2, '2016-07-28', 'New', 'public/gallery/gallery6264.jpg'),
(3, '2016-07-28', 'dddd', 'public/gallery/gallery3440.jpg'),
(4, '2016-07-28', 'asdf', 'public/gallery/gallery5555.jpg'),
(6, '2016-07-30', 'cgfj', 'public/gallery/gallery7637.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE IF NOT EXISTS `latest_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latest_news_date` date NOT NULL,
  `latest_news_title` text NOT NULL,
  `latest_news_description` text NOT NULL,
  `latest_news_link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `latest_news_date`, `latest_news_title`, `latest_news_description`, `latest_news_link`) VALUES
(4, '2016-07-31', 'আমার সোনার বাংলা', '<p>আমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজায় বাসি</p>', 'http://bangladesh.com'),
(8, '2016-07-31', 'ওয়েবসাইট', '<p>এখন থেকে নটরডেম কলেজ এর সকল আপডেট উক্ত কলেজ এর ওয়েব সাইট &nbsp;<a href="../" target="_blank">http://ndcm.edu.bd</a>&nbsp; এ পাওয়া যাবে</p>', 'http://ndcm.edu.bd');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `joining_date` date NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `branch_id` varchar(100) NOT NULL,
  `certificate_no` varchar(50) NOT NULL,
  `share_quantity` int(10) NOT NULL,
  `total_share_price` decimal(10,2) NOT NULL,
  `applicant_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` varchar(100) NOT NULL,
  `national_id_no` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `yearly_income` decimal(10,2) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'public/upload/members/default-face.png',
  `signature` varchar(255) NOT NULL DEFAULT 'public/upload/signature/default-signature.png',
  `status` varchar(50) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `joining_date`, `member_id`, `branch_id`, `certificate_no`, `share_quantity`, `total_share_price`, `applicant_name`, `father_name`, `mother_name`, `guardian_name`, `relation`, `team`, `present_address`, `permanent_address`, `mobile_number`, `date_of_birth`, `age`, `national_id_no`, `marital_status`, `yearly_income`, `photo`, `signature`, `status`) VALUES
(9, '2016-06-07', 'PR116JOB0001', 'PR1', 'PR116JOB0001', 20, '400.00', 'Jayanta Biswas', 'Joymongal Biswas', 'Bakul Rani Biswas', 'Joymongal Biswas', 'father', 'JOB', 'Mymensingh', 'Mymensingh', '01775219457', '1989-12-25', '26', '612585913218', 'unmarride', '100000.00', 'public/members/PR116JOB0001-photo.png', 'public/signature/PR116JOB0001-signature.png', 'yes'),
(10, '2016-06-09', 'PR116JOB0010', 'PR1', 'PR116JOB0010', 25, '500.00', 'Rony Debnath', 'Unknown', 'Unknown', 'Unknown', 'father', 'JOB', 'Mymensingh, Bangladesh', 'Mymensingh, Bangladesh', '01557732884', '1991-12-25', '24', '612513814911', 'unmarride', '70000000.00', 'public/members/PR116JOB0010-photo.png', 'public/signature/PR116JOB0010-signature.png', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `messages_date` varchar(20) NOT NULL,
  `messages_name` varchar(250) NOT NULL,
  `messages_mobile` varchar(50) NOT NULL,
  `messages_text` text NOT NULL,
  `messages_condition` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `messages_date`, `messages_name`, `messages_mobile`, `messages_text`, `messages_condition`) VALUES
(4, '2016-07-30', 'Maruf hasan', '01735189237', 'hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . hello world . ', 'read'),
(5, '2016-07-25', 'Rony Debnath', '01735189237', 'Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. \r\n\r\nIts freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. Its freelance I TLab. ', 'read'),
(6, '2016-07-30', 'Maruf hasan', '01735189564', 'Hello Every one', 'read'),
(7, '2016-07-30', 'shithi', '01921555056', 'Hellow,  i am from Bangladeshi. My country is so nice. I am proud of .......', 'read'),
(8, '2016-07-30', 'মারুফ', '01712555056', 'আমাদের দেশে হবে সেই ছেলে কবে, কথায় না বড় হয়ে কাজে বড় হবে। মুখে হাসি বুকে বল তেজে ভরা মন, মানুষ হইতে হবে এই যার পণ', 'read'),
(9, '2016-07-30', 'Maruf hasan', '01735189237', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi sapiente adipisci possimus pariatur tempora dolorum, voluptatibus, nobis in! Ducimus quasi, voluptates repellendus iure porro, cupiditate beatae aut dolor expedita explicabo.', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `notice_date` date NOT NULL,
  `notice_title` varchar(255) NOT NULL,
  `notice_description` text NOT NULL,
  `notice_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice_date`, `notice_title`, `notice_description`, `notice_path`) VALUES
(19, '2016-07-17', 'Test notice', '<p>আমার সোনার বাংলা</p>', 'public/attached_notice/notice744574.jpg'),
(21, '2016-07-26', 'about exam', '<p>We love our country</p>', 'public/attached_notice/notice507731.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_date` date NOT NULL,
  `page_page` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `page_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_date`, `page_page`, `page_title`, `page_description`, `page_path`) VALUES
(4, '2016-07-26', 'at_a_glance', 'এক নজরে নটর ডেম কলেজ', '<p>আমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসিআমার সোনার বাংলা আমি তোমায় ভালো বাসি চিরদিন তোমার আকাশ তোমার বাতাস আমার প্রাণে বাজা বাসি</p>', 'public/page_Image/at_a_glance5980.jpg'),
(5, '2016-07-16', 'future_plan', 'ভবিষ্যৎ পরিকল্পনা ।', '<p>ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।ভবিষ্যৎ পরিকল্পনা ।</p>', 'public/page_Image/future_plan9830.jpg'),
(6, '2016-07-28', 'college_achievement', 'College Achievement', '<p>It is our Pride asdgfdf df gf</p>', 'public/page_Image/college_achievement5426.jpg'),
(7, '2016-07-28', 'academic_rules', 'Academic Rules', '<p>একাডেমিক রুলসএকাডেমিক</p>', 'public/page_Image/academic_rules2122.jpg'),
(8, '2016-07-28', 'post_information', 'Post Information', '<p>post Information postinformationpost</p>', 'public/page_Image/post_information7260.jpg'),
(9, '2016-07-28', 'master_plan', 'Master Plan', '<p>asdf sadf sadfsadf sadf sdf sadf</p>', 'public/page_Image/master_plan9320.jpg'),
(10, '2016-07-28', 'college_history', 'College History', '<p>asdf asd fasdf asdf</p>', 'public/page_Image/college_history4455.jpg'),
(11, '2016-07-28', 'success_story', 'Success Story', '<p>adsfgsd gf dsfg d</p>', 'public/page_Image/success_story1802.jpg'),
(12, '2016-07-28', 'scholarship', 'Scholarship', '<p>asdf asdf asdf sd</p>', 'public/page_Image/scholarship1346.jpg'),
(13, '2016-07-28', 'campus', 'College Campus', '<p>asdf asdf sadf sadfs</p>', 'public/page_Image/campus7810.jpg'),
(14, '2016-07-28', 'campus', 'College Campus', '<p>asdf asdf sadf sadfs</p>', 'public/page_Image/campus4803.jpg'),
(15, '2016-07-28', 'bncc', 'BNCC', '<p>alsdk laskd flaskdf asdf asdf</p>', 'public/page_Image/bncc9474.jpg'),
(16, '2016-07-28', 'sports', 'Sports', '<p>asd fsadf asdf asdf</p>', 'public/page_Image/sports2753.jpg'),
(17, '2016-07-28', 'library', 'Library', '<p>asd asdf asdf asdf asdf sdf asdf sdf asdf</p>', 'public/page_Image/library8176.jpg'),
(18, '2016-07-28', 'rover_scout', 'Rover Scout', '<p>adsf gasd</p>', 'public/page_Image/rover_scout8165.jpg'),
(19, '2016-07-28', 'cultural_function', 'Cultural Function', '<p>asd asdf ssdf</p>', 'public/page_Image/cultural_function4724.jpg'),
(20, '2016-07-28', 'physical_educartion', 'Physical Education', '<p>asdf asdf asdf a sdf</p>', 'public/page_Image/physical_educartion5852.jpg'),
(21, '2016-07-28', 'physical_education', 'Physical Education', '<p>asdf asdf asdf asfd sdf</p>', 'public/page_Image/physical_education4394.jpg'),
(22, '2016-07-28', 'study_tour', 'Study Tour', '<p>asd asd fsd f</p>', 'public/page_Image/study_tour5386.jpg'),
(23, '2016-07-28', 'residential', 'Residential', '<p>asdf asdf asdf</p>', 'public/page_Image/residential3791.jpg'),
(24, '2016-07-28', 'academic_facilites', 'Academic Falities', '<p>asd fasdf asdf</p>', 'public/page_Image/academic_facilites8781.jpg'),
(25, '2016-07-30', 'admission_rules', 'Admission Rules', '<p>1 abcd</p>\r\n<p>2 abcd</p>', 'public/page_Image/admission_rules1856.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `p_speech`
--

CREATE TABLE IF NOT EXISTS `p_speech` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `p_speech_speech` text CHARACTER SET utf8 NOT NULL,
  `p_speech_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `p_speech_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `p_speech`
--

INSERT INTO `p_speech` (`id`, `p_speech_speech`, `p_speech_path`, `p_speech_date`) VALUES
(9, '<p><span style="color: #000000;">প্রিন্সিপাল এর বানি ।&nbsp; প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । প্রিন্সিপাল এর বানি । <br /></span></p>', 'public/speech/principal54.png', '2016-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('174091a1c451b23f771b655273fdd8a3', '192.168.1.107', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', 1470309999, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"14";s:12:"login_period";s:22:"2016-08-04 16:46:04 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:20:"superadmin@gmail.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"00000000000";s:9:"privilege";s:5:"super";s:5:"image";s:39:"public/employee/employee_superadmin.jpg";s:6:"branch";s:0:"";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}'),
('278eaa1cc7fd6c3a1051fc61ad0c5e6a', '192.168.1.100', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1470303601, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"14";s:12:"login_period";s:22:"2016-08-04 15:40:24 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:20:"superadmin@gmail.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"00000000000";s:9:"privilege";s:5:"super";s:5:"image";s:39:"public/employee/employee_superadmin.jpg";s:6:"branch";s:0:"";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}'),
('7942e64f2e1541923fe789fab29c166f', '192.168.0.107', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', 1498906757, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"14";s:12:"login_period";s:22:"2017-07-01 16:59:25 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:20:"superadmin@gmail.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"00000000000";s:9:"privilege";s:5:"super";s:5:"image";s:39:"public/employee/employee_superadmin.jpg";s:6:"branch";s:0:"";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}'),
('a2644319dd80c39309e22111c641925e', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', 1470311007, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"14";s:12:"login_period";s:22:"2016-08-04 12:17:00 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:20:"superadmin@gmail.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"00000000000";s:9:"privilege";s:5:"super";s:5:"image";s:39:"public/employee/employee_superadmin.jpg";s:6:"branch";s:0:"";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}'),
('b0bf783bfb70379075c9a75dcff7fefe', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', 1498906467, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"14";s:12:"login_period";s:22:"2017-07-01 16:54:31 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:20:"superadmin@gmail.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"00000000000";s:9:"privilege";s:5:"super";s:5:"image";s:39:"public/employee/employee_superadmin.jpg";s:6:"branch";s:0:"";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slider_date` date NOT NULL,
  `slider_title` varchar(100) NOT NULL,
  `slider_path` varchar(50) NOT NULL,
  `slider_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_date`, `slider_title`, `slider_path`, `slider_url`) VALUES
(12, '2016-07-30', 'notredame college', 'public/slider/slider3683.jpg', ''),
(13, '2016-07-30', 'notredame college', 'public/slider/slider4246.jpg', ''),
(14, '2016-07-30', 'notredame college', 'public/slider/slider8195.jpg', ''),
(15, '2016-07-30', 'notredame college', 'public/slider/slider4944.JPG', ''),
(16, '2016-07-30', 'notredame college', 'public/slider/slider6069.JPG', ''),
(17, '2016-07-30', 'notredame college', 'public/slider/slider1129.JPG', ''),
(18, '2016-07-30', 'notredame college', 'public/slider/slider5079.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms_record`
--

CREATE TABLE IF NOT EXISTS `sms_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `total_characters` varchar(4) NOT NULL,
  `total_messages` varchar(2) NOT NULL,
  `delivery_report` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `sms_record`
--

INSERT INTO `sms_record` (`id`, `delivery_date`, `delivery_time`, `mobile`, `message`, `total_characters`, `total_messages`, `delivery_report`) VALUES
(30, '2016-07-31', '16:00:20', '01775219457', 'Oello ami!', '40', '1', '1'),
(31, '2016-07-31', '16:02:34', '01914690644', 'Oello! Maruf hasan.', '49', '1', '1'),
(32, '2016-08-01', '16:02:34', '01735189237', 'Oello! Maruf hasan.', '49', '1', '1'),
(33, '2016-07-31', '17:19:14', '01937476716', 'Hello Its a Test Message Published from Principal of Mymensingh Notre Dame College. I see what performance is being from here.', '156', '1', '1'),
(34, '2016-08-01', '13:02:11', '01775219457', 'Olleow', '36', '1', '0'),
(35, '2016-08-01', '13:03:38', '01775219457', 'Hi there', '38', '1', '0'),
(36, '2016-08-01', '13:04:22', '01775219457', 'HI there', '38', '1', '1'),
(37, '2016-08-01', '13:06:35', '01937476716', 'Hello', '35', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `students_name` varchar(255) NOT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `fathers_profession` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birth_date` varchar(100) NOT NULL,
  `preasent_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `session` varchar(100) CHARACTER SET utf8 NOT NULL,
  `class` varchar(100) NOT NULL,
  `student_shift` varchar(255) NOT NULL,
  `student_group` varchar(255) NOT NULL,
  `students_roll` varchar(50) NOT NULL,
  `student_section` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `students_name`, `fathers_name`, `mothers_name`, `fathers_profession`, `nationality`, `birth_date`, `preasent_address`, `permanent_address`, `mobile_number`, `session`, `class`, `student_shift`, `student_group`, `students_roll`, `student_section`, `photo`, `date`) VALUES
(6, 'Mustafiz Sohel', 'Belal Uddin', 'Morium Begum', 'Service Holder', 'bangladeshi', '2016-06-27', '   Mymensingh    ', 'Jamalpur', '01735189237', '2017-2018', 'Twelve', 'day', 'Arts', '11', 'Section_II', 'public/students/students784152.jpg', '2016-07-25'),
(7, ' Tanim jahan', 'Umar ali', 'umme jannat', 'Teacher', 'bangladeshi', '2012-12-19', '  Mymensingh  ', 'Mymensingh sadar', '01914690644', '2017-2018', 'Twelve', 'morning', 'Science', '00123236', 'Section_II', 'public/students/students194010.jpg', '2016-07-26'),
(10, 'Sujan ali', 'Nasir mia', 'Jahanra Begum', 'Business', 'bangladeshi', '2001-05-19', 'Sankipara, Noyonmoni', 'Sankipara, Noyonmoni', '01781528178', '2018-2019', 'Eleven', 'day', 'Science', '111256', 'Section_II', 'public/students/students226182.jpg', '2016-08-04'),
(11, 'Kocumoddin ', 'Ajgar Khan ', 'Lubana akter ', 'Doctor ', 'bangladeshi', '2001-05-19', 'Muktagacha. Kodur bari 2210', 'Muktagacha. Kodur bari 2210', '01198087974', '2018-2019', 'Twelve', 'day', 'Arts', '236589', 'Section_IV', 'public/students/students393853.png', '2016-08-04'),
(12, 'Salah Uddin ', 'Chomir Udin ', 'Shirina akter ', 'Business', 'bangladeshi', '2005-06-23', 'hyderbad, Dhaka 1120', 'hyderbad, Dhaka 1120', '01956281585', '2020-2021', 'Eleven', 'day', 'Commerce', '568923', 'Section_V', 'public/students/students123833.jpg', '2016-08-04'),
(13, 'Komor uddin ', 'Shalmanshah ', 'Jibanu akter ', 'Teacher ', 'bangladeshi', '2016-08-26', 'Haluaghat, Mymensingh 2260', 'Haluaghat, Mymensingh 2260', '01956281565', '2015-2016', 'Eleven', 'morning', 'Arts', '123654', 'Section_VI', 'public/students/students516547.jpg', '2016-08-04'),
(14, 'Karuni misali ', 'Haganshokh ', 'Mandi dilruba ', 'Don', 'bangladeshi', '2016-08-24', 'Kumargati, Hatimara, sagol company ', 'Kumargati, Hatimara, sagol company ', '017980236547', '2015-2016', 'Eleven', 'morning', 'Science', '129874', 'Section_II', 'public/students/students317409.jpg', '2016-08-04'),
(15, 'Kumar Udiin ', 'Kodi Khan ', 'Ruma Sangma ', 'Dada Number One ', 'bangladeshi', '2016-08-22', 'gupalpur, Baromari, Mymensingh 2310', 'gupalpur, Baromari, Mymensingh 2310', '01198087395', '2018-2019', 'Eleven', 'morning', 'Science', '56845', 'Section_V', 'public/students/students724744.png', '2016-08-04'),
(16, 'Kutubuddin ', 'Kitab ali ', 'Lubana Jahan ', 'Business', 'bangladeshi', '2016-08-08', 'Jahaa, Khan ali road. 5463', 'Jahaa, Khan ali road. 5463', '01781525175', '2019-2020', 'Twelve', 'day', 'Commerce', '854621', 'Section_V', 'public/students/students464897.jpg', '2016-08-04'),
(17, 'Nuance Ali', 'Khan Kobir Hossen ', 'Mymuna akter ', 'Rail Station', 'bangladeshi', '2016-08-30', 'Chanpur, Doriarghat, Hello mymensingh 1160', 'Chanpur, Doriarghat, Hello mymensingh 1160', '01956238754', '2020-2021', 'Twelve', 'day', 'Arts', '112356', 'Section_V', 'public/students/students405300.jpg', '2016-08-04'),
(18, 'Maruf Munshi ', 'Akram Hosen', 'Monuara Begum', 'Police', 'bangladeshi', '1993-12-06', 'Muktagacha, 2260', 'Muktagacha, 2260', '01914690645', '2017-2018', 'Eleven', 'day', 'Commerce', '256815', 'Section_VI', 'public/students/students487467.jpg', '2016-08-04'),
(19, 'Bibi Sokhina ', 'Sultan Ahmed ', 'Rukshana Akter ', 'Nimtola ', 'bangladeshi', '2016-08-14', 'Kamoruddin arman ', 'Kamoruddin arman ', '01928653412', '2019-2020', 'Eleven', 'morning', 'Arts', '5684122', 'Section_II', 'public/students/students978081.jpg', '2016-08-04'),
(20, 'Shoitan ali ', 'Subhan ali ', 'Petni akter ', 'Teacher', 'bangladeshi', '2016-08-27', 'Brindabon, Separate Khan alom bonam Indonasia ', 'Brindabon, Separate Khan alom bonam Indonasia ', '01928625858', '2016-2017', 'Eleven', 'day', 'Commerce', '1265871', 'Section_VI', 'public/students/students214111.jpg', '2016-08-04'),
(21, 'Mugur ali ', 'Shoitan Khan ', 'Korina Akter ', 'Business ', 'bangladeshi', '2016-08-24', 'Noyapara, Porba Gonj, Mymensingh ', 'Noyapara, Porba Gonj, Mymensingh ', '01956281586', '2021-2022', 'Twelve', 'day', 'Commerce', '445698', 'Section_VII', 'public/students/students550564.jpg', '2016-08-04'),
(22, 'Jorina akter ', 'Juan uddin ', 'Halima akter ', 'Shoitaner Karbari ', 'bangladeshi', '2016-08-21', 'Matirtola, Baganbari, Noyagonj 2250', 'Matirtola, Baganbari, Noyagonj 2250', '01928685757', '2020-2021', 'Eleven', 'day', 'Science', '126058', 'Section_IV', 'public/students/students138780.jpg', '2016-08-04'),
(23, 'Jayanta Biswas ', 'Sayed Khan ', 'Mumina Akter ', 'Business', 'bangladeshi', '2016-08-21', 'Senanibas, Jamalpur, 5682', 'Senanibas, Jamalpur, 5682', '01985624545', '2018-2019', 'Twelve', 'morning', 'Science', '1214658', 'Section_VI', 'public/students/students333468.jpg', '2016-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) NOT NULL,
  `team_id` varchar(20) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `maintained_by` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `team_name`, `team_id`, `branch`, `maintained_by`) VALUES
(21, 'Joba', 'JOB', 'PR1', '6'),
(22, 'Bale', 'BAL', 'AKU', '7');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `bank` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `transaction_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_date`, `bank`, `account_number`, `transaction_type`, `amount`, `transaction_by`) VALUES
(3, '2016-08-02', 'Sonali_Bank_Limited', '15610550882', 'Debit', '1500', 'Maruf hasan');

-- --------------------------------------------------------

--
-- Table structure for table `upload_digital_content`
--

CREATE TABLE IF NOT EXISTS `upload_digital_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dc_title` varchar(255) NOT NULL,
  `dc_class` varchar(255) NOT NULL,
  `dc_group` varchar(255) NOT NULL,
  `dc_subject` varchar(255) NOT NULL,
  `dc_attachment` text NOT NULL,
  `dc_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `upload_digital_content`
--

INSERT INTO `upload_digital_content` (`id`, `dc_title`, `dc_class`, `dc_group`, `dc_subject`, `dc_attachment`, `dc_date`) VALUES
(7, 'Bangla', 'Eleven', 'science', 'bangla_1st_paper', 'public/upload_delete/digital_content/digital_content_2016-07-31_3407.pdf', '2016-07-31'),
(8, 'English', 'Twelve', 'arts', 'english_1st_paper', 'public/upload_delete/digital_content/digital_content_2016-07-31_6866.pptx', '2016-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `upload_leave`
--

CREATE TABLE IF NOT EXISTS `upload_leave` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leave_title` varchar(255) NOT NULL,
  `leave_attachment` varchar(255) NOT NULL,
  `leave_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `upload_leave`
--

INSERT INTO `upload_leave` (`id`, `leave_title`, `leave_attachment`, `leave_date`) VALUES
(6, 'dfgsdfgdsfgdfgdfgfd', 'public/upload_delete/leavelist/leavelist_2016-07-17_6459.pdf', '2016-07-17'),
(7, 'asdfafasd', 'public/upload_delete/leavelist/leavelist_2016-07-17_1742.pdf', '2016-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `upload_magazine`
--

CREATE TABLE IF NOT EXISTS `upload_magazine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `magazine_title` varchar(255) NOT NULL,
  `magazine_attachment` varchar(255) NOT NULL,
  `magazine_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `upload_magazine`
--

INSERT INTO `upload_magazine` (`id`, `magazine_title`, `magazine_attachment`, `magazine_date`) VALUES
(6, 'jkjkjl', 'public/upload_delete/magazine/magazine_2016-07-17_4750.pdf', '2016-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `upload_result`
--

CREATE TABLE IF NOT EXISTS `upload_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `result_class` varchar(255) NOT NULL,
  `result_exam` varchar(255) NOT NULL,
  `result_attachment` varchar(255) NOT NULL,
  `result_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload_routine`
--

CREATE TABLE IF NOT EXISTS `upload_routine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `routine_class` varchar(255) NOT NULL,
  `routine_title` varchar(255) NOT NULL,
  `routine_attachment` varchar(255) NOT NULL,
  `routine_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `upload_routine`
--

INSERT INTO `upload_routine` (`id`, `routine_class`, `routine_title`, `routine_attachment`, `routine_date`) VALUES
(8, 'Eleven', '1st Terminal Exam', 'public/upload_delete/routine/routine_2016-07-30_4025.pdf', '2016-07-30'),
(9, 'Eleven', 'Test Class Routine', 'public/upload_delete/routine/routine_2016-07-31_6154.pdf', '2016-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `upload_syllabus`
--

CREATE TABLE IF NOT EXISTS `upload_syllabus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `syllabus_class` varchar(255) NOT NULL,
  `syllabus_attachment` varchar(255) NOT NULL,
  `syllabus_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `upload_syllabus`
--

INSERT INTO `upload_syllabus` (`id`, `syllabus_class`, `syllabus_attachment`, `syllabus_date`) VALUES
(9, 'Eleven', 'public/upload_delete/syllabus/syllabus_2016-07-17_8896.pdf', '2016-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `opening` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `maritial_status` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `facecbook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `opening`, `name`, `l_name`, `gender`, `birthday`, `maritial_status`, `position`, `about`, `website`, `facecbook`, `twitter`, `email`, `username`, `password`, `privilege`, `image`, `mobile`, `branch`) VALUES
(14, '2016-07-20 09:47:05', 'Superadmin', '', '', '0000-00-00', '', '', '', '', '', '', 'superadmin@gmail.com', 'superadmin', '262478f2a0b13b0532b5fddd18822a0f', 'super', 'public/employee/employee_superadmin.jpg', '00000000000', ''),
(19, '2016-08-03 02:02:46', 'Maruf', 'hasan', 'male', '1993-12-06', 'single', 'staff', 'Web Developer', 'marufhasan.com', 'facebook.com/emarufhasan', 'twitter.com', 'emarufhasan@gmail.com', 'marufhasan', 'a335cd148309bd8f0faf7bad63b28dd0', 'super', 'public/profiles/marufhasan.gif', '01735189237', ''),
(21, '2016-08-04 09:55:50', 'Imtiaz', 'Ahmed', 'male', '2016-08-16', 'single', 'director', 'HI there', 'marufhasan.com', 'facebook.com/emarufhasan', 'twitter.com', 'imtiaz@gmail.com', 'imtiaz_ahmed', '56fcdc119228c6b02c6eb174efe71f1c', 'admin', 'public/profiles/imtiaz_ahmed.png', '01735189578', '');

-- --------------------------------------------------------

--
-- Table structure for table `vp_speech`
--

CREATE TABLE IF NOT EXISTS `vp_speech` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `vp_speech_speech` text CHARACTER SET utf8 NOT NULL,
  `vp_speech_path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `vp_speech_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vp_speech`
--

INSERT INTO `vp_speech` (`id`, `vp_speech_speech`, `vp_speech_path`, `vp_speech_date`) VALUES
(2, '<p>ভাইস প্রিন্সিপাল এর বানি । ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।&nbsp;ভাইস প্রিন্সিপাল এর বানি ।</p>', 'public/speech/vice_principal26.jpg', '2016-07-26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
