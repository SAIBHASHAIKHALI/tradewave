-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 09:16 AM
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
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `companyname`, `email`, `phonenumber`, `logo`, `manager_id`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Clents', 'artscript@gmail.com', 1234567897, '', 1, '2024-09-12 04:36:48', '2024-09-16 14:42:39', 0),
(2, 'TATA', 'tata@gmail.com', 1234589583, '', 3, '2024-09-12 06:43:14', '2024-09-12 06:43:14', 0),
(3, 'Dior', 'dior@gmail.com', 8864312345, '', 3, '2024-09-12 06:44:21', '2024-09-12 06:44:21', 0),
(4, 'Channel', 'channel@gmail.com', 7892346781, '', 1, '2024-09-12 06:45:14', '2024-09-12 06:45:14', 0),
(5, 'prosoft', 'prosoft@gmail.com', 6789543268, '', 3, '2024-09-14 00:25:05', '2024-09-14 00:25:05', 0),
(6, 'ank', 'ank@gmail.com', 9731034963, '', 4, '2024-09-24 15:26:04', '2024-09-24 15:26:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Software eng', 'Deals with the design, development, testing, and maintenance of software applications', '2024-09-12 07:49:33', '2024-09-12 07:49:33'),
(4, 'Cyber Security', ' Preventing cyberattacks or mitigating their impact. ', '2024-09-12 07:50:13', '2024-09-12 07:50:13'),
(5, 'Network eng', ' Troubleshooting an organization\'s computer networks.', '2024-09-12 07:51:50', '2024-09-12 07:51:50'),
(6, 'Marketing', 'Responible for promoting the companys products or services.', '2024-09-12 07:56:57', '2024-09-12 07:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `allowed_leaves` int(11) NOT NULL,
  `basic_and_da` int(11) NOT NULL,
  `hra` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `contribution_to_pf` int(11) NOT NULL,
  `esic` int(11) NOT NULL,
  `lwf` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `hire_dated` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `aadhar` int(11) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `salary_advance` int(11) NOT NULL,
  `authorised_signatory` varchar(50) NOT NULL,
  `pf_applicable` tinyint(4) DEFAULT 0,
  `medical_bill_submited` tinyint(4) DEFAULT 0,
  `account_no` varchar(100) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `user_id`, `name`, `gender`, `designation`, `allowed_leaves`, `basic_and_da`, `hra`, `overtime`, `contribution_to_pf`, `esic`, `lwf`, `email`, `phone`, `address`, `birth_date`, `hire_dated`, `department_id`, `aadhar`, `pan`, `salary_advance`, `authorised_signatory`, `pf_applicable`, `medical_bill_submited`, `account_no`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'Emp01', 12, 'Saibha Shaikhali', 'Female', 'Full stack', 30, 15000, 2000, 0, 1000, 0, 0, 'saibhashaikhali53@gmail.com', 3141234567, 'Azam nagar , hno-403', '2001-07-20', '2024-02-03', 3, 2147483647, 'BHYUP359QJ', 0, 'TRADE WAVE', 1, 0, '123456789765678', 0, '2024-09-12 15:51:05', '2024-09-12 10:21:05'),
