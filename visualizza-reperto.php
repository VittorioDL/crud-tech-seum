<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizzazione reperto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        ul {
            list-style-type: none;
        }
    </style>
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

        //Dettagli corti
        $nome=$row['nome'];
        $datacatalogazione=$row['datacatalogazione'];
        switch($row['sezione']) 
        {
            case "E":
                $sezione="Elettronica";
                break;
            case "I":
                $sezione="Informatica";
                break;
            case "M":
                $sezione="Meccanica";
                break;
            case "S":
                $sezione="Scienze";
                break;
        }
        $annoiniziouso=$row['annoiniziouso'];
        $annofineuso=$row['annofineuso'];
        $stato=$row['stato'];
        switch ($row1['tipoacquisizione']) 
        {
            case "D":
                $tipoacquisizione="Donazione";
                break;
            case "A":
                $tipoacquisizione="Acquisto";
                break;
            case "R":
                $tipoacquisizione="Rubato";
                break;
            case "C":
                $tipoacquisizione="Costruito";
                break;
            case "O":
                $tipoacquisizione="Altro tipo di acquisizione";
                break;
        }
        $quantita=$row1['quantita'];
        $nomeautore=$row2['nomeautore'];
        $annonascita=$row2['annonascita'];
        $annomorte=$row2['annofine'];
        $i=0;
        while($row3=mysqli_fetch_assoc($ris3))
        {
            $materiali[$i]=$row3['nomemateriale'];
            $i++;
        }
        $i=0;
        while($row6=mysqli_fetch_assoc($ris6))
        {
            $media[$i]=$row6['link'];
            $i++;
        }
        $i=0;
        while($row7=mysqli_fetch_assoc($ris7))
        {
            $misure[$i]=$row7['nomemisura'].': '.$row7['valore'].$row7['unitadimisura'];
            $i++;
        }
        $nparti=$row8['n'];

        //Dettagli lunghi
        $definizione=$row['definizione'];
        $denominazionestorica=$row['denominazionestorica'];
        $descrizione=$row['descrizione'];
        $modouso=$row['modouso'];
        $scopo=$row['scopo'];
        $osservazioni=$row['osservazioni'];
        $didascaliaita=$row4['didascalia'];
        $didascaliaeng=$row5['didascalia'];
    ?>
    <!-- Nome reperto -->
    <div class="container py-5">
          <div class="d-flex justify-content-between">
             <h2 class="mx-auto"><?php echo $nome ?></h2>
    </div>
    
    <!-- Bottone ritorno alla home -->
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 bg-success p-2 text-white bg-opacity-75">
                <ul>
                    <li>
                        <?php echo 'ID: '.$codassoluto?>
                    </li>
                    <li>
                        <?php echo 'DATA CATALOGAZIONE: '.$datacatalogazione?>
                    </li>
                    <li>
                        <?php echo 'SEZIONE: '.$sezione?>
                    </li>
                    <li>
                        <?php echo 'ANNO DI INIZIO USO: '.$annoiniziouso?>
                    </li>
                    <li>
                        <?php echo 'ANNO DI FINE USO: '.$annofineuso?>
                    </li>
                    <li>
                        <?php echo 'STATO: '.$stato?>
                    </li>
                    <li>
                        <?php echo 'TIPO ACQUISIZIONE: '.$tipoacquisizione?>
                    </li>
                    <li>
                        <?php echo 'QUANTITA: '.$quantita?>
                    </li>
                    <li>
                        <?php echo 'NOME AUTORE: '.$nomeautore?>
                    </li>
                    <li>
                        <?php echo 'ANNO DI NASCITA AUTORE: '.$annonascita?>
                    </li>
                    <li>
                        <?php echo 'ANNO DI MORTE AUTORE: '.$annomorte?>
                    </li>
                    <li>
                        <?php echo 'MATERIALI: ';
                            foreach ($materiali as $i)
                            {
                                echo $i.' ';
                            }?>
                    </li>
                    <li>
                        <?php echo 'MEDIA: ';
                            foreach ($media as $i)
                            {
                                echo $i.' ';
                            }?>
                    </li>
                    <li>
                        <?php echo 'MISURE: ';
                            foreach ($misure as $i)
                            {
                                echo $i.' ';
                            }?>
                    </li>
                    <li>
                        <?php echo 'NUMERO PARTI: '.$nparti?>
                    </li>
                </ul>  
            </div>
            <div class="col-lg-8 bg-primary p-2 text-white bg-opacity-75">
                <ul>
                    <li>
                        <?php echo 'DEFINIZIONE: '.$definizione?>
                    </li>
                    <li>
                        <?php echo 'DENOMINAZIONE STORICA: '.$denominazionestorica?>
                    </li>
                    <li>
                        <?php echo 'DESCRIZIONE: '.$descrizione?>
                    </li>
                    <li>
                        <?php echo 'MODO USO: '.$modouso?>
                    </li>
                    <li>
                        <?php echo 'SCOPO: '.$scopo?>
                    </li>
                    <li>
                        <?php echo 'OSSERVAZIONI: '.$osservazioni?>
                    </li>
                    <li>
                        <?php echo 'DIDASCALIA (ITA): '.$didascaliaita?>
                    </li>
                    <li>
                        <?php echo 'DIDASCALIA (ENG): '.$didascaliaeng?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
      
        
</body>
</html>