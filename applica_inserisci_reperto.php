<?php
    include(connessione.php);

    $datacatalogazione = $_GET['codrelativo'];
    $nome = $_GET['nome'];
    $sezione = ['sezione'];
    $codrelarivo = $_GET['codrelativo'];
    $definizione = $_GET['definizione'];
    $denominazionestorica = $_GET['denominazionestorica'];
    $descrizione = $_GET['descrizione'];
    $modouso = $_GET['modouso'];
    $annoiniziouso = $_GET['annoiniziouso'];
    $annofineuso = $_GET['annofineuso'];
    $scopo = $_GET['scopo'];
    $stato = $_GET['stato'];
    $osservazioni = $_GET['scopo'];

    $permessi = $_SESSION['permessi'];

    $query = "INSERT INTO `repertinuova` (`codassoluto`, `datacatalogazione`, `nome`, `sezione`, `codrelativo`, `definizione`, `denominazionestorica`, `descrizione`, `modouso`, `annoiniziouso`, `annofineuso`, `scopo`, `stato`, `osservazioni`)
     VALUES (NULL, $datacatalogazione, $nome, $sezione, $codrelarivo, $definizione, $denominazionestorica, $descrizione, $modouso, $annoiniziouso, $annofineuso, $scopo, $stato, $osservazioni)";

    if ($permessi == 1)
        header("location:admin.php");
    else if($permessi == 0)
        header("location:home.php");

?>