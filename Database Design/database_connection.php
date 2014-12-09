<?php

        $servername = "localhost";
        $username = "root";
        $password = "123456";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=ROTTEN_TOMATO", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database Connected!";
        }

        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

?>
