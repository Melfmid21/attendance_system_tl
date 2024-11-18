-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 12:32 PM
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
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date_time`) VALUES
(1, 3, '2024-11-18 10:59:52'),
(2, 1, '2024-11-18 11:03:14'),
(3, 5, '2024-11-18 11:29:29');

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
  `isDeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middle_name`, `lastname`, `gender`, `dob`, `email`, `address`, `contact_number`, `guardian_name`, `relationship`, `guardian_contact_number`, `guardian_address`, `grade_level`, `course`, `year_level`, `department`, `fingerprint_id`, `isDeleted`) VALUES
(1, 'Melfie', 'Yburan', 'Gigante', 'Female', '2024-10-01', 'melfie@gmail.com', 'tagunol', '921131313', 'Noemi Formanez', '', '1313131', 'sdfsdfsaf', 'sfsdf', 'sdf', 'sdf', 'sdffds', 1, 1),
(2, 'sdfsd', 'sdf', 'sdfsdf', 'male', '2024-11-23', 'melfmid21', 'fsdf', '121', 'sdfsd', 'sdfsdfa', '121', 'sdfsdf', '', 'sdf', '1st Year', '', 1, 1),
(3, 'precious', 'cababan', 'gigante', 'female', '2024-11-16', 'amid@gmail.com', 'sdfsdf', '121212', 'sdfsdf', 'sdfsd', '21121', 'sfsdfsd', 'College', 'BSIT', '2nd Year', '', 121, 0),
(5, 'Melfie', 'yburan', 'Gigante', 'female', '2024-11-17', 'melfies@gmail.com', 'fsfdsd', '121212', 'sdfsd', 'sdf', '324234', 'sdfsd', 'College', 'HRM', '3rd Year', '', 12111, 0);

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
  `isDeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middle_initial`, `lastname`, `gender`, `email`, `password`, `role`, `status`, `isDeleted`) VALUES
(1, '', '', '', '', 'melfmid21', '$2y$10$Sn.TgxqQ5jXLT9PrCc4zjeAl4uK9PBEuoKmTdz08He9gEkdU/qgqm', 'admin', 'active', 1),
(2, 'Amid', 'C', 'Gwapo', 'Female', 'amid@gmail.com', '$2y$10$3.Uo96RjfkTb7w0AGYwKDubuRSC.gDmijB0Y5kbsWm8PDfhCleZlS', 'teacher', 'active', 1),
(3, 'Melfie', 'C', 'Gigante', 'Female', 'melfie@gmail.com', '$2y$10$4NuxgTcx8QePCKMY6yUiru1X14Eyi7/vsRoLMVWNwLnHra76rKVaC', 'teacher', 'inactive', 1),
(4, 'Princess', 'C', 'Gigante', 'Male', 'princess@gmail.com', '$2y$10$vbcLy1wpxhRtd/WUAA5kHerQQFc70Dpm4NBc54Kb1u5d1GygLtZ/6', 'teacher', 'inactive', 0),
(5, 'Precious', 'C', 'gigante', 'Female', 'precious@gmail.com', '$2y$10$GtHywy8TOmKJr00Zj7V2Auial5qgY1idkNzKUgrzGboXK.kSTaG2.', 'teacher', 'inactive', 0),
(6, 'Michelle', 'C', 'Gigante', 'Female', 'michelle@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', 0),
(7, 'Jerry', 'S', 'Cababan', 'Female', 'jerry@gmail.com', '$2y$10$OfeRgNq3FheltbiMY9HZQOu8g9kHCRhyf.Wi8.ydUau058vpwRGVa', 'teacher', 'inactive', 0),
(8, 'Arlene', 'C', 'Cababan', 'Male', 'arlene@gmail.com', '12345678', 'teacher', 'inactive', 0),
(38, 'Ben', 'D', 'Sinadjan', 'male', 'ben.david@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', 0),
(39, 'Clara', 'E', 'Edwards', 'Female', 'clara.edwards@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', 0),
(40, 'Daniel', 'F', 'Fernandez', 'Male', 'daniel.fernandez@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', 0),
(41, 'Eva', 'G', 'Garcia', 'Female', 'eva.garcia@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(42, 'Frank', 'H', 'Harris', 'Male', 'frank.harris@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', 0),
(43, 'Grace', 'I', 'Ivanova', 'Female', 'grace.ivanova@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(44, 'Henry', 'J', 'Johnson', 'Male', 'henry.johnson@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(45, 'Irene', 'K', 'Klein', 'Female', 'irene.klein@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(46, 'Jack', 'L', 'Lee', 'Male', 'jack.lee@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', 0),
(47, 'Kate', 'M', 'Miller', 'Female', 'kate.miller@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive', 0),
(48, 'Liam', 'N', 'Nelson', 'Male', 'liam.nelson@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(49, 'Mia', 'O', 'Olsen', 'Female', 'mia.olsen@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(50, 'Noah', 'P', 'Parker', 'Male', 'noah.parker@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(51, 'Olivia', 'Q', 'Quinn', 'Female', 'olivia.quinn@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(52, 'Paul', 'R', 'Roberts', 'Male', 'paul.roberts@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(53, 'Quinn', 'S', 'Smith', 'Female', 'quinn.smith@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(54, 'Ryan', 'T', 'Taylor', 'Male', 'ryan.taylor@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(55, 'Sophia', 'U', 'Umstead', 'Female', 'sophia.umstead@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(56, 'Tom', 'V', 'Vaughn', 'Male', 'tom.vaughn@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(57, 'Uma', 'W', 'Wang', 'Female', 'uma.wang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(58, 'Victor', 'X', 'Xu', 'Male', 'victor.xu@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(59, 'Wendy', 'Y', 'Yang', 'Female', 'wendy.yang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(60, 'Xander', 'Z', 'Zhang', 'Male', 'xander.zhang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(61, 'Yara', 'A', 'Adams Apple', 'Female', 'yara.adams@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(62, 'Zane', 'B', 'Brown', 'Male', 'zane.brown@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(63, 'Alice', 'C', 'Collins', 'Male', 'alice.collins@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(64, 'Bob', 'D', 'Davis', 'Male', 'bob.davis@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(65, 'Catherine', 'E', 'Evans', 'Female', 'catherine.evans@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active', 0),
(66, 'Arnold', 'D', 'Sinadjan', 'Male', 'arnold@gmail.com', '$2y$10$S3kXzuDAij0jyYx8D1CJnu5Hl3G9rUoCUYjah.EZglCDhKwZIEEbW', 'teacher', 'active', 0),
(67, 'Arnold', 'E', 'Evans', 'Male', 'arnold2@gmail.com', '$2y$10$kAFBntoyKHwY9oIoEAo4HeYjpsrmNhT6BJ9FLHQMefX8HUFAr7PlK', 'teacher', 'active', 0),
(68, 'Arnold', 'F', 'Adams', 'male', 'melfies@gmail.com', '$2y$10$yryVsJ.XMjjErw77t4xG9e3kSokurvYvCwcX5Sr6pFaGhBxCzRhaa', 'teacher', 'inactive', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
