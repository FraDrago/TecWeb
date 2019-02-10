<?php
require_once('DB_Access.php');
$access = new DBAccess();
if (!isset($_SESSION)) {
    session_start();
}
$message = "";
$result = true;
$connection = $access->openDBConnection();
if (!$connection) {
    $_SESSION['error'] = "Connessione al database mancante!";
    $_SESSION['error_code'] = "500";
    header("Location: error.php");
}

if (!isset($_SESSION['ID']) || (isset($_SESSION['ID']) && !$access->isAdmin($_SESSION['ID']))) {

    $_SESSION['error'] = "Non hai i permessi per accedere a questa sezione";
    $_SESSION['error_code'] = "403";
    header("Location: error.php");
}

if (isset($_GET) && isset($_GET["id"]) && !empty($_GET["id"])) {


    $image = $access->getImmagineSingola($_GET['id']);

    if ($image == null) {

        $_SESSION['error'] = "L'immagine richiesta non esiste";
        $_SESSION['error_code'] = "404";
        header("Location: error.php");
    } else {
        //die(var_dump("DELETE FROM galleria WHERE id=".$id));
        if ($access->deleteImmagineGalleria($_GET['id'])) {

            header("Location: galleria.php");
        } else {
            $_SESSION['error'] = "Qualcosa &egrave; anato storto";
            $_SESSION['error_code'] = "500";
            header("Location: error.php");
        }
    }


} else {

    $_SESSION['error'] = "Qualcosa &egrave; anato storto";
    $_SESSION['error_code'] = "500";
    header("Location: error.php");
}
?>