<?php
    require_once("../models/UserAlert.php");
    $userAlert = new UserAlert(1, 1);
    $userAlert->create();
    echo "New user alert created\n";
    echo "It has id ".$userAlert->getId()."\n";
    $userAlert->save();
    $userAlert->remove();
    echo "The new user alert was removed\n";
    $id = 1;
    $userAlert->setId(1);
    $userAlert->load();
    echo "Printing user alert with id ". $id . "\n";
    echo "Id User: ".$userAlert->getIdUser()."\n";
    echo "Id Alert: ".$userAlert->getIdAlert()."\n";
?>