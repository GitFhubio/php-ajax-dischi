<?php

// 2nd milestone:
// farà il json encode del mio database. => require_once
// ricordatevi dell'header (vedi le slide)

require_once __DIR__ . '/../database/database.php';

header('Content-Type: application/json');
// echo json_encode($dischi);

$filter = $_GET["filter"];

// qui avevo messo inizialmente isset al posto di !empty
if (!empty($filter) && $filter !='All') {

    $dischiFiltered =[];
    foreach($dischi as $disco){
        if(strpos($disco['genre'] , $filter) !== false ){
            $dischiFiltered[] = $disco;
            // pusho il disco nell'array di dischi
        }
        // else{
        //     http_response_code(400);
        // }
    }

// potevo usare anche l'array filter

    // $dischiFiltered = array_filter($dischi, function ($disco) use ($filter) {
    //       return ($disco['genre'] == $filter);});

    echo json_encode($dischiFiltered);

}else{
    echo json_encode($dischi);
}

// if($filter == "boh"){
//   http_response_code(400);
// }
