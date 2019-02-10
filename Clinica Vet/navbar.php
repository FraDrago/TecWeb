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

    <input type="checkbox" />

    <span></span>
    <span></span>
    <span></span>
    
    <ul id="menu">
      <li <?php if($pagina_attuale=='index2.php') echo "class='active2'"; ?> ><a href='index2.php#'>Home</a></li>
          <li <?php if($pagina_attuale=='Servizi.php') echo "class='active2'"; ?>><a href='Servizi.php#'>Servizi</a></li>
          <li <?php if($pagina_attuale=='Emergenze.php') echo "class='active2'"; ?>><a href='Emergenze.php#'>Emergenze</a> </li>
          <li <?php if($pagina_attuale=='galleria.php') echo "class='active2'"; ?>><a href='galleria.php#'>Galleria</a></li>
          <li <?php if($pagina_attuale=='Link.php') echo "class='active2'"; ?>><a href='Link.php#'>Link Utili</a></li>
          <li <?php if($pagina_attuale=='Contattaci.php') echo "class='active2'"; ?>><a href='Contattaci.php#'>Contattaci</a></li>
          <li><a></br></a></li>
		  <?php
                	
					
                    if(!$connection) die("Errore nella connessione.");
                    if(isset($_SESSION['email'])){
						if($admin){ ?>
						<li class='active2' <?php if($pagina_attuale=='AreaPersonaleVet.php'); ?>><a href='AreaPersonaleVet.php#'>Area Personale</a></li>
						<?php } 
						else {?>
						<li class="active2"> <?php if($pagina_attuale=='AreaPersonale.php'); ?>><a href='AreaPersonale.php#'>Area Personale</a></li>
						<?php }
                	}
                    else { ?>
                		<li class="active2"> <?php if($pagina_attuale=='AccediReg.php'); ?>><a href='AccediReg.php#'>Accedi/Registrati</a></li>
                	<?php
                	}
                ?>
          
    </ul>
  </div>
</nav>

<div class='nav'>
 <ul>
          <li <?php if($pagina_attuale=='index2.php') echo "class='current'"; ?> ><a href='index2.php#'>Home</a></li>
          <li <?php if($pagina_attuale=='Servizi.php') echo "class='current'"; ?>><a href='Servizi.php#'>Servizi</a></li>
          <li <?php if($pagina_attuale=='Emergenze.php') echo "class='current'"; ?>><a href='Emergenze.php#'>Emergenze</a> </li>
          <li <?php if($pagina_attuale=='galleria.php') echo "class='current'"; ?>><a href='galleria.php#'>Galleria</a></li>
          <li <?php if($pagina_attuale=='Link.php') echo "class='current'"; ?>><a href='Link.php#'>Link Utili</a></li>
          <li <?php if($pagina_attuale=='Contattaci.php') echo "class='current'"; ?>><a href='Contattaci.php#'>Contattaci</a></li>
 <?php
                	
					
                    if(!$connection) die("Errore nella connessione.");
                    if(isset($_SESSION['email'])){
						if($admin){ ?>
						<li <?php if($pagina_attuale=='AreaPersonaleVet.php') echo "class='current'"; ?>><a href='AreaPersonaleVet.php#'>Area Personale Admin</a></li>
						<?php } 
						else {?>
						<li <?php if($pagina_attuale=='AreaPersonale.php') echo "class='current'"; ?>><a href='AreaPersonale.php#'>Area Personale</a></li>
						<?php }
                	}
                    else { ?>
                		<li <?php if($pagina_attuale=='AccediReg.php') echo "class='current(array)'"; ?>><a href='AccediReg.php#'>Accedi/Registrati</a></li>
                	<?php
                	}
                ?>
          
</ul>
</div>

  <div id='img'>
        <img src='img/banner.jpg' width='100%'/></div>
