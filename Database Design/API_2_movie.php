<?php

/*  API_1 http://www.omdbapi.com */
function api2_movie_store($filepath){

    include "download_json.php";
    include "database_connection.php";

    //store MOVIE iteratively based on $filepath
    foreach($filepath as $filePath){

    $jsonData=download_json($filePath);

    try {
        /* store MOVIE table */
        $sql = $conn->prepare("INSERT IGNORE INTO MOVIE (MOVIE_IMDB_ID, TITLE, YEAR, RUNTIME, DIRECTOR, ACTORS, PLOT, POSTER, IMDB_RATING, TOMATOMETER, TOMATORATING, TOMATOFRESH, TOMATOROTTEN, TOMATOUSERMETER, TOMATOUSERRATING) VALUES (:movieid, :title, :year, :runtime,:director, :actors, :plot, :poster, :imdb_rating, :tmeter, :trating, :fresh, :rotten, :usmeter, :usrating)");
        $sql->bindParam(':movieid', $jsonData->imdbID);
        $sql->bindParam(':title', $jsonData->Title);
        $sql->bindParam(':year', $jsonData->Year);
        $sql->bindParam(':runtime', $jsonData->Runtime);
        $sql->bindParam(':director', $jsonData->Director);
        $sql->bindParam(':actors', $jsonData->Actors);
        $sql->bindParam(':plot', $jsonData->Plot);
        $sql->bindParam(':poster', $jsonData->Poster);
        $sql->bindParam(':imdb_rating', $jsonData->imdbRating);
        $sql->bindParam(':tmeter', $jsonData->tomatoMeter);
        $sql->bindParam(':trating', $jsonData->tomatoRating);
        $sql->bindParam(':fresh', $jsonData->tomatoFresh);
        $sql->bindParam(':rotten', $jsonData->tomatoRotten);
        $sql->bindParam(':usmeter', $jsonData->tomatoUserMeter);
        $sql->bindParam(':usrating', $jsonData->tomatoUserRating);
        $sql->execute();

        echo "Record is stored into MOVIE table.";
        echo "<br>";

        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
    }
        $sql->close();
        $conn->close();
}
?>
