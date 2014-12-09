<?php

/* API_1 http://www.myapifilms.com */
function api1_actor_store($filepath){

    include "download_json.php";
    include "database_connection.php";

    //store ACTOR iteratively based on $filepath
    foreach($filepath as $filePath){

    $jsonData=download_json($filePath);
    $actors=$jsonData->actors;
    $direct =$jsonData->directors;

    try {
        //store each actor info in the movie into database
        foreach($actors as $value){
            $sql = $conn->prepare("INSERT IGNORE INTO ACTOR (ACTOR_IMDB_ID, ACTOR_NAME, PHOTO, PROFILE ) VALUES (:actor, :name, :photo, :profile)");
            $sql->bindParam(':actor', $value->actorId);
            $sql->bindParam(':name', $value->actorName);
            $sql->bindParam(':photo', $value->urlPhoto);
            $sql->bindParam(':profile', $value->urlProfile);
            $sql->execute();
        }

        foreach($direct as $dir){
            $sql = $conn->prepare("INSERT IGNORE INTO ACTOR (ACTOR_IMDB_ID, ACTOR_NAME) VALUES (:actor, :name)");
            $sql->bindParam(':actor', $dir->nameId);
            $sql->bindParam(':name', $dir->name);
            $sql->execute();
        }

        echo "Record is stored into ACTOR table.";
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



















