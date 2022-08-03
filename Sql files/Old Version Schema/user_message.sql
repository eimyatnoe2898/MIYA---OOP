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
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `table_visit_id` int(11) NOT NULL,
  `individual_visit_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`table_visit_id`, `individual_visit_id`, `username`, `message`) VALUES
(0, 0, 'Sample 1', ''),
(0, 0, 'Sample 1', 'Hello I am Sample 1'),
(0, 0, 'Sample 1', 'Hello I am Sample 1'),
(31, 0, 'Sample 2', ''),
(31, 0, 'Sample 2', 'Hello I am Sample 2'),
(31, 0, 'Sample 2', 'Hello I am Sample 2'),
(0, 0, 'Sample 3', ''),
(0, 0, 'Sample 3', 'Hello I am Ei'),
(0, 0, 'Sample 3', 'Hello I am Ei'),
(0, 0, 'Sample 3', 'Hello'),
(0, 0, 'Sample 3', 'Hello'),
(32, 0, 'Sample 4', ''),
(0, 0, 'Sample 6', ''),
(33, 0, 'Sample 7', ''),
(33, 0, 'Sample 7', ''),
(33, 0, 'Sample 7', ''),
(33, 0, 'Sample 7', 'Hello I am Ei'),
(33, 0, 'Sample 7', 'Hello I am Ei'),
(0, 0, 'Sample 7', ''),
(0, 0, 'Sample 8', ''),
(0, 0, 'Sample 8', ''),
(34, 0, 'Sample 10', ''),
(34, 64, 'Sample 34', 'Hello I am Sample 34'),
(34, 64, 'Sample 34', 'Hello I am Sample 34'),
(35, 67, 'Sample 18', 'Hello I am Sample 18'),
(35, 67, 'Sample 18', 'Hello I am Sample 18'),
(35, 67, 'Sample 18', 'Hello I am Sample 18'),
(35, 67, 'Sample 18', 'Hello I am Sample 18 again'),
(36, 68, 'Sample 87', 'Hello I am Sample 87'),
(36, 69, 'Sample 100', 'Hello I am Sample 100'),
(36, 68, 'Sample 87', 'Hello I am Sample 87'),
(36, 68, 'Sample 87', 'Hello I am Sample 87'),
(36, 68, 'Sample 87', 'Hello I am Sample 87'),
(36, 68, 'Sample 87', 'Hello I am Sample 87'),
(36, 68, 'Sample 87', ''),
(39, 75, 'Sample 999', 'Hello I am Sample 999'),
(39, 75, 'Sample 999', ''),
(42, 78, 'Sample 34', 'Hello'),
(42, 78, 'Sample 34', 'Hello'),
(42, 78, 'Sample 34', 'Hello jio'),
(42, 78, 'Sample 34', 'Hello 34 MIYA'),
(42, 78, 'Sample 34', 'Hello 34 MIYA'),
(42, 78, 'Sample 34', 'Hello Hio'),
(42, 78, 'Sample 34', 'Mama MIA'),
(42, 78, 'Sample 34', 'Mama MIA'),
(42, 78, 'Sample 34', 'HYEO'),
(42, 78, 'Sample 34', 'hello'),
(42, 78, 'Sample 34', 'hello'),
(42, 78, 'Sample 34', 'hello'),
(42, 78, 'Sample 34', 'hello'),
(42, 78, 'Sample 34', 'hello'),
(42, 78, 'Sample 34', 'Mine'),
(43, 80, 'Sample 100', 'I am ZSn'),
(44, 83, 'Sample ME', 'MIYA ME'),
(44, 84, 'SAMPLE YOU', 'I am customer'),
(44, 87, 'SAMPLE LIZA', 'MOM'),
(44, 86, 'SAMPLE THEY', 'I am customer'),
(44, 87, 'SAMPLE LIZA', 'Literally'),
(45, 88, 'Susan', 'Hello I am Susan'),
(45, 89, 'Sulli', 'Hello I am Sulli'),
(45, 90, 'Sway', 'Hello I am Sway'),
(45, 91, 'Sony', 'Sony Me!'),
(46, 93, 'Jordan', 'Hello Iam Jordan'),
(47, 99, 'Ei', 'Hla'),
(47, 99, 'Ei', 'Ei'),
(47, 99, 'Ei', 'I am Ei'),
(48, 104, 'Lavender', 'I am Lavender');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
