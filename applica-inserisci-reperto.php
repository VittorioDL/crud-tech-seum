<?php
    include("connessione.php");

    $data_catalogazione = $_GET['data_catalogazione'];
    $nome = $_GET['nome'];
    $sezione = $_GET['sezione'];
    $cod_relativo = $_GET['cod_relativo'];
    $definizione = $_GET['definizione'];
    $denominazione_storica = $_GET['denominazione_storica'];
    $descrizione = $_GET['descrizione'];
    $modouso = $_GET['modouso'];
    $anno_inizio_uso = $_GET['anno_inizio_uso'];
    $annofineuso = $_GET['annofineuso'];
    $scopo = $_GET['scopo'];
    $stato = $_GET['stato'];
    $osservazioni = $_GET['osservazioni'];

    $permessi = $_SESSION['permessi'];

    $query = "INSERT INTO repertinuova ( data_catalogazione, nome, sezione, cod_relativo, definizione, denominazione_storica, descrizione, modouso, anno_inizio_uso, annofineuso, scopo,stato, osservazioni)
     VALUES ('$data_catalogazione', '$nome', '$sezione', $cod_relativo, '$definizione', '$denominazione_storica', '$descrizione', '$modouso', '$anno_inizio_uso', '$annofineuso', '$scopo', $stato, '$osservazioni')";


    echo $query;
    $result = mysqli_query($conn, $query) or die ("errore");
    mysqli_close($conn);

    if ($permessi == 1)
        header("location:home-admin.php");
    else if($permessi == 0)
        header("location:home.php");

?>
