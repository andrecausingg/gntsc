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
-- Table structure for table `staff_info_tbl`
--

CREATE TABLE `staff_info_tbl` (
  `sit_id` int(6) NOT NULL,
  `sit_role_name` varchar(20) NOT NULL,
  `sit_plate_num` varchar(20) NOT NULL,
  `sit_position` varchar(50) NOT NULL,
  `sit_surname` varchar(50) NOT NULL,
  `sit_middlename` varchar(50) NOT NULL,
  `sit_firstname` varchar(50) NOT NULL,
  `sit_birthdate` varchar(50) NOT NULL,
  `sit_birth_day` varchar(20) NOT NULL,
  `sit_birth_month` varchar(20) NOT NULL,
  `sit_birth_year` varchar(20) NOT NULL,
  `sit_birthplace` varchar(50) NOT NULL,
  `sit_gender` varchar(50) NOT NULL,
  `sit_civil_status` varchar(50) NOT NULL,
  `sit_address` varchar(255) NOT NULL,
  `sit_contact_num` varchar(20) NOT NULL,
  `sit_license` varchar(50) NOT NULL,
  `sit_license_expiredate` varchar(20) NOT NULL,
  `sit_exp_license_month` varchar(20) NOT NULL,
  `sit_exp_license_day` varchar(20) NOT NULL,
  `sit_exp_license_year` varchar(20) NOT NULL,
  `sit_time` varchar(20) NOT NULL,
  `sit_date` varchar(20) NOT NULL,
  `sit_datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_info_tbl`
--

INSERT INTO `staff_info_tbl` (`sit_id`, `sit_role_name`, `sit_plate_num`, `sit_position`, `sit_surname`, `sit_middlename`, `sit_firstname`, `sit_birthdate`, `sit_birth_day`, `sit_birth_month`, `sit_birth_year`, `sit_birthplace`, `sit_gender`, `sit_civil_status`, `sit_address`, `sit_contact_num`, `sit_license`, `sit_license_expiredate`, `sit_exp_license_month`, `sit_exp_license_day`, `sit_exp_license_year`, `sit_time`, `sit_date`, `sit_datee`) VALUES
(3, 'PUJ', '', '', 'G', 'G', 'G', '1-1-1934', '1', '1', '1934', 'GREY', 'MALE', 'SINGLE', 'GREY', '09123456789', 'g', '1-1-2041', '1', '1', '2041', '1:45:25:pm', '11/12/2022', '2022-12-11'),
(4, 'PAO', '', '', 'BB', 'YELLOW', 'YELLOW', '1-1-1942', '', '1', '', 'YELLOW', 'MALE', 'SINGLE', 'BLACK', '09123456777', '', '', '', '', '', '1:45:39:pm', '11/12/2022', '2022-12-11'),
(5, 'TRA', '', '', 'Z', 'X', 'Z', '1-1-1972', '1', '1', '1972', 'MANILA', 'MALE', 'SINGLE', 'BLK1 LOT1 PH2 ', '09123456789', '1', '1-1-2041', '1', '1', '2041', '8:53:31:pm', '11/12/2022', '2022-12-11'),
(6, 'OPE', '1', '', 'GREY', 'GREY', 'GREY', '1-1-1947', '', '1', '', 'MANILA', 'MALE', 'SINGLE', 'BLK1 LOT2 PH2', '09123456789', '', '', '', '', '', '11:33:36:pm', '11/12/2022', '2022-12-11'),
(7, 'STA', '', 'MANAGER', 'Z', 'A', 'C', '1-1-1934', '', '1', '', 'C', 'MALE', 'SINGLE', 'C', '09123456789', '', '', '', '', '', '1:11:07:am', '12/12/2022', '2022-12-12'),
(9, 'OPE', 'YELLOW', '', 'YELLOW', 'YELLOW', 'YELLOW', '1-1-1996', '1', '1', '1996', 'YELLOW', 'MALE', 'SINGLE', 'YELLOW', '09123456789', '', '', '', '', '', '7:36:41:am', '12/12/2022', '2022-12-12'),
(10, 'OPE', 'white', '', 'GREEN', 'WHITE', 'WHITE', '4-1-1994', '1', '4', '1994', 'GREENBLACK', 'MALE', 'SINGLE', 'GREEN', '09123456789', '', '', '', '', '', '7:37:17:am', '12/12/2022', '2022-12-12'),
(11, 'PUJ', '', '', 'X', 'Z', 'Z', '1-1-1985', '1', '1', '1985', 'Z', 'MALE', 'SINGLE', 'Z', '09123456789', 'z', '1-1-2041', '1', '1', '2041', '6:12:10:pm', '12/12/2022', '2022-12-12'),
(12, 'PUJ', '', '', 'A', 'A', 'A', '1-1-1975', '1', '1', '1975', 'A', 'MALE', 'SINGLE', 'A', '09123456789', 'a', '1-1-2041', '1', '1', '2041', '6:44:01:pm', '12/12/2022', '2022-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff_info_tbl`
--
ALTER TABLE `staff_info_tbl`
  ADD PRIMARY KEY (`sit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff_info_tbl`
--
ALTER TABLE `staff_info_tbl`
  MODIFY `sit_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
