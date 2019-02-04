<?php 
require_once('./config/config.php');
require_once('./utils/database_utils.php');

$connection = connectToDatabase($servername, $username, $password, $dbname);

/**
 * make queries!!!
 */

/*$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}*/

$connection->close();
$pagina_attuale='galleria.php'; 

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
	<li class="bc_here">Galleria</li>
</ul>
	

<br/>
<br/>
<div id="content">

<div id="title"><h3>Galleria</h3></div>
    <p>Qui troviamo le foto pi&ugrave; belle dei nostri pazienti a quattro zampe! </p>

<div id="gallery">
    <div class="grid">
        <div class="contg">
            <div class="contimg">
                <a href="img/galleria/5.jpg">
                <img class="imageg"src="img/galleria/5.jpg" alt="gatto">
                </a>  
            </div>
            <div class="desc">Descr ucennvb y,mvncfhdgb jmdvmbh vimmagine da dbizione immagine da db</div>
        </div>
        
      
        
        <div class="contg">
            <div class="contimg">
                <a href="img/galleria/4.jpg">
                <img class="imageg"src="img/galleria/4.jpg" alt="gatto">
                </a>  
            </div>
            <div class="desc">Descr ucennvb y,mvncfhdgb jmdvmbh vimmagine da dbizione immagine da db</div>
        </div>
        
      
       
        <div class="contg">
            <div class="contimg">
                <a href="img/galleria/4.jpg">
                <img class="imageg"src="img/galleria/4.jpg" alt="gatto">
                </a>  
            </div>
            <div class="desc">Descr ucennvb y,mvncfhdgb jmdvmbh vimmagine da dbizione immagine da db</div>
        </div>
        

        <div class="contg">
            <div class="contimg">
                <a href="img/galleria/4.jpg">
                <img class="imageg"src="img/galleria/4.jpg" alt="gatto">
                </a>  
            </div>
            <div class="desc">Descr ucennvb y,mvncfhdgb jmdvmbh vimmagine da dbizione immagine da db</div>
        </div>
        
        
        <div class="contg">
            <div class="contimg">
                <a href="img/galleria/2.jpg">
                <img class="imageg"src="img/galleria/2.jpg" alt="gatto">
                </a>  
            </div>
            <div class="desc">Descr ucennvb y,mvncfhdgb jmdvmbh vimmagine da dbizione immagine da db</div>
        </div>
        
        
        <div class="contg">
            <div class="contimg">
                <a href="img/galleria/5.jpg">
                <img class="imageg"src="img/galleria/5.jpg" alt="gatto">
                </a>  
            </div>
            <div class="desc">Descr ucennvb y,mvncfhdgb jmdvmbh vimmagine da dbizione immagine da db</div>
        </div>
        
      
        <div class="contg">
            <div class="contimg">
                <a href="img/galleria/4.jpg">
                <img class="imageg"src="img/galleria/4.jpg" alt="gatto">
                </a>  
                <div class="desc">Descr ucennvb y,mvncfhdgb jmdvmbh vimmagine da dbizione immagine da db</div>
            </div>
        </div> 
    
</div>



</div>
<br>
<br/>


</div>

<?php include_once"footer.php"?>

</body>
</html>
