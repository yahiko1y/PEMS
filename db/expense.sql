-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 06:05 AM
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
(1, 18, 'canbuulo', 213, 0, '2024-03-01', '2024-03-31 03:53:32', 'food'),
(1, 19, 'bariis', 321, 0, '2024-03-01', '2024-03-31 03:53:46', 'food'),
(1, 20, 'filin', 12, 0, '2024-03-01', '2024-03-31 03:53:56', 'entertainment'),
(1, 21, 'movie', 23, 0, '2024-03-01', '2024-03-31 03:54:07', 'entertainment'),
(1, 22, 'rent', 238, 0, '2024-03-01', '2024-03-31 03:54:16', 'housing'),
(1, 23, 'cleaning', 234, 0, '2024-03-01', '2024-03-31 03:54:35', 'housing');

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
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
