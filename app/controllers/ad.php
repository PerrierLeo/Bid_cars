<?php

/* Namespace */

namespace App\Controllers;

use App\models\Ad as validateBid;
use App\views\Ad as viewAd;
//import 
require_once __DIR__ . '../../models/ad.php';
require_once __DIR__ . '../../views/ad.php';
/*Création de la classe Connect */

/* Création de la classe Ad */

class Ad
{
    /* Fonction render prenant en compte l'ID de l'annonce contenu dans l'URL ($value) */
    public function render($value)
    {

        require __DIR__ . "../../includes/db.php";

        /* Récupération de l'annonce en fonction de l'ID */
        $id = filter_var($value['id'], FILTER_SANITIZE_NUMBER_INT);
        $ad = $dbh->query("SELECT * FROM ads WHERE ID = $id")->FETCH();
        viewAd::renderAd($ad, $bid, $dbh);

?>
       
<?php }


    /* Création de la classe validate_Bid correspondant à la mise à jour du prix en fonction de l'entrée utilisateur */


    /* Création de la fonction de validation de l'enchère */
    public function validate_bid($value)
    {
        validateBid::renderAd($value);
    }
}
