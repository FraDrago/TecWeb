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
  <li><a href="index2.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li class="bc_here">Contattaci</li>
</ul>

<!--un po' di separazione-->
<br/>
<br/>

<!-- contenuto -->

<div id="content">
    <?php
//if "email" variable is filled out, send email
ini_set('SMTP','myserver');
ini_set('smtp_port',25);

  if (isset($_REQUEST['email']))  {
  
  //Email information
  $admin_email = "francydrake97@gmail.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['first_name'];
  $comment = $_REQUEST['message'];
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>

    <div class="messaggio">
      <h1>Vuoi contattarci?</h1>
      <form id="contattaci-form"  method="post">
        <ul>
          <li>
            <label for="name">Nome:</label>
            <input type="text" name="first_name" id="name" />
          </li>
          <li >
            <label for="email" xml:lang="en">E-mail:</label>
            <input type="text" name="email" id="email" size="35" />
          </li>
          <li >
            <label for="message-text">Messaggio:</label>
            <textarea name="message" id="message-text" rows="40" cols="60"></textarea>
          </li>
          <li class="submit-form">
            <input type="submit" name="submit" value="Richiedi informazioni" >
          </li>
        </ul>
      </form>

        Non riesci a contattarci? Puoi utilizzare il tuo 
        <a href="mailto:clinicatorre@gmail.com?subject=mettere soggetto, forse prenotazione?">client di posta</a>
      <p>
        Se preferisci, puoi contattarci al seguente numero di telefono: <a href="tel:+39043456789">0434 56789</a>.
      </p>
    </div>

	<?php
  }
?>
	
<div class="infoContattaci">
<h3 div id="orari_title">Orari Ambulatorio</h3>

<div class="orariCont">
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
    
</div>
<h3>Dove trovarci </h3>
<p> L'ambulatorio si trova in via delle Mele 123 (PD)</p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.8986918354435!2d11.88528391511255!3d45.41138244498799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda58b44676df%3A0xfacae5884fca17f5!2sTorre+Archimede%2C+Via+Trieste%2C+63%2C+35121+Padova+PD!5e0!3m2!1sit!2sit!4v1549377910810" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
<!-- if(!isempty($POST["first_name"])) se non e' vuoto riceve messaggi -->

 </div>   
</div>

<?php include_once"footer.php"?>

</body>
</html>
