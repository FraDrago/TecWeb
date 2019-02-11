-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 11, 2019 alle 15:01
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
('calore', 'Colpo di Calore', 'img/calore.jpg', 'foto di un cane accaldato', 'Il colpo di calore &egrave un\'emergenza per cani e gatti da conoscere e non sottovalutare. Questa problematica si riscontra soprattutto nei <span class=\'highlight\'>soggetti anziani</span> e nei <span class=\'highlight\'>soggetti obesi</span>.\r\n La temperatura normale dei cani e dei gatti si aggira attorno ai 38-38,5 gradi, mentre l\'ipertemia grave si verifica quando la temperatura rettale supera i 41,5 gradi.\r\n  I segni clinici che si possono manifestare sono: <span class=\'highlight\'>iperemia delle mucose, tachicardia e respirazione affannosa</span>. Se la situazione &egrave pi&ugrave grave possono subentrare: <span class=\'highlight\'>incoordinazione motoria, tremori muscolari,vomito, diarrea, ipersalivazione, perdita di coscienza e crisi convulsive</span>.\r\n  <span class=\'highlight\'>Rimedi utili: bagni con acqua fresca o panni bagnati (nota bene: acqua ghiacciata o ghiaccio potrebbero aggravare la situazione).</span>\r\n  A questo punto sar&agrave fondamentale <strong><span class=\'highlight\'>portare l\'\'animale dal veterinario</strong></span> che proceder&agrave a ripristinare e sostenere il normale ritmo cardiaco, la pressione arteriosa, la diuresi e lo stato del sensorio.'),
('vomito', 'Vomito e diarrea', 'img/vomito.jpg', 'Foto di un cane ammalato', 'Il <em><span class=\'highlight2\'>vomito</span></em> pu&ograve essere un fatto episodico indotto dall\'<span class=\'highlight\'>ingestione di peli, agenti irritanti, troppo cibo o bocconi troppo grossi</span>, ma anche <span class=\'highlight\'>effetto di una patologia</span>, in particolar modo se accompagnato da comportamenti anomali, disorientamento, disturbi dell\'equilibrio. In caso di vomito &egrave importante <strong><span class=\'highlight\'>mantenere l\'animale a digiuno e controllato per 12 o 24 ore, inducendolo per&ograve a bere poco e spesso</span></strong>.\r\n  La <em><span class=\'highlight2\'>diarrea</span></em> invece pu&ograve essere causata da <span class=\'highlight\'>parassiti intestinali</span> (alcune volte riconoscibili nelle feci espulse).\r\n  Si consiglia quindi di <span class=\'highlight>interrompere l’alimentazione abituale</span>, di somministrare eventualmente un\' alimentazione commerciale altamente digeribile e il prima possibile di <span class=\'highlight\'>raccogliere un campione di feci</span> per portarlo ad analizzare dal veterinario.'),
('unghie', 'Unghia spezzata', 'img/unghia.jpg', 'Foto di una zampa di cane', 'La rottura di un\'unghia pu&ograve avvenire per strappamento accidentale; normalmente il proprietario si accorge immediatamente in caso di perdita di sangue, oppure perch&eacute il cane/gatto non appoggia pi&ugrave l\'arto.\r\n Quando accade si deve <span class=\'highlight\'>tagliare l\'unghia nel punto di rottura</span> e successivamente <span class=\'highlight\'>lavare la parte con soluzione fisiologica, applicare poi un bendaggio</span>. In alcuni casi potrebbe essere indispensabile somministrare un <strong><span class=\'highlight2\'>antibiotico</span></strong> che verr&agrave prescritto dal medico veterinario.'),
('morso', 'Morso di cane o di gatto', 'img/morso.jpg', 'Foto di un gatto che morde una mano', '&Egrave importante sapere che la cavit&agrave orale dei cani e dei gatti ha una concentrazione batterica elevatissima, quindi <span class=\'highlight\'>il morso &egrave particolarmente infetto</span>.\r\n  Normalmente ci&ograve che appare a livello cutaneo &egrave solo la punta di un iceberg, le <span class=\'highlight\'>lesioni sottostanti</span> da strappamento sono molto frequenti. In questo caso &egrave utile <span class=\'highlight\'>depilare la parte interessata con ampio margine, disinfettare utilizzando soluzioni diluite a base di iodio vinil pirrolidone (betadine) e lavare abbondantemente con soluzione fisiologica</span>. L\'utilizzo di <strong><span class=\'highlight2\'>terapie antibiotiche</span></strong> risulta quasi sempre opportuno ed &egrave quindi consigliabile, appena possibile, rivolgersi ad un veterinario.'),
('puntura', 'Puntura d\'\'insetto', 'img/puntura.jpg', 'Foto di un cane e un\'\'ape', 'Le punture d\'insetto spesso provocano reazioni allergiche che determinano un <span class=\'highlight\'>rigonfiamento dell\'area</span> che &egrave stata colpita. Nella maggior parte dei casi la zona pi&ugrave interessata &egrave quella del muso dove si verifica un ispessimento delle labbra. \r\n  Il sintomo pi&ugrave comune &egrave lo strofinamento del muso per terra o il grattamento con le zampe.\r\n  &Egrave possibile <strong><span class=\'highlight2\'>somministrare corticosteroidi a pronto utilizzo dopo aver contattato telefonicamente il veterinario</span></strong>.\r\n  Se per&ograve la sintomatologia risulta grave &egrave bene recarsi in clinica per controlli.'),
('spighe', 'Spighe nelle orecchie o nelle zampe', 'img/forasacchi.jpg', 'Foto di una spiga', 'I <em>forasacchi</em> sono diffusi in campagna e nel periodo estivo. Questi corpi aderiscono molto facilmente al pelo del cane o del gatto, penetrando con facilit&agrave nella cute.\r\n Se la spiga si &egrave infilata tra le zampe, il cane o il gatto pu&ograve manifestare zoppia; se la spiga si &egrave infilata nell\'orecchio, l\'animale scuote le orecchie e rotea la testa.\r\n  In entrambi i casi &egrave possibile controllare <span class=\'highlight\'>se la spiga &egrave visibile e in questo caso estrarla</span>.\r\n Quando invece la penetrazione avviene nella sottocute pu&ograve generare delle fistole interdigitali che tendono a non rimarginare: in tal caso, &egrave possibile tamponare la situazione con <span class=\'highlight\'>bagni in soluzione salina satura utilizzando acqua tiepida</span>. Se la situazione perdura e non migliora &egrave necessaria la visita medica.\r\n  <span class=\'highlight\'>Quando penetra nel condotto uditivo <strong><span class=\'highlight\'>non</span></strong> bisogna cercare di rimuoverla</span>, solo il medico veterinario pu&ograve intervenire.'),
('ingestione', 'Avvelenamento', 'img/tossiche.jpg', 'Foto di un gatto davanti ad un bicchiere', 'Se si sospetta l\'ingestione di una sostanza tossica sar&agrave bene <strong><span class=\'highlight2\'>informare tempestivamente il veterinario</span></strong>.\r\n I sintomi variano a seconda della sostanza ingerita, ma i pi&ugrave frequenti sono: <span class=\'highlight\'>vomito, diarrea profusa a volte con sangue, abbattimento del sensorio, tremori muscolari, convulsioni, scialorrea (ipersalivazione)</span>.\r\n  Nel caso di ingestione di rodenticidi (veleno per topi) si formano spesso ematomi e compare una debolezza generalizzata.\r\n  Se si tratta di farmaci o veleni <span class=\'highlight\'>&egrave bene indurre il vomito al pi&ugrave presto</span> e non somministrare latte. <strong><span class=\'highlight2\'>Se sono trascorsi pi&ugrave di 20 minuti non dev\'essere indotto il vomito, ma bisogna portare subito l\'animale dal veterinario.</span></strong>');

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
('ingestione', 'Avvelenamento', 'img/tossiche.jpg', 'Foto di un gatto davanti ad un bicchiere');

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
(1, 'Luned&igrave', '08:00:00', '18:00:00'),
(2, 'Marted&igrave', '08:00:00', '18:00:00'),
(3, 'Mercoled&igrave', '08:00:00', '16:00:00'),
(4, 'Gioved&igrave', '08:00:00', '18:00:00'),
(5, 'Venerd&igrave', '08:00:00', '18:00:00'),
(6, 'Sabato', '10:00:00', '12:00:00'),
(7, 'Domenica', '10:00:00', '12:00:00');

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
('Rododendro', 'img/rodo1.jpg', 'pianta di rododendro', 'foglie e fiori.', 'vomito-sintomi nervosi.'),
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
-- Struttura della tabella `prestazione`
--

