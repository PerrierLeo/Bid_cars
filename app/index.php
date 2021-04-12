<?php

/**
 * index.php - Point d'entrée de l'application
 * C'est ici que l'on défini les routes 
 * et les fonctions des controleurs qui dervont être appelées
 */

/* Imports */
require_once __DIR__ . "/core/Router.class.php"; // Routeur
include_once __DIR__ . "/controllers/home.php";
include_once __DIR__ . "/controllers/default.php";
include_once __DIR__ . "/controllers/add_ads.php";
include_once __DIR__ . "/controllers/subscribe.php";




use App\Router\Router;
use App\Controllers\Home;
use App\Controllers\DefaultPage;
use App\Controllers\Add_ads;
use App\Controllers\Subscribe;




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

/* GET / - Page d'accueil avec liste des annonces*/
$router->get("/",  [new Home(), 'render']);

/* GET / - Page de création d'annonce */
$router->get("/annonce",  [new Add_ads(), 'render']);

/* POST / - Traitement des données du formulaire */
$router->post("/annonce",  [new Add_ads(), 'read_data']);

/* GET / - Page de création d'annonce */
$router->get("/inscription",  [new Subscribe(), 'render']);

/* POST / - Traitement des données du formulaire */
$router->post("/inscription",  [new Subscribe(), 'read_data']);




/* Route par défaut */
$router->default([new DefaultPage(), 'render']);



/**
 * Recherche de routes correspondantes
 */

/* Démarrage du routeur */
$router->start();
