-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 05:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'mdhasibulhasan35@gmail.com', 'dreamer'),
(2, 'hasibulhasan4@iut-dhaka.edu', '112233'),
(3, 'pinky@gmail.com', 'pinky');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5b13ed3a6e006', '5b13ed3a9436a'),
('5b13ed72489d8', '5b13ed7263d70'),
('611361c6282eb', '611361c688eb5'),
('611361c7253a7', '611361c734441'),
('6113678a25664', '6113678a4578d'),
('6113678a93438', '6113678a9a00e'),
('6113678add365', '6113678ae9616'),
('611498028d969', '6114980299e4d'),
('61149802cc3ff', '61149802d8a05');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('hasibulhasan4@iut-dhaka.edu', '611361a6730bc', 1, 2, 1, 1, '2021-08-11 05:47:35'),
('mdhasibulhasan35@gmail.com', '611361a6730bc', -2, 2, 0, 2, '2021-08-11 05:57:55'),
('mdhasibulhasan35@gmail.com', '6113676de4d57', 3, 3, 2, 1, '2021-08-11 06:20:02'),
('pinky@gmail.com', '6113676de4d57', -1, 1, 0, 1, '2021-08-11 12:18:23'),
('pinky@gmail.com', '611361a6730bc', -1, 1, 0, 1, '2021-08-11 18:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5b13ed3a6e006', 'sdb', '5b13ed3a9436a'),
('5b13ed3a6e006', 'jsdb', '5b13ed3a94374'),
('5b13ed3a6e006', 'dsbv', '5b13ed3a94377'),
('5b13ed3a6e006', 'jbdv', '5b13ed3a94379'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d70'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d7a'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d7d'),
('5b13ed72489d8', 'vsdv', '5b13ed7263d80'),
('611361c6282eb', 'aa', '611361c688eae'),
('611361c6282eb', 'aaa', '611361c688eb4'),
('611361c6282eb', 'aaa', '611361c688eb5'),
('611361c6282eb', 'aaaa', '611361c688eb6'),
('611361c7253a7', '4', '611361c734437'),
('611361c7253a7', '5', '611361c734440'),
('611361c7253a7', '1', '611361c734441'),
('611361c7253a7', 'aaa', '611361c734443'),
('6113678a25664', '2', '6113678a4578d'),
('6113678a25664', '3', '6113678a45799'),
('6113678a25664', 'moni', '6113678a4579b'),
('6113678a25664', '6', '6113678a4579d'),
('6113678a93438', '5', '6113678a9a002'),
('6113678a93438', 'sd', '6113678a9a00e'),
('6113678a93438', 'asa', '6113678a9a011'),
('6113678a93438', 'a', '6113678a9a013'),
('6113678add365', '2', '6113678ae9604'),
('6113678add365', '3', '6113678ae9611'),
('6113678add365', '5', '6113678ae9614'),
('6113678add365', '10', '6113678ae9616'),
('611498028d969', 'sd', '6114980299e49'),
('611498028d969', 'aaa', '6114980299e4d'),
('611498028d969', 'aaa', '6114980299e4e'),
('611498028d969', 'a', '6114980299e4f'),
('61149802cc3ff', 'sadsad', '61149802d8a00'),
('61149802cc3ff', 'sadsa', '61149802d8a05'),
('61149802cc3ff', 'sdsa', '61149802d8a06'),
('61149802cc3ff', 'sd', '61149802d8a07');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5b13ed30cd71f', '5b13ed3a6e006', 'dbjb', 4, 1),
('5b13ed6bb8bcd', '5b13ed72489d8', 'dvsd', 4, 1),
('611361a6730bc', '611361c6282eb', 'what is string?', 4, 1),
('611361a6730bc', '611361c7253a7', 'what is it?', 4, 2),
('6113676de4d57', '6113678a25664', 'a', 4, 1),
('6113676de4d57', '6113678a93438', 'asa', 4, 2),
('6113676de4d57', '6113678add365', 'as', 4, 3),
('611497e84d777', '611498028d969', 'sadsad', 4, 1),
('611497e84d777', '61149802cc3ff', 'sdsad', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `date`) VALUES
('611361a6730bc', 'Algo', 2, 1, 2, '2021-08-11 05:35:34'),
('6113676de4d57', 'Ai', 2, 1, 3, '2021-08-11 06:00:13'),
('611497e84d777', 'Swe', 2, 1, 2, '2021-08-12 03:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('hasibulhasan4@iut-dhaka.edu', 1, '2021-08-11 05:47:35'),
('mdhasibulhasan35@gmail.com', 1, '2021-08-11 06:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `college`, `email`, `password`) VALUES
('Hasan', 'IUT', 'hasibulhasan4@iut-dhaka.edu', '112233'),
('ezaz', 'IUT', 'mdhasibulhasan35@gmail.com', '111111'),
('pinky', 'BUET', 'pinky@gmail.com', 'pinky');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(0, 'Md.Hasibul Hasan', 'mdhasibulhasan35@gmail.com', '$2y$10$PYKXzTxPgFCFmcKBQ3rTJepXV0IaMAdfz8NQNnnn.CysKU5zt52by', 0, 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
