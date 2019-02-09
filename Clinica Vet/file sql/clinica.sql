-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 08, 2019 alle 14:08
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
(8, 'img/galleria/8.jpg', 'Un animale feroce!', 'piccolo cane con finta criniera di leone');

-- --------------------------------------------------------

--
-- Struttura della tabella `emergenze`
--

CREATE TABLE `emergenze` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `alt` varchar(400) DEFAULT NULL,
  `Descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `emergenze`
--

INSERT INTO `emergenze` (`id`, `name`, `Path`, `alt`, `Descrizione`) VALUES
('calore', 'Colpo di Calore', 'img/calore.jpg', 'foto di un cane accaldato', 'Il colpo di calore &egrave un\'\'emergenza per cani e gatti da conoscere e non sottovalutare. Questa problematica si riscontra soprattutto nei <span class=\'highlight\'>soggetti anziani</span> e nei <span class=\'highlight\'>soggetti obesi</span>.\r\n La temperatura normale dei cani e dei gatti si aggira attorno ai 38-38,5 °C, mentre l’ipertemia grave si verifica quando la temperatura rettale supera i 41,5°C.\r\n  I segni clinici che si possono manifestare sono: <span class=\'highlight\'>iperemia delle mucose, tachicardia e respirazione affannosa</span>. Se la situazione &egrave più grave possono subentrare: <span class=\'highlight\'>incoordinazione motoria, tremori muscolari,vomito, diarrea, ipersalivazione, perdita di coscienza e crisi convulsive</span>.\r\n  <span class=\'highlight\'>Rimedi utili: bagni con acqua fresca o panni bagnati (nota bene: acqua ghiacciata o ghiaccio potrebbero aggravare la situazione).</span>\r\n  A questo punto sarà fondamentale <strong><span class=\'highlight\'>portare l\'\'animale dal veterinario</strong></span> che proceder&agrave a ripristinare e sostenere il normale ritmo cardiaco, la pressione arteriosa, la diuresi e lo stato del sensorio.'),
('vomito', 'Vomito e diarrea', 'img/vomito.jpg', 'Foto di un cane ammalato', 'Il <em><span class=\'highlight2\'>vomito</span></em> può essere un fatto episodico indotto dall’<span class=\'highlight\'>ingestione di peli, agenti irritanti, troppo cibo o bocconi troppo grossi</span>, ma anche <span class=\'highlight\'>effetto di una patologia</span>, in particolar modo se accompagnato da comportamenti anomali, disorientamento, disturbi dell’equilibrio. In caso di vomito è importante <strong><span class=\'highlight\'>mantenere l’animale a digiuno e controllato per 12 o 24 ore, inducendolo però a bere poco e spesso</span></strong>.\r\n  La <em><span class=\'highlight2\'>diarrea</span></em> invece può essere causata da <span class=\'highlight\'>parassiti intestinali</span> (alcune volte riconoscibili nelle feci espulse).\r\n  Si consiglia quindi di <span class=\'highlight>interrompere l’alimentazione abituale</span>, di somministrare eventualmente un’ alimentazione commerciale altamente digeribile e il prima possibile di <span class=\'highlight\'>raccogliere un campione di feci</span> per portarlo ad analizzare dal veterinario.'),
('unghie', 'Unghia spezzata', 'img/unghia.jpg', 'Foto di una zampa di cane', 'La rottura di un’unghia può avvenire per strappamento accidentale; normalmente il proprietario si accorge immediatamente in caso di perdita di sangue, oppure perché il cane/gatto non appoggia più l’arto.\r\n Quando accade si deve <span class=\'highlight\'>tagliare l’unghia nel punto di rottura</span> e successivamente <span class=\'highlight\'>lavare la parte con soluzione fisiologica, applicare poi un bendaggio</span>. In alcuni casi potrebbe essere indispensabile somministrare un <strong><span class=\'highlight2\'>antibiotico</span></strong> che verrà prescritto dal medico veterinario.'),
('morso', 'Morso di cane o di gatto', 'img/morso.jpg', 'Foto di un gatto che morde una mano', 'E’ importante sapere che la cavità orale dei cani e dei gatti ha una concentrazione batterica elevatissima, quindi <span class=\'highlight\'>il morso è particolarmente infetto</span>.\r\n  Normalmente ciò che appare a livello cutaneo è solo la punta di un iceberg, le <span class=\'highlight\'>lesioni sottostanti</span> da strappamento sono molto frequenti. In questo caso è utile <span class=\'highlight\'>depilare la parte interessata con ampio margine, disinfettare utilizzando soluzioni diluite a base di iodio vinil pirrolidone (betadine) e lavare abbondantemente con soluzione fisiologica</span>. L’utilizzo di <strong><span class=\'highlight2\'>terapie antibiotiche</span></strong> risulta quasi sempre opportuno ed è quindi consigliabile, appena possibile, rivolgersi ad un veterinario.'),
('puntura', 'Puntura d\'\'insetto', 'img/puntura.jpg', 'Foto di un cane e un\'\'ape', 'Le punture d’insetto spesso provocano reazioni allergiche che determinano un <span class=\'highlight\'>rigonfiamento dell’area</span> che è stata colpita. Nella maggior parte dei casi la zona più interessata è quella del muso dove si verifica un ispessimento delle labbra. \r\n  Il sintomo più comune è lo strofinamento del muso per terra o il grattamento con le zampe.\r\n  E’ possibile <strong><span class=\'highlight2\'>somministrare corticosteroidi a pronto utilizzo dopo aver contattato telefonicamente il veterinario</span></strong>.\r\n  Se però la sintomatologia risulta grave è bene recarsi in clinica per controlli.'),
('spighe', 'Spighe nelle orecchie o nelle zampe', 'img/forasacchi.jpg', 'Foto di una spiga', 'I <em>forasacchi</em> sono diffusi in campagna e nel periodo estivo. Questi corpi aderiscono molto facilmente al pelo del cane o del gatto, penetrando con facilità nella cute.\r\n Se la spiga si è infilata tra le zampe, il cane o il gatto può manifestare zoppia; se la spiga si è infilata nell’orecchio, l’animale scuote le orecchie e rotea la testa.\r\n  In entrambi i casi è possibile controllare <span class=\'highlight\'>se la spiga è visibile e in questo caso estrarla</span>.\r\n Quando invece la penetrazione avviene nella sottocute può generare delle fistole interdigitali che tendono a non rimarginare: in tal caso, è possibile tamponare la situazione con <span class=\'highlight\'>bagni in soluzione salina satura utilizzando acqua tiepida</span>. Se la situazione perdura e non migliora è necessaria la visita medica.\r\n  <span class=\'highlight\'>Quando penetra nel condotto uditivo <strong><span class=\'highlight\'>non</span></strong> bisogna cercare di rimuoverla</span>, solo il medico veterinario può intervenire.'),
('ingestione', 'Ingestione di sostanze tossiche', 'img/tossiche.jpg', 'Foto di un gatto davanti ad un bicchiere', 'Se si sospetta l’ingestione di una sostanza tossica sarà bene <strong><span class=\'highlight2\'>informare tempestivamente il veterinario</span></strong>.\r\n I sintomi variano a seconda della sostanza ingerita, ma i più frequenti sono: <span class=\'highlight\'>vomito, diarrea profusa a volte con sangue, abbattimento del sensorio, tremori muscolari, convulsioni, scialorrea (ipersalivazione)</span>>.\r\n  Nel caso di ingestione di rodenticidi (veleno per topi) si formano spesso ematomi e compare una debolezza generalizzata.\r\n  Se si tratta di farmaci o veleni <span class=\'highlight\'>è bene indurre il vomito al più presto</span> e non somministrare latte. <strong><span class=\'highlight2\'>Se sono trascorsi più di 20 minuti non dev’essere indotto il vomito, ma è fondamentale portare l’animale il prima possibile dal veterinario.</span></strong>'),

-- --------------------------------------------------------

--
-- Struttura della tabella `emergenzeindice`
--

CREATE TABLE `emergenzeindice` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `alt` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `emergenzeindice`
--

INSERT INTO `emergenzeindice` (`id`, `name`, `Path`, `alt`) VALUES
('calore', 'Colpo di Calore', 'img/calore.jpg', 'foto di un cane accaldato'),
('vomito', 'Vomito e Diarrea', 'img/vomito.jpg', 'Foto di un cane ammalato'),
('unghie', 'Unghia spezzata', 'img/unghia.jpg', 'Foto di una zampa di cane'),
('morso', 'Morso di cane o gatto', 'img/morso.jpg', 'Foto di un gatto che morde una mano'),
('puntura', 'Puntura di insetto', 'img/puntura.jpg', 'Foto di un cane e un\'\'ape'),
('spighe', 'Spighe nelle orecchie', 'img/forasacchi.jpg', 'Foto di una spiga'),
('ingestione', 'Ingestione di sostanze tossiche', 'img/tossiche.jpg', 'Foto di un gatto davanti ad un bicchiere');

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

-- --------------------------------------------------------

--
-- Struttura della tabella `piante`
--

CREATE TABLE `piante` (
  `name` varchar(50) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `alt` varchar(400) DEFAULT NULL,
  `PartiTossiche` varchar(200) NOT NULL,
  `Sintomatologia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `piante`
