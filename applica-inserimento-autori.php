<?php
  include 'connessione.php';
  session_start();

  $permission=$_SESSION['permessi'];

  $nome=$_POST['nome_a'];
  $inizio=$_POST['anno_n'];
  $fine=$_POST['anno_f'];

  $query="INSERT INTO autore VALUES (NULL,'$nome','$inizio','$fine')";
  $res=mysqli_query($conn,$query);

  header("location:gestione-autori.php");
 ?>
