<?php
    include("connessione.php");

    session_start();

    $permission=$_SESSION['permessi'];

    $data_catalogazione = $_GET['data_catalogazione'];
    $nome = $_GET['nome'];
    $sezione = $_GET['sezione'];
    //$cod_relativo = $_GET['cod_relativo'];
    $definizione = $_GET['definizione'];
    $denominazione_storica = $_GET['denominazione_storica'];
    $descrizione = $_GET['descrizione'];
    $modouso = $_GET['modouso'];
    $anno_inizio_uso = $_GET['anno_inizio_uso'];
    $anno_fine_uso = $_GET['anno_fine_uso'];
    $scopo = $_GET['scopo'];
    $stato = $_GET['stato'];
    $osservazioni = $_GET['osservazioni'];

    $cod_assoluto = $_GET['cod_assoluto'];

    $query = "UPDATE repertinuova SET (data_catalogazione = '$data_catalogazione', nome = '$nome', sezione = '$sezione', cod_relativo = NULL, definizione = '$definizione', denominazione_storica = '$denominazione_storica', descrizione = '$descrizione', modouso = '$modouso', anno_inizio_uso = '$anno_inizio_uso', anno_fine_uso = '$anno_fine_uso', scopo = '$scopo', stato = $stato, osservazioni = '$osservazioni') WHERE codassoluto = $cod_assoluto";

    echo $query;
    $result = mysqli_query($conn, $query) or die ("errore");
    mysqli_close($conn);

    if ($permessi == 1)
        header("location:home-admin.php");
    else if($permessi == 0)
        header("location:home.php");

?>
