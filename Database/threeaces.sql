-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2016 at 09:03 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `threeaces`
--
CREATE DATABASE IF NOT EXISTS `threeaces` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `threeaces`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `country`) VALUES
(1, 'admin', 'admin', 'Saleh Ahmad', 'salehoyon@hotmail.com', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `calzone`
--

CREATE TABLE `calzone` (
  `id` bigint(22) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calzone`
--

INSERT INTO `calzone` (`id`, `name`, `price`) VALUES
(1, 'Vegeterian', '7.35'),
(2, 'Veal', '7.35'),
(3, 'Sausage', '7.35'),
(4, 'Ham & Cheese', '7.35'),
(5, 'Chicken Cutlet', '7.35'),
(6, 'Grilled Chicken', '7.35'),
(7, 'Meatball', '7.35'),
(8, 'Grecian', '7.35'),
(9, 'Eggplant', '7.35'),
(10, 'Steak', '7.35'),
(11, 'Italian', '7.35'),
(12, 'Grecian', '7.35');

-- --------------------------------------------------------

--
-- Table structure for table `grinder`
--

CREATE TABLE `grinder` (
  `grinder_id` bigint(20) NOT NULL,
  `grinder_name` text NOT NULL,
  `grinder_small_price` decimal(10,2) DEFAULT NULL,
  `grinder_large_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grinder`
--

INSERT INTO `grinder` (`grinder_id`, `grinder_name`, `grinder_small_price`, `grinder_large_price`) VALUES
(1, 'Meatless', '4.50', '4.95'),
(2, 'Hamburger', '4.50', '4.95'),
(3, 'Cheeseburger', '4.75', '5.75'),
(4, 'Meatball', '4.75', '5.75'),
(5, 'Sausage', '4.75', '5.75'),
(6, 'American', '4.75', '5.75'),
(7, 'Veal Cutlet', '4.75', '5.75'),
(8, 'Hot Pastrami', '4.95', '5.95'),
(9, 'Italian', '4.75', '5.75'),
(10, 'Genoa Salami', '4.75', '5.75'),
(11, 'Ham', '4.75', '5.75'),
(12, 'Tuna', '4.75', '5.75'),
(13, 'Roast Beef', '4.95', '5.95'),
(14, 'Bacon, Lettuce, Tomato', '4.75', '5.75'),
(15, 'Sliced Turkey', '4.75', '5.75'),
(16, 'Three Aces Special', '5.30', '6.40'),
(17, 'Cheese Steak', '5.10', '6.00'),
(18, 'Onion Steak', '5.20', '6.20'),
(19, 'Pepper Steak', '5.20', '6.20'),
(20, 'Mushroom Steak', '5.20', '6.20'),
(21, 'Special Steak', '5.40', '6.40'),
(22, 'Steak Bomb', '5.50', '6.50'),
(23, 'Pepper & Egg', '4.50', '4.95'),
(24, 'Ham & Egg', '4.75', '5.75'),
(25, 'Steak & Egg', '5.60', '6.50'),
(26, 'Bacon & Egg', '5.30', '6.40'),
(27, 'Chicken Cutlet', '4.75', '5.75'),
(28, 'Eggplant & Cheese', '4.75', '5.75'),
(29, 'Gyro On Pita', NULL, '5.50'),
(30, 'Grilled Chicken On Pita', NULL, '5.25'),
(31, 'Grilled Chicken Delight', '5.50', '6.50'),
(32, 'Grilled Chicken Sub', '5.25', '5.85'),
(33, 'Chicken Finger Sub', '4.60', '5.60');

-- --------------------------------------------------------

--
-- Table structure for table `lasagna`
--

CREATE TABLE `lasagna` (
  `lasagna_id` bigint(20) NOT NULL,
  `lasagna_name` text NOT NULL,
  `lasagna_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lasagna`
--

INSERT INTO `lasagna` (`lasagna_id`, `lasagna_name`, `lasagna_price`) VALUES
(1, 'With Sauce', '6.25'),
(2, 'With Sausage', '7.25'),
(3, 'With Meatball', '7.25'),
(4, 'With Veal', '7.25'),
(5, 'With Chicken Cutlet', '6.45'),
(6, 'With Mushrooms', '7.25'),
(7, 'Veggie Lasagna', '7.25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` bigint(20) NOT NULL,
  `o_description` text NOT NULL,
  `o_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `o_total` decimal(10,2) NOT NULL,
  `o_contact` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_description`, `o_datetime`, `o_total`, `o_contact`) VALUES
(1, 'Lasagna - With Sausage|| $ 7.25;Lasagna - With Chicken Cutlet|| $ 6.45;Wraps - Chicken Cobb|| $ 4.95;Wraps - Greek Supreme|| $ 4.95', '2016-02-18 10:04:09', '23.60', NULL),
(2, 'Calzone - Vegeterian|| $ 7.35;Salad - Antipasto|small| $ 4.50;Side Orders - Chicken Wings|large| $ 5.75', '2016-02-18 10:04:50', '17.60', NULL),
(3, 'Calzone - Veal|| $ 7.35;Spaghetti - With Meat Ball|| $ 6.45', '2016-02-19 11:32:51', '13.80', NULL),
(4, 'Speciality Pizzas - Mediterranean|large| $ 15.80', '2016-02-19 12:31:05', '15.80', NULL),
(5, 'Lasagna - With Sausage|| $ 7.25', '2016-02-19 12:31:40', '7.25', NULL),
(6, 'Salad - Greek|large| $ 5.50', '2016-02-19 12:32:34', '5.50', NULL),
(7, 'Speciality Pizzas - Mediterranean|large| $ 15.80', '2016-02-19 12:42:01', '15.80', '01626785569'),
(8, 'Pizza - Broccoli|large| $ 10.85;Wraps - Greek Supreme|| $ 4.95', '2016-02-19 17:24:02', '15.80', '01520103065'),
(9, 'Lasagna - With Sausage|| $ 7.25;Wraps - Greek Supreme|| $ 4.95', '2016-02-19 17:25:41', '12.20', '01199080237'),
(10, 'Grinder - Cheeseburger|small| $ 4.75;Spaghetti - With Sausage|| $ 6.45;Special Dinner - Chicken Finger Plate|| $ 7.25', '2016-02-19 17:47:58', '18.45', '01520103066'),
(11, 'Lasagna - With Sausage|| $ 7.25;Spaghetti - With Chicken Cutlet|| $ 6.45', '2016-02-19 17:50:40', '13.70', '123456789'),
(12, 'Lasagna - With Meatball|| $ 7.25;Wraps - Chicken Cobb|| $ 4.95;Speciality Pizzas - Meat Lovers|large| $ 15.80', '2016-02-19 20:40:42', '28.00', '01912859674'),
(13, 'Pizza - Tomato &amp; Cheese|small| $ 5.50;Pizza - Broccoli|large| $ 10.85;Speciality Pizzas - Grecian Supreme|large| $ 15.80', '2016-02-19 20:45:50', '32.15', '874692163'),
(14, 'Spaghetti - With Sausage|| $ 6.45;Side Orders - Slice Pepperoni Pizza|large| $ 1.85;Lasagna - With Veal|| $ 7.25', '2016-02-21 09:41:02', '15.55', '01712187537'),
(15, 'Pizza - Onions|large| $ 10.85;Pizza - Broccoli|large| $ 10.85', '2016-02-21 09:59:24', '21.70', '9878456'),
(16, 'Lasagna - With Mushrooms|| $ 7.25;Spaghetti - Three Aces Special|| $ 7.25;Spaghetti - With Chicken Cutlet|| $ 6.45;Wraps - Crispy Chicken|| $ 4.95', '2016-02-21 10:01:57', '25.90', '9754654');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `pizza_id` bigint(20) NOT NULL,
  `pizza_name` text NOT NULL,
  `pizza_small_price` decimal(10,2) NOT NULL,
  `pizza_large_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `pizza_name`, `pizza_small_price`, `pizza_large_price`) VALUES
(1, 'Tomato & Cheese', '5.50', '9.75'),
(2, 'Onions', '6.85', '10.85'),
(3, 'Peppers', '6.85', '10.85'),
(4, 'Broccoli', '6.85', '10.85'),
(5, 'Fresh Garlic', '6.85', '10.85'),
(6, 'Mushrooms', '6.85', '10.85'),
(7, 'Fresh Spinach', '6.85', '10.85'),
(8, 'Anchovies', '6.85', '10.85'),
(9, 'Hamburg', '6.85', '10.85'),
(10, 'Pepperoni', '6.85', '10.85'),
(11, 'Sausage', '6.85', '10.85'),
(12, 'Meatball', '6.85', '10.85'),
(13, 'Bacon', '6.85', '10.85'),
(14, 'Ham', '6.85', '10.85'),
(15, 'Olives', '6.85', '10.85'),
(16, 'Grilled Chicken', '7.95', '11.80'),
(17, 'Hawaiian', '7.95', '11.80'),
(18, '2-way Combo', '7.95', '11.80'),
(19, '3-way Combo', '8.90', '12.80'),
(20, 'Extra Cheese', '1.25', '1.85');

-- --------------------------------------------------------

--
-- Table structure for table `salad`
--

CREATE TABLE `salad` (
  `salad_id` bigint(20) NOT NULL,
  `salad_name` text NOT NULL,
  `salad_small_price` decimal(10,2) NOT NULL,
  `salad_large_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salad`
--

INSERT INTO `salad` (`salad_id`, `salad_name`, `salad_small_price`, `salad_large_price`) VALUES
(1, 'Garden', '3.50', '4.50'),
(2, 'Greek', '4.50', '5.50'),
(3, 'Antipasto', '4.50', '5.50'),
(4, 'Chef', '4.50', '5.50'),
(5, 'Tuna', '4.50', '5.50'),
(6, 'Grilled Chicken', '4.95', '5.95'),
(7, 'Cheese', '5.45', '6.45');

-- --------------------------------------------------------

--
-- Table structure for table `side_orders`
--

CREATE TABLE `side_orders` (
  `so_id` bigint(20) NOT NULL,
  `so_name` text NOT NULL,
  `so_small_price` decimal(10,2) DEFAULT NULL,
  `so_large_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `side_orders`
--

INSERT INTO `side_orders` (`so_id`, `so_name`, `so_small_price`, `so_large_price`) VALUES
(1, 'Onion Rings', '2.60', '2.95'),
(2, 'French Fries', '2.25', '2.65'),
(3, 'Spicy Fries', '2.60', '2.95'),
(4, 'Chicken Wings', NULL, '5.75'),
(5, 'Buffalo Wings', NULL, '5.75'),
(6, 'Chicken Fingers', NULL, '5.75'),
(7, 'Mozzarella Sticks(7 Pieces)', NULL, '4.50'),
(8, 'Slice Cheese Pizza', NULL, '1.65'),
(10, 'Slice Pepperoni Pizza', NULL, '1.85'),
(11, 'Homemade Spinach Pie', NULL, '3.10'),
(12, 'Buffalo Fingers', NULL, '5.75'),
(13, 'Chicken Burger', NULL, '2.75'),
(14, 'Cheeseburger', NULL, '2.75'),
(15, 'Spanakopita', NULL, '3.25');

-- --------------------------------------------------------

--
-- Table structure for table `spaghetti`
--

CREATE TABLE `spaghetti` (
  `spaghetti_id` bigint(20) NOT NULL,
  `spaghetti_name` text NOT NULL,
  `spaghetti_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spaghetti`
--

INSERT INTO `spaghetti` (`spaghetti_id`, `spaghetti_name`, `spaghetti_price`) VALUES
(1, 'With Sauce', '5.40'),
(2, 'With Sausage', '6.45'),
(3, 'With Meat Ball', '6.45'),
(4, 'With Veal', '6.45'),
(5, 'With Chicken Cutlet', '6.45'),
(6, 'With Mushrooms', '6.45'),
(7, 'Three Aces Special', '7.25'),
(8, 'Cheese', '7.25');

-- --------------------------------------------------------

--
-- Table structure for table `special_dinner`
--

CREATE TABLE `special_dinner` (
  `sp_din_id` bigint(20) NOT NULL,
  `sp_din_name` text NOT NULL,
  `sp_din_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_dinner`
--

INSERT INTO `special_dinner` (`sp_din_id`, `sp_din_name`, `sp_din_price`) VALUES
(1, 'Chicken Wing Dinner', '7.25'),
(2, 'Gyro Plate', '7.25'),
(3, 'Chicken Finger Plate', '7.25'),
(4, '3 Piece Chicken Dinner', '7.25'),
(5, 'Cheeseburger', '5.25'),
(6, 'Chicken Burger Plate', '5.25'),
(7, 'Double-cheeseburger Plate', '5.75'),
(8, 'Chicken Kabab Plate', '7.85'),
(9, 'Steak Tips Dinner', '8.25'),
(10, 'Fish & Chips Dinner', '7.35');

-- --------------------------------------------------------

--
-- Table structure for table `special_pizza`
--

CREATE TABLE `special_pizza` (
  `sp_pizza_id` bigint(20) NOT NULL,
  `sp_pizza_name` text NOT NULL,
  `sp_pizza_small_price` decimal(10,2) NOT NULL,
  `sp_pizza_large_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_pizza`
--

INSERT INTO `special_pizza` (`sp_pizza_id`, `sp_pizza_name`, `sp_pizza_small_price`, `sp_pizza_large_price`) VALUES
(1, 'Three Aces Special', '9.80', '15.80'),
(2, 'Mediterranean', '9.80', '15.80'),
(3, 'Vegetarian', '9.80', '15.80'),
(4, 'Meat Lovers', '9.80', '15.80'),
(5, 'Bbq Grilled Chicken', '9.80', '15.80'),
(6, 'Grecian Supreme', '9.80', '15.80');

-- --------------------------------------------------------

--
-- Table structure for table `wraps`
--

CREATE TABLE `wraps` (
  `wraps_id` bigint(20) NOT NULL,
  `wraps_name` text NOT NULL,
  `wraps_price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wraps`
--

INSERT INTO `wraps` (`wraps_id`, `wraps_name`, `wraps_price`) VALUES
(1, 'Turkey Club Wrap', '4.95'),
(2, 'Chicken Cobb', '4.95'),
(3, 'Greek Supreme', '4.95'),
(4, 'Crispy Chicken', '4.95'),
(5, 'Steak Wrap', '4.95');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_un_admin` (`email`);

--
-- Indexes for table `calzone`
--
ALTER TABLE `calzone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grinder`
--
ALTER TABLE `grinder`
  ADD PRIMARY KEY (`grinder_id`);

--
-- Indexes for table `lasagna`
--
ALTER TABLE `lasagna`
  ADD PRIMARY KEY (`lasagna_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indexes for table `salad`
--
ALTER TABLE `salad`
  ADD PRIMARY KEY (`salad_id`);

--
-- Indexes for table `side_orders`
--
ALTER TABLE `side_orders`
  ADD PRIMARY KEY (`so_id`);

--
-- Indexes for table `spaghetti`
--
ALTER TABLE `spaghetti`
  ADD PRIMARY KEY (`spaghetti_id`);

--
-- Indexes for table `special_dinner`
--
ALTER TABLE `special_dinner`
  ADD PRIMARY KEY (`sp_din_id`);

--
-- Indexes for table `special_pizza`
--
ALTER TABLE `special_pizza`
  ADD PRIMARY KEY (`sp_pizza_id`);

--
-- Indexes for table `wraps`
--
ALTER TABLE `wraps`
  ADD PRIMARY KEY (`wraps_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `calzone`
--
ALTER TABLE `calzone`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `grinder`
--
ALTER TABLE `grinder`
  MODIFY `grinder_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `lasagna`
--
ALTER TABLE `lasagna`
  MODIFY `lasagna_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `salad`
--
ALTER TABLE `salad`
  MODIFY `salad_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `side_orders`
--
ALTER TABLE `side_orders`
  MODIFY `so_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `spaghetti`
--
ALTER TABLE `spaghetti`
  MODIFY `spaghetti_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `special_dinner`
--
ALTER TABLE `special_dinner`
  MODIFY `sp_din_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `special_pizza`
--
ALTER TABLE `special_pizza`
  MODIFY `sp_pizza_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wraps`
--
ALTER TABLE `wraps`
  MODIFY `wraps_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
