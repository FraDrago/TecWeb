
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
unset($_POST);
 $pagina_attuale='AreaPersonaleVet.php'; ?>
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
        <script src="js/script2.js"></script>
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
    <li><a href="AreaPersonaleVet.php">Area Personale Admin</a></li>
    <li><a href="galleriaGestione.php">Gestione Galleria</a></li>
  <li class="bc_here">Aggiungi</li>
</ul>
  
<br/>
<br/>
<div id="content">
    <div id="title1"><h2>Aggiungi Foto</h2></div>
    <!-- tabella per immagini-->
    <div id="contaddform">
        <form id="addform" action="upload.php" method="post" enctype="multipart/form-data"
              onsubmit="return validateInsertForm()">
            <div id="errorAdd"></div>
            <label for="fileToUpload">Foto:*</label>
            <input type="file" name="fileToUpload" id="fileToUpload"/><br/>

            <label for="alt"><abbr>Alt</abbr>.:*</label>
            <input type="text" id="alt" name="alt" placeholder="Testo alternativo" value=""/><br/>

            <label for="descrizione">Descrizione:*</label>
            <input type="text" id="descrizione" name="descrizione" placeholder="Descrizione" value=""
                   maxlength="45"/><br/>
            
            <input type="submit" name="submit" value="Aggiungi" />
            
    </form>
    </div>

</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>
</div>
</body>
</html>
