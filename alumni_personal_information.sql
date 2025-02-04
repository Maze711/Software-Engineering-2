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
-- Table structure for table `alumni_personal_information`
--

CREATE TABLE `alumni_personal_information` (
  `id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_personal_information`
--

INSERT INTO `alumni_personal_information` (`id`, `alumni_id`, `lastname`, `firstname`, `middlename`, `suffix`, `gender`, `birthdate`, `email`, `address`, `number`) VALUES
(1, 1, 'Smith', 'John', 'A.', 'Jr.', 'Male', '1995-05-20', 'john.smith@example.com', '123 Main St, City', '1234567890'),
(2, 2, 'Doe', 'Jane', 'B.', '', 'Female', '1996-07-15', 'jane.doe@example.com', '456 Elm St, City', '0987654321'),
(3, 3, 'Brown', 'Charlie', 'C.', '', 'Male', '1994-03-10', 'charlie.brown@example.com', '789 Oak St, City', '1122334455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_personal_information`
--
ALTER TABLE `alumni_personal_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_personal_information`
--
ALTER TABLE `alumni_personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
