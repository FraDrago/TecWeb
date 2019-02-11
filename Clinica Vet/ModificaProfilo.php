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
		  echo '<p> ID: ' .$_SESSION['ID']. '</p>';
          echo '<p> Nome: ' . $utente['name'] . '</p>';
		  echo '<p> Cognome: ' . $utente['surname'] . '</p>';
          echo '<p> Telefono: ' . $utente['telefono'] . '</p>';
          echo '<p> Email: ' . $utente['email'] . '</p>';
        }
				

		
?>

    <!-- <form id="insertNumber" action="clientManager.php" method="post" >
      <label for="number <?php echo $utente['id'] ?>">Nuovo numero di telefono:</label>
      <input name="number" type="text" id="number <?php echo $utente['id'] ?>" size="9" />
      <?php echo '<input name="clientId" type="hidden" value="' . $utente['id'] . '"/>'; ?>
      <input type="submit" class="admin-input" id="submit" name="submitNumber" value="Modifica numero" />
    </form>

    <form id="insertEmail" action="clientManager.php" method="post" enctype="multipart/form-data">
      <label for="email<?php echo $utente['id'] ?>">Nuova email:</label>
      <input name="email" type="text" id="email<?php echo $utente['id'] ?>" size="23" />
      <?php echo '<input name="clientId" type="hidden" value="' . $utente['id'] . '"/>'; ?>
      <input type="submit" class="admin-input" id="submit" name="submitEmail" value="Modifica email" />
    </form>
	
	<div class="loginAndRegistrationForm">
	<form name="cambiadati" action="<?php echo $_SERVER [ 'PHP_SELF']; ?>" method="post">
	<p><span xml:lang="en" lang="en"><label for="telefono">Telefono: </label></span> </p> <fieldset><input id="telefono" type="text" name="telefono" placeholder="Telefono" required /></fieldset>
	<p><button type="submit" name="submit" id="submit" disabled>Registrati</button></p>
	<p><span xml:lang="en" lang="en"><label for="email">Indirizzo e-mail: </label></span> </p> <fieldset><input id="email" type="email" name="email" placeholder="Email" required /></fieldset>
	<p><button type="submit" name="submit" id="submit" disabled>Registrati</button></p>
	</form>
	</div>-->
<hr></hr>
<h3>Modifica Dati</h3>

	<form method="post" action="handler.php">
	
	<p><span xml:lang="en" lang="en"><label for="email">Indirizzo e-mail: </label></span> </p> <fieldset><input id="email" type="email" name="email" placeholder="Email" required /></fieldset>
	<p><button type="submit" name="cambiaemail" id="cambiaemail" >Cambia Email</button></p>
	</form>
	<form method="post" action="handler.php">
	<p><span xml:lang="en" lang="en"><label for="telefono">Telefono: </label></span> </p> <fieldset><input id="telefono" type="text" name="telefono" placeholder="Telefono" required /></fieldset>
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