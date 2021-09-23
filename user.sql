-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 06:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `Name` varchar(50) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Detail` varchar(10000) NOT NULL,
  `Payment` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `developer` varchar(50) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `File` varchar(255) DEFAULT NULL,
  `Price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`Name`, `Category`, `Description`, `Detail`, `Payment`, `image`, `Status`, `developer`, `ID`, `File`, `Price`) VALUES
('Huỳnh Trọng Hiếu', '', 'test', 'test app', '', '', '', NULL, 2, NULL, NULL),
('Huỳnh Trọng Hiếu 3', '', 'dsds', 'dsdsds', 'Free', '', 'Pending', NULL, 3, NULL, NULL),
('Test', '', 'Testing', 'Detail testing', 'Free', '', 'Pending', NULL, 4, NULL, NULL),
('test3', '', 'test3', 'Detail testing', 'Fee', '', 'Deny', NULL, 5, NULL, NULL),
('Huỳnh Trọng Hiếu', 'Game', 'Test app', 'Test app', 'Fee', 'recycle-paper-bag (1).jpg', 'Approve', 'teacher', 18, 'Project01.docx', NULL),
('Huỳnh Trọng Hiếu', 'Education', 'Testing', 'Test 5', 'Free', '22713359_1599389173455816_3431145366844900375_o.jpg', 'Pending', 'teacher', 19, 'assignment2.rar', NULL),
('Tom &amp; Jerry', 'Movie', 'Long movie', 'Long movie of Tom and Jerry', 'Fee', 'z9YuQD.jpg', 'Approve', 'test2', 20, '51603108.rar', 10000),
('Attack on Titan', 'Game', 'Base on the famous Japanese amime', 'Base on the famous Japanese amime now turning to the fantastic game.', 'Fee', 'Shingeki_no_Kyojin_manga_volume_1.jpg', 'Approve', 'test4', 21, 'readme.rar', 0),
('Youtube', 'Education', 'Watch and subscribe', 'Get the official YouTube app on Android phones and tablets. See what the world is watching -- from the hottest music videos to what’s popular in gaming, fashion, beauty, news, learning and more. Subscribe to channels you love, create content of your own, share with friends, and watch on any device.', 'Fee', 'unnamed.png', 'Approve', 'test2', 22, 'readme.rar', 5000),
('Leave the door open', 'Movie', 'A new song from Bruno Mars and Anderson Paak', '&quot;Leave the Door Open&quot; is an R&amp;B and soul song, influenced by quiet storm and inspired by the &quot;1970s Philadelphia soul&quot; groups.', 'Free', '136639.jpg', 'Approve', 'test7', 23, 'readme.rar', 0),
('Roblox', 'Game', 'MILLIONS OF WORLDS TO EXPLORE', 'LIMITED TIME ONLY (April 15 – May 20): The Metaverse Champions community event is live! Rally behind your favorite champions and set out on a quest to collect dozens of exclusive items across over 180 unique experiences on Roblox. Whose champion will reign supreme? *', 'Fee', 'unnamed.webp', 'Approve', 'test2', 24, 'readme.rar', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `Code` varchar(50) NOT NULL,
  `Value` int(100) NOT NULL,
  `ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`Code`, `Value`, `ID`) VALUES
('testcode', 5000, 1),
('code10k', 10000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` varchar(10) NOT NULL,
  `User_mail` varchar(50) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Balance` int(11) NOT NULL,
  `Avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `User_mail`, `User_name`, `Password`, `Balance`, `Avatar`) VALUES
('2', 'test@test.com', 'test2', 'ad0234829205b9033196ba818f7a872b', 20000, ''),
('2', 'test@test.com', 'test3', 'test3', 2000, ''),
('2', 'test@test.com', 'test4', '86985e105f79b95d6bc918fb45ec7727', 10000, ''),
('2', 'tronghieuhuynh28@gmail.com', 'teacher', '8d788385431273d11e8b43bb78f3aa41', 0, ''),
('2', 'test@test.com', 'johnhuynh', 'cc7bc2a328df6cd4b331205d87e0602d', 25000, ''),
('2', 'test@test.com', 'test6', '4cfad7076129962ee70c36839a1e3e15', 40000, ''),
('1', 'tronghieuhuynh28@gmail.com', 'testing', 'ae2b1fca515949e5d54fb22b8ed95575', 0, ''),
('1', 'tronghieuhuynh28@gmail.com', 'test7', 'b04083e53e242626595e2b8ea327e525', 10000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
