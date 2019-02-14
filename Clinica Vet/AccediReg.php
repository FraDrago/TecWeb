<?php $pagina_attuale='AccediReg.php'; ?>

<!DOCTYPE  html>

		
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li class="bc_here">Accedi/Registrati</li>
</ul>

<!--un po' di separazione-->
<br/>
<br/>

<!-- contenuto -->
<div id="content">

                <h2>Pannello di Controllo</h2>
            <div class="LoginBox">
            <?php
		      
              $access = new DBAccess();
              $connection = $access->openDBConnection();
              
              if(!$connection) die("Errore nella connessione.");
              
              else{
              	
                
                if(isset($_POST['logout'])){
                	if($access->logout())
                    	header("Location: index.php");
					        else
                    	die("Errore nella connessione.");
				        }
              	
            	  $messaggioErrore = "";
                  if (isset($_REQUEST['email'])) {
                      $result = $access->login($_REQUEST['email'], $_REQUEST['password']);
                    if($result['valid']){
                          session_start();
                      		$_SESSION['email'] = $result['Email'];
                      		$_SESSION['ID'] = $result['ID'];
                      		header("Location: index.php");
          					}
                    else{
                        $messaggioErrore .= "Email o password errati.";
                    }
              	}
                
                if(isset($_SESSION['email'])){	?>
                                   
        					<div class="loginAndRegistrationForm">
        						<p>Accesso effettuato con:<span class="highlight"> <?php echo $_SESSION['email']; ?></span></p>
                                <form action="AccediReg.php" method="post" name="logout">
        							<p>Vuoi fare il <span xml:lang="en" lang="en">logout?</span></p>
                      <button name="logout" type="submit">Esci</button>
        						</form>
        					</div>
        					<?php
				        }
	          	
	          	else {
                
	          	?>
	          	
	          	<h2 class="message"> <?php echo $messaggioErrore; ?> </h2>
	          	
	          	<div class="loginAndRegistrationForm">
                <div class="BoxLogin">
                    <form name="login" action="AccediReg.php" method="post">
                        <p><label for="email">Inserisci <span xml:lang="en" lang="en">Email</span>:</label></p>
                        <fieldset><input id="email" type="text" placeholder="Email" name="email" required></fieldset>
                        <p><label for="password">Inserisci <span xml:lang="en" lang="en">Password</span>:</label></p><fieldset><input id="password" type="password" placeholder="Password" name="password" required></fieldset>
                        <p><button type="submit">Entra</button></p>
	            	</form>
	            	<p class="Reg_Doubt">Non sei registrato? <a href='registrati.php'>Registrati qui!</a></p>
              </div>
	          	</div>
            
	          <?php
            	} 
            }?>
</div>
</div>

<?php include_once"footer.php"?>
</div>
</body>
</html>