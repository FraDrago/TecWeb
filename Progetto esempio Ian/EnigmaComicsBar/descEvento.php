<?php require_once 'DB_Access.php';$idc;  
    
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
        <title>Evento - Enigma Comics Bar</title>
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
                    $result = $access->openDBConnection();
                    if(!$result)
                    	die("Errore nella connessione");
                    
                    if(isset($_POST['logout'])){
						$access->logout();
						session_start();
					}
                    
                    if(isset($_SESSION['username'])){	?>
						<div id="login">
                        	<h3>AREA PERSONALE</h3>
							<p>Accesso effettuato come: <br /> <?php echo $_SESSION['username']; ?></p>
							<form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post" name="logout">
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

       
        <div class="section">
                <h1>Evento</h1>
        </div>        
		<?php
          $dbAccess = new DBAccess;
          $openDBConnection=$dbAccess->openDBConnection();
          if($openDBConnection == false){
            die("Error in opening DB Connection");
          }
          else{
		if(!isset($_SESSION['ID'])){
		$admin=0;
  		}else{
		$id=$_SESSION['ID'];
          	$admin=$dbAccess->isAdmin($id);
  		}
          if($admin && isset($_GET['mod'])||isset($_GET['del'])&&$admin ){
          
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
            if(isset($_GET['mod'])){
              $id=$_GET['mod'];
              $idc=$id;
              if(is_numeric($id)){
              $result=$dbAccess->getEvento($id);
              if($result){
                $messaggio="<ul class=\"messaggio\">";
                  if (isset($_POST["submit"])){
                  
                 
                   $error=0;
                    $nome=$_POST["nome"];
                    $targetDir = "images/Eventi/";
                    $imageName = $_FILES["fileToUpload"]["name"];
                    if($imageName==""){
                      $imageName =$result['Immagine'];
                    }
                    $targetFile = $targetDir . $imageName;
                    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
                    $data = $_POST["data"];
                    
                    
                    $ora = $_POST["ora"];
                    $descrizione =$_POST["descrizione"];
                    if($result['Nome']!=$nome){
                      if(strlen($nome)<1){
                        $messaggio .= "<li>Nome: Nome troppo corto.</li>";
                        $error=1;
                      }elseif(strlen($nome)>15){
                        $messaggio .= "<li>Nome: Nome troppo lungo.</li>";
                        $error=1;
                      }
                    }
                    
                    if($result['Immagine']!=$imageName){
                      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                          && $imageFileType != "gif") {
                        $messaggio=$messaggio."<li>Immagine: Il file non è una immagine. Sono permessi i file di tipo: JPG, JPEG, PNG e GIF.</li>";
                        $error=1;
                      }elseif ($_FILES["fileToUpload"]["size"] > 4194304) {
                        $messaggio=$messaggio."<li>Immagine: Immagine: Il file non deve superare i 4 MB.</li>";
                        $error=1;
                      }
                    }
                    if(!strtotime($data)||!strtotime($ora)){
                                    if(!strtotime($data)){
                                    $messaggio.="<li>Data: Errori con la Data assicurarsi di aver usato il seguente formato gg-mm-aaaa</li>";
                                    $error=1;
                                    }if(!strtotime($ora)){
                                    $messaggio.="<li>Ora: Errori con l'Ora assicurarsi di aver usato il seguente formato hh:mm 24H</li>";
                                    $error=1;}
                                    }else{
                                    $data=date("Y-m-d", strtotime($data));
                                    $ora=date("H:i", strtotime($ora));
                                    
                                    
                                    
									if(!$dbAccess->validateDate($data)){
                                    $messaggio.=$messaggio."<li>Data: La data non è stata inserita correttamente.</li>";
										$error=1;
                                    }
                                    
                                    if(!$dbAccess->validateTime($ora)){
                                    $messaggio.=$messaggio."<li>Ora: L' Ora non è stata inserita correttamente.</li>";
										$error=1;
                                    }
                                    }
                    if(!$error){
                        if($result['Immagine']!=$imageName && !move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                          $messaggio=$messaggio."<li>Immagine: C'è stato un errore con il caricamento dell'immagine.</li>";
                        }else{
                          if($dbAccess->UpdateEvento($id, mysqli_real_escape_string($dbAccess->connessione,$nome), $imageName, mysqli_real_escape_string($dbAccess->connessione,$data),mysqli_real_escape_string($dbAccess->connessione,$ora),mysqli_real_escape_string($dbAccess->connessione,$descrizione))){
														
                            $messaggio .= "<li>Evento modificato.</li>";
                          }
                        }
                    }else{
                      $messaggio = "<div id=\"errori\">Errori:</div>" . $messaggio;
                    } 
                    $messaggio=$messaggio."</ul>";
										echo $messaggio;
                }
                $result=$dbAccess->getEvento($id);
                ?>
                  <div class="desceventi">
       
          <div class="descframe">
                    <img  src="images/Eventi/<?php echo $result['Immagine'] ?>" alt="Evento">
                    <div class="desccontainer">
                        <p class="dataOra"><?php $data_normale=date("d-m-Y", strtotime($result['Data']));$ora_normale=date("H-i", strtotime($result['Ora'])); echo $data_normale." ".$ora_normale."</br>"?></p><p class="nomeEvento"><?php echo $result['Nome']." "."</br>"?></p><p class="descrizione"><?php echo $result['Descrizione']; ?></p>
                    </div>
		</div>
        <!--frame-->
       
	</div>
    
        <!--eventi-->
								<?php
                if(isset($_POST["submit"])){
                  $result['Nome']=$nome;
                  $result['Data']=$data;
                  $result['Ora']=$ora;
                  $result['Immagine']=$imageName;
                  $result['Descrizione']=$descrizione;
                }?>
                  <div class="Inserimento"> Modifica Evento: </div>
	          <form class="formInserimento" action="descEvento.php?mod=<?php echo $id; ?>"  method="post" enctype="multipart/form-data">
							<p><label for="nome">Nome: </label></p><fieldset><input id="nome" name="nome" value="<?php echo $result['Nome'];?>" type="text"></fieldset>
							<p><label for="immagine">Selezionare nuova immagine: </label></p>
							<fieldset><input type="file" name="fileToUpload" id="fileToUpload"></fieldset>
							<p><label for="data">Data: </label></p><fieldset><input name="data" id="data" placeholder="gg-mm-aaaa" value="<?php echo $result['Data'];?>" type="date"></fieldset>
                            <p><label for="ora">Ora: </label></p><fieldset><input name="ora" id="ora" placeholder="hh:mm" value="<?php echo $result['Ora'];?>" type="time"></fieldset>
							<p><label for="descrizione">Descrizione Evento: </label></p> <textarea id="descrizione" name="descrizione" rows="10" cols="50" ><?php echo $result['Descrizione'];?></textarea>
							<p><button id="inserisci" type="submit" name="submit">Modifica</button></p>
	          </form>
              
                  <?php
              }
            }
            }
            
            
            }else if(!isset($_GET['mod'])){?>
           <?php 
          if(isset($_GET['linkE'])){
          
         
          $idc=$_GET['linkE'];
          ?>
         <?php
         $result=$dbAccess->getEvento($idc);
                ?>
                  <div class="desceventi">
       
          <div class="descframe">
                    <img src="images/Eventi/<?php echo $result['Immagine'] ?>" alt="Evento">
                    <div class="desccontainer">
                        <p class="dataOra"><?php $data_normale=date("d-m-Y", strtotime($result['Data']));$ora_normale=date("H-i", strtotime($result['Ora'])); echo $data_normale." ".$ora_normale."</br>"?></p><p class="nomeEvento"><?php echo $result['Nome']." "."</br>"?></p><p class="descrizione"><?php echo $result['Descrizione']; ?></p>
                        <?php if($admin){?>
                        <div id="Modifiche">
                  <div id="Modifica"><a href="descEvento.php?mod=<?php echo $idc;?>">Modifica</a></div>
	              <div id="Elimina"><a href="Eventi.php?del=<?php echo $idc;?>" onclick="return(confirm('stai eliminando l\'evento: <?php echo $result['Nome'];?>'))">Elimina</a></div>
	            </div><?php } ?>
                    </div>
		</div>
        <!--frame-->
	</div><!--eventi-->
		
        <?php } else{
        $link='Eventi.php';
        ?><div class="messaggio"><?php echo "Non hai selezionato nessun evento, clicca ".'<a href="'.$link.'">qui</a>'." per selezionarne uno";?></div><?php
        }
        }
        ?>
        <div id="evento" class="section">
        <?php 
        	if(isset($_GET['delComm'])){
		        $id=$_GET['delComm'];
				$eliminato = $dbAccess->eliminaCommento($id);
                if($eliminato){
		        ?>
		        <div class="messaggio">Rimozione del commento effettuata.</div>
		        <?php
                }
                else{
		        ?>
		        	<div class="messaggio">Rimozione del commento non avvenuta.</div>
		        <?php
                }
		    }
        	
        	if(isset($_POST['inviaCommento'])){
                if(!$dbAccess->scriviCommento($_SESSION['ID'], $_SESSION['username'], $idc, $_REQUEST['testoCommento'])){ 
                ?>
                	<div class="messaggio"> Errore nell'invio del commento. </div>
                <?php
                }
                else{
                	header("Location: descEvento.php?linkE=$idc");
                }
            }
        	
        	if(isset($_SESSION['username']) && isset($_SESSION['ID']) && isset($idc)){ ?>
        		<div id="commentForm">
					<form action="" method="post" name="nuovoCommento">
						<p><label for="testoCommento">Commenta questo evento: </label></p><textarea rows="6" cols="50" placeholder="Commenta..." name="testoCommento" required></textarea>
						<p><button name="inviaCommento" type="submit">Invia</button></p>
					</form>
				</div>
				<?php
			}
        	
        if(isset($idc)){
        	$result = $dbAccess->getCommenti($idc);
			foreach($result as $commento){
          ?>
        	<div class="commento">
        		<h2><?php echo $commento['Users_username']; ?></h2>
        		<p><?php echo $commento['Testo']; ?></p>
        		<?php if(isset($_SESSION['username']) && (($_SESSION['username']==$commento['Users_username'] && $_SESSION['ID']==$commento['Users_ID']) || $dbAccess->isAdmin($_SESSION['ID']))) { ?>
                	<div id="Elimina"><a href="descEvento.php?delComm=<?php echo $commento['ID'];?>&linkE=<?php echo $idc; ?>" onclick="return(confirm('Stai eliminando il commento'))">Elimina il commento</a></div>
                    <?php
        		} ?>
        	</div>
          <?php
        	}
		}
        }?><!--fine dbaccess-->
        
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