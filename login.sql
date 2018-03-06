-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 02:15 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `uid` int(50) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `user_type` varchar(30) DEFAULT NULL,
  `add_date` varchar(20) NOT NULL DEFAULT 'Not Available',
  `add_time` varchar(20) NOT NULL DEFAULT 'Not Available'
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`uid`, `username`, `name`, `password`, `user_type`, `add_date`, `add_time`) VALUES
(109, '013himanshu', 'Himanshu Kumawat', 'hello', 'superuser', '2017-04-03', '01:43pm'),
(119, 'test', 'test', 'sdfsdf', 'superuser', '2017-04-04', '12:40pm'),
(120, 'jojo', 'jojo', 'jjojo', 'user', '2017-04-04', '12:54pm'),
(121, 'momo', 'new momo', 'momo1', 'superuser', '2017-04-04', '12:54pm');

-- --------------------------------------------------------

--
-- Table structure for table `cgpa`
--

CREATE TABLE IF NOT EXISTS `cgpa` (
  `RegistrationNo` int(10) NOT NULL,
  `CGPA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgpa`
--

INSERT INTO `cgpa` (`RegistrationNo`, `CGPA`) VALUES
(159105058, 8),
(159109106, 6);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `DepId` int(11) unsigned NOT NULL,
  `DepName` varchar(20) NOT NULL,
  `add_date` varchar(10) DEFAULT NULL,
  `add_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DepId`, `DepName`, `add_date`, `add_time`) VALUES
