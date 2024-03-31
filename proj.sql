-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 08:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(50) NOT NULL,
  `flat` int(32) NOT NULL,
  `street` int(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `birth` date NOT NULL,
  `id` int(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telephone` int(13) NOT NULL,
  `cardnumber` int(10) NOT NULL,
  `expirationdate` varchar(10) NOT NULL,
  `cardname` varchar(32) NOT NULL,
  `bankissued` varchar(32) NOT NULL,
  `username` varchar(13) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--
-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `product_id` varchar(32) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `quantity` int(10) NOT NULL,
  `product_price` decimal(32,0) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `state` varchar(32) NOT NULL,
  `date` varchar(32) NOT NULL,
  `prs_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `name` varchar(32) NOT NULL,
  `description` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL,
  `price` double(10,0) NOT NULL,
  `size` text NOT NULL,
  `remark` varchar(255) NOT NULL,
  `id` varchar(32) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `quantity` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `description`, `category`, `price`, `size`, `remark`, `id`, `picture`, `quantity`) VALUES
('Pottery', 'Iron Age I, 1st century', 'handcraft', 100, '62', 'The distinctive Palestinian vessels decorated in red and black indicate the second phase of Palestinian settlement in Ashkelon at the end of the 12th century and the beginning of the 11th century BC. The pot and the jar are wonderful examples of these two', '0000000000', 'item0000000000img1.jpg', 136),
('Virgin Olive Oil', 'Olive oil from the West Bank and', 'food', 30, '750', '', '1000000000', 'item1000000000img1.jpg', 22),
('zaatar', 'Ground thyme from Al Salam 500 g', 'food', 4, '500', '', '1000000001', 'item1000000001img1.png', 14),
('ZAATER JENIN', 'Za’atar While many spices are de', 'food', 10, '500', '', '1000000002', 'item1000000002img1.png', 22),
('Palestinian Green Zaater', ' ', 'food', 3, '200', '', '1000000005', 'item1000000005img1.png', 16),
('Olive Oil Nabulsi Soap', 'Brand : Nablus Hasan Tokan\r\nCate', 'natural product', 4, '150', ' ', '1706756971', 'item1706756971img1.png', 100),
('Soap Bar Al Jamal ', 'Olive Oil Nablus Soap Bar Al Jam', 'natural product', 7, '140', ' ', '1706757218', 'item1706757218img1.png', 50),
('Dead Sea Mud Mask', 'Date First Available ‏ : ‎ 17 Ja', 'natural product', 10, '500', ' ', '1706757410', 'item1706757410img1.png', 20),
('Cotton with local olive oil', 'Qateen is a premium product made', 'food', 21, '1', ' ', '1706757815', 'item1706757815img1.png', 30),
('Two cups + kettle', ' ', 'ceramic', 31, '1', ' ', '2000000000', 'item2000000000img1.jpg', 20),
('Extra virgin olive oil', ' ', 'food', 12, '500 g', '', '2548136592', 'item2548136592img1.png', 100);

-- --------------------------------------------------------

--
-- Table structure for table `prossing`
--

CREATE TABLE `prossing` (
  `prs_id` int(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prossing`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prossing`
--
ALTER TABLE `prossing`
  ADD PRIMARY KEY (`prs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
