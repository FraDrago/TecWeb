<!--UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value  -->
<?php
require_once('DB_Access.php');
$message = "";
$result = true;
if( isset($_POST["submit"]) && isset($_POST["alt"]) && !empty($_POST["alt"]) && isset($_POST["descrizione"]) && !empty($_POST["descrizione"])){

    $access = new DBAccess();
    $connection = $access->openDBConnection();
    if(!$connection){
        die("Errore nella connessione.");
    }

    else{
        if(!$access->updateImmagineGalleria($_POST["id"], $_POST["alt"], $_POST["descrizione"])){
            $result = false;
            $message = "immagine non modificata";
            die($message);
        }
		else{
			header("Location: galleria.php");	
		}	
    }

}else{

    $result = false;
    $message = "Completa il form in modo corretto! Alcuni campi sono vuoti";
}
?>