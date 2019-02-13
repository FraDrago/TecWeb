<?php
$errors = '';
$myemail = 'clinicatorre@gmail.com';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Errore tutti i campi sono necessari";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Errore: Indirizzo mail non valido";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "".$_POST["name"]. "ti ha contattato";;
$sender=$_POST["name"];
$senderEmail=$_POST["email"];
$message=$_POST["message"];
$mailBody="Da: $sender\nEmail: $senderEmail\n\nMessaggio: $message";
mail($recipient, $subject, $mailBody);

header('Location: ContattaciEffettuato.php');
}
?>

<?php 
require_once('DB_Access.php'); ?>
<?php $pagina_attuale='Contattaci.php'; ?>
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
  <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li class="bc_here">Contattaci</li>
</ul>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script src="text/javascript" src="js/script.js"></script>

<!--un po' di separazione-->
<br/>
<br/>

<!-- contenuto -->
<div id="contentCont">
<?php echo nl2br($errors); ?>
 <form class="Contattaci_form" method="POST" action="HandlerEmail.php">
<h2 class="Contattaci">Contattaci</h2>
 <div class="row">
    <div class="col-25"> 
<label for="name">Nome:</label>
</div>
    <div class="col-75">
    <input id="name" name="name" type="text" placeholder="Inserisci qui Nome e Cognome">
     </div>
  </div>
  <div class="row">
    <div class="col-25">
<label for="email"><span xml:lang="en" lang="en">E-mail</span>:</label>
</div>
    <div class="col-75">
      <input id="email" name="email" type="text" placeholder="Inserisci qui la tua mail">
      </div>
  </div>
  <div class="row">
    <div class="col-25">
<label for="message">Messaggio:</label>  
</div>
    <div class="col-75">    
      <textarea id="message" name="message" placeholder="Cosa vuoi chiederci?"></textarea>
</div>
  </div>
  <div class="row">
<input type="submit" value="Invia">
</div>
  </form>
<p></p>
        Non riesci a contattarci? Puoi utilizzare il tuo 
        <a href="mailto:clinicatorre@gmail.com"><span xml:lang="en" lang="en">client</span> di posta</a>
      <p>
        Se preferisci, puoi contattarci al seguente numero di telefono: <a href="tel:+39043456789">0434 56789</a>.
      </p>


<div class="leftCont">
<div id="orari_title">
<h3>Orari Ambulatorio</h3></div>
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
            <td class="giorno"> <?php echo $orari['Giorno']; ?> </td>
            <td class="start"> dalle <?php $ora_normale1=date("H-i", strtotime($orari['OrariStart']));$ora_normale2=date("H-i", strtotime($orari['OrariEnd']));echo $ora_normale1." alle ".$ora_normale2; ?></td>
        </tr> <?php }
          }
        ?>
   </tbody>
  </table>    
</div>


<div class="rightCont">
<h3>Dove trovarci </h3>
<p> L'ambulatorio si trova in Via delle Mele 123 (PD), la nostra posizione è segnata nella mappa sottostante!</p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.8986918354435!2d11.88528391511255!3d45.41138244498799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda58b44676df%3A0xfacae5884fca17f5!2sTorre+Archimede%2C+Via+Trieste%2C+63%2C+35121+Padova+PD!5e0!3m2!1sit!2sit!4v1549377910810"></iframe>
<!-- if(!isempty($POST["first_name"])) se non e' vuoto riceve messaggi -->

 </div>   

</div>

<?php include_once"footer.php"?>
</div>
</body>
</html>

