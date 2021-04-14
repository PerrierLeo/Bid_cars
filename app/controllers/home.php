<?php

/* Namespace */

namespace App\Controllers;

use App\models\Home as queryHome;
use App\views\Home as viewsHome;


// import
require_once __DIR__ . '../../models/home.php';
require_once __DIR__ . '../../views/home.php';

class Home // Affichage de la page d'accueil
{
    public function render() // Permet l'affichage de la page d'accueil
    {
        require __DIR__ . '../../includes/db.php';
        $ads = queryHome::queryHome($dbh);
        viewsHome::renderHome($ads);
    }
}
