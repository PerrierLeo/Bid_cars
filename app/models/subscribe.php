<?php

namespace App\models;

class Subscribe
{

    public static function Subscribe()
    {
        require __DIR__ . "../../includes/db.php";
    }

    public static function readValidateData()
    {
        // Récupération des champs formulaire et nettoyage des données
        require __DIR__ . "../../includes/db.php";
        $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
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
            /* Execution de la requête */
            $result = $query->execute([$firstname, $lastname, $email, $password]);
        }
    }
}
