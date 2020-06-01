-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 08 maj 2020 kl 09:42
-- Serverversion: 5.7.28-0ubuntu0.18.04.4-log
-- PHP-version: 7.4.2

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
-- Tabellstruktur `blog`
--

CREATE TABLE `blog` (
  `id` int(4) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rubrik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inlagg` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `blog`
--

INSERT INTO `blog` (`id`, `datum`, `rubrik`, `inlagg`) VALUES
(11, '2020-01-13 07:34:47', 'Besök av rektor ', 'Ingrid tittar på en webblektion idag'),
(12, '2020-01-13 12:07:34', 'Tränat hämta från databas', 'Idag har vi tränat att hämta data frånn en tabell.\r\nSamma 4 steg som tidigare. Sen SQL satsen &#34;SELECT * FROM blog&#34;.'),
(13, '2020-01-17 07:45:07', 'Fredag', 'Idag ska vi implementera en fritextsökning.'),
(14, '2020-01-17 07:46:35', 'Fredag', 'Idag ska vi också implementera ett lösenordsskydd på admin! '),
(15, '2020-05-01 06:42:27', 'Testar OOP PHP', 'class Blogg\r\n{\r\n    private $conn;\r\n\r\n    /* Konstruktorn */\r\n    public function __construct($conn)\r\n    {\r\n        $this->conn = $conn;\r\n    }'),
(16, '2020-05-01 06:43:59', 'Testar bloggen som OOP', '    public function skriva($rubrik, $inlägg)\r\n    {\r\n        $sql = &#34;INSERT INTO blog (rubrik, inlagg) VALUES (&#39;$rubrik&#39;, &#39;$inlägg&#39;)&#34;;\r\n        $result = $this->conn->query($sql);\r\n\r\n        /* Gick det bra? */\r\n        if (!$result) {\r\n            die(&#34;Något blev fel med SQL-satsen.&#34;);\r\n        }\r\n\r\n        $this->conn->close();\r\n\r\n        /* Returnerar id på registrerade posten i tabellen */\r\n        return $this->conn->insert_id;\r\n    }'),
(17, '2020-05-01 06:45:37', 'Testar OOP PHP', '\r\n    public function skriva($rubrik, $inlägg)\r\n    {\r\n        $sql = &#34;INSERT INTO blog (rubrik, inlagg) VALUES (&#39;$rubrik&#39;, &#39;$inlägg&#39;)&#34;;\r\n        $result = $this->conn->query($sql);\r\n\r\n        /* Gick det bra? */\r\n        if (!$result) {\r\n            die(&#34;Något blev fel med SQL-satsen.&#34;);\r\n        }\r\n\r\n        /* Returnerar id på registrerade posten i tabellen */\r\n        return $this->conn->insert_id;\r\n\r\n        $this->conn->close();\r\n    }');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
