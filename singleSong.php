<?php 
//1. definisco chi può effettuare chiamate verso questa rotta
header("Access-Control-Allow-Origin: *");
//2. rinchiudo il contenuto del file json songs.json come stringa (json) nella variabile 
$discsFile = file_get_contents('./database/songs.json');
//3. trasformo il contenuto della variabile in un array di arraycomposti (con la funzione json_decode) per permettere la lavorazione in php
$discsArray = json_decode($discsFile);
//6. creo una variabile che conterrà la canzone ricercata dall'utente ossia quella che ha l'indice uguale al valore ritornato dalla richiesta
$resultsDisc = null;
// 4.effettuo i controlli del dato in entrata (tramite il get nell'url) prima di lavorarci
if(isset($_GET['songID'])){
//5. una volta controllato se il valore è settato ossia se è arrivato tramite la url , si verifica se è un tipo numerico (o se è del giusto tipo), anche se è una stringa vogliamo verificare se il valore può essere settato come numero ,perche se trasformassimo in numero un valore che non può essere trattato come numero il codice si bloccherebbe e darebbe errore
  if(is_numeric($_GET['songID'])){
    $requiredSongPosition = intval($_GET['songID']);
    foreach ($discsArray as $index => $disc) {
      if($index == $requiredSongPosition){
        $resultsDisc = $disc;
      }
    }
  }
}
// 7. trasformo la variabile resultsDisc che al momento è un oggetto in una stringa json per permettere che venga stampata in pagina 
$response = json_encode($resultsDisc);
//8. definisco che il corpo della risposta è una stringa json in maniera che venga trattata come tale dal cliend e non come testo html (che è il default)
header('Content-Type: application/json');
//9 stampare in pagina il contenuto della variabile 
echo $response;
