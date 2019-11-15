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
  `fromDate` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `endDate` varchar(100) NOT NULL,
  `unitNo` varchar(100) NOT NULL,
  `applyID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`fromDate`, `duration`, `endDate`, `unitNo`, `applyID`) VALUES
('19-01-2019', '1 year', '19-01-2020', '1', 'APP-5dce3ef54958e'),
('6-7-2019', '2 years', '6-8-2021', '2', 'APP-5dce3f04628fa'),
('12-12-2019', '3 years', '31-12-2022', '3', 'APP-5dce3f10dece7');

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

INSERT INTO `residence` (`resID`, `resName`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `staffID`) VALUES
('RES-5dce3f330c2f3', 'Bungalow', 'Jalan 16/11, Seksyen 16, 46350 Petaling Jaya, Selangor', '1', '1500', '600', 'ADM-5dce404781526'),
('RES-5dce3f3daeac8', 'House', 'Changkat Bukit Utama, Bandar Utama, 47800 Petaling Jaya, Selangor', '2', '1750', '600', 'ADM-5dce404781526'),
('RES-5dce3f4873062', 'Hotel', 'Persiaran Cakerawala, 40160 Shah Alam, Selangor', '3', '10000', '600', 'ADM-5dce40626e052');


-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `resID` varchar(100) NOT NULL,
  `unitNo` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`resID`, `unitNo`, `availability`) VALUES
('RES-5dce3f330c2f3', '1', 'available'),
('RES-5dce3f3daeac8', '1', 'available'),
('RES-5dce3f3daeac8', '2', 'available'),
('RES-5dce3f4873062', '1', 'available'),
('RES-5dce3f4873062', '2', 'available'),
('RES-5dce3f4873062', '3', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `staffID` varchar(100),
  `usertype` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100),
  `monthlyIncome` varchar(100)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`staffID`, `usertype`, `username`, `password`, `fullname`, `email`, `monthlyIncome`) VALUES
('ADM-5dce404781526', 0, 'Admin', 'admin', 'AF Admin', '', ''),
('ADM-5dce4052b084c', 0, 'adibraup', '123', 'Adib Raup', '', ''),
('ADM-5dce40626e052', 0, 'danieltoh16', 'danieltoh16', 'Daniel Nicholas Figueras Toh', '', ''),
('ADM-5dce406cb212e', 0, 'nicholasksetiadi', 'nk1', 'Nicholas Kelsey Setiadi', '', ''),
('ADM-5dce407653885', 0, 'yuechidongz', 'yc1', 'Yue QiDong', '', ''),
('', 1, 'Jason', '1', 'Jason Jonas', 'jason@jason.mail', '1200'),
('', 1, 'James', '10', 'James Bond', 'james@FBI.mail', '7500');

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
