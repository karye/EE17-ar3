-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 09 jan 2020 kl 14:43
-- Serverversion: 5.7.28-0ubuntu0.18.04.4-log
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
-- Databas: `pontus`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bilar`
--

CREATE TABLE `bilar` (
  `reg` char(10) NOT NULL,
  `marke` char(50) DEFAULT NULL,
  `modell` char(50) DEFAULT NULL,
  `arsmodell` int(11) DEFAULT NULL,
  `pris` int(11) DEFAULT NULL,
  `agare` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `bilar`
--

INSERT INTO `bilar` (`reg`, `marke`, `modell`, `arsmodell`, `pris`, `agare`) VALUES
('ABC123', 'Saab', '9-5', 2003, 130000, 1),
('ABC456', 'Volkswagen', 'Polo', 2003, 75000, 1),
('DEF123', 'Volvo', 'S-80', 2002, 140000, 2),
('DEF456', 'Toyota', 'Carina II', 1998, 30000, 2),
('GHI123', 'Mazda', '626', 2001, 80000, 3),
('JKL123', 'Audi', 'A8', 2001, 150000, 5),
('MNO123', 'BMW', '323', 1998, 60000, 5),
('PQR123', 'Ford', 'Mondeo', 2001, 90000, 4),
('STU123', 'Volvo', '740', 1987, 35000, 5),
('VYX123', 'Volkswagen', 'Golf', 1988, 40000, 5);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `bilar`
--
ALTER TABLE `bilar`
  ADD PRIMARY KEY (`reg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
