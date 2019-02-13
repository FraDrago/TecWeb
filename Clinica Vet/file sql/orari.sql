-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 13, 2019 alle 17:14
-- Versione del server: 5.7.17
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `orari`
--

CREATE TABLE `orari` (
  `ID` int(11) NOT NULL,
  `Giorno` text NOT NULL,
  `OrariStart` time NOT NULL,
  `OrariEnd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `orari`
--

INSERT INTO `orari` (`ID`, `Giorno`, `OrariStart`, `OrariEnd`) VALUES
(1, 'Luned&igrave;', '08:00:00', '18:00:00'),
(2, 'Marted&igrave;', '08:00:00', '18:00:00'),
(3, 'Mercoled&igrave;', '08:00:00', '16:00:00'),
(4, 'Gioved&igrave;', '08:00:00', '18:00:00'),
(5, 'Venerd&igrave;', '08:00:00', '18:00:00'),
(6, 'Sabato', '10:00:00', '12:00:00'),
(7, 'Domenica', '10:00:00', '12:00:00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `orari`
--
ALTER TABLE `orari`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `orari`
--
ALTER TABLE `orari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
