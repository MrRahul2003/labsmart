-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 05:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labsmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `user_id` int(255) NOT NULL,
  `repair_Id` int(255) NOT NULL,
  `dvc_name` varchar(255) NOT NULL,
  `paid_on` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pymnt` varchar(255) NOT NULL,
  `SrNo` int(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`user_id`, `repair_Id`, `dvc_name`, `paid_on`, `status`, `pymnt`, `SrNo`, `payment_id`) VALUES
(1, 1, 'dsafa', '2022-10-13', 'Success', 'Yes', 1, ''),
(3, 2, 'dfsa', '2022-10-06', 'Success', 'No', 3, ''),
(3, 5, 'fds', '2022-10-07', 'Success', 'Yes', 3, ''),
(43, 6, 'fdas', '2022-10-07', 'Success', 'Yes', 54, ''),
(4, 7, 'fdsa', '2022-10-14', 'Success', 'Yes', 54, ''),
(65534, 8, 'gfsd', '2022-10-07', 'Success', 'Yes', 54, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`repair_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `repair_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
