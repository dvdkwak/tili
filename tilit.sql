-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 19 feb 2018 om 11:41
-- Serverversie: 5.7.19
-- PHP-versie: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tilit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects`
--

DROP TABLE IF EXISTS `tbl_projects`;
CREATE TABLE IF NOT EXISTS `tbl_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pvePath` varchar(255) NOT NULL,
  `isRequest` int(1) NOT NULL COMMENT '1 is aanvraag 0 is geaccepteerd',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `projectName`, `description`, `pvePath`, `isRequest`) VALUES
(1, 'Testnaam', 'Dit is een fietsend project', 'PvE/geen', 1),
(2, 'Lopend Project', 'Dit is een lopend project', 'PvE/geen', 1),
(3, 'Test', 'Oke dit is even een test voorbeeldje', 'PvE/4f33e6636355e38f429887aae3567bcb', 1),
(4, 'ery', 'erty', 'PvE/2e067c763b95380a948ddb3db953223b', 0),
(5, 'ery', 'erty', 'PvE/22c72a952ecbe849672fded8a12cf5d7', 2),
(6, 'hj', 'fgjh', 'PvE/fe422b4e64c2f21ca7168b825830dc99', 2),
(7, 'ouyoii', 'yuioyu', 'PvE/3023b6eee803c545e6d5882ad63d6b60', 2),
(8, 'ghs', 'sdg', 'PvE/3853b0f46b44f872c86e68f67808eb3a', 2),
(9, 'cnv', 'nvb', 'PvE/6af87a09300e43c633227aa1d699995b', 2),
(10, 'jkhj', 'kghjkghj', '', 0),
(11, 'jkhj', 'kghjkghj', '', 0),
(12, 'ityui', 'tyui', '', 0),
(13, 'yer', 'yertyer', '', 0),
(14, 'yer', 'yertyer', 'PvE/d01a5007537cb1517524556262f42e99', 0),
(15, 'ewrt', 'wetwert', 'PvE/ede7dad2c3918212539da516ec36d90b', 0),
(16, 'khjkgh', 'jkghjk', 'PvE/a00c0587b83457eac3a259d55c5affc5', 0),
(17, 'Testerdetest', 'teste', 'PvE/b69a929eca961a6354b3f076ca787423', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects_log`
--

DROP TABLE IF EXISTS `tbl_projects_log`;
CREATE TABLE IF NOT EXISTS `tbl_projects_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_project_id` int(11) NOT NULL,
  `FK_log_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_timeregistration`
--

DROP TABLE IF EXISTS `tbl_timeregistration`;
CREATE TABLE IF NOT EXISTS `tbl_timeregistration` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `startTime` varchar(50) NOT NULL,
  `endTime` varchar(50) NOT NULL,
  `FK_user_id` int(10) NOT NULL,
  `FK_project_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_timeregistration`
--

INSERT INTO `tbl_timeregistration` (`id`, `date`, `startTime`, `endTime`, `FK_user_id`, `FK_project_id`) VALUES
(149, '2018-02-19', '11:52:36', '11:54:37', 8, 1),
(137, '2018-02-19', '11:42:04', '11:47:00', 8, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
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
  `status` int(10) NOT NULL COMMENT '0 = loggedout/uitgeklokt 1 = ingeklokt',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `password`, `userlevel`, `tel`, `firstName`, `lastName`, `preposition`, `city`, `address`, `zipCode`, `recoveryString`, `status`) VALUES
(6, '1@1', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 1, 1, '1', '1', NULL, '1', '1', '1', '', 0),
(7, '7@7', 'f05210c5b4263f0ec4c3995bdab458d81d3953f354a9109520f159db1e8800bcd45b97c56dce90a1fc27ab03e0b8a9af8673747023c406299374116d6f966981', 1, 7, '7', '7', NULL, '7', '7', '7', '', 0),
(8, '8@8', 'bc23b8b01772d2dd67efb8fe1a5e6bd0f44b97c36101be6cc09f253b53e68d67a22e4643068dfd1341980134ea57570acf65e306e4d96cef4d560384894c88a4', 0, 8, '8', '8', '8', '8', '8', '8', '', 1),
(9, '2@2', '40b244112641dd78dd4f93b6c9190dd46e0099194d5a44257b7efad6ef9ff4683da1eda0244448cb343aa688f5d3efd7314dafe580ac0bcbf115aeca9e8dc114', 2, 2, '2', '2', '2', '2', '22', '22', '', 0),
(10, '7@4', 'f05210c5b4263f0ec4c3995bdab458d81d3953f354a9109520f159db1e8800bcd45b97c56dce90a1fc27ab03e0b8a9af8673747023c406299374116d6f966981', 2, 7, '7', '7', NULL, '7', '7', '7', '', 0),
(11, '67@67', 'ce4dd661e4d69073c7999282048ea9ee91932db0d699f8b13b2db70fe532d987ac4a0aef309b82e1ad2aa6c2f2f60473093cd1e399a737cff3f9e70585d36be7', 2, 67, '67', '67', '67', '67', '67', '67', '', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users_projects`
--

DROP TABLE IF EXISTS `tbl_users_projects`;
CREATE TABLE IF NOT EXISTS `tbl_users_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_users_id` int(11) NOT NULL,
  `FK_projects_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users_projects`
--

INSERT INTO `tbl_users_projects` (`id`, `FK_users_id`, `FK_projects_id`) VALUES
(1, 7, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
