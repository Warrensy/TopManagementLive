-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 02:21 PM
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
(4, 4, 'Base', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `anfragen`
--

CREATE TABLE `anfragen` (
  `AnfrageID` int(255) NOT NULL,
  `Menge` int(255) NOT NULL,
  `Produkt` varchar(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anfragen`
--

INSERT INTO `anfragen` (`AnfrageID`, `Menge`, `Produkt`, `active`) VALUES
(19, 1, 'Base', 0),
(20, 3, 'Base', 0),
(21, 1, 'Base', 0),
(22, 2, 'Base', 0),
(23, 1, 'Plus', 0),
(24, 1, 'Plus', 0),
(25, 2, 'Base', 0),
(26, 1, 'Plus', 0),
(27, 1, 'Max', 0),
(28, 2, 'Base', 0);

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
(8, 'Europa', 'Plus', 2, 8888, 270, 180, 41912, 1, '11111');

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
(93, NULL, 'Europa', 'Base', 1, 9, 270, 270, 0);

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
('16689'),
('25661'),
('33447'),
('34695'),
('42515'),
('49152'),
('50749'),
('60148'),
('88164');

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
(4, 'Flex', '41912', 1, 1);

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
('41912', 11, 11, 9, 22, 22, 22),
('73238', 20, 20, 20, 0, 0, 0),
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
('41912', -7, 0, -5),
('73238', 0, 0, 0),
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
('41912', 2265, 1, 0, 0, 0, '11111'),
('73238', 200, 1, 0, 0, 0, '11111'),
('99001', 9986, 1, 0, 0, 0, '11111');

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
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameid`);

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
  MODIFY `ProdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anfragen`
--
ALTER TABLE `anfragen`
  MODIFY `AnfrageID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `angebote`
--
ALTER TABLE `angebote`
  MODIFY `AngebotNr` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auftrag`
--
ALTER TABLE `auftrag`
  MODIFY `AuftragNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `auftragzuteam`
--
ALTER TABLE `auftragzuteam`
  MODIFY `auftragzuteamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maschinenzuteam`
--
ALTER TABLE `maschinenzuteam`
  MODIFY `MaschinenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
