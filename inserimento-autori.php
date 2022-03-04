<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header("Location: login-utenti.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento autore</title>
</head>
<body>

    <center>AGGIUNGI AUTORE</center><br>
    
    <form method="GET" action="applica-inserimento-autori.php">
        
            <center><input type="text" id="nome_a" name="nome_a" autocomplete="off" placeholder="Nome autore"></center><br>
            <center><input type="number" min=1800 id="anno_n" name="anno_n" maxlenght="4" autocomplete="off" placeholder="Anno di nascita"></center><br>
            <center><input type="number" min=1800 id="anno_f" name="anno_f" maxleght="4" autocomplete="off" placeholder="Anno di fine produzione"></center><br>
            <center><button type="submit" class="btn btn-primary">SUBMIT</center>
    </form>

</body>
</html>