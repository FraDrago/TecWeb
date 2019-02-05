<?php require_once 'DB_Access.php';

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
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Eventi - Enigma Comics Bar</title>
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
                        <li class="active">Eventi</li>
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
				<div id="eventi" class="section">
                <h1>Eventi</h1>
                <hr>
                </div>
        <?php

        $dbAccess = new DBAccess;
        $openDBConnection=$dbAccess->openDBConnection();

        if($openDBConnection == false){
          die("Errore nella connessione.");
        }
        else{
        
		if(!isset($_SESSION['ID'])){
		$admin=0;
  		}else{
		$id=$_SESSION['ID'];
          	$admin=$dbAccess->isAdmin($id);
  		}
        if($admin){
		          if(isset($_GET['del'])){
		            $id=$_GET['del'];
								$temp=$dbAccess->getEvento($id);
								
		            if(is_numeric($id) && $id>=0){
		              if($dbAccess->EliminaEvento($id)){
											
		                  ?>
		                  <div class="messaggio">Rimozione dell'Evento "<?php echo $temp['Nome']; ?>" effettuata.</div>
		                  <?php
		              }
		            }
		          }
							$messaggio="<ul class=\"messaggio\">";
								if (isset($_POST["submit"])){
									$flag=1;
                                   
                                    
                                    
                                    $messaggio=$dbAccess->CheckForEvento($messaggio,$_POST["nome"],$_FILES["fileToUpload"]["name"],$_POST["data"],$_POST["ora"],$_POST["descrizione"],$_FILES["fileToUpload"]["size"],$_FILES["fileToUpload"]["tmp_name"],"Insert",$flag,-1);
                                    
								}else{
									$nome="";
									$data="";
                                    $ora="";
									$descrizione="";
								}
							$messaggio=$messaggio."</ul>";
							echo $messaggio;
	        }
            
          $result=$dbAccess->getEventi();
        if(count($result)>0){?>
		<div class="eventi">
          <?php  
          foreach($result as $Eventi){ ?>
          <div class="frame">
           <a href="descEvento.php?linkE=<?=$Eventi['ID']?>"><img src="images/Eventi/<?php echo $Eventi['Immagine'] ?>" alt="Evento"></a>
                    <div class="container">
                        <p class="dataOra"><?php $data_normale=date("d-m-Y", strtotime($Eventi['Data']));$ora_normale=date("H-i", strtotime($Eventi['Ora'])); echo $data_normale." ".$ora_normale?></p>
                        <p class="nomeEvento"><?php echo " ".$Eventi['Nome']; ?></p>
                        <?php if($admin){?>
                        <div id="Modifiche">
                  <div id="Modifica"><a href="descEvento.php?mod=<?php echo $Eventi['ID'];?>">Modifica</a></div>
	              <div id="Elimina"><a href="Eventi.php?del=<?php echo $Eventi['ID'];?>" onclick="return(confirm('stai eliminando l\'evento: <?php echo $Eventi['Nome'];?>'))">Elimina</a></div>
	            </div><?php } ?>
                    </div>
		</div>
        
        <?php
          }
        }
        
        ?>
        <?php
	        if($admin){
						?>
	          <div class="Inserimento"> Inserisci un nuovo Evento: </div>
	          <form class="formInserimento" action= "<?php echo $_SERVER [ 'PHP_SELF']; ?>"  method="post" enctype="multipart/form-data">
							<p><label for="nome">Nome: </label></p><fieldset><input id="nome" name="nome" value="<?php echo $nome;?>" type="text"></fieldset>
							<p><label for="immagine">Selezionare nuova immagine: </label></p>
							<fieldset><input type="file" name="fileToUpload" id="fileToUpload"></fieldset>
							<p><label for="data">Data: </label></p><fieldset><input name="data" id="data" placeholder="gg-mm-aaaa" value="<?php echo $data;?>" type="date"></fieldset>
                            <p><label for="ora">Ora: </label></p><fieldset><input name="ora" id="ora" placeholder="hh:mm" value="<?php echo $ora;?>" type="time"></fieldset>
							<p><label for="descrizione">Descrizione Evento: </label></p> <textarea id="descrizione" name="descrizione" rows="10" cols="50" ><?php echo $descrizione;?></textarea>
							<p><button id="inserisci" type="submit" name="submit">Inserisci</button></p>
	          </form>
	      <?php }
          }
				 ?>
	</div>
        <!--eventi-->
       
        
        
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
