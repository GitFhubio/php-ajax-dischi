<?php

// 2nd milestone:
// farà il json encode del mio database. => require_once
// ricordatevi dell'header (vedi le slide)

require_once __DIR__ . '/../database/database.php';

// funzioni ausiliarie

function genres($array){
  $discgenres=[];
  foreach($array as $disco){
    if(!in_array( $disco['genre'] ,$discgenres )){
      $discgenres[]=$disco['genre'];
    }}
    return $discgenres;};

    function errorFunction($dischi,$filter){
      if(!in_array( $filter ,genres($dischi) )){
        return http_response_code(400);
      }}
      // print_r(genres($dischi));
      // print_r($discgenres);
      // _______________________________

      header('Content-Type: application/json');
      // echo json_encode($dischi);
      if (isset($_GET["filter"]) && $_GET["filter"] != 'All') {
        $filter=$_GET["filter"];
        // if (!empty($filter) ) {
        errorFunction($dischi,$filter);
        $dischiFiltered =[];
        foreach($dischi as $disco){
          if($disco['genre']==$filter){
            $dischiFiltered[] = $disco;
          }
        }
        echo json_encode($dischiFiltered);
      }
      // }
      else{
        echo json_encode($dischi);
      }

      // a riga 32 pusho il disco nell'array di dischi , andava bene pure strpos($disco['genre'] , $filter) !== false

      // potevo usare anche l'array filter
      // $dischiFiltered = array_filter($dischi, function ($disco) use ($filter) {
      //       return ($disco['genre'] == $filter);});
