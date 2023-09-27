-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 11:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kothrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeemanagement`
--

CREATE TABLE `employeemanagement` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `workType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeemanagement`
--

INSERT INTO `employeemanagement` (`id`, `name`, `address`, `salary`, `workType`) VALUES
('KT01', 'AJJU', 'Pune', 10000, 'Other Kitchen Staff');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ItemNo` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ItemNo`, `ItemName`, `Price`) VALUES
(1, 'pav bhaji', 90),
(2, 'vada pav', 15);

-- --------------------------------------------------------

--
-- Table structure for table `ordermanagement`
--

CREATE TABLE `ordermanagement` (
  `orderId` int(11) NOT NULL,
  `orderItems` varchar(255) DEFAULT NULL,
  `orderAmount` int(11) DEFAULT NULL,
  `paymentType` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordermanagement`
--

INSERT INTO `ordermanagement` (`orderId`, `orderItems`, `orderAmount`, `paymentType`, `date`, `time`) VALUES
(67, NULL, NULL, '', NULL, NULL),
(68, ' Mechanical Engineering  Electrical Engineering , Electrical Engineering , Electrical Engineering , Electrical Engineering ', NULL, '', '2022/11/19', '08:25:57pm'),
(69, NULL, NULL, '', '2022/11/19', '08:29:43pm'),
(70, NULL, NULL, '', '2022/11/19', '08:33:24pm'),
(71, NULL, NULL, '', '2022/11/19', '08:34:20pm'),
(72, NULL, NULL, '', '2022/11/19', '08:34:37pm'),
(73, NULL, NULL, '', '2022/11/19', '08:34:46pm'),
(74, NULL, NULL, '', '2022/11/19', '08:36:28pm'),
(75, NULL, NULL, '', '2022/11/19', '08:36:42pm'),
(76, NULL, NULL, '', '2022/11/19', '08:36:52pm'),
(77, NULL, NULL, '', '2022/11/19', '08:37:25pm'),
(78, NULL, NULL, '', '2022/11/19', '08:37:47pm'),
(79, NULL, NULL, '', '2022/11/19', '08:38:33pm'),
(80, NULL, NULL, '', '2022/11/19', '08:38:34pm'),
(81, NULL, NULL, '', '2022/11/19', '08:38:35pm'),
(82, NULL, NULL, '', '2022/11/19', '08:38:36pm'),
(83, NULL, NULL, '', '2022/11/19', '08:38:36pm'),
(84, NULL, NULL, '', '2022/11/19', '08:39:43pm'),
(85, NULL, NULL, '', '2022/11/19', '08:46:40pm'),
(86, NULL, NULL, '', '2022/11/19', '08:47:21pm'),
(87, ', pav bhaji, pav bhaji', 130, '', '2022/11/19', '08:49:32pm'),
(88, ', Computer Engineering , Civil Engineering , vada pav ', NULL, '', '2022/11/19', '08:49:59pm'),
(89, ', vada pav , vada pav , vada pav , vada pav , pav bhaji , pav bhaji , vada pav , vada pav , pav bhaji , vada pav , pav bhaji, vada pav, vada pav', NULL, '', '2022/11/19', '08:52:09pm'),
(90, ', pav bhaji, pav bhaji, vada pav, vada pav, vada pav, vada pav, pav bhaji', 34, 'Card', '2022/11/19', '09:38:06pm'),
(91, ', pav bhaji, vada pav, vada pav, vada pav', 135, 'Card', '2022/11/19', '09:44:56pm'),
(92, NULL, 0, NULL, '2022/11/20', '09:42:44am'),
(93, ', pav bhaji, vada pav', 53, 'Cash', '2022/11/20', '10:51:53am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeemanagement`
--
ALTER TABLE `employeemanagement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ItemNo`);

--
-- Indexes for table `ordermanagement`
--
ALTER TABLE `ordermanagement`
  ADD PRIMARY KEY (`orderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ItemNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordermanagement`
--
ALTER TABLE `ordermanagement`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
