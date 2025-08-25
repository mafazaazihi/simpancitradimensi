-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2025 at 04:36 AM
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
-- Database: `simpan_e`
--

-- --------------------------------------------------------

--
-- Table structure for table `actafter`
--

CREATE TABLE `actafter` (
  `Actafterid` int(11) NOT NULL,
  `Task_id` int(11) NOT NULL,
  `Latitude` varchar(400) NOT NULL,
  `Longitude` varchar(400) NOT NULL,
  `Image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `actbefore`
--

CREATE TABLE `actbefore` (
  `Actbeforeid` int(11) NOT NULL,
  `Task_id` int(11) NOT NULL,
  `Latitude` varchar(400) NOT NULL,
  `Longitude` varchar(400) NOT NULL,
  `Image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auditlog`
--

CREATE TABLE `auditlog` (
  `Auditid` int(11) NOT NULL,
  `Session_id` varchar(300) NOT NULL,
  `Userid` varchar(30) NOT NULL,
  `Auditdate` datetime NOT NULL,
  `Action` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `Checklistid` int(11) NOT NULL,
  `Type_id` int(11) DEFAULT NULL,
  `Name` varchar(240) DEFAULT NULL,
  `Recomended` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cmdetail`
--

CREATE TABLE `cmdetail` (
  `cmdetailid` int(11) NOT NULL,
  `Task_id` int(11) NOT NULL,
  `Action` varchar(200) NOT NULL,
  `Solution` varchar(200) NOT NULL,
  `Rootcause` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `handover`
--

CREATE TABLE `handover` (
  `Handoverid` int(11) NOT NULL,
  `Location_id` int(11) DEFAULT NULL,
  `Shift` varchar(50) DEFAULT NULL,
  `Created` varchar(50) DEFAULT NULL,
  `Approved` varchar(50) DEFAULT NULL,
  `Approveddate` datetime DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Nextlead` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handovercheck`
--

CREATE TABLE `handovercheck` (
  `Handovercheckid` int(11) NOT NULL,
  `Handoverid` int(11) DEFAULT NULL,
  `ChecklistName` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Done` int(11) DEFAULT NULL,
  `Undone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handovermember`
--

CREATE TABLE `handovermember` (
  `Handovermemberid` int(11) NOT NULL,
  `Handoverid` int(11) DEFAULT NULL,
  `Member` varchar(50) DEFAULT NULL,
  `Handytalkie` varchar(300) DEFAULT NULL,
  `Finalcondition` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Locationid` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintcategory`
--

CREATE TABLE `maintcategory` (
  `Maintcategoryid` int(11) NOT NULL,
  `Categoryname` varchar(50) DEFAULT NULL,
  `Description` varchar(225) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  `Lastupdate` datetime DEFAULT NULL,
  `Editby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `maintcategory`
--

INSERT INTO `maintcategory` (`Maintcategoryid`, `Categoryname`, `Description`, `Active`, `Lastupdate`, `Editby`) VALUES
(2, 'Preventive Maintenance', NULL, NULL, '2025-07-23 04:28:17', NULL),
(3, 'Corrective Maintenance', NULL, NULL, '2025-07-23 04:29:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monitoringgroup`
--

CREATE TABLE `monitoringgroup` (
  `Groupid` int(11) NOT NULL,
  `Day` varchar(50) DEFAULT NULL,
  `Shif` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monitoringresult`
--

CREATE TABLE `monitoringresult` (
  `Monitoringresultid` int(11) NOT NULL,
  `Task_id` int(11) DEFAULT NULL,
  `Equipment_id` int(11) DEFAULT NULL,
  `Itemcheck` varchar(100) DEFAULT NULL,
  `Result` varchar(50) DEFAULT NULL,
  `Flagedfinish` int(11) DEFAULT NULL,
  `Submiteddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partadd`
--

CREATE TABLE `partadd` (
  `Stokid` int(11) NOT NULL,
  `Part_id` varchar(200) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Lastupdate` int(11) DEFAULT NULL,
  `SerialNumber` varchar(50) DEFAULT NULL,
  `Price` decimal(18,2) DEFAULT NULL,
  `OpbNumber` varchar(50) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `AlreadyUsed` int(11) DEFAULT NULL,
  `Supplier_id` int(11) DEFAULT NULL,
  `Adddate` varchar(50) DEFAULT NULL,
  `Updatepart` varchar(50) DEFAULT NULL,
  `Notes` varchar(10) DEFAULT NULL,
  `Currstock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partaddres`
--

CREATE TABLE `partaddres` (
  `Addresid` int(11) NOT NULL,
  `Addressname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partnotify`
--

CREATE TABLE `partnotify` (
  `Partbotifyid` int(11) NOT NULL,
  `Parttag_id` int(11) DEFAULT NULL,
  `Partusage_id` int(11) DEFAULT NULL,
  `Equipment_id` int(11) DEFAULT NULL,
  `Part_id` varchar(200) NOT NULL,
  `Tagname` varchar(200) DEFAULT NULL,
  `Nextdayreplace` date DEFAULT NULL,
  `Isnotify` int(11) DEFAULT NULL,
  `Lastnotify` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partstock`
--

CREATE TABLE `partstock` (
  `Partid` varchar(200) NOT NULL,
  `Sapid` varchar(200) DEFAULT NULL,
  `Supplier_id` int(11) DEFAULT NULL,
  `Partname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Quantity` decimal(20,2) NOT NULL,
  `Address_id` int(11) DEFAULT NULL,
  `Lastupdate` int(11) DEFAULT NULL,
  `Minqty` decimal(20,2) DEFAULT NULL,
  `Price` decimal(20,2) DEFAULT NULL,
  `Setreminder` int(11) DEFAULT NULL,
  `Lastreminder` date DEFAULT NULL,
  `Isobsolete` int(11) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Equipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parttag`
--

CREATE TABLE `parttag` (
  `Parttagid` int(11) NOT NULL,
  `Part_id` varchar(200) NOT NULL,
  `Tagname` varchar(200) DEFAULT NULL,
  `Category` varchar(10) DEFAULT NULL,
  `Defaultqty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partusage`
--

CREATE TABLE `partusage` (
  `Partusageid` int(11) NOT NULL,
  `Task_id` int(11) DEFAULT NULL,
  `Part_id` varchar(200) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Usagedate` varchar(50) DEFAULT NULL,
  `So_id` bigint(20) DEFAULT NULL,
  `Createdtime` datetime DEFAULT NULL,
  `Sodate` date DEFAULT NULL,
  `Notify` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Pickupdatetime` datetime DEFAULT NULL,
  `Pickuppart` varchar(50) DEFAULT NULL,
  `Notes` varchar(10) DEFAULT NULL,
  `Currstock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodpm`
--

CREATE TABLE `periodpm` (
  `Periodid` int(11) NOT NULL,
  `Periodname` varchar(20) DEFAULT NULL,
  `Days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `periodpm`
--

INSERT INTO `periodpm` (`Periodid`, `Periodname`, `Days`) VALUES
(1, 'Weekly', 7),
(2, 'Monthly', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sublocation`
--

CREATE TABLE `sublocation` (
  `Sublocationid` int(11) NOT NULL,
  `Location_id` int(11) DEFAULT NULL,
  `Namesublocation` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `Submenuid` int(11) NOT NULL,
  `Menu_id` int(11) DEFAULT NULL,
  `Tittle` varchar(255) DEFAULT NULL,
  `Url` varchar(128) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`Submenuid`, `Menu_id`, `Tittle`, `Url`, `icon`, `Active`) VALUES
(1, 1, 'Menu', 'admin/menu', NULL, 1),
(2, 1, 'Roles', 'admin/role', NULL, NULL),
(3, 4, 'Equipment', 'managements/equipment', NULL, NULL),
(4, 4, 'Supplier', 'managements/supplier', NULL, NULL),
(5, 4, 'Spare part', 'managements/sparepart', NULL, NULL),
(6, 5, 'Work orders', 'task', NULL, NULL),
(7, 5, 'Reports', 'task/report', NULL, NULL),
(8, 4, 'Work orders', 'managements/workorder', NULL, NULL),
(9, 1, 'Users', 'admin/users', NULL, NULL),
(10, 4, 'Checklist items', 'managements/checklist', NULL, NULL),
(11, 4, 'Maintenance Calendar', 'managements/', NULL, NULL),
(12, 5, 'Part Catalog', 'task/catalogs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplierid` int(11) NOT NULL,
  `Namesupplier` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Telepone` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `Pic` varchar(100) DEFAULT NULL,
  `Mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `Taskid` int(11) NOT NULL,
  `Location_id` int(11) DEFAULT NULL,
  `Sublocation_id` int(11) DEFAULT NULL,
  `Equipment_id` int(11) DEFAULT NULL,
  `Periode_id` int(11) DEFAULT NULL,
  `Type_id` int(11) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `AssignTo` varchar(50) DEFAULT NULL,
  `Approval1` varchar(50) DEFAULT NULL,
  `ApprovalDate1` datetime DEFAULT NULL,
  `Approval2` varchar(50) DEFAULT NULL,
  `ApprovalDate2` datetime DEFAULT NULL,
  `Approval3` varchar(50) DEFAULT NULL,
  `ApprovalDate3` int(11) DEFAULT NULL,
  `Approval4` varchar(50) DEFAULT NULL,
  `ApprovalDate4` int(11) DEFAULT NULL,
  `Notes` varchar(1000) DEFAULT NULL,
  `Shift` varchar(10) DEFAULT NULL,
  `Duedate` date DEFAULT NULL,
  `Duration` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Duration2` varchar(50) DEFAULT NULL,
  `Start` varchar(10) DEFAULT NULL,
  `End` varchar(10) DEFAULT NULL,
  `TaskType` int(11) DEFAULT NULL,
  `Approval5` varchar(50) DEFAULT NULL,
  `ApprovalDate5` int(11) DEFAULT NULL,
  `Completed` int(11) DEFAULT NULL,
  `Files` varchar(500) DEFAULT NULL,
  `NStart` datetime DEFAULT NULL,
  `NEnd` datetime DEFAULT NULL,
  `Handover_id` int(11) DEFAULT NULL,
  `Monitor` int(11) DEFAULT NULL,
  `Priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taskdetail`
--

CREATE TABLE `taskdetail` (
  `Detailid` int(11) NOT NULL,
  `Task_id` int(11) DEFAULT NULL,
  `ChecklistName` varchar(500) DEFAULT NULL,
  `Actual` varchar(500) DEFAULT NULL,
  `Recomended` varchar(500) DEFAULT NULL,
  `Action` varchar(500) DEFAULT NULL,
  `Handover` int(11) DEFAULT NULL,
  `Handoverdate` datetime DEFAULT NULL,
  `Engineer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typecheck`
--

CREATE TABLE `typecheck` (
  `Typeid` int(11) NOT NULL,
  `Equipment_id` int(11) DEFAULT NULL,
  `Period_id` int(11) DEFAULT NULL,
  `Typename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Userid` varchar(50) NOT NULL,
  `Fullname` varchar(128) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Role_id` int(11) DEFAULT NULL,
  `Image` varchar(128) DEFAULT NULL,
  `Lastlogin` datetime DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Resetpass` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Userid`, `Fullname`, `Password`, `Role_id`, `Image`, `Lastlogin`, `Active`, `Email`, `Resetpass`) VALUES
('Superadmin', 'Super Admin', '$2y$10$lpPsh8UzkTo70UOF0sxKlutd.u9IrioIVnhyT361yjM19JFAwgMPq', 1, 'default.jpg', '2025-08-06 04:17:26', 1, 'Superadmin@root.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `useraccessmenu`
--

CREATE TABLE `useraccessmenu` (
  `Uacmid` int(11) NOT NULL,
  `Role_id` int(11) DEFAULT NULL,
  `Menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `useraccessmenu`
--

INSERT INTO `useraccessmenu` (`Uacmid`, `Role_id`, `Menu_id`) VALUES
(1, 1, 1),
(14, 2, 5),
(15, 3, 4),
(21, 5, 4),
(22, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `usermenu`
--

CREATE TABLE `usermenu` (
  `Menuid` int(11) NOT NULL,
  `Menuname` varchar(50) DEFAULT NULL,
  `Controller` varchar(50) DEFAULT NULL,
  `Icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usermenu`
--

INSERT INTO `usermenu` (`Menuid`, `Menuname`, `Controller`, `Icon`) VALUES
(1, 'Admin', 'admin', 'typcn-home-outline'),
(2, 'Dashboard', 'dashboard', 'typcn-device-desktop'),
(4, 'Managements', NULL, 'typcn-briefcase'),
(5, 'Task', NULL, 'typcn-spanner'),
(6, 'User', NULL, 'typcn-user');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `Roleid` int(11) NOT NULL,
  `Rolename` varchar(50) DEFAULT NULL,
  `Defaultpage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`Roleid`, `Rolename`, `Defaultpage`) VALUES
(1, 'Admin', 'admin'),
(2, 'Engineer', 'task'),
(3, 'Planner', 'managements/'),
(4, 'Supervisor', 'managements/'),
(5, 'Manager', 'managements/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actafter`
--
ALTER TABLE `actafter`
  ADD PRIMARY KEY (`Actafterid`);

--
-- Indexes for table `actbefore`
--
ALTER TABLE `actbefore`
  ADD PRIMARY KEY (`Actbeforeid`);

--
-- Indexes for table `auditlog`
--
ALTER TABLE `auditlog`
  ADD PRIMARY KEY (`Auditid`),
  ADD KEY `Auditid` (`Auditid`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`Checklistid`);

--
-- Indexes for table `cmdetail`
--
ALTER TABLE `cmdetail`
  ADD PRIMARY KEY (`cmdetailid`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Equipmentid`),
  ADD KEY `FK_Equipment_Sublocation` (`Sublocation_id`),
  ADD KEY `FK_Equipment_Supplier` (`supplier_id`);

--
-- Indexes for table `handover`
--
ALTER TABLE `handover`
  ADD PRIMARY KEY (`Handoverid`);

--
-- Indexes for table `handovercheck`
--
ALTER TABLE `handovercheck`
  ADD PRIMARY KEY (`Handovercheckid`);

--
-- Indexes for table `handovermember`
--
ALTER TABLE `handovermember`
  ADD PRIMARY KEY (`Handovermemberid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Locationid`);

--
-- Indexes for table `maintcategory`
--
ALTER TABLE `maintcategory`
  ADD PRIMARY KEY (`Maintcategoryid`);

--
-- Indexes for table `monitoringgroup`
--
ALTER TABLE `monitoringgroup`
  ADD PRIMARY KEY (`Groupid`);

--
-- Indexes for table `monitoringresult`
--
ALTER TABLE `monitoringresult`
  ADD PRIMARY KEY (`Monitoringresultid`);

--
-- Indexes for table `partadd`
--
ALTER TABLE `partadd`
  ADD PRIMARY KEY (`Stokid`),
  ADD KEY `FK_Partadd_Supplier` (`Supplier_id`);

--
-- Indexes for table `partaddres`
--
ALTER TABLE `partaddres`
  ADD PRIMARY KEY (`Addresid`);

--
-- Indexes for table `partnotify`
--
ALTER TABLE `partnotify`
  ADD PRIMARY KEY (`Partbotifyid`),
  ADD KEY `FK_Partnotify_Parttag` (`Parttag_id`);

--
-- Indexes for table `partstock`
--
ALTER TABLE `partstock`
  ADD PRIMARY KEY (`Partid`),
  ADD KEY `FK_Partlist_Partaddres` (`Address_id`),
  ADD KEY `FK_Partlist_Supplier1` (`Supplier_id`);

--
-- Indexes for table `parttag`
--
ALTER TABLE `parttag`
  ADD PRIMARY KEY (`Parttagid`);

--
-- Indexes for table `partusage`
--
ALTER TABLE `partusage`
  ADD PRIMARY KEY (`Partusageid`),
  ADD KEY `FK_Partusage_Task` (`Task_id`);

--
-- Indexes for table `periodpm`
--
ALTER TABLE `periodpm`
  ADD PRIMARY KEY (`Periodid`),
  ADD KEY `Periodid` (`Periodid`);

--
-- Indexes for table `sublocation`
--
ALTER TABLE `sublocation`
  ADD PRIMARY KEY (`Sublocationid`),
  ADD KEY `FK_Sublocation_Location` (`Location_id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`Submenuid`),
  ADD KEY `FK_USERSUBMENU_USERMENU` (`Menu_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplierid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`Taskid`);

--
-- Indexes for table `taskdetail`
--
ALTER TABLE `taskdetail`
  ADD PRIMARY KEY (`Detailid`),
  ADD KEY `FK_TaskDetail_Task` (`Task_id`);

--
-- Indexes for table `typecheck`
--
ALTER TABLE `typecheck`
  ADD PRIMARY KEY (`Typeid`),
  ADD KEY `FK_Typecheck_Equipment` (`Equipment_id`),
  ADD KEY `FK_Typecheck_Periodpm` (`Period_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Userid`),
  ADD KEY `PK_ROLE` (`Role_id`);

--
-- Indexes for table `useraccessmenu`
--
ALTER TABLE `useraccessmenu`
  ADD PRIMARY KEY (`Uacmid`),
  ADD KEY `FK_USERACCESSMENU_USERMENU` (`Menu_id`),
  ADD KEY `FK_USERACCESSMENU_USERROLE` (`Role_id`);

--
-- Indexes for table `usermenu`
--
ALTER TABLE `usermenu`
  ADD PRIMARY KEY (`Menuid`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`Roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actafter`
--
ALTER TABLE `actafter`
  MODIFY `Actafterid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `actbefore`
--
ALTER TABLE `actbefore`
  MODIFY `Actbeforeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auditlog`
--
ALTER TABLE `auditlog`
  MODIFY `Auditid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `Checklistid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmdetail`
--
ALTER TABLE `cmdetail`
  MODIFY `cmdetailid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `Equipmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handover`
--
ALTER TABLE `handover`
  MODIFY `Handoverid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handovercheck`
--
ALTER TABLE `handovercheck`
  MODIFY `Handovercheckid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handovermember`
--
ALTER TABLE `handovermember`
  MODIFY `Handovermemberid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Locationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintcategory`
--
ALTER TABLE `maintcategory`
  MODIFY `Maintcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monitoringgroup`
--
ALTER TABLE `monitoringgroup`
  MODIFY `Groupid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoringresult`
--
ALTER TABLE `monitoringresult`
  MODIFY `Monitoringresultid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partadd`
--
ALTER TABLE `partadd`
  MODIFY `Stokid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partaddres`
--
ALTER TABLE `partaddres`
  MODIFY `Addresid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partnotify`
--
ALTER TABLE `partnotify`
  MODIFY `Partbotifyid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parttag`
--
ALTER TABLE `parttag`
  MODIFY `Parttagid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partusage`
--
ALTER TABLE `partusage`
  MODIFY `Partusageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periodpm`
--
ALTER TABLE `periodpm`
  MODIFY `Periodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sublocation`
--
ALTER TABLE `sublocation`
  MODIFY `Sublocationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `Submenuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplierid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `Taskid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taskdetail`
--
ALTER TABLE `taskdetail`
  MODIFY `Detailid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typecheck`
--
ALTER TABLE `typecheck`
  MODIFY `Typeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccessmenu`
--
ALTER TABLE `useraccessmenu`
  MODIFY `Uacmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usermenu`
--
ALTER TABLE `usermenu`
  MODIFY `Menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `Roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `FK_Equipment_Sublocation` FOREIGN KEY (`Sublocation_id`) REFERENCES `sublocation` (`Sublocationid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Equipment_Supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`Supplierid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partadd`
--
ALTER TABLE `partadd`
  ADD CONSTRAINT `FK_Partadd_Supplier` FOREIGN KEY (`Supplier_id`) REFERENCES `supplier` (`Supplierid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partnotify`
--
ALTER TABLE `partnotify`
  ADD CONSTRAINT `FK_Partnotify_Parttag` FOREIGN KEY (`Parttag_id`) REFERENCES `parttag` (`Parttagid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partstock`
--
ALTER TABLE `partstock`
  ADD CONSTRAINT `FK_Partlist_Partaddres` FOREIGN KEY (`Address_id`) REFERENCES `partaddres` (`Addresid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Partlist_Supplier1` FOREIGN KEY (`Supplier_id`) REFERENCES `supplier` (`Supplierid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partusage`
--
ALTER TABLE `partusage`
  ADD CONSTRAINT `FK_Partusage_Task` FOREIGN KEY (`Task_id`) REFERENCES `task` (`Taskid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sublocation`
--
ALTER TABLE `sublocation`
  ADD CONSTRAINT `FK_Sublocation_Location` FOREIGN KEY (`Location_id`) REFERENCES `location` (`Locationid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `FK_USERSUBMENU_USERMENU` FOREIGN KEY (`Menu_id`) REFERENCES `usermenu` (`Menuid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `taskdetail`
--
ALTER TABLE `taskdetail`
  ADD CONSTRAINT `FK_TaskDetail_Task` FOREIGN KEY (`Task_id`) REFERENCES `task` (`Taskid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `typecheck`
--
ALTER TABLE `typecheck`
  ADD CONSTRAINT `FK_Typecheck_Equipment` FOREIGN KEY (`Equipment_id`) REFERENCES `equipment` (`Equipmentid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Typecheck_Periodpm` FOREIGN KEY (`Period_id`) REFERENCES `periodpm` (`Periodid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `PK_ROLE` FOREIGN KEY (`Role_id`) REFERENCES `userrole` (`Roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `useraccessmenu`
--
ALTER TABLE `useraccessmenu`
  ADD CONSTRAINT `FK_USERACCESSMENU_USERMENU` FOREIGN KEY (`Menu_id`) REFERENCES `usermenu` (`Menuid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_USERACCESSMENU_USERROLE` FOREIGN KEY (`Role_id`) REFERENCES `userrole` (`Roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
