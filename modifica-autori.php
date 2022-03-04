<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include ("connessione.php");
$codice_autore= $_GET['id']
$con=mysqli_connect($server,$utente,$password,$database) or die ("Connessione errata!!!");
$query="SELECT * FROM autore WHERE codautore=$codice_autore";
$risp=mysqli_query($con,$query);
$rec=mysqli_fetch_array($risp);

print "<html>
       <head>
       <titolo class='titolo'>
       <center>MODIFICA AUTORE</center><br>
       </titolo>
       </head>
       <body>
        <b> <center>FORM HTML</b> </center> <br>
        <form action='applica-modifica-autori.php' metod='POST'>
        <fieldset>
           <center> Nome : <input type='text' id='nome_a' name='nome_a' autocomplete='off' placeholder=' ".$rec['nomeautore']."'> </center> <br> <br>
           <center> Anno nascita : <input type='text' id='anno_n' name='anno_n' maxlenght='4' autocomplete='off' placeholder='".$rec['annonascita']."'> </center> <br> <br>
           <center> Anno fine : <input type='text' id='anno_f' name='anno_f' maxleght='4' autocomplete='off' placeholder='".$rec['annofine']."'> </center> <br> <br>
        <br>
        <br> <br>
        <center> <input type='submit' value='SUBMIT'> </center>
        </fieldset>
        </form>
      </body>
      </html>";
?>

</body>
</html>