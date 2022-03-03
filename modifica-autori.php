<?php
  include 'connect.php';
  session_start();

  $permission=$_SESSION['permessi'];

  $codice=$_POST['cod_a'];
  $nome=$_POST['nome_a'];
  $inizio=$_POST['anno_n'];
  $fine=$_POST['anno_f'];

  $query="UPDATE autori SET codautore='$codice', nomeautore='$nome', annonascita='$inizio', annofine='$fine' WHERE codautore='$codice';";
  $res=mysqli_query($con,$query);

  if ($permission==0)
    header("location: home.php");
  else ($permission==1)
    header("location: home-admin.php");
 ?>
