<?php

/** 
 * Configuration de la connexion à la base de données
 */

$db_adress = "mysql:dbname=bid_cars;host=localhost";
$db_user = "root";
$db_password = "root";

/* Ouverture de la connexion */
$dbh = new PDO($db_adress, $db_user, $db_password);
