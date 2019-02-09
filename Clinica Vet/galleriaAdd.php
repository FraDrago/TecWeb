<?php


unset($_POST);
$pagina_attuale = 'galleriaAdd.php'; ?>
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
  <li><a href="galleriaGestione.php">Gestione Galleria</span></a></li>
  <li class="bc_here">Aggiungi</li>
</ul>
  
<br/>
<br/>
<div id="content">
  <div id="title"><h3>Aggiungi Foto</h3></div>
    <!-- tabella per immagini-->
    <div id="contaddform">
    <form id="addform" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Foto:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" value=""/><br/>
            
            <label for="alt">Alt:</label>
            <input type="text" name="alt" placeholder="Alt" value=""/><br/>
            
            <label for="desc">Descrizione:</label>
            <input type="text" name="descrizione" placeholder="Descrizione:" value=""/><br/>
            
            <input type="submit" name="submit" value="Aggiungi" />
            
    </form>
    </div>

</div> <!--chiusura tag page-->

<?php include_once"footer.php"?>

</body>
</html>
