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
-- Databas: `karim`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `blogg`
--

CREATE TABLE `blogg` (
  `id` int(11) NOT NULL,
  `rubrik` varchar(100) DEFAULT NULL,
  `inlagg` text NOT NULL,
  `tidstampel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `blogg`
--

INSERT INTO `blogg` (`id`, `rubrik`, `inlagg`, `tidstampel`) VALUES
(1, 'Testar nu med en databas', 'lksdlk nlkn Ã¶lkn cÃ¶aksjd nÃ¶skjvnaskÃ¶dj vnaskjvd askj vasv\r\ns v\r\nsadvs\r\nda v\r\navsd\r\nasvsdv', '2019-12-16 13:25:22'),
(2, 'Testar igen med en databas', '/* \r\nCREATE TABLE blogg (\r\n  id int(11) NOT NULL AUTO_INCREMENT,\r\n  rubrik varchar(100),\r\n  inlagg text NOT NULL,\r\n  tidstampel timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,\r\n  PRIMARY KEY (id)\r\n) ENGINE=InnoDB  DEFAULT CHARSET=utf8;\r\n*/', '2019-12-16 13:30:38'),
(3, 'Nu funkar inloggningen fint!', '        if (isset($_SESSION[&#39;login&#39;])) {\r\n            echo &#34;Du Ã¤r inloggad!&#34;;\r\n        } else {\r\n            if (isset($_POST[&#39;loggain&#39;])) { \r\n                echo &#34;Fel anvÃ¤ndarnamn eller lÃ¶senord. Vg fÃ¶rsÃ¶k igen!&#34;;\r\n            }\r\n        }', '2019-12-16 13:50:03'),
(4, 'Testar nu med en databas', 'echo &#34;Du Ã¤r inloggad!&#34;;', '2019-12-16 13:51:13'),
(5, 'Testar nu med en databas', 'echo &#34;Du Ã¤r inloggad!&#34;;', '2019-12-16 13:51:55');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blogg`
--
ALTER TABLE `blogg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
