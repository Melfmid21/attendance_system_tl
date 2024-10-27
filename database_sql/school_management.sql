-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 12:14 AM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `guardian_number` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `grade_year` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `fingerprint_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `middle_name`, `lastname`, `dob`, `gender`, `address`, `contact_number`, `fathers_name`, `mothers_name`, `guardian_number`, `grade_level`, `grade_year`, `course`, `fingerprint_id`) VALUES
(2, 'precious love', 'cababan', 'gigante', '2010-11-25', 'female', 'lawis src', '09322342423', 'amid gigante sr', 'mycil gigante', '093423423423', 'junior high', 'grade 8', '', 1),
(3, 'princess mae', 'cababan', 'gigante', '1997-05-21', 'female', 'lawis src', '093423423', 'amid gigante sr', 'mycil gigante', '094534534534', 'college', '1st year', '', 2);

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
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middle_initial`, `lastname`, `gender`, `email`, `password`, `role`, `status`) VALUES
(1, '', '', '', '', 'melfmid21', '$2y$10$Sn.TgxqQ5jXLT9PrCc4zjeAl4uK9PBEuoKmTdz08He9gEkdU/qgqm', 'admin', 'active'),
(2, 'Amid', 'C', 'Gigante', 'Male', 'amid@gmail.com', '$2y$10$3.Uo96RjfkTb7w0AGYwKDubuRSC.gDmijB0Y5kbsWm8PDfhCleZlS', 'teacher', 'inactive'),
(3, 'Melfie', 'C', 'Gigante', 'Female', 'melfie@gmail.com', '$2y$10$4NuxgTcx8QePCKMY6yUiru1X14Eyi7/vsRoLMVWNwLnHra76rKVaC', 'teacher', 'inactive'),
(4, 'Princess', 'C', 'Gigante', 'Female', 'princess@gmail.com', '$2y$10$vbcLy1wpxhRtd/WUAA5kHerQQFc70Dpm4NBc54Kb1u5d1GygLtZ/6', 'teacher', 'inactive'),
(5, 'Precious', 'C', 'gigante', 'Female', 'precious@gmail.com', '$2y$10$GtHywy8TOmKJr00Zj7V2Auial5qgY1idkNzKUgrzGboXK.kSTaG2.', 'teacher', 'inactive'),
(6, 'Michelle', 'C', 'Gigante', 'Female', 'michelle@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive'),
(7, 'Jerry', 'S', 'Cababan', 'Male', 'jerry@gmail.com', '$2y$10$OfeRgNq3FheltbiMY9HZQOu8g9kHCRhyf.Wi8.ydUau058vpwRGVa', 'teacher', 'active'),
(8, 'Arlene', 'C', 'Cababan', 'Female', 'arlene@gmail.com', '12345678', 'teacher', 'active'),
(38, 'Ben', 'D', 'Sinadjan', 'male', 'ben.david@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(39, 'Clara', 'E', 'Edwards', 'Female', 'clara.edwards@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(40, 'Daniel', 'F', 'Fernandez', 'Male', 'daniel.fernandez@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive'),
(41, 'Eva', 'G', 'Garcia', 'Female', 'eva.garcia@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(42, 'Frank', 'H', 'Harris', 'Male', 'frank.harris@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive'),
(43, 'Grace', 'I', 'Ivanova', 'Female', 'grace.ivanova@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(44, 'Henry', 'J', 'Johnson', 'Male', 'henry.johnson@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(45, 'Irene', 'K', 'Klein', 'Female', 'irene.klein@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(46, 'Jack', 'L', 'Lee', 'Male', 'jack.lee@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive'),
(47, 'Kate', 'M', 'Miller', 'Female', 'kate.miller@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'inactive'),
(48, 'Liam', 'N', 'Nelson', 'Male', 'liam.nelson@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(49, 'Mia', 'O', 'Olsen', 'Female', 'mia.olsen@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(50, 'Noah', 'P', 'Parker', 'Male', 'noah.parker@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(51, 'Olivia', 'Q', 'Quinn', 'Female', 'olivia.quinn@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(52, 'Paul', 'R', 'Roberts', 'Male', 'paul.roberts@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(53, 'Quinn', 'S', 'Smith', 'Female', 'quinn.smith@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(54, 'Ryan', 'T', 'Taylor', 'Male', 'ryan.taylor@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(55, 'Sophia', 'U', 'Umstead', 'Female', 'sophia.umstead@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(56, 'Tom', 'V', 'Vaughn', 'Male', 'tom.vaughn@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(57, 'Uma', 'W', 'Wang', 'Female', 'uma.wang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(58, 'Victor', 'X', 'Xu', 'Male', 'victor.xu@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(59, 'Wendy', 'Y', 'Yang', 'Female', 'wendy.yang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(60, 'Xander', 'Z', 'Zhang', 'Male', 'xander.zhang@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(61, 'Yara', 'A', 'Adams Apple', 'Female', 'yara.adams@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(62, 'Zane', 'B', 'Brown', 'Male', 'zane.brown@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(63, 'Alice', 'C', 'Collins', 'Male', 'alice.collins@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(64, 'Bob', 'D', 'Davis', 'Male', 'bob.davis@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(65, 'Catherine', 'E', 'Evans', 'Female', 'catherine.evans@gmail.com', '$2y$10$E1tSjkzL1yXP416zJqHG1.lZhAoOq/8zsIWtofuS1.nmdTvqgFs1u', 'teacher', 'active'),
(66, 'Arnold', 'D', 'Sinadjan', 'male', 'arnold@gmail.com', '$2y$10$S3kXzuDAij0jyYx8D1CJnu5Hl3G9rUoCUYjah.EZglCDhKwZIEEbW', 'teacher', 'active'),
(67, 'Arnold', 'E', 'Evans', 'Select gen', 'arnold2@gmail.com', '$2y$10$kAFBntoyKHwY9oIoEAo4HeYjpsrmNhT6BJ9FLHQMefX8HUFAr7PlK', 'teacher', 'active'),
(68, 'Arnold', 'F', 'Adams', 'male', 'melfies@gmail.com', '$2y$10$yryVsJ.XMjjErw77t4xG9e3kSokurvYvCwcX5Sr6pFaGhBxCzRhaa', 'teacher', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fingerprint_id` (`fingerprint_id`),
  ADD KEY `fingerprint_id_2` (`fingerprint_id`);

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
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
