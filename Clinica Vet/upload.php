
<?php

require_once('DB_Access.php');
$target_dir = "img/galleria/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$result = true;
$message = "";

if( isset($_POST["submit"]) && isset($_POST["alt"]) && !empty($_POST["alt"]) && isset($_POST["descrizione"]) && !empty($_POST["descrizione"]) && isset($_FILES["fileToUpload"])){

	// Check if image file is a actual image or fake image
	
	if(isset($_POST["submit"])) {
		
		//die(var_dump(getimagesize($_FILES["fileToUpload"]["tmp_name"]), $_FILES));
		//die('pp');
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$result = true;
		} else {
			$message = "File is not an image.";
			$result = false;
		}
	}
	
	

	if ($_FILES["fileToUpload"]["size"] > 50000000) {
		$message = "Sorry, your file is too large.";
		$result = false;
	} 

	// Check if $uploadOk is set to 0 by an error
	if ($result == true) {
		
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//$message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			
			$access = new DBAccess();
			$connection = $access->openDBConnection();
			if(!$connection){
				die("Errore nella connessione.");
			}
			else{
				if(!$access->insertImmaginiGalleria($target_file, $_POST["alt"], $_POST["descrizione"])){
					$result = false;
					$message = "immagine non caricata";
					die($message);
				}
			}	

			
		} else {
			$message = "Sorry, there was an error uploading your file.";
			$result = false;
		}
	}
	else{
		$message = "Sorry, your file was not uploaded.";
		$result = false;
	}	
}
else{
	
	$result = false;
	$message = "Completa il form in modo corretto! Alcuni campi sono vuoti";
}	


if($result){
	unset($_POST);
	unset($_FILE);
	header('Location: galleria.php');
}
else{
	unset($_POST);
	unset($_FILE);
	session_start();
	$_SESSION['error'] = $message;
	header('Location: error.php');
}	
?>