(1, 'SCIT', NULL, NULL),
(2, 'SCCE', NULL, NULL),
(3, 'SAMM', NULL, NULL),
(4, 'SEEC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `electivealloted`
--

CREATE TABLE IF NOT EXISTS `electivealloted` (
  `Rg_No` int(11) NOT NULL DEFAULT '0',
  `SubjectAlloted` varchar(50) DEFAULT NULL,
  `add_date` varchar(10) DEFAULT NULL,
  `add_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electivealloted`
--

INSERT INTO `electivealloted` (`Rg_No`, `SubjectAlloted`, `add_date`, `add_time`) VALUES
(159105046, 'cv1056 Nan', NULL, NULL),
(159105058, 'cv1056 Nan', NULL, NULL),
(159105190, 'cv1056 Nan', NULL, NULL),
(159105200, 'CV1324 MECH', NULL, NULL),
(159105235, 'CV1324 MEC', NULL, NULL),
(159109106, 'cv1045 NSS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oechoice`
--

CREATE TABLE IF NOT EXISTS `oechoice` (
  `oeid` int(11) unsigned NOT NULL,
  `oename` varchar(20) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `Department` varchar(20) DEFAULT NULL,
  `add_date` varchar(10) DEFAULT NULL,
  `add_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oechoice`
--

INSERT INTO `oechoice` (`oeid`, `oename`, `Semester`, `Department`, `add_date`, `add_time`) VALUES
(1, 'cv1011 Java', 3, 'SCIT', NULL, NULL),
(2, 'cv1022 Android', 3, 'SCIT', NULL, NULL),
(3, 'cv1021 PHE', 3, 'SCCE', NULL, NULL),
(4, 'cv1045 NSS', 3, 'SCCE', NULL, NULL),
(5, 'cv1056 Nano', 3, 'SAMM', NULL, NULL),
(6, 'CV1324 MECH', 3, 'SCCE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `SemID` int(11) unsigned NOT NULL,
  `Semester` int(11) NOT NULL,
  `add_date` varchar(10) DEFAULT NULL,
  `add_time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemID`, `Semester`, `add_date`, `add_time`) VALUES
(1, 3, NULL, NULL),
(2, 4, NULL, NULL),
(3, 5, NULL, NULL),
(4, 6, NULL, NULL),
(6, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE IF NOT EXISTS `studentinfo` (
  `RegistrationNo` int(11) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Semester` int(11) NOT NULL,
  `OE1` varchar(50) NOT NULL,
  `OE2` varchar(50) NOT NULL,
  `OE3` varchar(50) NOT NULL,
  `OE4` varchar(50) NOT NULL,
  `OE5` varchar(50) NOT NULL,
  `OE6` varchar(50) NOT NULL,
  `CGPA` double NOT NULL,
  `EntryTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`RegistrationNo`, `Department`, `Semester`, `OE1`, `OE2`, `OE3`, `OE4`, `OE5`, `OE6`, `CGPA`, `EntryTime`) VALUES
(159105045, 'SCIT', 3, 'cv1045 NSS', 'CV1324 MECH', 'cv1056 Nano', 'cv4252 dsfwsg', 'CV4535 TRWH', 'CV3563 ADFAF', 8.5, '2017-04-02 11:02:35'),
(159105046, 'SCIT', 3, 'cv1056 Nano', 'CV4535 TRWH', 'CV1324 MECH', 'cv1021 PHE', 'cv4252 dsfwsg', 'CV3563 ADFAF', 9.5, '2017-04-02 11:03:09'),
(159105058, 'SCIT', 3, 'cv1056 Nano', 'cv1045 NSS', 'CV1324 MECH', 'cv4252 dsfwsg', 'CV4535 TRWH', 'CV3563 ADFAF', 7.5, '2017-04-02 11:03:45'),
(159109106, 'SCIT', 3, 'cv1045 NSS', 'CV1324 MECH', 'cv1056 Nano', 'CV3563 ADFAF', 'cv1021 PHE', 'cv4252 dsfwsg', 7, '2017-04-02 11:04:18'),
(151004010, 'SCIT', 3, 'cv1021 PHE', 'cv1056 Nano', 'cv1045 NSS', 'CV1324 MECH', 'CV4535 TRWH', 'cv4252 dsfwsg', 8, '2017-04-02 15:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `studentinforanked`
--

CREATE TABLE IF NOT EXISTS `studentinforanked` (
  `RegistrationNo` int(11) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Semester` int(11) NOT NULL,
  `OE1` varchar(50) NOT NULL,
  `OE2` varchar(50) NOT NULL,
  `OE3` varchar(50) NOT NULL,
  `OE4` varchar(50) NOT NULL,
  `OE5` varchar(50) NOT NULL,
  `OE6` varchar(50) NOT NULL,
  `CGPA` decimal(4,2) NOT NULL,
  `EntryTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinforanked`
--

INSERT INTO `studentinforanked` (`RegistrationNo`, `Department`, `Semester`, `OE1`, `OE2`, `OE3`, `OE4`, `OE5`, `OE6`, `CGPA`, `EntryTime`) VALUES
(159105046, 'SCIT', 3, 'cv1056 Nano', 'CV4535 TRWH', 'CV1324 MECH', 'cv1021 PHE', 'cv4252 dsfwsg', 'CV3563 ADFAF', '9.50', '2017-04-02 11:03:09'),
(159105045, 'SCIT', 3, 'cv1045 NSS', 'CV1324 MECH', 'cv1056 Nano', 'cv4252 dsfwsg', 'CV4535 TRWH', 'CV3563 ADFAF', '8.50', '2017-04-02 11:02:35');

--
-- Triggers `studentinforanked`
--
DELIMITER $$
CREATE TRIGGER `trg_insert2` AFTER INSERT ON `studentinforanked`
 FOR EACH ROW BEGIN
declare RN int default 0;
declare Elective varchar(50) default ' ';
declare seatsfilled numeric(10) default 0;
select NEW.RegistrationNo into RN;
select NEW.OE1 into Elective;
select SeatsAllotted into seatsfilled from SubSeatPosition where sub_code = Elective ;
if (seatsfilled <=59 )  then begin
	insert into ElectiveAlloted (Rg_No, SubjectAlloted) values(RN, Elective);
       	set seatsfilled =  seatsfilled +1;
	update SubSeatPosition set SeatsAllotted = seatsfilled where sub_code = Elective ;
	end;
else begin
    select NEW.OE2 into Elective;
   select SeatsAllotted into seatsfilled from SubSeatPosition where sub_code = Elective ;
    if (seatsfilled <=59)  then begin
		insert into ElectiveAlloted (Rg_No, SubjectAlloted) values(RN, Elective);
                             set seatsfilled =  seatsfilled +1;
		update SubSeatPosition set SeatsAllotted = seatsfilled where sub_code = Elective ;
		end;
 else begin
       select NEW.OE3 into Elective;
      select SeatsAllotted into seatsfilled from SubSeatPosition where sub_code = Elective ;
      if (seatsfilled <=59)  then begin
		insert into ElectiveAlloted (Rg_No, SubjectAlloted) values(RN, Elective);
                             set seatsfilled =  seatsfilled +1;
		update SubSeatPosition set SeatsAllotted = seatsfilled where sub_code = Elective ;
		end;
     else begin
            select NEW.OE4 into Elective;
            select SeatsAllotted into seatsfilled from SubSeatPosition where sub_code = Elective ;
            if (seatsfilled <=59)  then begin
		insert into ElectiveAlloted (Rg_No, SubjectAlloted) values(RN, Elective);
                             set seatsfilled =  seatsfilled +1;
		update SubSeatPosition set SeatsAllotted = seatsfilled where sub_code = Elective ;
		end;
          else begin
                   select NEW.OE5 into Elective;
                   select SeatsAllotted into seatsfilled from SubSeatPosition where sub_code = Elective ;
                     if (seatsfilled <=59)  then begin
		insert into ElectiveAlloted (Rg_No, SubjectAlloted) values(RN, Elective);
                             set seatsfilled =  seatsfilled +1;
		update SubSeatPosition set SeatsAllotted = seatsfilled where sub_code = Elective ;
		end;
                     else begin
        select NEW.OE6 into Elective;
        select SeatsAllotted into seatsfilled from SubSeatPosition where sub_code = Elective ;
        insert into ElectiveAlloted (Rg_No, SubjectAlloted) values(RN, Elective);
        set seatsfilled =  seatsfilled +1;
       update SubSeatPosition set SeatsAllotted = seatsfilled where sub_code = Elective ;
                             end;
                  end if;
          end;
 end if;
end;
end if;
end;
end if;
end;
end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subseatposition`
--

CREATE TABLE IF NOT EXISTS `subseatposition` (
  `sub_code` varchar(50) DEFAULT NULL,
  `SeatsAllotted` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subseatposition`
--

INSERT INTO `subseatposition` (`sub_code`, `SeatsAllotted`) VALUES
(' cv1056 Nano', '0'),
('cv1045 NSS', '2'),
('CV1324 MECH', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `CGPA` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `CGPA`) VALUES
('151004005', 'hellonew', '7.00'),
('151004010', 'yash1', '7.50'),
('151004012', 'hello', '9.00'),
('159105058', 'yash1', '8.00'),
('159108888', 'yash3', '8.00'),
('159109105', 'yash2', '8.20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cgpa`
--
ALTER TABLE `cgpa`
  ADD PRIMARY KEY (`RegistrationNo`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepId`), ADD UNIQUE KEY `DepName` (`DepName`);

--
-- Indexes for table `electivealloted`
--
ALTER TABLE `electivealloted`
  ADD PRIMARY KEY (`Rg_No`);

--
-- Indexes for table `oechoice`
--
ALTER TABLE `oechoice`
  ADD PRIMARY KEY (`oeid`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SemID`), ADD UNIQUE KEY `Semester` (`Semester`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `uid` int(50) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DepId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oechoice`
--
ALTER TABLE `oechoice`
  MODIFY `oeid` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `SemID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
