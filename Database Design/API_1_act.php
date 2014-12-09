<?php

/* API_1 http://www.myapifilms.com */
function api1_act_store($filepath){

    include "download_json.php";
    include "database_connection.php";

    foreach($filepath as $filePath){

    $jsonData=download_json($filePath);
    $actors=$jsonData->actors;

    try{
        foreach($actors as $value){
            $sql = $conn->prepare("INSERT IGNORE INTO ACT (MOVIE_IMDB_ID, ACTOR_IMDB_ID, ACT_CHARACTER ) VALUES (:movieid, :actorid, :chara)");
            $sql->bindParam(':movieid', $jsonData->idIMDB);
            $sql->bindParam(':actorid', $value->actorId);
            $sql->bindParam(':chara', $value->character);
            $sql->execute();
        }

        echo "Record is stored into ACT table.";
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



















