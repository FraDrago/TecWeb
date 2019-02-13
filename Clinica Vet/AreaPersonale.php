<?php $pagina_attuale='AreaPersonale.php'; ?>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li class="bc_here">Area Personale</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title1"><h2>Benvenuto nell'area personale!</h2></div>

  <p>Qui potrai controllare la situazione sanitaria del tuo animale o prenotare una visita presso il nostro ambulatorio</p>


<div class="list-type4">
<ol>
<li><img src="img/prenota.jpg" alt="icona calendario"><a href="Prenota.php">Prenota una visita</a></li>
<li><img src="img/profiloico.jpg" alt="icona profilo personale" ><a href="ModificaProfilo.php">Modifica il profilo</a></li>
<li><img src="img/logout.jpg" alt="icona di logout" ><a href="AccediReg.php"><span xml:lang="en" lang="en">Logout</span></a></li>
</ol>
</div>

</div>
</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
