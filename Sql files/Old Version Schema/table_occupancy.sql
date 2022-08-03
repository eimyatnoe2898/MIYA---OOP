-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 08:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miya_customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_occupancy`
--

CREATE TABLE `table_occupancy` (
  `table_occupancy_id` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `occupancy_status` varchar(25) NOT NULL,
  `checkin_time` timestamp NULL DEFAULT NULL
  `checkout`
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_occupancy`
--

INSERT INTO `table_occupancy` (`table_occupancy_id`, `table_number`, `occupancy_status`, `checkin_time`) VALUES
(30, 1, 'checked out', '2022-05-17 17:55:18'),
(31, 2, 'checked out', '2022-05-17 06:08:46'),
(32, 0, 'checked out', '2022-05-17 06:41:30'),
(33, 19, 'checked out', '2022-05-17 06:46:33'),
(34, 12, 'checked out', '2022-05-17 07:23:48'),
(35, 9, 'checked out', '2022-05-17 08:00:11'),
(36, 10, 'checked out', '2022-05-17 08:29:21'),
(37, 23, 'checked out', '2022-05-17 09:20:28'),
(38, 5, 'checked out', '2022-05-17 09:23:07'),
(39, 64, 'checked out', '2022-05-17 09:24:21'),
(40, 45, 'checked out', '2022-05-17 10:07:39'),
(41, 40, 'checked out', '2022-05-17 10:21:22'),
(42, 60, 'checked out', '2022-05-17 10:28:33'),
(43, 7, 'checked out', '2022-05-17 11:13:47'),
(44, 48, 'checked out', '2022-05-17 11:21:36'),
(45, 17, 'checked out', '2022-05-17 13:31:37'),
(46, 22, 'checked out', '2022-05-17 14:17:23'),
(47, 1, 'checked out', '2022-05-24 16:26:12'),
(48, 2, 'checked out', '2022-05-25 17:18:29'),
(49, 3, 'checked out', '2022-05-25 06:23:17'),
(50, 3, 'checked out', '2022-05-25 07:06:04'),
(51, 6, 'checked out', '2022-05-25 07:33:33'),
(52, 6, 'checked out', '2022-05-25 07:44:02'),
(53, 6, 'checked out', '2022-05-25 07:50:19'),
(54, 6, 'checked out', '2022-05-25 07:53:16'),
(55, 6, 'checked out', '2022-05-25 10:07:02'),
(56, 1, 'checked out', '2022-05-26 10:13:02'),
(57, 6, 'checked out', '2022-05-26 11:04:37'),
(58, 6, 'checked out', '2022-05-26 11:06:40'),
(59, 6, 'checked out', '2022-05-26 11:09:43'),
(60, 6, 'checked out', '2022-05-26 11:13:44'),
(61, 6, 'checked out', '2022-05-26 11:14:56'),
(62, 6, 'checked out', '2022-05-26 11:15:44'),
(63, 6, 'checked out', '2022-05-26 11:48:20'),
(64, 6, 'checked out', '2022-05-26 15:06:31'),
(65, 6, 'checked out', '2022-05-26 15:08:51'),
(66, 6, 'checked out', '2022-05-26 15:27:08'),
(67, 6, 'checked out', '2022-05-26 15:47:25'),
(68, 2, 'checked out', '2022-05-26 16:43:03'),
(69, 2, 'checked out', '2022-05-27 17:10:24'),
(70, 1, 'checked out', '2022-05-30 12:26:46'),
(71, 1, 'checked out', '2022-05-30 12:29:11'),
(72, 1, 'checked out', '2022-05-31 10:53:52'),
(73, 1, 'checked out', '2022-05-31 11:41:28'),
(74, 1, 'checked out', '2022-05-31 11:50:05'),
(75, 1, 'checked out', '2022-05-31 11:51:26'),
(76, 1, 'checked out', '2022-05-31 11:55:38'),
(77, 1, 'checked out', '2022-05-31 12:44:02'),
(78, 1, 'checked out', '2022-05-31 13:32:15'),
(79, 1, 'checked out', '2022-05-31 13:42:30'),
(80, 1, 'checked out', '2022-05-31 15:32:06'),
(81, 1, 'checked out', '2022-05-31 15:33:04'),
(82, 1, 'checked out', '2022-05-31 15:47:23'),
(83, 1, 'checked out', '2022-05-31 15:55:40'),
(84, 1, 'checked out', '2022-05-31 15:58:45'),
(85, 1, 'checked out', '2022-05-31 17:15:52'),
(86, 1, 'checked out', '2022-05-31 17:17:07'),
(87, 1, 'checked out', '2022-05-31 17:19:07'),
(88, 1, 'checked out', '2022-05-31 07:12:46'),
(89, 0, 'checked iout', '2022-05-31 07:14:36'),
(90, 1, 'checked out', '2022-05-31 09:00:03'),
(91, 1, 'checked out', '2022-05-31 09:36:51'),
(92, 1, 'checked in', '2022-05-31 10:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_occupancy`
--
ALTER TABLE `table_occupancy`
  ADD PRIMARY KEY (`table_occupancy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_occupancy`
--
ALTER TABLE `table_occupancy`
  MODIFY `table_occupancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
