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
        //echo $codassoluto;
        $query="SELECT * FROM repertinuova WHERE codassoluto=$codassoluto";
        //echo $query;
        $ris=mysqli_query($conn,$query) or die("Error");
        $row=mysqli_fetch_assoc($ris);
        echo 'NOME: '.$row['nome'].'<br>';
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
        echo 'DEFINIZIONE: '.$row['definizione'].'<br>';
        echo 'DENOMINAZIONE STORICA: '.$row['denominazionestorica'].'<br>';
        echo 'DESCRIZIONE: '.$row['descrizione'].'<br>';
        echo 'MODO DI USO: '.$row['modouso'].'<br>';
        echo 'ANNO DI INIZIO USO: '.$row['annoiniziouso'].'<br>';
        echo 'ANNO DI FINE USO: '.$row['annofineuso'].'<br>';
        echo 'SCOPO: '.$row['scopo'].'<br>';
        echo 'STATO: '.$row['stato'].'<br>';
        echo 'OSSERVAZIONI: '.$row['osservazioni'].'<br>';
        $query="SELECT * FROM acquisizioni WHERE codassoluto=$codassoluto";
        $ris=mysqli_query($conn,$query) or die("Error");
        $row=mysqli_fetch_assoc($ris);
        echo 'TIPO DI ACQUISIZIONE: ';
        switch ($row['tipoacquisizione']) 
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
        echo 'QUANTITA: '.$row['quantita'].'<br>';
        $query="SELECT * FROM autore,hafatto WHERE autore.codautore=hafatto.codautore AND codassoluto=$codassoluto";
        $ris=mysqli_query($conn,$query) or die("Error");
        $row=mysqli_fetch_assoc($ris);
        echo 'NOME AUTORE: '.$row['nomeautore'].'<br>';
        echo 'ANNO DI NASCITA: '.$row['annonascita'].'<br>';
        echo 'ANNO DI MORTE: '.$row['annofine'].'<br>';
        $query="SELECT * FROM compostoda WHERE codassoluto=$codassoluto";
        $ris=mysqli_query($conn,$query) or die("Error");
        echo 'MATERIALI: ';
        while($row=mysqli_fetch_assoc($ris))
        {
            echo $row['nomemateriale'].' ';
        }
        echo '<br>';
        $query="SELECT * FROM didascalie WHERE codassoluto=$codassoluto AND lingua='IT'";
        $ris=mysqli_query($conn,$query) or die("Error");
        $row=mysqli_fetch_assoc($ris);
        echo 'DIDASCALIA (ITA): '.$row['didascalia'].'<br>';
        $query="SELECT * FROM didascalie WHERE codassoluto=$codassoluto AND lingua='UK'";
        $ris=mysqli_query($conn,$query) or die("Error");
        $row=mysqli_fetch_assoc($ris);
        echo 'DIDASCALIA (ENG): '.$row['didascalia'].'<br>';
        $query="SELECT * FROM media WHERE codassoluto=$codassoluto";
        $ris=mysqli_query($conn,$query) or die("Error");
        echo 'MEDIA: ';
        while($row=mysqli_fetch_assoc($ris))
        {
            echo $row['link'].' ';
        }
        echo '<br>';
        $query="SELECT * FROM misure,nomimisure WHERE misure.tipomisura=nomimisure.tipomisura AND codassoluto=$codassoluto";
        $ris=mysqli_query($conn,$query) or die("Error");
        echo 'MISURE: ';
        while($row=mysqli_fetch_assoc($ris))
        {
            echo $row['nomemisura'].': '.$row['valore'].$row['unitadimisura'].' ';
        }
        echo '<br>';
        $query="SELECT COUNT(codassoluto) as n FROM parti WHERE codassoluto=$codassoluto";
        $ris=mysqli_query($conn,$query) or die("Error");
        $row=mysqli_fetch_assoc($ris);
        echo 'NUMERO PARTI: '.$row['n'];

    ?>
</body>
</html>