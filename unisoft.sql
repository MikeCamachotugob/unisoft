-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2016 at 10:50 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unisoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `in_out_stock_log`
--

CREATE TABLE IF NOT EXISTS `in_out_stock_log` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prev_qty` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `handled_by` varchar(100) NOT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `in_out_stock_log`
--

INSERT INTO `in_out_stock_log` (`action_id`, `action`, `prod_name`, `prod_qty`, `prev_qty`, `date`, `remarks`, `handled_by`) VALUES
(11, 'in', '0', 1001, 1000, '', '', ''),
(12, 'in', 'car', 1002, 1001, '', '', ''),
(13, 'in', 'car', 1004, 1002, '', '', ''),
(14, 'in', 'car', 1139, 1004, '', '', 'michael camacho'),
(15, 'in', 'car', 1274, 1139, '2016-09-11 08:13:25pm', '', 'michael camacho'),
(16, 'in', 'car', 1284, 1274, '2016-09-11 08:16:15pm', '', 'michael camacho'),
(17, 'out', 'car', 1274, 1284, '2016-09-11 08:30:46pm', '', 'michael camacho'),
(18, 'out', 'car', 1139, 1274, '2016-09-11 09:17:00pm', 'ok', 'michael camacho');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE IF NOT EXISTS `log_history` (
  `user_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`user_id`, `date`, `action`, `log_id`) VALUES
(0, '2016-09-11 19:35:27', 'in', 1),
(0, '2016-09-11 19:35:27', 'in', 2),
(0, '2016-09-11 19:36:17', 'in', 3),
(11111, '2016-09-11 19:48:26', 'in', 4),
(11111, '2016-09-11 19:50:28', 'out', 5),
(11111, '2016-09-11 19:50:33', 'in', 6),
(11111, '2016-09-11 19:54:31', 'out', 7),
(11112, '2016-09-11 19:54:40', 'in', 8),
(11112, '2016-09-11 19:54:44', 'out', 9),
(11111, '2016-09-11 19:54:49', 'in', 10),
(11111, '2016-09-11 20:34:46', 'out', 11),
(11112, '2016-09-11 20:34:56', 'in', 12),
(11111, '2016-09-11 21:14:03', 'in', 13),
(11111, '2016-09-12 10:04:44', 'in', 14),
(11111, '2016-09-12 14:30:02', 'in', 15),
(11111, '2016-09-12 17:53:35', 'in', 16),
(11111, '2016-09-12 18:04:54', 'out', 17),
(11111, '2016-09-12 18:06:43', 'in', 18),
(11111, '2016-09-12 18:08:10', 'out', 19),
(11111, '2016-09-13 09:42:32', 'in', 20),
(11111, '2016-09-13 09:55:53', 'in', 21),
(11111, '2016-09-13 09:59:13', 'out', 22),
(11113, '2016-09-13 10:04:29', 'in', 23),
(11113, '2016-09-13 10:04:38', 'in', 24),
(11111, '2016-09-13 10:10:39', 'in', 25),
(11111, '2016-09-13 10:16:30', 'out', 26),
(11111, '2016-09-13 10:16:34', 'in', 27),
(11111, '2016-09-13 10:16:59', 'in', 28),
(11111, '2016-09-13 10:16:59', 'in', 29),
(11111, '2016-09-13 10:19:18', 'out', 30),
(11111, '2016-09-13 10:19:23', 'in', 31),
(11111, '2016-09-13 10:45:58', 'out', 32),
(11111, '2016-09-13 10:46:02', 'in', 33),
(11111, '2016-09-13 17:54:03', 'in', 34),
(11111, '2016-09-13 19:25:21', 'in', 35),
(11111, '2016-09-13 19:25:28', 'out', 36),
(11111, '2016-09-13 19:25:33', 'in', 37),
(11111, '2016-09-13 19:48:57', 'out', 38),
(11111, '2016-09-13 19:49:01', 'in', 39),
(11111, '2016-09-13 19:49:17', 'out', 40),
(11111, '2016-09-13 19:49:20', 'in', 41),
(11111, '2016-09-14 02:35:10', 'in', 42),
(11111, '2016-09-14 10:00:23', 'in', 43),
(11111, '2016-09-14 10:33:48', 'out', 44),
(11111, '2016-09-14 16:57:18', 'in', 45),
(11111, '2016-09-15 06:12:38', 'in', 46),
(11111, '2016-09-15 10:09:51', 'in', 47),
(11111, '2016-09-15 10:32:33', 'in', 48),
(11111, '2016-09-16 10:34:06', 'in', 49),
(11111, '2016-09-16 10:34:06', 'in', 50),
(11111, '2016-09-16 10:34:06', 'in', 51),
(11111, '2016-09-16 10:40:29', 'in', 52);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_list`
--

CREATE TABLE IF NOT EXISTS `purchase_list` (
  `prod_name` varchar(100) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_barcode` int(11) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliants`
--

CREATE TABLE IF NOT EXISTS `suppliants` (
  `supp_id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `landline` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`supp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11114 ;

--
-- Dumping data for table `suppliants`
--

INSERT INTO `suppliants` (`supp_id`, `company`, `first_name`, `middle_name`, `last_name`, `email`, `landline`, `fax`, `mobile`) VALUES
(11111, 'samb', 'kimber', 's', 'sambilay', 'sambilay@gmail.com', '999999', '11111', '112222'),
(11112, 'llanera', 'edvin', 'e', 'llanera', 'llanera@gmail.com', '8888888', '999000', '999888'),
(11113, 'dddd', 'sfsafsa', 'safsafsa', 'safsadfsaf', 'sadfdsafsdafsda@gmail.com', '1232132131', '123123', '12321312');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(100) NOT NULL,
  `handled_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `company`, `handled_by`, `status`) VALUES
