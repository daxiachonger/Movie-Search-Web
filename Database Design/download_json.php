<?php

    function download_file($downloadPath){
        //path to store donwloaded file
        $filePath="/Users/CHEN/Sites/temp.txt";
        //donwload from $downloadPath
        file_put_contents($filePath,fopen($downloadPath,'r'));
    }

    function delete_file($filePath){
        //file to delete
        unlink($filePath);
    }

    //return json formated data
    function download_json($downloadPath){
        //get a long string
        $tempString = file_get_contents($downloadPath);
        //decode string to json format
        $jsonData = json_decode($tempString);
        return $jsonData;
        /*
        //print out all mixed variables
        echo "<pre>";
        var_dump($jsonData,true);
        echo "<pre>";
        */
    }

?>
