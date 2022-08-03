-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 08:14 PM
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
-- Table structure for table `individual_visits`
--

CREATE TABLE `individual_visits` (
  `individual_visit_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_status` varchar(25) NOT NULL,
  `customer_type` varchar(50) NOT NULL,
  `table_occupancy_id` int(11) NOT NULL,
  `total_price` decimal(10,5) DEFAULT NULL,
  `checked_in_at` timestamp NULL DEFAULT NULL,
  `checked_out_at` timestamp NULL DEFAULT NULL,
  `logged_in` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individual_visits`
--

INSERT INTO `individual_visits` (`individual_visit_id`, `c_id`, `c_name`, `c_status`, `customer_type`, `table_occupancy_id`, `total_price`, `checked_in_at`, `checked_out_at`, `logged_in`) VALUES
(61, NULL, 'Sample 12', '', '', 34, NULL, NULL, NULL, 'true'),
(62, NULL, 'Sample 21', '', 'customer', 34, NULL, NULL, NULL, 'true'),
(63, NULL, 'Sample 32', '', 'customer', 34, NULL, NULL, NULL, 'true'),
(64, NULL, 'Sample 34', '', 'customer', 34, NULL, NULL, NULL, 'true'),
(65, NULL, 'Sample 8', '', 'master', 35, NULL, NULL, NULL, 'true'),
(66, NULL, 'Sample 6', '', 'customer', 35, NULL, NULL, NULL, 'true'),
(67, NULL, 'Sample 18', '', 'customer', 35, NULL, NULL, NULL, 'true'),
(68, NULL, 'Sample 87', '', 'master', 36, NULL, '2022-05-17 08:29:17', NULL, 'true'),
(69, NULL, 'Sample 100', '', 'customer', 36, NULL, '2022-05-17 08:30:32', NULL, 'true'),
(70, NULL, 'Sample 110', '', 'customer', 36, NULL, '2022-05-17 08:31:13', NULL, 'true'),
(71, NULL, 'Sample 16', '', 'customer', 37, NULL, '2022-05-17 09:22:46', NULL, '1'),
(72, NULL, 'Sample 98', '', 'master', 38, NULL, '2022-05-17 09:23:00', NULL, ''),
(73, NULL, 'Sample 76', '', 'master', 39, NULL, '2022-05-17 09:24:13', NULL, ''),
(74, NULL, 'Sample 44', '', 'customer', 39, NULL, '2022-05-17 09:24:54', NULL, ''),
(75, NULL, 'Sample 999', '', 'customer', 39, NULL, '2022-05-17 09:37:07', NULL, ''),
(76, NULL, 'Sample 111', '', 'master', 40, NULL, '2022-05-17 10:07:33', NULL, ''),
(77, NULL, 'Sample 222', '', 'customer', 40, NULL, '2022-05-17 10:08:50', NULL, ''),
(78, NULL, 'Sample 34', '', 'master', 42, NULL, NULL, NULL, ''),
(79, NULL, 'Sample 24', '', 'customer', 42, NULL, NULL, NULL, ''),
(80, NULL, 'Sample 100', '', 'master', 43, NULL, NULL, NULL, ''),
(81, NULL, 'Sample 100', '', 'customer', 43, NULL, NULL, NULL, '1'),
(82, NULL, 'Sample 100', '', 'customer', 43, NULL, NULL, NULL, '1'),
(83, NULL, 'Sample ME', '', 'master', 44, NULL, '2022-05-17 11:21:30', NULL, '1'),
(84, NULL, 'SAMPLE YOU', '', 'customer', 44, NULL, '2022-05-17 11:23:23', NULL, '1'),
(85, NULL, 'SAMPLE US', '', 'customer', 44, NULL, '2022-05-17 11:24:04', NULL, '1'),
(86, NULL, 'SAMPLE THEY', '', 'customer', 44, NULL, NULL, NULL, '1'),
(87, NULL, 'SAMPLE LIZA', '', 'customer', 44, NULL, NULL, NULL, '1'),
(88, NULL, 'Susan', '', 'master', 45, NULL, NULL, NULL, ''),
(89, NULL, 'Sulli', '', 'customer', 45, NULL, '2022-05-17 13:32:28', NULL, '1'),
(90, NULL, 'Sway', '', 'customer', 45, NULL, NULL, NULL, ''),
(91, NULL, 'Sony', '', 'customer', 45, NULL, NULL, NULL, ''),
(92, NULL, 'Mah', '', 'master', 46, NULL, '2022-05-17 14:17:12', NULL, ''),
(93, NULL, 'Jordan', '', 'customer', 46, NULL, '2022-05-17 14:17:44', NULL, '1'),
(94, NULL, 'Ei', '', 'customer', 46, NULL, '2022-05-17 14:18:56', NULL, ''),
(95, NULL, 'Aung', '', 'customer', 31, NULL, '2022-05-17 14:43:47', NULL, '1'),
(96, NULL, 'Gyon', '', 'customer', 30, NULL, '2022-05-24 16:20:17', NULL, ''),
(97, NULL, 'Lilac', '', 'customer', 30, NULL, '2022-05-24 16:21:09', NULL, ''),
(98, NULL, 'Ei', '', 'customer', 30, NULL, '2022-05-24 16:24:01', NULL, ''),
(99, NULL, 'Ei', '', 'master', 47, NULL, '2022-05-24 16:26:10', NULL, ''),
(100, NULL, 'Lil', '', 'customer', 32, NULL, '2022-05-24 16:26:22', NULL, '1'),
(101, NULL, 'Mon', '', 'customer', 47, NULL, '2022-05-24 16:26:54', NULL, ''),
(102, NULL, 'Fio', '', 'customer', 47, NULL, '2022-05-24 16:30:47', NULL, ''),
(103, NULL, 'Lilac', '', 'master', 48, NULL, '2022-05-25 17:18:13', NULL, ''),
(104, NULL, 'Lavender', '', 'customer', 48, NULL, '2022-05-25 17:19:06', NULL, ''),
(105, NULL, 'Gion', '', 'customer', 38, NULL, '2022-05-25 06:12:40', NULL, '1'),
(106, NULL, 'Lilac', '', 'master', 49, NULL, NULL, NULL, ''),
(107, NULL, 'Lily', '', 'customer', 49, NULL, '2022-05-25 06:23:29', NULL, ''),
(108, NULL, 'Lilac', '', 'master', 50, NULL, '2022-05-25 07:06:02', NULL, ''),
(109, NULL, 'Spring', '', 'customer', 48, NULL, '2022-05-25 07:33:21', NULL, ''),
(110, NULL, 'Spring', '', 'master', 51, NULL, '2022-05-25 07:33:30', NULL, ''),
(111, NULL, 'Summer', '', 'customer', 51, NULL, '2022-05-25 07:38:53', NULL, ''),
(112, NULL, 'Spring', '', 'master', 52, NULL, '2022-05-25 07:43:59', NULL, ''),
(113, NULL, 'Summer', '', 'customer', 52, NULL, '2022-05-25 07:44:18', NULL, ''),
(114, NULL, 'Spring', '', 'master', 53, NULL, '2022-05-25 07:50:17', NULL, ''),
(115, NULL, 'Summer', '', 'customer', 53, NULL, '2022-05-25 07:50:37', NULL, ''),
(116, NULL, 'Spring', '', 'master', 54, NULL, '2022-05-25 07:53:13', NULL, ''),
(117, NULL, 'Summer', '', 'customer', 54, NULL, '2022-05-25 07:53:42', NULL, ''),
(118, NULL, 'Winter', '', 'master', 55, NULL, '2022-05-25 10:03:26', NULL, ''),
(119, NULL, 'Summer', '', 'customer', 55, NULL, '2022-05-25 10:22:09', NULL, ''),
(120, NULL, 'Spring', '', 'customer', 55, NULL, '2022-05-25 10:27:56', NULL, ''),
(121, NULL, 'Fall', '', 'customer', 55, NULL, '2022-05-25 10:44:38', NULL, ''),
(122, NULL, 'Spring', 'browsing menu', 'master', 56, NULL, '2022-05-26 10:13:00', NULL, ''),
(123, NULL, 'Summer', 'browsing menu', 'customer', 56, NULL, '2022-05-26 10:13:42', NULL, ''),
(124, NULL, 'Spring', '', 'master', 57, NULL, '2022-05-26 11:04:21', NULL, ''),
(125, NULL, 'Spring', '', 'master', 58, NULL, '2022-05-26 11:06:31', NULL, ''),
(126, NULL, 'Spring', 'browsing menu', 'master', 62, NULL, '2022-05-26 11:15:40', NULL, ''),
(127, NULL, 'Summer', 'browsing menu', 'customer', 62, NULL, '2022-05-26 11:16:24', NULL, ''),
(128, NULL, 'Spring', 'browsing menu', 'master', 63, NULL, '2022-05-26 11:48:18', NULL, '1'),
(129, NULL, 'Summer', 'browsing menu', 'customer', 63, NULL, '2022-05-26 12:34:53', NULL, ''),
(130, NULL, 'Summer', 'submitted order', 'master', 65, NULL, '2022-05-26 15:08:35', NULL, ''),
(131, NULL, 'Winter', 'submitted order', 'master', 66, NULL, '2022-05-26 15:27:05', NULL, ''),
(132, NULL, 'Summer', 'submitted order', 'customer', 66, NULL, '2022-05-26 15:34:15', NULL, ''),
(133, NULL, 'Spring', 'submitted order', 'master', 67, NULL, '2022-05-26 15:47:22', NULL, ''),
(134, NULL, 'Summer', 'browsing menu', 'customer', 67, NULL, '2022-05-26 15:52:12', NULL, ''),
(135, NULL, 'Lillie', 'browsing menu', 'customer', 67, NULL, '2022-05-26 16:39:47', NULL, ''),
(136, NULL, 'Lizzie', 'browsing menu', 'master', 68, NULL, '2022-05-26 16:43:00', NULL, ''),
(137, NULL, 'Li', 'browsing menu', 'customer', 68, NULL, '2022-05-26 16:43:29', NULL, ''),
(138, NULL, 'Spring', 'browsing menu', 'master', 69, NULL, '2022-05-27 17:10:19', NULL, '1'),
(139, NULL, 'Summer', 'browsing menu', 'customer', 69, NULL, '2022-05-27 17:22:57', NULL, '1'),
(140, NULL, 'Jane', 'browsing menu', 'master', 70, NULL, '2022-05-30 12:26:43', NULL, ''),
(141, NULL, 'Leaf', 'browsing menu', 'master', 71, NULL, '2022-05-30 12:29:09', NULL, ''),
(142, NULL, 'Summer', 'browsing menu', 'master', 72, NULL, '2022-05-31 10:53:14', NULL, ''),
(143, NULL, 'Grammy', 'browsing menu', 'master', 73, NULL, '2022-05-31 11:41:25', NULL, ''),
(144, NULL, 'Eli', 'browsing menu', 'master', 74, NULL, '2022-05-31 11:49:50', NULL, ''),
(145, NULL, 'Ricky', 'browsing menu', 'master', 75, NULL, '2022-05-31 11:51:21', NULL, ''),
(146, NULL, 'Riley', 'browsing menu', 'master', 76, NULL, '2022-05-31 11:55:36', NULL, ''),
(147, NULL, 'Maie', 'browsing menu', 'master', 77, NULL, '2022-05-31 12:44:00', NULL, ''),
(148, NULL, 'Loi', 'browsing menu', 'master', 78, NULL, '2022-05-31 13:32:12', NULL, ''),
(149, NULL, 'Lilac', 'browsing menu', 'master', 79, NULL, '2022-05-31 13:42:28', NULL, ''),
(150, NULL, 'Lily', 'browsing menu', 'customer', 79, NULL, '2022-05-31 14:04:26', NULL, ''),
(151, NULL, 'Riley', 'browsing menu', 'master', 80, NULL, '2022-05-31 15:32:04', NULL, ''),
(152, NULL, 'Riley', 'browsing menu', 'master', 81, NULL, '2022-05-31 15:33:02', NULL, ''),
(153, NULL, 'Sparrow', 'browsing menu', 'master', 82, NULL, '2022-05-31 15:47:22', NULL, ''),
(154, NULL, 'Vyo', 'browsing menu', 'master', 83, NULL, '2022-05-31 15:55:38', NULL, ''),
(155, NULL, 'Tail', 'browsing menu', 'master', 84, NULL, '2022-05-31 15:58:44', NULL, ''),
(156, NULL, 'Me', 'browsing menu', 'master', 85, NULL, '2022-05-31 17:15:51', NULL, ''),
(157, NULL, 'Aung', 'submitted order', 'master', 86, NULL, '2022-05-31 17:17:04', NULL, ''),
(158, NULL, 'Bio', 'submitted order', 'master', 87, NULL, '2022-05-31 17:19:05', NULL, ''),
(159, NULL, 'May', 'submitted order', 'customer', 87, NULL, '2022-05-31 17:57:00', NULL, '1'),
(160, NULL, 'June', 'submitted order', 'customer', 87, NULL, '2022-05-31 06:02:31', NULL, ''),
(161, NULL, 'July', 'submitted order', 'customer', 87, NULL, '2022-05-31 06:03:32', NULL, ''),
(162, NULL, 'August', 'submitted order', 'customer', 87, NULL, '2022-05-31 06:10:35', NULL, ''),
(163, NULL, 'September', 'submitted order', 'customer', 87, NULL, '2022-05-31 06:21:06', NULL, ''),
(164, NULL, 'December', 'submitted order', 'master', 88, NULL, '2022-05-31 07:12:44', NULL, ''),
(165, NULL, 'September', 'submitted order', 'customer', 88, NULL, '2022-05-31 07:15:33', NULL, ''),
(166, NULL, 'Mar', 'submitted order', 'customer', 88, NULL, '2022-05-31 07:21:04', NULL, ''),
(167, NULL, 'Lilac', 'submitted order', 'customer', 88, NULL, '2022-05-31 07:34:12', NULL, ''),
(168, NULL, 'Minerva', 'submitted order', 'customer', 88, NULL, '2022-05-31 07:52:39', NULL, '1'),
(169, NULL, 'One', 'submitted order', 'master', 90, NULL, '2022-05-31 09:00:01', NULL, ''),
(170, NULL, 'Two', 'browsing menu', 'customer', 90, NULL, '2022-05-31 09:01:31', NULL, ''),
(171, NULL, 'Three', 'browsing menu', 'customer', 90, NULL, NULL, NULL, ''),
(172, NULL, 'One', 'submitted order', 'master', 91, NULL, '2022-05-31 09:36:48', NULL, ''),
(173, NULL, 'Two', 'submitted order', 'customer', 91, NULL, '2022-05-31 09:37:19', NULL, ''),
(174, NULL, 'Three', 'submitted order', 'customer', 91, NULL, '2022-05-31 09:37:40', NULL, ''),
(175, NULL, 'Four', 'browsing menu', 'customer', 91, NULL, '2022-05-31 09:41:58', NULL, ''),
(176, NULL, 'Lilac', 'browsing menu', 'master', 92, NULL, '2022-05-31 10:17:12', NULL, '1'),
(177, NULL, 'Daedelion', 'browsing menu', 'customer', 92, NULL, '2022-05-31 10:18:14', NULL, '1'),
(178, NULL, 'Rain', 'browsing menu', 'customer', 92, NULL, '2022-05-31 10:18:44', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `individual_visits`
--
ALTER TABLE `individual_visits`
  ADD PRIMARY KEY (`individual_visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `individual_visits`
--
ALTER TABLE `individual_visits`
  MODIFY `individual_visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
