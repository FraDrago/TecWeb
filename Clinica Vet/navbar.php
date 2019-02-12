<?php require_once('DB_Access.php');

if (!isset($_SESSION)) {
    session_start();
}


$access = new DBAccess();
$connection = $access->openDBConnection();
if(!$connection) die("Errore nella connessione.");

if(!isset($_SESSION['ID'])){
	$admin=0;
	}else{
		$id=$_SESSION['ID'];
		$admin=$access->isAdmin($id);
	   	}/* FINE CONTROLLO ADMIN*/
?>


<nav role="navigation">
  <div id="menuToggle">

    <input type="checkbox" aria-hidden="true"/>

    <span></span>
    <span></span>
    <span></span>
    
    <ul id="menu">
      <li xml:lang="en" <?php if($pagina_attuale=='index2.php') echo "class='active2'"; ?> ><a accesskey="H" href='index2.php#'>Home</a></li>
          <li <?php if($pagina_attuale=='Servizi.php') echo "class='active2'"; ?>><a accesskey="S" href='Servizi.php#'>Servizi</a></li>
          <li <?php if($pagina_attuale=='Emergenze.php') echo "class='active2'"; ?>><a accesskey="E" href='Emergenze.php#'>Emergenze</a> </li>
          <li <?php if($pagina_attuale=='galleria.php') echo "class='active2'"; ?>><a accesskey="G" href='galleria.php#'>Galleria</a></li>
          <li <?php if($pagina_attuale=='Link.php') echo "class='active2'"; ?>><a accesskey="L" href='Link.php#'>Link Utili</a></li>
          <li <?php if($pagina_attuale=='Contattaci.php') echo "class='active2'"; ?>><a accesskey="C" href='Contattaci.php#'>Contattaci</a></li>
          <li><a></br></a></li>
		  <?php
                	
					
                    if(!$connection) die("Errore nella connessione.");
                    if(isset($_SESSION['email'])){
						if($admin){ ?>
						<li  <?php if($pagina_attuale=='AreaPersonaleVet.php') echo "class='active2'"; ?>><a accesskey="A" href='AreaPersonaleVet.php#'>Area Personale Admin</a></li>
						<?php } 
						else {?>
						<li <?php if($pagina_attuale=='AreaPersonale.php') echo "class='active2'"; ?>><a accesskey="A" href='AreaPersonale.php#'>Area Personale</a></li>
						<?php }
                	}
                    else { ?>
                		<li  <?php if($pagina_attuale=='AccediReg.php') echo "class='active2'"; ?>><a accesskey="A" href='AccediReg.php#'>Accedi/Registrati</a></li>
                	<?php
                	}
                ?>
          
    </ul>
  </div>
</nav>

<div class='nav'>
 <ul>
          <li <?php if($pagina_attuale=='index2.php') echo "class='current'"; ?> ><a accesskey="H" href='index2.php#'><span xml:lang="en" lang="en">Home</span></a></li>
          <li <?php if($pagina_attuale=='Servizi.php') echo "class='current'"; ?>><a accesskey="S" href='Servizi.php#'>Servizi</a></li>
          <li <?php if($pagina_attuale=='Emergenze.php') echo "class='current'"; ?>><a accesskey="E" href='Emergenze.php#'>Emergenze</a> </li>
          <li <?php if($pagina_attuale=='galleria.php') echo "class='current'"; ?>><a accesskey="G" href='galleria.php#'>Galleria</a></li>
          <li <?php if($pagina_attuale=='Link.php') echo "class='current'"; ?>><a accesskey="L" href='Link.php#'><span xml:lang="en" lang="en">Link</span> Utili</a></li>
          <li <?php if($pagina_attuale=='Contattaci.php') echo "class='current'"; ?>><a accesskey="C" href='Contattaci.php#'>Contattaci</a></li>
 <?php
                	
					
                    if(!$connection) die("Errore nella connessione.");
                    if(isset($_SESSION['email'])){
						if($admin){ ?>
						<li <?php if($pagina_attuale=='AreaPersonaleVet.php') echo "class='current'"; ?>><a accesskey="A" href='AreaPersonaleVet.php#'>Area Personale <span xml:lang="en" lang="en">Admin</span></a></li>
						<?php } 
						else {?>
						<li <?php if($pagina_attuale=='AreaPersonale.php') echo "class='current'"; ?>><a accesskey="A" href='AreaPersonale.php#'>Area Personale</a></li>
						<?php }
                	}
                    else { ?>
                		<li <?php if($pagina_attuale=='AccediReg.php') echo "class='current'"; ?>><a accesskey="A" href='AccediReg.php#'>Accedi/Registrati</a></li>
                	<?php
                	}
                ?>
          
</ul>
</div>

  <div>
        <img id="img" src='img/banner.jpg' alt="Immagine banner del sito che rappresenta un cane ed un gatto" /></div>
