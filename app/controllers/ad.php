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

                        <form action="<?= $value['id'] ?>" method='POST'>
                            <label>Enchere</label>
                            <input type="number" name='enchere'>
                            <button>enchérir</button>
                            <?php
                            $bids = $dbh->query("SELECT * FROM bid WHERE ad_id = $value[id] ")->fetchAll(\PDO::FETCH_ASSOC);

                            foreach ($bids as $bid) { ?>

                                <p> <?= $bid['amount_bid'] ?> </p>
                            <?php } ?>


                        </form>
                    </div>
        <?php }
        }
    } ?>
        <?php
        class validate_Enchere
        {

            public function validate_Enchere($value)
            {
                require_once __DIR__ . "../../includes/db.php";
                $bids = $dbh->query("SELECT * FROM bid WHERE ad_id = $value[id] ")->fetchAll(\PDO::FETCH_ASSOC);
                $ads = $dbh->query("SELECT * FROM ads WHERE ID = $value[id] ")->fetchAll(\PDO::FETCH_ASSOC);
                var_dump($ads);



                foreach ($bids as $bid) {
                    $newEnchere = $_POST['enchere'];
                    if ($newEnchere > $bid['amount_bid']) {

                        $bids = $dbh->query("UPDATE bid SET amount_bid=$newEnchere, user_id=$value[id] WHERE ad_id = $value[id] ");
                    } else {
                        echo 'enchere inferieur a l\'enchere précedente';
                        echo $newEnchere;
                    }
                }
        ?>
                <div class='containerAd'>
                    <div class="listeHome">
                        <p>bonjour</p>
                        <li> Enchere : <?= $bid['amount_bid'] ?> </li>

                    </div>
            <?php
            }
        }
            ?>
        </body>

        </html>


        <?php
