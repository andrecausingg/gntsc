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
-- Table structure for table `dispatch_tbl`
--

CREATE TABLE `dispatch_tbl` (
  `dt_id` int(6) NOT NULL,
  `dt_route` int(6) NOT NULL,
  `dt_driver_full_name` varchar(50) NOT NULL,
  `dt_pao_full_name` varchar(50) NOT NULL,
  `dt_mpuj_num` varchar(50) NOT NULL,
  `dt_plate_num` varchar(20) NOT NULL,
  `dt_time_of_departure` varchar(50) NOT NULL,
  `dt_expected_arrival` varchar(50) NOT NULL,
  `dt_time` varchar(20) NOT NULL,
  `dt_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatch_tbl`
--
ALTER TABLE `dispatch_tbl`
  ADD PRIMARY KEY (`dt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispatch_tbl`
--
ALTER TABLE `dispatch_tbl`
  MODIFY `dt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
