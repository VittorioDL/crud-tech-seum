<?php
 include 'connessione.php';
 $query="UPDATE utente SET utente ='".$_POST["utente"].
                        "', password  ='".$_POST["password"].
                        "', permessi ='".$_POST["permessi"].
                        "' WHERE utente.codutente = '".$_POST["idutente"]."';";
 $ris=mysqli_query($conn,$query) or die(" sagab");
 header('Location: gestione-utenti.php');
?>
