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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD PRIMARY KEY (`lt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `lt_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
