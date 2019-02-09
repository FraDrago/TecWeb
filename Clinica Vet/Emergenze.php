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

<?php 
    $access = new DBAccess();
    $connection = $access->openDBConnection();
    if(!$connection) die("Errore nella connessione.");
        ?>
    

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
<ol><?php
		$result=$access-> getemergenze();
            if(count($result)>0){?>
	<?php foreach($result as $emergenze){?>
<li><img src="img/calore.jpg" ><a href="#<?php echo $emergenze['id'];?>"> Colpo di calore </a></li><?php }
		}
	?>
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
		<?php
		$result=$access-> getemergenze();
            if(count($result)>0){?>
	<?php foreach($result as $emergenze){?>
	<div id="<?php echo $emergenze['id']; ?>"></div>
	<div class="name2"><?php echo $emergenze['name']; ?></div>
	<div class="boxImage2"><img id="image5" src="<?php echo $emergenze['Path']; ?>" alt="<?php echo htmlentities($emergenze['alt'], ENT_HTML5, "ISO8859-1");?>"></div>
	<div class="descrizione"><?php echo $emergenze['Descrizione'];?></div>
	</div><?php }
		}
	?>

<div id="title"><h4>Piante tossiche comuni:</h4></div>

<div id="piante"></div>
<?php
		$result=$access-> getpiante();
            if(count($result)>0){?>
<?php foreach($result as $piante){?>
<div class="box">
	<div class="name"><?php echo $piante['name']; ?></div>
	<div class="boxImage"><img id="image4" src="<?php echo $piante['Path']; ?>" alt="<?php echo htmlentities($piante['alt'], ENT_HTML5, "ISO8859-1");?>"></div>
	<div class="descrizione-p"><span class="highlight">Parti tossiche: </span><?php echo $piante['PartiTossiche'];?>
	<p></p>
	<span class="highlight">Sintomatologia: </span> <?php echo $piante['Sintomatologia'];?></div>
</div>
<?php
}
}
?>

</div>

<?php include_once"footer.php"?>


</body>
</html>

