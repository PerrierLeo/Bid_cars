<?php

namespace App\models;

class Ad
{
    public static function renderAd($value)
    {

        require __DIR__ . "../../includes/db.php";
        $id = filter_var($value['id'], FILTER_SANITIZE_NUMBER_INT);
        $bid = $dbh->query("SELECT * FROM bid WHERE ad_id = $id ")->fetch();
        $ads = $dbh->query("SELECT * FROM ads WHERE ID = $id ")->fetch();
        $newBid = $_POST['enchere'];
        $bidCompare = $ads['start_price'];

        /* Validation de l'enchère */
        if ($newBid > $bidCompare) {
            $result = $dbh->exec("UPDATE bid SET amount_bid=$newBid, user_id=$id WHERE ad_id = $id ");
            $result = $dbh->exec("UPDATE ads SET start_price=$newBid WHERE ID=$id");

            header('Location:Bid_Cars/Annonce/' . $id);
        } else {
            echo 'Vous devez enchérir un montant supérieur au prix actuel';
        }
    }
}
