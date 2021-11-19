-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 10:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_maintenance_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admi_name` varchar(20) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_phoneno` bigint(20) NOT NULL,
  `admin_address` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admi_name`, `admin_username`, `admin_phoneno`, `admin_address`, `admin_password`) VALUES
(1, 'murali', 'admin', 8190032356, 'theni', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendance_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `attendance_date`, `employee_id`, `attendance_status`) VALUES
(1, '2021-11-08', 2, 'FP'),
(2, '2021-11-09', 2, 'FP'),
(8, '2021-11-05', 2, 'AB'),
(10, '2021-11-04', 2, ''),
(11, '2021-11-10', 2, 'PP'),
(12, '2021-11-10', 3, 'FP');

-- --------------------------------------------------------

--
-- Table structure for table `docfile`
--

CREATE TABLE `docfile` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `filename` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docfile`
--

INSERT INTO `docfile` (`id`, `name`, `filename`, `created`) VALUES
(1, 'UGC', '1-MYSQL problem.docx', '2021-08-18 22:41:25'),
(2, 'UGC', '2-MYSQL problem.docx', '2021-08-18 22:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `designation` text NOT NULL,
  `location` text NOT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `per_day` decimal(10,2) NOT NULL,
  `pf` decimal(10,2) NOT NULL,
  `hra` decimal(10,2) NOT NULL,
  `doc1` longblob NOT NULL,
  `image1` longblob NOT NULL,
  `image2` longblob NOT NULL,
  `status` text NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `designation`, `location`, `phone`, `mail`, `password`, `per_day`, `pf`, `hra`, `doc1`, `image1`, `image2`, `status`, `dept`) VALUES
(2, 'Murali', 'BSC IT', 'Coimbatore', '8190032365', 'murali@gmail.com', 'pass', '15000.00', '10.00', '8.00', '', '', '', 'unblock', 'IT'),
(3, 'Gowri', 'computer science', 'rs puram', '9632587412', 'test', '1', '6000.00', '10.00', '8.00', '', '', '', 'unblock', '');

-- --------------------------------------------------------

--
-- Table structure for table `newdept`
--

CREATE TABLE `newdept` (
  `id` int(9) NOT NULL,
  `name` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newdept`
--

INSERT INTO `newdept` (`id`, `name`, `filename`, `created`) VALUES
(3, 'siva', '3-MFA Configuration.pdf', '2021-08-18 21:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(20) NOT NULL,
  `empid` int(20) NOT NULL,
  `calcdate` date NOT NULL,
  `per_day` decimal(10,2) NOT NULL,
  `pf` decimal(10,2) NOT NULL,
  `hra` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `empid`, `calcdate`, `per_day`, `pf`, `hra`, `total`) VALUES
(3, 2, '2021-08-18', '500.00', '2000.00', '3000.00', '17500.00'),
(4, 2, '2021-08-18', '500.00', '2000.00', '3000.00', '16500.00'),
(5, 2, '2021-08-18', '500.00', '2000.00', '3000.00', '12000.00'),
(7, 2, '2021-11-11', '15000.00', '125.00', '100.00', '1225.00'),
(9, 3, '2021-11-10', '6000.00', '20.00', '16.00', '196.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docfile`
--
ALTER TABLE `docfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newdept`
--
ALTER TABLE `newdept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `docfile`
--
ALTER TABLE `docfile`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newdept`
--
ALTER TABLE `newdept`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
