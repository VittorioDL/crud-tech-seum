<?php

    echo"
      NUOVO REPERTO<br>
      <form action ='applica_inserisci_reperto.php', method ='GET'><br>
      
      Nome:
      <input type='text' name='nome'><br>

      Cod. relativo:
      <input type='text' name='codrelativo'><br>

      Data catalogazione:
      <input type='date' name='datacatalogazione'><br>

      Sezione:
      <select name ='sezione'>
        <option value='I'>Informatica</option>
        <option value='S'>Scienze</option>
        <option value='E'>Elettronica</option>
        <option value='M'>Meccanica</option>
      </select><br>

      Anno inizio uso:
      <input type='text' name='annoiniziouso'><br>

      Anno fine uso:
      <input type='text' name='annofineuso'><br>

      Definizione:
      <input type='text' name='definizione'><br>

      Descrizione:
      <input type='text' name='descrizione'><br>

      Denominazione storica:
      <input type='text' name='denominazionestorica'><br>

      Modo uso:
      <input type='text' name='modouso'><br>

      Scopo:
      <input type='text' name='scopo'><br>
      
      Stato:
      <input type='int' name='stato'><br>
      
      Osservazioni:
      <input type='text' name='osservazioni'><br>
      
      <input type='submit' name='invia'><br>"
      
  ;