-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 09:16 AM
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

--
-- Dumping data for table `activeparking`
--

INSERT INTO `activeparking` (`OID`, `PID`, `Timestart`, `Timeend`, `Status`) VALUES
(5, 9, '00:00:00', '00:00:00', 'open'),
(6, 10, '00:00:00', '00:00:00', 'open'),
(7, 13, '00:00:00', '00:00:00', 'open'),
(8, 14, '00:00:00', '00:00:00', 'open');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activeparking`
--
ALTER TABLE `activeparking`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activeparking`
--
ALTER TABLE `activeparking`
  ADD CONSTRAINT `PID` FOREIGN KEY (`PID`) REFERENCES `parkingspotdetails` (`PID`) ON DELETE CASCADE,
  ADD CONSTRAINT `activeparking_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `parkingspotdetails` (`PID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
