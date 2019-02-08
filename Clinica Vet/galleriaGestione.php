<?php 
require_once('DB_Access.php');


$access = new DBAccess();
$connection = $access->openDBConnection();
if(!$connection) die("Errore nella connessione.");

$images=$access->getImmaginiGalleria();
$access->closeDBConnection();
$pagina_attuale='galleriaGestione.php';
?>

<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione, quali cani e gatti" />
      <meta name="keywords" content="ambulatorio, veterinario, Archimedeo, Torre, animali, cani, gatti, pets, dogs, cats, vet" />
      <meta name="language" content="italian it"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
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
  <li><a href="AreaPersonale.php">Area Personale</span></a></li>
  <li class="bc_here">Gestione Galleria</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title"><h3>Gestione Galleria</h3></div>

  <!-- form non buono
  <form action="galleriaAdd.php">
      <input type="submit" value="Aggiungi una foto" />
  </form>
  -->
  

 <a id="addlink" href="galleriaAdd.php">Aggiungi una foto</a>


  <!-- tabella per immagini-->
  <div id=tabgalleria>
    <table id="tabellag">
      <thead>
        <tr>
          <th>Antemprima immagine</th>
          <th>Alt</th>
          <th>Descrizione</th>
          <th>Modifica</th>
          <th>Elimina</th>
        </tr>
      </thead>
     <tbody>
        <?php  foreach($images as $key => $image){ ?>
          <tr>
            <td>anteprima</td>
            <td><?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1");?></td>
            <td><?php echo htmlentities($image['descrizione'], ENT_HTML5, "ISO8859-1"); ?></td>
            <td><a href="galleriaMod.php">Modifica immagine</td>
            <td><a href="galleriaDel.php">Elimna immagine</td>
          </tr>
         <?php } ?>
      </tbody>
    </table>
  </div>



</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
