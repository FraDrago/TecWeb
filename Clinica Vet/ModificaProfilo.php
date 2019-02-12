<?php $pagina_attuale='AreaPersonale.php'; ?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <title>Ambulatorio Veterinario Archimedeo Torre</title>
    </head>

<body>

<?php include_once"header.php"?>

<!--menu di navigazione-->
<?php include_once"navbar.php"?>

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
  <li>Ti trovi in: </li>
  <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
    <li><a href="AreaPersonale.php">Area Personale</span></a></li>
  <li class="bc_here">Modifica Profilo</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title"><h3>Modifica profilo</h3></div>
  <!-- cambio nome, cambio telefono, cambio mail, etc,-->
 
<!-- ///////////////////////////////////////////////////////////////////////////////////////////-->



<?php
//metodochenoricordo("/^[0-9]{9,10}$/",$string);

$access = new DBAccess();
$result = $access->openDBConnection();
if(!$result)
die("Errore nella connessione");
                  
         
if(isset($_SESSION['ID'])){	?>
<div id="login">
<div class="LoginBox">
  <div class="BoxLogin">
  <div class="loginAndRegistrationForm">
 <?php
 if(isset($_GET["code"]) && !empty($_GET["code"])){
			if($_GET["code"]=="success") echo  "<h3>L' email esiste già</h3>" ;
		}
 ?> 
 
<h3>Dati Personali:</h3>

<?php
}
else { ?>
	<h3>Non sei connesso</h3>
<?php
}
?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////-->

 
 <?php
		
		
		
		if(isset($_SESSION['ID'])){
        $connection = mysqli_connect("localhost:3307","root","","clinica");
        if(!$connection) die("Errore nella connessione.");
		//"' . $_SESSION['ID'] . '"
        $query="SELECT id, name, surname, telefono, email FROM utente WHERE id='".$_SESSION['ID']."'";
        $result=mysqli_query($connection, $query) or die("non funziona ");

        while($utente=mysqli_fetch_assoc($result)){
          echo '<p> Nome: ' . $utente['name'] . '</p>';
		  echo '<p> Cognome: ' . $utente['surname'] . '</p>';
          echo '<p> Telefono: ' . $utente['telefono'] . '</p>';
          echo '<p> Email: ' . $utente['email'] . '</p>';
        }
				

		
?>


<hr></hr>
<h3>Modifica Dati</h3>
  <script type="text/javascript" src="js/script.js"></script>

	<form method="post" action="handler.php">
	
	<p><label for="email">Indirizzo <span lang='en'>e-mail</span>: </label></span> </p> <fieldset><input id="email" type="email" name="email" placeholder= "Email" required /></fieldset>
	<p><button type="submit" name="cambiaemail" id="cambiaemail" >Cambia <span lang='en'>Email</span></button></p>
	<?php /*preg_match("/^[0-9]{9,10}$/",$string);*/ ?>
	</form>
	<form name=telf method="post" action="handler.php">
	<p><label for="telefono">Telefono: </label></p> <fieldset><input id="telefono" type="tel" name="telefono" placeholder="Telefono" required onblur="check_telefono(telf)  pattern="[0-9]{9,10}" /></fieldset>
	<p><button type="submit" name="cambiatelefono" id="cambiatelefono" >Cambia numero</button></p>
</form>

</div>
</div>
		<?php }?>


</div>
</div>  
	
  
</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>