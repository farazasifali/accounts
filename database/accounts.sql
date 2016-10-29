-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2016 at 06:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) NOT NULL,
  `emp_salary` double NOT NULL,
  `emp_designation` varchar(255) NOT NULL,
  `emp_contact` varchar(50) NOT NULL,
  `emp_address` varchar(555) NOT NULL,
  `emp_join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_leave_date` datetime DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_salary`, `emp_designation`, `emp_contact`, `emp_address`, `emp_join_date`, `emp_leave_date`) VALUES
(1, 'Kashif', 12000, 'Internee Developer', '1234567', 'ABC Street', '2016-10-28 19:32:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_cat_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `exp_desc` varchar(555) NOT NULL,
  `exp_amount` double NOT NULL,
  `exp_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `exp_cat_id`, `person_id`, `exp_desc`, `exp_amount`, `exp_date`) VALUES
(1, 1, 1, 'cigrat', 120, '2016-10-27 14:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE IF NOT EXISTS `expense_category` (
  `exp_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_cat_name` varchar(255) NOT NULL,
  `exp_cat_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`exp_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`exp_cat_id`, `exp_cat_name`, `exp_cat_date`) VALUES
(1, 'general', '2016-10-27 14:08:46'),
(2, 'drawing', '2016-10-27 14:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(255) NOT NULL,
  `person_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`person_id`, `person_name`, `person_date`) VALUES
(1, 'hamza', '2016-10-27 14:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `vandor_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_amount` double NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `vandor_id`, `payment_type`, `payment_amount`, `purchase_date`) VALUES
(1, 1, 'cash', 50000, '2016-10-27 14:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE IF NOT EXISTS `purchase_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_amount` double NOT NULL,
  `item_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`item_id`, `purchase_id`, `item_name`, `item_quantity`, `item_amount`, `item_date`) VALUES
(1, 1, 'software', 1, 50000, '2016-10-27 14:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_variants`
--

CREATE TABLE IF NOT EXISTS `purchase_variants` (
  `var_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `var_name` varchar(255) NOT NULL,
  `var_amount` double NOT NULL,
  `var_quantity` int(11) NOT NULL,
  `var_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`var_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `salary_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `salary_amount` double NOT NULL,
  `salary_type` varchar(255) NOT NULL,
  `salary_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`salary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trsc_id` int(11) NOT NULL AUTO_INCREMENT,
  `trsc_type` varchar(255) NOT NULL,
  `trsc_company` varchar(255) DEFAULT NULL,
  `trsc_name` varchar(255) DEFAULT NULL,
  `trsc_amount` double NOT NULL,
  `trsc_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`trsc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_contact` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `user_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `username`, `user_email`, `user_password`, `user_contact`, `user_address`, `user_city`, `user_country`, `user_role`, `user_avatar`, `user_date`) VALUES
(1, 'Faraz Ali', 'faraz', 'farazasifali@gmail.com', '8aeaf2d0387182ce37c857ba48178c18', '03232551002', 'R-153 Block 14 F.B.Area', 'Karachi', 'Pakistan', 'super', 'default.jpg', '2016-10-28 19:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `vandor`
--

CREATE TABLE IF NOT EXISTS `vandor` (
  `vandor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vandor_name` varchar(255) DEFAULT NULL,
  `vandor_company` varchar(255) DEFAULT NULL,
  `vandor_contact` varchar(50) DEFAULT NULL,
  `vandor_address` varchar(555) DEFAULT NULL,
  `vandor_type` varchar(255) NOT NULL,
  `vandor_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vandor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vandor`
--

INSERT INTO `vandor` (`vandor_id`, `vandor_name`, `vandor_company`, `vandor_contact`, `vandor_address`, `vandor_type`, `vandor_date`) VALUES
(1, 'faraz', 'acrosofts', '03232551002', 'street abc', 'physical', '2016-10-27 14:32:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