(4, 'Emp02', 11, 'Jerry', 'Male', 'cyber security analyst', 30, 15000, 2000, 0, 1000, 2000, 0, 'jerry@gmail.com', 1234567890, 'hanuman nagar', '2000-04-07', '2024-04-08', 4, 2147483647, 'BHYUPPOYTR', 0, 'TRADE WAVE', 1, 0, '1234589765678', 0, '2024-09-12 15:53:59', '2024-09-12 10:23:59'),
(5, 'Emp03', 10, 'Eli', 'Female', 'Backend ', 30, 15000, 2000, 0, 1000, 2000, 0, 'eli@gmail.com', 3141234567, 'Mantesh nagar', '2000-05-25', '2024-08-08', 3, 2147483647, 'BHYUP359QF', 0, 'TRADE WAVE', 1, 0, '123458944765678', 0, '2024-09-12 16:00:30', '2024-09-12 10:30:30'),
(6, 'Emp04', 1, 'jay', 'Male', 'Full stack', 30, 15000, 2000, 0, 1000, 2000, 0, 'jay@gmail.com', 9876543219, 'azad nagar', '2000-07-20', '2024-07-14', 3, 2147483647, 'BHYUPPOYTf', 0, 'TRADE WAVE', 1, 0, '123456789765674', 0, '2024-09-14 09:28:25', '2024-09-14 03:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `hire_date` date NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `aadhar` varchar(20) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uniqueid` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `invoice_date` date NOT NULL,
  `gst` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `content` text DEFAULT NULL,
  `invoice_option` text DEFAULT NULL,
  `additional_fields` text DEFAULT NULL,
  `payment_status` tinyint(4) DEFAULT 0,
  `currency` varchar(20) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `invoice_date`, `gst`, `discount`, `content`, `invoice_option`, `additional_fields`, `payment_status`, `currency`, `total`, `client_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'INTL/SEP24/1', '2024-09-09', 0, 0, '[[\"canvas\",\"\",\"05\",\"500\"]]', '[]', '[]', 0, 'INR', 2500, 1, 1, '2024-09-13 14:32:13', '2024-09-13 09:02:13'),
(2, 'INTL/SEP24/2', '2024-09-16', 0, 0, '[[\"car\",\"\",\"1\",\"900000\"]]', '[]', '[]', 0, 'INR', 900000, 2, 11, '2024-09-13 14:38:00', '2024-09-13 09:08:00'),
(3, 'INTL/SEP24/3', '2024-09-11', 0, 0, '[[\"paint\",\"\",\"4\",\"500\"]]', '[]', '[]', 1, 'INR', 2000, 1, 1, '2024-09-14 09:30:43', '2024-09-14 04:00:43'),
(4, 'INTL/SEP24/4', '2024-09-17', 0, 0, '[[\"Car parts\",\"\",\"10000\",\"1\"]]', '[]', '[]', 1, 'INR', 10000, 2, 1, '2024-09-17 18:13:44', '2024-09-17 12:43:44'),
(5, 'INTL/SEP24/5', '2024-09-25', 0, 0, '[[\"website devep\",\"\",\"10000\",\"1\"]]', '[]', '[]', 1, 'INR', 10000, 6, 1, '2024-09-25 00:30:31', '2024-09-24 19:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `leave_type_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `employee_id`, `leave_type_id`, `start_date`, `end_date`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(2, 3, 5, '0000-00-00', '0000-00-00', 'pending', '', '2024-09-13 07:49:27', '2024-09-24 19:10:59'),
(3, 5, 7, '2024-09-14', '2024-09-15', 'pending', 'privilege', '2024-09-13 09:04:29', '2024-09-13 09:04:29'),
(4, 3, 5, '0000-00-00', '0000-00-00', 'pending', 'causal', '2024-09-24 19:11:56', '2024-09-24 19:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Sick ', 'Used when an employee is ill', '2024-09-12 10:35:31', '2024-09-12 10:37:07'),
(5, 'Casual leave', 'Used for personal matters or unforeseen events', '2024-09-12 10:37:36', '2024-09-12 10:37:36'),
(6, 'Maternity leave', 'Available for pregnant women and those who have miscarried or had an abortion \r\n', '2024-09-12 10:38:10', '2024-09-12 10:38:10'),
(7, 'Privilege leave', 'Also known as earned leave, this is a paid leave that employees earn annually', '2024-09-12 10:38:52', '2024-09-12 10:38:52'),
(8, 'duty leave', 'duty leave', '2024-09-24 19:08:25', '2024-09-24 19:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `name`, `email`, `address`, `phonenumber`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Zoe', 'zoe@gmail.com', 'Azad nagar', 1234567867, '2024-09-12 04:38:52', '2024-09-14 05:50:49', 0),
(3, 'Sara', 'sara@gmail.com', 'beck street', 1234567899, '2024-09-12 06:41:49', '2024-09-12 06:41:49', 0),
(4, 'zara', 'zara@gmail.com', 'azam nagar', 4567890432, '2024-09-14 00:25:35', '2024-09-14 00:25:35', 0),
(5, 'jiya', 'jiya@gmail.com', 'azad circle', 2345678788, '2024-09-24 15:27:08', '2024-09-24 15:27:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `hsn` varchar(20) NOT NULL,
  `paymentstatus` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `vendor_id`, `item`, `hsn`, `paymentstatus`, `amount`, `created_at`, `updated_at`, `is_deleted`) VALUES
(3, 4, 'test', '', 'Paid', 5000, '2024-09-12 11:04:23', NULL, 0),
(4, 6, 'clothes', '', 'Paid', 5000, '2024-09-12 11:04:52', NULL, 0),
(5, 5, 'pens', '', 'Pending', 1000, '2024-09-14 03:59:32', NULL, 0),
(6, 9, 'domain', '', 'Paid', 1500, '2024-09-24 19:01:35', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `reset_password_id` int(11) NOT NULL,
  `reset_hash` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `basic_and_da` int(11) NOT NULL,
  `hra` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `overtime_done` int(11) DEFAULT 0,
  `contribution_to_pf` int(11) NOT NULL,
  `esic` int(11) NOT NULL,
  `lwf` int(11) NOT NULL,
  `salary_advance` int(11) DEFAULT 0,
  `salary_advance_deducted` int(11) DEFAULT 0,
  `remaining_leaves` int(11) DEFAULT NULL,
  `leaves_taken` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee_id`, `date`, `basic_and_da`, `hra`, `overtime`, `overtime_done`, `contribution_to_pf`, `esic`, `lwf`, `salary_advance`, `salary_advance_deducted`, `remaining_leaves`, `leaves_taken`, `created_at`, `updated_at`) VALUES
(4, 3, '2024-09-12', 15000, 2000, 0, NULL, 1000, 0, 0, 0, 0, NULL, 0, '2024-09-12 16:32:07', '2024-09-12 11:02:07'),
(5, 4, '2024-09-12', 15000, 2000, 0, NULL, 1000, 2000, 0, 0, 0, NULL, 0, '2024-09-12 16:32:21', '2024-09-12 11:02:21'),
(6, 5, '2024-09-12', 15000, 2000, 0, NULL, 1000, 2000, 0, 0, 0, NULL, 0, '2024-09-12 16:33:50', '2024-09-12 11:03:50'),
(7, 4, '2024-09-17', 15000, 2000, 0, NULL, 1000, 2000, 0, 0, 0, NULL, 0, '2024-09-17 18:05:38', '2024-09-17 12:35:38'),
(8, 6, '2024-09-24', 15000, 2000, 0, NULL, 1000, 2000, 0, 0, 0, NULL, 0, '2024-09-25 00:39:03', '2024-09-24 19:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `user_id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(3, 13, 'Badminton System', 'Full Stack', 'Rejected', '2024-09-16 19:05:01', '2024-09-16 19:08:27'),
(4, 13, 'e-com', 'Full Stack', 'Approved', '2024-09-16 19:07:52', '2024-09-16 19:08:22'),
(5, 13, 'erp', 'Full Stack', 'Approved', '2024-09-24 19:13:58', '2024-09-24 19:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `password`, `image`, `email`, `level`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Admin', 'Admin', '$2y$13$Ge3xDJI4bjfMID29syBRwevejgOQj9EZL5mf/WxGTYOY03VDTYSsu', 'saibha.jpeg', 'admin@gmail.com', 1, '2024-05-01 16:52:41', '2024-09-12 10:08:46', 0),
(10, 'HR', 'HR ', '$2y$13$xLKNPH7BRkse4JHxX6x4s.oiOW4/UyRiVYJj6CUKVgxvktTAfccOy', '', 'hr@gmail.com', 3, '2024-09-11 07:45:16', '2024-09-11 07:46:25', 0),
(11, 'Accountant', 'Accounts', '$2y$13$AIPVqgxutkOp4sfdcxNg1OWWLtT0QzraYr.gllm7ZXsx/mkls8BSW', '', 'acc@gmail.com', 2, '2024-09-11 07:51:39', '0000-00-00 00:00:00', 0),
(12, 'Employee', 'Employee', '$2y$13$dOrd0W9FNcN1n4sNQFixwOP.lVDIptu5SXhcscHjt5B76TI40yrtK', '', 'emp@gmail.com', 4, '2024-09-11 07:54:05', '0000-00-00 00:00:00', 0),
(13, 'Clients', 'Client', '$2y$13$zb1QiKW6YT6NocNeIO4QeOA3kgkZZjnuK0zdrLCuRE4wjaQtRxEJ.', '', 'client@gmail.com', 5, '2024-09-16 18:15:34', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `name`, `email`, `contact`, `pan`, `gstin`, `created_at`, `updated_at`, `is_deleted`) VALUES
(4, 'Alex', 'Alex@gmail.com', 9865424789, 'F576GF3', '22BXJSGFJ1Z5', '2024-09-12 07:43:03', NULL, 0),
(5, 'Sam', 'Sam@gmail.com', 9876543211, 'D576GF3', '23BXJSGFJ1Z6', '2024-09-12 07:44:30', NULL, 0),
(6, 'Jack', 'Jack02@gmail.com', 2467852347, 'h576GF3', '22BXJSGFHFJ1Z8', '2024-09-12 07:46:31', '2024-09-12 07:46:50', 0),
(7, 'Harry', 'harry6@gmail.com', 8064216783, 'F576GF10', '23BXJFFGSGFJ1Z1', '2024-09-12 07:48:05', NULL, 0),
(8, 'jackson', 'jackson@gmail.com', 9876543214, 'h576GF6', '22BXJSGFJ1Z78', '2024-09-14 03:56:16', NULL, 0),
(9, 'akash tech', 'akashtech@gmail.com', 9745678234, 'EyAPI246', '22BFDIKB68', '2024-09-24 18:58:38', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `fk_0001` (`client_id`),
  ADD KEY `fk_sda` (`user_id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_type_id` (`leave_type_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`reset_password_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `reset_password_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_0001` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `fk_sda` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_2` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `leave_requests_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
