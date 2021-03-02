<?php

// 2nd milestone:
// farà il json encode del mio database. => require_once
// ricordatevi dell'header (vedi le slide)

require_once __DIR__ . '/../database/database.php';

header('Content-Type: application/json');
echo json_encode($dischi);

$filter = isset($_GET["filter"]) ? $_GET["filter"] : '';

if( strlen($filter) !== 0){
    $dischiFiltered =[];
    foreach($dischi as $disco){
        if(strpos($disco['genre'] , $filter) !== false ){
            $dischiFiltered[] = $disco;
        }
    }
    echo json_encode($dischiFiltered);
} else{
    echo json_encode($dischi);
}
