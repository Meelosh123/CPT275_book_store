-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: pdb3.your-hosting.net
-- Generation Time: Dec 22, 2016 at 06:16 PM
-- Server version: 5.7.16-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2191257_bstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `instructor` varchar(30) NOT NULL,
  `courseName` varchar(30) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `startDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `userID`, `instructor`, `courseName`, `courseCode`, `semester`, `startDate`) VALUES
(1, 1, 'testInstructor', 'testCourse', 'testCode', 'test', '2016-10-11 00:00:00'),
(7, 1, 'Tim Smith', 'Basic Algebra', 'MAT100', 'Summer', '2017-05-22 00:00:00'),
(9, 1, 'Sarah Lewis', 'English 101', 'ENG101', 'Spring', '2017-01-22 00:00:00'),
(12, 1, 'Dan Roberts', 'Philosophy 101', 'PHIL101', 'Fall', '2017-08-15 00:00:00'),
(13, 1, 'Jennifer Lawrence', 'Biology 101', 'BIO101', 'Spring', '2017-01-05 00:00:00'),
(14, 1, 'Alex Trebec', 'English 102', 'ENG102', 'Spring', '2017-01-05 00:00:00'),
(15, 1, 'Sanders', 'PHP', 'CPT800', 'Fall', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryNumber` int(11) NOT NULL,
  `textbookID` int(11) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `stockQuantity` decimal(5,0) DEFAULT NULL,
  `stockOrdered` decimal(5,0) DEFAULT NULL,
  `reorderStatus` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryNumber`, `textbookID`, `category`, `description`, `stockQuantity`, `stockOrdered`, `reorderStatus`) VALUES
(5, 19, 'English', 'English section', 10, 1, 0),
(6, 1, 'Biology', 'Check for damage, Bill', 65, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderLine`
--

