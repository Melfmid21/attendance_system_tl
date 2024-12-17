-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 11:53 PM
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
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `grade_level` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `course_section` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `fullname`, `grade_level`, `year_level`, `course_section`, `date_time`) VALUES
(1, 3, 'Gigante, Amid C.', 'College', '1st Year', 'BSIT', '2024-11-23 11:02:09'),
(2, 4, 'Formanez, Melfie Y.', 'Senior High', 'Grade 11', 'Sampaguita', '2024-11-23 11:03:23'),
(3, 5, 'Gigante, Precious Love', 'Junior High', 'Grade 8', 'Tubol', '2024-11-23 11:07:02'),
(4, 0, 'Student 1', 'Grade 10', 'Year 2024', 'Section A', '2024-11-23 00:00:00'),
(5, 0, 'Student 2', 'Grade 11', 'Year 2024', 'Section B', '2024-11-23 00:15:00'),
(6, 0, 'Student 3', 'Grade 12', 'Year 2024', 'Section C', '2024-11-23 00:30:00'),
(7, 0, 'Student 4', 'Grade 10', 'Year 2024', 'Section D', '2024-11-23 00:45:00'),
(8, 0, 'Student 5', 'Grade 11', 'Year 2024', 'Section E', '2024-11-23 01:00:00'),
(9, 0, 'Student 6', 'Grade 12', 'Year 2024', 'Section F', '2024-11-23 01:15:00'),
(10, 0, 'Student 7', 'Grade 10', 'Year 2024', 'Section G', '2024-11-23 01:30:00'),
(11, 0, 'Student 8', 'Grade 11', 'Year 2024', 'Section H', '2024-11-23 01:45:00'),
(12, 0, 'Student 9', 'Grade 12', 'Year 2024', 'Section I', '2024-11-23 02:00:00'),
(13, 0, 'Student 10', 'Grade 10', 'Year 2024', 'Section J', '2024-11-23 02:15:00'),
(14, 6, 'Alge, Joshia', 'College', '1st Year', 'BSIT', '2024-11-23 09:33:18'),
(15, 7, 'Gigante, Amid Jr.', 'Level 1', 'Level 2', 'Igit', '2024-11-23 12:35:25'),
(16, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:35:50'),
(17, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:36:20'),
(18, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:37:17'),
(19, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:38:04'),
(20, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:38:13'),
(21, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:38:34'),
(22, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:38:39'),
(23, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:38:50'),
(24, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:38:55'),
(25, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:39:02'),
(26, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:39:07'),
(27, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:39:15'),
(28, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:39:28'),
(29, 1, 'Gigante, Melfie Y.', 'sfsdf', 'sdf', 'sdf', '2024-12-01 09:39:41'),
(30, 3, 'gigante, precious C.', 'College', '2nd Year', 'BSIT', '2024-12-17 22:50:00'),
(31, 5, 'Gigante, Melfie Y.', 'College', '3rd Year', 'HRM', '2024-12-17 22:50:45'),
(32, 7, 'Padilla, Daniel R.', 'College', '1st Year', 'BSIT', '2024-12-17 22:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `biometric`
--

CREATE TABLE `biometric` (
  `id` int(11) NOT NULL,
  `biometric_id` varchar(50) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biometric`
--

INSERT INTO `biometric` (`id`, `biometric_id`, `room_name`, `mode`) VALUES
(1, '1', 'Lab 1', 'Attendance'),
(4, '1846FD519140', '', 'attendance');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `grade_level` varchar(100) NOT NULL,
  `course_section_name` varchar(100) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `grade_level`, `course_section_name`, `isDeleted`) VALUES
(1, 'college', 'Bachelor of Science in Computer Engineering', 0),
(2, 'college', 'BSIT', 1),
(3, 'college', 'Human Resource Management', 0),
(4, 'college', 'Bachelor of Science in Information Technology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `guardian_contact_number` varchar(50) NOT NULL,
  `guardian_address` varchar(255) NOT NULL,
  `grade_level` varchar(100) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `fingerprint_id` int(11) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middle_name`, `lastname`, `gender`, `dob`, `email`, `address`, `contact_number`, `guardian_name`, `relationship`, `guardian_contact_number`, `guardian_address`, `grade_level`, `course`, `year_level`, `department`, `fingerprint_id`, `datetime_created`, `isDeleted`) VALUES
(3, 'precious', 'cababan', 'gigante', 'female', '2024-11-16', 'amid@gmail.com', 'sdfsdf', '121212', 'sdfsdf', 'sdfsd', '1', 'sfsdfsd', 'College', 'BSIT', '2nd Year', '', 3, '2024-12-17 22:49:41', 0),
(5, 'Melfie', 'yburan', 'Gigante', 'female', '2024-11-17', 'melfies@gmail.com', 'fsfdsd', '121212', 'sdfsd', 'sdf', '324234', 'sdfsd', 'College', 'HRM', '3rd Year', '', 7, '2024-12-01 09:22:06', 0),
(6, 'James', 'Green', 'Red', 'other', '1996-01-23', 'james@gmail.com', 'Manila ph', '0913133131', 'Michell Red', 'Mother', '09452534543', 'Manila ph', '', 'Bachelor of Science in Computer Engineering', '1st Year', '', 1, '2024-12-17 21:55:15', 0),
(7, 'Daniel', 'Ramirez', 'Padilla', 'male', '1996-01-23', 'daniel@gmail.com', 'Lawis src', '094353535', 'Daniela Padilla', 'Mother', '09453524423', 'Negros Ph', 'College', 'BSIT', '1st Year', '', 2, '2024-12-17 22:12:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `grade_level` varchar(100) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `grade_level`, `isDeleted`) VALUES
(1, 'Physical Education 6', 'college', 1),
(2, 'Physical Education 7', 'college', 1),
(3, 'Physical Education', 'college', 0),
(4, 'Programming 1', 'college', 0),
(5, 'Capstone 1', 'college', 0),
(6, 'Physical Education 7', 'college', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_schedule`
--

CREATE TABLE `teacher_schedule` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `year_level` tinyint(4) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_schedule`
--

INSERT INTO `teacher_schedule` (`id`, `teacher_id`, `year_level`, `course_id`, `subject_id`, `days`, `start_time`, `end_time`, `isDeleted`) VALUES
(1, 4, 4, 1, 3, 'Monday', '08:00:00', '09:00:00', 0),
(2, 68, 4, 4, 3, '[\"Monday\",\"Wednesday\",\"Friday\"]', '08:00:00', '09:00:00', 0),
(3, 4, 4, 4, 3, '[\"Tuesday\",\"Thursday\"]', '08:00:00', '09:00:00', 0),
(4, 65, 2, 4, 3, '[\"Friday\"]', '08:00:00', '09:00:00', 0),
(5, 68, 1, 1, 3, 'Monday, Wednesday, Friday', '08:00:00', '09:00:00', 0),
(6, 68, 2, 1, 3, 'Monday, Wednesday, Friday', '08:00:00', '09:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middle_initial` varchar(10) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middle_initial`, `lastname`, `gender`, `email`, `password`, `role`, `status`, `datetime_created`, `isDeleted`) VALUES
(1, '', '', '', '', 'melfmid21', '$2y$10$Sn.TgxqQ5jXLT9PrCc4zjeAl4uK9PBEuoKmTdz08He9gEkdU/qgqm', 'admin', 'active', '2024-11-20 10:55:24', 1),
(2, 'Amid', 'C', 'Gwapo', 'Female', 'amid@gmail.com', '$2y$10$3.Uo96RjfkTb7w0AGYwKDubuRSC.gDmijB0Y5kbsWm8PDfhCleZlS', 'teacher', 'active', '2024-11-20 10:55:24', 1),
(3, 'Melfie', 'C', 'Gigante', 'Female', 'melfie@gmail.com', '$2y$10$4NuxgTcx8QePCKMY6yUiru1X14Eyi7/vsRoLMVWNwLnHra76rKVaC', 'teacher', 'inactive', '2024-12-17 21:06:35', 0),
(4, 'Princess', 'C', 'Gigante', 'Male', 'princess@gmail.com', '$2y$10$vbcLy1wpxhRtd/WUAA5kHerQQFc70Dpm4NBc54Kb1u5d1GygLtZ/6', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(5, 'Precious', 'C', 'gigante', 'Female', 'precious@gmail.com', '$2y$10$GtHywy8TOmKJr00Zj7V2Auial5qgY1idkNzKUgrzGboXK.kSTaG2.', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(6, 'Michelle', 'C', 'Gigante', 'Female', 'michelle@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(7, 'Jerry', 'S', 'Cababan', 'Female', 'jerry@gmail.com', '$2y$10$OfeRgNq3FheltbiMY9HZQOu8g9kHCRhyf.Wi8.ydUau058vpwRGVa', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(38, 'Ben', 'D', 'Sinadjan', 'male', 'ben.david@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(39, 'Clara', 'E', 'Edwards', 'Female', 'clara.edwards@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(40, 'Daniel', 'F', 'Fernandez', 'Male', 'daniel.fernandez@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(41, 'Eva', 'G', 'Garcia', 'Female', 'eva.garcia@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(42, 'Frank', 'H', 'Harris', 'Male', 'frank.harris@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(43, 'Grace', 'I', 'Ivanova', 'Female', 'grace.ivanova@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(44, 'Henry', 'J', 'Johnson', 'Male', 'henry.johnson@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(45, 'Irene', 'K', 'Klein', 'Female', 'irene.klein@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(46, 'Jack', 'L', 'Lee', 'Male', 'jack.lee@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(47, 'Kate', 'M', 'Miller', 'Female', 'kate.miller@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', '2024-11-20 10:55:24', 0),
(48, 'Liam', 'N', 'Nelson', 'Male', 'liam.nelson@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(49, 'Mia', 'O', 'Olsen', 'Female', 'mia.olsen@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(50, 'Noah', 'P', 'Parker', 'Male', 'noah.parker@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(51, 'Olivia', 'Q', 'Quinn', 'Female', 'olivia.quinn@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(52, 'Paul', 'R', 'Roberts', 'Male', 'paul.roberts@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(53, 'Quinn', 'S', 'Smith', 'Female', 'quinn.smith@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(54, 'Ryan', 'T', 'Taylor', 'Male', 'ryan.taylor@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(55, 'Sophia', 'U', 'Umstead', 'Female', 'sophia.umstead@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(56, 'Tom', 'V', 'Vaughn', 'Male', 'tom.vaughn@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(57, 'Uma', 'W', 'Wang', 'Female', 'uma.wang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(58, 'Victor', 'X', 'Xu', 'Male', 'victor.xu@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(59, 'Wendy', 'Y', 'Yang', 'Female', 'wendy.yang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(60, 'Xander', 'Z', 'Zhang', 'Male', 'xander.zhang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(61, 'Yara', 'A', 'Adams Apple', 'Female', 'yara.adams@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(62, 'Zane', 'B', 'Brown', 'Male', 'zane.brown@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(63, 'Alice', 'C', 'Collins', 'Male', 'alice.collins@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(64, 'Bob', 'D', 'Davis', 'Male', 'bob.davis@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(65, 'Catherine', 'E', 'Evans', 'Female', 'catherine.evans@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(66, 'Arnold', 'D', 'Sinadjan', 'Male', 'arnold@gmail.com', '$2y$10$S3kXzuDAij0jyYx8D1CJnu5Hl3G9rUoCUYjah.EZglCDhKwZIEEbW', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(67, 'Arnold', 'E', 'Evans', 'Male', 'arnold2@gmail.com', '$2y$10$kAFBntoyKHwY9oIoEAo4HeYjpsrmNhT6BJ9FLHQMefX8HUFAr7PlK', 'teacher', 'active', '2024-11-20 10:55:24', 0),
(68, 'Arnold', 'F', 'Adams', 'male', 'melfies@gmail.com', '$2y$10$yryVsJ.XMjjErw77t4xG9e3kSokurvYvCwcX5Sr6pFaGhBxCzRhaa', 'teacher', 'inactive', '2024-11-20 10:55:24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biometric`
--
ALTER TABLE `biometric`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `biometric_id` (`biometric_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `biometric`
--
ALTER TABLE `biometric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_schedule`
--
ALTER TABLE `teacher_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
