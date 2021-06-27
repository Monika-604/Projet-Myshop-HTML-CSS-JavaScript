-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2021 at 09:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'LOUNGE', 0),
(2, 'BED', 0),
(3, 'TABLE', 0),
(4, 'CHAIR', 0),
(5, 'SOFA', 0),
(6, 'DOUBLE BED', 2),
(7, 'KIDS BED', 2),
(8, 'SEATER SOFA', 5),
(9, 'CONSOLE', 3),
(10, 'CONSOLE', 3),
(11, 'INSIDE TABLE', 3),
(12, 'BLANKO', 3),
(13, 'SEATER SOFA', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `rate` int(100) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `img`, `rate`) VALUES
(1, 'Coombes\r\n\r\n', 600, 1, '1.jpg', 4),
(2, 'Keeve set\r\n\r\n', 400, 5, '2.jpg', 1),
(3, 'Kappu', 600, 2, '3.jpeg', 3),
(4, 'Penemillè\r\n', 200, 3, '4.jpeg', 3),
(5, 'NILLE', 150, 11, '5_1.jpg', 3),
(6, 'Soft', 300, 13, '3.jpg', 3),
(7, 'Blanko\r\n\r\n', 900, 8, '8.jpg', 3),
(8, 'Keeve set\r\n\r\n', 1300, 9, 'deco12.jpg', 3),
(9, 'Keeve set\r\n\r\n', 1400, 9, 'deco13.jpeg', 3),
(10, 'Kappu\r\n\r\n', 1000, 9, 'deco16.jpeg', 3),
(11, 'Keeve set\r\n\r\n', 1600, 9, 'deco14.jpeg', 3),
(14, 'Blanko\r\n\r\n', 900, 8, 'deco9.jpeg', 3),
(15, 'Keeve set\r\n\r\n', 900, 8, 'deco8.jpeg', 3),
(16, 'Keeve set\r\n\r\n', 1300, 9, 'deco12.jpg', 3),
(17, 'Keeve set\r\n\r\n', 1300, 9, 'deco17.jpg', 3),
(18, 'Keeve set\r\n\r\n', 2100, 9, 'deco19.jpeg', 3),
(19, 'NILLE\r\n\r\n', 3120, 9, 'deco20.jpeg', 3),
(20, 'Kappu\r\n\r\n', 1500, 9, 'deco23.jpeg', 3),
(21, 'test\r\n\r\n', 2300, 9, 'deco24.jpeg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(2, 'user1', '$2y$10$HsLRiqg5/kp4XUMj1My5wOjFhQ.QCw/9dmr0DOIJkdrs6N7.wOLhu', 'user.yazdani23@gmail.com', 0),
(12, 'Yazdani723', '$2y$10$/gJk3ged8..Hobcf7/z5WeJIW9/5Hz47rngL0QQgxwZUdiFL9gmY2', 'zahra.yazdani623@gmail.com', NULL),
(13, 'Yazdani23111', '$2y$10$yGrIph7uy6IEb1o5Te.F0uQN7jL3eLYDFL19Uv.MQs1x.TqIkEl/S', 'za.yazdani623@gmail.com', NULL),
(15, 'nolane', '$2y$10$OdgkuTefV55WwrwLcnyBwuZGNeTOplEXpLdoizM6N0f0qtAZ7G75G', 'nolane.fr2020@gmail.com', NULL),
(16, 'monika', '$2y$10$PCujIPA8qOKeJ1.xVVkFqeS3obkDF.K.k.aQV4fTewV4Pahf21B8y', 'monir.kabiri@yahoo.com', 1),
(17, 'jacob', '$2y$10$gjZk9MoERsNCFYOfwkz1W.s8ktpZdtJLnmx4zoetu49I5lNiMZmp.', 'jacob.fr@yahoo.com', NULL),
(18, 'samir', '$2y$10$3OK1oyfAUtnBgnR94OZrbet/6AXZXP9kdXORyZ6TIdelY4qN02Uai', 'toto@aol.fr', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
