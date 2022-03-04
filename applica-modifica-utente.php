<?php
 include 'connessione.php';
 $query="UPDATE utenti SET utente ='".$_POST["utente"].
                        "', password  ='".$_POST["password"].
                        "', permessi ='".$_POST["permessi"].
                        "' WHERE utenti.codutente = '".$_POST["idutente"]."';";
 $ris=mysqli_query($conn,$query) or die(" sagab");
 header('Location: gestione-utenti.php');
?>
