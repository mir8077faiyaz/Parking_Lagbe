-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 09:36 PM
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
  `PID` int(11) NOT NULL,
  `Timestart` time NOT NULL,
  `Timeend` time NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activeparking`
--

INSERT INTO `activeparking` (`PID`, `Timestart`, `Timeend`, `Status`) VALUES
( 26, '16:00:00', '18:00:00', 'booked'),
( 27, '00:00:00', '00:00:00', 'open'),
(25, '00:00:00', '00:00:00', 'open'),
( 28, '00:00:00', '00:00:00', 'open'),
( 26, '00:00:00', '00:00:00', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `parkinghistory`
--

CREATE TABLE `parkinghistory` (
  `VID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TotalHours` int(11) NOT NULL,
  `TotalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkinghistory`
--

INSERT INTO `parkinghistory` (`VID`, `PID`, `Date`, `TotalHours`, `TotalCost`) VALUES
(3, 26, '2023-10-28', 2, 60);

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
(25, 35, 'Asiana apartments, Shyamoli, D', 0x000000000101000000be14b5c168c637400000008b4e975640, '../image/parking 2.jpg', '220sqft', 25, 'Available', 'Camera available'),
(26, 36, 'Banani super market', 0x000000000101000000f1fb903629cb3740b149e18e039a5640, '../image/parking1.jpg', '443sqft', 30, 'Cam', 'N/A'),
(27, 37, 'Banani road 11', 0x000000000101000000778b091e61ca374076f39e85ef995640, '../image/parking 3.jpg', '222sqft', 20, 'Guards available', 'basement 1'),
(28, 38, 'Road 4, Banani, Dhaka', 0x00000000010100000098b63a4837cb3740ec794684b3995640, '../image/parking 3.jpg', '225sqft', 30, 'Cam', 'Basement 1'),
(31, 52, 'road 5, sector 4, Uttara', 0x000000000101000000c0a9e94311dc3740be61bf00c3995640, '../image/parking 3.jpg', '443sqft', 50, 'Guards Available', 'Camera Available');

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
(34, 'Shajreen', 'Diya', 'shajreen16@gmail.com', '12345678', '01818926753', 'yes', 'no'),
(35, 'Mir', 'Faiyaz', 'mir@gmail.com', 'abcdefghij', '01812345678', 'no', 'yes'),
(36, 'Shajreen', 'Tabassum', 'shajreen2000@yahoo.com', '12345678', '01912345670', 'no', 'yes'),
(37, 'Mir', 'Hossain', 'mirhossain8077@gmail.com', 'mir123456', '01712345679', 'no', 'yes'),
(38, 'Abrar', 'Aziz', 'abrar.aziz@gmail.com', '12345678', '01346875469', 'no', 'yes'),
(42, 'Faiyaz', 'Hossain', 'mir2@gmail.com', '123456789', '01912345670', 'yes', 'no'),
(45, 'Mir fairuz', 'husen', 'mir99@gmail.com', '12345678', '12345670', 'yes', 'no'),
(47, 'Naqib', 'Hussain', 'naqib@yahoo.com', '123456789', '01818928987', 'yes', 'no'),
(50, 'mir', 'husen', 'mir@nsu.edu', 'kalobiral', '01818928200', 'no', 'yes'),
(52, 'Shajreen Tabassum', 'shaj', 'diya@outlook.com', '12345678', '01711428234', 'no', 'yes'),
(53, 'diya', 'shaj', 'shajreen1000@yahoo.com', '12345678', '12345678643', 'no', 'yes');

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
(3, 34, 'Toyota Corolla', 'Dhaka Metro-', 0x2e2e2f696d6167652f636172312e6a7067),
(5, 42, 'BMW', 'Dhaka Metro-', 0x2e2e2f696d6167652f626d772e6a706567),
(6, 45, 'BMW', 'Dhaka Metro-', 0x2e2e2f696d6167652f626d772e6a706567),
(7, 47, 'BMW', 'Dhaka Metro-', 0x2e2e2f696d6167652f626d772e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activeparking`
--
ALTER TABLE `activeparking`
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `parkinghistory`
--
ALTER TABLE `parkinghistory`
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
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `Email` (`Email`);

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

-- AUTO_INCREMENT for table `parkingspotdetails`
--
ALTER TABLE `parkingspotdetails`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
