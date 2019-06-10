<?php
    require_once("../models/AuthorityAlert.php");
    $authorityAlert = new AuthorityAlert(1, 1);
    $authorityAlert->create();
    echo "New authority alert created\n";
    echo "It has id ".$authorityAlert->getId()."\n";
    $authorityAlert->save();
    $authorityAlert->remove();
    echo "The new authority alert was removed\n";
    $id = 1;
    $authorityAlert->setId(1);
    $authorityAlert->load();
    echo "Printing authority alert with id ". $id . "\n";
    echo "Id Authority: ".$authorityAlert->getIdAuthority()."\n";
    echo "Id Alert: ".$authorityAlert->getIdAlert()."\n";
?>