CREATE TABLE `orderLine` (
  `orderID` int(11) NOT NULL,
  `textbookID` int(11) NOT NULL,
  `orderStatus` varchar(10) NOT NULL,
  `orderQuantity` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderLine`
--

INSERT INTO `orderLine` (`orderID`, `textbookID`, `orderStatus`, `orderQuantity`) VALUES
(1, 1, 'test', 1),
(1, 18, 'test', 3),
(2, 11, 'asdf', 3),
(2, 18, 'dsfsd', 1),
(9, 11, '3', 0),
(14, 18, 'dfg', 44),
(21, 1, 'test', 1),
(22, 1, 'test', 1),
(33, 1, 'test', 1),
(34, 1, 'test', 1),
(35, 1, 'test', 222),
(36, 1, 'test', 222),
(36, 11, 'test', 22),
(36, 18, 'test', 5),
(37, 11, 'test', 1),
(37, 18, 'test', 5),
(38, 1, 'test', 100),
(38, 11, 'test', 55),
(38, 18, 'test', 10),
(39, 11, 'test', 3),
(39, 18, 'test', 33),
(40, 1, 'test', 2),
(40, 11, 'test', 3),
(40, 18, 'test', 33),
(41, 1, 'test', 1),
(41, 18, 'test', 111),
(42, 18, 'test', 3),
(43, 11, 'test', 25),
(44, 18, 'test', 20),
(45, 11, 'test', 1),
(46, 11, 'test', 13),
(47, 11, 'test', 26),
(48, 1, 'test', 30),
(49, 1, 'test', 60),
(50, 1, 'test', 60),
(50, 11, 'test', 2),
(51, 1, 'test', 60),
(51, 11, 'test', 14),
(52, 18, 'test', 2),
(53, 18, 'test', 1),
(53, 19, 'test', 5),
(54, 18, 'test', 3),
(55, 19, 'test', 3),
(56, 18, 'test', 3),
(57, 1, 'test', 1),
(58, 1, 'test', 2),
(59, 1, 'test', 1),
(60, 11, 'test', 63),
(61, 18, 'test', 3),
(64, 1, 'test', 1),
(64, 11, 'test', 1),
(64, 18, 'test', 2),
(64, 19, 'test', 1),
(65, 11, 'test', 100),
(70, 11, 'ordered', 100),
(71, 11, 'ordered', 500),
(72, 1, 'ordered', 10),
(73, 19, 'ordered', 32),
(74, 1, 'ordered', 20),
(75, 1, 'ordered', 15),
(76, 1, 'ordered', 30),
(77, 21, 'ordered', 100),
(78, 19, 'ordered', 25);

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderReport`
-- (See below for the actual view)
--
CREATE TABLE `orderReport` (
`title` varchar(30)
,`author` varchar(40)
,`cost` decimal(9,0)
,`ISBN` varchar(30)
,`orderStatus` varchar(10)
,`timeStamps` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderDate` datetime DEFAULT NULL,
  `timeStamps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `orderDate`, `timeStamps`) VALUES
(1, 1, '2016-10-26 00:00:00', '2016-10-22 14:58:14'),
(2, 2, '2016-10-27 00:00:00', '2016-10-22 15:36:00'),
(3, 1, '2016-10-25 17:15:42', '2016-10-25 17:15:42'),
(4, 1, '2016-10-25 17:20:50', '2016-10-25 17:20:50'),
(5, 1, '2016-10-25 17:31:31', '2016-10-25 17:31:31'),
(6, 1, '2016-10-25 17:34:32', '2016-10-25 17:34:32'),
(7, 1, '2016-10-25 17:35:38', '2016-10-25 17:35:38'),
(8, 1, '2016-10-25 18:09:18', '2016-10-25 18:09:18'),
(9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, '2016-10-25 18:26:36', '2016-10-25 18:26:36'),
(12, 1, '2016-10-25 18:27:30', '2016-10-25 18:27:30'),
(13, 1, '2016-10-25 18:31:18', '2016-10-25 18:31:18'),
(14, 1, '2016-10-25 18:36:13', '2016-10-25 18:36:13'),
(15, 1, '2016-10-25 18:49:33', '2016-10-25 18:49:33'),
(16, 1, '2016-10-25 18:51:43', '2016-10-25 18:51:43'),
(17, 1, '2016-10-25 18:54:27', '2016-10-25 18:54:27'),
(18, 1, '2016-10-25 18:55:25', '2016-10-25 18:55:25'),
(19, 1, '2016-10-25 18:57:44', '2016-10-25 18:57:44'),
(20, 1, '2016-10-25 19:01:37', '2016-10-25 19:01:37'),
(21, 1, '2016-10-25 19:02:57', '2016-10-25 19:02:57'),
(22, 1, '2016-10-25 19:05:33', '2016-10-25 19:05:33'),
(23, 1, '2016-10-25 19:06:15', '2016-10-25 19:06:15'),
(24, 1, '2016-10-25 19:07:19', '2016-10-25 19:07:19'),
(25, 1, '2016-10-25 19:07:57', '2016-10-25 19:07:57'),
(26, 1, '2016-10-25 19:20:00', '2016-10-25 19:20:00'),
(27, 1, '2016-10-25 19:21:28', '2016-10-25 19:21:28'),
(28, 1, '2016-10-25 19:23:58', '2016-10-25 19:23:58'),
(29, 1, '2016-10-25 19:24:16', '2016-10-25 19:24:16'),
(30, 1, '2016-10-25 19:30:13', '2016-10-25 19:30:13'),
(31, 1, '2016-10-25 19:30:57', '2016-10-25 19:30:57'),
(32, 1, '2016-10-25 19:32:07', '2016-10-25 19:32:07'),
(33, 1, '2016-10-25 19:32:50', '2016-10-25 19:32:50'),
(34, 1, '2016-10-25 19:33:32', '2016-10-25 19:33:32'),
(35, 1, '2016-10-25 19:35:16', '2016-10-25 19:35:16'),
(36, 1, '2016-10-25 19:35:47', '2016-10-25 19:35:47'),
(37, 1, '2016-10-25 19:39:58', '2016-10-25 19:39:58'),
(38, 1, '2016-10-25 22:51:46', '2016-10-25 22:51:46'),
(39, 1, '2016-11-01 15:12:36', '2016-11-01 15:12:36'),
(40, 1, '2016-11-01 15:20:30', '2016-11-01 15:20:30'),
(41, 1, '2016-11-01 19:00:48', '2016-11-01 19:00:48'),
(42, 1, '2016-11-02 16:09:32', '2016-11-02 16:09:32'),
(43, 4, '2016-11-02 20:28:21', '2016-11-02 20:28:21'),
(44, 4, '2016-11-06 16:31:17', '2016-11-06 16:31:17'),
(45, 4, '2016-11-06 22:31:12', '2016-11-06 22:31:12'),
(46, 5, '2016-11-06 23:18:20', '2016-11-06 23:18:20'),
(47, 5, '2016-11-06 23:43:01', '2016-11-06 23:43:01'),
(48, 5, '2016-11-06 23:47:52', '2016-11-06 23:47:52'),
(49, 5, '2016-11-06 23:48:54', '2016-11-06 23:48:54'),
(50, 5, '2016-11-06 23:49:39', '2016-11-06 23:49:39'),
(51, 5, '2016-11-06 23:52:26', '2016-11-06 23:52:26'),
(52, 1, '2016-11-07 01:04:49', '2016-11-07 01:04:49'),
(53, 1, '2016-11-07 19:54:27', '2016-11-07 19:54:27'),
(54, 1, '2016-11-07 20:29:02', '2016-11-07 20:29:02'),
(55, 1, '2016-11-08 18:32:05', '2016-11-08 18:32:05'),
(56, 5, '2016-11-08 21:05:31', '2016-11-08 21:05:31'),
(57, 5, '2016-11-08 23:51:39', '2016-11-08 23:51:39'),
(58, 5, '2016-11-08 23:54:38', '2016-11-08 23:54:38'),
(59, 1, '2016-11-14 02:37:27', '2016-11-14 02:37:27'),
(60, 5, '2016-11-14 04:19:58', '2016-11-14 04:19:58'),
(61, 1, '2016-11-14 08:49:34', '2016-11-14 08:49:34'),
(63, 1, '2016-11-15 19:20:46', '2016-11-15 19:20:46'),
(64, 1, '2016-11-15 19:33:41', '2016-11-15 19:33:41'),
(65, 4, '2016-11-27 19:51:39', '2016-11-27 19:51:39'),
(70, 5, '2016-11-29 21:32:11', '2016-11-29 21:32:11'),
(71, 1, '2016-11-29 21:36:21', '2016-11-29 21:36:21'),
(72, 1, '2016-11-29 21:43:10', '2016-11-29 21:43:10'),
(73, 5, '2016-11-29 22:21:39', '2016-11-29 22:21:39'),
(74, 14, '2016-11-29 22:23:56', '2016-11-29 22:23:56'),
(75, 5, '2016-11-29 23:47:57', '2016-11-29 23:47:57'),
(76, 5, '2016-11-29 23:48:53', '2016-11-29 23:48:53'),
(77, 14, '2016-11-29 23:56:21', '2016-11-29 23:56:21'),
(78, 22, '2016-11-30 00:00:16', '2016-11-30 00:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisherID` int(11) NOT NULL,
  `publisherName` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `postalCode` varchar(10) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `emailAddr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisherID`, `publisherName`, `address`, `city`, `state`, `postalCode`, `phone`, `emailAddr`) VALUES
(9, 'Random Publishers', '091 Suite Fans', 'Fancity', 'SC', '10001', '518-222-1111', 'fans@mail.com'),
(17, 'Tom\'s Publishing', '100 Sanders Ln', 'Chicago', 'IL', '52142', '412-523-1250', 'tomPub@toms.com'),
(19, 'Pendant Publishing', '44 Mills Ln', 'Sacramento', 'CA', '50240', '333-513-3910', 'mail@pendant.com'),
(21, 'J. Publishers', '101 Ave ', 'Parkway', 'NJ', '20111', '123-901-1111', 'somebody@mail.com'),
(22, 'Peng', '123 street', 'Greenville', 'SC', '29687', '123-456-7890', 'email@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `testID` int(100) NOT NULL,
  `testData` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`testID`, `testData`) VALUES
(1, 1500),
(2, 300);

-- --------------------------------------------------------

--
-- Table structure for table `textbooks`
--

CREATE TABLE `textbooks` (
  `textbookID` int(11) NOT NULL,
  `publisherID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(40) DEFAULT NULL,
  `edition` varchar(10) DEFAULT NULL,
  `ISBN` varchar(30) DEFAULT NULL,
  `cost` decimal(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textbooks`
--

INSERT INTO `textbooks` (`textbookID`, `publisherID`, `courseID`, `title`, `author`, `edition`, `ISBN`, `cost`) VALUES
(1, 9, 13, 'Plants and Animals WOW!', 'Dr. John T. Science', '7', '583-7-52-218410-4', 275),
(11, 17, 12, '19th Century Philosophy', 'Hans Berman', '3', '321-1-15-148420-5', 125),
(18, 19, 7, 'Easy Algebra', 'Robert Bob', '1', '178-3-26-144410-0', 150),
(19, 19, 9, 'College English 1', 'Dr. Herbert Morris', '57', '978-3-16-148410-0', 250),
(20, 9, 14, 'Next Level English', 'Jake Pratt', '3', '952-3-16-148440-0', 75),
(21, 19, 13, 'Humans', 'Bob Miller', '2nd', '456ES', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `campusName` varchar(40) DEFAULT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `userTitle` varchar(30) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `emailAddr` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `userAccess` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `campusName`, `firstName`, `lastName`, `userTitle`, `phone`, `emailAddr`, `password`, `userAccess`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 2),
(2, 'guy', 'clemson', 'bob', 'bob', ';lkj;', 'lkjlk', 'new@user.com', '098f6bcd4621d373cade4e832627b4f6', 2),
(3, 'dude', 'Clemson', 'Bob', 'Robert', 'Teacher', '1241214124', 'bob@clemson.edu', '098f6bcd4621d373cade4e832627b4f6', 1),
(4, 'FrankO', 'Tech', 'Frank', 'Oliver', 'Professor', '11111111111', 'test1@test.com', '098f6bcd4621d373cade4e832627b4f6', 2),
(5, 'Cooper', 'Greenville Tech', 'James', 'Cooper', 'Admin', '123-456-7890', 'cooperjm@my.gvltec.edu', '098f6bcd4621d373cade4e832627b4f6', 1),
(8, 'braggca', 'Barton', 'Chris', 'Bragg', 'admin', '111-1111', 'braggca@my.gvltec.edu', '098f6bcd4621d373cade4e832627b4f6', 1),
(9, 'testadmin', 'testcampus', 'test', 'admin', 'admin', '123-456-7890', 'testadmin@test.com', '098f6bcd4621d373cade4e832627b4f6', 1),
(10, 'bookemployee', 'book', 'book', 'employee', 'bookemployee', '123-456-7890', 'book@store.com', '098f6bcd4621d373cade4e832627b4f6', 3),
(11, 't', 't', 't', 't', 't', '123-456-7890', 't@c.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(13, 'emailtest', 'emailtest', 'emailtest', 'emailtest', 'emailtest', '123-456-7890', 'email@test.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(14, 'James', 'Greenville Tech', 'James', 'Cooper', 'Admin', '123-456-7890', 'cooper.jm@outlook.com', '098f6bcd4621d373cade4e832627b4f6', 2),
(21, 'encrypt', 'encrypt', 'encrypt', 'encrypt', 'encrypt', '123-456-7890', 'encrypt@test.com', '05a671c66aefea124cc08b76ea6d30bb', 0),
(22, 'BobF', 'Greenville', 'Bob', 'Frank', 'Teacher', '123-456-7890', 'bob@frank.com', 'fb469d7ef430b0baf0cab6c436e70375', 2);

-- --------------------------------------------------------

--
-- Structure for view `orderReport`
--
DROP TABLE IF EXISTS `orderReport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`2191257_bstore`@`%` SQL SECURITY DEFINER VIEW `orderReport`  AS  select `t`.`title` AS `title`,`t`.`author` AS `author`,`t`.`cost` AS `cost`,`t`.`ISBN` AS `ISBN`,`ol`.`orderStatus` AS `orderStatus`,`o`.`timeStamps` AS `timeStamps` from ((`textbooks` `t` join `orderLine` `ol` on((`t`.`textbookID` = `ol`.`textbookID`))) join `orders` `o` on((`ol`.`orderID` = `o`.`orderID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `FK_userID` (`userID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryNumber`),
  ADD KEY `FK_inventory_textbookID` (`textbookID`);

--
-- Indexes for table `orderLine`
--
ALTER TABLE `orderLine`
  ADD PRIMARY KEY (`orderID`,`textbookID`),
  ADD KEY `FK_textbookID` (`textbookID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `FK_orders_userID` (`userID`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisherID`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `textbooks`
--
ALTER TABLE `textbooks`
  ADD PRIMARY KEY (`textbookID`),
  ADD KEY `FK_publisherID` (`publisherID`),
  ADD KEY `FK_courseID` (`courseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `testID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `textbooks`
--
ALTER TABLE `textbooks`
  MODIFY `textbookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_inventory_textbookID` FOREIGN KEY (`textbookID`) REFERENCES `textbooks` (`textbookID`);

--
-- Constraints for table `orderLine`
--
ALTER TABLE `orderLine`
  ADD CONSTRAINT `FK_orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `FK_textbookID` FOREIGN KEY (`textbookID`) REFERENCES `textbooks` (`textbookID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `textbooks`
--
ALTER TABLE `textbooks`
  ADD CONSTRAINT `FK_courseID` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`),
  ADD CONSTRAINT `FK_publisherID` FOREIGN KEY (`publisherID`) REFERENCES `publishers` (`publisherID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
