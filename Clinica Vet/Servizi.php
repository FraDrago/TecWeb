<?php $pagina_attuale='Servizi.php'; ?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
	<li class="bc_here">Servizi</li>
</ul>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script type="text/javascript" src="js/script.js"></script>
	

<br/>
<br/>
<div id="content">

<div id="title"><h3>Servizi offerti dall'ambulatorio</h3></div>
    <p>In questa sezione si possono trovare i principali servizi e prestazioni offerti dall'Ambulatorio: </p>

<div class="list-type3">
<ol>
    <?php
        $result=$access-> getserviziIndice();
            if(count($result)>0){?>
    <?php foreach($result as $serviziIndice){?>
<li><img src="<?php echo $serviziIndice['Path']; ?>" alt="<?php echo htmlentities($serviziIndice['alt'], ENT_HTML5, "UTF-8");?>">
    <a href="#<?php echo $serviziIndice['id'];?>"><?php echo $serviziIndice['name']; ?></a>
</li>
<?php }
        }
    ?>
</ol>
</div>

<?php
        $result=$access-> getservizi();
            if(count($result)>0){?>
    <?php foreach($result as $servizi){?>    
<div id="<?php echo $servizi['id']; ?>" class="box2">
    <div class="name2"><?php echo $servizi['name']; ?></div>
        <div class="boxImage2"><img id="image5" src="<?php echo $servizi['Path']; ?>" alt="<?php echo htmlentities($servizi['alt'], ENT_HTML5, "UTF-8");?>"></div>
        <div class="descrizione3"> <?php echo $servizi['Descrizione'];?> </div>   
</div><?php }
        }
    ?>
<br>
<br/>


</div>

<?php include_once"footer.php"?>

</body>
</html>
