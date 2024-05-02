-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 07:51 PM
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
(11, 36, 'pizza', 21, 0, '2024-04-26', '2024-04-26 12:57:34', 'food'),
(11, 37, 'weqwerwe', 213, 0, '2024-04-26', '2024-04-26 13:04:00', 'entertainment'),
(11, 38, 'test', 2132, 0, '2024-04-26', '2024-04-26 13:04:38', 'livelihood'),
(12, 39, 'test', 21, 0, '2024-04-26', '2024-04-26 13:18:21', 'food'),
(11, 40, 'test', 21, 0, '2024-05-01', '2024-05-01 05:28:07', 'food'),
(11, 41, 'pizza', 21, 1, '2024-05-01', '2024-05-01 05:40:31', 'food'),
(11, 42, 'coco', 21, 1, '2024-05-01', '2024-05-01 05:41:15', 'food'),
(11, 43, 'test', 21, 1, '2024-05-01', '2024-05-01 05:41:27', 'food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
