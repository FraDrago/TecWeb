
<?php $pagina_attuale='AreaPersonaleVet.php';
if (!isset($_SESSION)) {
    session_start();
}
require_once('DB_Access.php');

$access = new DBAccess();
$connection = $access->openDBConnection();
if (!$connection) {
    $_SESSION['error'] = "Si sono sono verificati dei problemi. Riprovare pi&ugrave; tardi.";
    $_SESSION['error_code'] = "500";
    header("Location: error.php");
}

if (!isset($_SESSION['ID']) || (isset($_SESSION['ID']) && !$access->isAdmin($_SESSION['ID']))) { //l'utente loggato DEVE essere admin

    $_SESSION['error'] = "Non hai i permessi per accedere a questa sezione";
    $_SESSION['error_code'] = "403";
    header("Location: error.php");
}

if(!empty($_POST))
  

  if(isset($_POST['Accetta']))
    {
      //$connection = mysqli_connect("localhost","root","","clinica");
      //if(!$connection) die("Errore nella connessione."); 
      $query="UPDATE visita SET approvazione=1 WHERE ID=".(integer)$_POST['valore'];
      $result=mysqli_query($access->connessione,$query);
      //echo "visita accettata ".$_POST['valore'];
    }
  else
  {
      //$connection = mysqli_connect("localhost","root","","clinica");
      //if(!$connection) die("Errore nella connessione."); 
      $query="UPDATE visita SET approvazione=2 WHERE ID=".(integer)$_POST['valore'];
      $result=mysqli_query($access->connessione,$query);
      //echo "visita rifiutata ".$_POST['valore'];
  }
?>
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

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
  <li>Ti trovi in: </li>
  <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li><a href="AreaPersonaleVet.php">Area Personale Admin</span></a></li>
  <li class="bc_here">Gestione prenotazioni</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title"><h3>Gestione prenotazioni</h3></div>

<?php
//$connection = mysqli_connect("localhost","root","","clinica");
//if(!$connection) die("Errore nella connessione.");

$q="SELECT * FROM visita";
$result=mysqli_query($access->connessione, $q) or die("impossibile eseguire la query");
echo "<table> <th>Data e Ora</th> <th>Utente</th> <th>Prestazione</th> <th>Tipo di animale</th> <th>Stato</th>";
while($row=mysqli_fetch_assoc($result)){ //finché ci sono visite
  echo "<tr>";
  $id=$row['ID'];
  $ora=$row['DataOra'];
  $u=$row['Utente'];
  $utente=mysqli_query($access->connessione, "SELECT Email FROM utente WHERE ID=$u");
  $utente=mysqli_fetch_assoc($utente);
  $p=$row['Prestazione'];
  $prest=mysqli_query($access->connessione, "SELECT Nome FROM prestazione WHERE ID=$p");
  $prest=mysqli_fetch_assoc($prest);
  $g_c=$row['gatto_or_cane'];
  if($g_c=='0')
    $g_c='gatto';
  else
    $g_c='cane';
  $a=$row['approvazione'];
  $t='0';
  if($a=='1')
      $t='accettata';
  if($a=='2')
      $t='rifiutata';

  if($a=='0')//in attesa
  {
    echo"<form name=form method=post action=prenotaGestione.php>";
    echo "<td>".$ora."</td> <td>".$utente['Email']."</td> <td>".$prest['Nome']."</td> <td>".$g_c."</td><td><input type='submit' name='Accetta' value='Accetta'><input type='submit' name='Rifiuta' value='Rifiuta'><input type='hidden' name='valore' value=".$id."</td>";
    echo "</form>";
  }
  else
    echo "<td>".$ora."</td> <td>".$utente['Email']."</td> <td>".$prest['Nome']."</td> <td>".$g_c."</td> <td>".$t;

  
  }
echo "</table>";

?>


</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
