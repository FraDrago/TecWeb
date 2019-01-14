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
        <title>Registrazione avvenuta - Enigma Comics Bar</title>
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
                
                <?php require_once("DB_Access.php") ?>
                <?php
                	session_start();
                    $access = new DBAccess();
            		$connection = $access->openDBConnection();
                    
                    if(!$connection) die("Errore nell'accesso al database");
                    
                    if(isset($_POST['logout'])){
						$access->logout();
						session_start();
					}
                    
                    if(isset($_SESSION['username'])){	?>
						<div id="login">
                        	<h3>AREA PERSONALE</h3>
							<p>Accesso effettuato come: <br /> <?php echo $_SESSION['username']; ?></p>
							<form action="" method="post" name="logout">
								<button name="logout" type="submit">Esci</button>
							</form>
						</div>
					<?php
                	}
                    else { ?>
                		<div id="login">
                    		<h3>AREA PERSONALE</h3>
                    		<a href="login.php">Accedi</a>
                    		<a href="registrazioneUtente.php">Registrati</a>
                		</div>
                	<?php
                	}
                ?>
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
                        <a href="#chi-siamo">Chi siamo</a>
                        <a href="#eventi">Eventi</a>
                        <a href="#panini">Panini</a>
                        <a href="#drinks"><span xml:lang="en" lang="en">Drinks</span></a>
                        <a href="#contattaci">Contattaci</a>
                    </div>
                </div>
            </div>
            
            <div id="registrazioneAvvenuta">
            	<p>Registrazione avvenuta, ciao <?php echo $_SESSION['username']; ?>!</p>
            	<p><a href="Home.php">Torna alla <span xml:lang="en" lang="en">home</span></a></p>
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
