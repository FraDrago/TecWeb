<?php $pagina_attuale='AccediReg.php'; ?>

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Ambulatorio Veterinario Archimedeo Torre</title>
    </head>
<body>

<div id="page" class="container">

<?php include_once"header.php"?>

<!--menu di navigazione-->
<?php include_once"navbar.php"?>

<div id="page" class="container">
<!--breadcrumb-->

<ul class="breadcrumb">
  <li>Ti trovi in: </li>
  <li><a href="index.php"><span xml:lang="en" lang="en">Home</span></a></li>
  <li class="bc_here">Accedi/Registrati</li>
</ul>

<!--un po' di separazione-->
<br/>
<br/>

<!-- contenuto -->
<div id="content">

                <h2>Pannello di Controllo</h2>
            <div class="LoginBox">
              <div class="loginAndRegistrationForm">
                    <h2>Registrazione Avvenuta!</h2>
                    <h3><a href='AccediReg.php'>Effettua il <span xml:lang="en" lang="en">Login</span></a></h3>

              </div>
            </div>
</div>
</div>

<?php include_once"footer.php"?>
</div>
</body>
</html>