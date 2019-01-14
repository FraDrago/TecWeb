<?php
	require_once "DB_Access.php";
?>

    <!DOCTYPE  html>
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Bar a tema fumetti con serate dedicate ad artisti, appassionati di ogni genere, giochi da tavolo  con ospiti speciali e molto altro" />
  		<meta name="keywords" content="bar, enigma, comics, fumetti, manga, giocatori, ospiti, serate a tema" />
  		<meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Enigma Comics Bar</title>
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

                <?php
                	session_start();
                    $access = new DBAccess();
            		$connection = $access->openDBConnection();

                    if(!$connection) die("Errore nella connessione.");/*CONTROLLO ADMIN*/
                    
					if(!isset($_SESSION['ID'])){
						$admin=0;
					}else{
					$id=$_SESSION['ID'];
		          		$admin=$access->isAdmin($id);
		          	}/* FINE CONTROLLO ADMIN*/
                    if(isset($_POST['logout'])){
                        if($access->logout())
							session_start();
                        else die("Errore nella connessione.");
					}

                    if(isset($_SESSION['username'])){	?>
						<div id="login">
                        	<h3>AREA PERSONALE</h3>
							<p>Accesso effettuato come: <br /> <?php echo $_SESSION['username']; ?></p>
							<form action="<?php echo $_SERVER [ 'PHP_SELF']; ?>" method="post" name="logout">
								<p><button name="logout" type="submit">Esci</button><p>
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
                        <a href="Home.php#chi-siamo">Chi siamo</a>
                        <a href="Eventi.php">Eventi</a>
                        <a href="Panini.php">Panini</a>
                        <a href="Drinks.php"><span xml:lang="en" lang="en">Drinks</span></a>
                        <a href="Home.php#contattaci">Contattaci</a>
                        <a class="darkBackground" href="login.php">Pannello d'accesso</a>
                    	<a class="darkBackground" href="registrazioneUtente.php">Registrati</a>
                    </div>
                </div>
            </div>

            <div id="chi-siamo" class="section">
                <h1>Chi siamo</h1>
                <hr>
                <p>
                    Enigma <span xml:lang="en" lang="en">Comics</span> Bar è un locale a tema fumetti
					che offre incontri con esponenti delle maggiori case editoriali, autori, disegnatori,
                    doppiatori e artisti in generale.
					Durante la settimana si potrà assistere a una varietà di eventi tematici con la
                    possibilità di esporre le proprie opere o dimostrare i propri talenti.
					Il tutto accompagnato da buon cibo, con una vasta gamma di panini,
                    <span xml:lang="en" lang="en">hamburgers</span> e <span xml:lang="en" lang="en">drinks</span> di tutti i tipi.
                </p>
            </div>

            <div id="eventi" class="section">
                <h1>Eventi</h1>
                <hr>
                </div>
                 <?php
                 $result=$access->getEventiHome(3);
        if(count($result)>0){?>
		<div class="eventi">
          <?php  
          foreach($result as $Eventi){ ?>
          <div class="frame">
           <a href="descEvento.php?linkE=<?=$Eventi['ID']?>"><img src="images/Eventi/<?php echo $Eventi['Immagine'] ?>" alt="Evento"></a>
                    <div class="container">
                        <p><?php $data_normale=date("d-m-Y", strtotime($Eventi['Data']));$ora_normale=date("H-i", strtotime($Eventi['Ora'])); echo $data_normale." ".$ora_normale." ".$Eventi['Nome']; ?></p>
                    </div>
		</div>
        <?php } ?>
        </div>
         <?php } ?>
         		
                <div class="altri"><a href="Eventi.php">Visualizza tutti gli eventi</a></div>
            	

            <div id="panini" class="section">
                <h1>Panini</h1>
                <hr>
                <?php
					$result=$access->getPaniniRandom(3);
					if(count($result)>0){
						foreach($result as $Panini){?>
                    <div class="box">
                        <div class="name">
                            <span xml:lang="en" lang="en"><?php echo $Panini['Nome']; ?></span>
                        </div>
                        <div class="boxImage"><img class="image" alt="Foto di un panino" src="images/Panini/<?php echo $Panini['Immagine'];?>">
                        </div>
                        <div class="descrizione">Ingredienti:
                            <?php echo $Panini['Ingredienti'];?>
                        </div>
                        <div class="prezzo">€
                            <?php echo $Panini['Prezzo'];?>
                        </div>
                    </div>
                    <?php
						}
					}
                ?>
                        <div class="altri"><a href="Panini.php">Visualizza tutti i panini</a></div>
            </div>

            <div id="drinks" class="section">
                <h1>Drinks</h1>
                <hr>
                <?php
					$result=$access->getDrinksRandom(3);
				    if(count($result)>0){
						foreach($result as $Drinks){?>
                    <div class="box">
                        <div class="name">
                            <span xml:lang="en" lang="en"><?php echo $Drinks['Nome']; ?></span>
                        </div>
                        <div class="boxImage"><img class="image" alt="Foto di un drink" src="images/Drinks/<?php echo $Drinks['Immagine'];?>">
                        </div>
                        <div class="descrizione">
                            <?php echo $Drinks['Descrizione'];?>
                        </div>
                        <div class="prezzo">€
                            <?php echo $Drinks['Prezzo'];?>
                        </div>
                    </div>
                    <?php
				        }
                    }
                ?>
                        <div class="altri"><a href="Drinks.php">Visualizza tutti i <span xml:lang="en" lang="en">drinks</span></a></div>
            </div>

            <div id="contattaci" class="section">
                <h1>Contattaci</h1>
                <hr>

                <?php
$result=$access->getContattaci();
if(count($result)>0){
  foreach($result as $Cont){?>
                    <div class="contenitore">
                        <img class="image" alt="Foto di un contatto" src="images/Contattaci/<?php echo $Cont['FileImmagine']; ?>">
                        <div class="cont_text">
                            <div class="cont_nome">
                                <?php echo $Cont['Nome']; ?>
                            </div>
                            <div class="cont_num">
                                Telefono:
                                <?php echo $Cont['NumeroTelefono']; ?>
                            </div>
                            <div class="cont_email">
                                Email:
                                <?php echo $Cont['Email']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
  }
}
if($admin){?>
  <a href="Modifica_Contattaci.php">Modifica la sezione contattaci</a>
<?php }
$access->closeDBConnection();
?>



            </div>
        </div>

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

    </html>
