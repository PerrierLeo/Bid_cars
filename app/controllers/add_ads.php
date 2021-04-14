<?php

/* Page permettant le dépôt d'annonce

/* Namespace */

namespace App\Controllers;

use App\models\Add_Ads as validateBid;
use App\views\Add_Ads as viewAdd;
//import 
require_once __DIR__ . '../../models/add_ads.php';
require_once __DIR__ . '../../views/add_ads.php';
/*Création de la classe Connect */

/* Création de la classe Add_Ads */

class Add_Ads
{

    /* Création de la fonction traitement de données du formulaire */
    public function data_process()
    {
        validateBid::dataAdd();
        /* Déclaration des variables et nettoyage */
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $start_price = filter_var($_POST['start_price'], FILTER_SANITIZE_NUMBER_FLOAT);
        $deadline = $_POST['deadline'];
        $brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
        $model = filter_var($_POST['model'], FILTER_SANITIZE_STRING);
        $year_car = $_POST['year_car'];
        $color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
        $power_car = filter_var($_POST['power_car'], FILTER_SANITIZE_NUMBER_INT);
        $kilometers = filter_var($_POST['kilometers'], FILTER_SANITIZE_NUMBER_INT);
        $picture_url = filter_var($_POST['picture_url'], FILTER_SANITIZE_URL);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $data_validated = true;

        if (filter_var($_POST['email'] . FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['start_price'] . FILTER_VALIDATE_FLOAT) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['power_car'] . FILTER_VALIDATE_INT) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['kilometers'] . FILTER_VALIDATE_INT) === false) {
            $data_validated = false;
        }
        if (filter_var($_POST['picture_url'] . FILTER_VALIDATE_URL) === false) {
            $data_validated = false;
        }

        /* Ecriture des données dans la base de données */
        if ($data_validated === true) {
            require __DIR__ . '../../includes/db.php';
            $query = $dbh->prepare('INSERT INTO ads (lastname, firstname, email, start_price, deadline, brand, model, year_car, color, power_car, kilometers, picture_url, description_car) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $results = $query->execute([$lastname, $firstname, $email, $start_price, $deadline, $brand, $model, $year_car, $color, $power_car, $kilometers, $picture_url, $description]);
?>
            <!-- Début du fichier HTML -->
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bid Cars</title>
            </head>

            <body>

                <div>
                    <?php if ($results === true) { ?>
                        <p> Formulaire envoyé ! </p>
                    <?php } ?>

                    <?php if ($results === false) { ?>
                        <p> Le formulaire comporte une erreur ! </p>
                    <?php } ?>
                </div>

            </body>

            </html>
        <?php
            /*Redirection vers la page d'accueil */
            header("Location: /Bid_Cars/");
        }
    }

    /* Fonction de rendu */
    public function render()
    {
        viewAdd::renderAdds();
        ?>

<?php

    }
}
