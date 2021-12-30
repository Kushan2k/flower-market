-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 03:43 PM
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
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `item_id`, `status`) VALUES
(13, 11, 0),
(14, 10, 0),
(14, 11, 0),
(14, 12, 0),
(15, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `view_count` int(11) NOT NULL,
  `pic_url` varchar(255) NOT NULL,
  `location` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `discription`, `price`, `view_count`, `pic_url`, `location`, `type`, `post_date`, `user_id`) VALUES
(4, 'flower vass', 'new design\r\n                        ', 3400, 11, 'itemImages/1006--WhatsApp Image 2021-11-04 at 4.02.01 PM.jpeg', 'kurunegala', 'flower vas', '2021-11-05 08:14:44', 7),
(5, 'plants', 'multi color avalible\r\n                        ', 700, 4, 'itemImages/1006--WhatsApp Image 2021-11-04 at 4.01.37 PM.jpeg', 'kandy', 'flower pla', '2021-11-05 08:15:23', 7),
(6, 'test user item', 'test discription\r\n                        ', 570, 9, 'itemImages/1007--WhatsApp Image 2021-11-04 at 4.02.02 PM.jpeg', 'jaffna', 'bouquet', '2021-11-05 08:16:34', 8),
(7, 'dfgdfg', 'test\r\n                        ', 6700, 7, 'itemImages/1009--assassins_creed_odyssey_4k_8k_2-7680x4320.jpg', 'bedroom', 'flower vas', '2021-11-06 11:03:07', 10),
(8, 'game', 'test post\r\n                        ', 4500, 2, 'itemImages/1007--anthem-1920x1080-e3-2017-hd-2018-8274.jpg', 'jaffna', 'flower vas', '2021-11-07 09:06:31', 8),
(9, 'edge user', 'sgdfghdgd\r\n                        ', 4567, 4, 'itemImages/1007--assassins_creed_iv_black_flag-wide.jpg', 'kandy', 'flower see', '2021-11-07 09:06:59', 8),
(10, 'test', 'test\r\n                        ', 560, 20, 'itemImages/1009--wp3890158-captain-america-4k-wallpapers.jpg', 'kurunegala', 'flower vas', '2021-11-12 08:26:24', 10),
(11, 'test10', 'gdgfdgh', 5676, 34, 'itemImages/1011--0970.jpg', 'jaffa', 'bouquet', '2021-11-19 08:56:28', 12),
(12, 'example item 001', 'ex item oo1\r\n                        ', 4567, 6, 'itemImages/1011--wp3597823-cap-america-wallpapers.jpg', 'kurunegala', 'bouquet', '2021-11-22 06:45:34', 12),
(19, 'rose flower seeds', '1kg of seeds', 460, 4, 'itemImages/1014--seeds.jpg', 'kurunegala', 'flower see', '2021-12-21 14:14:15', 15);

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
(7, 'Kushan Gayantha', 'kushangayanthapercy@gmail.com', '$2y$10$q2HYOMdxxDeux3U3nCXGSO3sw.c0mr16mDq/p94ECU2nCB4Na31Bu', '0712720033', 'Kurunegala', '201/10 Colombo Road Kurunegala'),
(8, 'test user', 'testuser@gmail.com', '$2y$10$kjBUGL9.2i0Rn7bebIbZFemz27uS5Fa8jfuVHTsac6E2SxGqqmQwu', '9728685854', 'colombo', 'na'),
(10, 'test', 'test@gmail.com', '$2y$10$da3pcWT6i9vzmzXusIbAO.5NXJsW.E1SlzWNttQEACZqf3oubpHf.', '3134324', 'kandy', '201/10 Colombo Road Kurunegala'),
(12, 'test user', 'testadmin@gmail.com', '$2y$10$68EdtVmznwskU3KkjTTdE.W0jdd7aCjNnhD37eKMnIO1qsvDi0F.O', '564537675', 'Kurunegala', '201/10 Colombo Road Kurunegala'),
(13, 'stlc', 'sltctest@gmail.com', '$2y$10$mcFMPWY.ZeZC9TUp5vSHA.IYSqpVUx2CWNWLfibZyV0gCA.GRdXm.', '987654321', 'Kurunegala', '201/10 Colombo Road Kurunegala'),
(14, 'update user test', 'lasttest@gmail.com', '$2y$10$eBURtnGYNEellV7iUQOeCuCwDh3uVPraaZluCWWh/BMCRoWtDEMH6', '765834567', 'Kurunegala', '201/10 Colombo Road Kurunegala'),
(15, 'final test 2', 'finaltest@gmail.com', '$2y$10$b8UySDuxR2Oq1N7x7Y64EevZS6quAvyqD.PBsSM0Ay7r7vh3y9dZu', '324325238', 'Kurunegala', '201/10 Colombo Road Kurunegala');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
