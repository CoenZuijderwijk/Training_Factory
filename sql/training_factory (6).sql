-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 dec 2019 om 12:39
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_factory`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_persons` int(11) NOT NULL,
  `les_naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lesson`
--

INSERT INTO `lesson` (`id`, `time`, `date`, `location`, `max_persons`, `les_naam`, `training_id`) VALUES
(1, '20:17:00', '2014-01-01', 'de hal', 22, 'Stootzak training', 1),
(3, '03:05:00', '2014-01-01', 'de hal', 13, 'Stootzak training', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191206081625', '2019-12-06 08:16:32'),
('20191210091603', '2019-12-10 09:16:31'),
('20191210092646', '2019-12-10 09:26:57'),
('20191210112052', '2019-12-10 11:21:23'),
('20191210115200', '2019-12-10 11:52:08'),
('20191211105353', '2019-12-11 10:53:58'),
('20191211124904', '2019-12-11 12:49:17'),
('20191211125943', '2019-12-11 12:59:57'),
('20191211130114', '2019-12-11 13:01:20'),
('20191211130448', '2019-12-11 13:04:59'),
('20191211130628', '2019-12-11 13:06:35');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

CREATE TABLE `persoon` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voorvoegsel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geboortedatum` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `hiring_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `straat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plaats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `persoon`
--

INSERT INTO `persoon` (`id`, `username`, `password`, `email`, `voorvoegsel`, `achternaam`, `geboortedatum`, `gender`, `roles`, `hiring_date`, `salary`, `straat`, `postcode`, `plaats`, `voornaam`) VALUES
(1, 'dylan', '$argon2id$v=19$m=65536,t=4,p=1$c1RqVGJmYi5nR3RqV1ZDQQ$NKBmLPnM0BuYqIxs746ZN5n/EXOIZLWHIgHmq4puuCA', 'dylan@mail.com', 'Dhr.', 'van der Hout', '2000-01-01', 'man', '[\"ROLE_ADMIN\"]', '2015-01-01', '2000.00', 'Molenstraat', '1234AB', 'Den Haag', 'Dylan'),
(3, 'hoi', '$argon2id$v=19$m=65536,t=4,p=1$S090cjVqSkxOaVVBdi9KNA$rmjJVRiH9fy2i/bzKfGkDJk/b0s3IzUUPZnjJIWFFNk', 'hoi@hoi.hoi', 'Dhr.', 'g', '1899-01-01', 'man', '[]', NULL, NULL, 'hoi', 'hoi', 'giu', 'g'),
(4, 'coen', '$argon2id$v=19$m=65536,t=4,p=1$NHNXdTNSUHNuN0xYeDRzNg$1wwPNxx4l7NHx2KUfARHlORnQUEp11TLoJ2pE142lXs', 'katlok@outlook.com', 'Dhr.', 'zuijderwijk', '1899-01-01', 'man', '[\"ROLE_ADMIN\"]', NULL, NULL, 'van scorel 7', '2681 NZ', 'Monster', 'coen'),
(5, 'f', '$argon2id$v=19$m=65536,t=4,p=1$eVJ3czZRRWc4Z1BHaWZjaA$ce8N6evWFjU+fYsLvUVOzTjbaNn6sFTYq2y61Yore6Y', 'f@f.f', 'Dhr.', 'f', '1899-02-01', 'man', '[]', NULL, NULL, 'f', 'ff', 'f', 'f'),
(6, 'ins', '$argon2id$v=19$m=65536,t=4,p=1$VlRqNEVQNS9EMWUwbHN2Ug$jCBt6CaNMXbBeOH3vQ/+aWAuDZ0FonUcwMiHWB2WE8c', 'isn@ins.ins', 'Dhr.', 'ins', '1899-01-01', 'man', '[]', NULL, NULL, 'in', 'in', 'i', 'ind'),
(7, 'l', '$argon2id$v=19$m=65536,t=4,p=1$SjVSWTZGelpjZVA3Ny44RA$i8r8v/VAoAxhH/v/eAFCdWJYV3DFCwakIYQux9pz92M', 'l@l.l', 'Dhr.', 'l', '1899-01-01', 'man', '[]', NULL, NULL, 'l', 'l', 'l', 'l'),
(9, 'o', '$argon2id$v=19$m=65536,t=4,p=1$cUVZaDM5YndFTm41cGkzdQ$Go8oQuzdmOS7LAVERG3pW2hCKHJxhqYd/PKn76OYoxA', 'o@o.o', 'Dhr.', 'o', '1899-10-01', 'man', '[\"ROLE_INSTRUCTEUR\"]', NULL, NULL, 'o', 'o', 'o', 'o');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `les_id` int(11) NOT NULL,
  `persoon_id` int(11) NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `registration`
--

INSERT INTO `registration` (`id`, `les_id`, `persoon_id`, `payment`) VALUES
(10, 1, 4, 'false'),
(11, 3, 4, 'false'),
(12, 3, 1, 'f'),
(13, 1, 1, 'f');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duur` time NOT NULL,
  `kosten` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `training`
--

INSERT INTO `training` (`id`, `naam`, `beschrijving`, `duur`, `kosten`) VALUES
(1, 'Stootzak training', 'Stootzak training', '01:00:00', '24.99'),
(3, 'Kickboxen', 'Kickboxen', '01:30:00', '17.50'),
(4, 'MMA', 'MMA', '01:45:00', '22.50');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F87474F3BEFD98D1` (`training_id`);

--
-- Indexen voor tabel `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_62A8A7A77FAC85EF` (`les_id`),
  ADD KEY `IDX_62A8A7A790FBB45F` (`persoon_id`);

--
-- Indexen voor tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `persoon`
--
ALTER TABLE `persoon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `FK_F87474F3BEFD98D1` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`);

--
-- Beperkingen voor tabel `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `FK_62A8A7A77FAC85EF` FOREIGN KEY (`les_id`) REFERENCES `lesson` (`id`),
  ADD CONSTRAINT `registration_persoon` FOREIGN KEY (`persoon_id`) REFERENCES `persoon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
