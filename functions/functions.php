<?php

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
      return http_response_code(429);
     }
   }
