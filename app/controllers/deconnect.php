<?php

namespace App\Controllers;


class Deconnect // Permet la déconnexion
{
    public function deconnect()
    {
        // Détruit toutes les variables de session
        $_SESSION = array();

        //Destruction de session, données de session, et effacement des cookies
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finalement, on détruit la session.
        session_destroy();
        header('Location:/Bid_Cars');
    }
}
