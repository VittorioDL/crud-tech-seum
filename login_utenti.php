<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form  method = 'get' action = 'check_login.php'>
        <center> LOGIN<br><br></center>

        <center><input name = 'utente' type = 'text' size = '25' maxlength = '21'  placeholder = "Username"></center> <br><br><!--input dell'utente -->
        
        <center><input name = 'password' type = 'password' size = '25' maxlength = '16' placeholder = "Password"></center> <br><br><!--input della password -->


        <center><button type = 'submit'> SUBMIT </button></center> <br><br><!--bottone per l'accesso -->
    </form>
</body>
</html>