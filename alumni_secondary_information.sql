-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 03:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softeng_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_secondary_information`
--

CREATE TABLE `alumni_secondary_information` (
  `id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `collegedepartment` varchar(50) NOT NULL,
  `yeargraduated` varchar(50) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `workstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_secondary_information`
--

INSERT INTO `alumni_secondary_information` (`id`, `alumni_id`, `collegedepartment`, `yeargraduated`, `civilstatus`, `workstatus`) VALUES
(1, 1, 'Computer Science', '2017', 'Single', 'Employed'),
(2, 2, 'Information Technology', '2018', 'Married', 'Self-Employed'),
(3, 3, 'Software Engineering', '2016', 'Single', 'Unemployed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_secondary_information`
--
ALTER TABLE `alumni_secondary_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumni_id` (`alumni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_secondary_information`
--
ALTER TABLE `alumni_secondary_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
