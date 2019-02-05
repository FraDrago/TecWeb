-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 05, 2019 alle 12:05
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica_no_galleria_orari`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `animali`
--

CREATE TABLE `animali` (
  `ID` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `utente` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `galleria`
--

CREATE TABLE `galleria` (
  `id` int(11) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `descrizione` varchar(400) DEFAULT NULL,
  `alt` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `galleria`
--

INSERT INTO `galleria` (`id`, `Path`, `descrizione`, `alt`) VALUES
(1, 'img/galleria/4.jpg', 'Zuzzulo e Lilli da Padova', 'Foto di un cane ed un gatto vicini'),
(2, 'img/galleria/1.jpg', 'Giggi osserva attentamente il cielo', 'gattino nero guarda il cielo'),
(3, 'img/galleria/2.jpg', 'A Laica piace la natura', 'cane davanti ad un paesaggio naturale'),
(4, 'img/galleria/3.jpg', 'Sandie e Lollo sul divano!', 'un gatto ed un cane su un divano'),
(5, 'img/galleria/5.jpg', 'Mocio è stanco di lavorare', 'cane disteso su pavimento'),
(6, 'img/galleria/7.jpg', 'Una bella giornata al sole', 'gatto in giardino al sole'),
(7, 'img/galleria/6.jpg', 'Oggi non si esce di casa!', 'cane avvolto in una coperta'),
(8, 'img/galleria/8.jpg', 'Un animale feroce!', 'piccolo cane con finta criniera di leone');

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
(1, 'Lunedì', '08:00:00', '18:00:00'),
(2, 'Martedì', '08:00:00', '18:00:00'),
(3, 'Mercoledì', '08:00:00', '16:00:00'),
(4, 'Giovedì', '08:00:00', '18:00:00'),
(5, 'Venerdì', '08:00:00', '18:00:00'),
(6, 'Sabato', '10:00:00', '12:00:00'),
(7, 'Domenica', '10:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `prestazione`
--

CREATE TABLE `prestazione` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Descrizione` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `Codicefiscale` varchar(16) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `ID` int(11) NOT NULL,
  `DataOra` datetime NOT NULL,
  `Prestazione` int(11) NOT NULL,
  `Animale` int(11) NOT NULL,
  `Microchip` tinyint(1) NOT NULL,
  `Utente` varchar(25) NOT NULL,
  `Note` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `animali`
--
ALTER TABLE `animali`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `utente` (`utente`);

--
-- Indici per le tabelle `galleria`
--
ALTER TABLE `galleria`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prestazione`
--
ALTER TABLE `prestazione`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Prestazione` (`Prestazione`),
  ADD KEY `Utente` (`Utente`),
  ADD KEY `Animale` (`Animale`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `animali`
--
ALTER TABLE `animali`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `prestazione`
--
ALTER TABLE `prestazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `animali`
--
ALTER TABLE `animali`
  ADD CONSTRAINT `animali_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`);

--
-- Limiti per la tabella `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`Prestazione`) REFERENCES `prestazione` (`ID`),
  ADD CONSTRAINT `visita_ibfk_2` FOREIGN KEY (`Utente`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `visita_ibfk_3` FOREIGN KEY (`Animale`) REFERENCES `animali` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
