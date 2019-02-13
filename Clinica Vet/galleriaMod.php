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

if (!isset($_GET['id'])) {

    $_SESSION['error'] = "L'immagine richiesta non esiste";
    $_SESSION['error_code'] = "404";
    header("Location: error.php");
}

$image = $access->getImmagineSingola($_GET['id']);
if ($image == null) {

    $_SESSION['error'] = "L'immagine richiesta non esiste";
    $_SESSION['error_code'] = "404";
    header("Location: error.php");
}

$access->closeDBConnection();


$pagina_attuale = 'galleriaMod.php'; ?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description"
          content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti"/>
    <meta name="keywords"
          content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet"/>
    <meta name="language" content="italian it"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script type="text/javascript" src="js/script2.js"></script>
    <title>Ambulatorio Veterinario Archimedeo Torre</title>
</head>

<body>

<?php include_once"header.php"?>

<!--menu di navigazione-->
<?php include_once"navbar.php"?>

<div id="page" class="container">
    <!--breadcrumb-->

    <ul class="breadcrumb">
        <li>Ti trovi in:</li>
        <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
        <li><a href="AreaPersonaleVet.php">Area Personale Admin</span></a></li>
        <li><a href="galleriaGestione.php">Gestione Galleria</span></a></li>
        <li class="bc_here">Modifica</li>
    </ul>

    <br/>
    <br/>
    <div id="content">
        <div id="title"><h2>Modifica</h2></div>
        <!--form per input con immagine-->
        <div id="contmodform">
            <img alt="<?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1"); ?>"
                 src="<?php echo($image['Path']); ?>">
            <form id="modform" action="mod.php" method="post" onsubmit="return validateMod()">
                <div id="errorMod"></div>
                <label for="alt"><abbr>Alt</abbr>.:*</label>
                <input type="text" id="alt" name="alt" placeholder="Testo alternativo"
                       value="<?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1"); ?>"/><br/>
                <input id="Id" name="id" type="hidden" value="<?php echo $image['id'];?>">
                <label for="desc">Descrizione:*</label>
                <input type="text" id="descrizione" name="descrizione" placeholder="Descrizione"
                       value="<?php echo htmlentities($image['descrizione'], ENT_HTML5, "ISO8859-1"); ?>"
                       maxlength="45"/><br/>

                <input type="submit" name="submit" value="Modifica"/>

            </form>
        </div>

    </div> <!--chiusura tag page-->

    <?php include_once "footer.php" ?>

</body>
</html>
