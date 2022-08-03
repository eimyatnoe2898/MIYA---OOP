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
-- Table structure for table `drinks_menu`
--

CREATE TABLE `drinks_menu` (
  `id` int(11) NOT NULL,
  `d_category` varchar(25) NOT NULL,
  `d_subcategory` varchar(25) DEFAULT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_flavor` varchar(50) DEFAULT NULL,
  `d_refill` tinyint(1) NOT NULL DEFAULT 0,
  `d_size` varchar(25) DEFAULT NULL,
  `d_price` decimal(10,2) NOT NULL,
  `d_ordercount` int(11) NOT NULL DEFAULT 0,
  `d_preparationtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drinks_menu`
--

INSERT INTO `drinks_menu` (`id`, `d_category`, `d_subcategory`, `d_name`, `d_flavor`, `d_refill`, `d_size`, `d_price`, `d_ordercount`, `d_preparationtime`) VALUES
(1, 'Wine', 'Red', 'ANGELINE PINOT NOIR', NULL, 0, 'G', '7.25', 0, 0),
(2, 'Wine', 'Red', 'ANGELINE PINOT NOIR', NULL, 0, 'B', '26.00', 0, 0),
(3, 'Wine', 'Red', 'ANGELINE PINOT NOIR', NULL, 0, 'G', '7.25', 0, 0),
(4, 'Wine', 'Red', 'ANGELINE PINOT NOIR', NULL, 0, 'B', '26.00', 0, 0),
(5, 'Wine', 'White', 'CANYON ROAD MOSCATO', NULL, 0, 'G', '6.25', 0, 0),
(6, 'Wine', 'White', 'CANYON ROAD MOSCATO ', NULL, 0, 'B', '22.00', 0, 0),
(7, 'Wine', 'White', 'BENZIGER SAUV BLANC', NULL, 0, 'G', '8.25', 0, 0),
(8, 'Wine', 'White', 'BENZIGER SAUV BLANC', NULL, 0, 'B', '28.00', 0, 0),
(9, 'Wine', 'White', 'IMAGERY CHARDONNAY', NULL, 0, 'G', '8.25', 0, 0),
(10, 'Wine', 'White', 'IMAGERY CHARDONNAY', NULL, 0, 'B', '28.00', 0, 0),
(11, 'Wine', 'White', 'KINSEN PLUM WINE', NULL, 0, 'G', '6.25', 0, 0),
(12, 'Wine', 'White', 'KINSEN PLUM WINE', NULL, 0, 'B', '22.00', 0, 0),
(13, 'SAKE', '', 'NIGORI (HOT SAKE)', NULL, 0, 'B', '13.25', 0, 0),
(14, 'SAKE', NULL, 'NIGORI (HOT SAKE)', NULL, 0, 'S', '4.75', 0, 0),
(15, 'SAKE', NULL, 'HANA SAKE', 'APPLE', 0, 'S', '5.75', 0, 0),
(16, 'SAKE', NULL, 'HANA SAKE', 'LYCHEE', 0, 'S', '7.75', 0, 0),
(17, 'SAKE', NULL, 'HANA SAKE', 'APPLE', 0, 'L', '8.25', 0, 0),
(18, 'SAKE', NULL, 'HANA SAKE', 'LYCHEE', 0, 'L', '8.25', 0, 0),
(19, 'SAKE', NULL, 'HANA SAKE', 'APPLE', 0, 'B', '28.00', 0, 0),
(20, 'SAKE', NULL, 'HANA SAKE', 'LYCHEE', 0, 'B', '28.00', 0, 0),
(21, 'BEER', NULL, 'SAPORO', NULL, 0, 'B', '4.00', 0, 0),
(22, 'BEER', NULL, 'CORONA', NULL, 0, 'B', '4.00', 0, 0),
(23, 'BEER', NULL, 'SAPORO', NULL, 0, 'C', '6.75', 0, 0),
(24, 'BEER', NULL, 'TIGER LAGER', NULL, 0, 'B', '4.00', 0, 0),
(25, 'BEER', NULL, 'TSINGTAO', NULL, 0, 'B', '4.00', 0, 0),
(26, 'BEER', NULL, 'BUD LIGHT', NULL, 0, 'B', '3.00', 0, 0),
(27, 'BEER', NULL, 'MICHELOB GOLDEN LIGHT', NULL, 0, 'B', '3.00', 0, 0),
(28, 'SODA & OTHERS', NULL, 'FOUNTAIN SODA', 'COKE', 1, NULL, '2.50', 0, 0),
(29, 'SODA & OTHERS', 'FOUNTAIN SODA', 'DIET COKE', NULL, 1, NULL, '2.50', 0, 0),
(30, 'SODA & OTHERS', 'FOUNTAIN SODA', 'ROOT BEER', NULL, 1, NULL, '2.50', 0, 0),
(31, 'SODA & OTHERS', 'FOUNTAIN SODA', 'SPRITE', NULL, 1, NULL, '2.50', 0, 0),
(32, 'SODA & OTHERS', 'FOUNTAIN SODA', 'MELLO YELLO', NULL, 1, NULL, '2.50', 0, 0),
(33, 'SODA & OTHERS', 'FOUNTAIN SODA', 'LEMONADE', NULL, 1, NULL, '2.50', 0, 0),
(34, 'SODA & OTHERS', 'FOUNTAIN SODA', 'ICED TEA', NULL, 1, NULL, '2.50', 0, 0),
(35, 'SODA & OTHERS', NULL, 'JAPANESE SODA', NULL, 0, NULL, '2.75', 0, 0),
(36, 'SODA & OTHERS', NULL, 'HOT JAPANESE GREEN TEA', NULL, 1, NULL, '2.00', 0, 0),
(37, 'SODA & OTHERS', NULL, 'ORGANIC MILK', NULL, 0, NULL, '2.75', 0, 0),
(38, 'SODA & OTHERS', NULL, 'SPECIALTY LEMONADE', 'STRAWBERRY', 0, NULL, '3.00', 0, 0),
(39, 'SODA & OTHERS', NULL, 'SPECIALTY LEMONADE', 'MANGO', 0, NULL, '3.00', 0, 0),
(40, 'SODA & OTHERS', NULL, 'SPECIALTY LEMONADE', 'RASPBERRY', 0, NULL, '3.00', 0, 0),
(41, 'SODA & OTHERS', NULL, 'ICE TEA', 'STRAWBERRY', 0, NULL, '3.00', 0, 0),
(42, 'SODA & OTHERS', NULL, 'ICE TEA', 'MANGO', 0, NULL, '3.00', 0, 0),
(43, 'SODA & OTHERS', NULL, 'ICE TEA', 'RASPBERRY', 0, NULL, '3.00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinks_menu`
--
ALTER TABLE `drinks_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinks_menu`
--
ALTER TABLE `drinks_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
