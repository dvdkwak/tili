-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 20 feb 2018 om 13:54
-- Serverversie: 5.7.11
-- PHP-versie: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `author`, `message`, `date`) VALUES
(1, '8 8', '123', '14:12:27 19-02-2018'),
(2, '8 8', '123', '14:16:22 19-02-2018'),
(3, '8 8', '123', '14:16:25 19-02-2018'),
(4, '8 8', '111', '14:16:58 19-02-2018'),
(5, '8 8', '666', '15:09:24 19-02-2018');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_offers`
--

CREATE TABLE `tbl_offers` (
  `id` int(11) NOT NULL,
  `FK_user_id` int(11) NOT NULL,
  `FK_project_id` int(11) NOT NULL,
  `offerNumber` int(11) NOT NULL,
  `offerDate` int(11) NOT NULL,
  `expirationDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` int(11) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startDate` varchar(100) NOT NULL,
  `pvePath` varchar(255) NOT NULL,
  `isRequest` int(1) NOT NULL COMMENT '1 is aanvraag 0 is geaccepteerd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `projectName`, `description`, `startDate`, `pvePath`, `isRequest`) VALUES
(1, 'Testnaam', 'Dit is een fietsend project', '', 'PvE/geen', 1),
(2, 'Lopend Project', 'Dit is een lopend project', '', 'PvE/pdf_guidelines', 1),
(3, 'Test', 'Oke dit is even een test voorbeeldje', '', 'PvE/4f33e6636355e38f429887aae3567bcb', 1),
(4, 'ery', 'erty', '', 'PvE/2e067c763b95380a948ddb3db953223b', 0),
(5, 'ery', 'erty', '', 'PvE/22c72a952ecbe849672fded8a12cf5d7', 2),
(6, 'hj', 'fgjh', '', 'PvE/fe422b4e64c2f21ca7168b825830dc99', 2),
(7, 'ouyoii', 'yuioyu', '', 'PvE/3023b6eee803c545e6d5882ad63d6b60', 2),
(8, 'ghs', 'sdg', '', 'PvE/3853b0f46b44f872c86e68f67808eb3a', 2),
(9, 'cnv', 'nvb', '', 'PvE/6af87a09300e43c633227aa1d699995b', 2),
(10, 'jkhj', 'kghjkghj', '', '', 0),
(11, 'jkhj', 'kghjkghj', '', '', 0),
(12, 'ityui', 'tyui', '', '', 0),
(13, 'yer', 'yertyer', '', '', 0),
(14, 'yer', 'yertyer', '', 'PvE/d01a5007537cb1517524556262f42e99', 0),
(15, 'ewrt', 'wetwert', '', 'PvE/ede7dad2c3918212539da516ec36d90b', 0),
(16, 'khjkgh', 'jkghjk', '', 'PvE/a00c0587b83457eac3a259d55c5affc5', 0),
(17, 'Testerdetest', 'teste', '', 'PvE/b69a929eca961a6354b3f076ca787423', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_projects_log`
--

CREATE TABLE `tbl_projects_log` (
  `id` int(11) NOT NULL,
  `FK_project_id` int(11) NOT NULL,
  `FK_log_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_projects_log`
--

INSERT INTO `tbl_projects_log` (`id`, `FK_project_id`, `FK_log_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 4),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_timeregistration`
--

CREATE TABLE `tbl_timeregistration` (
  `id` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `startTime` varchar(50) NOT NULL,
  `endTime` varchar(50) NOT NULL,
  `FK_user_id` int(10) NOT NULL,
  `FK_project_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_timeregistration`
--

INSERT INTO `tbl_timeregistration` (`id`, `date`, `startTime`, `endTime`, `FK_user_id`, `FK_project_id`) VALUES
(149, '2018-02-19', '11:52:36', '11:54:37', 8, 1),
(137, '2018-02-19', '11:42:04', '11:47:00', 8, 1),
(164, '2018-02-20', '02:35:09', '02:35:29', 8, 2),
(165, '2018-02-20', '02:36:33', '14:39:35', 8, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `preposition` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` varchar(255) NOT NULL,
  `recoveryString` varchar(255) NOT NULL,
  `status` int(10) NOT NULL COMMENT '0 = loggedout/uitgeklokt 1 = ingeklokt'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `password`, `userlevel`, `tel`, `firstName`, `lastName`, `companyName`, `preposition`, `city`, `address`, `zipCode`, `recoveryString`, `status`) VALUES
(6, '1@1', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 1, 1, '1', '1', '', NULL, '1', '1', '1', '', 0),
(7, '7@7', 'f05210c5b4263f0ec4c3995bdab458d81d3953f354a9109520f159db1e8800bcd45b97c56dce90a1fc27ab03e0b8a9af8673747023c406299374116d6f966981', 1, 7, '7', '7', '', NULL, '7', '7', '7', '', 0),
(8, '8@8', 'bc23b8b01772d2dd67efb8fe1a5e6bd0f44b97c36101be6cc09f253b53e68d67a22e4643068dfd1341980134ea57570acf65e306e4d96cef4d560384894c88a4', 0, 8, '8', '8', '', '8', '8', '8', '8', '', 0),
(9, '2@2', '40b244112641dd78dd4f93b6c9190dd46e0099194d5a44257b7efad6ef9ff4683da1eda0244448cb343aa688f5d3efd7314dafe580ac0bcbf115aeca9e8dc114', 2, 2, '2', '2', '', '2', '2', '22', '22', '', 0),
(10, '7@4', 'f05210c5b4263f0ec4c3995bdab458d81d3953f354a9109520f159db1e8800bcd45b97c56dce90a1fc27ab03e0b8a9af8673747023c406299374116d6f966981', 2, 7, '7', '7', '', NULL, '7', '7', '7', '', 0),
(11, '67@67', 'ce4dd661e4d69073c7999282048ea9ee91932db0d699f8b13b2db70fe532d987ac4a0aef309b82e1ad2aa6c2f2f60473093cd1e399a737cff3f9e70585d36be7', 2, 67, '67', '67', '', '67', '67', '67', '67', '', 0),
(12, 'shane.tamerus@gmail.com', 'D404559F602EAB6FD602AC7680DACBFAADD13630335E951F097AF3900E9DE176B6DB28512F2E000B9D04FBA5133E8B1C6E8DF59DB3A8AB9D60BE4B97CC9E81DB', 2, 1234567890, 'Shane', 'Tamerus', 'TiliT', NULL, 'Emmeloord', 'Espelerlaan 74', '8302 DC', '', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_users_projects`
--

CREATE TABLE `tbl_users_projects` (
  `id` int(11) NOT NULL,
  `FK_users_id` int(11) NOT NULL,
  `FK_projects_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_users_projects`
--

INSERT INTO `tbl_users_projects` (`id`, `FK_users_id`, `FK_projects_id`) VALUES
(1, 7, 3),
(2, 12, 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_offers`
--
ALTER TABLE `tbl_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_projects_log`
--
ALTER TABLE `tbl_projects_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_timeregistration`
--
ALTER TABLE `tbl_timeregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_users_projects`
--
ALTER TABLE `tbl_users_projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `tbl_offers`
--
ALTER TABLE `tbl_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT voor een tabel `tbl_projects_log`
--
ALTER TABLE `tbl_projects_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `tbl_timeregistration`
--
ALTER TABLE `tbl_timeregistration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT voor een tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT voor een tabel `tbl_users_projects`
--
ALTER TABLE `tbl_users_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
