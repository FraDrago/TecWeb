
<?php
session_start();
if(isset($_SESSION['error'])){
	
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
	
	
	
	
	
	
	
	
	echo $error;
}
else{
	header('Location: index2.php');
}	



?>


