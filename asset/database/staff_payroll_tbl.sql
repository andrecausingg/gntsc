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
-- Table structure for table `staff_payroll_tbl`
--

CREATE TABLE `staff_payroll_tbl` (
  `spt_id` int(6) NOT NULL,
  `spt_fullname` varchar(50) NOT NULL,
  `spt_num_days` int(20) NOT NULL,
  `spt_rate` double(23,2) NOT NULL,
  `spt_amount` double(23,2) NOT NULL,
  `spt_time` varchar(20) NOT NULL,
  `spt_date` varchar(20) NOT NULL,
  `spt_datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_payroll_tbl`
--

INSERT INTO `staff_payroll_tbl` (`spt_id`, `spt_fullname`, `spt_num_days`, `spt_rate`, `spt_amount`, `spt_time`, `spt_date`, `spt_datee`) VALUES
(1, 'GREEN, BLACK BLACK', 1002, 11.00, 11022.00, '1:01:34:am', '6/12/2022', '2022-12-06'),
(7, 'PERL, LUKE BONNIE ', 1, 1.00, 1.00, '9:31:21:am', '11/12/2022', '2022-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff_payroll_tbl`
--
ALTER TABLE `staff_payroll_tbl`
  ADD PRIMARY KEY (`spt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff_payroll_tbl`
--
ALTER TABLE `staff_payroll_tbl`
  MODIFY `spt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
