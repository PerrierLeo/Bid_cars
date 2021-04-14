<?php

/**
 * index.php - Point d'entrée de l'application
 * Définition des routes et des contrôleurs
 */

/* Imports */

require_once __DIR__ . "/core/Router.class.php"; // Routeur
include_once __DIR__ . "/controllers/home.php";
include_once __DIR__ . "/controllers/default.php";
include_once __DIR__ .  "/includes/db.php";
include_once __DIR__ . "/controllers/add_ads.php";
include_once __DIR__ . "/controllers/connect.php";
include_once __DIR__ . "/controllers/subscribe.php";
include_once __DIR__ . "/controllers/ad.php";
include_once __DIR__ . "/controllers/deconnect.php";

/* NameSpaces */

use App\Router\Router;
use App\Controllers\Home;
use App\Controllers\DefaultPage;
use App\Controllers\Add_Ads;
use App\Controllers\Connect;
use App\Controllers\Subscribe;
use App\Controllers\Ad;
use App\Controllers\Deconnect;
use App\Controllers\validate_Bid;

/*Démarrage de la session utilisateur */

session_start();

/**
 * Requête
 */
$method = $_SERVER['REQUEST_METHOD']; // Récupération du verbe
$uri = $_GET['uri']; // Récuépération de l'URI

/**
 * Router
 */

/* Création du routeur */
$router = new Router($uri, $method);


/**
 * Routes
 */

/* GET / - Page d'accueil */
$router->get("/",  [new Home(), 'render']);

/* GET / - Page formulaire */
$router->get("/Ajouter_Annonce", [new Add_Ads(), 'render']);

/* POST / - Formulaire */

$router->post('/Ajouter_Annonce', [new Add_Ads(), 'data_process']);

/* Route par défaut */
$router->default([new DefaultPage(), 'render']);

/* GET / - Connexion */

$router->get('/Connexion', [new Connect(), 'render']);

/* POST / - Connexion */

$router->post('/Connexion', [new Connect(), 'login']);

/* POST / - Inscription */

$router->post('/Inscription', [new Subscribe(), 'read_data']);

/* GET / - Inscription */

$router->get('/Inscription', [new Subscribe(), 'render']);

/* GET / - Annonce */

$router->get('/Annonce:id', [new Ad(), 'render']);

/* POST / - Annonce */

$router->post('/Annonce:id', [new Ad(), 'validate_bid']);

/* POST / - Déconnexion */

$router->post('Deconnexion', [new Deconnect(), 'deconnect']);

/* Démarrage du routeur */
$router->start();
