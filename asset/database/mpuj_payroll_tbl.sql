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
-- Table structure for table `mpuj_payroll_tbl`
--

CREATE TABLE `mpuj_payroll_tbl` (
  `mpt_id` int(10) NOT NULL,
  `mpt_pao_fullname` varchar(50) NOT NULL,
  `mpt_driver_fullname` varchar(50) NOT NULL,
  `mpt_rounds_one` double(23,2) NOT NULL,
  `mpt_rounds_two` double(23,2) NOT NULL,
  `mpt_rounds_three` double(23,2) NOT NULL,
  `mpt_rounds_four` double(23,2) NOT NULL,
  `mpt_rounds_five` double(23,2) NOT NULL,
  `mpt_rounds_six` double(23,2) NOT NULL,
  `mpt_total_cash` double(23,2) NOT NULL,
  `mpt_expenses` double(23,2) NOT NULL,
  `mpt_handheld` double(23,2) NOT NULL,
  `mpt_boundery` double(23,2) NOT NULL,
  `mpt_diesel` double(23,2) NOT NULL,
  `mpt_amount` double(23,2) NOT NULL,
  `mpt_pao_income` double(23,2) NOT NULL,
  `mpt_driver_income` double(23,2) NOT NULL,
  `mpt_time` varchar(20) NOT NULL,
  `mpt_date` varchar(20) NOT NULL,
  `mpt_datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mpuj_payroll_tbl`
--

INSERT INTO `mpuj_payroll_tbl` (`mpt_id`, `mpt_pao_fullname`, `mpt_driver_fullname`, `mpt_rounds_one`, `mpt_rounds_two`, `mpt_rounds_three`, `mpt_rounds_four`, `mpt_rounds_five`, `mpt_rounds_six`, `mpt_total_cash`, `mpt_expenses`, `mpt_handheld`, `mpt_boundery`, `mpt_diesel`, `mpt_amount`, `mpt_pao_income`, `mpt_driver_income`, `mpt_time`, `mpt_date`, `mpt_datee`) VALUES
(8, 'YELLOW, YELLOW YELLOW', 'GREY, GREY GREY', 100.00, 1.00, 1.00, 2.00, 1.00, 1.00, 106.00, 1.00, 107.00, 2.00, 1.00, 104.00, 46.80, 57.20, '1:46:55:pm', '11/12/2022', '2022-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mpuj_payroll_tbl`
--
ALTER TABLE `mpuj_payroll_tbl`
  ADD PRIMARY KEY (`mpt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mpuj_payroll_tbl`
--
ALTER TABLE `mpuj_payroll_tbl`
  MODIFY `mpt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
