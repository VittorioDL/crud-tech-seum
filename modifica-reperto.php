<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica campi del reperto selezionato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    
    <div class="container"> 
        <?php
            session_start();
            $permessi = $_SESSION['permessi'];

            if($permessi==0)
            {
                echo '<a href="home.php" class="text-light text-decoration-none btn btn-primary my-5">Home</a>';
            }
            else if($permessi==1)
            {
                echo '<a href="home-admin.php" class="text-light text-decoration-none btn btn-primary my-5">Home</a>';
            }
        ?>
    </div>
        

    <!-- Pulsante per modificare il database -->
    <div class="container"> 
        <button class="btn btn-primary my-5"> <a href="modifica-database.php" class="text-light text-decoration-none">Conferma modifica</a></button>
    </div>
    
</body>
</html>