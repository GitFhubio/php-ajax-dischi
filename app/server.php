<?php

// 2nd milestone:
// farà il json encode del mio database. => require_once
// ricordatevi dell'header (vedi le slide)

require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../functions/functions.php';

 
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
      // qui avevo metto insieme al primo isset la condizione
      // && $_GET["filter"] != 'All' ma questa va gestita lato vue
      if (isset($_GET["filter"])) {
        $filter=$_GET["filter"];

        if($filter=='' || $filter=='Alfredo' || !in_array($filter,genres($dischi) )){
        errorFunction($dischi,$filter);}

        else{
        // if (!empty($filter) ) {
        $dischiFiltered =[];
        foreach($dischi as $disco){
          if($disco['genre']==$filter){
            $dischiFiltered[] = $disco;
          }
        }
        echo json_encode($dischiFiltered);
      }}
      // }
      else{
        echo json_encode($dischi);
      }

      // a riga 32 pusho il disco nell'array di dischi , andava bene pure strpos($disco['genre'] , $filter) !== false

      // potevo usare anche l'array filter
      // $dischiFiltered = array_filter($dischi, function ($disco) use ($filter) {
      // return ($disco['genre'] == $filter);});
