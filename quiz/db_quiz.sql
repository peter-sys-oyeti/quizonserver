-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 07:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `surname`, `firstname`, `picture`, `username`, `password`, `position`) VALUES
(2, 'Oyeti', 'Peter', 'avatar.png', 'peter', 'admin', 'Quiz Master');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`) VALUES
(1, 'Choir'),
(2, 'Sunday School'),
(3, 'Usher');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `department` tinyint(11) NOT NULL,
  `question` text NOT NULL,
  `option_A` varchar(100) NOT NULL,
  `option_B` varchar(100) NOT NULL,
  `option_C` varchar(100) NOT NULL,
  `option_D` varchar(100) NOT NULL,
  `answer` enum('A','B','C','D') NOT NULL,
  `answer_description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `department`, `question`, `option_A`, `option_B`, `option_C`, `option_D`, `answer`, `answer_description`) VALUES
(1, 1, '<p>\r\n	God gave Manna to the Israelites while they were in the desert. What does the word &quot;Manna&quot; mean?</p>\r\n', 'Angel Bread', 'God Provides', 'What is it?', 'Food', 'C', 'The word \"Manna\" is a Hebrew word that means \"what is it?\"'),
(2, 1, '<p>\r\n	How many times do the phrases, &quot;Fear not&quot; or &quot;Do not fear&quot;, show up in the Bible?</p>\r\n', '78', '12', '13', '365', 'D', 'The phrases - \"Fear not\" or \"Do not fear\" are found in 365 places in the bible.'),
(3, 1, '<p>\r\n	What is the only book of the Bible that does not contain the word &quot;God&quot;?</p>\r\n', 'Song of Solomon', 'Esther', 'Ruth', 'Job', 'B', 'Esther - Esther is the only book of the Bible that does not contain the word \"God.\"'),
(4, 2, '<p>\r\n	God gave Manna to the Israelites while they were in the desert. What does the word &quot;Manna&quot; mean?</p>\r\n', 'Angel Bread', 'God Provides', 'What is it?', 'Food', 'C', 'The word \"Manna\" is a Hebrew word that means \"what is it?\"'),
(5, 2, '<p>\r\n	What is the only book of the Bible that does not contain the word &quot;God&quot;?</p>\r\n', 'Song of Solomon', 'Esther', 'Ruth', 'Job', 'B', 'Esther - Esther is the only book of the Bible that does not contain the word \"God.\"'),
(6, 3, '<p>\r\n	How many apostles did Jesus Have?</p>\r\n', '12', '3', '11', '7', 'A', 'Yes, Jesus had 12 apostles');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `department` tinyint(11) NOT NULL,
  `Description` text NOT NULL,
  `score` smallint(6) NOT NULL,
  `out_of` smallint(11) NOT NULL,
  `percentage_score` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `picture`, `surname`, `firstname`, `username`, `password`, `department`, `Description`, `score`, `out_of`, `percentage_score`) VALUES
(1, 'db02b-kid2.jpg', 'Oyeti', 'Peace', 'peace', 'user', 1, '<p>\r\n	More...</p>\r\n', 0, 0, 0),
(2, '25517-kid.jpg', 'Wole', 'Damilola', 'damilola', 'user', 2, '<p>\r\n	More...</p>\r\n', 0, 0, 0),
(3, '46a7f-20171019_090937.jpg', 'Oyeti', 'Paul', 'paul', 'user', 3, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_question`
--

CREATE TABLE `tbl_user_question` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `question_id` tinyint(4) NOT NULL,
  `answer` enum('A','B','C','D') NOT NULL,
  `status` enum('Correct','Wrong') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_question`
--
ALTER TABLE `tbl_user_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user_question`
--
ALTER TABLE `tbl_user_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
