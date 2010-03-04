-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2010 at 02:55 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `empno` varchar(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `middle` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`empno`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `empno` (`empno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `empno`, `first`, `middle`, `last`, `position`) VALUES
(1, 'admin', 'admin', '01234567899', 'hello', '', 'world', 'engineer');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_no` varchar(10) NOT NULL,
  `desc1` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `bin` varchar(10) NOT NULL,
  `bun` varchar(10) NOT NULL,
  `cc` varchar(10) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `machine` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mat_no` (`mat_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `mat_no`, `desc1`, `stock`, `bin`, `bun`, `cc`, `type`, `machine`) VALUES
(6, '6666', 'frederique', 1, 'frederique', 'frederique', 'frederique', 1, 'AEM Machine'),
(4, '4444', 'freddie', 1, 'freddie', 'freddie', 'freddie', 1, 'AEM Machine'),
(10, 'matno', 'desc', 2, 'bin', 'bun', 'cc', 1, 'Corfin Machine');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE IF NOT EXISTS `machine` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`id`, `name`) VALUES
(1, 'AEM Machine'),
(2, 'Corfin Machine'),
(3, 'AEM;'),
(4, 'AEM;;'),
(5, 'AEM Ma'),
(6, 'AEM Mach'),
(7, '6666');

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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`empno`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `reg_user`
--

INSERT INTO `reg_user` (`id`, `username`, `password`, `empno`, `first`, `middle`, `last`, `position`, `status`) VALUES
(10, 'rosemay', 'hello', '12345678901', 'rosemay', 'zambale', 'beltran', 'kjhg', 1),
(12, 'kikko', 'asd', '123414124', 'francis', 'r', 'dimaano', 'asdasd', 1),
(13, 'freddie', 'asd', 'kjhv', 'freddie', 'jr', 'oliva', 'jhkf', 1),
(15, 'felix', 'qwe', 'lkgfbj', 'felix', 'lawrence', 'pamittan', 'ksjdfb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `first` varchar(30) NOT NULL,
  `middle` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `item` varchar(10) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaction`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
