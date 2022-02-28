<?php
  $conn = mysqli_connect('localhost', 'a21_sa_delucia', 'vittorio' , 'crud_tech_seum') or die("Error connecting to the database");
  if(!$conn){
    die(mysqli_error($conn));
  }
?>