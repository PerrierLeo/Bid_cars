<?php

/* Page de connexion */

/* NameSpace */

namespace App\Controllers;

use App\models\Connect as dbConnect;
use App\views\Connect as viewConnect;
//import 
require_once __DIR__ . '../../models/Connect.php';
require_once __DIR__ . '../../views/Connect.php';
/*Création de la classe Connect */

class Connect
{

    /* Début de la fonction Login permettant la connexion utilisateur */
    public function login()
    {
        dbConnect::verifyConnect();
    }


    public function render() // Permet l'affichage de la page connexion
    {

        viewConnect::renderConnect();
    }
}
