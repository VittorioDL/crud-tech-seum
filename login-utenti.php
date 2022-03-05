-<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Utenti</title>
</head>
<body>

    <!-- Titolo -->
    <div class="container py-5">
        <div class="d-flex justify-content-between">
            <h2 class="mx-auto">Login</h2>
        </div>
    </div>

    <form  method = 'post' action = 'check-login.php'>

        <div style="height: 150px;" align = "center">
            <div class="h-auto d-inline-block" style="width: 360px; background-color: rgba(0,0,255,.1)">

                <div class="container py-5">

                    <!-- Input utente -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="utente" name="utente" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>

                    <!-- Input utente -->
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['accesso']))
                {

                    if($_SESSION["accesso"] == 1)
                    {
                        echo "<p style='color:#dc3545; font-weight:500; font-size:21px'>Utente o password errati</p>";
                    }
                    session_destroy();
                }
                ?>

                <br><br>

                <div class="container text-center" align = "center" >
                    
                        <!-- Bottone aggiunta utenti -->
                        <button type = "submit" class = "text-light text-decoration-none btn btn-success" > SUBMIT</button>
                
                </div>
                <br>

                

            </div>
    
        </div>
    

    </form>
</body>
</html>