(1, 'llanera', '', ''),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE IF NOT EXISTS `trans_details` (
  `trans_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_barcode` int(11) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`trans_id`, `prod_name`, `prod_qty`, `prod_barcode`, `prod_price`, `prod_desc`) VALUES
(1, 'car', 11, 49829, 0, ''),
(1, 'truck', 11, 44124, 0, ''),
(2, 'car', 1, 49829, 0, ''),
(3, 'truck', 2, 34321432, 0, ''),
(4, 'truck', 1, 34321432, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(100) NOT NULL,
  `landline_no` varchar(100) NOT NULL,
  `street_no` varchar(100) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `middle_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `position` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_type` varchar(60) NOT NULL,
  `status` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11126 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `mobile_no`, `landline_no`, `street_no`, `street_name`, `city`, `first_name`, `middle_name`, `last_name`, `position`, `username`, `password`, `user_type`, `status`, `gender`, `email`, `birthdate`) VALUES
(11111, '12345', '543321', '1', 'castilla', 'quezon city', 'michael', 'tugob', 'camacho', 'general manager', 'admin', 'password', 'admin', 'activated', 'male', 'm@gmail.com', '2011-11-10'),
(11112, '', '', '', '', '', 'gia', 'tugob', 'arboyes', 'accountant', 'employee', 'password', 'employee', 'activated', '', '', ''),
(11115, '', '', '', '', '', 'lkfkdsaflk', 'kjdslkfjsaldf', 'l;jdslkfjlsa;', '', 'jskdfjkdsf', 'lksdjflksjdlkfj', 'admin', '', 'male', 'm.camacho@gmail.com', '2016-08-18'),
(11116, '', '', '', '', '', 'dfsadsa', 'dfsdfsadfsa', 'dsffdsa', 'sdafasd', 'dssafdf', 'dsafdsfdsa', 'admin', '', 'male', 'm.camacho@gmail.com', '2016-08-19'),
(11117, '', '', '', '', '', 'mike', 'camacho', 'l;jdslkfjlsa;', 'sdafasd', 'admin', 'lksdjflksjdlkfj', 'admin', 'deactivated', 'female', 'sadfsdaf@gmail.com', '2016-08-20'),
(11118, '', '', '', '', '', 'dd', 'tugob', 'dsffdsa', 'sdafasd', 'admin', 'lksdjflksjdlkfj', 'admin', 'deactivated', 'male', 'sadfsdaf@gmail.com', '2016-08-27'),
(11119, '', '', '', '', '', 'dd', 'camacho', 'dsffdsa', 'sdafasd', 'employee', 'lksdjflksjdlkfj', 'admin', 'deactivated', 'male', 'm.camacho@gmail.com', '2016-08-18'),
(11120, '', '', '', '', '', 'lfjdsalfjsal', 'jlfjdwlfjdl', 'fldsjfldsj', 'sdafasd', 'lasjfljdsalfj', 'lfjsalfjsld', 'admin', 'deactivated', 'female', 'm.camacho@gmail.com', '2016-09-23'),
(11121, '', '', '', '', '', '', '', '', '', '', '', '', 'deactivated', '', '', ''),
(11122, '', '', '', '', '', '', '', '', '', '', '', '', 'deactivated', '', '', ''),
(11123, '', '', '', '', '', '', '', '', '', '', '', '', 'deactivated', '', '', ''),
(11124, '', '', '', '', '', '', '', '', '', '', '', 'admin', 'deactivated', 'male', '', ''),
(11125, '', '', '', '', '', '9898989898', '9898989898', '9898989898', '9898989898', '89898989', '9898989898', 'employee', 'deactivated', 'male', '9898989898@gmail.com', '2016-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_barcode` varchar(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11121 ;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`prod_id`, `prod_barcode`, `prod_name`, `prod_desc`, `prod_price`, `prod_qty`, `status`) VALUES
(11111, '12341234', 'car', 'blue', 99, 1139, 'active'),
(11112, '34321432', 'truck', 'green', 89, 700, 'active'),
(11114, '534533', 'airplane', 'black', 78, 600, 'active'),
(11115, '2147483647', 'tank', 'grey', 237, 1444, 'active'),
(11116, '2147483647', 'mouse', 'good', 300, 0, 'active'),
(11120, '12hii21i21', 'broom', 'broom pow', 1000, 0, 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
