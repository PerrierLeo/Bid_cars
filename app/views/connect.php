<?php

namespace App\views;

class Connect
{
    public static function renderConnect()
    { ?>

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
<?php }
}
