<?php
   include 'connessione.php';
   session_start();
   $us=$_POST["utente"];
   $pa=$_POST["password"];
   $_SESSION['logged_in']=TRUE;


   $query="SELECT * FROM utente
           WHERE nome='$us'
           and password='$pa'"; //prima query per vedere se un utente esiste o no

    $query2="SELECT * FROM utente
            WHERE nome='$us'
            and password='$pa'
            and permessi='1'";//seconda query per vedere se l'utente ha i permessi o no

    $presente=FALSE; //variabile presenza utente
    $perm=0;        //variabile permessi utente

    $ris=mysqli_query($con,$query) or die("Connesione fal");
    while($qu=mysqli_fetch_array($ris))
           {
            $presente=TRUE;//l'utente è presente
           }

    if($presente==FALSE)
      {
        header('Location: login-utenti.php'); //se l'utente non è presente riporta alla pagina di accesso
      }
    else
      {
        $ris2=mysqli_query($con,$query2) or die("Connessione fallita");
        while($qu2=mysqli_fetch_array($ris2))
               {
                $perm=1;
               }
        if($perm==1)
           {
             header('Location: home-admin.php');//se l'utente ha i permessi va alla pagina degli amministratori
           }
        else
           {
             header('Location: home.php');//se l'utente non ha i permessi va alla pagina degli utenti
           }
      }
?>
