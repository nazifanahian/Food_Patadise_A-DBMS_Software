-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 01:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_user`
--

CREATE TABLE `ad_user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_user`
--

INSERT INTO `ad_user` (`ID`, `Name`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `categories`, `status`) VALUES
(1, 'Dairy', 1),
(2, 'frozen', 1),
(3, 'beverage', 1),
(4, 'snacks', 1),
(5, 'vegetable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `total_price`, `payment_status`, `order_status`, `order_date`) VALUES
(1, 1, 'Motijhil', 'Dhaka', 1800, 'pending', 1, '2021-12-28 14:12:28'),
(2, 1, 'Motijhil', 'Dhaka', 360, 'pending', 1, '2021-12-28 14:17:14'),
(3, 2, 'Bashundhara Residential Area', 'DHAKA', 310, 'pending', 3, '2021-12-29 14:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `name`, `quantity`, `price`, `order_date`) VALUES
(1, 1, 'Samosa', 1, 300, '2021-12-28 14:12:28'),
(2, 1, 'Nido_Milk_Powder', 3, 750, '2021-12-28 14:12:28'),
(3, 1, 'Dal_Puri', 3, 750, '2021-12-28 14:12:28'),
(4, 2, 'Ice_Cream', 6, 360, '2021-12-28 14:17:15'),
(5, 3, 'Capcicum', 5, 250, '2021-12-29 14:05:51'),
(6, 3, 'Curd', 4, 60, '2021-12-29 14:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `categories_id`, `name`, `price`, `quantity`, `image`, `status`) VALUES
(30, 3, 'cocacola', '40', 100, 'cocacola.jpg', 1),
(31, 3, 'Fanta', '50', 100, 'fanta.jpg', 1),
(32, 3, 'Lemon_Tea', '200', 100, 'lemontea.jpg', 1),
(33, 3, 'Mango_Drink', '35', 100, 'mangopulpdrink.jpg', 1),
(34, 3, 'Sprite', '35', 100, 'sprite.jpg', 1),
(35, 3, 'Star_Ship_Chocolate_Milk', '15', 100, 'starshipchocolate.jpg', 1),
(36, 1, 'Curd', '15', 100, 'curd.jpg', 1),
(37, 1, 'Ice_Cream', '60', 100, 'icecream.jpg', 1),
(38, 1, 'Nido_Milk_Powder', '250', 100, 'nido.jpg', 1),
(39, 2, 'Fries', '250', 100, 'fries.jpg', 1),
(40, 2, 'Nuggets', '450', 100, 'nuggets.jpg', 1),
(41, 2, 'Dal_Puri', '250', 100, 'puri.jpeg', 1),
(42, 2, 'Samosa', '300', 100, 'samosa.jpg', 1),
(43, 4, 'Chips', '20', 100, 'bingomadangles.jpg', 1),
(44, 4, 'Pringles', '300', 100, 'pringles.jpg', 1),
(45, 4, 'Biscuit', '65', 100, 'black.jpeg', 1),
(46, 4, 'Lays', '55', 100, 'lays.jpg', 1),
(47, 4, 'Chocolate', '150', 100, 'hersheys.jpg', 1),
(48, 4, 'Dry_Cake', '120', 50, 'drycake.jpg', 1),
(49, 5, 'Capcicum', '50', 50, 'capcicum.jpg', 1),
(50, 5, 'Carrot', '24', 50, 'carrot.jpg', 1),
(51, 5, 'Cucumber', '15', 50, 'cucumber.jpg', 1),
(52, 5, 'Potato', '40', 50, 'potato.png', 1),
(53, 5, 'Tomato', '60', 50, 'tomato.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Phone_Number` varchar(11) NOT NULL,
  `Join_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_of_Birth` varchar(12) NOT NULL,
  `Address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Password`, `Gender`, `Phone_Number`, `Join_Date`, `Date_of_Birth`, `Address`) VALUES
(1, 'Mariam Ramisa', 'ramisa.2468@gmail.com', '12345', 'Female', '01719380384', '2021-12-28 12:48:00', '1999-06-13', 'Motijhil'),
(2, 'Nazifa Nahian', 'nazifanahean123@gmail.com', '123T', 'Female', '01741982522', '2021-12-28 13:49:33', '2000-07-12', 'Bashundhara R/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_user`
--
ALTER TABLE `ad_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_user`
--
ALTER TABLE `ad_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
