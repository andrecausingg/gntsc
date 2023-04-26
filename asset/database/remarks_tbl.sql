-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 02:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gntsc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `remarks_tbl`
--

CREATE TABLE `remarks_tbl` (
  `rt_id` int(6) NOT NULL,
  `rt_sit_id` int(11) NOT NULL,
  `rt_description` varchar(255) NOT NULL,
  `rt_time` varchar(20) NOT NULL,
  `rt_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remarks_tbl`
--

INSERT INTO `remarks_tbl` (`rt_id`, `rt_sit_id`, `rt_description`, `rt_time`, `rt_date`) VALUES
(4, 5, 'illkj', '6:54:55:pm', '3/12/2022'),
(6, 18, 'e', '12:48:41:am', '6/12/2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remarks_tbl`
--
ALTER TABLE `remarks_tbl`
  ADD PRIMARY KEY (`rt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remarks_tbl`
--
ALTER TABLE `remarks_tbl`
  MODIFY `rt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
