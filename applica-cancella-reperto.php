<?php
include('conn.php');
$id_reperto = $_GET['id'];

$query = "DELETE FROM repertinuova WHERE codassoluto=$id_reperto";
$result = mysqli_query($connection,$query) or die ("errore");
mysqli_close($connection);

if ($permessi == 1)
    header("location:admin.php");
else if($permessi == 0)
    header("location:home.php");
 ?>
