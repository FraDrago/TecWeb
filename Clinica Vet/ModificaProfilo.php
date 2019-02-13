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
        <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <title>Ambulatorio Veterinario Archimedeo Torre</title>
    </head>

<body>
<!-- <div class="noprint"> -->
<?php include_once"header.php"?>

<!--menu di navigazione-->
<?php include_once"navbar.php"?>

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
  <li>Ti trovi in: </li>
  <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
    <li><a href="AreaPersonale.php">Area Personale </a></li>
  <li class="bc_here">Modifica Profilo</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title1"><h2>Modifica profilo</h2></div>
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
  <h3>Dati Personali:</h3>
 <?php
 if(isset($_GET["code"]) && !empty($_GET["code"])){
			if($_GET["code"]=="success") echo  "<h3>L' email esiste già</h3>" ;
		}
		//"' . $_SESSION['ID'] . '"
        $query="SELECT id, name, surname, telefono, email FROM utente WHERE id='".$_SESSION['ID']."'";
        $funziona=mysqli_query($access->connessione, $query) or die("non funziona ");

        while($utente=mysqli_fetch_assoc($funziona)){
          echo '<p> Nome: ' . $utente['name'] . '</p>';
		  echo '<p> Cognome: ' . $utente['surname'] . '</p>';
          echo '<p> Telefono: ' . $utente['telefono'] . '</p>';
          echo '<p> Email: ' . $utente['email'] . '</p>';
        }

 ?> 
 


<?php
}
else { ?>
	<h3>Non sei connesso</h3>
<?php  }?>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////-->


<h3 class="noprint" >Modifica Dati</h3>
  <script src="js/script.js"></script>
	
	<form class="noprint" method="post" action="handler.php" onsubmit="return validateInsertME()">
	<div id="errorAdd"></div>
	
	<p><label for="email">Indirizzo <span xml:lang="en" lang="en">e-mail</span>: </label> </p> <fieldset> <input id='email' type="text" name="email" placeholder= "Email"  required>
	<?php if(isset($_GET["code"]) && !empty($_GET["code"])){
		if($_GET["code"]=="emailErr") echo  ("<p> Email non valida </p>"); } ?>   </input> </fieldset>
	<p><button type="submit" name="cambiaemail" id="cambiaemail" onclick='checkEmail();' >Cambia <span xml:lang="en" lang="en">Email</span></button></p>
	<?php /*preg_match("/^[0-9]{9,10}$/",$string);*/ ?>
	</form>
	
	<form class="noprint" name=telf method="post" action="handler.php" onsubmit="return validateInsertMT()">
	<p><label for="telefono">Telefono: </label></p> <fieldset> <input id="telefono" type="text" name="telefono" placeholder="Telefono" required >
	<?php if(isset($_GET["code"]) && !empty($_GET["code"])){
		if($_GET["code"]=="telefonoErr") echo  ("<p> Telefono non valido </p>"); } ?> </input> </fieldset>
	<p><button type="submit" name="cambiatelefono" id="cambiatelefono"  >Cambia numero</button></p>
</form>
</div>
</div>
</div>
</div>  
	
  
</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>
</div>
</body>
</html>