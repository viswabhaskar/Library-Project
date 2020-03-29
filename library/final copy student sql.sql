-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2019 at 02:48 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
  `rno` varchar(10) NOT NULL,
  `bno` int(6) NOT NULL,
  `i_date` date NOT NULL,
  `r_date` date NOT NULL,
  `a_r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`rno`, `bno`, `i_date`, `r_date`, `a_r_date`) VALUES
('14JP5A0504', 1234, '2017-04-03', '2017-04-18', '2017-04-25'),
('14JP5A0504', 1234, '2017-05-04', '2017-05-19', '2017-05-04'),
('14JP5A0504', 1234, '2017-05-04', '2017-05-19', '2017-05-04'),
('14JP5A0504', 1234, '2017-04-12', '2017-04-27', '2018-01-05'),
('14JP5A0504', 1234, '2017-11-14', '2017-11-29', '2018-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `book_data`
--

CREATE TABLE IF NOT EXISTS `book_data` (
  `bno` int(10) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `auther` varchar(50) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `price` int(5) NOT NULL,
  PRIMARY KEY (`bno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_data`
--

INSERT INTO `book_data` (`bno`, `bname`, `auther`, `branch`, `price`) VALUES
(1234, 'VISWA', 'VISWA', 'cse', 500),
(1235, 'BHASKAR', 'BHASKAR', 'cse', 500),
(1236, 'RAJKIRAN', 'RAJKIRAN', 'cse', 500),
(1237, 'KISHORE', 'KISHORE', 'cse', 500),
(1238, 'SRINU', 'SRINU', 'cse', 500),
(1239, 'GANAPATHI', 'GANAPATHI', 'cse', 500),
(1240, 'SUDHIR', 'SUDHIR', 'cse', 500),
(1241, 'PRASAD', 'PRASAD', 'cse', 500),
(1300, 'data base management', 'VISWA', 'cse', 654),
(1301, 'data base management', 'BHASKAR', 'cse', 655),
(1302, 'data base management', 'RAJKIRAN', 'cse', 656),
(1303, 'operating systems', 'KISHORE', 'cse', 657),
(1304, 'operating systems', 'SRINU', 'cse', 658),
(1305, 'operating systems', 'GANAPATHI', 'cse', 659),
(1306, 'operating systems', 'SUDHIR', 'cse', 660),
(1307, 'cloud computing', 'PRASAD', 'cse', 661),
(1308, 'cloud computing', 'VISWA', 'IT', 662),
(1309, 'cloud computing', 'BHASKAR', 'IT', 663),
(1310, 'mobile computing', 'RAJKIRAN', 'IT', 664),
(1311, 'enginering mechanics', 'KISHORE', 'MECH', 665),
(1312, 'fluid mechanics', 'SRINU', 'MECH', 666);

-- --------------------------------------------------------

--
-- Table structure for table `dd`
--

CREATE TABLE IF NOT EXISTS `dd` (
  `rno` varchar(10) NOT NULL,
  `idate` date NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dd`
--

INSERT INTO `dd` (`rno`, `idate`, `rdate`) VALUES
('', '2015-08-07', '2015-07-23'),
('veerababu', '2015-07-23', '2015-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `FirstName` varchar(25) NOT NULL,
  `SecondName` varchar(25) NOT NULL,
  `MobileNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`FirstName`, `SecondName`, `MobileNo`) VALUES
('kumar', 'mani', 2147483647),
('viswa', 'sn', 2147483647),
('mani', 'sn', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin'),
('service', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `main_table`
--

CREATE TABLE IF NOT EXISTS `main_table` (
  `rno` varchar(10) NOT NULL,
  `bno` int(10) NOT NULL,
  `i_date` date NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_table`
--

INSERT INTO `main_table` (`rno`, `bno`, `i_date`, `r_date`) VALUES
('14JP5A0509', 1237, '2017-02-17', '2017-03-04'),
('14JP5A0505', 1236, '2017-03-10', '2017-03-25'),
('14JP5A0502', 1234, '2017-04-11', '2017-04-26'),
('13jp1a0532', 1235, '2017-05-05', '2017-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `stu_data`
--

CREATE TABLE IF NOT EXISTS `stu_data` (
  `rno` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `scity` varchar(30) NOT NULL,
  `syear` varchar(6) NOT NULL,
  `sem` int(3) NOT NULL,
  `phone_num` int(10) DEFAULT NULL,
  `section` char(2) DEFAULT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_data`
--

INSERT INTO `stu_data` (`rno`, `name`, `branch`, `scity`, `syear`, `sem`, `phone_num`, `section`) VALUES
('09255CM056', 'basheer', 'EEE', 'kakinada', '4', 2, 123456789, 'B'),
('13JP1A0532', 'nikhil', 'CSE', 'mandapeta', '4', 2, 999999999, 'A'),
('14JP5A0501', 'KIRAN', 'CSE', 'KKD', '4', 2, 22222222, 'A'),
('14JP5A0502', 'ramakrshna', 'cse', 'kakinada', '4', 2, 123456789, 'A'),
('14JP5A0504', 'viswa', 'cse', 'kakinada', '4', 2, 123456789, 'A'),
('14JP5A0505', 'PRASAD', 'cse', 'kakinada', '4', 2, 123456789, 'A'),
('14JP5A0506', 'viswa', 'EEE', 'kakinada', '3', 2, 123456789, 'B'),
('14JP5A0508', 'rambabu', 'cse', 'kakinada', '4', 2, 123456789, 'A'),
('14JP5A0509', 'RAMBABU', 'CSE', 'MAMIDADA', '4', 2, 999999999, 'A'),
('14JP5A0514', 'nikil', 'cse', 'kakinada', '4', 2, 123456789, 'A'),
('14JP5A0515', 'uday', 'cse', 'kakinada', '4', 2, 123456789, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE IF NOT EXISTS `testing` (
  `SNO` int(10) NOT NULL AUTO_INCREMENT,
  `RNO` varchar(20) NOT NULL,
  PRIMARY KEY (`SNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`SNO`, `RNO`) VALUES
(1, '14JP5A0501'),
(2, '14JP5A0504'),
(3, '14JP5A0509'),
(4, '2083023'),
(5, 'VISWA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uname` varchar(10) NOT NULL,
  `pwd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `pwd`) VALUES
('library', 'library@123'),
('1', '1');
