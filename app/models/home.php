<?php

namespace App\models;

class Home
{

    public static function queryHome($dbh)
    {
        require __DIR__ . "../../includes/db.php";
        return $dbh->query('SELECT * FROM ads')->FETCHALL(\PDO::FETCH_ASSOC); // Récupération des annonces dans la BDD pour affichage
    }
}
