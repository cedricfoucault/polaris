-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2012 at 08:23 AM
-- Server version: 5.0.27
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cfoucaul`
--

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateurs`
--

CREATE TABLE IF NOT EXISTS `Utilisateurs` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(256) NOT NULL,
  `mot_de_passe` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nom` (`nom`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Utilisateurs`
--

