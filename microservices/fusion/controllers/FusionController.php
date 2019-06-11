<?php
    require_once ("../models/AlertFusion.php");

    $count = Alert::getCount();
    for ($i=147; $i<$count; $i++)
    {
        $alert = new Alert(null, null, null, null, null, null);
        $alert->setId($i);
        $alert->load();
        $fusionAlert = new AlertFusion($alert);
        $fusionAlert->create();
        echo $i;
    }
?>