-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 07:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `added time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `user_id`, `categoryName`, `added time`) VALUES
(1, 1, 'food', '2024-04-27'),
(2, 1, 'entertainment', '2024-04-27'),
(3, 11, 'expensive stuff', '2024-05-05'),
(4, 13, 'shopping', '2024-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `user_id` int(11) DEFAULT NULL,
  `exp_id` int(11) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_recurring` int(11) NOT NULL,
  `Purchase_date` date NOT NULL DEFAULT current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `exp_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`user_id`, `exp_id`, `exp`, `price`, `is_recurring`, `Purchase_date`, `time_stamp`, `exp_type`) VALUES
(11, 47, 'coco', 23, 0, '2024-05-05', '2024-05-05 10:09:31', '1'),
(11, 48, 'rent', 223, 0, '2024-05-05', '2024-05-05 10:09:46', '3'),
(11, 49, 'test', 111, 0, '2024-04-01', '2024-05-05 10:25:04', '2'),
(13, 50, 'pizza', 22, 0, '2024-05-06', '2024-05-06 07:37:03', '1'),
(13, 51, 'soup', 1, 0, '2024-05-06', '2024-05-06 08:09:19', '4'),
(13, 52, 'movie', 200, 0, '2024-03-05', '2024-05-06 08:10:06', '2'),
(13, 53, 'pizza', 22, 0, '2024-05-06', '2024-05-06 08:17:51', '1'),
(13, 54, 'water', 1000, 0, '2024-05-06', '2024-05-06 08:34:52', '1'),
(13, 55, 'water', 1000, 0, '2024-05-06', '2024-05-06 08:35:01', '1'),
(13, 56, 'movie', 30000, 0, '2024-05-06', '2024-05-06 15:15:08', '2'),
(13, 57, 'pizza', 22, 0, '2024-05-06', '2024-05-06 15:22:44', '1'),
(13, 58, 'pizza', 22, 0, '2024-05-06', '2024-05-06 15:23:03', '1'),
(13, 59, 'pizza', 22, 0, '2024-05-06', '2024-05-06 15:23:18', '1'),
(13, 60, 'pizza', 22, 0, '2024-05-06', '2024-05-06 15:24:34', '1'),
(13, 61, 'pizza', 22, 0, '2024-05-06', '2024-05-06 15:24:51', '1'),
(13, 62, 'pizza', 22, 0, '2024-05-06', '2024-05-06 15:27:37', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `user_name`, `password_`) VALUES
(11, 'Mwarsame922@gmail.com', 'test', '12345'),
(12, 'abdullahi@gmail.com', 'abdull', '12345'),
(13, 'new@gmail.com', 'new', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
