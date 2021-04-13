<?php

namespace App\Controllers;



class Connect
{


    public function login()
    {
        require __DIR__ . '../../includes/db.php';
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $query = $dbh->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array('email' => $email));
        $result = $query->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']);

        if (!$result) {
            echo 'Identifiant ou mot de passe incorrect !';
            print_r($query->errorInfo());
            print_r($dbh->errorInfo());
        } else {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['ID'] = $result['ID'];
                $_SESSION['email'] = $email;
                echo 'Vous êtes connecté !';
            } else {
                echo 'Mauvais identifiant ou mot de passe !';
                print_r($query->errorInfo());
                print_r($dbh->errorInfo());
            }
        }
    }

    public function render()
    {
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
            <form action="connect" method="POST">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password" placeholder="mot de passe">
                <button type="submit"> Se connecter </button>
            </form>
        </body>

        </html>

<?php
    }
}
