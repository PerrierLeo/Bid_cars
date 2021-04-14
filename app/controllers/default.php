<?php

/**
 * controllers/default.php - Controleur accueil pour la page par défaut
 */

/* Namespace */

namespace App\Controllers;

class DefaultPage
{

    /**
     * Affichage de la page par défaut
     */
    public function render()
    {
        http_response_code(404);

?>
        <!-- Début du fichier HTML -->
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Demo routeur</title>

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <div id="mainContainer">
                <h1>Page non trouvée</h1>
                <p>Cette page n'existe pas.</p>
            </div>
        </body>

        </html>
        <!-- Fin du fichier HTML  -->
<?php
    }
}
