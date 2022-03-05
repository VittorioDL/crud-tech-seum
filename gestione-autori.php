<?php
include 'connessione.php';

session_start();
if(!isset($_SESSION['logged_in'])){
    header("Location: login-utenti.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD autori</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Titolo e logout-->
    <div class="container py-5">
        <div class="d-flex justify-content-between">
            <h2 class="mx-auto">Tech-Seum CRUD</h2>
            <a href="logout.php" class="btn btn-dark btn-lg">Log out</a>
        </div>
    </div>

    <!-- Pulsante per tornare alla home -->
    <div class="container"> 
        <?php
            if(!isset($_SESSION['logged_in'])){
                header("Location: login-utenti.php"); 
            }

            $permessi = $_SESSION['permessi'];
            
            if($permessi==0)
            {
                echo '<a href="home.php" class="text-light text-decoration-none btn btn-primary my-5">Home</a>';
            }
            else if($permessi==1)
            {
                echo '<a href="home-admin.php" class="text-light text-decoration-none btn btn-primary my-5">Home</a>';
            }
        ?>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <!-- Bottone aggiunta autori -->
            <a href="inserimento-autori.php" class="text-light text-decoration-none btn btn-success ms-0">Aggiungi autori</a>
        </div>
    </div>


    <!-- Tabella autori -->
    <div class="container">
        <table class="table text-center table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome autore</th>
                    <th scope="col">Anno inizio</th>
                    <th scope="col">Anno fine</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from autore";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['codautore'];
                        $nome = $row['nomeautore'];
                        $annonascita = $row['annonascita'];
                        $annofine = $row['annofine'];

                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $nome . '</td>
                        <td>' . $annonascita . '</td>
                        <td>' . $annofine . '</td>
                        <td>
                            <a href="modifica-autori.php?id=' . $id . ' " class="text-light text-decoration-none btn btn-primary">Modifica</a>
                        </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>