<?php
if($_POST["submit"]) {
    $recipient="francydrake97@gmail.com"; //Mettere l'email
    $subject="".$_POST["name"]. "ti ha contattato"; 
    $sender=$_POST["name"];
    $senderEmail=$_POST["email"];
    $message=$_POST["message"];
    $mailBody="Name: $sender\nEmail Address: $senderEmail\n\nMessage: $message";
    mail($recipient, $subject, $mailBody);
    sleep(1);
    header("Location:http://blog.antonyraphel.in/sample/"); // Bho...
}
?>
