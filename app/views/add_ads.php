<?php

namespace App\views;

class Add_Ads
{
    public static function renderAdds()
    { ?>
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


<?php }
}
