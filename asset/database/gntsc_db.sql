-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 02:33 AM
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
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `at_id` int(10) NOT NULL,
  `at_drivers_fullname` varchar(50) NOT NULL,
  `at_pao_fullname` varchar(255) NOT NULL,
  `at_time_in` varchar(20) NOT NULL,
  `at_time_out` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_tbl`
--

INSERT INTO `attendance_tbl` (`at_id`, `at_drivers_fullname`, `at_pao_fullname`, `at_time_in`, `at_time_out`) VALUES
(1, 'MENDEZ, GREY JACK', 'SANTOS, CRUZ SHANE', '7:00 am', '7:00 pm');

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

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE `log_tbl` (
  `lt_id` int(6) NOT NULL,
  `lt_user_full_name` varchar(50) NOT NULL,
  `lt_action` varchar(20) NOT NULL,
  `lt_description` varchar(999) NOT NULL,
  `lt_page` varchar(20) NOT NULL,
  `lt_time` varchar(20) DEFAULT NULL,
  `lt_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_tbl`
--

INSERT INTO `log_tbl` (`lt_id`, `lt_user_full_name`, `lt_action`, `lt_description`, `lt_page`, `lt_time`, `lt_date`) VALUES
(1, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = PAO |CRUZ,DUCK WHAMOSS change data of |Last Name = Z to BB| on', 'MANAGE MPUJ PO', '9:38:54:am', '2022-12-12'),
(2, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = PAO |CRUZ,DUCK WHAMOSS change data of |Birth Day =  to 1| and |Birth Year =  to 1942| on', 'MANAGE MPUJ PO', '11:09:55:am', '2022-12-12'),
(3, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = PAO |CRUZ,DUCK WHAMOSS change data of |Birth Day =  to 1| and |Birth Year =  to 1942| on', 'MANAGE MPUJ PO', '11:10:03:am', '2022-12-12'),
(4, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = PUJ |CRUZ,DUCK WHAMOSS change data of |Last Name = GREY to GREYY| on', 'MANAGE MPUJ DRIVER', '11:16:20:am', '2022-12-12'),
(5, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = TRA |CRUZ,DUCK WHAMOSS change data of |Middle Name = GREY to X| on', 'MANAGE MPUJ DRIVER', '11:18:10:am', '2022-12-12'),
(6, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = TRA |CRUZ,DUCK WHAMOSS change data of |Last Name = MENDEZ to Z| on', 'MANAGE MPUJ DRIVER', '11:20:13:am', '2022-12-12'),
(7, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = PUJ |CRUZ,DUCK WHAMOSS change data of |Last Name = GREYY to G| and |Middle Name = GREY to G| and |First Name = GREY to G| on', 'MANAGE MPUJ DRIVER', '11:26:01:am', '2022-12-12'),
(8, 'CRUZ,DUCK WHAMOSS', 'create', 'CRUZ,DUCK WHAMOSS add data of |Role = PUJ| |Full Name = Z,Z Z| |address = Z| |Contact No. = 09123456789| |Birth Date(M/D/Y) = 1-1-1985| |Birth Place = Z| |Gender = MALE| |Civil Status	 = SINGLE| |License = z| on', 'MANAGE MPUJ DRIVER', '6:12:10:pm', '2022-12-12'),
(9, 'CRUZ,DUCK WHAMOSS', 'delete', 'CRUZ,DUCK WHAMOSS delete data of |Name of = BLACK,BLACK BLACKK| |username = blackk| |password = admin1233| on', 'MANAGE USER', '6:14:28:pm', '2022-12-12'),
(10, 'CRUZ,DUCK WHAMOSS', 'edit', '|ROLE = PUJ |CRUZ,DUCK WHAMOSS change data of |Last Name = Z to X| on', 'MANAGE MPUJ DRIVER', '6:14:45:pm', '2022-12-12'),
(11, 'CRUZ,DUCK WHAMOSS', 'delete', 'CRUZ,DUCK WHAMOSS delete data of |Name of = CRUZ,DUCK WHAMOSS| |username = admin| |password = admin123| on', 'MANAGE USER', '6:15:28:pm', '2022-12-12'),
(12, 'grey,grey shawn', 'create', 'grey,grey shawn add data of |Full Name = MENDEZ,GREY SHAWN| |username = admin| |password = admin123| on', 'MANAGE USER', '6:18:27:pm', '2022-12-12'),
(13, 'grey,grey shawn', 'delete', 'grey,grey shawn delete data of |Name of = grey,grey shawn| |username = admin| |password = admin123| on', 'MANAGE USER', '6:18:32:pm', '2022-12-12'),
(14, 'MENDEZ,GREY SHAWN', 'create', 'MENDEZ,GREY SHAWN add data of |Role = PUJ| |Full Name = W,W W| |address = W| |Contact No. = 09123456789| |Birth Date(M/D/Y) = 1-1-1975| |Birth Place = W| |Gender = MALE| |Civil Status	 = SINGLE| |License = w| on', 'MANAGE MPUJ DRIVER', '6:44:01:pm', '2022-12-12'),
(15, 'MENDEZ,GREY SHAWN', 'edit', '|ROLE = PUJ |MENDEZ,GREY SHAWN change data of |Last Name = W to A| and |Middle Name = W to A| and |First Name = W to A| on', 'MANAGE MPUJ DRIVER', '6:44:11:pm', '2022-12-12');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `u_id` int(10) NOT NULL,
  `u_last_name` varchar(50) NOT NULL,
  `u_middle_name` varchar(50) NOT NULL,
  `u_first_name` varchar(50) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_time` varchar(20) NOT NULL,
  `u_date` varchar(20) NOT NULL,
  `u_datee` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`u_id`, `u_last_name`, `u_middle_name`, `u_first_name`, `u_username`, `u_password`, `u_time`, `u_date`, `u_datee`) VALUES
