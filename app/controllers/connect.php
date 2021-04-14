<?php

/* Page de connexion */

/* NameSpace */

namespace App\Controllers;

/*Création de la classe Connect */

class Connect
{

    /* Début de la fonction Login permettant la connexion utilisateur */
    public function login()
    {
        require __DIR__ . '../../includes/db.php';
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Variable récupérant le contenu du champ Email et nettoyage
        $query = $dbh->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array('email' => $email));
        $result = $query->fetch(\PDO::FETCH_ASSOC); // Comparaison de l'email rentrée avec les emails stockés dans la BDD
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']); // Variable dé-hachage et vérification du mot de passe

        if (!$result) { // Identification incorrecte
            echo 'Identifiant ou mot de passe incorrect !';
        } else {
            if ($isPasswordCorrect) { // Mot de passe correct
                $_SESSION['ID'] = $result['ID'];
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $result['firstname'];
                echo 'Vous êtes connecté !';
                header('Location:/Bid_Cars');
            } else { // Mot de passe incorrect
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }

    public function render() // Permet l'affichage de la page connexion
    {
?>
        <!-- Début du fichier HTML  -->
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


            <div class="container_form">
                <h2> Connexion </h2>
                <!-- Formulaire de connexion  -->
                <form action="Connexion" method="POST">
                    <input type="text" name="email" placeholder="email" required>
                    <input type="password" name="password" placeholder="mot de passe" required>
                    <button type="submit" class="validation"> Se connecter </button>
                </form>
                <!-- Lien vers la page inscription  -->
                <a class="link_sub_co" href="Inscription">Pas encore inscrit ? </a>
            </div>
        </body>

        </html>
        <!-- Fin du fichier HTML  -->

<?php
    }
}
