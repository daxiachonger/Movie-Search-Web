<?php

/**
   * This application uses movie IMDB id to download movies. Two variables  $IMDB_id_start and $IMDB_id_end are used to tell the app
   * movie range to download. For example, if you set $IMDB_id_start=1276204 and $IMDB_id_end=1276205, you are going to store
   * the moive (IMDB id = tt1276204) into database. If you set  $IMDB_id_start=1276204 and $IMDB_id_end=1276300, you are going
   * to store movies from IMDB id = tt1276204 to IMDB id = tt1276299 into database. Now, follow subsequent steps to start downlaod.
   *
   * Step1:  Open database_connection.php, and change servername, username and password to connect to your local database.
   * Step2:  Load database file Rotten_Tomato.sql into your local database OR open Database_SQL to create database schema.
   * Step3:  Change the IMDB movie id to be downloaded using $IMDB_id_start and $IMDB_id_end. Or make movie id as array in $movie_title.
   * Step4:  Open BDM Project/Database Design/, and click download_movie, download_actor, download_act, download_direct and download_genre in
   *             turn to download each table.
   *
   * Note: For Step4, download order should not be changed, otherwise, error may occur due to the foreign key constraint in database.
   *
*/


$IMDB_id_start=1790864;
$IMDB_id_end=1790864;
$movie_title=array("tt1345836", "tt1375666","tt0468569","tt0482571","tt0372784","tt2372162");

?>



















