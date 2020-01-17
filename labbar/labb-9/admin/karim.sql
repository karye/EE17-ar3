-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 17 jan 2020 kl 13:42
-- Serverversion: 5.7.28-0ubuntu0.18.04.4
-- PHP-version: 7.3.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `karim`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bilar`
--

CREATE TABLE `bilar` (
  `id` int(11) NOT NULL,
  `reg` char(10) NOT NULL,
  `marke` char(50) DEFAULT NULL,
  `modell` char(50) DEFAULT NULL,
  `arsmodell` int(11) DEFAULT NULL,
  `pris` int(11) DEFAULT NULL,
  `agare` int(11) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Dumpning av Data i tabell `bilar`
--

INSERT INTO `bilar` (`id`, `reg`, `marke`, `modell`, `arsmodell`, `pris`, `agare`) VALUES
(1, 'ABC123', 'Saab', '9-5', 2003, 130000, 1),
(2, 'ABC456', 'Volkswagen', 'Polo', 2003, 75000, 1),
(3, 'DEF123', 'Volvo', 'S-80', 2002, 140000, 2),
(4, 'DEF456', 'Toyota', 'Carina II', 1998, 30000, 2),
(5, 'GHI123', 'Mazda', '626', 2001, 80000, 3),
(6, 'JKL123', 'Audi', 'A8', 2001, 150000, 5),
(7, 'MNO123', 'BMW', '323', 1998, 60000, 5),
(8, 'PQR123', 'Ford', 'Mondeo', 2001, 90000, 4),
(9, 'STU123', 'Volvo', '740', 1987, 35000, 5),
(10, 'VYX123', 'Volkswagen', 'Golf', 1988, 40000, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `blog`
--

CREATE TABLE `blog` (
  `id` int(4) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rubrik` varchar(50) NOT NULL,
  `inlagg` text NOT NULL
) ENGINE=InnoDB;

--
-- Dumpning av Data i tabell `blog`
--

INSERT INTO `blog` (`id`, `datum`, `rubrik`, `inlagg`) VALUES
(7, '2020-01-13 07:34:47', 'Besök av rektor ', 'Ingrid tittar på en webblektion idag'),
(8, '2020-01-13 12:07:34', 'Tränat hämta från databas', 'Idag har vi tränat att hämta data frånn en tabell.\r\nSamma 4 steg som tidigare. Sen SQL satsen &#34;SELECT * FROM blog&#34;.'),
(9, '2020-01-17 07:45:07', 'Fredag', 'Idag ska vi implementera en fritextsökning.'),
(10, '2020-01-17 07:46:35', 'Fredag', 'Idag ska vi också implementera ett lösenordsskydd på admin! ');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Tabellstruktur `personer`
--

CREATE TABLE `personer` (
  `id` int(11) NOT NULL,
  `fnamn` char(50) DEFAULT NULL,
  `enamn` char(50) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Dumpning av Data i tabell `personer`
--

INSERT INTO `personer` (`id`, `fnamn`, `enamn`) VALUES
(1, 'Kalle', 'Anka'),
(2, 'Kajsa', 'Anka'),
(3, 'Knatte', 'Anka'),
(4, 'Tjatte', 'Anka'),
(5, 'Fnatte', 'Anka'),
(6, 'Knase', 'Anka'),
(7, 'Alexander', 'Lukas');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `bilar`
--
ALTER TABLE `bilar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg` (`reg`);

--
-- Index för tabell `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `personer`
--
ALTER TABLE `personer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `bilar`
--
ALTER TABLE `bilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT för tabell `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT för tabell `personer`
--
ALTER TABLE `personer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
