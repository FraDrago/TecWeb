

<?php $pagina_attuale='index2.php'; ?>

<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" >

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content=" Ambulatorio veterinario di Archimedeo Torre per la cura di animali d'affezione (cani e gatti). L'ambulatorio si trova aPadova, via delle Mele 420" />
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

?>

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
    <li>Ti trovi in: </li>
    <li class="bc_here">Home</li>
</ul>

<!--un po' di separazione-->
<br/>
<br/>

<!-- contenuto -->

<div id="content">

    <div class="leftHome">
    <h2 class="BenvenutoHome">Benvenuto nel sito dell'ambulatorio veterinario Archimedeo Torre!</h2>
    <img id="imghome" src="img/ambu.jpg" alt="immagine dell'ambulatorio"/>
    <p> L'ambulatorio Archimedeo Torre si propone da sempre come punto di riferimento per la cura e il benessere animale</p>
    <p>Da noi troverai solo il meglio in:
        <h3><span class="highlight2">Servizi chirurgici, ambulatoriali e di analisi all'avanguardia </span></h3>
        <h3><span class="highlight2">Prenotazione online e massima efficienza</span></h3>
        <h3><span class="highlight2">Un pronto soccorso aperto 24 ore su 24 </span></h3>
    </p>
    <p> Hai un'emergenza e vuoi chiamarci subito?</p>
    <p> Chiama il numero 0434 56789</p>
    </div>

    <div class="rightHome">

      <h3 div id="orari_title">Orari Ambulatorio</h3>
      <p>Il nostro ambulatorio è aperto tutti i giorni nei seguenti orari: </p>
    
    <table>
    <?php
    $access = new DBAccess();
    $connection = $access->openDBConnection();
    if(!$connection) die("Errore nella connessione.");
        ?>
    
    <tbody>
    
    <?php

        $result=$access-> getOrari();
            if(count($result)>0){?>
              <?php foreach($result as $orari) 
              {?>
        <tr> 
            <td id="giorno"> <?php echo $orari['Giorno']; ?> </td>
            <td id="start"> dalle <?php $ora_normale1=date("H-i", strtotime($orari['OrariStart']));$ora_normale2=date("H-i", strtotime($orari['OrariEnd']));echo $ora_normale1." alle ".$ora_normale2; ?></td>
        </tr> <?php }
          }
        ?>
    </tbody>
    </table>
    
    <div id="box1">
            <h3>Prenota ora una visita accedendo al tuo <a href="AccediReg.php"> account </a></h3>
            <p> Hai dei dubbi? C'è qualcosa che vorresti chiederci?</p><a href="Contattaci.php" class="link-style">Contattaci</a>
        </div>
        <p>Il nostro ambulatorio si trova in via delle mele 123 a Padova, puoi vedere la nostra posizione nella mappa sottostante: </p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.8986918354435!2d11.88528391511255!3d45.41138244498799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda58b44676df%3A0xfacae5884fca17f5!2sTorre+Archimede%2C+Via+Trieste%2C+63%2C+35121+Padova+PD!5e0!3m2!1sit!2sit!4v1549390595230"></iframe>

    </div>

    <div class="galleria">
        <h2>Guarda la galleria dei nostri ospiti!</h2>
        <?php
                $images=$access->getGalleriaRandom(5);
                foreach($images as $key => $image){ ?>
                <div class="box6">
                <div class="contimg">
                    <a href="<?php echo $image['Path']; ?>">
                    <img class="image6"src="<?php echo $image['Path']; ?>" alt="<?php echo htmlentities($image['alt'], ENT_HTML5, "ISO8859-1");?>">
                    </a>  
                </div>
                </div>
                    <?php
                        }   
                ?>
                <div class="altri"><a id="galleria_title" href="galleria.php">Visualizza tutte le foto</a></div>
    </div>


</div>

<?php include_once"footer.php"?>

</body>
</html>
