<?php
  $conn = mysqli_connect('localhost', 'root', '' , 'crud-tech-seum') or die("Error connecting to the database");
  if(!$conn){
    die(mysqli_error($conn));
  }
?>