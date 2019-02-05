<?php $pagina_attuale='galleria.php'; ?>

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

$images=$access->getImmaginiGalleria();
$access->closeDBConnection();
$pagina_attuale='galleria.php'; 

?>

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
    <li>Ti trovi in: </li>
    <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
    <li class="bc_here">Galleria</li>
</ul>
    

<br/>
<br/>
<div id="content">

<div id="title"><h3>Galleria</h3></div>
    <p>Qui troviamo le foto pi&ugrave; belle dei nostri pazienti a quattro zampe! </p>

<div id="gallery">
    <div class="grid">
       
        <?php
        //var_dump($images);
        foreach($images as $key => $image){ /*var_dump($image); die();*/?>
            <div class="contg">
                <div class="contimg">
                    <a href="<?php echo $image['Path']; ?>">
                    <img class="imageg"src="<?php echo $image['Path']; ?>" alt="<?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1");?>">
                    </a>  
                </div>
                <div class="desc"><?php echo htmlentities($image['descrizione'], ENT_HTML5, "ISO8859-1"); ?>
                </div>
            </div>
        <?php } ?>
   
</div>



</div>
<br>
<br/>


</div>

<?php include_once"footer.php"?>

</body>
</html>
