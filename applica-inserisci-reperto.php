<?php
    include("connessione.php");
    session_start();

    $data_catalogazione = $_POST['data_catalogazione'];
    $nome = $_POST['nome'];
    $sezione = $_POST['sezione'];
    //$cod_relativo = $_POST['cod_relativo'];
    $definizione = $_POST['definizione'];
    $denominazione_storica = $_POST['denominazione_storica'];
    $descrizione = $_POST['descrizione'];
    $modo_uso = $_POST['modo_uso'];
    $anno_inizio_uso = $_POST['anno_inizio_uso'];
    $anno_fine_uso = $_POST['anno_fine_uso'];
    $scopo = $_POST['scopo'];
    $stato = $_POST['stato'];
    $osservazioni = $_POST['osservazioni'];

    $permessi = $_SESSION['permessi'];

    $query = "INSERT INTO repertinuova VALUES (NULL, '$data_catalogazione', '$nome', '$sezione', NULL, '$definizione', '$denominazione_storica', '$descrizione', '$modo_uso', '$anno_inizio_uso', '$anno_fine_uso', '$scopo', '$stato', '$osservazioni')";

    echo $query;
    $result = mysqli_query($conn, $query) or die ("errore");
    mysqli_close($conn);

    if ($permessi == 1)
        header("location:home-admin.php");
    else if($permessi == 0)
        header("location:home.php");

?>
