-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 10:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment02`
--
CREATE DATABASE IF NOT EXISTS `assignment02` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `assignment02`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `username`, `password`) VALUES
(1, 'johnsmith@gmail.com', 'joHn446', 'Abc123456'),
(10, 'marymary@gmail.com', 'mary123', 'Aaaaaa'),
(12, 'peter123@gmail.com', 'peter123', 'Abc123456'),
(13, 'samson111@gmail.com', 'samson111', 'Aaaaaa'),
(14, 'mark999@gmail.com', 'mark999', 'Aaaaaa'),
(20, 'sim789@gmail.com', 'sim789', 'Aaaaaa'),
(22, 'happy123@gmail.com', 'happy123', 'Aaaaaa'),
(23, 'susan123@gmail.com', 'susan123', 'Aaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `surrogate_key` int(12) NOT NULL,
  `customer_id` int(12) NOT NULL,
  `order_id` int(20) NOT NULL,
  `item_id` int(12) NOT NULL,
  `item_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`surrogate_key`, `customer_id`, `order_id`, `item_id`, `item_quantity`) VALUES
(10, 1, 1669934740, 2, 1),
(11, 1, 1669934740, 1, 1),
(50, 14, 1670181636, 5, 1),
(51, 14, 1670181636, 1, 1),
(59, 23, 1670187533, 12, 1),
(60, 23, 1670187533, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(12) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_img_link` varchar(255) NOT NULL,
  `prod_price` decimal(20,2) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prod_name`, `prod_img_link`, `prod_price`, `type`) VALUES
(1, 'Coffee', './images/coffee.jpg', '30.50', 'Beverage'),
(2, 'Vegetable', './images/vegetable.jpg', '3.50', 'Food'),
(3, 'Toilet Paper', './images/toilet_paper.jpg', '10.50', 'Grocery'),
(4, 'Plastic Bag', './images/plastic_bag.jpg', '0.20', 'Grocery'),
(5, 'Apple', './images/apple.jpg', '3.00', 'Food'),
(6, 'Banana', './images/banana.jpg', '3.00', 'Food'),
(7, 'Beer', './images/beer.jpg', '4.00', 'Beverage'),
(8, 'Burger', './images/burger.jpg', '9.00', 'Food'),
(9, 'Grapefruit', './images/grapefruit.jpg', '5.00', 'Food'),
(10, 'Knife', './images/knife.jpg', '30.00', 'Grocery'),
(11, 'Orange', './images/orange.jpg', '3.00', 'Food'),
(12, 'Pineapple', './images/pineapple.jpg', '4.00', 'Food'),
(13, 'Pizza', './images/pizza.jpg', '5.00', 'Food'),
(14, 'Salmon', './images/salmon.jpg', '5.50', 'Food'),
(15, 'Shoes', './images/shoes.jpg', '30.99', 'Grocery'),
(17, 'T-shirt', './images/tshirt.jpg', '18.88', 'Grocery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `surrogate_key` (`surrogate_key`),
  ADD KEY `customer_id` (`customer_id`,`order_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `surrogate_key` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
