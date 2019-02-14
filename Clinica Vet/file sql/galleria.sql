-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 13, 2019 alle 18:36
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
-- Struttura della tabella `galleria`
--

CREATE TABLE `galleria` (
  `id` int(11) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `descrizione` varchar(400) DEFAULT NULL,
  `alt` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `galleria`
--

INSERT INTO `galleria` (`id`, `Path`, `descrizione`, `alt`) VALUES
(1, 'img/galleria/4.jpg', 'Zuzzulo e Lilli da Padova', 'Foto di un cane ed un gatto vicini'),
(2, 'img/galleria/1.jpg', 'Giggi osserva attentamente il cielo', 'gattino nero guarda il cielo'),
(3, 'img/galleria/2.jpg', 'A Laica piace la natura', 'cane davanti ad un paesaggio naturale'),
(4, 'img/galleria/3.jpg', 'Sandie e Lollo sul divano!', 'un gatto ed un cane su un divano'),
(5, 'img/galleria/5.jpg', 'Mocio ? stanco di lavorare', 'cane disteso su pavimento'),
(6, 'img/galleria/7.jpg', 'Una bella giornata al sole', 'gatto in giardino al sole'),
(7, 'img/galleria/6.jpg', 'Oggi non si esce di casa!', 'cane avvolto in una coperta'),
(8, 'img/galleria/8.jpg', 'Un animale feroce!', 'piccolo cane con finta criniera di leone');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `galleria`
--
ALTER TABLE `galleria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
