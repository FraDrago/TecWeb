<?php $pagina_attuale='Contattaci.php'; ?>
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

<div class="content">
    <div id="anchor"></div>

    <div class="messaggio">
      <h1>Vuoi contattarci?</h1>
      <h2 id="spazio-nome">Richiedi informazione compilando il modulo!<br/>Ti contatteremo il prima possibile!</h2>
      <form id="contattaci-form" action="" method="post">
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
        <a href="mailto:clinicatorre@gmail.com?subject=mettere soggetto, forse prenotazione?">client di posta</a>.
      </p>
        In alternativa, puoi contattare tramite il seguente indirizzo email: clinicatorre@gmail.com.
      </p>
      <p>
        Se preferisci, puoi contattarci al seguente numero di telefono: <a href="tel:+39043456789">0434 56789</a>.
      </p>
    </div>

<!-- if(!isempty($POST["first_name"])) se non e' vuoto riceve messaggi -->

    
</div>

<?php include_once"footer.php"?>

</body>
</html>
