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
    protected $dynamicValue = [];


    /**
     * Constructeur
     */
    public function __construct($path, $callback)
    {
        $this->path = trim($path, "/"); // Suppression des / en début et fin d'URI
        $this->callback = $callback;
    }

    /**
     * Vérification de la route
     */
    public function check($uri)
    {
        /*etape 1 verifier si la route actuel est dynamique, on recherche 
        dans le this->path si il y a : dedans ou pas d'abord definir le :  */
        $dynamic_part = [];
        preg_match('/:.*/', $this->path, $dynamic_part, PREG_OFFSET_CAPTURE); /*permet de dire si oui on non le pattern est présent dans l'url, 
                        et si oui le mettre dans une variable ici $dynamic_part*/

        if (count($dynamic_part) > 0) {
            $name = substr($dynamic_part[0][0], 1); // nom de la variable de la route dynamique
            $value = substr($uri, $dynamic_part[0][1]); // valeur de la variable au dessus

            $this->dynamicValue[$name] = $value; //stockage de la valeur dynamique

            return substr($this->path, 0, $dynamic_part[0][1]) === substr($uri, 0, $dynamic_part[0][1]);

            var_dump($name);
            var_dump($value);
        }
        return $uri === $this->path;
    }

    /**
     * Appel de la fonction callback de la route
     */
    public function call()
    {
        call_user_func($this->callback, $this->dynamicValue); // Appel la fonction callback stokée dans la propriété
    }
}
