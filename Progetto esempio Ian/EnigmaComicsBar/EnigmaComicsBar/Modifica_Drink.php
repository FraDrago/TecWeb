<?php
	require_once "DB_Access.php";
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
        <title>Modifica Drink - Enigma Comics Bar</title>
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
						                    $id=$_SESSION['ID'];
											if(!isset($_SESSION['ID'])){
												$admin=0;
											}else{
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
						                    </div>
						                </div>
						            </div>

            <div id="modDrink" class="section">
            	<h1>Modifica drink</h1>
                <hr>
            <?php
	          if($admin){ ?>

	        <?php
	            if(isset($_GET['mod'])){
	              $id=$_GET['mod'];
	              if(is_numeric($id)){
	              $result=$access->getDrink($id);
	              if($result){
	                $messaggio="<ul class=\"messaggio\">";
	                  if (isset($_POST["submit"])){
	                    $error=0;
	                    $nome=$_POST["nome"];
	                    $targetDir = "images/Drinks/";//percorso della cartella dove inserire il file
	                    $imageName = $_FILES["fileToUpload"]["name"];// nome.estensione del file
	                    if($imageName==""){
	                      $imageName =$result['Immagine'];
	                    }
	                    $targetFile = $targetDir . $imageName;//percorso di destinazione del file
	                    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));// Controllo il tipo dell'immagine
	                    $prezzo = $_POST["prezzo"];
	                    $descrizione = $_POST["descrizione"];
	                    if($nome!=$result['Nome']){
	                      if(strlen($nome)<3){
	                        $messaggio .= "<li>Nome: Nome troppo corto.</li>";
	                        $error=1;
	                      }elseif(strlen($nome)>25){
	                        $messaggio .= "<li>Nome: Nome troppo lungo.</li>";
	                        $error=1;
	                      }elseif(!$access->controllaNomeDrink(mysqli_real_escape_string($access->connessione,$nome))){
	                        $messaggio .= "<li>Nome: Nome già esistente.</li>";
	                        $error=1;
	                      }
	                    }
	                    if(!is_numeric($prezzo)){
	                     $messaggio .= "<li>Prezzo: Il prezzo deve essere di tipo numerico.</li>";
	                     $error=1;
	                    }
	                    if($result['Immagine']!=$imageName){
	                      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	                          && $imageFileType != "gif") {
	                        $messaggio=$messaggio."<li>Immagine: Il <span xml:lang=\"en\">file</span> non è una immagine. Sono permessi i <span xml:lang=\"en\">file</span> di tipo: JPG, JPEG, PNG e GIF.</li>";
	                        $error=1;
	                      }elseif (file_exists($targetFile)) {
	                        $messaggio=$messaggio."<li>Immagine: Il <span xml:lang=\"en\">file</span> esiste già.</li>";
	                        $error=1;
	                      }elseif ($_FILES["fileToUpload"]["size"] > 4194304) {
	                        $messaggio=$messaggio."<li>Immagine: Immagine: Il <span xml:lang=\"en\">file</span> non deve superare i 4 <abbr title=\"<span xml:lang=\"en\">Megabyte\">MB</span></abbr>.</li>";
	                        $error=1;
	                      }
	                    }
	                    if(!$error){
	                        if($result['Immagine']!=$imageName && !move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
	                          $messaggio=$messaggio."<li>Immagine: C'è stato un errore con il caricamento dell'immagine.</li>";
	                        }else{
	                          if($access->UpdateDrink($id, mysqli_real_escape_string($access->connessione,$nome), $imageName, $prezzo, mysqli_real_escape_string($access->connessione,$descrizione))){
															if($result['Immagine']!=$imageName){
																$image=$result['Immagine'];
																unlink("images/Drinks/$image");
															}
	                            $messaggio .= "<li><span xml:lang=\"en\">Drink modificato</span>.</li>";
	                          }
	                        }
	                    }else{
	                      $messaggio = "<div id=\"errori\">Errori:</div>" . $messaggio;
	                    }
	                    $messaggio=$messaggio."</ul>";
	                		echo $messaggio;
	                }
	                $result=$access->getDrink($id);// riaggiorno il drink
	                ?>
	                  <div class="box"><div class="name">
	                    <span xml:lang="en" lang="en"><?php echo $result['Nome']; ?></span>
	                  </div>
	                      <div class="boxImage"><img class="image" alt="Foto di un drink" src="images/Drinks/<?php echo $result['Immagine'];?>">
	                </div>
	                <div class="descrizione"><?php echo $result['Descrizione'];?> </div>
                    <div class="prezzo">€<?php echo $result['Prezzo'];?> </div>
	                </div>
	                <?php
	                if(isset($_POST["submit"])){
	                  $result['Nome']=$nome;
	                  $result['Prezzo']=$prezzo;
	                  $result['Immagine']=$imageName;
	                  $result['Descrizione']=$descrizione;
	                }?>
                    </div>
	                  <div class="Inserimento"> Modifica <span xml:lang="en" lang="en">drink</span>: </div>
	                  <form class="formInserimento" action="Modifica_Drink.php?mod=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
	                    <p><label for="nome">Nome: </label></p><fieldset><span xml:lang="en" lang="en"><input id="nome" name="nome" value="<?php echo $result['Nome'];?>" type="text"></span></fieldset>
	                    <p><label for="immagine">Selezionare nuova immagine: </label></p>
	                    <fieldset><input type="file" name="fileToUpload" id="fileToUpload"></fieldset>
	                    <p><label for="prezzo">Prezzo: </label></p><fieldset><input name="prezzo" id="prezzo" value="<?php echo $result['Prezzo'];?>" type="text"></fieldset>
	                    <p><label for="descrizione"></label></p>Descrizione: <p><textarea id="descrizione" name="descrizione" rows="10" cols="50" ><?php echo $result['Descrizione'];?></textarea></p>
	                    <p><button id="inserisci" type="submit" name="submit">Modifica</button></p>
	                  </form>
	                  <?php
	              }
	            }
						}else{ ?>
							<div id="errorMsg">Non hai selezionato nessun <span xml:lang="en" lang="en">drink</span>, <a href="Panini.php">selezionane uno</a> </div>
						</div>
						<?php }
            $access->closeDBConnection();
            }else{?>
          	<div class="AreaRiservata"><p>Area riservata.</p> <p><a href="Home.php">Torna alla home</a></p></div>
						</div>
						<?php } ?>

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
