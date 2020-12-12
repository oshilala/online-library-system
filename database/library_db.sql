-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 02:17 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `adminName` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `UpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `Image`, `adminName`, `password`, `username`, `email`, `UpdateDate`) VALUES
(1, 'f8a3eae370f5f3a46841a98d6a6d2e6d.jpg', 'Nwachi', '1234', 'Admin', 'fozzyington@gmail.com', '2020-11-14 19:16:26'),
(3, 'b5bbe3211981530fcb06279b032e61a2.png', 'Vanessa Smith', '1234', 'smith', 'vanessa@gmail.com', '2020-10-02 11:22:30'),
(4, 'a0e72413b0b5ca8a7b7c5d5aeb36d4ce.jpg', 'Somto Aruonu', '1234', 'somatic', 'somygee@gmail.com', '2020-10-02 11:19:09'),
(5, '30582fb727e24c7f6880d3c3e91acf76.jpg', 'Jephthah Ugwuoke', '1234', 'jeph', 'jeph@gmail.com', '2020-10-02 11:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `bookTitle` varchar(150) NOT NULL,
  `bookcover` varchar(600) NOT NULL,
  `bookfile` varchar(600) NOT NULL,
  `author` varchar(60) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `publisherName` varchar(60) NOT NULL,
  `categories` varchar(30) NOT NULL,
  `UpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `bookTitle`, `bookcover`, `bookfile`, `author`, `ISBN`, `publisherName`, `categories`, `UpdateDate`) VALUES
(9, 'A journey of love', '3933adc8df9419f8500d021aa1fd4f71655f_1607774028_.jpg', '27756288a98f5b532d6c5e0eddbccb8d5d5d_1607774028_.pdf', 'Hamdalah Sanni', 'nil', 'First eBook Edition', 'romance', '2020-12-12 11:53:48'),
(10, 'A Game of Thrones Book_1', '7665b5cc804c72f98246c4ef4d54f85a9b10_1607774303_.jpg', '58801a284de1871396baf8fa514e6049b73b_1607774303_.pdf', 'George R.R. Martin', 'nil', 'nil', 'thriller', '2020-12-12 11:58:23'),
(11, 'How To Get Along With Anyone', '10374e0d204901409696ddfeeb74af52c8d9_1607774490_.jpg', '5589655610f661e8bcac2d31d17a9082514b_1607774490_.pdf', 'The AstroTwins', 'nil', 'Ophira & Tali Edut', 'education', '2020-12-12 12:01:30'),
(12, 'Black Sun', '4490a656680e4289ab4553b9697104061a7a_1607774662_.jpg', '1002606675b6645555d5dfea3d487b31e6af_1607774662_.pdf', 'Graham Brown', 'nil', 'BANTAM BOOKS NEW YORK', 'drama', '2020-12-12 12:04:22'),
(13, 'BUFFY THE VAMPIRE SLAYER', '365385588e705dc0bc15663acd6a4ed7c0ab_1607774934_.jpg', '5257d5cd8cab660f0a347dc77f99e34a1452_1607774934_.pdf', 'Daniel Brereton & Christopher Golden', 'nil', 'Whedon Originals', 'comic', '2020-12-12 12:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `borrowDate` varchar(20) NOT NULL,
  `returnDate` varchar(20) NOT NULL,
  `bookId` int(2) NOT NULL,
  `borrowStatus` int(2) NOT NULL,
  `fine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowId`, `memberName`, `matricNo`, `bookName`, `borrowDate`, `returnDate`, `bookId`, `borrowStatus`, `fine`) VALUES
(66, 'Somtochukwu Ugwu', 'ADSE-9835', 'A_Game_of_Thrones_Book_1', '2020-11-12', '2020-11-19', 0, 0, '690'),
(67, 'Somtochukwu Ugwu', 'ADSE-9835', 'Dangerous_Games', '2020-11-12', '2020-11-19', 0, 0, '690'),
(73, 'Somtochukwu Ugwu', 'ADSE-9835', 'Naked_Games', '2020-11-14', '2020-11-21', 0, 0, '630');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `announcement` text NOT NULL,
  `UpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `announcement`, `UpdateDate`) VALUES
(21, '                                            Welcome to DOTS library management system                                        ', '2020-11-17 12:28:03'),
(22, 'abiola is checking the project', '2020-12-11 13:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `matric_no` varchar(30) NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dept` varchar(60) NOT NULL,
  `numOfBooks` int(11) NOT NULL,
  `moneyOwed` varchar(20) NOT NULL,
  `phoneNumber` varchar(14) NOT NULL,
  `name` varchar(60) NOT NULL,
  `UpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `Image`, `matric_no`, `password`, `username`, `email`, `dept`, `numOfBooks`, `moneyOwed`, `phoneNumber`, `name`, `UpdateDate`) VALUES
(2, '6d377f543b2ed05fa4f0d75a5d150eec.png', 'ADSE-9835', '1234', 'somty', 'somygeet@gmail.com', 'Software Engineering', 0, '', '09090909090', 'Somtochukwu Ugwu', '2020-12-11 13:44:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
