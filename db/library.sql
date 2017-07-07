-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2016 at 08:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `book_copies` int(11) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `copyright_year` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_added`) VALUES
(36, 'eee', 1, 'xxx', 2, 'ccc', 'vvv', '22222', 22222, '2016-07-15'),
(37, 'www', 2, 'eee', 2, 'eee', 'eee', '33333', 3333, '2016-07-08'),
(38, 'hhh', 3, 'hhh', 3, 'hhh', 'hhh', '666', 777, '2016-04-01'),
(39, 'kkk', 1, 'yyy', 5, 'uuu', 'uuu', '7777', 777, '2016-08-01'),
(40, 'kkkk', 2, 'uuu', 7, 'jjj', 'jjj', '666', 777, '2016-08-01'),
(41, 'mmm', 2, 'hhh', 1, 'hhh', 'hhhh', '2222', 1111, '2016-08-01'),
(43, 'mmm', 2, 'mmm', 2, 'mmm', 'mmm', '444', 444, '2016-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
`borrow_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrow` varchar(100) NOT NULL,
  `due_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=485 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE IF NOT EXISTS `borrowdetails` (
`borrow_details_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `borrow_status` varchar(50) NOT NULL,
  `date_return` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=802 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'English'),
(2, 'Math'),
(3, 'Science'),
(4, 'Encyclopedia'),
(5, 'Engineering'),
(6, 'Newspaper'),
(7, 'General'),
(8, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE IF NOT EXISTS `issue` (
`issue_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `student_id`, `book_id`, `due_date`, `issue_date`) VALUES
(15, 222, 37, '2016-08-05', '2016-08-01'),
(16, 555, 38, '2016-08-05', '2016-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`member_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type`, `year_level`, `status`) VALUES
(52, 'Mark', 'Sanchez', 'Male', 'Talisay', '212010', 'Teacher', 'Faculty', 'Active'),
(53, 'April Joy', 'Aguilar', 'Female', 'E.B. Magalona', '00', 'Student', 'Second Year', 'Banned'),
(54, 'Alfonso', 'Pancho', 'Male', 'E.B. Magalona', '009', 'Student', 'First Year', 'Active'),
(55, 'Jonathan ', 'Antanilla', 'Male', 'E.B. Magalona', '0032', 'Student', 'Fourth Year', 'Active'),
(56, 'Renzo Bryan', 'Pedroso', 'Male', 'Silay City', '03030', 'Student', 'Third Year', 'Active'),
(57, 'Eleazar', 'Duterte', 'Male', 'E.B. Magalona', '90902', 'Student', 'Second Year', 'Active'),
(58, 'Ellen Mae', 'Espino', 'Female', 'E.B. Magalona', '123', 'Student', 'First Year', 'Active'),
(59, 'Ruth', 'Magbanua', 'Female', 'E.B. Magalona', '9340', 'Student', 'Second Year', 'Active'),
(60, 'Shaina Marie', 'Gabino', 'Female', 'Silay City', '132134', 'Student', 'Second Year', 'Active'),
(62, 'Chairty Joy', 'Punzalan', 'Female', 'E.B. Magalona', '12423', 'Teacher', 'Faculty', 'Active'),
(63, 'Kristine May', 'Dela Rosa', 'Female', 'Silay City', '1321', 'Student', 'Second Year', 'Active'),
(64, 'Chinie marie', 'Laborosa', 'Female', 'E.B. Magalona', '902101', 'Student', 'Second Year', 'Active'),
(65, 'Ruby', 'Morante', 'Female', 'E.B. Magalona', '', 'Teacher', 'Faculty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `gender`, `address`, `contact`, `email`, `session`, `status`) VALUES
(111, 'tanvir', 'ahmed', 'male', 'chittagong', '018111111', 'abc@gmail.com', '2010-2011', 'active'),
(222, 'qqq', 'qqq', 'male', 'qqq', '2222', 'qqq', '2222', 'active'),
(333, 'ssss', 'dddd', 'f', 'c', '018112233', 'rr@gmil.com', '2012-2013', 'active'),
(444, 'llll', 'kkkk', 'male', 'dddd', '1222', 'rr@gmail.com', '2011-2012', 'active'),
(555, 'xxx', 'ccc', 'm', 'c', '018111111', 'rr', '2012-2013', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'hh', 'hh', 'hh', 'hhh'),
(2, 'ddd', 'ddd', 'yame@hh.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'dd', 'ddd', 'yame@hh.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(4, 'ff', 'fff', 'yame@hh.com', '77963b7a931377ad4ab5ad6a9cd718aa'),
(5, 'fff', 'fff', 'yameen051@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'tanvir', 'hasan', 'tanvir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'tanvir', 'hasan', 'tan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, '', '', '', ''),
(9, 'tanvir', 'hasan', 'ta@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'tanvir', 'hasan', 'hasan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'tanvir', 'hasan', 'an@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'tanvir', 'hasan', 'san@gmail.com', '9595f446f7db1a9b2d19e8d45f2604f3'),
(13, 'tanvir', 'hasan', 't@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(14, 'librarian', 'as', 'lab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'library', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
 ADD PRIMARY KEY (`borrow_id`), ADD KEY `borrowerid` (`student_id`), ADD KEY `borrowid` (`borrow_id`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
 ADD PRIMARY KEY (`borrow_details_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`), ADD UNIQUE KEY `category_id` (`category_id`), ADD KEY `classid` (`category_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
 ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=485;
--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
MODIFY `borrow_details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=802;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
