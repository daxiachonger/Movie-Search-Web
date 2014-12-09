<?php

/* API_1 http://www.myapifilms.com */
function api1_genre_store($filepath){

    include "download_json.php";
    include "database_connection.php";

    foreach($filepath as $filePath){

    $jsonData=download_json($filePath);
    $gen=$jsonData->genres;

    try{
        foreach($gen as $value){
            $sql = $conn->prepare("INSERT IGNORE INTO GENRE (MOVIE_IMDB_ID, Genre ) VALUES (:movieid, :genr)");
            $sql->bindParam(':movieid', $jsonData->idIMDB);
            $sql->bindParam(':genr', $value);
            $sql->execute();
        }

        echo "Record is stored into GENRE table.";
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



















