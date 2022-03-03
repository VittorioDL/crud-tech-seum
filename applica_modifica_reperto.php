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

    $permessi = 1;

    $query = "UPDATE repertinuova SET (datacatalogazione = '$datacatalogazione', nome = '$nome', sezione = '$sezione', codrelativo = $codrelativo, definizione = '$definizione', denominazionestorica = '$denominazionestorica', descrizione = '$descrizione', modouso = '$modouso', annoiniziouso = '$annoiniziouso', annofineuso = '$annofineuso', scopo = '$scopo', stato = $stato, osservazioni = '$osservazioni')";

    echo $query;
    $result = mysqli_query($conn, $query) or die ("errore");
    mysqli_close($conn);

    if ($permessi == 1)
        header("location:admin.php");
    else if($permessi == 0)
        header("location:home.php");

?>