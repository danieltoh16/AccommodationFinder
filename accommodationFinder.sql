-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2019 at 10:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accommodationFinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `allocateID` varchar(20) NOT NULL,
  `fromDate` date NOT NULL,
  `duration` varchar(10) NOT NULL,
  `unitID` varchar(20) NOT NULL,
  `applyID` varchar(20) NOT NULL,
  PRIMARY KEY (`allocateID`),
  FOREIGN KEY (`unitID`) REFERENCES unit(`unitID`),
  FOREIGN KEY (`applyID`) REFERENCES application(`applyID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`allocateID`, `fromDate`, `duration`, `unitID`, `applyID`) VALUES
('ALC-5dcf849e9c072', '19-1-2019', '12 months', 'UNIT-5dcf702a6dba7', 'APP-5dce3ef54958e'),
('ALC-5dcf84ae7c9be', '6-7-2019', '12 months', 'UNIT-5dcf719db95a8', 'APP-5dce3f04628fa'),
('ALC-5dcf84b76c416', '12-12-2019', '18 months', 'UNIT-5dcf71e0c99ca', 'APP-5dce3f10dece7');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applyID` varchar(20) NOT NULL,
  `applyDate` date NOT NULL,
  `reqMonth` char(10) NOT NULL,
  `reqYear` int(4) NOT NULL,
  `status` char(10) NOT NULL,
  `applyUName` varchar(30) NOT NULL,
  `resID` varchar(20) NOT NULL,
  `unitNo` int(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  PRIMARY KEY (`applyID`),
  FOREIGN KEY (`applyUName`) REFERENCES users(`username`),
  FOREIGN KEY (`resID`) REFERENCES residence(`resID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applyID`, `applyDate`, `reqMonth`, `reqYear`, `status`, `applyUName`, `resID`, `unitNo`, `duration`) VALUES
('APP-5dce3ef54958e', '2018-03-18', 'January', '2020', 'New', 'Jason', 'RES-5dce3f330c2f3', '1', '12 months'),
('APP-5dce3f04628fa', '2018-08-19', 'February', '2020', 'New', 'James', 'RES-5dce3f3daeac8', '2', '12 months'),
('APP-5dce3f10dece7', '2019-04-09', 'April', '2020', 'New', 'Jason', 'RES-5dce3f4873062', '3', '18 months');

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE `residence` (
  `resID` varchar(20) NOT NULL,
  `resName` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `numUnits` int(10) NOT NULL,
  `sizePerUnit` int(10) NOT NULL,
  `monthlyRental` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`resID`),
  FOREIGN KEY (`username`) REFERENCES users(`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`resID`, `resName`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `username`) VALUES
('RES-5dce3f330c2f3', 'Bungalow', 'Jalan 16/11, Seksyen 16, 46350 Petaling Jaya, Selangor', '1', '1500', '600', 'Admin'),
('RES-5dce3f3daeac8', '1 Bukit Utama', 'Changkat Bukit Utama, Bandar Utama, 47800 Petaling Jaya, Selangor', '2', '1750', '600', 'Admin'),
('RES-5dce3f4873062', 'House', 'Persiaran Cakerawala, 40160 Shah Alam, Selangor', '3', '10000', '600', 'Admin');


-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitID` varchar(20) NOT NULL,
  `resID` varchar(20) NOT NULL,
  `unitNo` int(10) NOT NULL,
  `availability` char(10) NOT NULL,
  PRIMARY KEY (`unitID`),
  FOREIGN KEY (`resID`) REFERENCES residence(`resID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitID`, `resID`, `unitNo`, `availability`) VALUES
('UNIT-5dcf702a6dba7', 'RES-5dce3f330c2f3', '1', 'booked'),
('UNIT-5dcf71905d423', 'RES-5dce3f3daeac8', '1', 'available'),
('UNIT-5dcf719db95a8', 'RES-5dce3f3daeac8', '2', 'booked'),
('UNIT-5dcf71bc477ef', 'RES-5dce3f4873062', '1', 'available'),
('UNIT-5dcf71ce0eb10', 'RES-5dce3f4873062', '2', 'available'),
('UNIT-5dcf71e0c99ca', 'RES-5dce3f4873062', '3', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `usertype` int(1) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(30),
  `monthlyIncome` int(10),
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `usertype`, `password`, `fullname`, `email`, `monthlyIncome`) VALUES
('Admin', 0, 'admin', 'Daniel Nicholas Figueras Toh', '', ''),
('Jason', 1, '1', 'Jason Jonas', 'jason@jason.mail', '1200'),
('James', 1, '10', 'James Bond', 'james@FBI.mail', '7500');

-- --------------------------------------------------------

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
