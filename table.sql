-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dic 07, 2017 alle 10:37
-- Versione del server: 5.5.58-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gestiolus`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `guasti`
--

CREATE TABLE IF NOT EXISTS `guasti` (
`id` int(5) NOT NULL,
  `nomepc` varchar(100) NOT NULL,
  `ubicazione` varchar(50) NOT NULL,
  `descrizione` text NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_apertura` date NOT NULL,
  `soluzione` text NOT NULL,
  `risolutore` varchar(50) NOT NULL,
  `data_chiusura` date NOT NULL,
  `stato` int(1) NOT NULL,
  `codice` varchar(20) DEFAULT NULL,
  `priorità` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=712 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
`id` int(3) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `notepad`
--

CREATE TABLE IF NOT EXISTS `notepad` (
`id` int(255) NOT NULL,
  `note` text NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(5) NOT NULL,
  `nome` text NOT NULL,
  `stato` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tecnici`
--

CREATE TABLE IF NOT EXISTS `tecnici` (
`id` int(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `punteggio` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guasti`
--
ALTER TABLE `guasti`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notepad`
--
ALTER TABLE `notepad`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tecnici`
--
ALTER TABLE `tecnici`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guasti`
--
ALTER TABLE `guasti`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=712;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `notepad`
--
ALTER TABLE `notepad`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tecnici`
--
ALTER TABLE `tecnici`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