--

INSERT INTO `piante` (`name`, `Path`, `alt`, `PartiTossiche`, `Sintomatologia`) VALUES
('Rododendro', 'img/rodo1.jpg', 'pianta di rododendro', 'foglie e fiori.', 'omito-sintomi nervosi.'),
('Colchico', 'img/colch.jpg', 'pianta di colchico', 'tutta la pianta.', 'irritazione gastroenterica.'),
('Euforbia', 'img/eufo.jpg', 'pianta di euforbia', 'tutta la pianta.', 'irritazione gastroenterica.'),
('Stella di Natale', 'img/stell.jpg', 'pianta di stella di natale', 'foglie e fiori.', 'irritazione gastroenterica.'),
('Ortensia', 'img/ortens.jpg', 'pianta di ortensia', 'foglie e fiori.', 'dolori gastrici, vomito e diarrea.'),
('Edera', 'img/edera.jpg', 'pianta di edera', 'tutta la pianta.', 'irritazione gastroenterica, a dosi elevate depressione nervosa e cardiaca.'),
('Oleandro', 'img/olea.jpg', 'pianta di oleandro', 'tutta la pianta.', 'irritazione gastroenterica, depressione del sistema nervoso e del cuore.'),
('Filodendro', 'img/filo.jpg', 'pianta di filodendro', 'foglie e fusto.', 'irritazione gastroenterica.'),
('Dieffenbachia', 'img/dieffe2.jpg', 'pianta dieffenbachia', 'fusto e apici.', 'forte irritazione di bocca, esofago, stomaco, intestino (lattice irritante).'),
('Tulipano', 'img/tulip.jpg', 'fiore di tulipano', 'masticazione o ingestione di bulbi.', 'vomito, salivazione, diarrea con coliche, dispnea, tachicardia, debolezza.');

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

-- --------------------------------------------------------

--
-- Struttura della tabella `visita`
--

CREATE TABLE `visita` (
  `ID` int(11) NOT NULL,
  `DataOra` datetime NOT NULL,
  `Prestazione` int(11) NOT NULL,
  `Utente` int(11) NOT NULL,
  `approvazione` tinyint(1) NOT NULL,
  `gatto_or_cane` tinyint(1) NOT NULL,
  `Note` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `galleria`
--
ALTER TABLE `galleria`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `orari`
--
ALTER TABLE `orari`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `prestazione`
--
ALTER TABLE `prestazione`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `galleria`
--
ALTER TABLE `galleria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `orari`
--
ALTER TABLE `orari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `prestazione`
--
ALTER TABLE `prestazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
