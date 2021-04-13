<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */


namespace App\Controllers;




class Subscribe
{
    /**
     * Affichage de la page d'accueil
     */
    public function render()
    {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>inscription</title>

        </head>

        <body>
            <h1> INSCRIPTION </h1>
            <form action='inscription' method='POST'>
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
                    <label for="password">Password : </label>
                    <input id='password' type='password' name='password' placeholder='password' required>
                </div>

                <div class='inputForm'>
                    <label for="passwordConfirm">Confirmer Password : </label>
                    <input id='passwordConfirm' type='password' name='passwordConfirm' placeholder='confirmer password' required>
                </div>

                <button>valider</button>
        </body>

        </html>
    <?php
    }

    public function read_data()
    {

        // nettoyage des données
        require_once __DIR__ . "../../includes/db.php";
        $firstname = filter_var($_POST["firstname"]); //, FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST["lastname"]); //, FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"]); //, FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);



        //variable indiquant si les données sont validées
        $data_validated = true;


        //validation des données
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false; // Insertion impossible car email invalide
        }

        //Si les données sont validées 
        if ($data_validated === true) {
            /* Préparation de la requête */
            $query = $dbh->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            var_dump($dbh);
            /* Execution de la requête */
            $result = $query->execute([$firstname, $lastname, $email, $password]);
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
                    <p>Vous vous êtes bien inscrit</p>
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
