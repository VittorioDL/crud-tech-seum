<?php
include 'connessione.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD gestione utenze</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Titolo e logout-->
    <div class="container py-5">
        <div class="d-flex justify-content-between">
            <h2 class="mx-auto">Tech-Seum GESTIONE UTENZE</h2>
            <a href="logout.php" class="btn btn-dark btn-lg">Log out</a>
        </div>
    </div>

    <!-- Pulsante per tornare alla home -->
    <div class="container"> 
        <?php
            session_start();
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
    
    <div class="container">
        <div class="d-flex justify-content-between">
            <!-- Bottone aggiunta utenti -->
            <a href="inserimento-utenti.php" class="text-light text-decoration-none btn btn-success ms-0">Aggiungi utente</a>
        </div>
    </div>

    <!-- Tabella utenti -->
    <div class="container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome utente</th>
                    <th scope="col">Password</th>
                    <th scope="col">Permessi</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from utenti";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['codutente'];
                        $utente = $row['utente'];
                        $password = $row['password'];
                        $permessi = $row['permessi'];

                        if($permessi == 1)
                            $permessi = "Amministratore";
                        else 
                            $permessi = "Utente";


                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $utente . '</td>
                        <td>' . $password . '</td>
                        <td>' . $permessi . '</td>
                        <td>
                            <a href="modifica-utenti.php?id=' . $id . ' " class="text-light text-decoration-none btn btn-primary">Modifica</a>
                            <a href="cancella-utenti.php?id=' . $id . ' " class="text-light text-decoration-none btn btn-danger">Cancella</a>
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