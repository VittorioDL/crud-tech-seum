<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizzazione reperto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        include("connessione.php");
        $codassoluto=$_GET['id'];
        //query reperto
        $query="SELECT * FROM repertinuova WHERE codassoluto=$codassoluto";
        $ris=mysqli_query($conn,$query) or die("Error");
        $row=mysqli_fetch_assoc($ris);  
        //query acquisizioni
        $query1="SELECT * FROM acquisizioni WHERE codassoluto=$codassoluto";
        $ris1=mysqli_query($conn,$query1) or die("Error");
        $row1=mysqli_fetch_assoc($ris1);
        //query autori
        $query2="SELECT * FROM autore,hafatto WHERE autore.codautore=hafatto.codautore AND codassoluto=$codassoluto";
        $ris2=mysqli_query($conn,$query2) or die("Error");
        $row2=mysqli_fetch_assoc($ris2);
        //query compostoda
        $query3="SELECT * FROM compostoda WHERE codassoluto=$codassoluto";
        $ris3=mysqli_query($conn,$query3) or die("Error");
        //query didascalie (ita/eng)
        $query4="SELECT * FROM didascalie WHERE codassoluto=$codassoluto AND lingua='IT'";
        $ris4=mysqli_query($conn,$query4) or die("Error");
        $row4=mysqli_fetch_assoc($ris4);
        $query5="SELECT * FROM didascalie WHERE codassoluto=$codassoluto AND lingua='UK'";
        $ris5=mysqli_query($conn,$query5) or die("Error");
        $row5=mysqli_fetch_assoc($ris5);
        //query media
        $query6="SELECT * FROM media WHERE codassoluto=$codassoluto";
        $ris6=mysqli_query($conn,$query6) or die("Error");
        //query misure
        $query7="SELECT * FROM misure,nomimisure WHERE misure.tipomisura=nomimisure.tipomisura AND codassoluto=$codassoluto";
        $ris7=mysqli_query($conn,$query7) or die("Error");
        //query nparti
        $query8="SELECT COUNT(codassoluto) as n FROM parti WHERE codassoluto=$codassoluto";
        $ris8=mysqli_query($conn,$query8) or die("Error");
        $row8=mysqli_fetch_assoc($ris8);
        //nome reperto
        echo '<div class="container py-5">'.
        '<div class="d-flex justify-content-between">'.
             '<h2 class="mx-auto">'.$row['nome'].'</h2>'.
        '</div>';
        //dettagli corti
        echo '<div class="container">';
        echo 'ID: '.$codassoluto.'<br>';
        echo 'DATA DI CATALOGAZIONE: '.$row['datacatalogazione'].'<br>';
        echo 'SEZIONE: ';
        switch ($row['sezione']) 
        {
            case "E":
                echo "Elettronica";
                break;
            case "I":
                echo "Informatica";
                break;
            case "M":
                echo "Meccanica";
                break;
            case "S":
                echo "Scienze";
                break;
        }
        echo '<br>';
        echo 'ANNO DI INIZIO USO: '.$row['annoiniziouso'].'<br>';
        echo 'ANNO DI FINE USO: '.$row['annofineuso'].'<br>';
        echo 'STATO: '.$row['stato'].'<br>';
        echo 'TIPO DI ACQUISIZIONE: ';
        switch ($row1['tipoacquisizione']) 
        {
            case "D":
                echo "Donazione";
                break;
            case "A":
                echo "Acquisto";
                break;
            case "R":
                echo "Rubato";
                break;
            case "C":
                echo "Costruito";
                break;
            case "O":
                echo "Altro tipo di acquisizione";
                break;
        }
        echo '<br>';
        echo 'QUANTITA: '.$row1['quantita'].'<br>';
        echo 'NOME AUTORE: '.$row2['nomeautore'].'<br>';
        echo 'ANNO DI NASCITA: '.$row2['annonascita'].'<br>';
        echo 'ANNO DI MORTE: '.$row2['annofine'].'<br>';
        echo 'MATERIALI: ';
        while($row3=mysqli_fetch_assoc($ris3))
        {
            echo $row3['nomemateriale'].' ';
        }
        echo '<br>';
        echo 'MEDIA: ';
        while($row6=mysqli_fetch_assoc($ris6))
        {
            echo $row6['link'].' ';
        }
        echo '<br>';
        echo 'MISURE: ';
        while($row7=mysqli_fetch_assoc($ris7))
        {
            echo $row7['nomemisura'].': '.$row7['valore'].$row7['unitadimisura'].' ';
        }
        echo '<br>';
        echo 'NUMERO PARTI: '.$row8['n'];
        echo '<br><br>';
        echo '</div>';
        //dettagli lunghi
        echo 'DEFINIZIONE: '.$row['definizione'].'<br>';
        echo 'DENOMINAZIONE STORICA: '.$row['denominazionestorica'].'<br>';
        echo 'DESCRIZIONE: '.$row['descrizione'].'<br>';
        echo 'MODO DI USO: '.$row['modouso'].'<br>';
        echo 'SCOPO: '.$row['scopo'].'<br>';
        echo 'OSSERVAZIONI: '.$row['osservazioni'].'<br>';
        echo 'DIDASCALIA (ITA): '.$row4['didascalia'].'<br>';
        echo 'DIDASCALIA (ENG): '.$row5['didascalia'].'<br>';
        //bottone ritorno alla home
        ?>
        <div class="container">
            <?php
            session_start();
            $permessi=$_SESSION['permessi'];
            if($permessi==0)
            {
                echo '<a href="home.php" class="text-light text-decoration-none btn btn-primary my-5">HOME</a>';
            }
            else if($permessi==1)
            {
                echo '<a href="home-admin.php" class="text-light text-decoration-none btn btn-primary my-5">HOME</a>';
            }
            ?>
        </div>
</body>
</html>