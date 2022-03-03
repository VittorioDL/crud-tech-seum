<?php
  include ("connessione.php");
  $id= $_GET['id'];
  $query="DELETE from utenti where codutente='$id'";
  $ris=mysqli_query($conn,$query) or die("Connessione fallita");
  header('Location: gestione-utenti.php');

?>
