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
        <!-- Début du fichier HTML -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="assets/styles/style.css" />

            <title>Document</title>
        </head>

        <body>
            <header>
                <nav>
                    <h1 class="titleWebsite"> BID CARS </h1>
                    <ul>
                        <li>
                            <?php if (isset($_SESSION['firstname']) == true) {
                                echo 'Bonjour' . ' ' . $_SESSION['firstname'];
                            ?>
                                <a href="/Bid_Cars">Accueil</a>
                            <?php } else { ?>
                                <a href="Connexion">Connexion |</a>
                                <a href="Inscription">Inscription |</a>

                            <?php } ?>
                        </li>
                    </ul>
                </nav>
            </header>

            <body>
                <div class="container_form">
                    <h1> INSCRIPTION </h1>
                    <form action='Inscription' method='POST'>
                        <div class='inputForm'>
                            <input id='firstname' type='text' name='firstname' placeholder='nom' required>
                        </div>

                        <div class='inputForm'>
                            <input id='lastname' type='text' name='lastname' placeholder='prénom' required>
                        </div>

                        <div class='inputForm'>
                            <input id='email' type='email' name='email' placeholder='email' required>
                        </div>

                        <div class='inputForm'>
                            <input id='password' type='password' name='password' placeholder='password' required>
                        </div>

                        <div class='inputForm'>
                            <input id='passwordConfirm' type='password' name='passwordConfirm' placeholder='confirmer password' required>
                        </div>

                        <button class="validation">S'inscrire</button>
                    </form>

                    <a class="link_sub_co" href="Connexion">Déjà inscrit ? </a>

                </div>
            </body>

        </html>
        <!-- Fin du fichier HTML -->
    <?php
    }

    public function read_data()
    {

        // Récupération des champs formulaire et nettoyage des données
        require __DIR__ . "../../includes/db.php";
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
            require __DIR__ . "../../includes/db.php";
            /* Préparation de la requête */
            $query = $dbh->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
            /* Execution de la requête */
            $result = $query->execute([$firstname, $lastname, $email, $password]);
        }
    ?>
        <!-- Début du fichier HTML -->
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
        <!-- Fin du fichier HTML -->

<?php
    }
}
