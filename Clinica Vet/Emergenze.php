<?php $pagina_attuale='Emergenze.php'; ?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <title>Ambulatorio Veterinario Archimedeo Torre</title>
    </head>

<body>

<?php include_once"header.php"?>

<!--menu di navigazione-->
<?php include_once"navbar.php"?>

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
	<li>Ti trovi in: </li>
	<li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
	<li class="bc_here">Emergenze</li>
</ul>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script type="text/javascript" src="script.js"></script>
	
<br/>
<br/>
<div id="content">
	<div id="title"><h3>Guida alle emergenze più comuni </h3></div>

	<p>In questa sezione è possibile trovare le informazioni principali in caso di emergenze comuni per un efficace primo soccorso del nostro amico a quattro zampe. Inoltre viene fornita una lista delle principali <a class="piante" href="#piante">piante tossiche.</a> </p>


<div class="list-type3">
<ol>
<li><img src="img/calore.jpg" ><a href="#calore">Colpo di calore </a></li>
<li><img src="img/vomito.jpg" ><a href="#vomito">Vomito e Diarrea </a></li>
<li><img src="img/unghia.jpg" ><a href="#unghie">Unghia spezzata</a></li>
<li><img src="img/morso.jpg" ><a href="#morso">Morso di cane o gatto</a></li>
<li><img src="img/puntura.jpg" ><a href="#puntura">Puntura di insetto</a></li>
<li><img src="img/forasacchi.jpg" ><a href="#spighe">Spighe nelle orecchie/zampe</a></li>
<li><img src="img/tossiche.jpg" ><a href="#ingestione">Ingestione sostanze tossiche</a></li>
<li><img src="img/piante.jpg" ><a class="piante-colore" href="#piante">Piante tossiche comuni</a></li>
</ol>
</div>

	
	<div class="box2">
	<div id="calore"></div>
	<div class="name2">Colpo di calore</div>
	<div class="boxImage2"><img id="image5" alt="Foto di un cane" src="img/calore.jpg"></div>
	<div class="descrizione">Il colpo di calore è un’emergenza per cani e gatti da conoscere e non sottovalutare. Questa problematica si riscontra soprattutto nei <span class="highlight">soggetti anziani</span> e nei <span class="highlight">soggetti obesi</span>.
	La temperatura normale dei cani e dei gatti si aggira attorno ai 38-38,5 °C, mentre l’ipertemia grave si verifica quando la temperatura rettale supera i 41,5°C.
	I segni clinici che si possono manifestare sono: <span class="highlight">iperemia delle mucose, tachicardia e respirazione affannosa</span>. Se la situazione è più grave possono subentrare: <span class="highlight">incoordinazione motoria, tremori muscolari,vomito, diarrea, ipersalivazione, perdita di coscienza e crisi convulsive</span>.
	<span class="highlight">Rimedi utili: bagni con acqua fresca o panni bagnati (nota bene: acqua ghiacciata o ghiaccio potrebbero aggravare la situazione).</span>
	A questo punto sarà fondamentale <strong><span class="highlight">portare l’animale dal veterinario</strong></span> che procederà a ripristinare e sostenere il normale ritmo cardiaco, la pressione arteriosa, la diuresi e lo stato del sensorio.</div></div>

	<div class="box2">
	<div id="vomito"></div>
	<div class="name2">Vomito e diarrea</div>
	<div class="boxImage2"><img id="image5" alt="Foto di un cane" src="img/vomito.jpg"></div>
	<div class="descrizione">Il <em><span class="highlight2">vomito</span></em> può essere un fatto episodico indotto dall’<span class="highlight">ingestione di peli, agenti irritanti, troppo cibo o bocconi troppo grossi</span>, ma anche <span class="highlight">effetto di una patologia</span>, in particolar modo se accompagnato da comportamenti anomali, disorientamento, disturbi dell’equilibrio. In caso di vomito è importante <strong><span class="highlight">mantenere l’animale a digiuno e controllato per 12 o 24 ore, inducendolo però a bere poco e spesso</span></strong>.
	La <em><span class="highlight2">diarrea</span></em> invece può essere causata da <span class="highlight">parassiti intestinali</span> (alcune volte riconoscibili nelle feci espulse).
	Si consiglia quindi di <span class="highlight">interrompere l’alimentazione abituale</span>, di somministrare eventualmente un’ alimentazione commerciale altamente digeribile e il prima possibile di <span class="highlight">raccogliere un campione di feci</span> per portarlo ad analizzare dal veterinario.</div></div>

	<div class="box2">
	<div id="unghie"></div>
	<div class="name2">Unghia spezzata</div>
	<div class="boxImage2"><img id="image5" alt="Foto di una zampa di cane" src="img/unghia.jpg"></div>
	<div class="descrizione">La rottura di un’unghia può avvenire per strappamento accidentale; normalmente il proprietario si accorge immediatamente in caso di perdita di sangue, oppure perché il cane/gatto non appoggia più l’arto.
	Quando accade si deve <span class="highlight">tagliare l’unghia nel punto di rottura</span> e successivamente <span class="highlight">lavare la parte con soluzione fisiologica, applicare poi un bendaggio</span>. In alcuni casi potrebbe essere indispensabile somministrare un <strong><span class="highlight2">antibiotico</span></strong> che verrà prescritto dal medico veterinario.</div></div>

	<div class="box2">
	<div id="morso"></div>
	<div class="name2">Morso di cane o di gatto</div>
	<div class="boxImage2"><img id="image5" alt="Foto di un gatto che morde una mano" src="img/morso.jpg"></div>
	<div class="descrizione">E’ importante sapere che la cavità orale dei cani e dei gatti ha una concentrazione batterica elevatissima, quindi <span class="highlight">il morso è particolarmente infetto</span>.
	Normalmente ciò che appare a livello cutaneo è solo la punta di un iceberg, le <span class="highlight">lesioni sottostanti</span> da strappamento sono molto frequenti. In questo caso è utile <span class="highlight">depilare la parte interessata con ampio margine, disinfettare utilizzando soluzioni diluite a base di iodio vinil pirrolidone (betadine) e lavare abbondantemente con soluzione fisiologica</span>. L’utilizzo di <strong><span class="highlight2">terapie antibiotiche</span></strong> risulta quasi sempre opportuno ed è quindi consigliabile, appena possibile, rivolgersi ad un veterinario.</div></div>

	<div class="box2">
	<div id="puntura"></div>
	<div class="name2">Puntura d'insetto</div>
	<div class="boxImage2"><img id="image5" alt="Foto di un cane e un'ape" src="img/puntura.jpg"></div>
	<div class="descrizione">Le punture d’insetto spesso provocano reazioni allergiche che determinano un <span class="highlight">rigonfiamento dell’area</span> che è stata colpita. Nella maggior parte dei casi la zona più interessata è quella del muso dove si verifica un ispessimento delle labbra. 
	Il sintomo più comune è lo strofinamento del muso per terra o il grattamento con le zampe.
	E’ possibile <strong><span class="highlight2">somministrare corticosteroidi a pronto utilizzo dopo aver contattato telefonicamente il veterinario</span></strong>.
	Se però la sintomatologia risulta grave è bene recarsi in clinica per controlli.</div></div>

	<div class="box2">
	<div id="spighe"></div>
	<div class="name2">Spighe nelle orecchie o nelle zampe</div>
	<div class="boxImage2"><img id="image5" alt="Foto di una spiga" src="img/forasacchi.jpg"></div>
	<div class="descrizione">I <em>forasacchi</em> sono diffusi in campagna e nel periodo estivo. Questi corpi aderiscono molto facilmente al pelo del cane o del gatto, penetrando con facilità nella cute.
	Se la spiga si è infilata tra le zampe, il cane o il gatto può manifestare zoppia; se la spiga si è infilata nell’orecchio, l’animale scuote le orecchie e rotea la testa.
	In entrambi i casi è possibile controllare <span class="highlight">se la spiga è visibile e in questo caso estrarla</span>.
	Quando invece la penetrazione avviene nella sottocute può generare delle fistole interdigitali che tendono a non rimarginare: in tal caso, è possibile tamponare la situazione con <span class="highlight">bagni in soluzione salina satura utilizzando acqua tiepida</span>. Se la situazione perdura e non migliora è necessaria la visita medica.
	<span class="highlight">Quando penetra nel condotto uditivo <strong><span class="highlight">non</span></strong> bisogna cercare di rimuoverla</span>, solo il medico veterinario può intervenire.</div></div>

	<div class="box2">
	<div id="ingestione"></div>
	<div class="name2">Ingestione di sostanze tossiche</div>
	<div class="boxImage2"><img id="image5" alt="Foto di un gatto davanti ad un bicchiere" src="img/tossiche.jpg"></div>
	<div class="descrizione">Se si sospetta l’ingestione di una sostanza tossica sarà bene <strong><span class="highlight2">informare tempestivamente il veterinario</span></strong>.
	I sintomi variano a seconda della sostanza ingerita, ma i più frequenti sono: <span class="highlight">vomito, diarrea profusa a volte con sangue, abbattimento del sensorio, tremori muscolari, convulsioni, scialorrea (ipersalivazione)</span>>.
	Nel caso di ingestione di rodenticidi (veleno per topi) si formano spesso ematomi e compare una debolezza generalizzata.
	Se si tratta di farmaci o veleni <span class="highlight">è bene indurre il vomito al più presto</span> e non somministrare latte. <strong><span class="highlight2">Se sono trascorsi più di 20 minuti non dev’essere indotto il vomito, ma è fondamentale portare l’animale il prima possibile dal veterinario.</span></strong></div></div>

 
