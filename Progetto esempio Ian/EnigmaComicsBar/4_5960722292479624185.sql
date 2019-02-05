-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2019 alle 20:17
-- Versione del server: 5.6.33-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_enigmacomicsbar`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Commento`
--

CREATE TABLE IF NOT EXISTS `Commento` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Testo` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `Eventi_ID` int(3) NOT NULL,
  `Users_ID` int(3) NOT NULL,
  `Users_username` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Commento_Eventi1_idx` (`Eventi_ID`),
  KEY `fk_Commento_Users1_idx` (`Users_ID`,`Users_username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dump dei dati per la tabella `Commento`
--

INSERT INTO `Commento` (`ID`, `Testo`, `Eventi_ID`, `Users_ID`, `Users_username`) VALUES
(24, 'Ero giÃ  stato a una serata simile la scorsa settimana, tuttavia mi sono divertito lo stesso! Enigma Comics Bar Ã¨ sempre una garanzia', 29, 1, 'knai'),
(23, 'Serata veramente divertente, consiglio il panino SuperBurger.', 30, 1, 'knai'),
(26, 'Bella serata, un po'' affollata ma per il resto Ã¨ andato tutto bene', 28, 6, 'Ares'),
(28, 'Ã Ã Ã Ã Ã¹Ã¹Ã¹Ã¹Ã¨Ã¨Ã¨Ã¨Ã²Ã²Ã²Ã²', 29, 3, 'Admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `Contattaci`
--

CREATE TABLE IF NOT EXISTS `Contattaci` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `NumeroTelefono` varchar(15) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `FileImmagine` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `Contattaci`
--

INSERT INTO `Contattaci` (`ID`, `Nome`, `NumeroTelefono`, `Email`, `FileImmagine`) VALUES
(1, 'Kevin Spicy (Joker)', '339 126 9825', 'notkevinspacey@gmail.com', 'Joker.ico'),
(2, 'Leonardo Di Ciprio (Revenant)', '325 882 4397', 'thewolfofelmstreet@yahoo.com', 'Angry_Wolverine-512x512.png'),
(3, 'Scarlett Johnson (Black Widow)', '548 221 9374', 'hulkleftmesosad@hotmail.urss', 'BlackWidow.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `DoveSiamo`
--

CREATE TABLE IF NOT EXISTS `DoveSiamo` (
  `Indirizzo` varchar(100) NOT NULL,
  `DescrizioneStrada` text NOT NULL,
  PRIMARY KEY (`Indirizzo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `DoveSiamo`
--

INSERT INTO `DoveSiamo` (`Indirizzo`, `DescrizioneStrada`) VALUES
('Via Fasulla, 123, Firenze, Italia', 'Il locale si trova nella zona di Piazza Pitti, lungo la strada verso Ponte Vecchio, e affaccia il Palazzo Pitti.');

-- --------------------------------------------------------

--
-- Struttura della tabella `Drinks`
--

CREATE TABLE IF NOT EXISTS `Drinks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Immagine` varchar(100) DEFAULT NULL,
  `Descrizione` text NOT NULL,
  `Prezzo` float NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Nome` (`Nome`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=16 ;

--
-- Dump dei dati per la tabella `Drinks`
--

INSERT INTO `Drinks` (`ID`, `Nome`, `Immagine`, `Descrizione`, `Prezzo`) VALUES
(10, 'Vodka 1', 'Vodka_1.jpg', 'Vodka alla pera, liquore al cioccolato, vaniglia, succo di lime, Sambuca e spuma di limone.', 5),
(8, 'Gin', 'Gin.png', 'Gin, mango, guava, vaniglia, lime, pompelmo e albume dâ€™uovo.', 5),
(11, 'Vodka 3', 'Vodka_2.png', 'Vodka, frutto della passione, sciroppo di miele, lime, zenzero, albume dâ€™uovo e cannella.', 5),
(12, 'Vodka 2', 'Vodka_3.jpg', 'Vodka, Martini Dry, purea di anguria e zucchero di canna.', 5),
(13, 'Rum bianco', 'Rum_1.png', 'Rum bianco, liquore al litchi, sciroppo al cioccolato bianco, succo di lime, purea di more, rosmarino e albume dâ€™uovo.', 5),
(14, 'Rum', 'Rum_2.jpg', 'Rum, succo dâ€™ananas, acqua di cocco, vaniglia, lime e panna montata.', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `Eventi`
--

CREATE TABLE IF NOT EXISTS `Eventi` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Descrizione` text NOT NULL,
  `Immagine` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dump dei dati per la tabella `Eventi`
--

INSERT INTO `Eventi` (`ID`, `Data`, `Ora`, `Nome`, `Descrizione`, `Immagine`) VALUES
(28, '2018-02-17', '20:00:00', 'MTG Pre-release', 'Vi aspettiamo numerosi per il pre-release di Rivals of Ixilan, premi garantiti per tutti! \r\nIscrizione:10â‚¬', 'rivalsix.jpg'),
(29, '2018-02-16', '21:00:00', 'Serata Karaoke', 'Passa una divertente serata cantando a squarcia gola le tue canzoni preferite, il tutto accompagnato da del buon cibo.', 'Kar.jpg'),
(30, '2018-02-27', '21:00:00', 'Serata Country', 'Grande serata con balli stile country! Non mancate!', 'country.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `Panini`
--

CREATE TABLE IF NOT EXISTS `Panini` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Immagine` varchar(100) DEFAULT NULL,
  `Ingredienti` text NOT NULL,
  `Prezzo` float NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Nome` (`Nome`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=23 ;

--
-- Dump dei dati per la tabella `Panini`
--

INSERT INTO `Panini` (`ID`, `Nome`, `Immagine`, `Ingredienti`, `Prezzo`) VALUES
(9, 'FlashBurger', 'Flash_Burger.jpg', 'Hamburger con julienne di cipolla arrostita, formaggio fuso e bacon grigliato servito con patate French Fries.', 9),
(13, 'HulkBurger', 'HulkBurger.jpg', 'Hamburger, formaggio Camembert, bacon croccante, cipolla caramellata, spinacino e salsa Enigma servito con patate Dippers.', 9.5),
(12, 'CatBurger', 'CatBurger.jpg', 'Hamburger, formaggio fuso, bacon croccante, cipolla caramellata, pomodoro, insalata iceberg e salsa Barbecue, servito con patate Dippers.', 10),
(10, 'SuperBurger', 'SuperBurger.jpg', 'Hamburger, formaggio Grana Padano, bacon grigliato, pomodoro, lattuga e salsa Enigma servito con patate French Fries.', 9),
(17, 'BatBurger', 'BatBurger.jpg', 'Hamburger, bacon grigliato, anelli di cipolla, lattuga e salsa Barbecue, servito con patate Dippers. ', 9.5),
(14, 'JokerChicken', 'JokerChicken.jpg', 'Cotoletta di pollo panata con insalata, pomodoro, bacon grigliato e salsa Caesar servito con patate French Fries.', 9),
(15, 'SpiderChicken', 'SpiderChicken.jpg', 'Petto di pollo alla griglia con bacon grigliato, formaggio fuso, insalata e salsa Enigma servito con patate French Fries.', 8.5);

-- --------------------------------------------------------

--
-- Struttura della tabella `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Name` tinytext NOT NULL,
  `Surname` tinytext NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `Users`
--

INSERT INTO `Users` (`ID`, `Name`, `Surname`, `Username`, `Email`, `Password`, `Admin`) VALUES
(1, 'ian', 'thecoolest', 'knai', 'ahahah@boh.it', '6e6bc4e49dd477ebc98ef4046c067b5f', NULL),
(2, 'ad', 'za', 'asd', 'adasd@live.it', 'ciao', NULL),
(3, 'Enigma', 'Comics', 'Admin', 'admin@enigma.bar', 'b99899489259d61ad72ee322ab20a1d9', 1),
(4, 'ciao', 'ciao', 'ciao', 'ciao@a', '6e6bc4e49dd477ebc98ef4046c067b5f', NULL),
(5, 'Nicola', 'Zorzo', 'nicola', 'nicola@live.it', '6e6bc4e49dd477ebc98ef4046c067b5f', NULL),
(6, 'Ares', 'Dem', 'Ares', 'ares@dem.aa', '16272a5dd83c63010e9f67977940e871', NULL),
(7, 'lol', 'lol', 'lol', 'boh@prova.com', '9cdfb439c7876e703e307864c9167a15', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
