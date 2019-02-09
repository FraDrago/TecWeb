CREATE TABLE `piante` (
  `name` varchar(50) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `alt` varchar(400) DEFAULT NULL,
  `PartiTossiche` varchar(200) NOT NULL,
  `Sintomatologia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `piante` (`name`, `Path`,'alt', `PartiTossiche`, `Sintomatologia`) VALUES 
("Rododendro","img/rodo1.jpg","pianta di rododendro","foglie e fiori.","omito-sintomi nervosi."),
("Colchico","img/colch.jpg","pianta di colchico","tutta la pianta.","irritazione gastroenterica."),
("Euforbia","img/eufo.jpg","pianta di euforbia","tutta la pianta.","irritazione gastroenterica."),
("Stella di Natale","img/stell.jpg","pianta di stella di natale","foglie e fiori.","irritazione gastroenterica."),
("Ortensia","img/ortens.jpg","pianta di ortensia","foglie e fiori.","dolori gastrici, vomito e diarrea."),
("Edera","img/edera.jpg","pianta di edera","tutta la pianta.","irritazione gastroenterica, a dosi elevate depressione nervosa e cardiaca."),
("Oleandro","img/olea.jpg","pianta di oleandro", "tutta la pianta.","irritazione gastroenterica, depressione del sistema nervoso e del cuore."),
("Filodendro","img/filo.jpg","pianta di filodendro","foglie e fusto.","irritazione gastroenterica."),
("Dieffenbachia","img/dieffe2.jpg","pianta dieffenbachia","fusto e apici.","forte irritazione di bocca, esofago, stomaco, intestino (lattice irritante)."),
("Tulipano","img/tulip.jpg","fiore di tulipano","masticazione o ingestione di bulbi.","vomito, salivazione, diarrea con coliche, dispnea, tachicardia, debolezza.");
