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
-- Table structure for table `mpuj_info_tbl`
--

CREATE TABLE `mpuj_info_tbl` (
  `mit_id` int(11) NOT NULL,
  `mit_chassis_num` varchar(20) NOT NULL,
  `mit_engine` varchar(20) NOT NULL,
  `mit_plate_num` varchar(20) NOT NULL,
  `mit_mpuj_num` varchar(20) NOT NULL,
  `mit_status` varchar(20) NOT NULL,
  `mit_time` varchar(20) NOT NULL,
  `mit_date` varchar(20) NOT NULL,
  `mit_datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mpuj_info_tbl`
--

INSERT INTO `mpuj_info_tbl` (`mit_id`, `mit_chassis_num`, `mit_engine`, `mit_plate_num`, `mit_mpuj_num`, `mit_status`, `mit_time`, `mit_date`, `mit_datee`) VALUES
(8, '1', '5', '1', '1', 'ACTIVE', '11:31:34:pm', '11/12/2022', '2022-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mpuj_info_tbl`
--
ALTER TABLE `mpuj_info_tbl`
  ADD PRIMARY KEY (`mit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mpuj_info_tbl`
--
ALTER TABLE `mpuj_info_tbl`
  MODIFY `mit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
