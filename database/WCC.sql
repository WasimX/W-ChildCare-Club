-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 01:21 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `ID` int(6) NOT NULL,
  `item_name` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `management_ID` int(6) DEFAULT NULL,
  `purchase_from` varchar(30) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `s/n` varchar(30) DEFAULT NULL,
  `condition` varchar(4) DEFAULT NULL,
  `warrenty` varchar(20) DEFAULT NULL,
  `worth` int(10) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `Child_ID` int(6) DEFAULT NULL,
  `subjects_ID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `ID` int(6) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `med_desc` varchar(250) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `ethnicity` varchar(20) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `sp_needs` varchar(250) DEFAULT NULL,
  `date_joined` date NOT NULL,
  `photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child_parent`
--

CREATE TABLE `child_parent` (
  `Parent_ID` int(6) DEFAULT NULL,
  `Child_ID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_m`
--

CREATE TABLE `expenses_m` (
  `ID` int(6) NOT NULL,
  `purchase_from` varchar(20) DEFAULT NULL,
  `purchase_date` date NOT NULL,
  `management_ID` int(6) DEFAULT NULL,
  `payment_method` varchar(10) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_s`
--

CREATE TABLE `expenses_s` (
  `ID` int(6) NOT NULL,
  `purchase_from` varchar(20) DEFAULT NULL,
  `purchase_date` date NOT NULL,
  `staff_ID` int(6) DEFAULT NULL,
  `payment_method` varchar(10) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `ID` int(6) NOT NULL,
  `Parent_ID` int(6) DEFAULT NULL,
  `Child_ID` int(6) DEFAULT NULL,
  `payee_type` varchar(20) DEFAULT NULL,
  `tdate` date NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL,
  `sort_code` varchar(8) DEFAULT NULL,
  `ac_no` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `ID` int(6) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `pLevel` int(1) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `Em_number` int(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `NI` varchar(9) DEFAULT NULL,
  `DBS_no` varchar(3) DEFAULT NULL,
  `hourly_pay` int(5) DEFAULT NULL,
  `date_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `ID` int(6) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `pLevel` int(1) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `home_no` int(11) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `Em_number` int(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `sort_code` varchar(8) DEFAULT NULL,
  `ac_no` int(8) DEFAULT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent_staff`
--

CREATE TABLE `parent_staff` (
  `Staff_ID` int(6) DEFAULT NULL,
  `Parent_ID` int(6) DEFAULT NULL,
  `date_chat` date NOT NULL,
  `attendence` varchar(500) DEFAULT NULL,
  `behaviour` varchar(500) DEFAULT NULL,
  `progress` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary_m`
--

CREATE TABLE `salary_m` (
  `ID` int(6) NOT NULL,
  `management_ID` int(6) DEFAULT NULL,
  `hours` int(2) DEFAULT NULL,
  `tdate` date NOT NULL,
  `method` varchar(10) DEFAULT NULL,
  `period` varchar(10) DEFAULT NULL,
  `overtime` int(2) DEFAULT NULL,
  `NI` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary_s`
--

CREATE TABLE `salary_s` (
  `ID` int(6) NOT NULL,
  `staff_ID` int(6) DEFAULT NULL,
  `hours` int(2) DEFAULT NULL,
  `tdate` date NOT NULL,
  `method` varchar(10) DEFAULT NULL,
  `period` varchar(10) DEFAULT NULL,
  `overtime` int(2) DEFAULT NULL,
  `NI` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(6) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `pLevel` int(1) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `Em_number` int(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `NI` varchar(9) DEFAULT NULL,
  `DBS_no` varchar(3) DEFAULT NULL,
  `hourly_pay` int(5) DEFAULT NULL,
  `date_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(6) NOT NULL,
  `subject_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `staff_ID` int(6) DEFAULT NULL,
  `subjects_ID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `management_ID` (`management_ID`);

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD KEY `Child_ID` (`Child_ID`),
  ADD KEY `subjects_ID` (`subjects_ID`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `child_parent`
--
ALTER TABLE `child_parent`
  ADD KEY `Parent_ID` (`Parent_ID`),
  ADD KEY `Child_ID` (`Child_ID`);

--
-- Indexes for table `expenses_m`
--
ALTER TABLE `expenses_m`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `management_ID` (`management_ID`);

--
-- Indexes for table `expenses_s`
--
ALTER TABLE `expenses_s`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `staff_ID` (`staff_ID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Parent_ID` (`Parent_ID`),
  ADD KEY `Child_ID` (`Child_ID`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parent_staff`
--
ALTER TABLE `parent_staff`
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `Parent_ID` (`Parent_ID`);

--
-- Indexes for table `salary_m`
--
ALTER TABLE `salary_m`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `management_ID` (`management_ID`);

--
-- Indexes for table `salary_s`
--
ALTER TABLE `salary_s`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `staff_ID` (`staff_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD KEY `staff_ID` (`staff_ID`),
  ADD KEY `subjects_ID` (`subjects_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_m`
--
ALTER TABLE `expenses_m`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_s`
--
ALTER TABLE `expenses_s`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_m`
--
ALTER TABLE `salary_m`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_s`
--
ALTER TABLE `salary_s`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`management_ID`) REFERENCES `management` (`ID`);

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`Child_ID`) REFERENCES `child` (`ID`),
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`subjects_ID`) REFERENCES `subjects` (`ID`);

--
-- Constraints for table `child_parent`
--
ALTER TABLE `child_parent`
  ADD CONSTRAINT `child_parent_ibfk_1` FOREIGN KEY (`Parent_ID`) REFERENCES `parent` (`ID`),
  ADD CONSTRAINT `child_parent_ibfk_2` FOREIGN KEY (`Child_ID`) REFERENCES `child` (`ID`);

--
-- Constraints for table `expenses_m`
--
ALTER TABLE `expenses_m`
  ADD CONSTRAINT `expenses_m_ibfk_1` FOREIGN KEY (`management_ID`) REFERENCES `management` (`ID`);

--
-- Constraints for table `expenses_s`
--
ALTER TABLE `expenses_s`
  ADD CONSTRAINT `expenses_s_ibfk_1` FOREIGN KEY (`staff_ID`) REFERENCES `staff` (`ID`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`Parent_ID`) REFERENCES `parent` (`ID`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`Child_ID`) REFERENCES `child` (`ID`);

--
-- Constraints for table `parent_staff`
--
ALTER TABLE `parent_staff`
  ADD CONSTRAINT `parent_staff_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`ID`),
  ADD CONSTRAINT `parent_staff_ibfk_2` FOREIGN KEY (`Parent_ID`) REFERENCES `parent` (`ID`);

--
-- Constraints for table `salary_m`
--
ALTER TABLE `salary_m`
  ADD CONSTRAINT `salary_m_ibfk_1` FOREIGN KEY (`management_ID`) REFERENCES `management` (`ID`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`staff_ID`) REFERENCES `staff` (`ID`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`subjects_ID`) REFERENCES `subjects` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
