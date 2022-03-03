<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiunta reperto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        p{text-align:right}
    </style>
</head>

<?php
include 'connect.php';
?>

<body>
    <div class="container"> 
            <?php
                session_start();
                $permessi = $_SESSION['permessi'];

                if($permessi==0)
                {
                    echo '<a href="home.php" class="text-light text-decoration-none btn btn-secondary my-3">Annulla</a>';
                }
                else if($permessi==1)
                {
                    echo '<a href="home-admin.php" class="text-light text-decoration-none btn btn-secondary my-3">Annulla</a>';
                }
            ?>
    </div>

    <div class="container py-1">
        <div class="d-flex justify-content-between">
            <h2 class="mx-auto">Aggiungi il reperto</h2>
        </div>
    </div>


<form action='inserimento-database.php' method='post'>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 bg-success p-2 text-white bg-opacity-75">
                <ul>
                    <li>
                        <input name="nome" type="text" class="col-auto my-2" placeholder="Nome reperto"><br><br>
                    </li>
                    <li>
                        <input name="denominazione_storica" type="text" class="col-auto my-2" placeholder="Denominazione storica"><br><br>
                    </li>
                    <li>
                        <input name="immagine" type="file" class="col-auto my-2" placeholder="Seleziona file"><br><br>
                    </li>
                    <li>
                        <input name="data_catalogazione" type="date" class="col-auto my-2" placeholder="Data catalogazione"><br><br>
                    </li>
		    <li>
		    	<input name="anno_inizio" type="number" class="col-auto my-2" min="1800" step="1" placeholder="Anno inizio uso"><br><br>
		    </li>
	            <li>
			<input name="anno_fine" type="number" class="col-auto my-2" min="1800" step="1" placeholder="Anno fine uso"><br><br> 
	            </li>
                </ul>
            </div>
            <div class="col-lg-8 bg-light p-2 text-white bg-opacity-75">
		<ul>
		    <li>
                        <!-- Selezione stato -->
    			<p><select name="stato" class="col-auto my-2">
        		<option value="" class="text-white bg-secondary">Stato</option>
        		<option value="1">1</option>
        		<option value="2">2</option>
        		<option value="3">3</option>
        		<option value="4">4</option>
        		<option value="5">5</option>
    			</select><br><br></p>
                    </li>
                    <li>
			<!-- Selezione sezione -->
    			<p><select name="sezione" class="col-auto my-2">
       			<option value="" class="text-white bg-secondary">Sezione</option>
        		<option value="I">Informatica</option>
        		<option value="E">Elettronica</option>
        		<option value="M">Meccanica</option>
        		<option value="S">Scienze</option>
    			</select><br><br></p>
                        
                    </li>
                    <li>
			<!-- Selezione acquisizione -->
    			<p><select name="acquisizione" class="col-auto my-2">
        		<option value="" class="text-white bg-secondary">Acquisizione</option>
        		<option value="D">Donazione</option>
        		<option value="A">Acquisto</option>
        		<option value="R">Rubato</option>
        		<option value="T">Trovato</option>
        		<option value="C">Costruito</option>
       			<option value="O">Altro tipo</option>
    			</select><br><br></p>
                        
                    </li>
                    <li>
			<!-- Selezione materiale -->
    			<p><select name="materiale" class="col-auto my-2">
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
    			</select><br><br></p>
	
                        
                    </li>
		    <li>
			<!-- Selezione autore -->
    			<p><select name="autore" class="col-auto my-2">
        		<option value="" class="text-white bg-secondary">Autore</option>
           		 <?php
                		$queryAutori = "select * from autore order by nomeautore asc";
                		$result1 = mysqli_query($conn, $queryAutori);
                		while ($row = mysqli_fetch_array($result1)) {
                    		echo '<option value=' . $row['codautore'] . '>' . $row['nomeautore'] . '</option>';
                		}
            		?>
    			</select><br><br></p>
		    	
		    </li>
	
		</ul>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="input-group mb-10">
            <textarea name="definizione" type="text" class="col-auto my-2" placeholder="Definizione reperto" rows="3"></textarea><br><br>
            <textarea name="descrizione" type="text" class="col-auto my-2" placeholder="Descrizione reperto" rows="3"></textarea><br><br>
            <textarea name="modo_uso" type="text" class="col-auto my-2" placeholder="Modo d'uso" rows="3"></textarea><br><br>
            <textarea name="scopo" type="text" class="col-auto my-2" placeholder="Scopo del reperto" rows="3"></textarea><br><br>
            <textarea name="osservazioni" type="text" class="col-auto my-2" placeholder="Osservazioni reperto" rows="3"></textarea><br><br>
        </div>
    </div>

</form>
    <div class="container"> 
    <p class="text-center"><button class="btn btn-success"> <a href="inserimento-database.php" class="text-light text-decoration-none">Aggiungi</a></button></p>
    </div>
</body>
</html>