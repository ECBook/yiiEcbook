-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jun 2015 um 12:17
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `ecbookdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abteilung`
--

CREATE TABLE IF NOT EXISTS `abteilung` (
  `abt_bezeichnung` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `abt_kuerzel` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `abt_vorstand` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `abt_l_lehrernummer` varchar(45) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Daten für Tabelle `abteilung`
--

INSERT INTO `abteilung` (`abt_bezeichnung`, `abt_kuerzel`, `abt_vorstand`, `abt_l_lehrernummer`) VALUES
('edv', 'edv', 'abc', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergruppe`
--

CREATE TABLE IF NOT EXISTS `benutzergruppe` (
`bg_id` int(11) NOT NULL,
  `bg_name` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `bg_value` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Daten für Tabelle `benutzergruppe`
--

INSERT INTO `benutzergruppe` (`bg_id`, `bg_name`, `bg_value`) VALUES
(1, 'Admin', 10),
(2, 'Lehrer', 20),
(3, 'Schüler', 30),
(4, 'Eltern', 40);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eltern`
--

CREATE TABLE IF NOT EXISTS `eltern` (
`e_id` int(11) NOT NULL,
  `e_nachname` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `e_vorname` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `e_anrede` varchar(10) COLLATE utf8_estonian_ci DEFAULT NULL,
  `e_titel` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Daten für Tabelle `eltern`
--

INSERT INTO `eltern` (`e_id`, `e_nachname`, `e_vorname`, `e_anrede`, `e_titel`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fehlstunde`
--

CREATE TABLE IF NOT EXISTS `fehlstunde` (
  `fs_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fs_grund` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `fs_anzahl` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `fs_anmerkung` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `fs_verspaetet` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `klasse`
--

CREATE TABLE IF NOT EXISTS `klasse` (
  `k_name` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `k_jahrgang` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `k_abschlussjahr` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `k_schueleranzahl` int(11) DEFAULT NULL,
  `k_abt_bezeichnung` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `k_semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Daten für Tabelle `klasse`
--

INSERT INTO `klasse` (`k_name`, `k_jahrgang`, `k_abschlussjahr`, `k_schueleranzahl`, `k_abt_bezeichnung`, `k_semester`) VALUES
('4baif', '2014/15', '2015', 25, 'edv', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `krankmeldung`
--

CREATE TABLE IF NOT EXISTS `krankmeldung` (
`km_id` int(11) NOT NULL,
  `km_datum` timestamp NULL DEFAULT NULL,
  `km_unterschrift` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pruefungen`
--

CREATE TABLE IF NOT EXISTS `pruefungen` (
  `p_datum` date NOT NULL,
  `p_uhrzeit` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `p_thema` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `uf_kurzbezeichnung` varchar(45) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `unterrichtsfach`
--

CREATE TABLE IF NOT EXISTS `unterrichtsfach` (
  `uf_kurzbezeichnung` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `uf_bezeichnung` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `uf_jahrgang` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `uf_stundenanzahlprowoche` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `unterrichtsstunde`
--

CREATE TABLE IF NOT EXISTS `unterrichtsstunde` (
`us_id` int(11) NOT NULL,
  `us_std_datum` date NOT NULL,
  `us_stunde` int(11) NOT NULL,
  `us_kurzbezeichnung` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `us_raum` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `us_thema` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `k_name` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `uf_kurzbezeichnung` varchar(45) COLLATE utf8_estonian_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `auth_key` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `password_hash` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `password_reset_token` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `benutzergruppe` int(45) NOT NULL,
  `created_at` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `updated_at` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `vorname` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `nachname` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `geburtsdatum` date DEFAULT NULL,
  `istKlassenvorstand` tinyint(1) DEFAULT NULL,
  `wohnadresse` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `telefonnummer` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `ort` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `plz` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `Abteilung_abt_bezeichnung` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL,
  `Eltern_e_id` int(11) DEFAULT NULL,
  `istKlassensprecher` tinyint(1) DEFAULT NULL,
  `Klasse_k_name` varchar(45) COLLATE utf8_estonian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abteilung`
--
ALTER TABLE `abteilung`
 ADD PRIMARY KEY (`abt_bezeichnung`);

--
-- Indizes für die Tabelle `benutzergruppe`
--
ALTER TABLE `benutzergruppe`
 ADD PRIMARY KEY (`bg_id`);

--
-- Indizes für die Tabelle `eltern`
--
ALTER TABLE `eltern`
 ADD PRIMARY KEY (`e_id`);

--
-- Indizes für die Tabelle `fehlstunde`
--
ALTER TABLE `fehlstunde`
 ADD PRIMARY KEY (`fs_datum`), ADD KEY `fk_Fehlstunde_user1_idx` (`user_id`);

--
-- Indizes für die Tabelle `klasse`
--
ALTER TABLE `klasse`
 ADD PRIMARY KEY (`k_name`), ADD KEY `fk_Klasse_Abteilung1_idx` (`k_abt_bezeichnung`);

--
-- Indizes für die Tabelle `krankmeldung`
--
ALTER TABLE `krankmeldung`
 ADD PRIMARY KEY (`km_id`), ADD KEY `fk_Krankmeldung_user1_idx` (`user_id`);

--
-- Indizes für die Tabelle `pruefungen`
--
ALTER TABLE `pruefungen`
 ADD PRIMARY KEY (`p_datum`), ADD KEY `fk_Prüfungen_Unterrichtsfach1_idx` (`uf_kurzbezeichnung`);

--
-- Indizes für die Tabelle `unterrichtsfach`
--
ALTER TABLE `unterrichtsfach`
 ADD PRIMARY KEY (`uf_kurzbezeichnung`);

--
-- Indizes für die Tabelle `unterrichtsstunde`
--
ALTER TABLE `unterrichtsstunde`
 ADD PRIMARY KEY (`us_id`), ADD KEY `fk_Unterrichtsstunde_has_Unterrichtsfach_Klasse1_idx` (`k_name`), ADD KEY `fk_Unterrichtsstunde_Unterrichtsfach1_idx` (`uf_kurzbezeichnung`), ADD KEY `fk_Unterrichtsstunde_user1_idx` (`user_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_user_Abteilung1_idx` (`Abteilung_abt_bezeichnung`), ADD KEY `fk_user_Eltern1_idx` (`Eltern_e_id`), ADD KEY `fk_user_Klasse1_idx` (`Klasse_k_name`), ADD KEY `benutzergruppe` (`benutzergruppe`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzergruppe`
--
ALTER TABLE `benutzergruppe`
MODIFY `bg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `eltern`
--
ALTER TABLE `eltern`
MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `krankmeldung`
--
ALTER TABLE `krankmeldung`
MODIFY `km_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `unterrichtsstunde`
--
ALTER TABLE `unterrichtsstunde`
MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `fehlstunde`
--
ALTER TABLE `fehlstunde`
ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints der Tabelle `klasse`
--
ALTER TABLE `klasse`
ADD CONSTRAINT `fk_Klasse_Abteilung1` FOREIGN KEY (`k_abt_bezeichnung`) REFERENCES `abteilung` (`abt_bezeichnung`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `krankmeldung`
--
ALTER TABLE `krankmeldung`
ADD CONSTRAINT `fk_user_id1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints der Tabelle `pruefungen`
--
ALTER TABLE `pruefungen`
ADD CONSTRAINT `fk_Prüfungen_Unterrichtsfach1` FOREIGN KEY (`uf_kurzbezeichnung`) REFERENCES `unterrichtsfach` (`uf_kurzbezeichnung`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `unterrichtsstunde`
--
ALTER TABLE `unterrichtsstunde`
ADD CONSTRAINT `fk_Unterrichtsstunde_Unterrichtsfach1` FOREIGN KEY (`uf_kurzbezeichnung`) REFERENCES `unterrichtsfach` (`uf_kurzbezeichnung`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Unterrichtsstunde_has_Unterrichtsfach_Klasse1` FOREIGN KEY (`k_name`) REFERENCES `klasse` (`k_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_user_id2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `fk_user_abteilung` FOREIGN KEY (`Abteilung_abt_bezeichnung`) REFERENCES `abteilung` (`abt_bezeichnung`),
ADD CONSTRAINT `fk_user_benutzergruppe` FOREIGN KEY (`benutzergruppe`) REFERENCES `benutzergruppe` (`bg_id`),
ADD CONSTRAINT `fk_user_eltern` FOREIGN KEY (`Eltern_e_id`) REFERENCES `eltern` (`e_id`),
ADD CONSTRAINT `fk_user_klasse` FOREIGN KEY (`Klasse_k_name`) REFERENCES `klasse` (`k_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
