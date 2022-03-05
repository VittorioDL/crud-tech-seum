<?php
  include 'connessione.php';
  session_start();

  $permission=$_SESSION['permessi'];

  $nome=$_POST['nome_a'];
  $inizio=$_POST['anno_n'];
  $fine=$_POST['anno_f'];

  $query="INSERT INTO autore(nomeautore, annonascita, annofine) VALUES ('$nome','$inizio','$fine')";
  $res=mysqli_query($conn,$query);

  if ($permission==0)
    header("location: home.php");
  else ($permission==1)
    header("location: home-admin.php");
 ?>
