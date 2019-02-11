<!--UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value  -->
<?php
require_once('DB_Access.php');
$message = "";
$result = true;

if (isset($_POST["submit"]) && isset($_POST["ID"]) && !empty($_POST["ID"]) && isset($_POST["start"]) && !empty($_POST["start"]) && isset($_POST["end"]) && !empty($_POST["end"])) {

    $access = new DBAccess();
    $connection = $access->openDBConnection();
    if(!$connection){
        die("Errore nella connessione.");
    }

    else{

        if (!$access->updateorari($_POST["ID"], $_POST["start"], $_POST["end"])) {
            $result = false;
            $message = "orario non modificato";

        }
		else{

            header("Location: orariGestione.php");
		}	
    }

}else{

    $result = false;
    $message = "Completa il form in modo corretto! Alcuni campi sono vuoti";
}
?>