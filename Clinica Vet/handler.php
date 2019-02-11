<?php require_once('DB_Access.php'); ?>
<?php 
session_start();
	
	
	

	$access = new DBAccess();
	$connection = $access->openDBConnection();

  if(isset($_POST['cambiaemail']) && (preg_match("/^[0-9]{9,10}$/",$_POST['cambiaemail']))){
	$select = mysqli_query($access->connessione, "SELECT `email` FROM `utente` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($connectionID));
	if(mysqli_num_rows($select)) {
    header("Location: ModificaProfilo.php?code=success");
	exit();
	}
	$email = $_POST['email'];
	$query= "UPDATE utente SET email='" .$email."' WHERE id='".$_SESSION['ID']."'";
    $update = mysqli_query($access->connessione , $query );

}
else if(isset($_POST['cambiatelefono'])){
	if (!preg_match("/^[0-9]{9,10}$/",$_POST['cambiaemail']))
		{
			echo ("cacca");
		}
	$telefono = $_POST['telefono'];
	$query = "UPDATE utente SET telefono='" .$telefono."' WHERE id='".$_SESSION['ID']."'";
    $update = mysqli_query($access->connessione , $query);


}
header("Location: ModificaProfilo.php");
exit();


?>
