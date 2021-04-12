<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */


namespace App\Controllers;




class Home
{
    /**
     * Affichage de la page d'accueil
     */
    public function render()
    {
        require_once __DIR__ . "../../includes/db.php";
        $ads = $dbh->query("SELECT * FROM ads")->fetchAll(\PDO::FETCH_ASSOC);

?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Démo routeur V1</title>
            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <div id="mainContainer">
                <h1>Démo routeur</h1>
                <p>Bienvenue</p>
            </div>
            <div class='containerHome'>
                <?php foreach ($ads as $ad) { ?>
                    <div class='containerAd'>
                        <img class="pictures" src='<?= $ad["picture_url"] ?>'>
                        <div class="listeHome">
                            <li> <?= $ad['brand'] ?> </li>
                            <li> <?= $ad['model'] ?> </li>
                            <li> <?= $ad['year_car'] ?> </li>
                        </div>
                        <button class='buttonHome' type='s
                        ubmit'>voir l'annonce</button>
                    </div>

                <?php } ?>

            </div>
        </body>

        </html>
        <style>

        </style>

<?php
    }
}
