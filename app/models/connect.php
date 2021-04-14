<?php

namespace App\models;

class Connect
{
    public static function verifyConnect()
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
}
