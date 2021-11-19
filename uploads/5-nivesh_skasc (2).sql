-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 08:26 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nivesh_skasc`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_department`
--

CREATE TABLE `mst_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_removed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_faculty`
--

CREATE TABLE `mst_faculty` (
  `id` int(11) NOT NULL,
  `faculty_id` int(50) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `faculty_email_id` varchar(100) NOT NULL,
  `faculty_date_of_birth` date NOT NULL,
  `faculty_gender` varchar(10) NOT NULL,
  `faculty_department_id` int(15) NOT NULL,
  `faculty_designation_id` int(15) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_removed` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_permissions`
--

CREATE TABLE `mst_permissions` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_removed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_roles`
--

CREATE TABLE `mst_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_removed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_roles`
--

INSERT INTO `mst_roles` (`id`, `role_name`, `description`, `created_at`, `updated_at`, `is_active`, `is_removed`) VALUES
(1, 'coordinator', ' placement cell coordinator', '0000-00-00', '0000-00-00', 1, 0),
(2, 'Deputy Coordinator', 'Placement cell Deputy Coordinator', '0000-00-00', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_users`
--

CREATE TABLE `mst_users` (
  `id` int(11) NOT NULL,
  `faculty_fullname` varchar(50) NOT NULL,
  `faculty_id` varchar(100) NOT NULL,
  `faculty_designation` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_removed` tinyint(1) NOT NULL,
  `department_id` int(10) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `is_login_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`id`, `faculty_fullname`, `faculty_id`, `faculty_designation`, `username`, `password`, `created_at`, `updated_at`, `is_active`, `is_removed`, `department_id`, `contact_no`, `role_id`, `permission_id`, `is_login_user`) VALUES
(1, 'Meena preethi', 'skasc_001', 'controller of examination', 'admin@skasc.ac.in', 'admin123', '2021-07-08 00:00:00', '2021-07-08 00:00:00', 1, 0, 0, '987563211', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trn_roles_permissions`
--

CREATE TABLE `trn_roles_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_removed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_department`
--
ALTER TABLE `mst_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_faculty`
--
ALTER TABLE `mst_faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_permissions`
--
ALTER TABLE `mst_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_roles`
--
ALTER TABLE `mst_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trn_roles_permissions`
--
ALTER TABLE `trn_roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_department`
--
ALTER TABLE `mst_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_faculty`
--
ALTER TABLE `mst_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_permissions`
--
ALTER TABLE `mst_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_roles`
--
ALTER TABLE `mst_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_users`
--
ALTER TABLE `mst_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trn_roles_permissions`
--
ALTER TABLE `trn_roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
