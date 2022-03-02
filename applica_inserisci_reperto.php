<?php
    include("connessione.php");

    $datacatalogazione = $_GET['datacatalogazione'];
    $nome = $_GET['nome'];
    $sezione = $_GET['sezione'];
    $codrelativo = $_GET['codrelativo'];
    $definizione = $_GET['definizione'];
    $denominazionestorica = $_GET['denominazionestorica'];
    $descrizione = $_GET['descrizione'];
    $modouso = $_GET['modouso'];
    $annoiniziouso = $_GET['annoiniziouso'];
    $annofineuso = $_GET['annofineuso'];
    $scopo = $_GET['scopo'];
    $stato = $_GET['stato'];
    $osservazioni = $_GET['osservazioni'];

    #$permessi = $_SESSION['permessi'];
    $permessi = 1;

    $query = "INSERT INTO repertinuova ( datacatalogazione, nome, sezione, codrelativo, definizione, denominazionestorica, descrizione, modouso, annoiniziouso, annofineuso, scopo,stato, osservazioni)
     VALUES ('$datacatalogazione', '$nome', '$sezione', $codrelativo, '$definizione', '$denominazionestorica', '$descrizione', '$modouso', '$annoiniziouso', '$annofineuso', '$scopo', $stato, '$osservazioni')";


    echo $query;
    $result = mysqli_query($con, $query) or die ("errore");
    mysqli_close($con);

    if ($permessi == 1)
        header("location:admin.php");
    else if($permessi == 0)
        header("location:home.php");

?>