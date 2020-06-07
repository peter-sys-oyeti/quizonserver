-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 02:47 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 'IT'),
(2, 'Finance'),
(3, 'EBU'),
(4, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `department` tinyint(11) NOT NULL,
  `question` text NOT NULL,
  `option_A` longtext NOT NULL,
  `option_B` longtext NOT NULL,
  `option_C` longtext NOT NULL,
  `option_D` longtext NOT NULL,
  `answer` enum('A','B','C','D') NOT NULL,
  `answer_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `department`, `question`, `option_A`, `option_B`, `option_C`, `option_D`, `answer`, `answer_description`) VALUES
(7, 1, '<h3>\r\n	<strong><u>The Purpose of the MTN Code of Ethics is:</u></strong></h3>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">To provide awareness on MTN ethical ideals to employees</span></a></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">To act as a guide to staff in all facets of daily decision-making.</span></a></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">To help assure clients, shareholders, suppliers, competitors and other third parties of the integrity of MTN.</span></a></strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">All of the above</span></a></strong></span></p>\r\n', 'D', '<p>\r\n	<span style=\"color:#008000;\"><strong>Option D</strong></span> is the correct answer because the Code of Ethics provide awareness to staff on MTN ethical ideals, it serves as guide that helps staff in their day to day decision making and it also assured stakeholders and other third parties about MTN&rsquo;s integrity.&nbsp;</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><strong>Option A&nbsp;</strong></span> is not the answer because apart from providing awareness to staff on MTN ethical ideals the Code of Ethics also serves as a guide to staff in their day to day decision making.</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><strong>Option B </strong></span>is not the answer because apart from serving as a guide to staff in their day to day decision making, the Code of Ethics assured stakeholders and other third parties about MTN&rsquo;s integrity.</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><strong>Option C </strong></span>is not the answer because apart from assuring stakeholder and other third parties about MTN integrity, the Code of Ethics also serves as a guide to staff in their day to day decision making.</p>\r\n'),
(8, 3, '<h3>\r\n	<span style=\"color:#000000;\"><strong><u>MTN operates a No Gift Policy due to the following reasons except:</u></strong></span></h3>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">To ensure that gift </span></a></strong></span><a><span style=\"color:#000000;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong>do</strong></span></span></a><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\"> not interfere with employees&rsquo; responsibilities</span></a><span style=\"color:#000000;\">.</span></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">To ensure that no gift is given out by employees</span></a></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">To protect employees from charges of conflict of interest</span></a></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">To avoid </span></a></strong></span><a><span style=\"color:#000000;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong>unjustifiable</strong></span></span></a><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\"> perception of bias against employees</span></a></strong></span></p>\r\n', 'B', '<p>\r\n	<span style=\"color:#008000;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong>Option B</strong></span></span> is the correct answer because the Gift Policy does not prevent employees from giving gifts out. However, there are conditions that must be satisfied.</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong>Option A</strong></span></span> is not the correct answer because one of the rationale for the MTN No Gift Policy is to ensure that gift do not interfere with employees&rsquo; responsibilities or influence staff decisions.</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong>Option C </strong></span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\">is not the correct answer because </span></span><span style=\"font-family:tahoma,geneva,sans-serif;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\">conflict</span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\"> of interest may arise where </span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\">a staff</span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\"> has divided loyalty (i.e. loyalty to MTN and loyalty to the third party that provide </span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\">a staff</span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\"> with </span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\">lavish</span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\"> gift. Therefore, protecting employees from </span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\">conflict</span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\"> of interest situation is one of the main reason </span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\">of</span></span></span><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#000000;\"> the No Gift Policy.</span></span></p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong>Option D </strong></span></span>is not the correct answer because receiving a gift from a third party and then making official decision in favor of the said third party may lead to the perception of bias in favor of the third party by a staff. One of the reason of the No Gift Policy is to avoid such perception of bias.&nbsp;</p>\r\n'),
(9, 2, '<h3>\r\n	<span style=\"color:#000000;\"><strong><u>MTN Code of Ethics is binding on: </u></strong></span></h3>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">The directors of the company only.</span></a></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">The directors, employees and stakeholders.</span></a></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">The employees of the company only</span></a></strong></span></p>\r\n', '<p>\r\n	<span style=\"font-family:tahoma,geneva,sans-serif;\"><strong><a><span style=\"color:#000000;\">Both directors and employees</span></a></strong></span></p>\r\n', 'B', '<p>\r\n	<span style=\"color:#008000;\"><span style=\"font-family:tahoma,geneva,sans-serif;\"><strong>Option B</strong></span></span> is the correct answer the Code of Ethics is binding on directors of the company, the employees and all other stakeholder. Compliance with the Code is mandatory on all the aforementioned.</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><strong><span style=\"font-family:tahoma,geneva,sans-serif;\">Option A</span></strong></span> is not the correct answer because the Code of Ethics is not binding on directors of the company only. The Code is also binding on employees and other stakeholders.</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><strong><span style=\"font-family:tahoma,geneva,sans-serif;\">Option C </span></strong></span>is not the correct answer because the Code of Ethics is not binding on employees only. The Code is also binding the directors and other stakeholders also.</p>\r\n<p>\r\n	<span style=\"color:#ff0000;\"><strong><span style=\"font-family:tahoma,geneva,sans-serif;\">Option D </span></strong></span>is not the correct answer because the Code of Ethics is not binding on directors of the company and employees only. The Code is also binding on all other stakeholders also.</p>\r\n'),
(10, 1, '<h3 style=\"font-size: 24px !important; line-height: 26.4px !important;\">\r\n	<span style=\"color: rgb(0, 0, 0); font-size: 24px !important; line-height: 26.4px !important;\"><strong style=\"font-size: 24px !important; line-height: 26.4px !important;\"><u style=\"font-size: 24px !important; line-height: 26.4px !important;\">MTN operates a No Gift Policy due to the following reasons except:</u></strong></span></h3>\r\n', '<p>\r\n	<span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">To ensure that gift </span></a></strong></span><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\">do</strong></span></span></a><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> not interfere with employees&rsquo; responsibilities.</span></a></strong></span></p>\r\n', '<div class=\"form-display-as-box\" id=\"option_B_display_as_box\" style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n	<span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">To ensure that no gift is given out by employees.</span></a></strong></span></div>\r\n', '<div class=\"form-input-box\" id=\"option_C_input_box\" style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n	<div class=\"readonly_label\" id=\"field-option_C\" style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n		<p style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n			<span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">To protect employees from charges of conflict of interest.</span></a></strong></span></p>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '<div class=\"form-input-box\" id=\"option_D_input_box\" style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n	<div class=\"readonly_label\" id=\"field-option_D\" style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n		<p style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n			<span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">To avoid </span></a></strong></span><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\">unjustifiable</strong></span></span></a><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><a style=\"font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> perception of bias against employees.</span></a></strong></span></p>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'B', '<div class=\"form-input-box\" id=\"answer_description_input_box\" style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n	<div class=\"readonly_label\" id=\"field-answer_description\" style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n		<p style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n			<span style=\"color: rgb(0, 128, 0); font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\">Option B</strong></span></span> is the correct answer because the Gift Policy does not prevent employees from giving gifts out. However, there are conditions that must be satisfied.</p>\r\n		<p style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n			<span style=\"color: rgb(255, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\">Option A</strong></span></span> is not the correct answer because one of the rationale for the MTN No Gift Policy is to ensure that gift do not interfere with employees&rsquo; responsibilities or influence staff decisions.</p>\r\n		<p style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n			<span style=\"color: rgb(255, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\">Option C </strong></span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">is not the correct answer because </span></span><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">conflict</span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> of interest may arise where </span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">a staff</span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> has divided loyalty (i.e. loyalty to MTN and loyalty to the third party that provide </span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">a staff</span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> with </span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">lavish</span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> gift. Therefore, protecting employees from </span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">conflict</span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> of interest situation is one of the main reason </span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\">of</span></span></span><span style=\"font-family: arial, helvetica, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"color: rgb(0, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"> the No Gift Policy.</span></span></p>\r\n		<p style=\"font-size: 15px !important; line-height: 21.4333px !important;\">\r\n			<span style=\"color: rgb(255, 0, 0); font-size: 15px !important; line-height: 21.4333px !important;\"><span style=\"font-family: tahoma, geneva, sans-serif; font-size: 15px !important; line-height: 21.4333px !important;\"><strong style=\"font-size: 15px !important; line-height: 21.4333px !important;\">Option D </strong></span></span>is not the correct answer because receiving a gift from a third party and then making official decision in favor of the said third party may lead to the perception of bias in favor of the third party by a staff. One of the reason of the No Gift Policy is to avoid such perception of bias.</p>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(11, 4, '<p>\r\n	MTN Group<br />\r\n	Terms &amp; Conditions<br />\r\n	<br />\r\n	1. Acceptance of Terms &amp; Conditions &ndash; warranty of capacity to contract<br />\r\n	<br />\r\n	Use of this website is entirely at your own risk.<br />\r\n	<br />\r\n	This website (www.mtn.com) is made available to you by Mobile Telephone Networks (Proprietary) Limited (&ldquo;MTN&rdquo;) conditional upon your acceptance, without modification, of these Terms and Conditions as amended from time to time.<br />\r\n	<br />\r\n	The Terms and Conditions set out below apply to every person who uses, accesses, refers to or views this website (&ldquo;you&rdquo; or &ldquo;your&rdquo;). Your access to and use of this website constitutes your agreement to and acceptance of these Terms and Conditions.<br />\r\n	<br />\r\n	You hereby warrant to MTN that you have the required legal capacity to enter into and be bound by a contract. Minors must be assisted by their legal guardians when reading these Terms and Conditions. If you are unsure whether you have the legal capacity to enter into contracts, please ask someone to assist you with this information before continuing to use this website. If you do not agree with any provision contained in these Terms and Conditions, please stop using or accessing this website immediately.</p>\r\n', '<p>\r\n	Yes and Accept Terms</p>\r\n', '<p>\r\n	No and Decline Terms</p>\r\n', '<p>\r\n	Yes but Have Questions</p>\r\n', '<p>\r\n	No, because i dont understand why we need this done</p>\r\n', 'A', '<p>\r\n	Thank you for Accepting the Terms and Agreements.</p>\r\n<p>\r\n	For Members of staff that declined or have questions, kindly send a mail to hrhelpdesk@mtn.com</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	HR Team</p>\r\n');

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
(1, '4b62d-login-user-icon.png', 'Oyeti', 'Peace', 'peace', 'user', 1, '<p>\r\n	More...</p>\r\n', 2, 2, 100),
(2, '990ba-login-user-icon.png', 'Wole', 'Damilola', 'damilola', 'user', 2, '<p>\r\n	More...</p>\r\n', 0, 0, 0),
(3, 'a6ec0-login-user-icon.png', 'Oyeti', 'Paul', 'paul', 'user', 3, '', 0, 0, 0),
(4, '442e4-profile_picture.png', 'Adebanjo', 'Abeeb', 'abeeba', 'olaMIde@89', 1, '', 0, 0, 0),
(5, '30a43-442e4-profile_picture.png', 'Oyede', 'Oluseye', 'olusoye', 'oyede@2019', 4, '', 0, 0, 0);

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
-- Dumping data for table `tbl_user_question`
--

INSERT INTO `tbl_user_question` (`id`, `user_id`, `question_id`, `answer`, `status`) VALUES
(1, 1, 7, 'B', 'Wrong'),
(2, 1, 7, 'D', 'Correct'),
(3, 1, 10, 'B', 'Correct');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_question`
--
ALTER TABLE `tbl_user_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
