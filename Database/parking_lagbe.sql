-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 09:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_lagbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `activeparking`
--

CREATE TABLE `activeparking` (
  `OID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `Timestart` time NOT NULL,
  `Timeend` time NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parkinghistory`
--

CREATE TABLE `parkinghistory` (
  `OID` int(11) NOT NULL,
  `VID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TotalHours` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parkingspotdetails`
--

CREATE TABLE `parkingspotdetails` (
  `PID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Plocation` varchar(30) NOT NULL,
  `Pcoordinate` point NOT NULL,
  `Pphoto` text NOT NULL,
  `Psize` varchar(20) NOT NULL,
  `Costhour` float NOT NULL,
  `Security` varchar(40) NOT NULL,
  `Others` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(11) NOT NULL,
  `Fname` varchar(25) NOT NULL,
  `Lname` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `PhoneNum` varchar(14) NOT NULL,
  `VOwner` varchar(5) NOT NULL,
  `POwner` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetails`
--

CREATE TABLE `vehicledetails` (
  `VID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `VName` varchar(20) NOT NULL,
  `VNum` varchar(12) NOT NULL,
  `VPhoto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activeparking`
--
ALTER TABLE `activeparking`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `parkinghistory`
--
ALTER TABLE `parkinghistory`
  ADD KEY `OID` (`OID`),
  ADD KEY `VID` (`VID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `parkingspotdetails`
--
ALTER TABLE `parkingspotdetails`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD PRIMARY KEY (`VID`),
  ADD KEY `UID` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activeparking`
--
ALTER TABLE `activeparking`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parkingspotdetails`
--
ALTER TABLE `parkingspotdetails`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activeparking`
--
ALTER TABLE `activeparking`
  ADD CONSTRAINT `PID` FOREIGN KEY (`PID`) REFERENCES `parkingspotdetails` (`PID`) ON DELETE CASCADE,
  ADD CONSTRAINT `activeparking_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `parkingspotdetails` (`PID`);

--
-- Constraints for table `parkinghistory`
--
ALTER TABLE `parkinghistory`
  ADD CONSTRAINT `parkinghistory_ibfk_1` FOREIGN KEY (`OID`) REFERENCES `activeparking` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `parkinghistory_ibfk_2` FOREIGN KEY (`VID`) REFERENCES `vehicledetails` (`VID`) ON DELETE CASCADE,
  ADD CONSTRAINT `parkinghistory_ibfk_3` FOREIGN KEY (`PID`) REFERENCES `parkingspotdetails` (`PID`) ON DELETE CASCADE;

--
-- Constraints for table `parkingspotdetails`
--
ALTER TABLE `parkingspotdetails`
  ADD CONSTRAINT `parkingspotdetails_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE;

--
-- Constraints for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD CONSTRAINT `vehicledetails_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
