
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

$images=$access->getImmaginiGalleria();
$access->closeDBConnection();
$pagina_attuale='AreaPersonaleVet.php';
?>

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
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
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
        <li>Ti trovi in:</li>
        <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
        <li><a href="AreaPersonaleVet.php">Area Personale Admin</a></li>
        <li class="bc_here">Gestione Galleria</li>
    </ul>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script src="js/script.js"></script>

    <br/>
    <br/>
    <div id="content">
        <div id="title1"><h2>Gestione Galleria</h2></div>


        <a id="addlink" href="galleriaAdd.php">Aggiungi una foto</a>


        <!-- tabella per immagini-->

        <table id="tabellag">
            <caption class="noprint" >Immagini</caption>
            <thead>
            <tr>
                <th class="noprint" scope="col">Antemprima</th>
                <th scope="col">Alt</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($images as $key => $image) { ?>
                <tr>
                    <td  class="noprint" data-label="Anteprima:"><img class="anteprimag"
                                                     alt="<?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1"); ?>"
                                                     src="<?php echo($image['Path']); ?>"></td>
                    <td data-label="Alt:"><?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1"); ?></td>
                    <td data-label="Descrizione:"><?php echo htmlentities($image['descrizione'], ENT_HTML5, "ISO8859-1"); ?></td>
                    <td>
                        <a href="galleriaMod.php?id=<?php echo $image['id']; ?>">
                            <div class="modificag">Modifica
                                campi
                            </div>
                        </a>
                    </td>
                    <td>
                        <a onclick="deleteImage()" href="galleriaDel.php?id=<?php echo $image['id']; ?>">
                            <div class="eliminag">Elimina
                                immagine
                            </div>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


    </div> <!--chiusura tag page-->

    <?php include_once "footer.php" ?>
</div>
</body>
</html>
