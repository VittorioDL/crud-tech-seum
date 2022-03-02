<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato ricerca reperti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Pulsante per tornare alla home -->
    <div class="container"> 
        <?php
            session_start();
            $permessi = $_SESSION['permessi'];
            
            if($permessi==0)
            {
                echo '<button class="btn btn-primary my-5"> <a href="home.php" class="text-light text-decoration-none">Home</a></button>';
            }
            else if($permessi==1)
            {
                echo '<button class="btn btn-primary my-5"> <a href="home-admin.php" class="text-light text-decoration-none">Home</a></button>';
            }
        ?>
    </div>

    <!-- Risultato ricerca -->
    <div class="container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome reperto</th>
                    <th scope="col">Sezione</th>
                    <th scope="col">Data catalogazione</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                include 'connect.php';
                
                $nome = $_POST['nome'];
                $anno_inizio_uso = $_POST['anno_inizio'];
                $anno_fine_uso = $_POST['anno_fine'];
                $autore = $_POST['autore'];
                $sezione = $_POST['sezione'];
                $stato = $_POST['stato'];
                $materiale = $_POST['materiale'];
                $acquisizione = $_POST['acquisizione'];
                
                // $id = $row['codassoluto'];
                // $nome = $row['nome'];
                // $sezione = $row['sezione'];
                // $data = $row['datacatalogazione'];
                // $stato = $row['stato'];
                
                $query = 'SELECT DISTINCT repertinuova.codassoluto, repertinuova.nome, repertinuova.sezione, repertinuova.datacatalogazione, repertinuova.stato
                FROM repertinuova, hafatto, compostoda, acquisizioni, autore
                WHERE repertinuova.nome LIKE "%'.$nome.'%"
                AND repertinuova.annoiniziouso LIKE "%'.$anno_inizio_uso.'%"
                AND repertinuova.annofineuso LIKE "%'.$anno_fine_uso.'%"
                AND repertinuova.sezione LIKE "%'.$sezione.'%"
                AND repertinuova.stato LIKE "%'.$stato.'%"
                AND (hafatto.codassoluto = repertinuova.codassoluto
                    AND hafatto.codautore LIKE "%'.$autore.'%")
                AND (compostoda.nomemateriale LIKE "%'.$materiale.'%"
                    AND compostoda.codassoluto = repertinuova.codassoluto)
                AND (acquisizioni.tipoacquisizione LIKE "%'.$acquisizione.'%"
                    AND acquisizioni.codassoluto = repertinuova.codassoluto)';
                
                $result = mysqli_query($conn, $query) or die("Error");
                
                if($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['codassoluto'];
                        $nome = $row['nome'];
                        $sezione = $row['sezione'];
                        $data = $row['datacatalogazione'];
                        $stato = $row['stato'];

                        switch ($sezione) {
                            case "E":
                                $sezione = "Elettronica";
                                break;
                            case "I":
                                $sezione = "Informatica";
                                break;
                            case "M":
                                $sezione = "Meccanica";
                                break;
                            case "S":
                                $sezione = "Scienze";
                                break;
                        }

                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $nome . '</td>
                        <td>' . $sezione . '</td>
                        <td>' . $data . '</td>
                        <td>' . $stato . '</td>
                        <td>
                            <button class="btn btn-primary"><a href="modifica-reperto.php?id=' . $id . ' " class="text-light text-decoration-none">Modifica</a></button>
                            <button class="btn btn-danger"><a href="cancella-reperto.php?id=' . $id . ' " class="text-light text-decoration-none">Cancella</a></button>
                            <button class="btn btn-info" ><a href="visualizza-reperto.php?id=' . $id . ' " class="text-light text-decoration-none">Info</a></button>
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
    
