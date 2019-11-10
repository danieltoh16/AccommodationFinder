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
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applyID` varchar(100) NOT NULL,
  `applyDate` date NOT NULL,
  `reqMonth` varchar(100) NOT NULL,
  `reqYear` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `applyUName` varchar(100) NOT NULL,
  `resID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applyID`, `applyDate`, `reqMonth`, `reqYear`, `status`, `applyUName`, `resID`) VALUES
('APP-5cabb148ecd3d3.62079945', '0000-00-00', 'January', '2020', 'New', 'Jason', 'PRG-5caec0ceee50a8.60700779'),
('APP-5cabb14d9bf098.23809809', '0000-00-00', 'February', '2020', 'New', 'James', 'PRG-5caec0ceee50a8.60700779'),
('APP-5cac331177c711.88469473', '2019-04-09', 'April', '2020', 'New', 'Jason', 'PRG-5caec0ceee50a8.60700779'),
('APP-5cac346a2f9232.91667553', '2019-04-09', 'May', '2020', 'New', 'James', 'PRG-5caec0ceee50a8.60700779'),
('APP-5cac42ef096e21.41079669', '2019-04-09', 'July', '2019', 'New', 'Jason', 'PRG-5caec0ceee50a8.60700779'),
('APP-5cac432182bae9.25744825', '2019-04-09', 'August', '2019', 'New', 'James', 'PRG-5caec0ceee50a8.60700779'),
('APP-5caed41df3c986.93355827', '2019-04-11', 'October', '2019', 'Successful', 'Jason', 'PRG-5caec0ceee50a8.60700779');

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE `residence` (
  `resID` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `numUnits` varchar(100) NOT NULL,
  `sizePerUnit` varchar(100) NOT NULL,
  `monthlyRental` varchar(100) NOT NULL,
  `staffID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`resID`, `address`, `numUnits`, `sizePerUnit`, `monthlyRental`, `staffID`) VALUES
('RES-5caec0ceee50a8.60700779', 'No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan, Bukit Damansara, 50490 Kuala Lumpur', '4', '1000', '600', 'Admin'),
('RES-1', 'House', '1', '1500', '600', 'Admin'),
('RES-2', 'House', '2', '1750', '600', 'Admin'),
('RES-3', 'House', '3', '10000', '600', 'Admin');


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
('RES-5caec0ceee50a8.60700779', '1', 'available'),
('RES-5caec0ceee50a8.60700779', '2', 'available');

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
('ADM-1', 0, 'Admin', 'admin', 'AF Admin', '', ''),
('', 1, 'Jason', '1', 'Jason', 'Jason', '1200'),
('ADM-5caed2df820a45.98044678', 0, 'uniAdmin', 'uniAdmin1', '', 'H', ''),
('', 1, 'App', '1234', 'John doe', 'Jdot', '1100'),
('ADM-5ca7d8a10ec069.92281260', 0, 'P', 'P', 'P', '', ''),
('ADM-5ca8dc8d641ef6.82278431', 0, 'Q', 'Q', 'Q', '', ''),
('ADM-5cac3c6bce4b11.60856988', 0, 'Helpadmin', 'Test', 'Helpadmin', '', ''),
('ADM-5ca8e215a53420.06095379', 0, 'Name', 'Word', 'Bane', '', ''),
('', 1, 'Hs', 'test', 'Hahshs', 'Hshshs', '2000'),
('', 1, 'James', 'Test', 'Abbb', 'Bbdbb', '3500'),
('ADM-5caad44b79f9c1.57574997', 0, 'New', 'Check', 'Ok', '', ''),
('ADM-5caad4ce5d9a87.93408646', 0, 'L', 'L', 'L', '', ''),
('ADM-5cac3da1d6a616.74569864', 0, '2', '2', '2', '', '');

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
('19-01-2019', '1 year', '19-01-2020', '1', 'APP-5cabb148ecd3d3.62079945'),
('6-7-2019', '2 years', '6-8-2021', '2', 'APP-5cabb14d9bf098.23809809'),
('12-12-2019', '3 years', '31-12-2022', '3', 'APP-5caed41df3c986.93355827');

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
