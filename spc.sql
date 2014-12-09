-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2014 at 01:54 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spc`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporanshift`
--

CREATE TABLE IF NOT EXISTS `laporanshift` (
  `idlaporanshift` int(11) NOT NULL AUTO_INCREMENT,
  `tgllaporanshift` date NOT NULL,
  `shift` varchar(100) NOT NULL,
  `line` int(11) DEFAULT NULL,
  `motif` varchar(100) NOT NULL,
  `kw1s` int(11) NOT NULL,
  `kw1m` int(11) NOT NULL,
  `kw1l` int(11) NOT NULL,
  `rendkw1` double NOT NULL,
  `kw2s` int(11) NOT NULL,
  `kw2m` int(11) NOT NULL,
  `kw2l` int(11) NOT NULL,
  `rendkw2` double NOT NULL,
  `reject` int(11) NOT NULL,
  `rendreject` double NOT NULL,
  PRIMARY KEY (`idlaporanshift`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `laporanshift`
--

INSERT INTO `laporanshift` (`idlaporanshift`, `tgllaporanshift`, `shift`, `line`, `motif`, `kw1s`, `kw1m`, `kw1l`, `rendkw1`, `kw2s`, `kw2m`, `kw2l`, `rendkw2`, `reject`, `rendreject`) VALUES
(1, '2014-11-26', '1', 1, 'sorento beige', 100, 100, 100, 45, 100, 100, 100, 45, 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `idoperator` int(11) NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` date NOT NULL,
  PRIMARY KEY (`idoperator`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`idoperator`, `namalengkap`, `username`, `password`, `last_login`) VALUES
(1, 'majid abdullah', 'majid', '3ba3a0d9c25e0029b49851015145333d', '2014-10-29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
