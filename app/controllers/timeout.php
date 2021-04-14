<?php

namespace App\Controllers;

class TimeOut
{

    public function timeOut()
    {
        require __DIR__ . "../../includes/db.php";
        $ad = $dbh->query("SELECT deadline FROM ads WHERE ID = $id")->FETCH();
        $deadline = $ad['deadline'];
        $timeOut = mktime($deadline);
    }
}
