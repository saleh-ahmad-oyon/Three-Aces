-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 08:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `threeaces`
--
CREATE DATABASE IF NOT EXISTS `threeaces` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `threeaces`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL COMMENT 'admin id',
  `username` text NOT NULL COMMENT 'admin username',
  `password` text NOT NULL COMMENT 'admin password',
  `name` text NOT NULL COMMENT 'Admin Name',
  `email` varchar(100) NOT NULL COMMENT 'Admin Email',
  `country` text NOT NULL COMMENT 'Admin Country'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `country`) VALUES
(1, 'admin', 'qQ1!', 'Saleh Ahmad Oyon', 'saleh@orbitinformatics.com', 'Bangladesh'),
(2, 'admin2', '1234', 'Shakib Hasan', 'nissongo_10@live.com', 'bd');

-- --------------------------------------------------------

--
-- Table structure for table `calzone`
--

CREATE TABLE IF NOT EXISTS `calzone` (
`id` bigint(22) NOT NULL COMMENT 'Calzone ID',
  `name` text NOT NULL COMMENT 'Calzone Name',
  `price` decimal(10,2) NOT NULL COMMENT 'Calzone Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `calzone`
--

INSERT INTO `calzone` (`id`, `name`, `price`) VALUES
(1, 'Vegeterian', '7.35'),
(71, 'Veal', '7.35'),
(2, 'Sausage', '7.35'),
(3, 'Ham and Cheese', '7.35'),
(4, 'Chicken Cutlet', '7.35'),
(5, 'Grilled Chicken', '7.35'),
(6, 'Meatball', '7.35'),
(7, 'Grecian', '7.35'),
(8, 'Eggplant', '7.35'),
(9, 'Steak', '7.35'),
(10, 'Italian', '7.35'),
(11, 'Grecian', '7.35');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`c_id` bigint(20) NOT NULL COMMENT 'Country ID',
  `c_name` text NOT NULL COMMENT 'Country Name'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`c_id`, `c_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Congo, The Democratic Republic of The'),
(51, 'Cook Islands'),
(52, 'Costa Rica'),
(53, 'Cote D''ivoire'),
(54, 'Croatia'),
(55, 'Cuba'),
(56, 'Cyprus'),
(57, 'Czech Republic'),
(58, 'Denmark'),
(59, 'Djibouti'),
(60, 'Dominica'),
(61, 'Dominican Republic'),
(62, 'Ecuador'),
(63, 'Egypt'),
(64, 'El Salvador'),
(65, 'Equatorial Guinea'),
(66, 'Eritrea'),
(67, 'Estonia'),
(68, 'Ethiopia'),
(69, 'Falkland Islands (Malvinas)'),
(70, 'Faroe Islands'),
(71, 'Fiji'),
(72, 'Finland'),
(73, 'France'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Greece'),
(84, 'Greenland'),
(85, 'Grenada'),
(86, 'Guadeloupe'),
(87, 'Guam'),
(88, 'Guatemala'),
(89, 'Guinea'),
(90, 'Guinea-bissau'),
(91, 'Guyana'),
(92, 'Haiti'),
(93, 'Heard Island and Mcdonald Islands'),
(94, 'Holy See (Vatican City State)'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Indonesia'),
(101, 'Iran, Islamic Republic of'),
(102, 'Iraq'),
(103, 'Ireland'),
(104, 'Israel'),
(105, 'Italy'),
(106, 'Jamaica'),
(107, 'Japan'),
(108, 'Jordan'),
(109, 'Kazakhstan'),
(110, 'Kenya'),
(111, 'Kiribati'),
(112, 'Korea, Democratic People''s Republic of'),
(113, 'Korea, Republic of'),
(114, 'Kuwait'),
(115, 'Kyrgyzstan'),
(116, 'Lao People''s Democratic Republic'),
(117, 'Latvia'),
(118, 'Lebanon'),
(119, 'Lesotho'),
(120, 'Liberia'),
(121, 'Libyan Arab Jamahiriya'),
(122, 'Liechtenstein'),
(123, 'Lithuania'),
(124, 'Luxembourg'),
(125, 'Macao'),
(126, 'Macedonia, The Former Yugoslav Republic of'),
(127, 'Madagascar'),
(128, 'Malawi'),
(129, 'Malaysia'),
(130, 'Maldives'),
(131, 'Mali'),
(132, 'Malta'),
(133, 'Marshall Islands'),
(134, 'Martinique'),
(135, 'Mauritania'),
(136, 'Mauritius'),
(137, 'Mayotte'),
(138, 'Mexico'),
(139, 'Micronesia, Federated States of'),
(140, 'Moldova, Republic of'),
(141, 'Monaco'),
(142, 'Mongolia'),
(143, 'Montenegro'),
(144, 'Montserrat'),
(145, 'Morocco'),
(146, 'Mozambique'),
(147, 'Myanmar'),
(148, 'Namibia'),
(149, 'Nauru'),
(150, 'Nepal'),
(151, 'Netherlands'),
(152, 'Netherlands Antilles'),
(153, 'New Caledonia'),
(154, 'New Zealand'),
(155, 'Nicaragua'),
(156, 'Niger'),
(157, 'Nigeria'),
(158, 'Niue'),
(159, 'Norfolk Island'),
(160, 'Northern Mariana Islands'),
(161, 'Norway'),
(162, 'Oman'),
(163, 'Pakistan'),
(164, 'Palau'),
(165, 'Palestinian Territory, Occupied'),
(166, 'Panama'),
(167, 'Papua New Guinea'),
(168, 'Paraguay'),
(169, 'Peru'),
(170, 'Philippines'),
(171, 'Pitcairn'),
(172, 'Poland'),
(173, 'Portugal'),
(174, 'Puerto Rico'),
(175, 'Qatar'),
(176, 'Reunion'),
(177, 'Romania'),
(178, 'Russian Federation'),
(179, 'Rwanda'),
(180, 'Saint Helena'),
(181, 'Saint Kitts and Nevis'),
(182, 'Saint Lucia'),
(183, 'Saint Pierre and Miquelon'),
(184, 'Saint Vincent and The Grenadines'),
(185, 'Samoa'),
(186, 'San Marino'),
(187, 'Sao Tome and Principe'),
(188, 'Saudi Arabia'),
(189, 'Senegal'),
(190, 'Serbia'),
(191, 'Seychelles'),
(192, 'Sierra Leone'),
(193, 'Singapore'),
(194, 'Slovakia'),
(195, 'Slovenia'),
(196, 'Solomon Islands'),
(197, 'Somalia'),
(198, 'South Africa'),
(199, 'South Georgia and The South Sandwich Islands'),
(200, 'South Sudan'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syrian Arab Republic'),
(210, 'Taiwan, Republic of China'),
(211, 'Tajikistan'),
(212, 'Tanzania, United Republic of'),
(213, 'Thailand'),
(214, 'Timor-leste'),
(215, 'Togo'),
(216, 'Tokelau'),
(217, 'Tonga'),
(218, 'Trinidad and Tobago'),
(219, 'Tunisia'),
(220, 'Turkey'),
(221, 'Turkmenistan'),
(222, 'Turks and Caicos Islands'),
(223, 'Tuvalu'),
(224, 'Uganda'),
(225, 'Ukraine'),
(226, 'United Arab Emirates'),
(227, 'United Kingdom'),
(228, 'United States'),
(229, 'United States Minor Outlying Islands'),
(230, 'Uruguay'),
(231, 'Uzbekistan'),
(232, 'Vanuatu'),
(233, 'Venezuela'),
(234, 'Viet Nam'),
(235, 'Virgin Islands, British'),
(236, 'Virgin Islands, U.S.'),
(237, 'Wallis and Futuna'),
(238, 'Western Sahara'),
(239, 'Yemen'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `grinder`
--

CREATE TABLE IF NOT EXISTS `grinder` (
`grinder_id` bigint(20) NOT NULL COMMENT 'Grinder ID',
  `grinder_name` text NOT NULL COMMENT 'Grinder Name',
  `grinder_small_price` decimal(10,2) DEFAULT NULL COMMENT 'Small Grinder Price',
  `grinder_large_price` decimal(10,2) NOT NULL COMMENT 'large Grinder Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

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
(23, 'Pepper and Egg', '4.50', '4.95'),
(24, 'Ham and Egg', '4.75', '5.75'),
(25, 'Steak and Egg', '5.60', '6.50'),
(26, 'Bacon and Egg', '5.30', '6.40'),
(27, 'Chicken Cutlet', '4.75', '5.75'),
(28, 'Eggplant and Cheese', '4.75', '5.75'),
(29, 'Gyro On Pita', NULL, '5.50'),
(30, 'Grilled Chicken On Pita', NULL, '5.25'),
(31, 'Grilled Chicken Delight', '5.50', '6.50'),
(32, 'Grilled Chicken Sub', '5.25', '5.85'),
(33, 'Chicken Finger Sub', '4.60', '5.60');

-- --------------------------------------------------------

--
-- Table structure for table `lasagna`
--

CREATE TABLE IF NOT EXISTS `lasagna` (
`lasagna_id` bigint(20) NOT NULL COMMENT 'Lasagna ID',
  `lasagna_name` text NOT NULL COMMENT 'Lasagna Name',
  `lasagna_price` decimal(10,2) NOT NULL COMMENT 'Lasagna Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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

CREATE TABLE IF NOT EXISTS `orders` (
`o_id` bigint(20) NOT NULL COMMENT 'Order ID',
  `o_description` text NOT NULL COMMENT 'Order Description',
  `o_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Order Date-Time',
  `o_total` decimal(10,2) NOT NULL COMMENT 'Order Total Cost',
  `o_contact` varchar(30) DEFAULT NULL COMMENT 'Customer''s Contact No.'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_description`, `o_datetime`, `o_total`, `o_contact`) VALUES
(22, 'Calzone - Ham and Cheese|| $ 7.35;Grinder - Italian|large| $ 5.75;Grinder - Ham|small| $ 4.75;Pizza - Peppers|large| $ 10.85', '2016-06-12 05:59:08', '28.70', '+880-1626785569'),
(23, 'Grinder - Hamburger|small| $ 4.50;Spaghetti - With Veal|| $ 6.45', '2016-06-12 06:11:51', '10.95', '+880-1712187537'),
(24, 'Special Dinner - 3 Piece Chicken Dinner|| $ 7.25;Special Dinner - Fish and Chips Dinner|| $ 7.35', '2016-06-12 06:13:11', '14.60', '+880-1520103065');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
`pizza_id` bigint(20) NOT NULL COMMENT 'Pizza ID',
  `pizza_name` text NOT NULL COMMENT 'Pizza Name',
  `pizza_small_price` decimal(10,2) NOT NULL COMMENT 'Small Pizza Price',
  `pizza_large_price` decimal(10,2) NOT NULL COMMENT 'Large Pizza Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `pizza_name`, `pizza_small_price`, `pizza_large_price`) VALUES
(1, 'Tomato and Cheese', '5.50', '9.75'),
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

CREATE TABLE IF NOT EXISTS `salad` (
`salad_id` bigint(20) NOT NULL COMMENT 'Salad ID',
  `salad_name` text NOT NULL COMMENT 'Salad Name',
  `salad_small_price` decimal(10,2) NOT NULL COMMENT 'Small Salad Price',
  `salad_large_price` decimal(10,2) NOT NULL COMMENT 'Large Salad Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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

CREATE TABLE IF NOT EXISTS `side_orders` (
`so_id` bigint(20) NOT NULL COMMENT 'Side Order ID',
  `so_name` text NOT NULL COMMENT 'Side Order Name',
  `so_small_price` decimal(10,2) DEFAULT NULL COMMENT 'Small Side Order Price',
  `so_large_price` decimal(10,2) NOT NULL COMMENT 'Large Side Order Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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

CREATE TABLE IF NOT EXISTS `spaghetti` (
`spaghetti_id` bigint(20) NOT NULL COMMENT 'Spaghetti ID',
  `spaghetti_name` text NOT NULL COMMENT 'Spaghetti Name',
  `spaghetti_price` decimal(10,2) NOT NULL COMMENT 'Spaghetti Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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

CREATE TABLE IF NOT EXISTS `special_dinner` (
`sp_din_id` bigint(20) NOT NULL COMMENT 'Special Dinner ID',
  `sp_din_name` text NOT NULL COMMENT 'Special Dinner Name',
  `sp_din_price` decimal(10,2) NOT NULL COMMENT 'Special Dinner Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(10, 'Fish and Chips Dinner', '7.35');

-- --------------------------------------------------------

--
-- Table structure for table `special_pizza`
--

CREATE TABLE IF NOT EXISTS `special_pizza` (
`sp_pizza_id` bigint(20) NOT NULL COMMENT 'Special Pizza ID',
  `sp_pizza_name` text NOT NULL COMMENT 'Special Pizza Name',
  `sp_pizza_small_price` decimal(10,2) NOT NULL COMMENT 'Small Special Pizza Price',
  `sp_pizza_large_price` decimal(10,2) NOT NULL COMMENT 'large Special Pizza Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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

CREATE TABLE IF NOT EXISTS `wraps` (
`wraps_id` bigint(20) NOT NULL COMMENT 'Wraps ID',
  `wraps_name` text NOT NULL COMMENT 'Wraps Name',
  `wraps_price` decimal(10,2) NOT NULL COMMENT 'Wraps Price'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_un_admin` (`email`);

--
-- Indexes for table `calzone`
--
ALTER TABLE `calzone`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`c_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'admin id',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `calzone`
--
ALTER TABLE `calzone`
MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT COMMENT 'Calzone ID',AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `c_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Country ID',AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `grinder`
--
ALTER TABLE `grinder`
MODIFY `grinder_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Grinder ID',AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `lasagna`
--
ALTER TABLE `lasagna`
MODIFY `lasagna_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Lasagna ID',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `o_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Order ID',AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
MODIFY `pizza_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Pizza ID',AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `salad`
--
ALTER TABLE `salad`
MODIFY `salad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Salad ID',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `side_orders`
--
ALTER TABLE `side_orders`
MODIFY `so_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Side Order ID',AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `spaghetti`
--
ALTER TABLE `spaghetti`
MODIFY `spaghetti_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Spaghetti ID',AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `special_dinner`
--
ALTER TABLE `special_dinner`
MODIFY `sp_din_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Special Dinner ID',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `special_pizza`
--
ALTER TABLE `special_pizza`
MODIFY `sp_pizza_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Special Pizza ID',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wraps`
--
ALTER TABLE `wraps`
MODIFY `wraps_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Wraps ID',AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
