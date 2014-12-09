<?php

    include "API_1_act.php";
    include "properties.php";

    $filePath1 = "http://www.myapifilms.com/imdb?idIMDB=tt1276104&format=JSON&aka=0&business=0&seasons=0&seasonYear=0&technical=0&lang=en-us&actors=S&biography=0&trailer=0&uniqueName=0&filmography=0&bornDied=0&starSign=0&actorActress=0&actorTrivia=0&movieTrivia=0&awards=0";

    $temp1="http://www.myapifilms.com/imdb?idIMDB=tt%d&format=JSON&aka=0&business=0&seasons=0&seasonYear=0&technical=0&lang=en-us&actors=S&biography=0&trailer=0&uniqueName=0&filmography=0&bornDied=0&starSign=0&actorActress=0&actorTrivia=0&movieTrivia=0&awards=0";
    $filepath1=array();

    //download movie by movie id
    for($i=$IMDB_id_start;$i<$IMDB_id_end;$i++){
        array_push($filepath1,sprintf($temp1,$i));
    }

    //download movie by movie title
    $temp3="http://www.myapifilms.com/imdb?idIMDB=%s&format=JSON&aka=0&business=0&seasons=0&seasonYear=0&technical=0&lang=en-us&actors=S&biography=0&trailer=0&uniqueName=0&filmography=0&bornDied=0&starSign=0&actorActress=0&actorTrivia=0&movieTrivia=0&awards=0";
    foreach($movie_title as $title){
        array_push($filepath1,sprintf($temp3,$title));
    }

    api1_act_store($filepath1);

?>
