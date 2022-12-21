-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 03:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innolab1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktuelleproduktion`
--

CREATE TABLE `aktuelleproduktion` (
  `ProdID` int(11) NOT NULL,
  `MaschinenID` int(11) NOT NULL,
  `Zielprodukt` varchar(10) NOT NULL,
  `Anzahl` int(3) NOT NULL,
  `FertigstellungQuartal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktuelleproduktion`
--

INSERT INTO `aktuelleproduktion` (`ProdID`, `MaschinenID`, `Zielprodukt`, `Anzahl`, `FertigstellungQuartal`) VALUES
(1, 1, 'Plus', 2, 3),
(4, 4, 'Base', 2, 3),
(9, 11, 'Plus', 2, 3),
(10, 12, 'Base', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `anfragen`
--

CREATE TABLE `anfragen` (
  `AnfrageID` int(255) NOT NULL,
  `Menge` int(255) NOT NULL,
  `Produkt` varchar(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT 0,
  `liefertermin` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anfragen`
--

INSERT INTO `anfragen` (`AnfrageID`, `Menge`, `Produkt`, `active`, `liefertermin`) VALUES
(19, 1, 'Base', 0, NULL),
(20, 3, 'Base', 0, NULL),
(21, 1, 'Base', 0, NULL),
(22, 2, 'Base', 1, 90),
(23, 1, 'Plus', 0, NULL),
(24, 1, 'Plus', 0, NULL),
(25, 2, 'Base', 0, NULL),
(26, 1, 'Plus', 0, NULL),
(27, 1, 'Max', 0, NULL),
(28, 2, 'Base', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `angebote`
--

CREATE TABLE `angebote` (
  `AngebotNr` int(255) NOT NULL,
  `Region` varchar(255) NOT NULL,
  `Produkt` varchar(255) NOT NULL,
  `Menge` int(255) NOT NULL,
  `Preis` int(255) NOT NULL,
  `Zahlungsziel` int(255) NOT NULL,
  `Liefertermin` int(255) NOT NULL,
  `Teamcode` int(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT 0,
  `gameid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angebote`
--

INSERT INTO `angebote` (`AngebotNr`, `Region`, `Produkt`, `Menge`, `Preis`, `Zahlungsziel`, `Liefertermin`, `Teamcode`, `active`, `gameid`) VALUES
(6, 'Europa', 'Plus', 2, 2, 90, 90, 73238, 1, '11111'),
(8, 'Europa', 'Plus', 2, 8888, 270, 180, 41912, 1, '11111'),
(10, 'Europa', 'Base', 2, 12, 90, 90, 44788, 1, '49715'),
(14, 'Europa', 'Base', 2, 5, 90, 90, 49633, 1, '24706'),
(16, 'Europa', 'Base', 2, 5, 90, 90, 16617, 1, '11111'),
(17, 'Europa', 'Base', 2, 1111, 90, 90, 57926, 0, '49715');

-- --------------------------------------------------------

--
-- Table structure for table `auftrag`
--

CREATE TABLE `auftrag` (
  `AuftragNr` int(11) NOT NULL,
  `Kategorie` varchar(20) DEFAULT NULL,
  `Region` varchar(20) DEFAULT NULL,
  `Produkt` varchar(10) NOT NULL,
  `Menge` int(3) NOT NULL,
  `Preis` int(3) NOT NULL,
  `Zahlungsziel` int(3) NOT NULL,
  `Liefertermin` int(3) NOT NULL,
  `Aktiv` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auftrag`
--

INSERT INTO `auftrag` (`AuftragNr`, `Kategorie`, `Region`, `Produkt`, `Menge`, `Preis`, `Zahlungsziel`, `Liefertermin`, `Aktiv`) VALUES
(80, NULL, 'Europa', 'Base', 2, 15, 90, 90, 0),
(81, NULL, 'Europa', 'Base', 1, 7, 180, 270, 0),
(82, NULL, 'Europa', 'Base', 2, 15, 90, 180, 0),
(83, NULL, 'Europa', 'Base', 1, 8, 180, 360, 0),
(84, NULL, 'Europa', 'Base', 1, 6, 180, 180, 0),
(85, NULL, 'Europa', 'Base', 1, 67, 90, 360, 0),
(86, NULL, 'Europa', 'Base', 3, 21, 270, 90, 0),
(87, NULL, 'Europa', 'Base', 4, 28, 90, 180, 0),
(88, NULL, 'Europa', 'Base', 3, 20, 180, 360, 0),
(89, NULL, 'Europa', 'Base', 1, 11, 180, 360, 0),
(90, NULL, 'Europa', 'Base', 2, 21, 90, 270, 0),
(91, NULL, 'Europa', 'Base', 12, 17, 180, 270, 0),
(92, NULL, 'Europa', 'Base', 1, 9, 90, 360, 0),
(93, NULL, 'Europa', 'Base', 1, 9, 270, 270, 0),
(94, 'TESTKA', 'Europa', 'Base', 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auftragzuteam`
--

CREATE TABLE `auftragzuteam` (
  `auftragzuteamid` int(11) NOT NULL,
  `AuftragNr` int(11) NOT NULL,
  `Teamcode` varchar(5) NOT NULL,
  `FinalZahlungsziel` int(3) NOT NULL,
  `FinalLiefertermin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auftragzuteam`
--

INSERT INTO `auftragzuteam` (`auftragzuteamid`, `AuftragNr`, `Teamcode`, `FinalZahlungsziel`, `FinalLiefertermin`) VALUES
(3, 83, '60897', 90, 360),
(4, 88, '98249', 180, 360),
(5, 89, '98249', 90, 360),
(6, 82, '98249', 90, 180),
(11, 84, '93539', 90, 180),
(13, 85, '63672', 90, 360),
(15, 84, '49633', 90, 180),
(23, 83, '81668', 90, 360),
(24, 84, '81668', 90, 180),
(26, 89, '81668', 90, 360),
(27, 91, '81668', 90, 270),
(30, 82, '57926', 90, 180),
(31, 84, '57926', 180, 180),
(32, 89, '57926', 180, 360),
(33, 91, '57926', 180, 270),
(34, 93, '13106', 270, 270),
(35, 83, '44579', 180, 360),
(36, 93, '44579', 270, 270);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balanceid` int(11) NOT NULL,
  `teamid` varchar(11) NOT NULL,
  `jahr` int(11) NOT NULL,
  `immaterials` int(11) NOT NULL,
  `grundstuecke` int(11) NOT NULL,
  `gebaeude` int(11) NOT NULL,
  `technischeanlagen` int(11) NOT NULL,
  `ausstattung` int(11) NOT NULL,
  `summeanlage` int(11) NOT NULL,
  `stoffe` int(11) NOT NULL,
  `unfertige` int(11) NOT NULL,
  `fertige` int(11) NOT NULL,
  `forderungen` int(11) NOT NULL,
  `fluessigemittel` int(11) NOT NULL,
  `summeumlauf` int(11) NOT NULL,
  `saummeaktiva` int(11) NOT NULL,
  `kapital` int(11) NOT NULL,
  `kapitalrueck` int(11) NOT NULL,
  `gewinnrueck` int(11) NOT NULL,
  `errgebnisnsteuern` int(11) NOT NULL,
  `summeigen` int(11) NOT NULL,
  `rueckstellungen` int(11) NOT NULL,
  `finanzverb` int(11) NOT NULL,
  `verbll` int(11) NOT NULL,
  `verbsonst` int(11) NOT NULL,
  `summefremd` int(11) NOT NULL,
  `summepassiv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`balanceid`, `teamid`, `jahr`, `immaterials`, `grundstuecke`, `gebaeude`, `technischeanlagen`, `ausstattung`, `summeanlage`, `stoffe`, `unfertige`, `fertige`, `forderungen`, `fluessigemittel`, `summeumlauf`, `saummeaktiva`, `kapital`, `kapitalrueck`, `gewinnrueck`, `errgebnisnsteuern`, `summeigen`, `rueckstellungen`, `finanzverb`, `verbll`, `verbsonst`, `summefremd`, `summepassiv`) VALUES
(2, '72339', 1, 7, 7, 7, 7, 7, 35, 7, 7, 7, 7, 7, 35, 70, 7, 7, 7, 7, 28, 7, 7, 7, 7, 28, 56),
(4, '72339', 2, 7, 7, 7, 7, 7, 35, 7, 7, 7, 7, 7, 35, 70, 7, 7, 7, 7, 28, 7, 7, 7, 7, 28, 56),
(5, '57926', 1, 4, 4, 4, 4, 4, 20, 4, 4, 4, 4, 4, 20, 40, 4, 4, 4, 4, 16, 4, 4, 4, 4, 16, 32);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameid`) VALUES
('11111'),
('24706'),
('44280'),
('46829'),
('47274'),
('49715'),
('50702'),
('57997'),
('61660'),
('63056'),
('95341');

-- --------------------------------------------------------

--
-- Table structure for table `guv`
--

CREATE TABLE `guv` (
  `guvID` int(5) NOT NULL,
  `teamcode` varchar(5) NOT NULL,
  `umsatzerloese` int(5) NOT NULL,
  `herstellungskosten` int(5) NOT NULL,
  `bruttoergebnis` int(5) NOT NULL,
  `forschungundentwicklung` int(5) NOT NULL,
  `verwaltung` int(5) NOT NULL,
  `marketingundvertrieb` int(5) NOT NULL,
  `sonstigeertraege` int(5) NOT NULL,
  `abschreibung` int(5) NOT NULL,
  `betriebsergebnis` int(5) NOT NULL,
  `steuern` int(5) NOT NULL,
  `ergebnisnachsteuern` int(5) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guv`
--

INSERT INTO `guv` (`guvID`, `teamcode`, `umsatzerloese`, `herstellungskosten`, `bruttoergebnis`, `forschungundentwicklung`, `verwaltung`, `marketingundvertrieb`, `sonstigeertraege`, `abschreibung`, `betriebsergebnis`, `steuern`, `ergebnisnachsteuern`, `year`) VALUES
(49, '72339', 7, 7, 14, 7, 7, 7, 7, 7, -7, 7, -14, 1),
(51, '72339', 7, 7, 14, 7, 7, 7, 7, 7, -7, 7, -14, 2),
(53, '72339', 7, 7, 14, 7, 7, 7, 7, 7, -7, 7, -14, 3),
(54, '57926', 62, 25, 87, 4, 2, 1, 81, 321, -160, 2, -162, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maschinentypen`
--

CREATE TABLE `maschinentypen` (
  `Maschinentypen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maschinentypen`
--

INSERT INTO `maschinentypen` (`Maschinentypen`) VALUES
('Conti'),
('Flex'),
('Power');

-- --------------------------------------------------------

--
-- Table structure for table `maschinenzuteam`
--

CREATE TABLE `maschinenzuteam` (
  `MaschinenID` int(11) NOT NULL,
  `Maschinentyp` varchar(10) NOT NULL,
  `Teamcode` varchar(5) NOT NULL,
  `Erwerbsquartal` int(3) NOT NULL,
  `lane` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maschinenzuteam`
--

INSERT INTO `maschinenzuteam` (`MaschinenID`, `Maschinentyp`, `Teamcode`, `Erwerbsquartal`, `lane`) VALUES
(1, 'Flex', '99001', 1, 1),
(4, 'Flex', '41912', 1, 1),
(6, 'Flex', '63672', 1, 1),
(7, 'Flex', '49633', 1, 1),
(8, 'Flex', '16617', 1, 1),
(9, 'Flex', '42582', 1, 1),
(10, 'Flex', '98249', 1, 1),
(11, 'Flex', '81668', 1, 1),
(12, 'Flex', '57926', 1, 1),
(13, 'Flex', '57926', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `materiallager`
--

CREATE TABLE `materiallager` (
  `Teamcode` varchar(5) NOT NULL,
  `RohMax` int(3) NOT NULL DEFAULT 0,
  `RohPlus` int(3) NOT NULL DEFAULT 0,
  `RohBase` int(3) NOT NULL DEFAULT 0,
  `AusstehendRohMax` int(3) NOT NULL DEFAULT 0,
  `AusstehendRohPlus` int(3) NOT NULL DEFAULT 0,
  `AusstehendRohBase` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materiallager`
--

INSERT INTO `materiallager` (`Teamcode`, `RohMax`, `RohPlus`, `RohBase`, `AusstehendRohMax`, `AusstehendRohPlus`, `AusstehendRohBase`) VALUES
('13106', 1, 1, 1, 0, 0, 0),
('15405', 2, 2, 2, 0, 0, 0),
('16617', 0, 101, 10, 0, 0, 0),
('17050', 23, 23, 23, 2, 22, 2),
('27997', 1, 1, 1, 0, 0, 0),
('28574', 12, 12, 10, 0, 0, 0),
('33258', 1, 1, 1, 0, 0, 0),
('41912', 11, 11, 9, 22, 22, 22),
('42582', 1, 1, 1, 0, 0, 0),
('44579', 165, 165, 165, 0, 0, 0),
('44788', 11, 11, 9, 0, 0, 0),
('49633', 41, 12, 12, 0, 0, 0),
('50628', 2, 2, 2, 0, 0, 0),
('53253', 1, 1, 1, 0, 0, 0),
('53663', 1, 1, 1, 0, 0, 0),
('57926', 1, 1, -1, 0, 0, 0),
('57960', 2, 2, 2, 0, 0, 0),
('60897', 1, 1, 1, 0, 0, 0),
('63672', 10, 13, 6, 0, 0, 0),
('65331', 1, 1, 1, 0, 0, 0),
('71991', 20, 20, 20, 0, 0, 0),
('72339', 111, 111, 111, 0, 0, 0),
('73238', 20, 20, 20, 0, 0, 0),
('81668', 22, 20, 22, 0, 0, 0),
('93539', 1, 1, 1, 0, 0, 0),
('95061', 116, 116, 116, 5, 5, 5),
('95942', 100, 100, 100, 5, 5, 5),
('98249', 10, 10, 10, 0, 0, 0),
('99001', 1, -1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produkte`
--

CREATE TABLE `produkte` (
  `Produkt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produkte`
--

INSERT INTO `produkte` (`Produkt`) VALUES
('Base'),
('Max'),
('Plus');

-- --------------------------------------------------------

--
-- Table structure for table `produktlager`
--

CREATE TABLE `produktlager` (
  `Teamcode` varchar(5) NOT NULL,
  `Max` int(3) NOT NULL DEFAULT 0,
  `Plus` int(3) NOT NULL DEFAULT 0,
  `Base` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produktlager`
--

INSERT INTO `produktlager` (`Teamcode`, `Max`, `Plus`, `Base`) VALUES
('13106', 0, 0, 0),
('15405', 0, 0, 0),
('16617', 0, 0, 0),
('17050', 0, 0, -12),
('27997', 0, 0, 0),
('28574', 0, 0, 0),
('33258', 0, 0, 0),
('41912', -7, 0, -5),
('42582', 0, 0, 0),
('44579', 0, 0, 0),
('44788', 0, 0, 0),
('49633', 0, 0, -4),
('50628', 0, 0, 0),
('53253', 0, 0, 0),
('53663', 0, 0, 0),
('57926', 0, 0, 0),
('57960', 0, 0, 0),
('60897', 0, 0, 0),
('63672', 0, 0, -1),
('65331', 0, 0, 0),
('71991', 0, 0, 0),
('72339', 0, 0, 0),
('73238', 0, 0, 0),
('81668', 0, 0, 0),
('93539', 0, 0, 0),
('95061', 0, 0, 0),
('95942', 0, 0, 0),
('98249', 0, 0, 0),
('99001', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `Teamcode` varchar(5) NOT NULL,
  `FluessigeMittel` int(5) NOT NULL DEFAULT 0,
  `AktuellesQuartal` int(3) NOT NULL DEFAULT 1,
  `europa_mpp` int(5) NOT NULL DEFAULT 0,
  `asien_mpp` int(5) NOT NULL DEFAULT 0,
  `amerika_mpp` int(5) NOT NULL DEFAULT 0,
  `gameid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`Teamcode`, `FluessigeMittel`, `AktuellesQuartal`, `europa_mpp`, `asien_mpp`, `amerika_mpp`, `gameid`) VALUES
('13106', 1, 1, 0, 0, 0, '11111'),
('15405', 155800, 3, 10, 0, 0, '24706'),
('16617', 78, 3, 7, 0, 0, '11111'),
('17050', 428, 4, 70, 40, 10, '49715'),
('27997', 1, 1, 0, 0, 0, '11111'),
('28574', 121, 3, 0, 0, 0, '11111'),
('33258', 12, 2, 0, 0, 0, '49715'),
('41912', 2243, 3, 0, 0, 0, '11111'),
('42582', 4990, 1, 0, 0, 0, '61660'),
('44579', 11, 2, 0, 0, 0, '44280'),
('44788', 200, 2, 0, 0, 0, '49715'),
('49633', 113, 3, 0, 0, 0, '24706'),
('50628', 222, 2, 0, 0, 0, '49715'),
('53253', 1, 1, 0, 0, 0, '49715'),
('53663', 1, 1, 0, 0, 0, '11111'),
('57926', 551, 4, 0, 0, 0, '61660'),
('57960', 22, 2, 0, 0, 0, '44280'),
('60897', 1, 1, 0, 0, 0, '63056'),
('63672', 134, 3, 0, 0, 0, '50702'),
('65331', 1, 1, 0, 0, 0, '11111'),
('71991', 100, 4, 0, 0, 0, '49715'),
('72339', 111, 5, 0, 0, 0, '57997'),
('73238', 200, 3, 0, 0, 0, '11111'),
('81668', 2299, 1, 0, 0, 0, '49715'),
('93539', 1, 3, 0, 0, 0, '11111'),
('95061', -44505, 2, 0, 0, 0, '44280'),
('95942', 900, 1, 0, 0, 0, '11111'),
('98249', 40, 1, 0, 0, 0, '63056'),
('99001', 9986, 1, 0, 0, 0, '63056');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktuelleproduktion`
--
ALTER TABLE `aktuelleproduktion`
  ADD PRIMARY KEY (`ProdID`),
  ADD KEY `MaschinenID` (`MaschinenID`,`Zielprodukt`),
  ADD KEY `Zielprodukt` (`Zielprodukt`);

--
-- Indexes for table `anfragen`
--
ALTER TABLE `anfragen`
  ADD PRIMARY KEY (`AnfrageID`);

--
-- Indexes for table `angebote`
--
ALTER TABLE `angebote`
  ADD PRIMARY KEY (`AngebotNr`);

--
-- Indexes for table `auftrag`
--
ALTER TABLE `auftrag`
  ADD PRIMARY KEY (`AuftragNr`),
  ADD KEY `Produkt` (`Produkt`);

--
-- Indexes for table `auftragzuteam`
--
ALTER TABLE `auftragzuteam`
  ADD PRIMARY KEY (`auftragzuteamid`),
  ADD KEY `Teamcode` (`Teamcode`),
  ADD KEY `AuftragNr` (`AuftragNr`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balanceid`),
  ADD KEY `teamid` (`teamid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameid`);

--
-- Indexes for table `guv`
--
ALTER TABLE `guv`
  ADD PRIMARY KEY (`guvID`),
  ADD KEY `teamcode` (`teamcode`);

--
-- Indexes for table `maschinentypen`
--
ALTER TABLE `maschinentypen`
  ADD PRIMARY KEY (`Maschinentypen`);

--
-- Indexes for table `maschinenzuteam`
--
ALTER TABLE `maschinenzuteam`
  ADD PRIMARY KEY (`MaschinenID`),
  ADD KEY `Maschinentyp` (`Maschinentyp`,`Teamcode`),
  ADD KEY `Teamcode` (`Teamcode`);

--
-- Indexes for table `materiallager`
--
ALTER TABLE `materiallager`
  ADD PRIMARY KEY (`Teamcode`);

--
-- Indexes for table `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`Produkt`);

--
-- Indexes for table `produktlager`
--
ALTER TABLE `produktlager`
  ADD PRIMARY KEY (`Teamcode`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Teamcode`),
  ADD KEY `gameid` (`gameid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktuelleproduktion`
--
ALTER TABLE `aktuelleproduktion`
  MODIFY `ProdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anfragen`
--
ALTER TABLE `anfragen`
  MODIFY `AnfrageID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `angebote`
--
ALTER TABLE `angebote`
  MODIFY `AngebotNr` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auftrag`
--
ALTER TABLE `auftrag`
  MODIFY `AuftragNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `auftragzuteam`
--
ALTER TABLE `auftragzuteam`
  MODIFY `auftragzuteamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balanceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guv`
--
ALTER TABLE `guv`
  MODIFY `guvID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `maschinenzuteam`
--
ALTER TABLE `maschinenzuteam`
  MODIFY `MaschinenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktuelleproduktion`
--
ALTER TABLE `aktuelleproduktion`
  ADD CONSTRAINT `aktuelleproduktion_ibfk_1` FOREIGN KEY (`Zielprodukt`) REFERENCES `produkte` (`Produkt`),
  ADD CONSTRAINT `aktuelleproduktion_ibfk_2` FOREIGN KEY (`MaschinenID`) REFERENCES `maschinenzuteam` (`MaschinenID`) ON DELETE CASCADE;

--
-- Constraints for table `auftrag`
--
ALTER TABLE `auftrag`
  ADD CONSTRAINT `auftrag_ibfk_1` FOREIGN KEY (`Produkt`) REFERENCES `produkte` (`Produkt`);

--
-- Constraints for table `auftragzuteam`
--
ALTER TABLE `auftragzuteam`
  ADD CONSTRAINT `auftragzuteam_ibfk_1` FOREIGN KEY (`AuftragNr`) REFERENCES `auftrag` (`AuftragNr`) ON DELETE CASCADE,
  ADD CONSTRAINT `auftragzuteam_ibfk_2` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE;

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`teamid`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE;

--
-- Constraints for table `guv`
--
ALTER TABLE `guv`
  ADD CONSTRAINT `guv_ibfk_1` FOREIGN KEY (`teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE;

--
-- Constraints for table `maschinenzuteam`
--
ALTER TABLE `maschinenzuteam`
  ADD CONSTRAINT `maschinenzuteam_ibfk_1` FOREIGN KEY (`Maschinentyp`) REFERENCES `maschinentypen` (`Maschinentypen`),
  ADD CONSTRAINT `maschinenzuteam_ibfk_2` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `materiallager`
--
ALTER TABLE `materiallager`
  ADD CONSTRAINT `materiallager_ibfk_1` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `produktlager`
--
ALTER TABLE `produktlager`
  ADD CONSTRAINT `produktlager_ibfk_1` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `game` (`gameid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
