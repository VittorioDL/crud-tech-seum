<?php

$utente = "root";
$password = "";
$database = "museo";
$server = "localhost";


$con = mysqli_connect($server, $utente, $password, $database) or die('Connesione Persa');

