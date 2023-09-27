-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 11:10 AM
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
-- Database: `camp`
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
('CP01', 'Parth', 'Pune', 10000, 'Chef');

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
(1, 'pav bhaji', 90);

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
(1, NULL, 0, NULL, '2022/11/19', '11:13:38pm'),
(2, ', pav bhaji', 90, 'Cash', '2022/11/20', '09:43:23am'),
(3, NULL, 0, NULL, '2022/11/20', '09:53:09am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeemanagement`
--
ALTER TABLE `employeemanagement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordermanagement`
--
ALTER TABLE `ordermanagement`
  ADD PRIMARY KEY (`orderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordermanagement`
--
ALTER TABLE `ordermanagement`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
