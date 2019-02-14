<?php $pagina_attuale='AreaPersonaleVet.php'; ?>
<!DOCTYPE  html>
<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('DB_Access.php');

$access = new DBAccess();
$connection = $access->openDBConnection();
if (!$connection) {
    $_SESSION['error'] = "Si sono sono verificati dei problemi. Riprovare pi&ugrave; tardi.";
    $_SESSION['error_code'] = "500";
    header("Location: error.php");
}
if (!isset($_SESSION['ID']) || (isset($_SESSION['ID']) && !$access->isAdmin($_SESSION['ID']))) {

    $_SESSION['error'] = "Non hai i permessi per accedere a questa sezione";
    $_SESSION['error_code'] = "403";
    header("Location: error.php");
}
$access->closeDBConnection();
$pagina_attuale = 'AreaPersonaleVet.php'; ?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
  <li class="bc_here">Area Personale Admin</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title1"><h2>Benvenuto nell'area personale riservata!</h2></div>


<div class="list-type4">
<ol>
<li><img class="noprint" src="img/gallery.jpg" alt="icona galleria" ><a href="galleriaGestione.php">Gestione galleria</a></li>
<li><img class="noprint" src="img/clock.jpg" alt="icona con orologio di orari" ><a href="orariGestione.php">Gestione orari</a></li>
<li><img class="noprint" src="img/calendario.png" alt="icona di Gestione Prenotazioni " ><a href="prenotaGestione.php">Gestione prenotazioni</a></li>
<li><img class="noprint" src="img/logout.jpg" alt="icona di logout" ><a href="AccediReg.php"><span xml:lang="en" lang="en">Logout</span></a></li>
</li>
</ol>
</div>


</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>
</div>
</body>
</html>
