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
-- Table structure for table `tradjeep_payroll_tbl`
--

CREATE TABLE `tradjeep_payroll_tbl` (
  `tpt_id` int(10) NOT NULL,
  `tpt_drivers_name` varchar(20) NOT NULL,
  `tpt_plate_num` varchar(50) NOT NULL,
  `tpt_daily_butaw` double(23,2) NOT NULL,
  `tpt_savings` double(23,2) NOT NULL,
  `tpt_terminal_fee` double(23,2) NOT NULL,
  `tpt_monthly_butaw` double(23,2) NOT NULL,
  `tpt_membership` double(23,2) NOT NULL,
  `tpt_others` double(23,2) NOT NULL,
  `tpt_remarks` double(23,2) NOT NULL,
  `tpt_time` varchar(20) NOT NULL,
  `tpt_date` varchar(20) NOT NULL,
  `tpt_datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tradjeep_payroll_tbl`
--

INSERT INTO `tradjeep_payroll_tbl` (`tpt_id`, `tpt_drivers_name`, `tpt_plate_num`, `tpt_daily_butaw`, `tpt_savings`, `tpt_terminal_fee`, `tpt_monthly_butaw`, `tpt_membership`, `tpt_others`, `tpt_remarks`, `tpt_time`, `tpt_date`, `tpt_datee`) VALUES
(1, 'MENDEZ, GREY SHAWN', '1', 6.00, 1.00, 3.00, 3.00, 2.00, 6.00, 21.00, '9:00:50:pm', '11/12/2022', '2022-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tradjeep_payroll_tbl`
--
ALTER TABLE `tradjeep_payroll_tbl`
  ADD PRIMARY KEY (`tpt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tradjeep_payroll_tbl`
--
ALTER TABLE `tradjeep_payroll_tbl`
  MODIFY `tpt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
