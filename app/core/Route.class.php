<?php

/**
 * routes/Route.class.php - Classe route
 * Cette classe permet de créer une nouvelle route.
 * Cette route sera enregistrée dans le routeur.
 */

/* Namespace */

namespace App\Router;


/**
 * Classe route
 */
class Route
{

    /* Propriétés */
    protected $path; // Chemin de la route
    protected $callback; // Fonction callback à appeler si la route correspond
    protected $dynamicValues = [];

    /**
     * Constructeur
     */
    public function __construct($path, $callback)
    {
        $this->path = trim($path, "/"); // Suppression des / en début et fin d'URI
        $this->callback = $callback;
    }

    /**
     * Vérification de la rotue (dynamique ou statique)
     */
    public function check($uri)
    {

        $dynamic_part = [];
        preg_match("/:.*/", $this->path,$dynamic_part, PREG_OFFSET_CAPTURE);
        if (count($dynamic_part)>0){
            $name = substr($dynamic_part[0][0],1);
            $value = substr($uri, $dynamic_part[0][1]);

            $this->dynamicValues[$name] = $value;

            return substr($this->path, 0, $dynamic_part[0][1]) === substr($uri,0,$dynamic_part[0][1]);

        } else {
        return $uri === $this->path;
        }
    }

    /**
     * Appel de la fonction callback de la route
     */
    public function call()
    {
        call_user_func($this->callback, $this->dynamicValues); // Appel la fonction callback stokée dans la propriété
    }
}
