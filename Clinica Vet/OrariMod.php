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

if (!isset($_GET['ID'])) {

    $_SESSION['error'] = "Errore nell'orario richiesto";
    $_SESSION['error_code'] = "404";
    header("Location: error.php");
}

$result = $access->getorariSingola($_GET['ID']);
if ($result == null) {

    $_SESSION['error'] = "Errore nell'orario richiesto";
    $_SESSION['error_code'] = "404";
    header("Location: error.php");
}

$access->closeDBConnection();?>


<?php $pagina_attuale='orariGestione.php'; ?>
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

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
  <li>Ti trovi in: </li>
  <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li><a href="AreaPersonaleVet.php">Area Personale Admin</span></a></li>
  <li class="bc_here">Gestione Orario</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title"><h3>Gestione orario ambulatorio</h3></div>

  
            <!--- <select class="form-control">
              <option>08:00</option>
              <option>08:30</option>
            </select> -->

            <div id="contmodform">
            <ul><?php echo($result['Giorno']); ?></ul>
            

            <form id="modform" action="mod2.php" method="post" >
                <label for="date">Orario di inizio:</label>
                <input type="text" name="start" placeholder="date"
                       value="<?php echo htmlentities($result['OrariStart']); ?>"/><input type="submit" name="submit" value="Modifica"/><br/>
                <label for="date">Orario di fine:</label>
                <input type="text" name="end" placeholder="date"
                       value="<?php echo htmlentities($result['OrariEnd']); ?>"/><input type="submit" name="submit" value="Modifica"/><br/>
                <input id="ID" name="ID" type="hidden" value="<?php echo $result['ID'];?>">

            </form>
        </div>
                                          
    


</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
