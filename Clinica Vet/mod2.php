<!--UPDATE table_name
SET column1=value, column2=value2,...
WHERE some_column=some_value  -->
<?php
require_once('DB_Access.php');
$message = "";
$result = true;
if( isset($_POST["submit"]) && isset($_POST["OrariStart"]) && !empty($_POST["OrariStart"]) && isset($_POST["OrariEnd"]) && !empty($_POST["OrariEnd"])){

    $access = new DBAccess();
    $connection = $access->openDBConnection();
    if(!$connection){
        die("Errore nella connessione.");
    }

    else{
        if(!$access->updateorari($_POST["ID"], $_POST["Giorno"], $_POST["OrariStart"],$_POST["OrariEnd"])){
            $result = false;
            $message = "orario non modificato";
            die($message);
        }
		else{
			header("Location: index2.php");	
		}	
    }

}else{

    $result = false;
    $message = "Completa il form in modo corretto! Alcuni campi sono vuoti";
}
?>