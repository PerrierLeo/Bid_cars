<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */


namespace App\Controllers;

class ad
{


    public function renderend($value)
    {

        require_once __DIR__ . "../../includes/db.php";

        $ads = $dbh->query("SELECT * FROM ads WHERE ID = $value[id] ")->fetchAll(\PDO::FETCH_ASSOC);
        $bids = $dbh->query("SELECT * FROM bid WHERE ad_id = $value[id] ")->fetchAll(\PDO::FETCH_ASSOC);


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />

            <title>Document</title>
        </head>

        <body>

            <?php foreach ($ads as $ad) { ?>
                <div class='containerAd'>
                    <img class="pictures" src='<?= $ad["picture_url"] ?>'>
                    <div class="listeHome">
                        <li> marque : <?= $ad['brand'] ?> </li>
                        <li> modele : <?= $ad['model'] ?> </li>
                        <li> Année : <?= $ad['year_car'] ?> </li>
                        <li> date limite d'enchere: <?= $ad['date_ad'] ?> </li>
                        <li> fin d'enchere : <?= $ad['deadline'] ?> </li>
                        <li> couleur : <?= $ad['color'] ?> </li>
                        <li> puissance : <?= $ad['power_car'] ?> </li>
                        <li> kilometres : <?= $ad['kilometers'] ?> </li>
                        <li> description : <?= $ad['description'] ?> </li>
                    </div>
                <?php } ?>
                <?php foreach ($bids as $bid) {
                    if ($bid > $bid) { ?>
                        <div class='containerAd'>
                            <div class="listeHome">
                                <p>bonjour</p>
                                <li> Enchere : <?= $bid['amount_bid'] ?> </li>

                            </div>
                    <?php }
                } ?>
        </body>

        </html>


<?php }
}