CREATE TABLE `prestazione` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Descrizione` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prestazione`
--

INSERT INTO `prestazione` (`ID`, `Nome`, `Descrizione`) VALUES
(1, 'Vaccino', 'Vaccino contro possibili forme virali'),
(2, 'Aggiunta Microchip', 'Il microchip serve per monitorare in tempo reale lo stato di salute del vostro animale');

-- --------------------------------------------------------

--
-- Struttura della tabella `servizi`
--

CREATE TABLE `servizi` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alt` varchar(400) DEFAULT NULL,
  `Path` varchar(200) NOT NULL,
  `Descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `servizi`
--

INSERT INTO `servizi` (`id`, `name`, `alt`, `Path`, `Descrizione`) VALUES
('ricovero', 'Ricovero e Terapia intensiva', 'immagine di una veterinaria che si prende cura di cane disteso su un lettino', 'img/ricovero.jpg', 'I pazienti destinati al <span class=\'highlight\'>ricovero</span> sono quelli affetti da patologie di una certa gravit&agrave che necessitano di terapie intensive non somministrabili a casa dal proprietario. All\'interno della nostra Clinica assicuriamo ai nostri pazienti dei ricoveri per permettere un corretto <span class=\'highlight\'>monitoraggio</span> durante il post operatorio e garantendo tutte le cure del caso.\r\n   Il personale medico, presente <strong><span class=\'highlight2\'> 24 ore su 24</span></strong>, permette una assistenza continua agli animali che necessitano di cure costanti, come per esempio <span class=\'highlight\'>fluidoterapia</span>, <span class=\'highlight\'>somministrazione di farmaci per via endovenosa</span>, <span class=\'highlight\'>supporto nutrizionale</span> e <span class=\'highlight\'>riabilitazione motoria.</span>'),
('laboratorio', 'Laboratorio analisi', 'immagine di un gattino in camice da chirurgo', 'img/laboratorio.jpg', 'Presso la nostra clinica &egrave possibile effettuare <span class=\'highlight\'>analisi cliniche per animali</span>, necessarie per intervenire in modo <span class=\'highlight\'>rapido</span> e <span class=\'highlight\'>appropriato</span>, oppure per controlli diagnostici pi&ugrave <span class=\'highlight\'>approfonditi</span>, nel dubbio che siano in corso patologie pi&ugrave particolari. In medicina veterinaria siamo di fronte ad un paziente non in grado di esprimere il proprio malessere, diventa quindi di fondamentale importanza l\'utilizzo di mezzi diagnostici efficaci; per questo l\'ambulatorio si avvale di un <span class=\'highlight\'>laboratorio</span> dove &egrave possibile fare molteplici analisi cliniche quali: <span class=\'highlight\'>emocromo, analisi delle feci e delle urine, test diagnostici per filariosi, leishmania, parvovirus, leucemia felina, citologia, raschiati cutanei, analisi della cute per micosi, esami di radiologia digitale, ecografia ed ecocardio.</span>'),
('pronto', 'Pronto Soccorso', 'immagine di un veterinario che studia l\'occhio di un gatto', 'img/pronto2.jpg', 'Il servizio di Pronto Soccorso, <strong><span class=\'highlight2\'>aperto 24 ore su 24</span></strong>, per le situazioni d\'emergenza nelle quali la rapidit&agrave d\'azione &egrave fondamentale, offre la possibilit&agrave di provvedere tempestivamente ai trattamenti salvavita. \r\n        Il reparto &egrave provvisto di <span class=\'highlight\'>apparecchiature di laboratorio</span> e di <span class=\'highlight\'>diagnostica</span> in modo tale da permettere una corrretta ed ottimale gestione del paziente in condizioni critiche.'),
('chirurgia', 'Chirurgia veterinaria', 'immagine di un chirurgo che opera', 'img/chirurgia.jpg', 'Il nostro personale medico altamente specializzato permette alla clinica di offrire prestazioni di <span class=\'highlight\'>chirurgia dei tessuti molli</span>, <span class=\'highlight\'>dei tessuti duri</span> ma anche servizi di <span class=\'highlight\'>chirurgia oncologica</span> veterinaria.\r\n        Il reparto operatorio &egrave attrezzato per svolgere interventi complessi, mini-invasivi e di <span class=\'highlight\'>laser chirurgia</span> nella efficienza e nella sicurezza pi&ugrave totali. Alcuni dei servizi offerti dal nostro staff di chirurghi sono:\r\n        <span class=\'highlight\'>operazioni di chirurgia ortopedica</span> per fratture e danni a tendini e legamenti, <span class=\'highlight\'>sterilizzazione cani e gatti, operazioni di chirurgia cutanea, interventi addominali, biopsie e asportazioni delle masse tumorali</span>, insieme a molti altri.'),
('vaccinazioni', 'Vaccinazioni', 'immagine di una veterinaria che vaccina un gatto', 'img/vaccinazioni2.jpg', '<ul><li><strong>&Egrave necessario vaccinare il mio cane o il mio gatto?</strong></li></ul><em>Assolutamente s&igrave.</em> Secondo le linee guida del <abbr lang=\'en\' title=\'Vaccination Guidelines Group\'>VGG</abbr> (<span lang=\'en\'> Vaccination Guidelines Group</span>), le vaccinazioni non solo ci permettono di proteggere il nostro amato compagno da gravi malattie infettive, ma permette anche di fornire l\'immunit&agrave alla popolazione di una certa area. \r\n        L\'Ambulatorio Archimedeo Torre offre servizi di somministrazione di <span class=\'highlight\'>vaccini <span lang=\'en\'><em>core</em></span></span>(vaccini raccomandati per fornire all\'animale protezione per tutta la vita) e <span class=\'highlight\'>vaccini opzionali</span>, da somministrare in base allo stile di vita o alla zona geografica dell\'animale. Ricorda: <strong><span class=\'highlight\'>molti vaccini necessitano di richiami per mantenere l\'immunit&agrave intatta</span></strong>.<br/>\r\n        <a href=\'AccediReg.php\'>Accedi</a> al tuo account per controllare la situazione del tuo animale. Se necessario, <a href=\'Contattaci.php\'>prenota subito una visita</a> per vaccinarlo!'),
('visite', 'Visite ambulatoriali', 'immagine di una veterinaria che ascolta il cuore di un cane', 'img/visite1.jpg', 'Oltre al servizio di pronto soccorso per le emergenze, il nostro Ambulatorio offre la possibili&agrave di effettuare <span class=\'highlight\'>visite di base</span> (di <span lang=\'en\'>routine</span>) per il proprio animale, cos&igrave come <span class=\'highlight\'>visite specialistiche</span>, nei settori della <span class=\'highlight\'>dermatologia, dell\'oculistica e dell\' ecografia /ecocardiografia veterinaria </span>, in modo da avere un quadro pi&ugrave completo dello stato di salute del paziente. L\'Ambularorio inoltre risulta dotato di un servizio di <span class=\'highlight\'>radiologia digitale</span>, una moderna tecnica diagnostica che assicura un\'alta qualit&agrave dell\'immagine in tempi molto rapidi.\r\n<br/>Per <a href=\'Contattaci.php\'>prenotare una visita</a> o per richiedere maggiori informazioni in merito ai servizi disponibili, &egrave possibile contattare la struttura al numero di telefono:<a href=\'tel:+39043456789\' class=\'phone\'> 0434 56789 </a>.'),
('microchip', 'Applicazione <span lang=\'en\'>microchip</span>', 'immagine con un lettore di codice', 'img/microchip.jpg', '<ul><li><strong>Il <span lang=\'en\'>microchip</span> per i cani &egrave obbligatorio?</strong></li></ul>    \r\n<em>S&igrave, &egrave <strong><span class=\'highlight2\'>obbligatorio per legge</span></strong> dotare un cane di <span lang=\'en\'>microchip</span>.</em>Il <span lang=\'en\'>microchip</span> risulta <span class=\'highlight\'>indispensabile in molti casi, come quando l\'animale deve essere identificato, vaccinato o ceduto.</span>\r\nEsso consiste in una <span lang=\'en\'>trasponder</span>, che si presenta sotto forma di una capsula di vetro biocompatibile; tale dispositivo funziona come una radio antenna pronta a ricevere il segnale del lettore di <span lang=\'en\'>microchip</span>, con il quale si ottiene un <span class=\'highlight\'>codice di 15 cifre</span> con cui &egrave possibile risalire al proprietario del cane.\r\n<strong><span class=\'highlight2\'>La sua applicazione pu&ograve essere effettuata solo da un veterinario abilitato in ambulatorio</span></strong>, con una iniezione sottocutanea assolutamente innocua per l\'animale.');