<div id="title"><h4>Piante tossiche comuni:</h4></div>
<div id="piante"></div>
<div class="box">
	<div class="name">Rododendro</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/rodo1.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> foglie e fiori.
	<span class="highlight">Sintomatologia:</span> vomito-sintomi nervosi</div>
</div>

<div class="box">
	<div class="name">Colchico</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/colch.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> tutta la pianta.
	<span class="highlight">Sintomatologia:</span> irritazione gastroenterica</div>
</div>

<div class="box">
	<div class="name">Euforbia</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/eufo.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> tutta la pianta.
	<span class="highlight">Sintomatologia:</span> irritazione gastroenterica</div>
</div>

<div class="box">
	<div class="name">Stella di Natale</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/stell.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> foglie e fiori.
	<span class="highlight">Sintomatologia:</span> irritazione gastroenterica</div>
</div>

<div class="box">
	<div class="name">Ortensia</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/ortens.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> foglie e fiori.
	<span class="highlight">Sintomatologia:</span> dolori gastrici, vomito e diarrea</div>
</div>

<div class="box">
	<div class="name">Edera</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/edera.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> tutta la pianta.<br/>
	<span class="highlight">Sintomatologia:</span> irritazione gastroenterica, a dosi elevate depressione nervosa e cardiaca</div>
</div>

<div class="box">
	<div class="name">Oleandro</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/olea.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> tutta la pianta.
	<span class="highlight">Sintomatologia:</span> irritazione gastroenterica, depressione del sistema nervoso e del cuore</div>
</div>

<div class="box">
	<div class="name">Filodendro</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/filo.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> foglie e fusto.
	<span class="highlight">Sintomatologia:</span> irritazione gastroenterica</div>
</div>

<div class="box">
	<div class="name">Dieffenbachia</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/dieffe2.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> fusto e apici.
	<span class="highlight">Sintomatologia:</span> forte irritazione di bocca, esofago, stomaco, intestino (lattice irritante)</div>
</div>

<div class="box">
	<div class="name">Tulipano</div>
	<div class="boxImage"><img id="image4" alt="Foto di una pianta" src="img/tulip.jpg"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche:</span> masticazione o ingestione di bulbi.
	<span class="highlight">Sintomatologia:</span> vomito, salivazione, diarrea con coliche, dispnea, tachicardia, debolezza e atassia</div>
</div>

</div>

<?php include_once"footer.php"?>


</body>
</html>

