-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 08:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
                           `id` int(11) NOT NULL,
                           `name` varchar(50) NOT NULL,
                           `email` varchar(50) NOT NULL,
                           `subject` varchar(100) NOT NULL,
                           `message` varchar(2000) NOT NULL,
                           `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
                            `id` int(11) NOT NULL,
                            `user_id` int(11) NOT NULL,
                            `adress` varchar(200) NOT NULL,
                            `phone` varchar(20) NOT NULL,
                            `nid` varchar(50) NOT NULL,
                            `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
                            `id` int(11) NOT NULL,
                            `user_id` int(11) NOT NULL,
                            `garage_id` int(5) NOT NULL,
                            `adress` varchar(200) NOT NULL,
                            `nid` varchar(50) NOT NULL,
                            `skills` varchar(200) NOT NULL,
                            `experience` varchar(500) NOT NULL,
                            `certification` varchar(200) NOT NULL,
                            `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
                            `post_code` int(5) NOT NULL,
                            `rating` float NOT NULL,
                            `birth_date` date DEFAULT NULL,
                            `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_requests`
--

CREATE TABLE `mechanic_requests` (
                                     `id` int(11) NOT NULL,
                                     `name` varchar(50) NOT NULL,
                                     `phone` varchar(15) NOT NULL,
                                     `email` varchar(50) NOT NULL,
                                     `borth_date` date DEFAULT NULL,
                                     `skill` varchar(500) NOT NULL,
                                     `password` varchar(200) NOT NULL,
                                     `image` varchar(200) NOT NULL,
                                     `post_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
                          `id` int(11) NOT NULL,
                          `user_id` int(11) NOT NULL,
                          `mechanic_id` int(11) NOT NULL,
                          `c_latitude` varchar(50) NOT NULL,
                          `c_longitude` varchar(50) NOT NULL,
                          `address` varchar(200) NOT NULL,
                          `status` varchar(20) NOT NULL,
                          `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `name` varchar(50) NOT NULL,
                         `email` varchar(50) NOT NULL,
                         `role` varchar(10) NOT NULL,
                         `password` varchar(200) NOT NULL,
                         `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `date`) VALUES
(4, 'Admin', 'admin@demo.com', 'admin', '$2y$10$dzgDPFBFCEE5y759DopGYuHmwPmxpi2S1ltkK.XKTgpPiXwnJkS6O', '2022-01-23 19:24:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
    ADD PRIMARY KEY (`id`),
  ADD KEY `userco` (`user_id`);

--
-- Indexes for table `mechanic_requests`
--
ALTER TABLE `mechanic_requests`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`id`),
  ADD KEY `mechanic` (`mechanic_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mechanic_requests`
--
ALTER TABLE `mechanic_requests`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mechanic`
--
ALTER TABLE `mechanic`
    ADD CONSTRAINT `userco` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `mechanic` FOREIGN KEY (`mechanic_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
