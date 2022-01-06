-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 02:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `status`) VALUES
(17, 17, 22, 0),
(18, 17, 24, 0),
(19, 17, 25, 0),
(20, 17, 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `view_count` int(11) NOT NULL,
  `pic_url` varchar(255) NOT NULL,
  `location` varchar(40) NOT NULL,
  `type` varchar(15) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `discription`, `price`, `stock`, `view_count`, `pic_url`, `location`, `type`, `post_date`, `user_id`) VALUES
(20, 'anthurium plant', '1 anthurium plant', 350, 10, 4, 'itemImages/1016--1.jpg', 'kurunegala', 'flower pla', '2021-12-30 07:46:28', 17),
(21, 'yellow flower boquet', 'flower pack\r\n                        ', 250, 1, 0, 'itemImages/1016--6.jpg', 'colombo', 'bouquet', '2021-12-30 07:47:34', 17),
(22, 'rose seeds', '250g per pack\r\n                        ', 690, 1, 0, 'itemImages/1017--9.jpg', 'kandy', 'flower see', '2021-12-30 07:54:00', 18),
(23, 'sunflower seeds', '100g per pack\r\n                        ', 1500, 1, 1, 'itemImages/1017--7.jpeg', 'kurunegala', 'flower see', '2021-12-30 07:55:35', 18),
(24, 'rose flower vas', 'beautiful flower vas\r\n                        ', 760, 1, 1, 'itemImages/1017--3.jpg', 'colombo', 'flower vas', '2021-12-30 07:56:32', 18),
(25, 'orkid flowers ', 'orkid flowers for sell\r\ncolour pink\r\n                        ', 2700, 1, 0, 'itemImages/1018--5.jpg', 'jaffna', 'flower pla', '2021-12-30 07:58:40', 19),
(26, 'rose flowers for table', 'rose flowers for decorating tables\r\n                        ', 980, 1, 12, 'itemImages/1018--11.jpg', 'kandy', 'flower vas', '2021-12-30 07:59:46', 19),
(27, 'jasmin flower seeds', '150g per pack\r\n                        ', 590, 25, 6, 'itemImages/1016--10.jpg', 'gall', 'flower see', '2021-12-30 08:40:34', 17),
(29, 'Flower boquet', 'flower bouqets for decoration\r\n                        ', 2300, 15, 0, 'itemImages/1016--bq1.jpg', 'hambanthota', 'bouquet', '2021-12-30 10:44:48', 17);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_cost` int(11) NOT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `mobile`, `city`, `address`) VALUES
(17, 'Kushan Gayantha', 'kushangayanthapercy@gmail.com', '$2y$10$YyMhZ/g3LUYlu2C2PIbw4.FbSN5SidQnyhyO8S.0hShC3SUjap3Xy', '712720033', 'Kurunegala', '201/10 Colombo Road Kurunegala'),
(18, 'gimhani', 'gihmani@gmail.com', '$2y$10$V1Cdl.CjWWU29mOBMiAfhOfgcN9iKL89EAo8kVny70tCFg4w5SJlS', '732456789', 'jaffna', '302 main street'),
(19, 'pasindu', 'pasindu@gmail.com', '$2y$10$Ith9a2UHpRU8qxFphfkFB.JbjzNnbnQueo7OstXBdm.l9TbTWffMW', '703465248', 'kurunegala', 'wariyapola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`detail_id`) REFERENCES `stock_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
