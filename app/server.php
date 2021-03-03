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
    return $discgenres;}

    function errorFunction($array,$parameter){
      if($parameter!='' && $parameter!='Alfredo' && !in_array( $parameter ,genres($array) )){
      http_response_code(400);echo "Il genere inserito non esiste";
       return;
      }
       if($parameter ==''){
         http_response_code(400);echo "Devi inserire un genere";
         return;
       }
     if($parameter =='Alfredo'){
      http_response_code(429);
      return;
     }
   }
// da rifare con lo switch quando ho tempo
      // _______________________________
// print_r(genres($dischi));
// var_dump ($_GET["filter"]);

// var_dump(isset ($_GET["filter"]));
// var_dump(empty ($_GET["filter"]));
// var_dump($_GET["filter"]);
// empty ha comportamento 'indesiderato' con zero
// var_dump(array_key_exists("filter",$_GET));
// var_dump($_GET["filter"] != 'All');
// se non è settato è null ,che diverso da 'all' mi dà vero quindi non ho problemi
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
      // return ($disco['genre'] == $filter);});
