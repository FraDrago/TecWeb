-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 08, 2019 alle 11:33
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.0

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
(8, 'img/galleria/8.jpg', 'Un animale feroce!', 'piccolo cane con finta criniera di leone'),
(0, 'img/galleria/2n74tp.jpg', 'is good', 'this'),
(0, 'img/galleria/w2.png', 'tutto', 'hackero');

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
(1, 'Luned&igrave', '08:00:00', '18:00:00'),
(2, 'Marted&igrave', '08:00:00', '18:00:00'),
(3, 'Mercoled&igrave', '08:00:00', '16:00:00'),
(4, 'Gioved&igrave', '08:00:00', '18:00:00'),
(5, 'Venerd&igrave', '08:00:00', '18:00:00'),
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
  `ID` int(11) NOT NULL,
  `Name` tinytext NOT NULL,
  `Surname` tinytext NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID`, `Name`, `Surname`, `Telefono`, `Email`, `Password`, `Admin`) VALUES
(0, 'gilberto', 'filÃ¨', '12345', 'file@unipd.it', '8c7dd922ad47494fc02c388e12c00eac', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `ID` int(11) NOT NULL,
  `DataOra` datetime NOT NULL,
  `Prestazione` int(11) NOT NULL,
  `Utente` int(11) NOT NULL,
  `Note` varchar(400) NOT NULL,
  `tipo_animale` tinyint(1) DEFAULT NULL,
  `approvation` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
