<?php $pagina_attuale='Prenota.php'; ?>
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
  <li><a href="AreaPersonale.php">Area Personale</span></a></li>
  <li class="bc_here">Prenotazioni</li>
</ul>
  
<br/>
<br/>
<div id="content">

<div id="title"><h3>Prenota qui la tua visita:</h3></div>
<div class="appointment-form">
                     
                     <div class="form">
                        <form action="index.html">
                           <div class="form-group">
                                       <input type="text" id="name" placeholder="Your Name">
                                    </div>
                                   <div class="form-group">
                                       <input type="email" placeholder="Email Address" id="email">
                                    </div>
                              
                                    <div class="form-group">
                                       <select class="form-control">
                                          <option>Giorno</option>
                                          <option>Lunedì</option>
                                          <option>Martedì</option>
                                          <option>Mercoledì</option>
                                          <option>Giovedì</option>
                                          <option>Venerdì</option>
                                          
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <select class="form-control">
                                          <option>Ora</option>
                                          <option>AM</option>
                                          <option>PM</option>
                                       </select>
                                    </div>
                                 
                              
                                    <div class="form-group">
                                       <select class="form-control">
                                          <option>Dottore</option>
                                          <option>Dr. Ballan</option>
                                          <option>Dr. Ciman</option>
                                       </select>
                                    </div>
                                
                              
                                    <div class="form-group">
                                       <textarea rows="4" id="textarea_message" class="form-control" placeholder="Your Message..."></textarea>
                                    </div>
                                 
                                    <div class="form-group">
                                       <div class="center"><button type="submit">Submit</button></div>
                                    </div>
                                    </form>
                                    <p> Sarai ricontattato telefonicamente per una conferma della tua prenotazione </p>
                                 </div>
                               </div>
                             </div>

                                 
                              


<?php include_once"footer.php"?>

</body>
</html>


