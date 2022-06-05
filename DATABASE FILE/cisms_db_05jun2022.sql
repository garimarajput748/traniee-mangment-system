-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2022 at 11:43 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cisms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

DROP TABLE IF EXISTS `mentor`;
CREATE TABLE IF NOT EXISTS `mentor` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal` int NOT NULL,
  `country` varchar(200) NOT NULL,
  `designation` varchar(5) NOT NULL,
  `ment_pic` varchar(256) NOT NULL DEFAULT 'profile.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id`, `email`, `dob`, `gender`, `city`, `state`, `postal`, `country`, `designation`, `ment_pic`) VALUES
(38, 'steven@gmail.com', '1980-07-27', 'm', 'Chicago', 'Illinois', 69650, 'United', 'HOD', 'profile.jpg'),
(39, 'daniel@gmail.com', '0000-00-00', 'm', 'Winooski', 'VT', 69650, 'United', 'PRO', 'profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal` int NOT NULL,
  `country` text NOT NULL,
  `course` varchar(10) NOT NULL,
  `yop` int NOT NULL,
  `marks` float NOT NULL,
  `college` text NOT NULL,
  `stu_pic` varchar(256) NOT NULL DEFAULT 'profile.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `email`, `dob`, `gender`, `city`, `state`, `postal`, `country`, `course`, `yop`, `marks`, `college`, `stu_pic`) VALUES
(37, 'liamoore@gmail.com', '1998-06-17', 'm', 'Southfield', 'MI', 6009, 'United', 'BTech', 2019, 67, 'Princeton University', '27992a26b49f6688e42da8fa013efea4.png'),
(41, 'ellie@gmail.com', '1995-02-22', 'f', 'Dallas', 'TX', 85200, 'United', 'BCA', 2017, 72, 'WestView College', '03964be9ac926aa5c522b98127dcd3a0.png'),
(42, 'sean@gmail.com', '1997-06-15', 'm', 'Stamford', 'CT', 70258, 'United', 'BTech', 2018, 70, 'Redlands College', 'b86f7a4e86f69827a5c58dadd0321dc1.png');

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

DROP TABLE IF EXISTS `trainee`;
CREATE TABLE IF NOT EXISTS `trainee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trainee`
--

INSERT INTO `trainee` (`id`, `name`, `email`, `create_date`, `update_date`) VALUES
(3, 'GARIMA FFF', 'email@gmail.com', '2022-06-04 16:21:12', '2022-06-04 23:42:02'),
(12, 'Name update', 'admin@email.com', '2022-06-04 23:25:20', '2022-06-04 23:25:20'),
(5, 'name', 'email@gmail.com', '2022-06-04 16:27:04', '2022-06-04 16:27:04'),
(7, 'Name update cahgneasdf', 'email@gmail.com', '2022-06-04 23:09:14', '2022-06-04 23:09:14'),
(13, 'Name update', 'msrajawat298@gmail.com', '2022-06-04 23:25:32', '2022-06-04 23:25:32'),
(8, 'new', 'new@gmail.com', '2022-06-04 23:22:33', '2022-06-04 23:22:33'),
(9, 'new', 'new@gmail.com', '2022-06-04 23:22:50', '2022-06-04 23:22:50'),
(10, 'test', 'test@gmail.com', '2022-06-04 23:23:18', '2022-06-04 23:23:18'),
(11, 'test', 'test@gmail.com', '2022-06-04 23:23:54', '2022-06-04 23:23:54'),
(14, 'Name update', 'garimarajput748@gmail.com', '2022-06-04 23:25:47', '2022-06-04 23:25:47'),
(15, 'test', 'garima@gmail.com', '2022-06-04 23:26:13', '2022-06-04 23:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `uni`
--

DROP TABLE IF EXISTS `uni`;
CREATE TABLE IF NOT EXISTS `uni` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `founder_day` date NOT NULL,
  `college1` varchar(256) NOT NULL,
  `seats1` int NOT NULL,
  `college2` varchar(256) NOT NULL,
  `seats2` int NOT NULL,
  `college3` varchar(256) NOT NULL,
  `seats3` int NOT NULL,
  `college4` varchar(256) NOT NULL,
  `seats4` int NOT NULL,
  `college5` varchar(256) NOT NULL,
  `seats5` int NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `uni_pic` varchar(256) NOT NULL DEFAULT 'profile.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uni`
--

INSERT INTO `uni` (`id`, `email`, `founder_day`, `college1`, `seats1`, `college2`, `seats2`, `college3`, `seats3`, `college4`, `seats4`, `college5`, `seats5`, `reg_no`, `uni_pic`) VALUES
(40, 'harboruni@gmail.com', '1995-10-11', 'Winterville College', 306, 'Redlands College', 402, 'Oakleaf College', 511, 'Palm Valley College', 215, 'WestView College', 323, '355751354', '0f67508fd63b737749731c9ed8a835f0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` varchar(12) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `user_type`, `created_date`, `updated_date`) VALUES
(1, 'Garima', 'Rajput', 'garima@gmail.com', 'admin', 'super_admin', '2022-06-05 12:06:30', '2022-06-05 12:07:33'),
(14, 'Garima', 'Rajput', 'garimarajput748@gmail.com', 'Garima@1', 'mentor', '2022-06-05 13:33:49', '2022-06-05 13:33:49'),
(15, 'Garima update', 'Rajput', 'Garima@gmail.com', 'Garima@1', 'trainor', '2022-06-05 13:53:55', '2022-06-05 13:54:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
