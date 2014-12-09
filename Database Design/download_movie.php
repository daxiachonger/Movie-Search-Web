<?php

    include "API_2_movie.php";
    include "properties.php";

    $filePath2 ="http://www.omdbapi.com/?i=tt1276104&plot=short&r=json&tomatoes=true";

    $temp2="http://www.omdbapi.com/?i=tt%d&plot=short&r=json&tomatoes=true";
    $filepath2=array();
    //download movie by movie imdb id
    for($i=$IMDB_id_start;$i<$IMDB_id_end;$i++){
        array_push($filepath2,sprintf($temp2,$i));
    }
    //download movie by movie title
    $temp3="http://www.omdbapi.com/?i=%s&plot=short&r=json&tomatoes=true";
    foreach($movie_title as $title){
        array_push($filepath2,sprintf($temp3,$title));
    }
    api2_movie_store($filepath2);

?>
