<?php
  include 'connect.php';
  session_start();

  $permission=$_SESSION['permessi'];

  $nome=$_POST['nome_a'];
  $inizio=$_POST['anno_n'];
  $fine=$_POST['anno_f'];

  $query="INSERT INTO autore(nomeautore, annonascita, annofine) VALUES ('$nome_a','$anno_n','$anno_f')";
  $res=mysqli_query($con,$query);

  if ($permission==0)
    header("location: home.php");
  else ($permission==1)
    header("location: home-admin.php");
 ?>
