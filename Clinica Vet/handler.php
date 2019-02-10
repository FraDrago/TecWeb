<?php require_once('DB_Access.php'); ?>
<?php 
session_start();
	
	
	

	$access = new DBAccess();
	$connection = $access->openDBConnection();

  if(isset($_POST['cambiaemail'])){
	$email = $_POST['email'];
	$query= "UPDATE utente SET email='" .$email."' WHERE id='".$_SESSION['ID']."'";
    $allowed = mysqli_query($access->connessione , $query );

}

if(isset($_POST['cambiatelefono'])){
	$telefono = $_POST['telefono'];
	$query = "UPDATE utente SET telefono='" .$telefono."' WHERE id='".$_SESSION['ID']."'";
    return mysqli_query($access->connessione , $query);

}
header("Location: ModificaProfilo.php");
exit();




/*<?php


mysql_connect ("localhost", "username", "pass") or die ('Error: ' . mysql_error());
mysql_select_db ("db_name");

$query="INSERT INTO users (email, level)VALUES ('".$email."','".$level."')";

mysql_query($query) or die ('Error updating database');

echo "Database Updated With: " .$email. " ".$level ;

?>*/






?>
