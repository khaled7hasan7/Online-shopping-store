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

INSERT INTO `customers` (`name`, `flat`, `street`, `city`, `country`, `birth`, `id`, `email`, `telephone`, `cardnumber`, `expirationdate`, `cardname`, `bankissued`, `username`, `password`) VALUES
('sara ahmad', 0, 11111, 'ramallah', 'Palestine', '2009-02-03', 123456789, 'siamlayali5@gmail.com', 522478418, 2232, 'da', 'pls', 'bankk', '0123456', '12345678'),
('khaled', 0, 2254, 'ramallah', 'Palestine', '2024-02-07', 2147483647, 'kh2662174@gmail.com', 522478418, 1, '10', '10', '10', '012345678', '012345678'),
('translation', 0, 2254, 'ramallah', 'Palestine', '2024-01-10', 2147483647, 'siamlayali5@gmail.com', 522478418, 1234, '132', 'pls', 'bankk', '1191494', '12345678'),
('translation', 0, 2254, 'ramallah', 'Palestine', '2024-01-01', 25151515, '1191494@student.birzeit.edu', 522478418, 564, 'l njkb', 'njm k', '24', '12345678', '12345678'),
('omar ahmad', 0, 2254, 'ramallah', 'Palestine', '2024-01-04', 2147483647, '1191494@student.birzeit.edu', 522478418, 5656, 'lasnd', 'pls', 'bankk', '55555555', '55555555'),
('khaled', 0, 11111, 'ramallah', 'Palestine', '2024-02-07', 214587, 'khaled7hasan@gmail.com', 522478418, 0, 'sad', 'asd', 'asd', '88888888', '88888888'),
('omar khaled', 0, 11111, 'ramallah', 'Palestine', '2024-02-03', 42262015, '1191494@student.birzeit.edu', 522478418, 333334, 'ads', 'as', 'asd', '987654321', '987654321'),
('ahmad omar', 0, 11111, 'ramallah', 'Palestine', '2024-01-10', 123456789, 'kh2662174@gmail.com', 522478418, 1123, 'sdfs', '234 d', 'bankk', 'kh2662174', '12345678'),
('translation', 0, 2254, 'ramallah', 'Palestine', '2024-01-03', 2147483647, 'siamlayali5@gmail.com', 522478418, 5656, 'KLLJKJK', '32c2', 'cas43', 'khaled555', 'KHALED555'),
('ahmad', 0, 666, 'ramallah', 'Palestine', '2024-02-06', 2147483647, 'kh2662174@gmail.com', 522478418, 1212, '1212', 'njm k', 'bankk', 'khaled78', 'khaled78');

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

INSERT INTO `employees` (`username`, `password`) VALUES
('employee', 'employee'),
('khaledemp', 'khaledemp');

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

INSERT INTO `orders` (`order_id`, `username`, `product_id`, `product_name`, `quantity`, `product_price`, `product_image`, `state`, `date`, `prs_id`) VALUES
(82, '12345678', '1000000000', 'Virgin Olive Oil', 1, 30, 'item1000000000img1.jpg', 'shipped', '2024-02-01 10:50:07 PM', 1706824207),
(83, '12345678', '0000000000', 'Pottery', 1, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-01 10:50:19 PM', 1706824219),
(84, '12345678', '1000000000', 'Virgin Olive Oil', 3, 30, 'item1000000000img1.jpg', 'shipped', '2024-02-01 11:01:50 PM', 1706824910),
(85, '12345678', '1000000002', 'ZAATER JENIN', 1, 10, 'item1000000002img1.png', 'shipped', '2024-02-01 11:01:50 PM', 1706824910),
(86, '12345678', '1706756971', 'Olive Oil Nabulsi Soap', 5, 4, 'item1706756971img1.png', 'shipped', '2024-02-01 11:01:50 PM', 1706824910),
(87, '12345678', '0000000000', 'Pottery', 1, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-01 11:28:23 PM', 1706826503),
(88, '12345678', '0000000000', 'Pottery', 1, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-01 11:28:23 PM', 1706826503),
(89, '12345678', '1706756971', 'Olive Oil Nabulsi Soap', 4, 4, 'item1706756971img1.png', 'shipped', '2024-02-01 11:28:23 PM', 1706826503),
(90, 'khaled78', '1000000002', 'ZAATER JENIN', 1, 10, 'item1000000002img1.png', 'shipped', '2024-02-01 11:37:31 PM', 1706827051),
(91, 'khaled78', '1000000005', 'Palestinian Green Zaater', 4, 3, 'item1000000005img1.png', 'shipped', '2024-02-01 11:37:31 PM', 1706827051),
(92, 'khaled78', '0000000000', 'Pottery', 4, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-01 11:37:31 PM', 1706827051),
(94, 'khaled78', '1000000000', 'Virgin Olive Oil', 1, 30, 'item1000000000img1.jpg', 'shipped', '2024-02-02 01:17:06 PM', 1706876226),
(95, 'khaled78', '0000000000', 'Pottery', 3, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-02 01:17:06 PM', 1706876226),
(96, '12345678', '1000000000', 'Virgin Olive Oil', 1, 30, 'item1000000000img1.jpg', 'shipped', '2024-02-02 04:18:39 PM', 1706887119),
(98, '12345678', '1000000005', 'Palestinian Green Zaater', 0, 3, 'item1000000005img1.png', 'shipped', '2024-02-02 04:18:39 PM', 1706887119),
(99, '12345678', '1000000000', 'Virgin Olive Oil', 1, 30, 'item1000000000img1.jpg', 'shipped', '2024-02-02 04:41:26 PM', 1706888486),
(100, '12345678', '0000000000', 'Pottery', 3, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-02 04:41:26 PM', 1706888486),
(101, '12345678', '1000000002', 'ZAATER JENIN', 4, 10, 'item1000000002img1.png', 'shipped', '2024-02-02 04:41:26 PM', 1706888486),
(102, '12345678', '0000000000', 'Pottery', 3, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-02 06:34:47 PM', 1706895287),
(103, '12345678', '0000000000', 'Pottery', 14, 100, 'item0000000000img1.jpg', 'shipped', '2024-02-02 06:34:47 PM', 1706895287),
(104, '12345678', '1000000000', 'Virgin Olive Oil', 1, 30, 'item1000000000img1.jpg', 'basket', '2024-02-02 06:57:16 PM', 0);

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

INSERT INTO `prossing` (`prs_id`, `username`, `date`) VALUES
(1706824207, '12345678', '2024-02-01 10:50:07'),
(1706824219, '12345678', '2024-02-01 10:50:19'),
(1706824910, '12345678', '2024-02-01 11:01:50'),
(1706826503, '12345678', '2024-02-01 11:28:23'),
(1706827051, 'khaled78', '2024-02-01 11:37:31'),
(1706876226, 'khaled78', '2024-02-02 01:17:06'),
(1706887100, 'employee', '2024-02-02 04:18:20'),
(1706887119, '12345678', '2024-02-02 04:18:39'),
(1706888486, '12345678', '2024-02-02 04:41:26'),
(1706895287, '12345678', '2024-02-02 06:34:47');

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