(92, 'MENDEZ', 'GREY', 'SHAWN', 'admin', 'admin123', '6:18:27:pm', '12/12/2022', '2022-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `dispatch_tbl`
--
ALTER TABLE `dispatch_tbl`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD PRIMARY KEY (`lt_id`);

--
-- Indexes for table `mpuj_info_tbl`
--
ALTER TABLE `mpuj_info_tbl`
  ADD PRIMARY KEY (`mit_id`);

--
-- Indexes for table `mpuj_payroll_tbl`
--
ALTER TABLE `mpuj_payroll_tbl`
  ADD PRIMARY KEY (`mpt_id`);

--
-- Indexes for table `remarks_tbl`
--
ALTER TABLE `remarks_tbl`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indexes for table `staff_info_tbl`
--
ALTER TABLE `staff_info_tbl`
  ADD PRIMARY KEY (`sit_id`);

--
-- Indexes for table `staff_payroll_tbl`
--
ALTER TABLE `staff_payroll_tbl`
  ADD PRIMARY KEY (`spt_id`);

--
-- Indexes for table `tradjeep_info_tbl`
--
ALTER TABLE `tradjeep_info_tbl`
  ADD PRIMARY KEY (`tjt_id`);

--
-- Indexes for table `tradjeep_payroll_tbl`
--
ALTER TABLE `tradjeep_payroll_tbl`
  ADD PRIMARY KEY (`tpt_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `at_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dispatch_tbl`
--
ALTER TABLE `dispatch_tbl`
  MODIFY `dt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `lt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mpuj_info_tbl`
--
ALTER TABLE `mpuj_info_tbl`
  MODIFY `mit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mpuj_payroll_tbl`
--
ALTER TABLE `mpuj_payroll_tbl`
  MODIFY `mpt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `remarks_tbl`
--
ALTER TABLE `remarks_tbl`
  MODIFY `rt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff_info_tbl`
--
ALTER TABLE `staff_info_tbl`
  MODIFY `sit_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff_payroll_tbl`
--
ALTER TABLE `staff_payroll_tbl`
  MODIFY `spt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tradjeep_info_tbl`
--
ALTER TABLE `tradjeep_info_tbl`
  MODIFY `tjt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tradjeep_payroll_tbl`
--
ALTER TABLE `tradjeep_payroll_tbl`
  MODIFY `tpt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
