<?php
  include 'connessione.php';
  $us=$_POST["utente"];
  $pa=$_POST["password"];
  $pe=$_POST["permessi"];


  $query="INSERT INTO utente VALUES(NULL,'$us','$pa','$pe')";
  $ris=mysqli_query($conn,$query) or die($query);
  header('Location: gestione-utenti.php');


?>
