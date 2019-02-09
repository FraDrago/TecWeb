CREATE TABLE `emergenze` (
	'id' int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `alt` varchar(400) DEFAULT NULL,
  `Descrizione` varchar(000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `emergenze`(`id`, `name`, `Path`, `alt`, `Descrizione`) VALUES
("calore","Colpo di Calore","img/calore.jpg","foto di un cane accaldato","Il colpo di calore &egrave un''emergenza per cani e gatti da conoscere e non sottovalutare. Questa problematica si riscontra soprattutto nei <span class='highlight'>soggetti anziani</span> e nei <span class='highlight'>soggetti obesi</span>.
	La temperatura normale dei cani e dei gatti si aggira attorno ai 38-38,5 °C, mentre l’ipertemia grave si verifica quando la temperatura rettale supera i 41,5°C.
	I segni clinici che si possono manifestare sono: <span class='highlight'>iperemia delle mucose, tachicardia e respirazione affannosa</span>. Se la situazione &egrave più grave possono subentrare: <span class='highlight'>incoordinazione motoria, tremori muscolari,vomito, diarrea, ipersalivazione, perdita di coscienza e crisi convulsive</span>.
	<span class='highlight'>Rimedi utili: bagni con acqua fresca o panni bagnati (nota bene: acqua ghiacciata o ghiaccio potrebbero aggravare la situazione).</span>
	A questo punto sarà fondamentale <strong><span class='highlight'>portare l''animale dal veterinario</strong></span> che proceder&agrave a ripristinare e sostenere il normale ritmo cardiaco, la pressione arteriosa, la diuresi e lo stato del sensorio."),


("vomito","Vomito e diarrea","img/vomito.jpg","Foto di un cane ammalato","Il <em><span class='highlight2'>vomito</span></em> può essere un fatto episodico indotto dall’<span class='highlight'>ingestione di peli, agenti irritanti, troppo cibo o bocconi troppo grossi</span>, ma anche <span class='highlight'>effetto di una patologia</span>, in particolar modo se accompagnato da comportamenti anomali, disorientamento, disturbi dell’equilibrio. In caso di vomito è importante <strong><span class='highlight'>mantenere l’animale a digiuno e controllato per 12 o 24 ore, inducendolo però a bere poco e spesso</span></strong>.
	La <em><span class='highlight2'>diarrea</span></em> invece può essere causata da <span class='highlight'>parassiti intestinali</span> (alcune volte riconoscibili nelle feci espulse).
	Si consiglia quindi di <span class='highlight>interrompere l’alimentazione abituale</span>, di somministrare eventualmente un’ alimentazione commerciale altamente digeribile e il prima possibile di <span class='highlight'>raccogliere un campione di feci</span> per portarlo ad analizzare dal veterinario."),

("unghie","Unghia spezzata","img/unghia.jpg","Foto di una zampa di cane","La rottura di un’unghia può avvenire per strappamento accidentale; normalmente il proprietario si accorge immediatamente in caso di perdita di sangue, oppure perché il cane/gatto non appoggia più l’arto.
	Quando accade si deve <span class='highlight'>tagliare l’unghia nel punto di rottura</span> e successivamente <span class='highlight'>lavare la parte con soluzione fisiologica, applicare poi un bendaggio</span>. In alcuni casi potrebbe essere indispensabile somministrare un <strong><span class='highlight2'>antibiotico</span></strong> che verrà prescritto dal medico veterinario."),

("morso","Morso di cane o di gatto","img/morso.jpg","Foto di un gatto che morde una mano" ,"E’ importante sapere che la cavità orale dei cani e dei gatti ha una concentrazione batterica elevatissima, quindi <span class='highlight'>il morso è particolarmente infetto</span>.
	Normalmente ciò che appare a livello cutaneo è solo la punta di un iceberg, le <span class='highlight'>lesioni sottostanti</span> da strappamento sono molto frequenti. In questo caso è utile <span class='highlight'>depilare la parte interessata con ampio margine, disinfettare utilizzando soluzioni diluite a base di iodio vinil pirrolidone (betadine) e lavare abbondantemente con soluzione fisiologica</span>. L’utilizzo di <strong><span class='highlight2'>terapie antibiotiche</span></strong> risulta quasi sempre opportuno ed è quindi consigliabile, appena possibile, rivolgersi ad un veterinario."),

("puntura","Puntura d''insetto","img/puntura.jpg","Foto di un cane e un''ape","Le punture d’insetto spesso provocano reazioni allergiche che determinano un <span class='highlight'>rigonfiamento dell’area</span> che è stata colpita. Nella maggior parte dei casi la zona più interessata è quella del muso dove si verifica un ispessimento delle labbra. 
	Il sintomo più comune è lo strofinamento del muso per terra o il grattamento con le zampe.
	E’ possibile <strong><span class='highlight2'>somministrare corticosteroidi a pronto utilizzo dopo aver contattato telefonicamente il veterinario</span></strong>.
	Se però la sintomatologia risulta grave è bene recarsi in clinica per controlli."),

("spighe","Spighe nelle orecchie o nelle zampe","img/forasacchi.jpg","Foto di una spiga","I <em>forasacchi</em> sono diffusi in campagna e nel periodo estivo. Questi corpi aderiscono molto facilmente al pelo del cane o del gatto, penetrando con facilità nella cute.
	Se la spiga si è infilata tra le zampe, il cane o il gatto può manifestare zoppia; se la spiga si è infilata nell’orecchio, l’animale scuote le orecchie e rotea la testa.
	In entrambi i casi è possibile controllare <span class='highlight'>se la spiga è visibile e in questo caso estrarla</span>.
	Quando invece la penetrazione avviene nella sottocute può generare delle fistole interdigitali che tendono a non rimarginare: in tal caso, è possibile tamponare la situazione con <span class='highlight'>bagni in soluzione salina satura utilizzando acqua tiepida</span>. Se la situazione perdura e non migliora è necessaria la visita medica.
	<span class='highlight'>Quando penetra nel condotto uditivo <strong><span class='highlight'>non</span></strong> bisogna cercare di rimuoverla</span>, solo il medico veterinario può intervenire."),

("ingestione","Ingestione di sostanze tossiche","img/tossiche.jpg","Foto di un gatto davanti ad un bicchiere","Se si sospetta l’ingestione di una sostanza tossica sarà bene <strong><span class='highlight2'>informare tempestivamente il veterinario</span></strong>.
	I sintomi variano a seconda della sostanza ingerita, ma i più frequenti sono: <span class='highlight'>vomito, diarrea profusa a volte con sangue, abbattimento del sensorio, tremori muscolari, convulsioni, scialorrea (ipersalivazione)</span>>.
	Nel caso di ingestione di rodenticidi (veleno per topi) si formano spesso ematomi e compare una debolezza generalizzata.
	Se si tratta di farmaci o veleni <span class='highlight'>è bene indurre il vomito al più presto</span> e non somministrare latte. <strong><span class='highlight2'>Se sono trascorsi più di 20 minuti non dev’essere indotto il vomito, ma è fondamentale portare l’animale il prima possibile dal veterinario.</span></strong>");
