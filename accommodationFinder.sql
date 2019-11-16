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
  `allocateID` varchar(100) NOT NULL,
  `fromDate` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `unitID` varchar(100) NOT NULL,
  `applyID` varchar(100) NOT NULL
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
  `applyID` varchar(100) NOT NULL,
  `applyDate` date NOT NULL,
  `reqMonth` varchar(100) NOT NULL,
  `reqYear` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `applyUName` varchar(100) NOT NULL,
  `resID` varchar(100) NOT NULL,
  `unitNo` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `resID` varchar(100) NOT NULL,
  `resName` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `numUnits` varchar(100) NOT NULL,
  `sizePerUnit` varchar(100) NOT NULL,
  `monthlyRental` varchar(100) NOT NULL,
  `staffID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`resID`, `resName`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `username`) VALUES
('RES-5dce3f330c2f3', 'Bungalow', 'Jalan 16/11, Seksyen 16, 46350 Petaling Jaya, Selangor', '1', '1500', '600', 'Admin'),
('RES-5dce3f3daeac8', 'House', 'Changkat Bukit Utama, Bandar Utama, 47800 Petaling Jaya, Selangor', '2', '1750', '600', 'Admin'),
('RES-5dce3f4873062', 'Hotel', 'Persiaran Cakerawala, 40160 Shah Alam, Selangor', '3', '10000', '600', 'Admin');


-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitID` varchar(100) NOT NULL,
  `resID` varchar(100) NOT NULL,
  `unitNo` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `username` varchar(100) NOT NULL,
  `usertype` int(2) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100),
  `monthlyIncome` varchar(100)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `usertype`, `password`, `fullname`, `email`, `monthlyIncome`) VALUES
('Admin', 0, 'admin', 'AF Admin', '', ''),
('Jason', 1, '1', 'Jason Jonas', 'jason@jason.mail', '1200'),
('James', 1, '10', 'James Bond', 'james@FBI.mail', '7500');

-- --------------------------------------------------------

/*--
-- Indexes for dumped tables
--

-- For this part the script is inaccurate, manually assign primary keys and secondary keys with reference to this script in PHPMyAdmin database
-- DO NOT UNCOMMENT OR THIS SCRIPT WILL RUN WITH ERRORS

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applyID`);
  ADD FOREIGN KEY (`applyID`) REFERENCES allocation(`applyID`);
  ADD FOREIGN KEY (`applyUName`) REFERENCES users(`username`);
  ADD FOREIGN KEY (`resID`) REFERENCES residence(`resID`);

--
-- Indexes for table `residence`
--
ALTER TABLE `residence`
  ADD PRIMARY KEY (`resID`);
  ADD FOREIGN KEY (`resID`) REFERENCES application(`resID`);
  ADD FOREIGN KEY (`staffID`) REFERENCES users(`staffID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`resID`);
  ADD FOREIGN KEY (`resID`) REFERENCES residence(`resID`);
  ADD FOREIGN KEY (`unitNo`) REFERENCES allocation(`unitNo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
  ADD FOREIGN KEY (`username`) REFERENCES application(`applyUName`);
  ADD FOREIGN KEY (`staffID`) REFERENCES residence(`staffID`);

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`applyID`);
  ADD FOREIGN KEY (`unitNo`) REFERENCES unit(`unitNo`);
  ADD FOREIGN KEY (`applyID`) REFERENCES application(`applyID`);*/


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
