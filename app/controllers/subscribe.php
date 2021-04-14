<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */


namespace App\Controllers;

use App\models\Subscribe as dbSubscribe;
use App\views\Subscribe as viewSubscribe;
//import 
require_once __DIR__ . '../../models/subscribe.php';
require_once __DIR__ . '../../views/subscribe.php';

class Subscribe
{


    /**
     * Affichage de la page d'accueil
     */
    public function render()
    {
        dbSubscribe::Subscribe();
        viewSubscribe::renderSubscribe()
?>

    <?php
    }

    public function read_data($result, $data_validated)
    {
        viewSubscribe::renderValidateSubscribe($result, $data_validated);
        dbSubscribe::readValidateData();

    ?>
        
<?php
    }
}
