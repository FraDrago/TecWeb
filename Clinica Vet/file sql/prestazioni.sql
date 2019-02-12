SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `prestazione` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Descrizione` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `prestazione`
  ADD PRIMARY KEY (`ID`);
ALTER TABLE `prestazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


INSERT INTO `prestazione` (`ID`, `Nome`, `Descrizione`) VALUES
(1, 'Vaccino', 'Vaccinazione preventiva contro zecche e pulci'),
(2, 'Analisi', 'Controllo generale dello stato di salute'),
(3, 'Microchip', 'Aggiunta di microchip');



CREATE TABLE IF NOT EXISTS `visita` (
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
(1, '2019-02-25 10:20:00', 1, 2, 0, 0, 'Gatto siamese di 20 mesi');

ALTER TABLE `visita`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `visita`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
