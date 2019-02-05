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
    <title>Modifica Contattaci - Enigma Comics Bar</title>
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
			                    </div>
			                </div>
			            </div>

			<div id="contattaci" class="section">
            	<h1>Contattaci</h1>
            	<hr>
					<?php
						if($admin){?>
							<?php
							if(isset($_GET['del']) && is_numeric($_GET['del'])){
								$id=$_GET['del'];
								$get=$access->getContattaciID($id);
								$nome=$get['Nome'];
								$imageName=$get['FileImmagine'];
								$numero=$get['NumeroTelefono'];
								$email=$get['Email'];
									if($access->EliminaContattaci($id)){
											unlink("images/Contattaci/$imageName");
											?>
											<ul class="messaggio"><li>Rimozione del contatto "<?php echo $nome; ?>" effettuata.</li></ul>
											<?php
									}else{
										?> <ul class="messaggio"><li>Errore nella rimozione del contatto "<?php echo $nome; ?>".</li></ul><?php
									}
								}
								if(isset($_POST["submit"])){
									$nome=$_POST["nome"];
									$targetDir = "images/Contattaci/";//percorso della cartella dove inserire il file
									$imageName = basename($_FILES["fileToUpload"]["name"]);// nome.estensione del file
									$targetFile = $targetDir . $imageName;//percorso di destinazione del file
									$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));// Controllo il tipo dell'immagine
									$numero = $_POST["numero"];
									$email = $_POST["email"];
									$error=0;
									$messaggio="<ul class=\"messaggio\">";
									if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
												&& $imageFileType != "gif") {
											$messaggio=$messaggio."<li>Immagine: Il file non è una immagine. Sono permessi i file di tipo: JPG, JPEG, PNG e GIF.</li>";
											$error=1;
									}elseif (file_exists($targetFile)) {
										$messaggio=$messaggio."<li>Immagine: Il file esiste già.</li>";
										$error=1;
									}elseif ($_FILES["fileToUpload"]["size"] > 4194304) {
										$messaggio=$messaggio."<li>Immagine: Immagine: Il file non deve superare i 4 MB.</li>";
										$error=1;
									}
									if(!$error){
											if(!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
												$messaggio=$messaggio."<li>Immagine: C'è stato un errore con il caricamento dell'immagine.</li>";
												$error=1;
											}else{
												if($access->saveNewContattaci(mysqli_real_escape_string($access->connessione,$nome), $imageName, mysqli_real_escape_string($access->connessione,$numero), mysqli_real_escape_string($access->connessione,$email))){
													$messaggio .= "<li>Contatto inserito.</li>";
												}
											}
									}else{
										$messaggio = "<div id=\"errori\">Errori:</div>" . $messaggio;
									}
								$messaggio=$messaggio."</ul>";
								echo $messaggio;
								}
                if(!isset($_POST["submit"]) || $error==0){
                  $nome="";
                  $numero="";
                  $email="";
                }
							$result=$access->getContattaci();
							if(count($result)>0){
						  foreach($result as $Cont){?>
								<div class="contenitore">
	                        <img class="image" alt="Foto di un contatto" src="images/Contattaci/<?php echo $Cont['FileImmagine']; ?>">
	                        <div class="cont_text">
	                            <div class="cont_nome"><span xml:lang="en" lang="en">
	                                <?php echo $Cont['Nome']; ?></span>
	                            </div>
	                            <div class="cont_num">
	                                Telefono:
	                                <?php echo $Cont['NumeroTelefono']; ?>
	                            </div>
	                            <div class="cont_email">
	                                <span xml:lang="en" lang="en">Email:</span>
	                                <?php echo $Cont['Email']; ?>
	                            </div>
	                        </div>

													<div id="Modifiche">
														<div id="EliminaContatto"><a href="Contattaci.php?del=<?php echo $Cont['ID'];?>" onclick="return(confirm('stai eliminando il contatto: <?php echo $Cont['Nome'];?>'))">Elimina</a></div>
													</div>
	                    </div>
                    
						  <?php
						}
						?>
						</div>
							<div class="Inserimento"> Inserisci nuovo contatto: </div>
							<form class="formInserimento" action= "<?php echo $_SERVER [ 'PHP_SELF']; ?>"  method="post" enctype="multipart/form-data">
								<p><label for="nome">Nome: </label></p><fieldset><input id="nome" name="nome" placeholder="Nome" value="<?php echo $nome;?>" type="text"></fieldset>
								<p><label for="immagine">Selezionare nuova immagine: </label></p>
								<fieldset><input type="file" name="fileToUpload" id="fileToUpload"></fieldset>
								<p><label for="numero">Numero Telefono: </label></p><fieldset><input name="numero" id="numero" placeholder="Numero" value="<?php echo $numero;?>" type="text"></fieldset>
								<p><label for="numero"><span xml:lang="en" lang="en">Email: </span></label></p><fieldset><input name="email" id="email" placeholder="Email" value="<?php echo $email;?>" type="email"></fieldset>
								<p><button id="inserisci" type="submit" name="submit">Inserisci</button></p>
							</form>
					<?php

						}
					}else{?>
					<div class="AreaRiservata"><p>Area riservata.</p> <p><a href="Home.php">Torna alla home</a></p></div>
					</div>
                    <?php
					}
					$access->closeDBConnection();
					?>
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
</html>
