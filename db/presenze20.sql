-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generato il: Nov 14, 2013 alle 14:49
-- Versione del server: 5.1.69
-- Versione PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `presenze20`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accesso`
--

CREATE TABLE IF NOT EXISTS `accesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ruolo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `orario`
--

CREATE TABLE IF NOT EXISTS `orario` (
  `id_orario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_utente` int(11) NOT NULL,
  `giorno` date NOT NULL,
  `orario` time DEFAULT NULL,
  `tipologia` enum('entrata','uscita','vario') DEFAULT NULL,
  `tempo` enum('mattino','pomeriggio') DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL,
  `datatime_modifica` datetime DEFAULT NULL,
  `utente_modifica` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_orario`),
  KEY `id_utente` (`id_utente`),
  KEY `entrata_mattina` (`orario`),
  KEY `id_utente_2` (`id_utente`,`giorno`),
  KEY `tipologia` (`tipologia`),
  KEY `tempo` (`tempo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=460 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `ruolo` varchar(50) NOT NULL,
  PRIMARY KEY (`codice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10000 ;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `orario`
--
ALTER TABLE `orario`
  ADD CONSTRAINT `orario_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`codice`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
