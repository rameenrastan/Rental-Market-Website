-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2015 at 02:22 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rental_7191863`
--
CREATE DATABASE IF NOT EXISTS `rental_7191863` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rental_7191863`;

-- --------------------------------------------------------

--
-- Table structure for table `propertyads`
--

CREATE TABLE IF NOT EXISTS `propertyads` (
  `Username` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AdTitle` text NOT NULL,
  `StreetAddress` text NOT NULL,
  `City` text NOT NULL,
  `Province` text NOT NULL,
  `PostalCode` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Message` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `propertyads`
--

INSERT INTO `propertyads` (`Username`, `ID`, `AdTitle`, `StreetAddress`, `City`, `Province`, `PostalCode`, `Price`, `Message`) VALUES
('michael123', 9, 'Apartment for Rent!', '9218 Maple', 'Montreal', 'Quebec', 'J2K 4I9', 300, 'Cheap apartment for rent!'),
('thomas123', 10, 'Cheap Apartment', '9283 Maple', 'Montreal', 'Quebec', 'J9L 5J0', 200, 'Cheap apartment for rent!'),
('kelly123', 11, 'New Aparment!', '2398 Maple', 'Montreal', 'Quebec', 'J9L 4J9', 400, 'New, affordable apartment in Montreal!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Type` text NOT NULL,
  `Phone` text NOT NULL,
  `Email` text NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Income` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Animal` text NOT NULL,
  `Smoker` text NOT NULL,
  `Message` text NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='contains data of all users registered on the rental market' AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Type`, `Phone`, `Email`, `Username`, `Password`, `Income`, `Age`, `Animal`, `Smoker`, `Message`, `Price`) VALUES
(12, 'Rameen', 'Rastan-Vadiveloo', 'Tenant', '(123)123-1234', 'rameenrastanv@hotmail.com', 'rameenrastanv', 'testing123', 15, 18, 'No', 'No', 'Hello!', 400),
(13, 'Michael', 'James', 'Owner', '(321)321-3214', 'michael@gmail.com', 'michael123', 'james123', 35, 26, 'Yes', 'Yes', '', 500),
(14, 'Kyle', 'H', 'Tenant', '(412)123-9123', 'kyle@gmail.com', 'kyle123', 'password123', 25, 26, 'Yes', 'Yes', 'I am looking for a good apartment.', 400),
(15, 'Rob', 'M', 'Tenant', '(439)938-3291', 'rob@hotmail.com', 'rob123', 'test1234', 75, 36, 'Yes', 'No', 'I have pets!', 500),
(16, 'William', 'J', 'Tenant', '(439)293-1928', 'william@gmail.com', 'willj12', 'will12345', 75, 86, 'Yes', 'No', 'I have 2 dogs.', 700),
(17, 'Josh', 'M', 'Owner', '(943)341-1239', 'josh@gmail.com', 'josh123', 'josh1234', 25, 26, 'Yes', 'Yes', '', 600),
(18, 'Jonothan', 'K', 'Owner', '(432)192-1293', 'jonothan@gmail.com', 'jonothan123', 'test12345', 15, 18, 'No', 'No', '', 400),
(19, 'Henry', 'Barnes', 'Tenant', '(302)129-1239', 'henry@gmail.com', 'henry123', 'barnes123', 15, 18, 'No', 'No', 'I have no pets and no smokers!', 400),
(20, 'Thomas', 'Henry', 'Owner', '(234)293-2394', 'thomas@gmail.com', 'thomas123', 'henry123', 15, 18, 'No', 'No', '', 400),
(21, 'Kelly', 'Kim', 'Owner', '(493)394-9438', 'kelly@gmail.com', 'kelly123', 'kim1234', 75, 36, 'Yes', 'No', '', 500);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
