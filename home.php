<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD TechSeum</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Titolo -->
    <div class="container">
        <h2 class="text-center">Tech-Seum</h2>
        <h3 class="text-center">CRUD</h4>
    </div>


    <!-- Bottone aggiunta reperti -->
    <div class="container">
        <button class="btn btn-success my-5"> <a href="inserimento-reperto.php" class="text-light text-decoration-none">Aggiungi reperto</a></button>
    </div>

    <!-- Barra di ricerca -->
    <form action='ricerca-reperti.php' method='post'>
        <div class="container">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-primary" type="submit" id="button-addon1">Cerca</button>
                </div>
                <input name="nome" type="text" class="form-control" placeholder="Nome reperto">
                <input name="anno_inizio" type="number" class="form-control" min="1800" step="1" placeholder="Anno inizio uso">
                <input name="anno_fine" type="number" class="form-control" min="1800" step="1" placeholder="Anno fine uso">

                <!-- Selezione autore -->
                <select name="autore" class="form-control">
                    <option value="" class="text-white bg-secondary">Autore</option>
                    <?php
                        $queryAutori = "select * from autore order by nomeautore asc";
                        $result1 = mysqli_query($conn, $queryAutori);
                        while ($row = mysqli_fetch_array($result1)) {
                            echo '<option value=' . $row['codautore'] . '>' . $row['nomeautore'] . '</option>';
                        }
                    ?>
                </select>

                <!-- Selezione sezione -->
                <select name="sezione" class="form-control">
                    <option value="" class="text-white bg-secondary">Sezione</option>
                    <option value="I">Informatica</option>
                    <option value="E">Elettronica</option>
                    <option value="M">Meccanica</option>
                    <option value="S">Scienze</option>
                </select>

                <!-- Selezione stato -->
                <select name="stato" class="form-control">
                    <option value="" class="text-white bg-secondary">Stato</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <!-- Selezione materiale -->
                <select name="materiale" class="form-control">
                    <option value="" class="text-white bg-secondary">Materiale</option>
                    <?php
                    $queryMateriale = "select nomemateriale from compostoda";
                    $result2 = mysqli_query($conn, $queryMateriale);
                    $materiali = array();
                    while ($row = mysqli_fetch_array($result2)) {
                        array_push($materiali, $row['nomemateriale']);
                    }
                    $materiali_unici = array_unique($materiali);
                    foreach ($materiali_unici as $m) {
                        echo '<option value=' . $m . '>' . $m . '</option>';
                    }
                    ?>
                </select>

                <!-- Selezione acquisizione -->
                <select name="acquisizione" class="form-control">
                    <option value="" class="text-white bg-secondary">Acquisizione</option>
                    <option value="D">Donazione</option>
                    <option value="A">Acquisto</option>
                    <option value="R">Rubato</option>
                    <option value="T">Trovato</option>
                    <option value="C">Costruito</option>
                    <option value="O">Altro tipo</option>
                </select>

            </div>
        </div>
    </form>

    <!-- Tabella reperti -->
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
                $query = "select * from repertinuova";
                $result = mysqli_query($conn, $query);
                if ($result) {
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
                            <button class="btn btn-danger")"><a href="cancella-reperto.php?id=' . $id . ' " class="text-light text-decoration-none">Cancella</a></button>
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