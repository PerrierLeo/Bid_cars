<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */


namespace App\Controllers;




class Add_ads
{
    /**
     * Affichage de la page de création d'annonce
     */
    public function render()
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Annonce</title>
            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <form action='annonce' method='POST'>
                <div class='inputForm'>
                    <label for="firstname">Nom : </label>
                    <input id='firstname' type='text' name='firstname' placeholder='nom' required>
                </div>
                <div class='inputForm'>
                    <label for="lastname">Prénom : </label>
                    <input id='lastname' type='text' name='lastname' placeholder='prénom' required>
                </div>
                <div class='inputForm'>
                    <label for="email">Email : </label>
                    <input id='email' type='email' name='email' placeholder='email' required>
                </div>
                <div class='inputForm'>
                    <label for="startPrice">Prix de départ : </label>
                    <input id='startPrice' type='number' name='start_price' placeholder='prix de départ' required>
                </div>
                <div class='inputForm'>

                    <input type='date' id='deadline' name='deadline'>


                </div>
                <div class='inputForm'>
                    <label for="brand">Marque : </label>
                    <input id='brand' type='text' name='brand' placeholder='marque véhicule' required>
                </div>
                <div class='inputForm'>
                    <label for="model">Modèle : </label>
                    <input id='model' type='text' name='model' placeholder='modèle véhicule' required>
                </div>
                <div class='inputForm'>
                    <label for="year">Année : </label>
                    <input id='year' type='number' name='year_car' required>
                </div>
                <div class='inputForm'>
                    <label for="color">Couleur : </label>
                    <input id='color' type='text' name='color' placeholder='couleur véhicule' required>
                </div>
                <div class='inputForm'>
                    <label for="power_car">Puissance : </label>
                    <input id='power_car' type='number' name='power_car' placeholder='Puissance véhicule' required>
                </div>
                <div class='inputForm'>
                    <label for="kilometers">Kilomètres : </label>
                    <input id='kilometers' type='number' name='kilometers' placeholder='Kilomètres véhicule' required>
                </div>
                <div class='inputForm'>
                    <label for="picture_url">Photo : </label>
                    <input id='picture_url' type='url' name='picture_url' placeholder='lien photo véhicule' required>
                </div>
                <div class='inputForm'>
                    <label for="description">Description : </label>
                    <textarea id='description' type='text' name='description' placeholder='description véhicule' required>
                </textarea>
                    <button type='submit'>Valider</button>
                </div>

            </form>

        </body>

        </html>
        <style>

        </style>

    <?php
    }

    public function read_data()
    {

        // nettoyage des données
        require_once __DIR__ . "../../includes/db.php";
        $firstname = filter_var($_POST["firstname"]); //, FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST["lastname"]); //, FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"]); //, FILTER_SANITIZE_EMAIL);
        $start_price = filter_var($_POST["start_price"]); //, FILTER_SANITIZE_NUMBER_FLOAT);
        $deadline = filter_var($_POST["deadline"]);
        $brand = filter_var($_POST["brand"]); //, FILTER_SANITIZE_STRING);
        $model = filter_var($_POST["model"]); //, FILTER_SANITIZE_STRING);
        $year_car = filter_var($_POST["year_car"]);
        $color = filter_var($_POST["color"]); //, FILTER_SANITIZE_STRING);
        $power_car = filter_var($_POST["power_car"]); //, FILTER_SANITIZE_NUMBER_INT);
        $kilometers = filter_var($_POST["kilometers"]); //, FILTER_SANITIZE_NUMBER_INT);
        $picture_url = filter_var($_POST["picture_url"]); //, FILTER_SANITIZE_URL);
        $description = filter_var($_POST["description"]); //, FILTER_SANITIZE_STRING);


        //variable indiquant si les données sont validées
        $data_validated = true;


        //validation des données
        /*if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false; // Insertion impossible car email invalide
        }
        if (filter_var($_POST["start_price"], FILTER_VALIDATE_FLOAT) === false) {
            $data_validated = false; // Insertion impossible car email invalide
        }
        if (filter_var($_POST["power_car"], FILTER_VALIDATE_INT) === false) {
            $data_validated = false; // Insertion impossible car email invalide
        }
        if (filter_var($_POST["kilometers"], FILTER_VALIDATE_INT) === false) {
            $data_validated = false; // Insertion impossible car email invalide
        }
        if (filter_var($_POST["picture_url"], FILTER_VALIDATE_URL) === false) {
            $data_validated = false; // Insertion impossible car email invalide
        }*/
        //Si les données sont validées 
        if ($data_validated === true) {
            /* Préparation de la requête */
            $query = $dbh->prepare('INSERT INTO ads (firstname, lastname, email, start_price, deadline, brand, model, year_car, color, power_car, kilometers, picture_url, description) VALUEs (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            var_dump($dbh);
            /* Execution de la requête */
            $result = $query->execute([$firstname, $lastname, $email, $start_price, $deadline, $brand, $model, $year_car, $color, $power_car, $kilometers, $picture_url, $description]);
            var_dump($data_validated);
            var_dump($result);
            var_dump($query);
            print_r($dbh->errorInfo());
            print_r($query->errorInfo()); // pour afficher erreur PDO
        }
    ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>

            <body>
                <?php if ($result === true) { ?>
                    <p>Votre demande de contact a bien été enregistrée.</p>
                <?php } else { ?>
                    <p>Une erreur s'est produite, veuillez réessayer.</p>

                <?php } ?>

                <?php if ($data_validated === false) { ?>
                    <p>Une des données est invalide.</p>
                <?php } ?>

            </body>
        </body>

        </html>

<?php
    }
}
