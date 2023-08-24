<?php 
  //per rendere possibile l'uso dell'api da un dominio diverso tipo quello del liveserver si utilizza la funzione 
  header("Access-Control-Allow-Origin: *");
  //trasformo i dati (nel file songs.jeson) in una stringa
  $dataString = file_get_contents('./database/songs.json');

  if(isset($_GET['id_song'])){
    // trasforma la stringa in array associativo
    $dataArray = json_decode($dataString, true);
    $responseSingleSong = [];

    foreach ($dataArray as $key => $singleSong) {
      if($key == intval($_GET['id_song'])){
        $responseSingleSong[] = $singleSong;
      }
    }

    // DEFINISCO CHE IL CONTENT TIPE DELLA CHIAMATA E UN JSON
    header('Content-Type: application/json');
    echo json_encode($responseSingleSong);


  }else{
    // definisco il type del content della chiamata 
    header('Content-Type: application/json');
    echo $dataString;
  }


?>