<?php 
  //trasformo i dati (nel file songs.jeson) in una stringa
  $dataString = file_get_contents('./database/songs.json');
  //definisco il type del content della chiamata 
  header('Content-Type: application/json');
  echo $dataString;
?>