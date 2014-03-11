SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_management`
--

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------



--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `status_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `project_status_FK` FOREIGN KEY (`status_ID`) REFERENCES `status` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_part`
--

CREATE TABLE IF NOT EXISTS `work_part` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `status_ID` int(11) NOT NULL,
  `project_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT work_part_status_FK FOREIGN KEY (status_ID) REFERENCES status(ID),
  CONSTRAINT work_part_project_FK FOREIGN KEY (project_ID) REFERENCES project(ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID`, `role_name`) VALUES
(1, 'Project Manager'),
(2, 'Worker');

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_temp` varchar(60) DEFAULT NULL,
  `role_ID` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `users_role_FK` FOREIGN KEY (`role_ID`) REFERENCES `role` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `password`, `password_temp`, `role_ID`, `created_at`, `updated_at`) VALUES
(2, 'Halldór Smári', 'Arnarson', 'halldorsa@gmail.com', '$2y$10$0vd3NxpaemiyEUMmMaHGIeE8MOvrrBYQVDPE.GuGFHyiSJQWF9jBG', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Alexander', 'Leó', 'halldor2810@hotmail.com', '$2y$10$OIcFs1AkEHfxVl/S2cV5ju7A12g2R0rtqgLNN3huGhho3mUsW/FRW', NULL, 2, '2014-03-08 01:20:47', '2014-03-08 01:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `work_part_ID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `user_ID` int(11) NOT NULL,
  `report` text NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `report_work_part_FK` FOREIGN KEY (`work_part_ID`) REFERENCES `work_part` (`ID`),
  CONSTRAINT `report_users_FK` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;