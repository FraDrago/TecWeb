<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Bar a tema fumetti con serate dedicate ad artisti, appassionati di ogni genere, giochi da tavolo  con ospiti speciali e molto altro" />
  		<meta name="keywords" content="bar, enigma, comics, fumetti, manga, giocatori, ospiti, serate a tema" />
  		<meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <title>Login - Enigma Comics Bar</title>
    </head>
    
    <body>      
    	<!--wrapper-->
        <div id="wrapper">
          
          	<!--header-->
            <div id="header">
                <img id="logo" alt="logo" src="images/logo.png">
       			
                <div id="titolo">
                    <h1>ENIGMA</h1>
                    <h2>COMICS BAR</h2>
                </div>
            </div>
            
            <!--navbar-->
            <div id="navbar">
                <div id="menu-entries">
                    <ul>
                        <li><a href="Home.php#"><span xml:lang="en" lang="en">Home</span></a></li>
                        <li><a href="Home.php#chi-siamo">Chi siamo</a></li>
                        <li><a href="Eventi.php">Eventi</a></li>
                        <li><a href="Panini.php">Panini</a></li>
                        <li><a href="Drinks.php"><span xml:lang="en" lang="en">Drinks</span></a></li>
                        <li><a href="Home.php#contattaci">Contattaci</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <button onclick="dropFunction()" class="dropbutton"><i class="fa fa-bars"></i>Menu</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="Home.php#"><span xml:lang="en" lang="en">Home</span></a>
                        <a href="Home.php#chi-siamo">Chi siamo</a>
                        <a href="Eventi.php">Eventi</a>
                        <a href="Panini.php">Panini</a>
                        <a href="Drinks.php"><span xml:lang="en" lang="en">Drinks</span></a>
                        <a href="Home.php#contattaci">Contattaci</a>
                    </div>
                </div>
            </div>
            <div class="section">
                <h1><span xml:lang="en" lang="en">Login</span></h1>
                <hr>
            
            <?php
		      require('DB_Access.php');
              $access = new DBAccess();
              $connection = $access->openDBConnection();
              
              if(!$connection) die("Errore nella connessione.");
              
              else{
              	session_start();
                
                if(isset($_POST['logout'])){
                	if($access->logout())
                    	header("Location: Home.php");
					else
                    	die("Errore nella connessione.");
				}
              	
            	$messaggioErrore = "";
		        if (isset($_REQUEST['username'])){
                  	$result = $access->login($_REQUEST['username'], $_REQUEST['password']);
                   	if($result['valid']){
                		$_SESSION['username'] = $result['Username'];
                		$_SESSION['ID'] = $result['ID'];
                		header("Location: Home.php");
					}
                   	else
                   		$messaggioErrore .= "<span xml:lang=\"en\">Username</span> o <span xml:lang=\"en\">password</span> errati.";
              	}
                
                if(isset($_SESSION['username'])){	?>
                                   
					<div class="loginAndRegistrationForm">
						<p>Accesso effettuato come: <?php echo $_SESSION['username']; ?></p>
						<form action="<?php echo $_SERVER [ 'PHP_SELF']; ?>" method="post" name="logout">
							<p><button name="logout" type="submit">Esci</button></p>
						</form>
					</div>
					<?php
				}
	          	
	          	else {
                
	          	?>
	          	
	          	<h2 class="message"> <?php echo $messaggioErrore; ?> </h2>
	          	
	          	<div class="loginAndRegistrationForm">
	            	<form name="login" action="<?php echo $_SERVER [ 'PHP_SELF']; ?>" method="post">
                    	<p><label for="username"><span xml:lang="en" lang="en">Username:</span> </label></p><fieldset><input id="username" type="text" placeholder="Username" name="username" required></fieldset>
                        <p><label for="password"><span xml:lang="en" lang="en">Password:</span> </label></p><fieldset><input id="password" type="password" placeholder="Password" name="password" required></fieldset>
                        <p><button type="submit">Entra</button></p>
	            	</form>
	            	<p>Non sei registrato? <a href='registrazioneUtente.php'>Registrati qui!</a></p>
	          	</div>
            
	          <?php
            	} 
            }?>
        </div>
        </div>
        <!--wrapper-->
        <div id="footer">
            <p><span xml:lang="en" lang="en">Copyright</span> &copy; Enigma <span xml:lang="en" lang="en">Comics</span> Bar 2018. Tutti i diritti riservati.</p>
            <p>Via Fasulla 123, Firenze, Italia.</p>
        </div>

        <!--script per il dropdown menu-->
        <script>
            // Apri/chiudi menu al click
            function dropFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            // Chiudi il menu se l'utente clicca fuori dalla sua area
            window.onclick = function(event) {
                if (!event.target.matches('.dropbutton')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
    </body>
    <!--body-->
</html>
