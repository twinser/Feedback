-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2014 at 02:30 PM
-- Server version: 5.5.36-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nk011269_Feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `DegreeCourse`
--

CREATE TABLE IF NOT EXISTS `DegreeCourse` (
  `DegreeID` int(2) NOT NULL AUTO_INCREMENT,
  `DegreeName` varchar(40) NOT NULL,
  PRIMARY KEY (`DegreeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `DegreeCourse`
--

INSERT INTO `DegreeCourse` (`DegreeID`, `DegreeName`) VALUES
(1, 'BSc Artificial Intelligence'),
(2, 'MEng Artificial Intelligence'),
(3, 'BSc Computer Science'),
(4, 'BSc Cybernetics'),
(5, 'MEng Cybernetics'),
(6, 'BEng Electronic Engineering'),
(7, 'MEng Electronic Engineering'),
(8, 'BSc Information Technology'),
(9, 'BSc Robotics'),
(10, 'MEng Robotics');

-- --------------------------------------------------------

--
-- Table structure for table `DetailedResponses`
--

CREATE TABLE IF NOT EXISTS `DetailedResponses` (
  `ResponseID` int(9) NOT NULL AUTO_INCREMENT,
  `QuizID` int(6) NOT NULL,
  `DateWritten` date NOT NULL,
  `DegreeID` int(2) DEFAULT NULL,
  `Response` text NOT NULL,
  PRIMARY KEY (`ResponseID`),
  KEY `QuizID` (`QuizID`),
  KEY `DegreeID` (`DegreeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `DetailedResponses`
--

INSERT INTO `DetailedResponses` (`ResponseID`, `QuizID`, `DateWritten`, `DegreeID`, `Response`) VALUES
(1, 3, '2014-01-15', NULL, 'wonderful'),
(2, 1, '2014-02-23', NULL, 'j'),
(3, 1, '2014-02-25', NULL, 'Testing, 123'),
(4, 1, '2014-03-13', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ligula tortor, eleifend at dolor id, tincidunt suscipit orci. Nulla laoreet metus vel mauris sagittis sagittis. Sed tristique enim eu ligula blandit, eget vehicula orci vestibulum. Aenean vel tellus lobortis, euismod metus non, adipiscing libero. Maecenas nisi diam, accumsan id commodo nec, eleifend quis libero. Duis id nibh neque. Maecenas semper orci vitae vehicula convallis.\r\n\r\nPellentesque vulputate purus at turpis sagittis, in tempor elit congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas varius lacus ac eros condimentum tincidunt in viverra neque. Vestibulum fermentum nunc at eros vehicula porttitor. Pellentesque elementum lacinia ipsum. Ut sollicitudin commodo venenatis. Proin pharetra feugiat tortor a varius. Etiam facilisis velit odio, eu molestie orci malesuada eget. Donec volutpat augue libero, id ornare magna placerat eget. Praesent nec porta arcu. Ut vehicula, urna id viverra varius, nunc lacus tincidunt ligula, sed aliquam enim erat nec magna. Pellentesque porta vitae dolor sit amet fermentum. Nunc euismod non enim sit amet dictum.'),
(5, 1, '2014-03-28', NULL, 'blah blah blah'),
(6, 1, '2014-03-28', NULL, 'some feedback'),
(7, 1, '2014-03-28', NULL, 'more comments'),
(8, 22, '2014-03-28', NULL, 'Wonderful'),
(11, 24, '2014-04-17', NULL, 'I liked learning about mobile phones'),
(12, 5, '2014-04-24', NULL, 'You''re a comment.'),
(13, 5, '2014-04-24', NULL, 'dfgdf'),
(14, 5, '2014-04-24', NULL, 'hjgh'),
(15, 5, '2014-04-24', NULL, 'hjkhjkhj'),
(16, 5, '2014-04-24', NULL, 'Test12345'),
(17, 5, '2014-04-24', NULL, 'blah'),
(18, 5, '2014-04-24', NULL, 'gjhgkjhgjj,kjk,nk,n.knk.n.k,m'),
(19, 5, '2014-04-24', NULL, 'Yes no answers a bit blunt? Graduate 1 to 5 ?'),
(20, 5, '2014-04-24', NULL, 'Done on my phone, works on an iPhone :)'),
(21, 5, '2014-04-24', NULL, 'Great '),
(22, 5, '2014-04-24', NULL, 'I think the module was good, but more personal interaction between lecturer and student would be better as I don''t feel very supported when having trouble with certain aspects of the module'),
(23, 5, '2014-04-30', NULL, 'i loved it ----- Â£$Â£$Â£$');

-- --------------------------------------------------------

--
-- Table structure for table `Modules`
--

CREATE TABLE IF NOT EXISTS `Modules` (
  `ModuleCode` varchar(7) NOT NULL,
  `ModuleName` varchar(100) NOT NULL,
  `ModuleConvenor` varchar(100) NOT NULL,
  PRIMARY KEY (`ModuleCode`),
  UNIQUE KEY `ModuleCode` (`ModuleCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Modules`
--

INSERT INTO `Modules` (`ModuleCode`, `ModuleName`, `ModuleConvenor`) VALUES
('SE1CA11', 'Computer Applications', 'Ben Potter'),
('SE1CC11', 'Cybernetics and Circuits', 'Richard Mitchell'),
('SE1EA11', 'Enterprise, Architecture and eBusiness Systems', 'Guy Haworth'),
('SE1EM11', 'Engineering Mathematics', 'William Holderbaum'),
('SE1FC11', 'Fundamentals of Computing', 'James Anderson'),
('SE1MC12', 'Maths for Computer Science', 'Ben Cosh'),
('SE1PR11', 'Programming', 'James Ferryman'),
('SE1SE11', 'Software Engineering', 'Rachel McCrindle'),
('SE2BP11', 'Business Programming', 'Karsten Oster Lundqvist'),
('SE2BS11', 'Business Systems Applications', 'Kenneth Boness'),
('SE2CA11', 'Computer Architecture', 'Hong Wei'),
('SE2CO11', 'Compilers', 'James Anderson'),
('SE2CS11', 'Control Systems', 'Victor Becerra'),
('SE2DB11', 'Databases', 'Liz Victor'),
('SE2EA11', 'Essential Algorithms', 'Muniyappa Manjunathaiah'),
('SE2EM11', 'Embedded Microprocessors and Digital Systems', 'Oswaldo Cadenas'),
('SE2FD11', 'Advanced Databases', 'Liz Victor'),
('SE2HA11', 'HCI and Applications', 'Karsten Oster Lundqvist'),
('SE2JA11', 'Java', 'Karsten Oster Lundqvist'),
('SE2MI11', 'Machine Intelligence', 'Xia Hong'),
('SE2NE11', 'Neuroscience', 'Slawomir Nasuto'),
('SE2NN11', 'Neural Networks', 'Richard Mitchell'),
('SE2OS11', 'Operating Systems', 'Muniyappa Manjunathaiah'),
('SE2PL11', 'Programmable Logic and HDLs', 'Oswaldo Cadenas'),
('SE2RM11', 'Robots and Mechanics', 'William Harwin'),
('SE2RS11', 'Robotic Systems', 'Simon Sherratt'),
('SE2SD11', 'Sensors and Devices', 'John Bowen'),
('SE2SM11', 'Systems Design and Project Management', 'Lily Sun'),
('SE2SP11', 'Signal Processing', 'Sillas Hadjiloucas'),
('SE2TE11', 'Telecommunications', 'Chris Guy'),
('TESTING', 'User Testing', 'Thomas Winser');

-- --------------------------------------------------------

--
-- Table structure for table `QuizResponses`
--

CREATE TABLE IF NOT EXISTS `QuizResponses` (
  `ResponseID` int(9) NOT NULL AUTO_INCREMENT,
  `QuizID` int(6) NOT NULL,
  `DateTaken` date NOT NULL,
  `DegreeID` int(2) DEFAULT NULL,
  `Q1` int(1) NOT NULL,
  `Q2` int(1) NOT NULL,
  `Q3` int(1) NOT NULL,
  `Q4` int(1) NOT NULL,
  `Q5` int(1) NOT NULL,
  `Q6` int(1) NOT NULL,
  `Q7` int(1) NOT NULL,
  `Q7b` int(1) DEFAULT NULL,
  `Q8` int(1) NOT NULL,
  `Q8b` int(1) DEFAULT NULL,
  `Q9` int(1) NOT NULL,
  `Q9b` int(1) DEFAULT NULL,
  `Q9c` int(1) DEFAULT NULL,
  `Q10` int(1) DEFAULT NULL,
  PRIMARY KEY (`ResponseID`),
  KEY `QuizID` (`QuizID`),
  KEY `DegreeID` (`DegreeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `QuizResponses`
--

INSERT INTO `QuizResponses` (`ResponseID`, `QuizID`, `DateTaken`, `DegreeID`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q7b`, `Q8`, `Q8b`, `Q9`, `Q9b`, `Q9c`, `Q10`) VALUES
(2, 1, '0000-00-00', NULL, 4, 1, 3, 3, 4, 1, 2, 0, 2, 0, 2, 0, 0, 0),
(3, 1, '2013-11-14', NULL, 4, 1, 3, 3, 4, 1, 2, 0, 2, 0, 2, 0, 0, 0),
(4, 1, '2013-11-14', NULL, 4, 1, 3, 3, 4, 1, 2, 0, 2, 0, 2, 0, 0, 0),
(9, 1, '2013-11-14', NULL, 3, 1, 3, 2, 1, 1, 2, 0, 2, 0, 2, 0, 0, 3),
(10, 2, '2013-11-14', NULL, 4, 1, 3, 3, 3, 1, 1, 1, 1, 1, 2, 0, 0, 0),
(11, 1, '2013-11-15', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 1, '2013-11-15', NULL, 1, 1, 5, 3, 1, 1, 2, 0, 2, 0, 2, 0, 0, 3),
(13, 1, '2013-11-15', NULL, 1, 1, 5, 3, 1, 1, 2, NULL, 2, 0, 2, 0, 0, 3),
(14, 1, '2013-11-15', NULL, 3, 1, 2, 2, 2, 1, 1, 1, 2, 0, 2, 0, 0, 2),
(15, 1, '2013-11-15', NULL, 3, 1, 2, 2, 2, 1, 1, 1, 2, NULL, 2, NULL, NULL, 2),
(16, 1, '2013-11-19', NULL, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0),
(17, 1, '2013-11-19', NULL, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0),
(18, 1, '2013-11-21', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 2, NULL, 2, NULL, NULL, 3),
(19, 1, '2013-11-21', NULL, 3, 1, 3, 3, 3, 1, 2, NULL, 2, NULL, 2, NULL, NULL, 3),
(20, 1, '2013-11-21', NULL, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0),
(21, 1, '2013-11-21', NULL, 1, 1, 3, 4, 3, 1, 1, 2, 2, NULL, 2, NULL, NULL, 2),
(22, 1, '2013-11-21', NULL, 3, 2, 4, 3, 5, 1, 2, NULL, 2, NULL, 2, NULL, NULL, 0),
(23, 1, '2013-11-21', NULL, 3, 1, 3, 2, 3, 1, 1, 1, 2, NULL, 2, NULL, NULL, 3),
(24, 1, '2013-11-21', NULL, 2, 1, 3, 4, 2, 1, 1, 1, 1, NULL, 2, NULL, NULL, 2),
(25, 1, '2013-11-21', NULL, 3, 1, 2, 2, 3, 1, 1, 1, 1, 1, 2, NULL, NULL, 2),
(26, 1, '2013-11-21', NULL, 2, 1, 3, 2, 3, 1, 1, 1, 2, NULL, 2, NULL, NULL, 1),
(27, 1, '2013-11-21', NULL, 2, 1, 2, 3, 5, 1, 1, 2, 2, NULL, 2, NULL, NULL, 3),
(28, 1, '2013-11-22', NULL, 2, 1, 3, 4, 3, 1, 1, 1, 2, NULL, 2, NULL, NULL, 3),
(29, 1, '2013-11-24', NULL, 3, 1, 2, 3, 3, 1, 1, 2, 2, NULL, 2, NULL, NULL, 3),
(30, 1, '2013-11-25', NULL, 2, 1, 3, 3, 3, 1, 1, 2, 2, NULL, 2, NULL, NULL, 3),
(31, 1, '2013-11-28', NULL, 4, 1, 4, 4, 3, 1, 1, 1, 1, 1, 1, 4, 4, 4),
(32, 1, '2013-11-28', NULL, 3, 2, 3, 2, 3, 2, 2, NULL, 2, NULL, 2, NULL, NULL, 4),
(33, 1, '2013-11-28', NULL, 3, 2, 3, 3, 3, 2, 2, NULL, 1, 1, 2, NULL, NULL, 2),
(34, 4, '2013-12-09', NULL, 3, 1, 4, 4, 3, 1, 1, 1, 1, 1, 1, 4, 5, 4),
(35, 4, '2013-12-09', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 2, NULL, 1, 4, 4, 4),
(36, 4, '2013-12-09', NULL, 3, 1, 4, 4, 4, 1, 1, 1, 1, 1, 1, 4, 4, 4),
(37, 4, '2013-12-09', NULL, 4, 1, 3, 4, 3, 1, 1, 1, 2, NULL, 1, 3, 4, 3),
(38, 4, '2013-12-09', NULL, 5, 1, 4, 4, 3, 1, 1, 1, 1, 1, 1, 4, 5, 3),
(39, 4, '2013-12-09', NULL, 2, 1, 3, 3, 3, 1, 1, 1, 1, 1, 1, 3, NULL, 3),
(40, 4, '2013-12-09', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 2, NULL, 1, 3, 3, 3),
(41, 4, '2013-12-09', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 2, NULL, 1, 3, 3, 3),
(42, 4, '2013-12-09', NULL, 3, 1, 3, 3, 3, 1, 2, NULL, 1, 1, 2, 3, 3, 3),
(43, 4, '2013-12-09', NULL, 3, 1, 3, 3, 3, 1, 2, NULL, 2, NULL, 1, 3, 3, 3),
(44, 4, '2013-12-11', NULL, 4, 1, 3, 3, 4, 2, 2, NULL, 2, NULL, 1, 3, 3, 3),
(53, 1, '2013-12-11', NULL, 1, 1, 1, 1, 1, 1, 2, NULL, 2, NULL, 1, 1, 1, 1),
(57, 2, '2014-01-03', NULL, 3, 1, 2, 3, 3, 1, 1, 1, 2, NULL, 2, NULL, NULL, 0),
(58, 3, '2014-01-15', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL),
(59, 3, '2014-01-15', NULL, 3, 1, 3, 3, 3, 1, 2, NULL, 2, NULL, 2, NULL, NULL, NULL),
(60, 3, '2014-01-15', NULL, 4, 1, 3, 4, 4, 1, 2, NULL, 1, 1, 1, 3, 3, NULL),
(63, 1, '2014-02-20', NULL, 3, 1, 2, 3, 3, 1, 1, 1, 1, 1, 1, 3, 3, 3),
(64, 1, '2014-02-23', NULL, 1, 1, 2, 3, 4, 1, 2, NULL, 1, 1, 1, 1, 2, 5),
(65, 1, '2014-02-24', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 1, 1, 1, 4, 5, 4),
(66, 1, '2014-03-25', NULL, 5, 1, 5, 5, 5, 1, 1, 1, 1, 1, 1, 5, 5, 5),
(67, 22, '2014-03-28', NULL, 4, 1, 4, 3, 3, 1, 1, 1, 1, 1, 1, 4, 4, NULL),
(68, 1, '2014-03-28', NULL, 4, 1, 4, 4, 4, 1, 2, NULL, 2, NULL, 1, 4, 5, 4),
(69, 22, '2014-03-28', NULL, 4, 1, 4, 4, 4, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL),
(72, 24, '2014-04-17', NULL, 3, 1, 4, 4, 5, 1, 1, 1, 1, 1, 2, NULL, NULL, 4),
(73, 24, '2014-04-17', NULL, 4, 1, 4, 4, 4, 1, 1, 1, 1, 2, 1, 1, 3, 3),
(75, 1, '2014-04-21', NULL, 2, 1, 3, 4, 2, 1, 1, 2, 1, 1, 1, 4, 2, 4),
(76, 5, '2014-04-24', NULL, 4, 1, 3, 4, 3, 1, 1, 1, 1, 1, 1, 4, 4, 4),
(77, 5, '2014-04-24', NULL, 1, 1, 3, 1, 3, 2, 1, 1, 2, NULL, 2, NULL, NULL, 5),
(78, 5, '2014-04-24', NULL, 1, 1, 5, 5, 2, 1, 1, 1, 1, 2, 2, NULL, NULL, 1),
(79, 5, '2014-04-24', NULL, 2, 2, 5, 2, 2, 1, 1, 1, 1, 2, 2, NULL, NULL, 3),
(80, 5, '2014-04-24', NULL, 4, 1, 5, 2, 2, 2, 2, NULL, 2, NULL, 2, NULL, NULL, 1),
(81, 5, '2014-04-24', NULL, 2, 1, 2, 1, 3, 1, 1, 1, 2, NULL, 2, NULL, NULL, 3),
(82, 5, '2014-04-24', NULL, 3, 1, 1, 5, 2, 2, 1, 2, 1, 2, 2, NULL, NULL, 5),
(83, 5, '2014-04-24', NULL, 4, 1, 4, 4, 3, 1, 1, 1, 1, 1, 2, NULL, NULL, 3),
(84, 5, '2014-04-24', NULL, 3, 1, 4, 4, 4, 1, 1, 2, 1, 1, 2, NULL, NULL, 4),
(85, 5, '2014-04-24', NULL, 3, 1, 4, 4, 5, 1, 1, 1, 1, 1, 2, NULL, NULL, 4),
(86, 5, '2014-04-24', NULL, 3, 1, 4, 3, 4, 1, 1, 1, 1, 1, 1, 4, 3, 2),
(87, 5, '2014-04-24', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 2, NULL, 1, 2, 3, 3),
(88, 5, '2014-04-24', NULL, 4, 2, 2, 1, 4, 1, 1, 1, 1, 1, 2, NULL, NULL, 2),
(89, 5, '2014-04-24', NULL, 4, 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, NULL, NULL, 3),
(90, 5, '2014-04-24', NULL, 3, 1, 3, 3, 3, 1, 1, 1, 1, 1, 2, NULL, NULL, 4),
(91, 5, '2014-04-24', NULL, 2, 2, 5, 2, 2, 1, 2, NULL, 1, 1, 2, NULL, NULL, 4),
(92, 5, '2014-04-24', NULL, 1, 2, 1, 1, 1, 2, 2, NULL, 2, NULL, 2, NULL, NULL, 1),
(93, 5, '2014-04-24', NULL, 3, 1, 3, 2, 3, 1, 1, 1, 1, 2, 2, NULL, NULL, 1),
(94, 5, '2014-04-24', NULL, 3, 1, 3, 4, 3, 1, 1, 1, 1, 1, 2, NULL, NULL, 2),
(95, 5, '2014-04-24', NULL, 1, 1, 1, 1, 1, 2, 2, NULL, 1, 2, 2, NULL, NULL, 5),
(96, 5, '2014-04-24', NULL, 3, 1, 4, 3, 4, 1, 1, 1, 1, 1, 1, 5, 4, 1),
(97, 5, '2014-04-24', NULL, 5, 1, 4, 2, 3, 1, 1, 1, 1, 1, 1, 2, 1, 4),
(98, 5, '2014-04-24', NULL, 1, 2, 5, 1, 5, 2, 2, NULL, 2, NULL, 2, NULL, NULL, 5),
(99, 5, '2014-04-24', NULL, 4, 1, 4, 4, 3, 1, 1, 1, 1, 1, 1, 4, 5, 3),
(100, 5, '2014-04-24', NULL, 1, 1, 4, 1, 3, 1, 2, NULL, 2, NULL, 2, NULL, NULL, 3),
(101, 5, '2014-04-24', NULL, 1, 1, 4, 3, 3, 1, 1, 1, 1, 1, 1, 2, 1, 2),
(102, 5, '2014-04-24', NULL, 4, 1, 4, 4, 3, 1, 1, 1, 1, 1, 1, 3, 3, 3),
(103, 5, '2014-04-24', NULL, 2, 1, 3, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 3),
(104, 5, '2014-04-24', NULL, 2, 2, 4, 3, 4, 1, 1, 1, 1, 1, 1, 3, 3, 4),
(105, 5, '2014-04-24', NULL, 4, 2, 4, 3, 3, 1, 2, NULL, 2, NULL, 1, 3, 2, 3),
(106, 5, '2014-04-24', NULL, 3, 1, 2, 2, 3, 1, 1, 1, 1, 1, 2, NULL, NULL, 4),
(107, 5, '2014-04-24', NULL, 3, 1, 2, 3, 3, 1, 1, 1, 1, 1, 2, NULL, NULL, 3),
(108, 5, '2014-04-24', NULL, 3, 1, 4, 3, 3, 1, 1, 1, 1, 1, 1, 4, 3, 4),
(109, 1, '2014-04-25', NULL, 2, 1, 1, 2, 3, 2, 2, NULL, 2, NULL, 2, NULL, NULL, 4),
(110, 1, '2014-04-25', NULL, 2, 1, 1, 2, 3, 2, 2, NULL, 2, NULL, 2, NULL, NULL, 4),
(111, 5, '2014-04-30', NULL, 3, 1, 4, 4, 4, 1, 1, 1, 1, 1, 1, 4, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Quizzes`
--

CREATE TABLE IF NOT EXISTS `Quizzes` (
  `QuizID` int(6) NOT NULL AUTO_INCREMENT,
  `ModuleID` varchar(7) NOT NULL,
  `Passphrase` varchar(25) NOT NULL,
  `Description` text NOT NULL,
  `AfterLectureQuiz` tinyint(1) DEFAULT '0',
  `DateAdded` date NOT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `LectureTopic` varchar(50) DEFAULT NULL,
  `LectureDate` date DEFAULT NULL,
  `Coursework` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`QuizID`),
  UNIQUE KEY `Passphrase` (`Passphrase`),
  KEY `ModuleID` (`ModuleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `Quizzes`
--

INSERT INTO `Quizzes` (`QuizID`, `ModuleID`, `Passphrase`, `Description`, `AfterLectureQuiz`, `DateAdded`, `ExpiryDate`, `LectureTopic`, `LectureDate`, `Coursework`) VALUES
(1, 'SE2BP11', 'BPmodule', 'Feedback for module', 0, '2013-11-04', '2014-05-31', NULL, NULL, 1),
(2, 'SE2BS11', 'BSmodule', 'Feedback for BSA module 2013', 0, '2013-11-04', '2014-01-31', NULL, NULL, 0),
(3, 'SE1CA11', 'CAlecture5', 'Lecture 5 feedback', 0, '2013-11-10', '2014-12-12', NULL, NULL, 0),
(4, 'SE2BP11', 'bpautumn13', 'For BP feedback at end of term', 0, '2013-12-09', '2013-12-16', NULL, NULL, 1),
(5, 'TESTING', 'testing', 'User testing', 0, '2014-04-24', '2999-12-31', NULL, NULL, 1),
(7, 'SE1CA11', 'calecture7', 'lecture 7 feedback', 1, '2013-12-13', '2013-12-20', 'Computers', '2013-12-13', NULL),
(8, 'SE1CA11', 'camodule', 'CA module feedback', 0, '2013-12-13', '2013-12-20', NULL, NULL, 1),
(21, 'SE1MC12', 'Maths4CS', 'Maths for CS module feedback', 0, '2014-03-28', '2014-05-31', NULL, NULL, 1),
(22, 'SE1FC11', '14foc1', 'Lecture 1 feedback', 1, '2014-03-28', '2014-04-04', 'Binary numbers', '2014-03-28', NULL),
(24, 'SE2TE11', 'telecoms2014', 'Whole module feedback for Telecoms', 0, '2014-04-17', '2014-05-30', NULL, NULL, 1),
(25, 'SE2SM11', 'SDPM2014', 'Module feedback for SE2SM11 2014', 0, '2014-04-28', '2014-07-31', NULL, NULL, 1),
(26, 'SE2FD11', 'adb7', 'SE2FD11 feedback for lec 7', 1, '2014-04-30', '2014-05-09', 'XML Schema', '2014-03-18', NULL),
(27, 'SE1FC11', 'foc1212', 'foc thing', 1, '2014-04-30', '2014-05-23', 'doesnt matter', '2014-04-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserID` varchar(8) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0',
  `Module1` varchar(7) DEFAULT NULL,
  `Module2` varchar(7) DEFAULT NULL,
  `Module3` varchar(7) DEFAULT NULL,
  `Module4` varchar(7) DEFAULT NULL,
  `Module5` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID` (`UserID`),
  KEY `Module1` (`Module1`),
  KEY `Module2` (`Module2`),
  KEY `Module3` (`Module3`),
  KEY `Module4` (`Module4`),
  KEY `Module5` (`Module5`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Password`, `Admin`, `Module1`, `Module2`, `Module3`, `Module4`, `Module5`) VALUES
('admin', 'hello', 1, NULL, NULL, NULL, NULL, NULL),
('Corbin', 'spicer', 1, NULL, NULL, NULL, NULL, NULL),
('Daren', 'Winser', 0, 'SE1CA11', 'SE1EA11', 'SE2BS11', NULL, NULL),
('Francis', 'underwood', 0, 'SE2BS11', 'SE1FC11', 'SE2TE11', 'SE1CA11', 'SE1EM11'),
('Janet', 'hello', 0, 'SE2BS11', 'SE1CA11', 'SE1PR11', 'SE2EA11', NULL),
('Nathan', 'twitchett', 0, 'SE1CA11', 'SE1CC11', 'SE1MC12', 'SE2BS11', 'SE2CS11'),
('Pat', 'yes', 0, 'SE1SE11', 'SE2BP11', NULL, NULL, NULL),
('Sam', 'sule', 0, 'SE2DB11', 'SE2FD11', NULL, NULL, NULL),
('Test', 'test', 0, 'TESTING', 'SE2BP11', 'SE1FC11', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DetailedResponses`
--
ALTER TABLE `DetailedResponses`
  ADD CONSTRAINT `DetailedResponses_ibfk_1` FOREIGN KEY (`QuizID`) REFERENCES `Quizzes` (`QuizID`),
  ADD CONSTRAINT `DetailedResponses_ibfk_2` FOREIGN KEY (`DegreeID`) REFERENCES `DegreeCourse` (`DegreeID`);

--
-- Constraints for table `QuizResponses`
--
ALTER TABLE `QuizResponses`
  ADD CONSTRAINT `QuizResponses_ibfk_1` FOREIGN KEY (`QuizID`) REFERENCES `Quizzes` (`QuizID`);

--
-- Constraints for table `Quizzes`
--
ALTER TABLE `Quizzes`
  ADD CONSTRAINT `FK_QUIZ_MODID` FOREIGN KEY (`ModuleID`) REFERENCES `Modules` (`ModuleCode`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `FK_Mod1` FOREIGN KEY (`Module1`) REFERENCES `Modules` (`ModuleCode`),
  ADD CONSTRAINT `FK_Mod2` FOREIGN KEY (`Module2`) REFERENCES `Modules` (`ModuleCode`),
  ADD CONSTRAINT `FK_Mod3` FOREIGN KEY (`Module3`) REFERENCES `Modules` (`ModuleCode`),
  ADD CONSTRAINT `FK_Mod4` FOREIGN KEY (`Module4`) REFERENCES `Modules` (`ModuleCode`),
  ADD CONSTRAINT `FK_Mod5` FOREIGN KEY (`Module5`) REFERENCES `Modules` (`ModuleCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
