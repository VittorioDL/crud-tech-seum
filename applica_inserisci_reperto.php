<?php
    include(connessione.php);

    $datacatalogazione = $GET['codrelativo'];
    $nome = $GET['nome'];
    $sezione = $GET['sezione'];
    $codrelarivo = $GET['codrelativo'];
    $definizione = $GET['definizione'];
    $denominazionestorica = $GET['denominazionestorica'];
    $descrizione = $GET['descrizione'];
    $modouso = $GET['modouso'];
    $annoiniziouso = $GET['annoiniziouso'];
    $annofineuso = $GET['annofineuso'];
    $scopo = $GET['scopo'];
    $stato = $GET['stato'];
    $osservazioni = $GET['scopo'];

    $query = "INSERT INTO `repertinuova` (`codassoluto`, `datacatalogazione`, `nome`, `sezione`, `codrelativo`, `definizione`, `denominazionestorica`, `descrizione`, `modouso`, `annoiniziouso`, `annofineuso`, `scopo`, `stato`, `osservazioni`)
     VALUES (NULL, $datacatalogazione, $nome, $sezione, $codrelarivo, $definizione, $denominazionestorica, $descrizione, $modouso, $annoiniziouso, $annofineuso, $scopo, $stato, $osservazioni)";


?>