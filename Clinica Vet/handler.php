<?php require_once('DB_Access.php'); ?>
<?php 
session_start();
	
	
	

	$access = new DBAccess();
	$connection = $access->openDBConnection();

  if(isset($_POST['cambiaemail'])){
	$email = $_POST['email'];
	$query= "UPDATE utente SET email='" .$email."' WHERE id='".$_SESSION['ID']."'";
    $update = mysqli_query($access->connessione , $query );

}
else if(isset($_POST['cambiatelefono'])){
	$telefono = $_POST['telefono'];
	$query = "UPDATE utente SET telefono='" .$telefono."' WHERE id='".$_SESSION['ID']."'";
    $update = mysqli_query($access->connessione , $query);


}
header("Location: ModificaProfilo.php");
exit();


?>
