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
    <title>Modifica utente</title>
</head>
<body>
	<?php
		$codutente=$_GET["id"];
		include 'connessione.php';
		$query= "SELECT * FROM utente WHERE utente.codutente=$codutente";
		$ris=mysqli_query($conn,$query);
		$rec=mysqli_fetch_array($ris);


		echo("<br><br><center><b><p class='fs-1'> Modifica utente </p></b></center><br><br>

			<form  action='applica-modifica-utente.php' method='POST'>

				<div style='height: 150px;' align = 'center'>
					<div class='h-auto d-inline-block' style='width: 360px; background-color: rgba(0,0,255,.1)'>

						<div class='container'>
							<br>
							<!-- Input codutente -->
							<div align='center'><input type='hidden'  name='idutente'  value='$codutente'></div>
							<!-- Input utente -->
							<div class='form-floating mb-3'>
								<input type='text' class='form-control' id='utente' name='utente' maxlength='21' value='$rec[nome]' placeholder='Username'>
								<label for='floatingInput'>Username</label>
							</div>

							<!-- Input password -->
							<div class='form-floating'>
								<input type='text' class='form-control' id='password' name='password' maxlength='16' value='$rec[password]' placeholder='Password'>
								<label for='floatingPassword'>Password</label>
							</div>
						</div>

						<br>");

			
						if($rec['permessi']==1)
						{
							echo("
							<div class='container'>
							<div style='height: 120px;' align = 'center'>
								<div class='h-auto d-inline-block' style='width: 330px; background-color: rgba(0,10,255,.1)'>
									<!-- Scelta permessi -->
									<div class='container'>
										

										<!-- Scelta Amministratore -->
										<div class='form-floating my-2'>
											<div class='mb-2' align='left'> Permessi</div>
											<div class='form-check mb-1' align='left'>
												<input class='form-check-input' type='radio' id='amministratore' name='permessi' value='1' checked>
												<label for='amministratore'>Amministratore</label>
											</div>
											
											<!-- Scelta utente -->
											<div class='form-check' align='left'>
												<input class='form-check-input' type='radio' id='utente' name='permessi' value='0'>
												<label for='utente'>Utente</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>");
						}

						if($rec['permessi']==0)
						{
							echo("
							<div class='container'>
							<div style='height: 120px;' align = 'center'>
								<div class='h-auto d-inline-block' style='width: 330px; background-color: rgba(0,10,255,.1)'>
									<!-- Scelta permessi -->
									<div class='container'>
										

										<!-- Scelta Amministratore -->
										<div class='form-floating my-2'>
											<div class='mb-2' align='left'> Permessi</div>
											<div class='form-check mb-1' align='left'>
												<input class='form-check-input' type='radio' id='amministratore' name='permessi' value='1'>
												<label for='amministratore'>Amministratore</label>
											</div>
											
											<!-- Scelta utente -->
											<div class='form-check' align='left'>
												<input class='form-check-input' type='radio' id='utente' name='permessi' value='0' checked>
												<label for='utente'>Utente</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>");
						}

			

						echo("
						<div class='container mb-3'>
							<div class='d-flex justifycontent-between'
								<!-- Bottone conferma -->
								<button type='submit' class='text-light text-decoration-none btn btn-success my-3'>Conferma</button>
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<!-- Bottone annulla -->
								<div><a href='gestione-utenti.php' class='text-light text-decoration-none btn btn-secondary my-3'>Annulla</a></div>
							</div>
						</div>
					</div>
				</div>
			</form>");
	?>
</body>
</html>