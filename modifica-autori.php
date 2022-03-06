<?php
include "connessione.php";
session_start();
if(!isset($_SESSION['logged_in'])){
    header("Location: login-utenti.php");
}

$codice_autore= $_GET['id'];
$query="SELECT * FROM autore WHERE codautore=$codice_autore";
$risp=mysqli_query($conn,$query);
$rec=mysqli_fetch_array($risp);
$_SESSION['cod_a']=$codice_autore;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica autore</title>
</head>
<body>

    <form method="POST" action="applica-modifica-autori.php">
            <div style="height: 150px;" align = "center" class="mt-3">
                <div class="h-auto d-inline-block" style="width: 360px; background-color: rgba(0,0,255,.1)">
                    <div class="container mt-3">

                        <center><b>MODIFICA AUTORE</b></center><br>
                        <!-- Input nome autore -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nome_a" value="<?php echo $rec['nomeautore'];?>">
                            <label for="floatingInput">Nome autore</label>
                        </div>

                        <!-- Input anno inizio -->
                        <div class="form-floating my-5">
                            <input type="number" class="form-control" name="anno_n" min = 1800 value="<?php echo $rec['annonascita'];?>">
                            <label for="floatingInput">Anno inizio</label>
                        </div>

                        <!-- Input anno fine -->
                        <div class="form-floating">
                            <input type="number" class="form-control" name="anno_f" min = 1800 value="<?php echo $rec['annofine'];?>">
                            <label for="floatingInput">Anno fine</label>
                        </div>

                        <br><br>

                        <div class="container mb-3">
                            <div class="d-flex justify-content-between">
                                <!-- Bottone modifica autore -->
                                <button type="submit" class="text-light text-decoration-none btn btn-success my-3">Modifica autore</button>
                                <!-- Bottone annulla -->
                                <a href="gestione-autori.php" class="text-light text-decoration-none btn btn-secondary my-3">Annulla</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

</body>
</html>