-- --------------------------------------------------------

--
-- Struttura della tabella `serviziindice`
--

CREATE TABLE `serviziindice` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `alt` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `serviziindice`
--

INSERT INTO `serviziindice` (`id`, `name`, `Path`, `alt`) VALUES
('ricovero', 'Ricovero e Terapia intensiva', 'img/ricovero.jpg', 'immagine di una veterinaria che si prende cura di cane disteso su un lettino'),
('laboratorio', 'Laboratorio analisi', 'img/laboratorio.jpg', 'immagine di un gattino in camice da chirurgo'),
('pronto', 'Pronto soccorso', 'img/pronto2.jpg', 'immagine di un veterinario che studia l\'occhio di un gatto'),
('chirurgia', 'Chirurgia veterinaria', 'img/chirurgia.jpg', 'immagine di un chirurgo che opera'),
('vaccinazioni', 'Vaccinazioni', 'img/vaccinazioni2.jpg', 'immagine di una veterinaria che vaccina un gatto'),
('visite', 'Visite ambulatoriali', 'img/visite1.jpg', 'immagine di una veterinaria che ascolta il cuore di un cane'),
('microchip', '<span lang=\'en\'>microchip</span>', 'img/microchip.jpg', 'immagine con un lettore di codice');

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
(1, 'Mario', 'Rossi', '3332169734', 'mariorossi@mail.com', '6f3240543cede5da63dc8d44bba868ac', NULL);

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
-- Dump dei dati per la tabella `visita`
--

INSERT INTO `visita` (`ID`, `DataOra`, `Prestazione`, `Utente`, `approvazione`, `gatto_or_cane`, `Note`) VALUES
(1, '2019-02-28 10:20:00', 2, 1, 0, 1, 'Il cane Ã¨ un pastore tedesco di 7 anni'),
(2, '2019-03-04 16:30:00', 1, 1, 0, 0, 'Gatto siamese di 2 anni');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `visita`
--
ALTER TABLE `visita`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
