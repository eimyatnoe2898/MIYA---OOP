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
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `individual_ID` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `f_id` int(11) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `order_name` varchar(150) NOT NULL,
  `order_size` varchar(5) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `order_notes` longtext DEFAULT NULL,
  `order_quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`individual_ID`, `c_name`, `order_id`, `f_id`, `d_id`, `s_id`, `order_name`, `order_size`, `unit_price`, `order_notes`, `order_quantity`, `total_price`, `order_status`) VALUES
(131, 'Winter', 36, NULL, 6, NULL, '', NULL, '0.00', '', 22, '0.00', 'submitted'),
(131, 'Winter', 37, NULL, 6, NULL, '', NULL, '0.00', '', 22, '0.00', 'submitted'),
(132, 'Summer', 38, NULL, 7, NULL, '', NULL, '0.00', '', 8, '0.00', 'submitted'),
(132, 'Summer', 39, NULL, 7, NULL, '', NULL, '0.00', '', 8, '0.00', 'submitted'),
(133, 'Spring', 40, NULL, 1, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(134, 'Summer', 41, NULL, 7, NULL, '', NULL, '0.00', '', 17, '0.00', 'submitted'),
(134, 'Summer', 42, NULL, 7, NULL, '', NULL, '0.00', '', 8, '0.00', 'submitted'),
(135, 'Lillie', 43, NULL, 5, NULL, '', NULL, '0.00', '', 6, '0.00', 'submitted'),
(136, 'Lizzie', 44, NULL, 2, NULL, '', NULL, '0.00', '', 26, '0.00', 'added'),
(138, 'Spring', 45, NULL, 14, NULL, '', NULL, '0.00', '', 5, '0.00', 'submitted'),
(141, 'Leaf', 46, NULL, 2, NULL, '', NULL, '0.00', '', 52, '0.00', 'submitted'),
(142, 'Summer', 47, NULL, 1, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(142, 'Summer', 48, NULL, 10, NULL, '', NULL, '0.00', '', 56, '0.00', 'submitted'),
(142, 'Summer', 49, NULL, 6, NULL, '', NULL, '0.00', '', 22, '0.00', 'submitted'),
(142, 'Summer', 50, NULL, 23, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(142, 'Summer', 51, NULL, 23, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(142, 'Summer', 52, NULL, 23, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(142, 'Summer', 53, NULL, 23, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(142, 'Summer', 54, NULL, 23, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(142, 'Summer', 55, NULL, 23, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(143, 'Grammy', 56, NULL, 1, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(143, 'Grammy', 57, NULL, 1, NULL, '', NULL, '0.00', '', 7, '0.00', 'submitted'),
(143, 'Grammy', 58, NULL, 9, NULL, '', NULL, '0.00', '', 8, '0.00', 'submitted'),
(144, 'Eli', 59, NULL, 13, NULL, '', NULL, '0.00', '', 13, '0.00', 'submitted'),
(145, 'Ricky', 60, NULL, 25, NULL, '', NULL, '0.00', '', 4, '0.00', 'submitted'),
(146, 'Riley', 61, NULL, 11, NULL, '', NULL, '0.00', '', 6, '0.00', 'submitted'),
(146, 'Riley', 62, NULL, 8, NULL, '', NULL, '0.00', '', 28, '0.00', 'submitted'),
(147, 'Maie', 63, NULL, 6, NULL, '', NULL, '0.00', '', 22, '0.00', 'submitted'),
(147, 'Maie', 64, NULL, 17, NULL, '', NULL, '0.00', '', 8, '0.00', 'submitted'),
(148, 'Loi', 65, NULL, 6, NULL, '', NULL, '0.00', '', 22, '0.00', 'submitted'),
(148, 'Loi', 66, NULL, 22, NULL, '', NULL, '0.00', '', 4, '0.00', 'added'),
(149, 'Lilac', 67, NULL, 15, NULL, '', NULL, '0.00', '', 6, '0.00', 'submitted'),
(149, 'Lilac', 68, NULL, 29, NULL, '', NULL, '0.00', '', 10, '0.00', 'submitted'),
(149, 'Lilac', 69, NULL, 12, NULL, '', NULL, '0.00', '', 22, '0.00', 'submitted'),
(149, 'Lilac', 70, NULL, 27, NULL, '', NULL, '0.00', '', 3, '0.00', 'added'),
(149, 'Lilac', 71, NULL, 20, NULL, '', NULL, '0.00', '', 28, '0.00', 'added'),
(150, 'Lily', 72, NULL, 33, NULL, '', NULL, '0.00', '', 3, '0.00', 'submitted'),
(151, 'Riley', 73, NULL, 7, NULL, '', NULL, '0.00', '', 8, '0.00', 'added'),
(152, 'Riley', 74, NULL, 14, NULL, 'NIGORI (HOT SAKE)', NULL, '0.00', '', 5, '0.00', 'added'),
(153, 'Sparrow', 75, NULL, 9, NULL, 'IMAGERY CHARDONNAY', 'G', '0.00', '', 8, '0.00', 'added'),
(155, 'Tail', 76, NULL, 11, NULL, 'KINSEN PLUM WINE', 'G', '6.25', '', 1, '6.25', 'added'),
(156, 'Me', 77, NULL, 39, NULL, 'SPECIALTY LEMONADE', '', '3.00', '', 1, '3.00', 'submitted'),
(157, 'Aung', 78, NULL, 37, NULL, 'ORGANIC MILK', '', '2.75', '', 1, '2.75', 'submitted'),
(158, 'Bio', 79, NULL, 42, NULL, 'ICE TEA', '', '3.00', '', 1, '3.00', 'submitted'),
(159, 'May', 80, NULL, 29, NULL, 'DIET COKE', '', '2.50', '', 1, '2.50', 'submitted'),
(160, 'June', 81, NULL, 23, NULL, 'SAPORO', 'C', '6.75', '', 1, '6.75', 'submitted'),
(161, 'July', 82, NULL, 28, NULL, 'FOUNTAIN SODA', '', '2.50', '', 2, '5.00', 'submitted'),
(162, 'August', 83, NULL, 9, NULL, 'IMAGERY CHARDONNAY', 'G', '8.25', '', 1, '8.25', 'submitted'),
(162, 'August', 84, NULL, 1, NULL, 'ANGELINE PINOT NOIR', 'G', '7.25', '', 1, '7.25', 'added'),
(163, 'September', 85, NULL, 8, NULL, 'BENZIGER SAUV BLANC', 'B', '28.00', '', 2, '56.00', 'submitted'),
(163, 'September', 86, NULL, 9, NULL, 'IMAGERY CHARDONNAY', 'G', '8.25', '', 1, '8.25', 'submitted'),
(164, 'December', 87, NULL, 5, NULL, 'CANYON ROAD MOSCATO', 'G', '6.25', '', 1, '6.25', 'submitted'),
(164, 'December', 88, NULL, 13, NULL, 'NIGORI (HOT SAKE)', 'B', '13.25', '', 2, '26.50', 'submitted'),
(159, 'May', 89, NULL, 15, NULL, 'HANA SAKE', 'S', '5.75', '', 1, '5.75', 'submitted'),
(165, 'September', 90, NULL, 12, NULL, 'KINSEN PLUM WINE', 'B', '22.00', '', 1, '22.00', 'submitted'),
(166, 'Mar', 91, NULL, 18, NULL, 'HANA SAKE', 'L', '8.25', '', 2, '16.50', 'submitted'),
(167, 'Lilac', 92, NULL, 1, NULL, 'ANGELINE PINOT NOIR', 'G', '7.25', '', 2, '14.50', 'submitted'),
(167, 'Lilac', 93, NULL, 18, NULL, 'HANA SAKE', 'L', '8.25', '', 2, '16.50', 'submitted'),
(168, 'Minerva', 94, NULL, 4, NULL, 'ANGELINE PINOT NOIR', 'B', '26.00', '', 1, '26.00', 'submitted'),
(169, 'One', 95, NULL, 13, NULL, 'NIGORI (HOT SAKE)', 'B', '13.25', '', 2, '26.50', 'submitted'),
(169, 'One', 96, NULL, 15, NULL, 'HANA SAKE', 'S', '5.75', '', 1, '5.75', 'submitted'),
(170, 'Two', 97, NULL, 5, NULL, 'CANYON ROAD MOSCATO', 'G', '6.25', '', 1, '6.25', 'added'),
(171, 'Three', 98, NULL, 28, NULL, 'FOUNTAIN SODA', '', '2.50', '', 3, '7.50', 'added'),
(171, 'Three', 99, NULL, 30, NULL, 'ROOT BEER', '', '2.50', '', 1, '2.50', 'added'),
(172, 'One', 100, NULL, 4, NULL, 'ANGELINE PINOT NOIR', 'B', '26.00', '', 1, '26.00', 'submitted'),
(173, 'Two', 101, NULL, 6, NULL, 'CANYON ROAD MOSCATO ', 'B', '22.00', '', 1, '22.00', 'submitted'),
(174, 'Three', 102, NULL, 16, NULL, 'HANA SAKE', 'S', '7.75', '', 1, '7.75', 'submitted'),
(175, 'Four', 103, NULL, 7, NULL, 'BENZIGER SAUV BLANC', 'G', '8.25', '', 1, '8.25', 'added'),
(176, 'Lilac', 104, NULL, 26, NULL, 'BUD LIGHT', 'B', '3.00', '', 1, '3.00', 'added'),
(176, 'Lilac', 105, NULL, 40, NULL, 'SPECIALTY LEMONADE', '', '3.00', '', 1, '3.00', 'added'),
(177, 'Daedelion', 106, NULL, 22, NULL, 'CORONA', 'B', '4.00', '', 1, '4.00', 'added'),
(178, 'Rain', 107, NULL, 33, NULL, 'LEMONADE', '', '2.50', '', 2, '5.00', 'added'),
(178, 'Rain', 108, NULL, 42, NULL, 'ICE TEA', '', '3.00', '', 1, '3.00', 'added');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
