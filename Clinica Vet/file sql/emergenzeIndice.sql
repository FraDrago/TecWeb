CREATE TABLE `emergenzeIndice` (
`id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `alt` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `emergenzeindice`(`id`, `name`, `Path`, `alt`) VALUES
("calore","Colpo di Calore","img/calore.jpg","foto di un cane accaldato"),
("vomito","Vomito e Diarrea","img/vomito.jpg","Foto di un cane ammalato"),
("unghie","Unghia spezzata","img/unghia.jpg","Foto di una zampa di cane"),
("morso","Morso di cane o gatto","img/morso.jpg","Foto di un gatto che morde una mano"),
("puntura","Puntura di insetto","img/puntura.jpg","Foto di un cane e un''ape"),
("spighe","Spighe nelle orecchie","img/forasacchi.jpg","Foto di una spiga"),
("ingestione","Avvelenamento","img/tossiche.jpg","Foto di un gatto davanti ad un bicchiere");