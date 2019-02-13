
<?php $pagina_attuale='AreaPersonale.php'; 
if (!isset($_SESSION)) {
    session_start();
}
require_once('DB_Access.php');

$access = new DBAccess();
$connection = $access->openDBConnection();


if (!isset($_SESSION['ID']) || (isset($_SESSION['ID']) && $access->isAdmin($_SESSION['ID']))) { //l'utente loggato non deve essere admin

    $_SESSION['error'] = "Non hai i permessi per accedere a questa sezione";
    $_SESSION['error_code'] = "403";
    header("Location: error.php");
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
  <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li><a href="AreaPersonale.php">Area Personale</span></a></li>
  <li class="bc_here">Gestione prenotazioni</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title"><h2>Prenota qui la tua visita:</h2></div>
<div class="LoginBox">
  <div class="BoxLogin">
  <div class="loginAndRegistrationForm">
<?php if(!empty($_POST))
  {
  $id=$_SESSION['ID'];
  $d=$_POST['data'];
  $o=$_POST['ora'];
  $p=$_POST['prestazione'];
  $t=$_POST['tipo'];
  $n=$_POST['note'];

  //*****controllo data inserita*****
  $a=(integer)substr($d,0,4);
  $m=(integer)substr($d,5,2);
  $g=(integer)substr($d,8);

  $ora=(integer)substr($o,0,2);
  $minuti=(integer)substr($o,3,2);

  
  if(($ora>=0 && $ora<24) && ($minuti>=0 && $minuti<60))
  {
    $actual_date= date('Y').'-'.date('m').'-'.date('d');
    if(!(checkdate($m, $g, $a)) || $d<$actual_date )
      echo("Non &egrave stata inserita una data valida");
    else//aggiungiamo l'entry al database
      {
          if($access->insertVisita($id, $d, $o, $p, $t, $n))
            echo"Richiesta mandata con successo";
         else
            echo"Non &egrave stato possibile inoltrare la richiesta";
      }
  }
  else
    echo "L'ora inserita non &egrave valida";
}
?>
<form name="prenota" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <p><label for="data"><span xml:lang="en" lang="en">Inserisci la data:</span> </label></p>
  <input type="date" id="data" name="data">
  <p><label for="ora"><span xml:lang="en" lang="en">Inserisci l'ora:</span> </label></p>
  <input type="time" id="ora" name="ora">
  <p><label for="tipo"><span xml:lang="en" lang="en">Tipo di visita:</span> </label></p>
  <select id="prestazione" name="prestazione">
    <?php
        //$connection = mysqli_connect("localhost","root","","clinica");
        //if(!$connection) die("Errore nella connessione.");
        $query="SELECT id, nome FROM prestazione";
        $result=mysqli_query($access->connessione, $query) or die("Impossibile ottenere la lista delle prestazioni");

        while($row=mysqli_fetch_assoc($result)){
          echo "<option value=".$row['id'].">".$row['nome']."</option>";
        }

    ?>
  </select></div>
  <p><label for="ora"><span xml:lang="en" lang="en">Tipo di animale:</span> </label></p>
  <input type="radio" name="tipo" value=0 checked="checked"><span xml:lang="en" lang="en">gatto</span>
  <input type="radio" name="tipo" value=1>cane</br></br>
  <div class="loginAndRegistrationForm">
  <textarea id="prenotazioni" maxlength="400" rows="5" cols="50" name="note" placeholder="Inserisci qui eventuali note aggiuntive"></textarea></br>
  <p><button type="submit" name="invia">INVIA</button></p>
</form>

</div>
</div>

<div id="tabellapre">

<?php
//$connection = mysqli_connect("localhost","root","","clinica");
//if(!$connection) die("Errore nella connessione.");
$u=(string)$_SESSION['ID'];
$q="SELECT * FROM visita WHERE DataOra>NOW() AND Utente=".$u;
$result=mysqli_query($access->connessione, $q) or die("Non ci sono visite da mostrare");
if(mysqli_num_rows($result)>0)
  {?> <table> <tr> <th>Data e Ora</th> <th>Prestazione</th> <th>Tipo di animale</th> <th>Stato</th> </tr><?php
    while($row=mysqli_fetch_assoc($result)){ //finché ci sono visite
      echo "<tr>";
      $id=$row['ID'];
      $ora=$row['DataOra'];
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
      if($a=='0')
          $t='in attesa';
      if($a=='1')
          $t='accettata';
      if($a=='2')
          $t='rifiutata';
      ?><td><?php echo $ora;?></td> <td><?php echo $prest['Nome'];?></td> <td><?php echo $g_c; ?></td> <td><?php echo $t;?><?php
    }
    ?></table><?php
  }
  else//se non ci sono visite
{
  echo "Non ci sono visite da mostrare";
}
$access->closeDBConnection();
?></div>
  
</div>
</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
