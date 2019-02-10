
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
$pagina_attuale='galleriaGestione.php';
?>
<?php $pagina_attuale='AreaPersonaleVet.php'; ?>
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
        <li>Ti trovi in:</li>
        <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
        <li><a href="AreaPersonaleVet.php">Area Personale Admin</span></a></li>
        <li class="bc_here">Gestione Galleria</li>
    </ul>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script type="text/javascript" src="script.js"></script>

    <br/>
    <br/>
    <div id="content">
        <div id="title"><h3>Gestione Galleria</h3></div>


        <a id="addlink" href="galleriaAdd.php">Aggiungi una foto</a>


        <!-- tabella per immagini-->
        <div id=tabgalleria>
            <table id="tabellag">
                <thead>
                <tr>
                    <th>Antemprima immagine</th>
                    <th>Alt</th>
                    <th>Descrizione</th>
                    <th>Modifica</th>
                    <th>Elimina</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($images as $key => $image) { ?>
                    <tr>
                        <td><img class="anteprimag"
                                 alt="<?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1"); ?>"
                                 src="<?php echo($image['Path']); ?>"></td>
                        <td><?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1"); ?></td>
                        <td><?php echo htmlentities($image['descrizione'], ENT_HTML5, "ISO8859-1"); ?></td>
                        <td>
                            <div class="modificag"><a href="galleriaMod.php?id=<?php echo $image['id']; ?>">Modifica
                                    immagine</div>
                        </td>
                        <td>
                            <div class="eliminag"><a href="galleriaDel.php?id=<?php echo $image['id']; ?>">Elimina
                                    immagine</div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>


    </div> <!--chiusura tag page-->

    <?php include_once "footer.php" ?>

</body>
</html>
