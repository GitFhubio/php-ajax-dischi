<?php

// 2nd milestone:
// farà il json encode del mio database. => require_once
// ricordatevi dell'header (vedi le slide)

require_once __DIR__ . '/../database/database.php';
// funzione che crea array di generi(mi serve per restituire errore se parametro non è un'opzione)
function genres($array){
  $discgenres=[];
  foreach($array as $disco){
    if(!in_array( $disco['genre'] ,$discgenres )){
      $discgenres[]=$disco['genre'];
    }}
    return $discgenres;}
    // print_r($discgenres);
    header('Content-Type: application/json');
    // echo json_encode($dischi);
    if (isset($_GET["filter"]) && $_GET["filter"] != 'All') {
      $filter=$_GET["filter"];
        // qui avevo messo inizialmente isset al posto di !empty
        // if (!empty($filter) ) {
          if(!in_array( $filter ,genres($dischi) )){
              return http_response_code(400);
            }
          $dischiFiltered =[];
          foreach($dischi as $disco){
            if(strpos($disco['genre'] , $filter) !== false ){
              $dischiFiltered[] = $disco;
              // pusho il disco nell'array di dischi
            }
          }
          // potevo usare anche l'array filter
          // $dischiFiltered = array_filter($dischi, function ($disco) use ($filter) {
          //       return ($disco['genre'] == $filter);});

          echo json_encode($dischiFiltered);
        }
      // }
        else{
          echo json_encode($dischi);
        }
