<?php

/* API_1 http://www.myapifilms.com */
function api1_direct_store($filepath){

    include "download_json.php";
    include "database_connection.php";

    foreach($filepath as $filePath){

    $jsonData=download_json($filePath);
    $director=$jsonData->directors;

    try{
            foreach($director as $direct){
            $sql = $conn->prepare("INSERT IGNORE INTO DIRECT (MOVIE_IMDB_ID, DIRECTOR_IMDB_ID) VALUES (:movieid, :directorid)");
            $sql->bindParam(':movieid', $jsonData->idIMDB);
            $sql->bindParam(':directorid', $direct->nameId);
            $sql->execute();
            }

        echo "Record is stored into DIRECT table.";
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



















