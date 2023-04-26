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
-- Table structure for table `tradjeep_info_tbl`
--

CREATE TABLE `tradjeep_info_tbl` (
  `tjt_id` int(6) NOT NULL,
  `tjt_plate_num` varchar(20) NOT NULL,
  `tjt_time` varchar(20) NOT NULL,
  `tjt_date` varchar(20) NOT NULL,
  `tjt_datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tradjeep_info_tbl`
--

INSERT INTO `tradjeep_info_tbl` (`tjt_id`, `tjt_plate_num`, `tjt_time`, `tjt_date`, `tjt_datee`) VALUES
(2, '1', '1:02:57:am', '6/12/2022', NULL),
(3, '2', '1:02:58:am', '6/12/2022', NULL),
(4, '3', '1:02:59:am', '6/12/2022', NULL),
(7, '1', '11:54:42:pm', '11/12/2022', '2022-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tradjeep_info_tbl`
--
ALTER TABLE `tradjeep_info_tbl`
  ADD PRIMARY KEY (`tjt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tradjeep_info_tbl`
--
ALTER TABLE `tradjeep_info_tbl`
  MODIFY `tjt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
