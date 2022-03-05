<?php
include('connessione.php');
$id_reperto = $_GET['id'];

$query = "DELETE FROM repertinuova WHERE codassoluto=$id_reperto";
$result = mysqli_query($conn,$query) or die ("errore");
mysqli_close($conn);

if ($permessi == 1)
    header("location:home-admin.php");
else if($permessi == 0)
    header("location:home.php");
 ?>
