<?php $pagina_attuale='AreaPersonaleVet.php'; ?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <title>Ambulatorio Veterinario Archimedeo Torre</title>
    </head>

<body>

<?php include_once"header.php"?>

<!--menu di navigazione-->
<?php include_once"navbar.php"?>

<?php 


$access = new DBAccess();
$connection = $access->openDBConnection();
if(!$connection) die("Errore nella connessione.");

$access->closeDBConnection(); 

?>


<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
  <li>Ti trovi in: </li>
  <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li><a href="AreaPersonaleVet.php">Area Personale Admin</span></a></li>
  <li class="bc_here">Gestione Orario</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title"><h3>Gestione orario ambulatorio</h3></div>

<!-- tabella orari-->
  <div id=tabgalleria>
    <table id="tabellag">
     
      <?php
    $access = new DBAccess();
    $connection = $access->openDBConnection();
    if(!$connection) die("Errore nella connessione.");
        ?>
      
      <thead>
        <tr>
          <th>Giorno</th>
          <th>Orario</th>
          <th>Modifica</th>
        </tr>
      </thead>
     <tbody>
        <?php

        $result=$access-> getOrari();
            if(count($result)>0){?>
              <?php foreach($result as $orari) 
              {?>
          <tr>
            <td id="giorno"> <?php echo $orari['Giorno']; ?> </td>
            <td id="start"> dalle <?php $ora_normale1=date("H-i", strtotime($orari['OrariStart']));$ora_normale2=date("H-i", strtotime($orari['OrariEnd']));echo $ora_normale1." alle ".$ora_normale2; ?></td>
            <td><a href="OrariMod.php?ID=<?php echo $orari['ID']; ?>">Modifica Orari</td>
          </tr><?php }
          }
        ?>
      </tbody>
    </table>
  </div>


</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
