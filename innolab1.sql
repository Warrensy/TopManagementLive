-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Dez 2021 um 23:49
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `innolab1`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aktuelleproduktion`
--

CREATE TABLE `aktuelleproduktion` (
  `ProdID` int(11) NOT NULL,
  `MaschinenID` int(11) NOT NULL,
  `Zielprodukt` varchar(10) NOT NULL,
  `Anzahl` int(3) NOT NULL,
  `FertigstellungQuartal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `aktuelleproduktion`
--

INSERT INTO `aktuelleproduktion` (`ProdID`, `MaschinenID`, `Zielprodukt`, `Anzahl`, `FertigstellungQuartal`) VALUES
(1, 1, 'Plus', 2, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anfragen`
--

CREATE TABLE `anfragen` (
  `AnfrageID` int(255) NOT NULL,
  `Menge` int(255) NOT NULL,
  `Produkt` varchar(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `anfragen`
--

INSERT INTO `anfragen` (`AnfrageID`, `Menge`, `Produkt`, `active`) VALUES
(10, 1, 'Base', 0),
(11, 2, 'Base', 0),
(12, 3, 'Base', 0),
(13, 1, 'Plus', 0),
(14, 2, 'Plus', 1),
(15, 3, 'Plus', 0),
(16, 1, 'Max', 0),
(17, 2, 'Max', 0),
(18, 3, 'Max', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `angebote`
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
  `active` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `angebote`
--

INSERT INTO `angebote` (`AngebotNr`, `Region`, `Produkt`, `Menge`, `Preis`, `Zahlungsziel`, `Liefertermin`, `Teamcode`, `active`) VALUES
(1, 'Europa', 'Plus', 2, 4, 4, 4, 41854, 0),
(2, 'Europa', 'Plus', 2, 23, 1, 2, 41854, 0),
(4, 'Europa', 'Plus', 2, 55, 55, 55, 95816, 0),
(5, 'Europa', 'Plus', 2, 88, 88, 88, 69064, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftrag`
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
-- Daten für Tabelle `auftrag`
--

INSERT INTO `auftrag` (`AuftragNr`, `Kategorie`, `Region`, `Produkt`, `Menge`, `Preis`, `Zahlungsziel`, `Liefertermin`, `Aktiv`) VALUES
(69, 'TESTKA', 'Europa', 'Base', 5, 15, 135, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftragzuteam`
--

CREATE TABLE `auftragzuteam` (
  `AuftragNr` int(11) NOT NULL,
  `Teamcode` varchar(5) NOT NULL,
  `FinalZahlungsziel` int(3) NOT NULL,
  `FinalLiefertermin` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `maschinentypen`
--

CREATE TABLE `maschinentypen` (
  `Maschinentypen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `maschinentypen`
--

INSERT INTO `maschinentypen` (`Maschinentypen`) VALUES
('Conti'),
('Flex'),
('Power');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `maschinenzuteam`
--

CREATE TABLE `maschinenzuteam` (
  `MaschinenID` int(11) NOT NULL,
  `Maschinentyp` varchar(10) NOT NULL,
  `Teamcode` varchar(5) NOT NULL,
  `Erwerbsquartal` int(3) NOT NULL,
  `lane` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `maschinenzuteam`
--

INSERT INTO `maschinenzuteam` (`MaschinenID`, `Maschinentyp`, `Teamcode`, `Erwerbsquartal`, `lane`) VALUES
(1, 'Flex', '99001', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `materiallager`
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
-- Daten für Tabelle `materiallager`
--

INSERT INTO `materiallager` (`Teamcode`, `RohMax`, `RohPlus`, `RohBase`, `AusstehendRohMax`, `AusstehendRohPlus`, `AusstehendRohBase`) VALUES
('28608', 5, 5, 5, 34, 23, 12),
('41854', 1, 1, 1, 0, 0, 0),
('57655', 5, 5, 5, 0, 0, 0),
('58583', 5, 5, 5, 0, 0, 0),
('69064', 1, 1, 1, 0, 0, 0),
('69077', 30, 30, 30, 0, 0, 0),
('71345', 2, 2, 2, 0, 0, 0),
('76922', 5, 5, 5, 0, 0, 0),
('78740', 5, 5, 5, 0, 0, 0),
('79990', 1, 1, 1, 0, 0, 0),
('89549', 5, 5, 5, 0, 0, 0),
('95816', 3, 32, 23, 0, 0, 0),
('99001', 1, -1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

CREATE TABLE `produkte` (
  `Produkt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`Produkt`) VALUES
('Base'),
('Max'),
('Plus');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produktlager`
--

CREATE TABLE `produktlager` (
  `Teamcode` varchar(5) NOT NULL,
  `Max` int(3) NOT NULL DEFAULT 0,
  `Plus` int(3) NOT NULL DEFAULT 0,
  `Base` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `produktlager`
--

INSERT INTO `produktlager` (`Teamcode`, `Max`, `Plus`, `Base`) VALUES
('28608', 7, 3, 1),
('41854', 0, 0, 0),
('57655', 0, 0, 0),
('58583', 0, 0, 0),
('69064', 0, 0, 0),
('69077', 0, 0, 0),
('71345', 0, 0, 0),
('76922', 0, 0, 0),
('78740', 0, 0, 0),
('79990', 0, 0, 0),
('89549', 0, 0, 0),
('95816', 0, 0, 0),
('99001', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE `team` (
  `Teamcode` varchar(5) NOT NULL,
  `FluessigeMittel` int(5) NOT NULL DEFAULT 0,
  `AktuellesQuartal` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `team`
--

INSERT INTO `team` (`Teamcode`, `FluessigeMittel`, `AktuellesQuartal`) VALUES
('28608', 3, 1),
('41854', 1, 1),
('57655', 5, 1),
('58583', 5, 1),
('69064', 1, 1),
('69077', 30, 1),
('71345', 2, 1),
('76922', 5, 1),
('78740', 80, 1),
('79990', 1, 1),
('89549', 9, 1),
('95816', 23, 1),
('99001', 9986, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aktuelleproduktion`
--
ALTER TABLE `aktuelleproduktion`
  ADD PRIMARY KEY (`ProdID`),
  ADD KEY `MaschinenID` (`MaschinenID`,`Zielprodukt`),
  ADD KEY `Zielprodukt` (`Zielprodukt`);

--
-- Indizes für die Tabelle `anfragen`
--
ALTER TABLE `anfragen`
  ADD PRIMARY KEY (`AnfrageID`);

--
-- Indizes für die Tabelle `angebote`
--
ALTER TABLE `angebote`
  ADD PRIMARY KEY (`AngebotNr`);

--
-- Indizes für die Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  ADD PRIMARY KEY (`AuftragNr`),
  ADD KEY `Produkt` (`Produkt`);

--
-- Indizes für die Tabelle `auftragzuteam`
--
ALTER TABLE `auftragzuteam`
  ADD PRIMARY KEY (`AuftragNr`,`Teamcode`),
  ADD KEY `Teamcode` (`Teamcode`);

--
-- Indizes für die Tabelle `maschinentypen`
--
ALTER TABLE `maschinentypen`
  ADD PRIMARY KEY (`Maschinentypen`);

--
-- Indizes für die Tabelle `maschinenzuteam`
--
ALTER TABLE `maschinenzuteam`
  ADD PRIMARY KEY (`MaschinenID`),
  ADD KEY `Maschinentyp` (`Maschinentyp`,`Teamcode`),
  ADD KEY `Teamcode` (`Teamcode`);

--
-- Indizes für die Tabelle `materiallager`
--
ALTER TABLE `materiallager`
  ADD PRIMARY KEY (`Teamcode`);

--
-- Indizes für die Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`Produkt`);

--
-- Indizes für die Tabelle `produktlager`
--
ALTER TABLE `produktlager`
  ADD PRIMARY KEY (`Teamcode`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Teamcode`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aktuelleproduktion`
--
ALTER TABLE `aktuelleproduktion`
  MODIFY `ProdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `anfragen`
--
ALTER TABLE `anfragen`
  MODIFY `AnfrageID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `angebote`
--
ALTER TABLE `angebote`
  MODIFY `AngebotNr` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  MODIFY `AuftragNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT für Tabelle `maschinenzuteam`
--
ALTER TABLE `maschinenzuteam`
  MODIFY `MaschinenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `aktuelleproduktion`
--
ALTER TABLE `aktuelleproduktion`
  ADD CONSTRAINT `aktuelleproduktion_ibfk_1` FOREIGN KEY (`Zielprodukt`) REFERENCES `produkte` (`Produkt`),
  ADD CONSTRAINT `aktuelleproduktion_ibfk_2` FOREIGN KEY (`MaschinenID`) REFERENCES `maschinenzuteam` (`MaschinenID`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  ADD CONSTRAINT `auftrag_ibfk_1` FOREIGN KEY (`Produkt`) REFERENCES `produkte` (`Produkt`);

--
-- Constraints der Tabelle `auftragzuteam`
--
ALTER TABLE `auftragzuteam`
  ADD CONSTRAINT `auftragzuteam_ibfk_1` FOREIGN KEY (`AuftragNr`) REFERENCES `auftrag` (`AuftragNr`) ON DELETE CASCADE,
  ADD CONSTRAINT `auftragzuteam_ibfk_2` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `maschinenzuteam`
--
ALTER TABLE `maschinenzuteam`
  ADD CONSTRAINT `maschinenzuteam_ibfk_1` FOREIGN KEY (`Maschinentyp`) REFERENCES `maschinentypen` (`Maschinentypen`),
  ADD CONSTRAINT `maschinenzuteam_ibfk_2` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `materiallager`
--
ALTER TABLE `materiallager`
  ADD CONSTRAINT `materiallager_ibfk_1` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `produktlager`
--
ALTER TABLE `produktlager`
  ADD CONSTRAINT `produktlager_ibfk_1` FOREIGN KEY (`Teamcode`) REFERENCES `team` (`Teamcode`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
