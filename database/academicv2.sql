-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2024 at 09:32 PM
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
-- Database: `academicv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `id` int(100) NOT NULL,
  `mentor_id` int(100) NOT NULL,
  `mentee_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('present','absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `coursecode` varchar(50) NOT NULL,
  `credits` int(5) NOT NULL,
  `isLabSession` varchar(10) NOT NULL DEFAULT 'No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `semester`, `coursename`, `coursecode`, `credits`, `isLabSession`, `created_at`, `updated_at`) VALUES
(1, '1', 'Python Programming(I)', '22MCA11', 5, 'No', '2023-12-29 17:18:44', NULL),
(2, '1', 'Database Management System (I)', '22MCA12', 5, 'No', '2023-12-29 17:19:33', NULL),
(3, '1', 'Computer Networks and Communication(I)', '22MCA13', 5, 'No', '2023-12-29 17:19:59', NULL),
(4, '1', 'Research Methodology', '22MCA14', 4, 'No', '2023-12-29 17:20:28', NULL),
(5, '1', 'Mathematical Foundations', '22MCA15', 5, 'No', '2023-12-29 17:20:59', NULL),
(6, '1', 'Basics of Programming Languages – Bridge Course (I)', '22MCA16', 0, 'No', '2023-12-29 17:21:54', NULL),
(7, '2', 'Web Design and Development (I)', '22MCA21', 5, 'No', '2023-12-29 17:22:34', NULL),
(8, '2', 'Data Structures and Algorithms (I)', '22MCA22', 5, 'No', '2023-12-29 17:23:35', NULL),
(9, '2', 'Programming using Java and J2EE (I)', '22MCA23', 5, 'No', '2023-12-29 17:24:04', NULL),
(10, '2', 'IT Infrastructure Management', '22MCA24', 4, 'No', '2023-12-29 17:24:33', NULL),
(11, '2', 'NoSQL', '22MCA251', 4, 'No', '2023-12-29 17:25:23', NULL),
(12, '2', 'Cloud Computing', '22MCA252', 4, 'No', '2023-12-29 17:25:49', NULL),
(13, '2', 'Cyber Security and Cyber Laws', '22MCA253', 4, 'No', '2023-12-29 17:26:13', NULL),
(14, '2', 'Data Analysis with R**', '22MCA254', 4, 'No', '2023-12-29 17:26:50', NULL),
(15, '2', 'Information Network Security', '22MCA255', 4, 'No', '2023-12-29 17:27:18', NULL),
(16, '2', 'Professional Communication and Ethics', '22MCA26', 1, 'No', '2023-12-29 17:27:56', '2023-12-29 17:28:10'),
(17, '2', 'Employability Skill', '22MCA27', 1, 'No', '2023-12-29 17:28:55', NULL),
(18, '3', 'C# Programming using .NET (I)', '22MCA31', 5, 'No', '2023-12-29 17:29:36', NULL),
(19, '3', 'Machine Learning(I)', '22MCA32', 5, 'No', '2023-12-29 17:30:04', NULL),
(20, '3', 'Big Data Paradigm(I)', '22MCA33', 5, 'No', '2023-12-29 17:30:30', NULL),
(31, '4', 'Professional Practice', '22MCA41', 5, 'No', '2023-12-29 17:36:39', NULL),
(32, '4', 'Project Work', '22MCA42', 15, 'No', '2023-12-29 17:37:23', NULL),
(33, '4', 'Academic Writing', '22MCA43', 4, 'No', '2023-12-29 17:38:17', NULL),
(34, '4', 'Technical Certification', '22MCA44X', 2, 'No', '2023-12-29 17:39:14', NULL),
(35, 'III', 'ACA', '-', 0, 'No', '2023-12-30 20:25:51', NULL),
(36, 'III', 'Elective 2', '22MCA34X', 4, 'No', '2023-12-30 20:58:35', NULL),
(37, 'III', 'Elective 3', '22MCA35X', 4, 'No', '2023-12-30 20:58:46', NULL),
(38, 'III', 'Societal Project', '22MCAX', 2, 'No', '2023-12-30 21:22:20', NULL),
(39, '1', 'Computer Network & Communtication Lab', '22MCA13x', 2, 'Yes', '2024-01-07 17:07:36', NULL),
(40, '1', 'Python Programming Lab', '22MCA11x', 2, 'Yes', '2024-01-07 17:08:08', NULL),
(41, '1', 'Database Management System  Lab', '22MCA12x', 2, 'Yes', '2024-01-07 17:08:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deadlines`
--

CREATE TABLE `deadlines` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`id`, `title`, `description`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 'Due To Submit Course Files', 'Last Day To SUbmit Course File is 2/1/2024', '2024-01-01 18:30:00', '2024-01-01 20:46:13', NULL),
(2, 'Test', 'Test', '2024-01-01 20:54:13', '2024-01-01 20:54:13', NULL),
(3, 'Afra', 'Afra', '2024-01-02 06:15:02', '2024-01-02 06:15:02', NULL),
(4, 'Najmusahar', 'Najmusahar', '2024-01-10 07:37:36', '2024-01-10 07:37:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(100) NOT NULL,
  `TT` varchar(100) NOT NULL,
  `LP` varchar(100) NOT NULL,
  `CP` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `TT`, `LP`, `CP`, `created_at`, `updated_at`) VALUES
(2, 'TT.pdf', 'LP.pdf', 'CP.pdf', '2023-12-27 19:49:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `electiveenrollment`
--

CREATE TABLE `electiveenrollment` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `elective1` varchar(100) NOT NULL,
  `elective2` varchar(100) NOT NULL,
  `elective3` varchar(30) NOT NULL,
  `allsubjects` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electiveenrollment`
--

INSERT INTO `electiveenrollment` (`id`, `user_id`, `elective1`, `elective2`, `elective3`, `allsubjects`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blockchain Technology', 'Artificial Intelligence', '', '', '2023-12-27 19:08:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desciption` varchar(100) NOT NULL,
  `startdate` varchar(100) NOT NULL,
  `enddate` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `desciption`, `startdate`, `enddate`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Test', '2024-01-15', '2024-01-15', '2024-01-15 15:07:17', '0000-00-00 00:00:00'),
(2, 'Holday', 'Makar Sankranti Holiday', '2024-01-15', '2024-01-15', '2024-01-15 15:25:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `staffid` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `user_id`, `name`, `email`, `contact`, `staffid`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alzaahid', 'alzaahid@gmail.com', 9096245373, 'hdie38', '2023-12-27 20:17:56', NULL),
(2, 4, 'Pavan Mitragotri', 'pvm@git.edu', 8756456754, 'git45n', '2023-12-29 21:30:03', NULL),
(3, 2, 'Sachin Dessai', 'sachin@git.edu', 7495475645, 'hruhu5', '2023-12-30 15:10:51', NULL),
(4, 3, 'Abhishek Nazare', 'abhishekn@git.edu', 8748594565, '', '2023-12-30 19:26:20', NULL),
(5, 5, 'Hrishikesh Mogare', 'hsm@git.edu', NULL, '', '2023-12-30 19:26:57', NULL),
(6, 6, 'Nilesh Anvekar', 'nilesh@git.edu', NULL, '', '2023-12-30 19:27:04', NULL),
(7, 7, 'Shivani Patankar', 'sdpatankar@git.edu', NULL, '', '2023-12-30 19:27:10', NULL),
(8, 8, 'Vijaylaxmi Patil', 'vijay@git.edu', NULL, '', '2023-12-30 19:27:14', NULL),
(9, 9, 'Sheetal Bandekar', 'sb@git.edu', NULL, '', '2023-12-30 19:27:18', NULL),
(10, 10, 'Swarooprani Manoor', 'swm@git.edu', NULL, '', '2023-12-30 19:27:24', NULL),
(11, 11, 'Vinod Kokitkar', 'vrkokitkar@git.edu', NULL, '', '2023-12-30 19:27:29', NULL),
(12, 12, 'Sunita Padmannavar', 'spn@git.edu', NULL, '', '2023-12-30 19:27:33', NULL),
(13, 13, 'Swetha Goudar', 'sig@git.edu', NULL, '', '2023-12-30 19:27:37', NULL),
(14, 14, 'Pijush Barthakur', 'pbt@git.edu', NULL, '', '2023-12-30 19:27:41', NULL),
(15, 15, 'Mrutunjaya Emmi', 'mje@git.edu', NULL, '', '2023-12-30 19:27:45', NULL),
(16, 16, 'Jayashri Madalgi', 'jbm@git.edu', NULL, '', '2023-12-30 19:27:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facultyallotment`
--

CREATE TABLE `facultyallotment` (
  `id` int(100) NOT NULL,
  `faculty_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `semster` varchar(5) NOT NULL,
  `division` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultyallotment`
--

INSERT INTO `facultyallotment` (`id`, `faculty_id`, `course_id`, `semster`, `division`, `created_at`, `updated_at`) VALUES
(3, 3, 5, '1', 'A', '2023-12-30 15:11:38', '2024-01-07 15:23:49'),
(6, 2, 3, '1', 'B', '2023-12-30 16:13:06', '2024-01-07 15:24:03'),
(8, 5, 2, '1', 'A', '2024-01-06 17:47:38', '2024-01-07 15:24:10'),
(9, 4, 4, '1', 'B', '2024-01-07 15:14:56', '2024-01-07 15:24:17'),
(10, 6, 6, '1', 'A', '2024-01-07 15:15:13', '2024-01-07 20:17:49'),
(11, 7, 6, '1', 'B', '2024-01-07 15:15:25', '2024-01-07 20:17:59'),
(12, 10, 1, '1', 'B', '2024-01-07 15:15:51', '2024-01-07 15:25:02'),
(13, 11, 1, '1', 'A', '2024-01-07 15:16:00', '2024-01-07 15:25:10'),
(14, 12, 2, '1', 'B', '2024-01-07 15:16:13', '2024-01-07 15:25:18'),
(15, 13, 3, '1', 'A', '2024-01-07 15:16:34', '2024-01-07 15:25:27'),
(16, 14, 4, '1', 'A', '2024-01-07 15:16:47', '2024-01-07 15:25:34'),
(17, 15, 5, '1', 'B', '2024-01-07 15:16:56', '2024-01-07 15:25:40'),
(18, 2, 39, '1', 'A', '2024-01-07 17:10:20', '2024-01-07 20:24:21'),
(19, 9, 39, '1', 'A/B', '2024-01-07 17:10:46', NULL),
(20, 6, 39, '1', 'A/B', '2024-01-07 17:10:58', NULL),
(21, 5, 41, '1', 'A', '2024-01-07 20:47:42', NULL),
(22, 11, 40, '1', 'A', '2024-01-07 20:47:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `impfiles`
--

CREATE TABLE `impfiles` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id`, `name`, `designation`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sachin Dessai', 'Professor', 0, '2023-07-29 13:09:58', '2023-10-19 15:01:43'),
(2, 'Abhishek Nazare', 'Professor', 0, '2023-07-30 10:19:01', '2023-10-19 15:01:43'),
(3, 'Hrishikesh Mogare', 'Professor', 0, '2023-07-30 10:19:16', '2023-10-19 15:01:43'),
(4, 'Nilesh Anvekar', 'Professor', 0, '2023-07-30 12:23:21', '2023-10-19 15:01:43'),
(5, 'Shivani Patankar', 'Professor', 0, '2023-07-30 12:23:34', '2023-10-19 15:01:43'),
(6, 'Pavan Mitragotri', 'Professor', 0, '2023-07-30 12:23:51', '2023-10-19 15:01:43'),
(7, 'Vijaylaxmi Patil', 'IT Head', 0, '2023-07-30 12:24:07', '2023-10-19 15:02:18'),
(8, 'Sheetal Bandekar', 'Professor', 0, '2023-07-30 12:24:26', '2023-10-19 15:01:43'),
(9, 'Swarooprani Manoor', 'Professor', 0, '2023-07-30 12:24:45', '2023-10-19 15:01:43'),
(10, 'Vinod Kokitkar', 'Professor', 0, '2023-07-30 12:24:59', '2023-10-19 15:01:43'),
(11, 'Sunita Padmannavar', 'Professor', 0, '2023-07-30 12:25:15', '2023-10-19 15:01:43'),
(12, 'Swetha Goudar', 'Dean', 0, '2023-07-30 12:25:45', '2023-10-19 15:02:38'),
(13, 'Pijush Barthakur', 'Professor', 0, '2023-07-30 12:26:01', '2023-10-19 15:01:43'),
(14, 'Mrutunjaya Emmi', 'Professor', 0, '2023-07-30 12:26:19', '2023-10-19 15:01:43'),
(15, 'Jayashri Madalgi', 'HOD', 0, '2023-07-30 12:26:42', '2023-10-19 15:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `randomtimetable`
--

CREATE TABLE `randomtimetable` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester` varchar(30) NOT NULL DEFAULT '1',
  `subject_id` int(100) NOT NULL,
  `scheme` varchar(30) DEFAULT NULL,
  `division` varchar(10) NOT NULL,
  `labsession` varchar(10) NOT NULL DEFAULT 'No',
  `faculty_id1` int(11) DEFAULT NULL,
  `faculty_id2` int(100) DEFAULT NULL,
  `faculty_id3` int(100) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `timeslot` varchar(100) DEFAULT NULL,
  `day` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `isdeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DS-2', '2024-01-06 19:47:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'I', '2023-12-29 21:49:26', NULL),
(2, 'II', '2023-12-29 21:49:31', NULL),
(3, 'III', '2023-12-29 21:49:36', NULL),
(4, 'IV', '2023-12-29 21:49:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usn` varchar(50) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `batch` varchar(20) NOT NULL DEFAULT '2024',
  `division` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `name`, `email`, `usn`, `contact`, `batch`, `division`, `created_at`, `updated_at`) VALUES
(1, 17, 'Afra Pathan', 'afrapathan2506@gmail.com', '2GI22MC004', 5749545645, '', 'A', '2024-01-01 10:59:19', '2024-01-15 15:42:21'),
(2, 3, 'Arjun', 'arjunpermi7@gmail.com', '2GI22MC015', 9867458658, '2024', 'A', '2024-01-15 15:42:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Time Table', 'Sem 3 Timetable Uploaded', '2024-01-01 20:14:39', '2024-01-01 20:14:39'),
(2, 'Hello', 'Welcome user', '2024-01-01 20:24:44', '2024-01-01 20:24:44'),
(3, 'Due Date ', 'Due date to upload course files', '2024-01-01 20:25:09', '2024-01-01 20:25:09'),
(4, 'Test', 'Test', '2024-01-01 20:27:26', '2024-01-01 20:27:26'),
(5, 'Afra Pathan', 'Afghani Pathan', '2024-01-02 06:13:56', '2024-01-02 06:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester` varchar(30) NOT NULL,
  `subject_id` int(100) NOT NULL,
  `scheme` varchar(30) NOT NULL DEFAULT '2022',
  `division` varchar(10) NOT NULL,
  `labsession` varchar(10) NOT NULL DEFAULT 'No',
  `faculty_id1` int(11) DEFAULT NULL,
  `faculty_id2` int(100) DEFAULT NULL,
  `faculty_id3` int(100) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `timeslot` varchar(100) DEFAULT NULL,
  `day` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `course_id`, `semester`, `subject_id`, `scheme`, `division`, `labsession`, `faculty_id1`, `faculty_id2`, `faculty_id3`, `room`, `timeslot`, `day`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 3, '2022', 'B', '0', 2, NULL, NULL, 'DS-4', '10:00-10:55', 'Monday', '2024-01-06 15:41:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `level` int(100) NOT NULL,
  `hasMentor` varchar(10) NOT NULL,
  `bachelorcgpa` float NOT NULL,
  `batch` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `contact`, `level`, `hasMentor`, `bachelorcgpa`, `batch`, `created_at`, `updated_at`) VALUES
(1, 'Alzaahid Nadaf', 'zaahid97!', 'alzaahid@gmail.com', '', 1, 'Yes', 7, 2024, '2022-05-08 10:35:36', '2024-01-06 15:33:20'),
(2, 'Abhishek Nazare', 'abhi@123', 'abhishekn@git.edu', '', 1, 'No', 0, 2024, '2023-07-07 09:07:36', '2024-01-06 15:36:28'),
(3, 'Arjun', 'git@123', 'arjunpermi7@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 00:26:25', '2024-01-06 15:33:20'),
(4, 'Naveen angadi', 'git@123', 'naveenangadi274@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 00:28:13', '2024-01-06 15:33:20'),
(5, 'Musheb karikatti', 'git@123', 'mushebkarikatti@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 00:28:48', '2024-01-06 15:33:20'),
(7, 'Nikhil', 'git@123', 'nikhilh242@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:28:15', '2024-01-06 15:33:20'),
(8, 'Vaishnavi Mithare', 'git@123', 'vaishnavimithare15@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:31:20', '2024-01-06 15:33:20'),
(9, 'BIBIJAINAB K PATHAN', 'git@123', 'jkpathan1701@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:31:56', '2024-01-06 15:33:20'),
(10, 'Satish S Patil', 'git@123', 'sp948705@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:32:27', '2024-01-06 15:33:20'),
(11, 'Anusha V C', 'git@123', 'vasuanuvc27@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:33:36', '2024-01-06 15:33:20'),
(12, 'Shradha', 'git@123', 'shradhak2001@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:34:08', '2024-01-06 15:33:20'),
(13, 'Pravesh Naik', 'git@123', 'praveshnaik0360@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:34:40', '2024-01-06 15:33:20'),
(14, 'Rajat Bandekar', 'git@123', 'bandekarraj40@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:35:05', '2024-01-06 15:33:20'),
(15, 'Nidhi', 'git@123', 'ternikarnidhi@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:35:49', '2024-01-06 15:33:20'),
(16, 'Netravati gangappa g', 'git@123', 'nnetravatigokavi@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:36:11', '2024-01-06 15:33:20'),
(17, 'Dakshata Patil', 'git@123', 'dakshatapatil4289@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:36:32', '2024-01-06 15:33:20'),
(18, 'Dnyaneshwari D Kolek', 'git@123', 'dnyaneshwarikolekar2001@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:37:02', '2024-01-06 15:33:20'),
(19, 'Soniya Badawadagi', 'git@123', 'sonibadawadagi12@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:37:32', '2024-01-06 15:33:20'),
(20, 'Nandashree', 'git@123', 'nandashreenk2001@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:37:57', '2024-01-06 15:33:20'),
(21, 'Sylvester', 'git@123', 'sylvestermca2000@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:39:10', '2024-01-06 15:33:20'),
(22, 'Nivedita Jadar', 'git@123', 'jadarkaveri15@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:44:39', '2024-01-06 15:33:20'),
(23, 'Shivagouda Malagouda', 'git@123', 'shivagoudapatil15@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:45:04', '2024-01-06 15:33:20'),
(24, 'Aishwarya', 'git@123', 'tanavidesai99@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:45:27', '2024-01-06 15:33:20'),
(25, 'Shubham patil', 'git@123', 'shubhamtukarampatil@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:45:49', '2024-01-06 15:33:20'),
(26, 'Pratibha H Lingadal', 'git@123', 'lingadalpratibha@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:46:12', '2024-01-06 15:33:20'),
(27, 'Varsha jat', 'git@123', 'varshajat02309@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:46:36', '2024-01-06 15:33:20'),
(28, 'Abhishek khot', 'git@123', 'abhishekkhot9921@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:46:58', '2024-01-06 15:33:20'),
(29, 'Prathamesh Prakash B', 'git@123', 'prathameshpbenake@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:47:24', '2024-01-06 15:33:20'),
(30, 'Rakeeb Ontigar', 'git@123', 'ontigarraqib03@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:47:47', '2024-01-06 15:33:20'),
(31, 'Sharan Hiremani', 'git@123', 'sharanrhiremani@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:48:06', '2024-01-06 15:33:20'),
(32, 'Rupesh Chavan', 'git@123', 'rupeshchavan048@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:48:24', '2024-01-06 15:33:20'),
(33, 'Vishal Ghadi', 'git@123', 'vishalghadi28112001@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:48:44', '2024-01-06 15:33:20'),
(34, 'Nadaf Najama Hajisah', 'git@123', 'najamanadaf83@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:49:49', '2024-01-06 15:33:20'),
(35, 'Suzen Nadaf', 'git@123', 'suzain1947@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:51:55', '2024-01-06 15:33:20'),
(36, 'Kalmeshwar', 'git@123', 'kalmeshwarbirje@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:52:14', '2024-01-06 15:33:20'),
(37, 'Pooja', 'git@123', 'poojavajramatti28@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:52:51', '2024-01-06 15:33:20'),
(38, 'Laxmi Mullatti', 'git@123', 'mullattilaxmi@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:53:12', '2024-01-06 15:33:20'),
(39, 'Sneha Gangal', 'git@123', 'snehagangal98@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:53:30', '2024-01-06 15:33:20'),
(40, 'Shweta Lokur', 'git@123', 'shwetalokur2@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:53:48', '2024-01-06 15:33:20'),
(41, 'Anupama Manoj Kawale', 'git@123', 'anupamakawale1281998@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:54:44', '2024-01-06 15:33:20'),
(42, 'Banashankari Kamat', 'git@123', 'banashankarikamat2001@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:55:08', '2024-01-06 15:33:20'),
(43, 'Nikita Patil', 'git@123', 'nikitapatil95815@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:55:51', '2024-01-06 15:33:20'),
(44, 'Aishwarya P Mahendrakar', 'git@123', 'aishwaryamahendrakar4@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:56:17', '2024-01-06 15:33:20'),
(45, 'Gouri', 'git@123', '09gouri.desai@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:56:37', '2024-01-06 15:33:20'),
(46, 'Tastain Sannakki', 'git@123', 'sannakkitastain@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:56:58', '2024-01-06 15:33:20'),
(47, 'Akshata Bhadti', 'git@123', 'akshatabhadti2645@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:57:15', '2024-01-06 15:33:20'),
(48, 'Shivani Nair', 'git@123', 'shivani.nair1201@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:57:42', '2024-01-06 15:33:20'),
(49, 'Omkar Kesarkar', 'git@123', 'omkarkesarkar65@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:58:00', '2024-01-06 15:33:20'),
(50, 'Palash Kalghatgi', 'git@123', 'kalghatgipalash@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:58:32', '2024-01-06 15:33:20'),
(51, 'Afra Pathan', 'git@123', 'afrapathan2506@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:58:52', '2024-01-06 15:33:20'),
(52, 'Neha Vijay Yadav', 'git@123', 'nehayadavkerur@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:59:14', '2024-01-06 15:33:20'),
(53, 'Keerti S Alebasappan', 'git@123', 'keertisakeerti@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:59:32', '2024-01-06 15:33:20'),
(54, 'Sammed Shetti', 'git@123', 'sammedshetti1008@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 03:59:50', '2024-01-06 15:33:20'),
(55, 'Rachana Mohite', 'git@123', 'mohiterach1998@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:00:35', '2024-01-06 15:33:20'),
(56, 'ARUNAKUMARA M MATAPA', 'git@123', 'arunmathapati9@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:01:15', '2024-01-06 15:33:20'),
(57, 'Savitri Sonnad', 'git@123', 'savitrisonnad123@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:01:36', '2024-01-06 15:33:20'),
(58, 'Mansi Bhatkande', 'git@123', 'mansibhatkande893@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:01:55', '2024-01-06 15:33:20'),
(59, 'Chetan P Shirahatti', 'git@123', 'chetanpshi9@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:02:14', '2024-01-06 15:33:20'),
(60, 'Omkar Potadar', 'git@123', 'omkarpotadar5302@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:02:43', '2024-01-06 15:33:20'),
(61, 'Manikanta. Reddy.H', 'git@123', 'manireddyh333@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:03:01', '2024-01-06 15:33:20'),
(62, 'Chetan', 'git@123', 'chetangoblin@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:03:35', '2024-01-06 15:33:20'),
(63, 'Sunita Hosamani', 'git@123', 'sunitarhosamanikrt@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:04:09', '2024-01-06 15:33:20'),
(64, 'Neha Malode', 'git@123', 'nehamalode1234@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:04:33', '2024-01-06 15:33:20'),
(65, 'Sandesh U Mungari', 'git@123', 'sandeshum07@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:04:52', '2024-01-06 15:33:20'),
(66, 'Affan Mujawar', 'git@123', 'mujawaraffanofficial@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:05:11', '2024-01-06 15:33:20'),
(67, 'Sushmitha R Hiremath', 'git@123', 'sushmithah992@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:05:30', '2024-01-06 15:33:20'),
(68, 'Komal Chavan', 'git@123', 'komalpc878@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:05:51', '2024-01-06 15:33:20'),
(69, 'Ranjita Gombi', 'git@123', 'ranjitagombi01rbk@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:06:32', '2024-01-06 15:33:20'),
(70, 'Shivani Shyam Pawar', 'git@123', 'shivanipawar9121999@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:06:54', '2024-01-06 15:33:20'),
(71, 'Rohit R Gudasi', 'git@123', 'rohitgudasi18@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:07:23', '2024-01-06 15:33:20'),
(72, 'Sumant Dharmatti', 'git@123', 'sumantdharmatti@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:07:40', '2024-01-06 15:33:20'),
(73, 'Vinay Mali', 'git@123', 'malivinu2000@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:07:59', '2024-01-06 15:33:20'),
(74, 'Pallavi Veerayya Hiremath', 'git@123', 'pallu.h18@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:08:51', '2024-01-06 15:33:20'),
(75, 'Rajat Bahadduri', 'git@123', 'rajatbahadduri@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:09:07', '2024-01-06 15:33:20'),
(76, 'Manjusha Pawar', 'git@123', 'pawarmanjusha818@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:09:28', '2024-01-06 15:33:20'),
(77, 'Manasi Udaysingh Hon', 'git@123', 'hongekarmanasi539@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:10:07', '2024-01-06 15:33:20'),
(78, 'Sayali', 'git@123', 'sayalislondhe@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:10:25', '2024-01-06 15:33:20'),
(79, 'SHRINATH WADDAR', 'git@123', 'shrinathwaddar1224@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 04:10:41', '2024-01-06 15:33:20'),
(80, 'Govardhan Sakhe', 'git@123', 'sakhegovardhan103@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:24:59', '2024-01-06 15:33:20'),
(81, 'Saiprakash', 'git@123', 'saiprakashpednekar31@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:25:31', '2024-01-06 15:33:20'),
(82, 'Pratik desai', 'git@123', 'desaipratik1008@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:31:06', '2024-01-06 15:33:20'),
(83, 'Sahana M Kubsad', 'git@123', 'sahanamkubsad0401@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:31:34', '2024-01-06 15:33:20'),
(84, 'Jyoti ajjappanavar', 'git@123', 'jyotiajjappanavar321@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:51:34', '2024-01-06 15:33:20'),
(85, 'Abhishek F Chalawadi', 'git@123', 'abhishekchalawadi465@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:52:07', '2024-01-06 15:33:20'),
(86, 'Jyoti Shivaji Salgud', 'git@123', 'salgudijyoti@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:52:48', '2024-01-06 15:33:20'),
(87, 'Swati hattiholi', 'git@123', 'hattiholiswati@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:53:59', '2024-01-06 15:33:20'),
(88, 'Sanket Kulkarni', 'TeStPPCHsk@1/', 'sanketkulkarnisk812@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:54:18', '2024-01-06 15:33:20'),
(89, 'Samhita R Adhyapak', 'git@123', 'samhitaadhyapak@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:54:39', '2024-01-06 15:33:20'),
(90, 'Abhijeet A Ghodageri', 'git@123', 'abhijeetghodageri5@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:55:04', '2024-01-06 15:33:20'),
(91, 'Ishwari Kothiwale', 'git@123', 'kothiwaleishwari@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:55:21', '2024-01-06 15:33:20'),
(92, 'Akshata Anil Kokate', 'git@123', 'akshatakokate4386@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:55:41', '2024-01-06 15:33:20'),
(93, 'Megha Prakash Bhekan', 'git@123', 'mpbhekane37@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-08 06:56:01', '2024-01-06 15:33:20'),
(94, 'Shivakumar Jalihal', 'git@123', 'shivjalihal@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-10 20:40:47', '2024-01-06 15:33:20'),
(95, 'Akash Hugar', 'git@123', 'akashhugar17@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-10 20:42:49', '2024-01-06 15:33:20'),
(96, 'Tejal kesarkar', 'git@123', 'tejalkesarkar18@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-10 20:43:24', '2024-01-06 15:33:20'),
(97, 'Snehal Shahu Patil', 'git@123', '23snehalpatil@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-10 20:44:03', '2024-01-06 15:33:20'),
(98, 'Rutuja Jotiba Karate', 'git@123', 'rutujajk4@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-10 20:44:39', '2024-01-06 15:33:20'),
(99, 'Nishant', 'git@123', 'nstotar3@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 05:57:59', '2024-01-06 15:33:20'),
(100, 'Rutika Patil', 'git@123', 'rutikapatil270@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 06:02:15', '2024-01-06 15:33:20'),
(101, 'Pramod Todakar', 'git@123', 'pramodtodakar81@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 06:33:06', '2024-01-06 15:33:20'),
(102, 'Prashant Jatrate', 'git@123', 'prashantjatrate143@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 06:33:46', '2024-01-06 15:33:20'),
(103, 'Somesh Hanji', 'git@123', 'someshhanji26@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 06:38:20', '2024-01-06 15:33:20'),
(104, 'Najmusahar kalkoti', 'git@123', 'najmusaharkalkoti@gmail.com', '', 1, 'Yes', 7, 2024, '2023-07-14 06:48:35', '2024-01-06 15:33:20'),
(105, 'Jidnyasa Vishnu Pati', 'git@123', 'patiljidnyasa7@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 06:56:11', '2024-01-06 15:33:20'),
(106, 'Kartik ITI', 'git@123', 'kartik.git108@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 07:00:15', '2024-01-06 15:33:20'),
(107, 'Vishal Yadav', 'git@123', 'vishuvy99@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 07:01:27', '2024-01-06 15:33:20'),
(108, 'Ajay kumar', 'git@123', 'ajayrchavan789@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 07:02:42', '2024-01-06 15:33:20'),
(109, 'SAMEER', 'git@123', 'sameernadaf5761@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 07:08:46', '2024-01-06 15:33:20'),
(110, 'Asheesh kulakarni', 'git@123', 'ashishkulkarni3502@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 07:12:23', '2024-01-06 15:33:20'),
(111, 'Vinayak Marikatti', 'git@123', 'vinayakmarikatti@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-14 07:13:40', '2024-01-06 15:33:20'),
(112, 'STudent', 'git@123', 'student@git.edu', '', 3, 'Yes', 7, 2024, '2023-07-16 00:33:16', '2024-01-06 15:33:20'),
(113, 'Tester', 'tester@123', 'tester@git.edu', '', 4, 'Yes', 7, 2024, '2023-07-18 05:13:13', '2024-01-06 15:33:20'),
(114, 'Bhoomika Nagathan', 'git@123', 'bhoomikacn11@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-18 12:13:01', '2024-01-06 15:33:20'),
(115, 'Shruti', 'git@123', 'stpatil166@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-18 12:13:49', '2024-01-06 15:33:20'),
(116, 'Anusha Kalburgi', 'git@123', 'anusha11kalburgi@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-26 13:07:22', '2024-01-06 15:33:20'),
(117, 'Pranali Bhaganache', 'git@123', 'pranalibhaganache@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-26 13:19:06', '2024-01-06 15:33:20'),
(118, 'Veena Bajantri', 'git@123', 'veenabajantri123@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-26 13:22:13', '2024-01-06 15:33:20'),
(119, 'Shreya Ramagouda Naik', 'git@123', 'shreyanaik0802@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-26 13:24:19', '2024-01-06 15:33:20'),
(120, 'Ritesh Shinge', 'git@123', 'riteshshinge106@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-29 15:22:37', '2024-01-06 15:33:20'),
(121, 'Poorva Balikai', 'git@123', 'poorvi3337@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-29 16:00:21', '2024-01-06 15:33:20'),
(122, 'Sadhana gokavi', 'git@123', 'Sadhanagokavi@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-29 16:13:44', '2024-01-06 15:33:20'),
(123, 'Hrishikesh Mogare', 'hrishi@123', 'hrishikeshsm@git.edu', '', 2, 'No', 0, 2024, '2023-07-29 17:12:51', '2024-01-06 15:37:03'),
(124, 'Supriya Mungare ', 'git@123', 'mungaresupriya@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-30 11:01:57', '2024-01-06 15:33:20'),
(128, 'Pavan Mitragotri', 'pavan@123', 'pvmitragotri@git.edu', '', 2, 'No', 0, 2024, '2023-07-30 12:09:00', '2024-01-06 15:36:51'),
(129, 'Nivedita A Gaonkar', 'git@123', 'Secretsnowy37@gmail.com', '', 3, 'Yes', 7, 2024, '2023-07-30 13:34:48', '2024-01-06 15:33:20'),
(223, 'Nilesh Anvekar', 'nilesh@123', 'nnanvekar@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 13:44:11', '2024-01-06 15:36:18'),
(224, 'Shivani Patankar', 'shivani@123', 'sdpatankar@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:45:27', '2024-01-06 15:36:18'),
(225, 'Vijaylaxmi Patil', 'vijaylaxmi@123', 'vcpatil@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:46:36', '2024-01-06 15:36:18'),
(226, 'Sheetal Bandekar', 'sheetal@123', 'ssbandekar@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:47:19', '2024-01-06 15:36:18'),
(227, 'Swarooprani Manoor', 'swarooprani@123', 'shmanoor@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:49:48', '2024-01-06 15:36:18'),
(228, 'Vinod Kokitkar', 'vinod@123', 'vrkokitkar@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:50:42', '2024-01-06 15:36:18'),
(229, 'Sunita Padmannavar', 'sunita@123', 'sspadmannavar@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:51:39', '2024-01-06 15:36:18'),
(230, 'Swetha Goudar', 'swetha@123', 'sigoudar@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:54:41', '2024-01-06 15:36:18'),
(231, 'Pijush Barthakur', 'pijush@123', 'pbarthakur@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:55:57', '2024-01-06 15:36:18'),
(232, 'Mrutunjaya Emmi', 'emmi@123', 'msemmi@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:56:40', '2024-01-06 15:36:18'),
(233, 'Jayashri Madalgi', 'jayashri@123', 'jayashri@git.edu', '', 2, 'No', 0, 2024, '2023-08-01 14:57:27', '2024-01-06 15:36:18'),
(234, 'Sachin Dessai', 'sachin@123', 'smdesai@git.edu', '', 2, 'No', 0, 2024, '2023-08-02 04:26:37', '2024-01-06 15:36:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rgg` (`mentor_id`),
  ADD KEY `grg` (`mentee_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electiveenrollment`
--
ALTER TABLE `electiveenrollment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `bj` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rgrg` (`user_id`);

--
-- Indexes for table `facultyallotment`
--
ALTER TABLE `facultyallotment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dr` (`course_id`),
  ADD KEY `rt` (`faculty_id`);

--
-- Indexes for table `impfiles`
--
ALTER TABLE `impfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `randomtimetable`
--
ALTER TABLE `randomtimetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grf` (`faculty_id1`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `faculty_id2` (`faculty_id2`),
  ADD KEY `faculty_id3` (`faculty_id3`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rgr` (`user_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grf` (`faculty_id1`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `faculty_id2` (`faculty_id2`),
  ADD KEY `faculty_id3` (`faculty_id3`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allotment`
--
ALTER TABLE `allotment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `electiveenrollment`
--
ALTER TABLE `electiveenrollment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `facultyallotment`
--
ALTER TABLE `facultyallotment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `impfiles`
--
ALTER TABLE `impfiles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `randomtimetable`
--
ALTER TABLE `randomtimetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1927;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allotment`
--
ALTER TABLE `allotment`
  ADD CONSTRAINT `grg` FOREIGN KEY (`mentee_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `rgg` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `electiveenrollment`
--
ALTER TABLE `electiveenrollment`
  ADD CONSTRAINT `bj` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `rgrg` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `facultyallotment`
--
ALTER TABLE `facultyallotment`
  ADD CONSTRAINT `dr` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `rt` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `rgr` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `grf` FOREIGN KEY (`faculty_id1`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`faculty_id2`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `timetable_ibfk_4` FOREIGN KEY (`faculty_id3`) REFERENCES `faculty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
