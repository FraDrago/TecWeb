<?php require_once('DB_Access.php'); ?>
<?php 
session_start();
	
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

	$access = new DBAccess();
	$connection = $access->openDBConnection();

  if(isset($_POST['cambiaemail']) ){
	  
    //$emailErr = "Email is required";
  
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ModificaProfilo.php?code=emailErr");
	  exit();
    }
  
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
	
	$telefono = $_POST['telefono'];
	$query = "UPDATE utente SET telefono='" .$telefono."' WHERE id='".$_SESSION['ID']."'";
    $update = mysqli_query($access->connessione , $query);


}
header("Location: ModificaProfilo.php");
exit();


?>
