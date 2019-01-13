<?php $pagina_attuale='Areapersonale.php'; ?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/Areapersonale.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Ambulatorio Veterinario Archimedeo Torre</title>
    </head>

<body>

<?php include_once"header.php"?>

<div class="fright"> <!--elemento di utility sulla destra-->
      <div class="header-meta">
        <div class="col-elem"> Hai un'emergenza?<br/>
          Chiama ora: <span class="phone"> 0434 56789 </span> </div>
      </div>    
</div>

</div>
<!--menu di navigazione-->
<?php include_once"navbar.php"?>

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
  <li>Ti trovi in: </li>
  <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li class="bc_here">Area Personale</li>
</ul>
  
<!--un po' di separazione-->


<div id="content">

<!--Contenuto qui-->

<div class="benvenuto">
 <p>Benvenuto Pippo </p>
</div>

<div	 class="azioni">

<div >
	<img id="profilo" src="img/profilo/profilo personale.png" alt="modifica profilo"/> 
	<img id="libretto" src="img/profilo/libretto personale.png" alt="libretto personale"/> 
</div>
<div >
	<img id="prenotazioni" src="img/profilo/prenotazione.png" alt="modifica profilo"/> 
	<img id="logout" src="img/profilo/Log out.png" alt="log out"/> 
</div>
</div>


</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
