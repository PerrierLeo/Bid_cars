<?php

/* Page permettant le dépôt d'annonce

/* Namespace */

namespace App\Controllers;

/* Création de la classe Add_Ads */

class Add_Ads
{

    /* Création de la fonction traitement de données du formulaire */
    public function data_process()
    {
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
        ?>
        <!-- Début du fichier HTML -->
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Bid Cars</title>
            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <!-- Formulaire dépôt d'annonce  -->
            <form class="form" action="Ajouter_Annonce" method="POST">
                <div>
                    <label for="lastname"> Nom : </label>
                    <input type="text" name="lastname" id="lastname" placeholder="Votre Nom">
                </div>
                <div>
                    <label for="firstname"> Prénom : </label>
                    <input type="text" name="firstname" id="firstname" placeholder="Votre Prénom">
                </div>
                <div>
                    <label for="email"> Email : </label>
                    <input type="text" name="email" id="email" placeholder="Votre email">
                </div>
                <div>
                    <label for="start_price"> Prix de départ : </label>
                    <input type="text" name="start_price" id="start_price" placeholder="Prix de départ">
                </div>
                <div>
                    <label for="deadline"> Durée de l'enchère : </label>
                    <input type="date" name="deadline" id="deadline">
                </div>
                <div>
                    <label for="brand"> Marque du véhicule : </label>
                    <input type="brand" name="brand" id="brand" placeholder="Peugeot,Renault,Mercedes...">
                </div>
                <div>
                    <label for="model"> Modèle du véhicule : </label>
                    <input type="text" name="model" id="model" placeholder="308, Talisman, Classe A">
                </div>
                <div>
                    <label for="year_car"> Année de mise en circulation </label>
                    <input type="number" min="1950" max=2021 name="year_car" id="year_car" placeholder="1995,2002,2020...">
                </div>
                <div>
                    <label for="color"> Couleur du véhicule : </label>
                    <input type="text" name="color" id="color" placeholder="Rouge, Noire, Grise...">
                </div>
                <div>
                    <label for="power_car"> Puissance du véhicule (en chevaux) : </label>
                    <input type="text" name="power_car" id="power_car" placeholder="90ch, 120ch, 234ch...">
                </div>
                <div>
                    <label for="kilometers"> Kilomètrage du véhicule : </label>
                    <input type="text" name="kilometers" id="kilometers" placeholder="24000km, 35220km, 127342km...">
                </div>
                <div>
                    <label for="picture_url"> Lien de photo du véhicule : </label>
                    <input type="text" name="picture_url" id="picture_url" placeholder="www.googleimage.fr/monvehicule">
                    <div>
                        <textarea name="description" placeholder="Véhicule en parfait état, non fumeur, et voilà..."></textarea>
                    </div>
                    <button type="submit"> Valider mon annonce </button>
                    <!-- Fin du formulaire -->
            </form>
            </div>
        </body>

        </html>
        <!-- Fin du fichier HTML -->
<?php

    }
}
