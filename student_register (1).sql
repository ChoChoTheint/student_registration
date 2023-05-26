-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 11:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_registration_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `nrc` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `career` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`id`, `student_id`, `name`, `father_name`, `nrc`, `phone_no`, `email`, `gender`, `date_of_birth`, `address`, `career`, `skill`, `flag`, `file`, `created_at`, `updated_at`) VALUES
(1, 0, 'AdminUpdate', 'U kyaw', '12/ukama(N)233123', '09799517031', 'admin12@gmail.com', 0, '0000-00-00', 'Pearl 2 Street  ,  North Okkalapa', 1, '', 1, '', '2023-05-26', '2023-05-26'),
(2, 0, 'cho cho theint update12', 'U kyaw', '12/ukama(N)233123', '09799517031', 'admin12@gmail.com', 1, '2023-05-13', 'Pearl 2 Street  ,  North Okkalapa', 1, '3', 1, 'upload/Screenshot (2).png', '2023-05-26', '2023-05-26'),
(5, 0, 'cho cho theint update12', 'U kyaw gyi', '12/ukama(N)233123', '124678', 'user@gmail.com', 1, '2023-05-17', 'asdfhjk', 2, '3', 1, 'Array', '2023-05-26', '2023-05-26'),
(6, 0, 'cho cho theint update12', 'U kyaw gyi', '12/ukama(N)233123', '124678', 'user@gmail.com', 1, '2023-05-17', 'asdfhjk', 2, '3', 1, '', '2023-05-26', '2023-05-26'),
(7, 0, 'cho cho theint update12', 'U kyaw gyi', '12/ukama(N)233123', '124678', 'user@gmail.com', 1, '2023-05-17', 'asdfhjk', 2, '3', 1, '', '2023-05-26', '2023-05-26'),
(8, 0, 'admin', 'U kyaw gyi', '12/ukama(N)233123', '09799517031', 'naing.zawmoee@yahoo.com', 1, '2023-05-17', 'Pearl 2 Street  ,  North Okkalapa', 1, '3', 1, '', '2023-05-26', '2023-05-26'),
(9, 0, 'admin', 'U kyaw gyi', '12/ukama(N)233123', '09799517031', 'naing.zawmoee@yahoo.com', 1, '2023-05-17', 'Pearl 2 Street  ,  North Okkalapa', 1, '3', 1, '', '2023-05-26', '2023-05-26'),
(10, 0, 'admin', 'U kyaw gyi', '12/ukama(N)233123', '09799517031', 'naing.zawmoee@yahoo.com', 1, '2023-05-17', 'Pearl 2 Street  ,  North Okkalapa', 1, '3', 1, 'upload/tree-736885_1280.jpg', '2023-05-26', '2023-05-26'),
(11, 0, 'cho cho theint update12', 'U kyaw', '12/ukama(N)233123', '09799517031', 'admin12@gmail.com', 1, '0000-00-00', 'Pearl 2 Street  ,  North Okkalapa', 2, '3', 1, 'upload/Screenshot (8).png', '2023-05-26', '2023-05-26'),
(12, 0, 'cho cho theint update12', 'U kyaw', '12/ukama(N)233123', '09799517031', 'admin12@gmail.com', 1, '2023-05-20', 'Pearl 2 Street  ,  North Okkalapa', 1, '3', 1, 'upload/Screenshot (16).png', '2023-05-26', '2023-05-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
