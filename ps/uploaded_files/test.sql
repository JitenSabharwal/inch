-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2014 at 07:21 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Project-id` varchar(30) NOT NULL,
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Name`, `Username`, `Password`, `Project-id`, `Role`) VALUES
('Jiten Sabharwal', 'Jiten', '123456', 'P-10007', 'Team Member'),
('Garvit Vijay', 'Garvit', '987654', 'P-10008', 'Team Menber');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Project-Name` varchar(30) NOT NULL,
  `Project-id` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Initiated-by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project-Name`, `Project-id`, `Status`, `Date`, `Initiated-by`) VALUES
('Project 1', 'P-1000', 'Created', '2014-07-01', 'Arjun'),
('Project-2', 'P-2000', 'Started', '2014-09-05', 'Garvit');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `SNo` int(11) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Quality` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`SNo`, `Description`, `Quality`, `Type`) VALUES
(1, 'sdfsd', 'sdfsd', 'carpenter'),
(1, 'sdfsd', 'sdfsd', 'carpenter'),
(1, 'sdfsd', 'sdfsd', 'carpenter');

-- --------------------------------------------------------

--
-- Table structure for table `trial`
--

CREATE TABLE IF NOT EXISTS `trial` (
  `Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trial`
--

INSERT INTO `trial` (`Name`, `Password`) VALUES
('as', 'asf'),
('Jiten', 'h123456'),
('Jiten', 'h123456'),
('Jiten', 'h123456'),
('Jiten', 'h123456'),
('Jiten', 'h123456'),
('iten', 'h1c23456'),
('iten', 'h1c23456'),
('ildften', 'h1c23456'),
('vxzcvxzcvxildften', 'h1c23bkjvvv456'),
('vxzcvxzcvxildften', 'h1c23bkjvvv456'),
('vxzcvxzcvxildften', 'h1c23bkjvvv456'),
('vxzcvxzcvxildften', 'h1c23bkjvvv456'),
('vxzcvxzcvxildften', 'h1c23bkjvvv456');

-- --------------------------------------------------------

--
-- Table structure for table `workorder`
--

CREATE TABLE IF NOT EXISTS `workorder` (
  `Sno` int(11) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Quality` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorder`
--

INSERT INTO `workorder` (`Sno`, `Description`, `Quality`, `Type`) VALUES
(1, 'hello', 'good', ''),
(1, 'hello', 'good', ''),
(1, 'hello', 'good', ''),
(1, 'hello', 'good', ''),
(1, 'hello', 'good', ''),
(1, 'aoihfajfna', 'dhfsdkj', ''),
(2, 'hvdjsdbv', 'soidvhnos', ''),
(1, 'sdd', 'dsfs', ''),
(2, 'sdfsd', 'dfsd', ''),
(1, 'df', 'fbdf', 'carpenter'),
(1, 'sds', 'sdgs', 'carpenter'),
(1, 'sds', 'sdgs', 'carpenter');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
