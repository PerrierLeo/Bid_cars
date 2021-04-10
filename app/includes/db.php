<?php

/**
 * configuration de la connexion à la base de données
 */

$db_address = 'mysql:dbname=bid_cars;host=localhost';
$db_user = 'root';
$db_password = 'root';

/**
 * ouverture de la connexion
 */
$dbh = new PDO($db_adress, $db_user, $db_password);
