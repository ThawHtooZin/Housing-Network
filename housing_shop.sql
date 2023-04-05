-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 08:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housing_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

CREATE TABLE `housing` (
  `id` int(11) NOT NULL,
  `owner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `sor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `depositefee` int(11) NOT NULL,
  `monthlyfee` int(11) NOT NULL,
  `houseimage` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`id`, `owner`, `location`, `phone_number`, `sor`, `price`, `depositefee`, `monthlyfee`, `houseimage`) VALUES
(1, '1', 'North Okkalapa Township, Nya Quater, Ayar 17 street, 603', 959958597848, 'rent', 0, 500000, 130000, 'houseimages/img1.png'),
(2, '1', 'Yangon', 9977221152, 'sale', 10000000, 0, 0, 'hat.jpg'),
(3, '1', 'Yangon', 9977221152, 'rent', 0, 500000, 200000, 'hat.jpg'),
(4, '2', 'Yangon', 9977221152, 'sale', 5000000, 0, 0, 'hat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'ThawHtooZin', 'thawhtoozin@gmail.com', 'tommy', 1),
(2, 'Tommy', 'tommy@gmail.com', 'tommy', 0),
(3, 'Ko Zin Lin Oo', 'kzlo@gmail.com', 'kzlo', 1),
(4, 'Daw Sandar Aung', 'sandaraung@gmail.com', 'sda', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `housing`
--
ALTER TABLE `housing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `housing`
--
ALTER TABLE `housing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
