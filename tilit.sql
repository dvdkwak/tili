-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 06 feb 2018 om 13:43
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `tilit`
--
CREATE DATABASE IF NOT EXISTS `tilit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tilit`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_log`
--

CREATE TABLE IF NOT EXISTS `tbl_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects`
--

CREATE TABLE IF NOT EXISTS `tbl_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pvePath` varchar(255) NOT NULL,
  `isRequest` int(1) NOT NULL COMMENT '1 is aanvraag 0 is geaccepteerd',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `projectName`, `description`, `pvePath`, `isRequest`) VALUES
(1, 'Testnaam', 'hij doet het hoor', '', 1),
(2, 'Lopend Project', 'Dit is een lopend project', '', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects_log`
--

CREATE TABLE IF NOT EXISTS `tbl_projects_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_project_id` int(11) NOT NULL,
  `FK_log_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `preposition` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` varchar(255) NOT NULL,
  `recoveryString` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Gegevens worden uitgevoerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `password`, `userlevel`, `tel`, `firstName`, `lastName`, `preposition`, `city`, `address`, `zipCode`, `recoveryString`) VALUES
(6, '8@8', 'bc23b8b01772d2dd67efb8fe1a5e6bd0f44b97c36101be6cc09f253b53e68d67a22e4643068dfd1341980134ea57570acf65e306e4d96cef4d560384894c88a4', 0, 8, '8', '8', '8', '8', '8', '8', ''),
(7, '7@7', 'f05210c5b4263f0ec4c3995bdab458d81d3953f354a9109520f159db1e8800bcd45b97c56dce90a1fc27ab03e0b8a9af8673747023c406299374116d6f966981', 1, 7, '7', '7', NULL, '7', '7', '7', ''),
(8, '1@1', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 1, 1, '1', '1', NULL, '1', '1', '1', ''),
(9, '2@2', '40b244112641dd78dd4f93b6c9190dd46e0099194d5a44257b7efad6ef9ff4683da1eda0244448cb343aa688f5d3efd7314dafe580ac0bcbf115aeca9e8dc114', 2, 2, '2', '2', '2', '2', '22', '22', ''),
(10, '7@4', 'f05210c5b4263f0ec4c3995bdab458d81d3953f354a9109520f159db1e8800bcd45b97c56dce90a1fc27ab03e0b8a9af8673747023c406299374116d6f966981', 2, 7, '7', '7', NULL, '7', '7', '7', ''),
(11, '67@67', 'ce4dd661e4d69073c7999282048ea9ee91932db0d699f8b13b2db70fe532d987ac4a0aef309b82e1ad2aa6c2f2f60473093cd1e399a737cff3f9e70585d36be7', 2, 67, '67', '67', '67', '67', '67', '67', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users_projects`
--

CREATE TABLE IF NOT EXISTS `tbl_users_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_users_id` int(11) NOT NULL,
  `FK_projects_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
