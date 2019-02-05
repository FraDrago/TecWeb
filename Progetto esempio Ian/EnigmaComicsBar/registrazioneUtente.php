<?php require_once('DB_Access.php');
?>
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
        <title>Registrazione - Enigma Comics Bar</title>
        
        <script>
        	function check() {
    			if (document.getElementById('password').value == document.getElementById('controlPassword').value){
					document.getElementById('pswMessage').innerHTML = '';
					document.getElementById('submit').disabled = false;
				}
    			else {
    				document.getElementById('pswMessage').innerHTML = 'Attenzione! Le password devono coincidere';
        			document.getElementById('submit').disabled = true;
    			}
			}
        </script>
    </head>
    
    <body>      
    	<!--wrapper-->
        <div id="wrapper">
          
          	<!--header-->
            <div id="header">
                <img id="logo" alt="Logo" src="images/logo.png">
       			
                <div id="titolo">
                    <h1>ENIGMA</h1>
                    <h2><span xml:lang="en" lang="en">COMICS</span> BAR</h2>
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
            
            <div id="registrazione" class="section">
            	<h1>Registrazione</h1>
                <hr>
            
            <?php
              $access = new DBAccess();
              $connection = $access->openDBConnection();
              
              if(!$connection) die("Errore nella connessione");
              
              else{
              	session_start();
              	
            	$messaggioErrore = "";
		        if (isset($_REQUEST['username'])){
                  	if($_REQUEST['password'] != $_REQUEST['controlPassword']){
                    	$messaggioErrore .= "ATTENZIONE! Le due password devono coincidere.";
                    }
		            else{
						$result = $access->insertUser($_REQUEST['username'],$_REQUEST['name'],$_REQUEST['surname'],$_REQUEST['email'],$_REQUEST['password']);
                		if($result){
                			$username = stripslashes($_REQUEST['username']);
                			$username = mysqli_real_escape_string($access->connessione,$username);
                			$_SESSION['username'] = $username;
                  			header("Location: registrazioneAvvenuta.php");
                		}	
					}
              	}
	          	?>
	          	
	          	<h2 class="messaggio"> <?php echo $messaggioErrore; ?> </h2>

	    
	          	
	          	<div class="loginAndRegistrationForm">
	            	<form name="registration" action="<?php echo $_SERVER [ 'PHP_SELF']; ?>" method="post">
                    	<p><label for="name">Nome: </label> </p> <fieldset><input id="name" type="text" name="name" placeholder="Nome" required /></fieldset>
                    	<p><label for="surname">Cognome: </label> </p> <fieldset><input id="surname" type="text" name="surname" placeholder="Cognome" required /></fieldset>
          	    		<p><span xml:lang="en" lang="en"><label for="username">Username: </label></span> </p> <fieldset><input id="username" type="text" name="username" placeholder="Username" required /></fieldset>
          	    		<p><span xml:lang="en" lang="en"><label for="email">Indirizzo e-mail: </label></span> </p> <fieldset><input id="email" type="email" name="email" placeholder="Email" required /></fieldset>
	           	    	<p><span xml:lang="en" lang="en"><label for="password">Password: </label></span> </p> <fieldset><input type="password" name="password" id="password" onkeyup="check();" placeholder="Password" required /></fieldset>
                    	<p><label for="controlPassword">Reinserisci la <span xml:lang="en" lang="en">password: </span></label> </p> <fieldset><input id="controlPassword" type="password" name="controlPassword" onkeyup="check();" placeholder="Password" required /></fieldset>
                    	<h2 class="message" id="pswMessage"></h2>
                    	
		            	<p><button type="submit" name="submit" id="submit" disabled>Registrati</button></p>
	            	</form>
	          	</div>
            
	          <?php
            	} ?>
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
