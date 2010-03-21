-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2010 at 04:14 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spsis`
--
CREATE DATABASE `spsis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spsis`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `empno` varchar(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `middle` varchar(30) DEFAULT NULL,
  `last` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`empno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `empno`, `first`, `middle`, `last`, `position`) VALUES
(1, 'admin', 'admin', '12345678912', 'administrator', 'a', 'administrator', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE IF NOT EXISTS `machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matno` varchar(10) NOT NULL,
  `desc1` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `bin` varchar(10) NOT NULL,
  `bun` varchar(10) NOT NULL,
  `cc` varchar(10),
  `type` tinyint(1) NOT NULL,
  `machine` int(11),
  PRIMARY KEY (`id`),
  UNIQUE KEY `matno` (`matno`),
  FOREIGN KEY (`machine`) REFERENCES `machine`(`id`) ON DELETE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reg_user`
--

CREATE TABLE IF NOT EXISTS `reg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `empno` varchar(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `middle` varchar(30) DEFAULT NULL,
  `last` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`empno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reg_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `first` varchar(30) NOT NULL,
  `middle` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `item` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaction`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;