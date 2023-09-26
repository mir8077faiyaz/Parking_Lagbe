-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 11:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activeparking`
--

INSERT INTO `activeparking` (`OID`, `PID`, `Timestart`, `Timeend`, `Status`) VALUES
(9, 15, '00:00:00', '00:00:00', 'open'),
(11, 17, '00:00:00', '00:00:00', 'open'),
(12, 18, '00:00:00', '00:00:00', 'open'),
(13, 19, '00:00:00', '00:00:00', 'open'),
(14, 20, '09:00:00', '21:00:00', 'booked'),
(15, 21, '00:00:00', '00:00:00', 'open'),
(16, 22, '00:00:00', '00:00:00', 'open'),
(17, 23, '00:00:00', '00:00:00', 'open'),
(18, 16, '00:00:00', '00:00:00', 'open'),
(19, 16, '00:00:00', '00:00:00', 'open'),
(20, 20, '00:00:00', '00:00:00', 'open');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkingspotdetails`
--

INSERT INTO `parkingspotdetails` (`PID`, `UID`, `Plocation`, `Pcoordinate`, `Pphoto`, `Psize`, `Costhour`, `Security`, `Others`) VALUES
(15, 23, 'road 2, banani, dhaka', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/bmw.jpeg', '220sqft', 30, 'cam', 'nai'),
(16, 24, 'banani dohs', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/parking 2.jpg', '220sqft', 50, 'cam', 'nai'),
(17, 25, 'banani super market', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/parking1.jpg', '225', 20, 'cam', 'nai'),
(18, 26, 'dhanmondi 2', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/parking 3.jpg', '443', 20, 'cam', 'nai'),
(19, 27, 'bfc,dhanmondi 27', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/', '443', 30, 'cam', 'nai'),
(20, 28, 'uttara 55', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/parking1.jpg', '443', 25, 'cam', 'nai'),
(21, 29, 'dhanmondi 234', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/parking 3.jpg', '443', 50, 'cam', 'nai'),
(22, 30, '12 uttara', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/parking 3.jpg', '222', 25, 'cam', 'nai'),
(23, 31, 'uttara rd 14', 0x000000000101000000429c7fa2cf5b44407974443a938052c0, '../image/parking 3.jpg', '225', 25, 'cam', 'nai');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Fname`, `Lname`, `Email`, `Password`, `PhoneNum`, `VOwner`, `POwner`) VALUES
(23, 'Shajreen', ' Tabassum', 'shajreen1@yahoo.com', '12345678', '12345678', 'no', 'yes'),
(24, 'diya', ' Tabassum', 'shajreen2@yahoo.com', '12345679', '12345679', 'no', 'yes'),
(25, 'diya', 'shaj', 'shajreen3@yahoo.com', '12345670', '12345670', 'no', 'yes'),
(26, 'mir', 'irm', 'mir@gmail.com', '23456789', '23456789', 'no', 'yes'),
(27, 'mir', 'ta', 'mir2@gmail.com', '23456789', '23456789', 'no', 'yes'),
(28, 'mir', 'ooo', 'mir1@gmail.com', 'wow12345', 'wow1234', 'no', 'yes'),
(29, 'cool', 'boy', 'mir3@gmail.com', '12345678', '12345678', 'no', 'yes'),
(30, 'cool', 'irm', 'mir99@gmail.com', '12345678', '12345678', 'no', 'yes'),
(31, 'diya', ' Tabassum', 'shajreen2000@yahoo.com', 'cutiepie16', 'cutiepie16', 'no', 'yes'),
(32, 'diya', 'shaj', 'shajreen16@gmail.com', '12345678', '12345678', 'yes', 'no');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicledetails`
--

INSERT INTO `vehicledetails` (`VID`, `UID`, `VName`, `VNum`, `VPhoto`) VALUES
(2, 32, 'gari', '876543', 0x2e2e2f696d6167652f626d772e6a706567);

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
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `parkingspotdetails`
--
ALTER TABLE `parkingspotdetails`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
