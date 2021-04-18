-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2021 at 03:44 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c295Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activation`
--

CREATE TABLE IF NOT EXISTS `Activation` (
  `UserID` int(11) NOT NULL,
  `Code` int(4) NOT NULL,
  `IsActivated` tinyint(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `COrder`
--

CREATE TABLE IF NOT EXISTS `COrder` (
  `ID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '-1',
  `ShippingDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1000000000 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COrder`
--

INSERT INTO `COrder` (`ID`, `CustomerID`, `TotalPrice`, `Status`, `ShippingDate`) VALUES
(1000000, 0, 1500, -1, '2021-01-02'),
(1000001, 1, 5000, -1, '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `ID` int(10) NOT NULL,
  `UserName` varchar(13) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Address` varchar(64) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Fax` varchar(11) NOT NULL,
  `CCNumber` varchar(16) NOT NULL,
  `CCName` varchar(32) NOT NULL,
  `CCBank` varchar(32) NOT NULL,
  `CCDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`ID`, `UserName`, `Password`, `Name`, `DateOfBirth`, `Address`, `Email`, `Phone`, `Fax`, `CCNumber`, `CCName`, `CCBank`, `CCDate`) VALUES
(1000000000, 'c1', '123456789012', 'Moha', '0000-00-00', 'sad', 'asd', 'asd', 'asd', 'asd', 'asd', 'sad', '2020-02-01'),
(1234567891, 'new Name', '123456789', 'name', '2021-01-27', 'ramallah', 'email@email.com', '0585258785', '02596211', '1111222233334444', 'Name', 'ArabBank', '2021-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `CustomerLogin`
--

CREATE TABLE IF NOT EXISTS `CustomerLogin` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(13) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Emploee`
--

CREATE TABLE IF NOT EXISTS `Emploee` (
  `Name` varchar(32) NOT NULL,
  `UserName` varchar(13) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `IsManager` tinyint(1) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Emploee`
--

INSERT INTO `Emploee` (`Name`, `UserName`, `Password`, `Email`, `Phone`, `IsManager`) VALUES
('mohammad', 'abu7reez', '123456789012', 'asdasd', 'asda', 1),
('e1', 'e1', '123456789012', 'sadasd', 'asda', -1);

-- --------------------------------------------------------

--
-- Table structure for table `OrderItems`
--

CREATE TABLE IF NOT EXISTS `OrderItems` (
  `OrderID` int(10) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PricePerUnit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OrderItems`
--

INSERT INTO `OrderItems` (`OrderID`, `ItemID`, `Quantity`, `PricePerUnit`) VALUES
(1000000, 1000000004, 5, 10),
(1000000, 1000000005, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `ID` int(10) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `Type` varchar(16) NOT NULL,
  `PricePU` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Size` varchar(32) DEFAULT NULL,
  `Remarks` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1000000006 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`ID`, `Name`, `Description`, `Type`, `PricePU`, `Quantity`, `Size`, `Remarks`) VALUES
(1000000000, 'test1', 'jhgjhgk', 'Meal', 15, 1, '1 KG', 'jhfghfh'),
(1000000001, 'test1', 'jhgjhgk', 'Meal', 15, 1, '1 KG', 'jhfghfh'),
(1000000002, 'test2', '222', 'Preserved', 22222, 2, '22 KG', '2123123'),
(1000000003, 'test2', '222', 'Preserved', 22222, 2, '22 KG', '2123123'),
(1000000004, 'test3', 'asd', 'Meal', 213, 1, '213 KG', 'asdasd'),
(1000000005, 'test4', 'Default LAN group', 'Preserved', 123, 4, '123 KG', 'sadasd');

-- --------------------------------------------------------

--
-- Table structure for table `TempCart`
--

CREATE TABLE IF NOT EXISTS `TempCart` (
  `CusID` int(11) NOT NULL,
  `ProdID` int(11) NOT NULL,
  `ProdName` varchar(32) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PricePU` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TempCart`
--

INSERT INTO `TempCart` (`CusID`, `ProdID`, `ProdName`, `Quantity`, `PricePU`) VALUES
(1234567891, 1000000000, 'test1', 0, 15),
(1234567891, 1000000000, 'test1', 0, 15),
(1234567891, 1000000001, 'test1', 0, 15),
(1234567891, 1000000000, 'test1', 0, 15),
(1234567891, 1000000000, 'test1', 0, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COrder`
--
ALTER TABLE `COrder`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `CustomerLogin`
--
ALTER TABLE `CustomerLogin`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `Emploee`
--
ALTER TABLE `Emploee`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`OrderID`,`ItemID`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COrder`
--
ALTER TABLE `COrder`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1000000000;
--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1000000006;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
