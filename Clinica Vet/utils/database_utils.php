<?php

/**
 * TODO:  throw an exception
 *  */ 
function connectToDatabase($servername, $username, $password, $dbname){

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    return $conn;

}

?>