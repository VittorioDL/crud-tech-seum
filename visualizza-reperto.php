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
        include("connect.php");
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
        //query didascalie (ita-eng)
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
        if(isset($row['datacatalogazione'])) $datacatalogazione=$row['datacatalogazione'];
        else $datacatalogazione="Mancante";
        if(isset($row['sezione']))
        {   
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
        }
        else $sezione="Mancante";
        if($row['annoiniziouso']==0 | $row['annoiniziouso']==-1) $annoiniziouso="Mancante";
        else $annoiniziouso=$row['annoiniziouso'];
        if($row['annofineuso']==0 | $row['annofineuso']==-1) $annofineuso="Mancante";
        else $annofineuso=$row['annofineuso'];
        if(isset($row['stato'])) $stato=$row['stato'];
        else $stato="Mancante";
        $tipoacquisizione="Mancante";
        if(isset($row1['tipoacquisizione']))
        {
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
        }
        if(isset($row1['quantita'])) $quantita=$row1['quantita'];
        else $quantita="Mancante";
        if(isset($row2['nomeautore'])) $nomeautore=$row2['nomeautore'];
        else $nomeautore="Mancante";
        if(!isset($row2['annonascita'])) $annonascita="Mancante";
        else $annonascita=$row2['annonascita'];
        if(!isset($row2['annofine'])) $annomorte="Mancante";
        else $annomorte=$row2['annofine'];
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
        if(isset($row['definizione'])) $definizione=$row['definizione'];
        else $definizione="Mancante";
        $denominazionestorica=$row['denominazionestorica'];
        if(empty($denominazionestorica)) $denominazionestorica="Mancante";
        if(isset($row['descrizione'])) $descrizione=$row['descrizione'];
        else $descrizione="Mancante";
        $modouso=$row['modouso'];
        if(empty($modouso)) $modouso="Mancante";
        if(isset($row['scopo'])) $scopo=$row['scopo'];
        else $scopo="Mancante";
        $osservazioni=$row['osservazioni'];
        if(empty($osservazioni)) $osservazioni="Mancante";
        if(isset($row4['didascalia'])) $didascaliaita=$row4['didascalia'];
        else $didascaliaita="Mancante";
        if(isset($row5['didascalia'])) $didascaliaeng=$row5['didascalia'];
        else $didascaliaeng="Mancante";
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
            <div class="col-lg-4 bg-success p-2 text-black bg-opacity-75">
                <ul>
                    <li>
                        <?php echo '<b>'.'ID: '.'</b>.'.$codassoluto?>
                    </li>
                    <li>
                        <?php echo '<b>'.'DATA CATALOGAZIONE: '.'</b>'.$datacatalogazione?>
                    </li>
                    <li>
                        <?php echo '<b>'.'SEZIONE: '.'</b>'.$sezione?>
                    </li>
                    <li>
                        <?php echo '<b>'.'ANNO DI INIZIO USO: '.'</b>'.$annoiniziouso?>
                    </li>
                    <li>
                        <?php echo '<b>'.'ANNO DI FINE USO: '.'</b>'.$annofineuso?>
                    </li>
                    <li>
                        <?php echo '<b>'.'STATO: '.'</b>'.$stato?>
                    </li>
                    <li>
                        <?php echo '<b>'.'TIPO ACQUISIZIONE: '.'</b>'.$tipoacquisizione?>
                    </li>
                    <li>
                        <?php echo '<b>'.'QUANTITA: '.'</b>'.$quantita?>
                    </li>
                    <li>
                        <?php echo '<b>'.'NOME AUTORE: '.'</b>'.$nomeautore?>
                    </li>
                    <li>
                        <?php echo '<b>'.'ANNO DI NASCITA AUTORE: '.'</b>'.$annonascita?>
                    </li>
                    <li>
                        <?php echo '<b>'.'ANNO DI MORTE AUTORE: '.'</b>'.$annomorte?>
                    </li>
                    <li>
                        <?php if(empty($materiali)) echo '<b>'.'MATERIALI: '.'</b>'.': Mancante';
                            else
                            {
                                echo '<b>'.'MATERIALI: '.'</b>';
                                foreach ($materiali as $i)
                                {
                                    echo $i.' ';
                                }
                            }?>
                    </li>
                    <li>
                        <?php if(empty($media)) echo '<b>'.'MEDIA: '.'</b>'.': Mancante';
                            else
                            {
                                echo '<b>'.'MEDIA: '.'</b>';
                                foreach ($media as $i)
                                {
                                    echo $i.' ';
                                }
                            }?>
                    </li>
                    <li>
                        <?php if(empty($misure)) echo '<b>'.'MISURE: '.'</b>'.': Mancante';
                            else
                            {
                                echo '<b>'.'MISURE: '.'</b>';
                                foreach ($misure as $i)
                                {
                                    echo $i.' ';
                                }
                            }?>
                    </li>
                    <li>
                        <?php echo '<b>'.'NUMERO PARTI: '.'</b>'.$nparti?>
                    </li>
                </ul>  
            </div>
            <div class="col-lg-8 bg-secondary p-2 text-white bg-opacity-50">
                <ul>
                    <div class="col bg-warning p-2 text-black bg-opacity-50">
                        <li>
                            <b><?php echo 'DEFINIZIONE'?></b><br>
                            <?php echo ''.$definizione?>
                        </li>
                    </div><br>
                    <div class="col bg-warning p-2 text-black bg-opacity-50">
                        <li>
                            <b><?php echo 'DENOMINAZIONE STORICA'?></b><br>
                            <?php echo ''.$denominazionestorica?>
                        </li>
                    </div><br>
                    <div class="col bg-warning p-2 text-black bg-opacity-50">
                        <li>
                            <b><?php echo 'DESCRIZIONE'?></b><br>
                            <?php echo ''.$descrizione?>
                        </li>
                    </div><br>
                    <div class="col bg-warning p-2 text-black bg-opacity-50">
                        <li>
                            <b><?php echo 'MODO USO'?></b><br>
                            <?php echo ''.$modouso?>
                        </li>
                    </div><br>
                    <div class="col bg-warning p-2 text-black bg-opacity-50">
                        <li>
                            <b><?php echo 'SCOPO'?></b><br>
                            <?php echo ''.$scopo?>
                        </li>
                    </div><br>
                    <div class="col bg-warning p-2 text-black bg-opacity-50">
                        <li>
                            <b><?php echo 'OSSERVAZIONI'?></b><br>
                            <?php echo ''.$osservazioni?>
                        </li>
                    </div><br>
                    <div class="col bg-warning p-2 text-black bg-opacity-50">
                        <li>
                            <b><?php echo 'DIDASCALIA (ITA)'?></b><br>
                            <?php echo ''.$didascaliaita?>
                        </li><br>
                        <li>
                            <b><?php echo 'DIDASCALIA (ENG)'?></b><br>
                            <?php echo ''.$didascaliaeng?>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
      
        
</body>
</html>