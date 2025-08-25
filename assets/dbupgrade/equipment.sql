-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2025 at 06:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `Equipmentid` int(11) NOT NULL,
  `Sublocation_id` int(11) DEFAULT NULL,
  `Equipmentname` varchar(200) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `Notes` varchar(100) DEFAULT NULL,
  `Serialnumber` varchar(50) DEFAULT NULL,
  `Monitoringgroup` int(11) DEFAULT NULL,
  `Category` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Equipmentid`, `Sublocation_id`, `Equipmentname`, `supplier_id`, `Notes`, `Serialnumber`, `Monitoringgroup`, `Category`) VALUES
(5, 12, 'Mustang 02', 5, '', '90.010.1', NULL, NULL),
(6, 12, 'GA Aisle Equipment Mustang Bottom', 5, '', '90.020.1', NULL, NULL),
(7, 12, 'KT Combi Telescope', 5, '', '90.030.1', NULL, NULL),
(8, 12, 'GA Aisle Equipment Mustang Top', 5, '', '90.040.1', NULL, NULL),
(9, 13, 'Mustang 03', 5, '', '90.010.2', NULL, NULL),
(10, 13, 'GA Aisle Equipment Mustang Bottom', 5, '', '90.020.2', NULL, NULL),
(11, 13, 'KT Combi Telescope', 5, '', '90.030.2', NULL, NULL),
(12, 13, 'GA Aisle Equipment Mustang Top', 5, '', '90.040.2', NULL, NULL),
(13, 14, 'Mustang 04', 5, '', '90.010.3', NULL, NULL),
(14, 14, 'GA Aisle Equipment Mustang Bottom', 5, '', '90.020.3', NULL, NULL),
(15, 14, 'KT Combi Telescope', 5, '', '90.030.3', NULL, NULL),
(16, 14, 'GA Aisle Equipment Mustang Top', 5, '', '90.040.3', NULL, NULL),
(17, 41, 'Universal Packaging Unit US 2100 No2', 5, '', '210121', NULL, NULL),
(18, 41, 'Universal Packaging Unit US 2100 No1', 5, '', '210190', NULL, NULL),
(19, 15, '30001-ZUS Timing Belt Offset M', 5, '', '30001', 11, 'TGW'),
(20, 15, '30002-KRF Curved Roller Conveyor', 5, '', '30002', 12, 'TGW'),
(21, 15, '30005-ZAS Timing Belt Transfer M', 5, '', '30005', 12, 'TGW'),
(22, 15, '30011-RFM Roller Conveyor Multi Center Drive', 5, '', '30011', 12, 'TGW'),
(23, 15, '30012-RFM Roller Conveyor Multi Center Drive', 5, '', '30012', 12, 'TGW'),
(24, 15, '30015-KRF Curved Roller Conveyor', 5, '', '30015', 12, 'TGW'),
(25, 15, '30016-GF Belt Conveyor Center Drive', 5, '', '30016', 12, 'TGW'),
(26, 15, '30017-KRF Curved Roller Conveyor MR', 5, '', '30017', 12, 'TGW'),
(27, 15, '30020-GSH Frame Lift', 5, '', '30020', 12, 'TGW'),
(28, 15, '30030-GF Belt Conveyor Center Drive LHD', 5, '', '30030', 12, 'TGW'),
(29, 15, '30050-RFM Roller Conveyor Multi Center Drive', 5, '', '30050', 12, 'TGW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Equipmentid`),
  ADD KEY `FK_Equipment_Sublocation` (`Sublocation_id`),
  ADD KEY `FK_Equipment_Supplier` (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `Equipmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=669;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `FK_Equipment_Sublocation` FOREIGN KEY (`Sublocation_id`) REFERENCES `sublocation` (`Sublocationid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Equipment_Supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`Supplierid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
