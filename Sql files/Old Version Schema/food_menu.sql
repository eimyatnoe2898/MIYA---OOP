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
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `f_ID` int(11) NOT NULL,
  `f_menuID` varchar(5) NOT NULL,
  `f_category` varchar(100) NOT NULL,
  `f_subcategory` varchar(25) DEFAULT NULL,
  `lunch_dinner` varchar(2) NOT NULL DEFAULT 'LD',
  `f_name` varchar(255) NOT NULL,
  `raw_meat` tinyint(1) DEFAULT 0,
  `f_price` decimal(10,2) NOT NULL,
  `f_notes` longtext DEFAULT NULL,
  `order_amount` int(11) DEFAULT 0,
  `f_prepare_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`f_ID`, `f_menuID`, `f_category`, `f_subcategory`, `lunch_dinner`, `f_name`, `raw_meat`, `f_price`, `f_notes`, `order_amount`, `f_prepare_time`) VALUES
(1, '1', 'Starters', NULL, 'LD', 'Seaweed Salad', 0, '5.75', NULL, 0, 0),
(2, '2', 'Starters', NULL, 'LD', 'Garden Salad', 0, '3.75', NULL, 0, 0),
(3, '3', 'Starters', NULL, 'LD', 'Kani Salad', 0, '6.90', 'Japanese Crab Salad', 0, 0),
(4, '4', 'Starters', NULL, 'LD', 'Onion Soup', 0, '2.75', NULL, 0, 0),
(5, '5', 'Starters', NULL, 'LD', 'Miso Soup', 0, '2.75', NULL, 0, 0),
(6, '6', 'Starters', NULL, 'LD', 'Fried Calamari', 0, '8.20', NULL, 0, 0),
(7, '7', 'Starters', NULL, 'LD', 'Shumai', 0, '6.20', 'Steamed Shrimp Dumpling', 0, 0),
(8, '8', 'Starters', NULL, 'LD', 'Haru Maki', 0, '5.25', 'Vegetable Spring Roll', 0, 0),
(9, '9', 'Starters', NULL, 'LD', 'Edamame', 0, '4.75', 'Japanese Soybean', 0, 0),
(10, '10', 'Starters', NULL, 'LD', 'Gyoza', 0, '5.75', 'Japanese Pan-fried Dumpling', 0, 0),
(11, '11', 'Starters', NULL, 'LD', 'Vegetable Gyoza', 0, '5.75', NULL, 0, 0),
(12, '12', 'Starters', NULL, 'LD', 'Pepper Tuna Tataki', 0, '12.20', NULL, 0, 0),
(13, '13', 'Starters', NULL, 'LD', 'Yellowtail Jalapeno', 0, '12.20', NULL, 0, 0),
(14, '14a', 'Entrees', 'Fried Rice', 'LD', 'Chicken', 0, '11.20', 'Served with Miso Soup', 0, 0),
(15, '14b', 'Entrees', 'Fried Rice', 'LD', 'Beef', 0, '12.20', 'Served with Miso Soup', 0, 0),
(16, '14c', 'Entrees', 'Fried Rice', 'LD', 'Shrimp', 0, '12.20', 'Served with Miso Soup', 0, 0),
(17, '15a', 'Entrees', 'Katsu', 'LD', 'Chicken', 0, '15.70', '(Breaded and fried fillet)\r\nServed with miso soup, salad, and white rice\r\nUpgrade from white rice to fried rice for $1', 0, 0),
(18, '15b', 'Entrees', 'Katsu', 'LD', 'Pork', 0, '15.70', '(Breaded and fried fillet)\r\nServed with miso soup, salad, and white rice\r\nUpgrade from white rice to fried rice for $1', 0, 0),
(19, '16a', 'Entrees', 'Teriyaki', 'LD', 'Chicken', 0, '15.70', 'Served with miso soup, salad, and white rice\r\nUpgrade from white rice to fried rice for $1', 0, 0),
(20, '16b', 'Entrees', 'Teriyaki', 'LD', 'Shrimp', 0, '18.70', 'Served with miso soup, salad, and white rice\r\nUpgrade from white rice to fried rice for $1', 0, 0),
(21, '16c', 'Entrees', 'Teriyaki', 'LD', 'Salmon', 0, '19.70', 'Served with miso soup, salad, and white rice\r\nUpgrade from white rice to fried rice for $1', 0, 0),
(22, '17', 'Hibachi', NULL, 'D', 'Vegetable', 0, '14.70', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(23, '18', 'Hibachi', NULL, 'D', 'Chicken', 0, '16.70', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(24, '19', 'Hibachi', NULL, 'D', 'Scallop', 0, '26.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(25, '20', 'Hibachi', NULL, 'D', 'Salmon', 0, '20.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(26, '21', 'Hibachi', NULL, 'D', 'Shrimp', 0, '19.70', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(27, '22', 'Hibachi', NULL, 'D', 'New York Steak', 0, '20.70', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(28, '17', 'Hibachi', NULL, 'L', 'Vegetable', 0, '9.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(29, '18', 'Hibachi', NULL, 'L', 'Chicken', 0, '10.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(30, '19', 'Hibachi', NULL, 'L', 'Scallop', 0, '14.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(31, '20', 'Hibachi', NULL, 'L', 'Salmon', 0, '11.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(32, '21', 'Hibachi', NULL, 'L', 'Shrimp', 0, '11.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(33, '22', 'Hibachi', NULL, 'L', 'New York Steak', 0, '12.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(34, '23', 'Hibachi', 'Combos', 'LD', 'Chicken & Shrimp', 0, '20.70', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(35, '24', 'Hibachi', 'Combos', 'LD', 'Shrimp & Scallop', 0, '26.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(36, '25', 'Hibachi', 'Combos', 'LD', 'New York Steak & Chicken', 0, '22.70', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(37, '26', 'Hibachi', 'Combos', 'LD', 'New York Steak & Shrimp', 0, '23.70', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(38, '27', 'Hibachi', 'Combos', 'LD', 'New York Steak & Scallop', 0, '26.20', 'Served with onion soup, salad, white rice, vegetables, ginger sauce, and yummy sauce\r\nUpgrade white rice to fried rice for $1', 0, 0),
(39, '28', 'Sushi & Sashi A La Carte', NULL, 'LD', 'Tuna(Maguro)', 1, '5.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(41, '29', 'Sushi & Sashimi A La Cart', NULL, 'LD', 'White Tuna', 1, '5.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(42, '30', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'Smoked Salmon', 0, '6.00', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(43, '31', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'EEL(UNAGI)', 0, '5.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(44, '32', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'SHRIMP(EBI)', 0, '5.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(45, '33', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'MACKAREL(SABA)', 0, '4.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(46, '34', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'FLYING FISH EGG', 1, '5.25', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(47, '35', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'SALMON(SAKE)', 1, '5.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(48, '36', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'YELLOWTAIL(HAMACHI)', 1, '5.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(49, '37', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'SALMON ROE(IKURA)', 1, '5.75', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(50, '38', 'Sushi & Sashimi A La Carte', NULL, 'LD', 'RED SNAPPER(TAI)', 1, '5.25', 'Sushi 2 pieces or sashimi 3 pieces per order', 0, 0),
(51, '39', 'Sushi Rolls', NULL, 'LD', 'AVOCADO MAKI', 0, '4.75', NULL, 0, 0),
(52, '40', 'Sushi Rolls', NULL, 'LD', 'KAPA MAKI(CUCUMBER)', 0, '4.75', NULL, 0, 0),
(53, '41', 'Sushi Rolls', NULL, 'LD', 'TUNA MAKI', 1, '5.25', NULL, 0, 0),
(54, '42', 'Sushi Rolls', NULL, 'LD', 'SALMON MAKI', 1, '5.25', NULL, 0, 0),
(55, '43', 'Sushi Rolls', NULL, 'LD', 'YELLOWTAIL MAKI', 1, '5.25', NULL, 0, 0),
(56, '44', 'Sushi Rolls', NULL, 'LD', 'CALIFORNIA ROLL', 0, '5.25', 'Imitation crab, cucumber, and avocado', 0, 0),
(57, '45', 'Sushi Rolls', NULL, 'LD', 'PHILADELPHIA ROLL', 0, '6.25', 'Smoked salmon, cucumber, and cream cheese', 0, 0),
(58, '46a', 'Sushi Rolls', NULL, 'LD', 'EEL AVOCADO ROLL', 0, '6.70', 'Served with eel sauce', 0, 0),
(59, '46b', 'Sushi Rolls', NULL, 'LD', 'Eel Cucumber Roll', 0, '6.70', 'Served with eel sauce', 0, 0),
(60, '47', 'Sushi Rolls', NULL, 'LD', 'SWEET POTATO TEMPURA ROLL', 0, '5.25', NULL, 0, 0),
(61, '48', 'Sushi Rolls', NULL, 'LD', 'ALASKA ROLL', 1, '6.25', 'Salmon, cucumber, avocado', 0, 0),
(62, '49', 'Sushi Rolls', NULL, 'LD', 'SPICY TUNA ROLL', 1, '6.25', NULL, 0, 0),
(63, '50', 'Sushi Rolls', NULL, 'LD', 'SPICY SALMON ROLL', 1, '6.25', NULL, 0, 0),
(64, '51', 'Sushi Rolls', NULL, 'LD', 'SPICY SNOW CRAB ROLL', 0, '6.25', NULL, 0, 0),
(65, '52', 'Sushi Rolls', NULL, 'LD', 'BOSTON ROLL', 0, '5.25', 'Shrimp, cucumber, lettuce, and mayo', 0, 0),
(66, '53', 'Sushi Rolls', NULL, 'LD', 'SHRIMP TEMPURA ROLL', 0, '8.70', 'Shrimp tempura, cucumber, avocado,\r\nand eel sauce', 0, 0),
(67, '54', 'Sushi Rolls', NULL, 'LD', 'SPIDER ROLL', 0, '10.25', 'Tempura soft shell imitation crab, cucumber, avocado, and eel sauce', 0, 0),
(68, '55', 'Kids\' Menu', NULL, 'LD', 'CHICKEN JUNIOR', 0, '10.20', 'For kids 12 and under\r\nServed with onion soup and white rice\r\nUpgrade white rice to fried rice for $1', 0, 0),
(69, '56', 'Kids\' Menus', NULL, 'LD', 'SHRIMP JUNIOR', 0, '11.20', 'For kids 12 and under\r\nServed with onion soup and white rice\r\nUpgrade white rice to fried rice for $1', 0, 0),
(70, '57', 'Kids\' Menu', NULL, 'LD', 'STEAK JUNIOR', 0, '12.20', 'For kids 12 and under\r\nServed with onion soup and white rice\r\nUpgrade white rice to fried rice for $1', 0, 0),
(71, '58', 'Specialty Rolls', NULL, 'LD', 'VOLCANO ROLL', 1, '15.70', 'Fried spicy tuna and cream cheese topped with spicy imitation snow crab, eel sauce, and spicy mayo', 0, 0),
(72, '59', 'Specialty Rolls', NULL, 'LD', 'MI YA ROLL', 1, '14.70', 'Fried jalapeño stuffed with spicy tuna, cream cheese, eel, avocado, eel sauce,\r\nand spicy mayo', 0, 0),
(73, '60', 'Specialty Rolls', NULL, 'LD', 'DRAGON ROLL', 0, '11.70', 'Eel, cucumber, and avocado topped with\r\neel sauce masago', 0, 0),
(74, '61', 'Specialty Rolls', NULL, 'LD', 'RAINBOW ROLL', 1, '12.70', 'Imitation crab, cucumber, and avocado topped with tuna, salmon, white fish, and masago', 0, 0),
(75, '62', 'Specialty Rolls', NULL, 'LD', 'SALMON FAMILY ROLL', 0, '14.70', 'Spicy salmon, cucumber inside, topped with fresh salmon, ikura, avocado, eel sauce, and spicy mayo', 0, 0),
(76, '63', 'Specialty Rolls', NULL, 'LD', 'FANCY SALMON ROLL', 0, '13.70', 'Smoked salmon, imitation crab, and cream cheese deep fried with eel sauce, spicy\r\nmayo and honey wasabi', 0, 0),
(77, '64', 'Specialty Roll', NULL, 'LD', 'MJ ROLL', 0, '14.70', 'Shrimp tempura and cucumber topped with spicy imitation snow crab and eel sauce', 0, 0),
(78, '65', 'Specialty Rolls', NULL, 'LD', 'CRAZY TUNA ROLL', 1, '14.70', 'Spicy tuna, cucumber inside, topped with seared tuna, avocado, masago, eel sauce, and honey wasabi sauce', 0, 0),
(79, '66', 'Specialty Rolls', NULL, 'LD', 'KING LOBSTER ROLL', 0, '17.70', 'Tempura lobster tail, spicy imitation snow crab and avocado wrapped with soy bean\r\npaper, with eel sauce and spicy mayo', 0, 0),
(80, '67', 'Specialty Rolls', NULL, 'LD', 'CRUNCH ROLL', 0, '13.70', 'Shrimp tempura and cucumber topped with masago, crunch, spicy mayo, and eel sauce', 0, 0),
(81, '68', 'Specialty Rolls', NULL, 'LD', 'NARUTO SPECIAL ROLL', 1, '14.70', 'Tuna, salmon, white fish, avocado, and tobiko wrapped with cucumber in ponzu sauce', 0, 0),
(82, '69', 'Specialty Rolls', NULL, 'LD', 'MEXICAN ROLL', 1, '13.70', 'Tuna, salmon, and white fish topped with yellowtail, avocado, sliced jalapeño,\r\nmasago, and ponzu sauce', 0, 0),
(83, '70', 'DESSERTS', NULL, 'LD', 'MOCHI ICE CREAM', 0, '4.20', NULL, 0, 0),
(84, '71', 'DESSERTS', NULL, 'LD', 'FRIED CHEESECAKE', 0, '4.50', NULL, 0, 0),
(85, '72', 'DESSERTS', NULL, 'LD', 'FRIED BANANA', 0, '4.20', NULL, 0, 0),
(86, '73', 'Sushi Rolls', 'Two Rolls', 'L', 'AVOCADO ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(87, '73', 'Sushi Rolls', 'Three Rolls', 'L', 'AVOCADO ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(88, '74', 'Sushi Rolls', 'Two Rolls', 'L', 'CALIFORNIA ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(89, '74', 'Sushi Rolls', 'Three Rolls', 'L', 'CALIFORNIA ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(90, '75', 'Sushi Rolls', 'Two Rolls', 'L', 'Tuna Roll', 1, '9.20', 'Served with miso soup', 0, 0),
(91, '75', 'Sushi Rolls', 'Three Rolls', 'L', 'TUNA ROLL', 1, '12.20', 'Served with miso soup', 0, 0),
(92, '76', 'Sushi Rolls', 'Two Rolls', 'L', 'SALMON ROLL', 1, '9.20', 'Served with miso soup', 0, 0),
(93, '76', 'Sushi Rolls', 'Three Rolls', 'L', 'SALMON ROLL', 1, '12.20', 'Served with miso soup', 0, 0),
(94, '77', 'Sushi Rolls', 'Two Rolls', 'L', 'YELLOWTAIL ROLL', 1, '9.20', 'Served with miso soup', 0, 0),
(95, '77', 'Sushi Rolls', 'Three Rolls', 'L', 'YELLOWTAIL ROLL', 1, '12.20', 'Served with miso soup', 0, 0),
(96, '78', 'Sushi Rolls', 'Two Rolls', 'L', 'TUNA AVOCADO ROLL', 1, '9.20', 'Served with miso soup', 0, 0),
(97, '78', 'Sushi Rolls', 'Three Rolls', 'L', 'TUNA AVOCADO ROLL', 1, '12.20', 'Served with miso soup', 0, 0),
(98, '79', 'Sushi Rolls', 'Two Rolls', 'L', 'SALMON AVOCADO ROLL', 1, '9.20', 'Served with miso soup', 0, 0),
(99, '79', 'Sushi Rolls', 'Three Rolls', 'L', 'SALMON AVOCADO ROLL', 1, '12.20', 'Served with miso soup', 0, 0),
(100, '80', 'Sushi Rolls', 'Two Rolls', 'L', 'CUCUMBER ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(101, '80', 'Sushi Rolls', 'Three Rolls', 'L', 'CUCUMBER ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(102, '81', 'Sushi Rolls', 'Two Rolls', 'L', 'SWEET POTATO ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(103, '81', 'Sushi Rolls', 'Three Rolls', 'L', 'SWEET POTATO ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(104, '82', 'Sushi Rolls', 'Two Rolls', 'L', 'PHILADELPHIA ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(105, '82', 'Sushi Rolls', 'Three Rolls', 'L', 'PHILADELPHIA ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(106, '83', 'Sushi Rolls', 'Two Rolls', 'L', 'SPICY TUNA ROLL', 1, '9.20', 'Served with miso soup', 0, 0),
(107, '83', 'Sushi Rolls', 'Two Rolls', 'L', 'SPICY TUNA ROLL', 1, '12.20', 'Served with miso soup', 0, 0),
(108, '84', 'Sushi Rolls', 'Two Rolls', 'L', 'SPICY SALMON ROLL', 1, '9.20', 'Served with miso soup', 0, 0),
(109, '84', 'Sushi Rolls', 'Three Rolls', 'L', 'SPICY SALMON ROLL', 1, '12.20', 'Served with miso soup', 0, 0),
(110, '85', 'Sushi Rolls', 'Two Rolls', 'L', 'SPICY SNOW CRAB ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(111, '85', 'Sushi Rolls', 'Three Rolls', 'L', 'SPICY SNOW CRAB ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(112, '86', 'Sushi Rolls', 'Two Rolls', 'L', 'SHRIMP TEMPURA ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(113, '86', 'Sushi Rolls', 'Three Rolls', 'L', 'SHRIMP TEMPURA ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(114, '87', 'Sushi Rolls', 'Two Rolls', 'L', 'EEL CUCUMBER ROLL', 0, '9.20', 'Served with miso soup', 0, 0),
(115, '87', 'Sushi Rolls', 'Three Rolls', 'L', 'EEL CUCUMBER ROLL', 0, '12.20', 'Served with miso soup', 0, 0),
(116, '88', 'Bento Boxes', '', 'L', 'CHICKEN TERIYAKI BOX', 0, '11.20', 'Served with miso soup, white rice, and California roll\r\nUpgrade white rice to fried rice for $1.50', 0, 0),
(117, '89', 'Bento Boxes', NULL, 'L', 'SALMON TERIYAKI BOX', 0, '12.20', 'Served with miso soup, white rice, and California roll\r\nUpgrade white rice to fried rice for $1.50', 0, 0),
(118, '90', 'Bento Boxes', NULL, 'L', 'ANGUS BEEF TERIYAKI BOX', 0, '13.20', 'Served with miso soup, white rice, and California roll\r\nUpgrade white rice to fried rice for $1.50', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD UNIQUE KEY `f_ID` (`f_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `f_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
