<?php

// 2nd milestone:
// farà il json encode del mio database. => require_once
// ricordatevi dell'header (vedi le slide)

require_once __DIR__ . '/../database/database.php';

header('Content-Type: application/json');
// echo json_encode($dischi);

$filter = $_GET["filter"];

if (isset($filter) && $filter !='All') {

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

}else{
    echo json_encode($dischi);
}
