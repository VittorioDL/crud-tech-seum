<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header("Location: login-utenti.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Aggiunta utente</title>
</head>
<body>
	<br><br><center><b><p class='fs-1'> Aggiungi utente </p></b></center><br><br><br>

	<form  action='applica-inserimento-utente.php' method='POST'>
		<div style="height: 150px;" align = "center">
            <div class="h-auto d-inline-block" style="width: 360px; background-color: rgba(0,0,255,.1)">

                <div class="container">
					<br>
                    <!-- Input utente -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="utente" name="utente" maxlength='21' placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>

                    <!-- Input password -->
                    <div class="form-floating">
                        <input type="text" class="form-control" id="password" name="password" maxlength='16' placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                

				<br>

				<div class="container">
					<div style="height: 120px;" align = "center">
						<div class="h-auto d-inline-block" style="width: 330px; background-color: rgba(0,10,255,.1)">
							<!-- Scelta permessi -->
							<div class="container">
								

								<!-- Scelta Amministratore -->
								<div class="form-floating my-2">
									<div class="mb-2" align="left"> Permessi</div>
									<div class="form-check mb-1" align="left">
										<input class="form-check-input" type="radio" id="amministratore" name="permessi" value="1">
										<label for="amministratore">Amministratore</label>
									</div>
									
									<!-- Scelta utente -->
									<div class="form-check" align="left">
										<input class="form-check-input" type="radio" id="utente" name="permessi" value="0">
										<label for="utente">Utente</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="container">
				<!-- Bottone conferma -->
				<div><button type='submit' class='btn btn-primary'>Conferma</button></div>

				<!-- Bottone annulla -->
           			 
                	
                	<a href="gestione-utenti.php" class="text-light text-decoration-none btn btn-secondary my-3">Annulla</a>
                	
				</div>
    			



            </div>
    
        </div>
		
	</form>
</body>
</html>