<?php
    require_once ("../models/AlertFusion.php");

    $count = Alert::getCount();
    for ($i=0; $i<10; $i++)
    {
        $alert = new Alert(null, null, null, null, null, null);
        $alert->setId($i);
        $alert->load();
        $fusionAlert = new AlertFusion($alert);
        $fusionAlert->create();
    }
?>