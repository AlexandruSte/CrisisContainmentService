<?php
    require_once("../models/Alert.php");
    $alert = new Alert("test", 3.14, 3.14, 'test', 'test', 0);
    $alert->create();
    echo "New alert created\n";
    echo "It has id ".$alert->getId()."\n";
    $alert->save();
    $alert->remove();
    echo "The new alert was removed\n";
    $id = 1;
    $alert->setId(1);
    $alert->load();
    echo "Printing alert with id ". $id . "\n";
    echo "Longitude: ".$alert->getLongitude()."\n";
    echo "Latitude: ".$alert->getLatitude()."\n";
    echo "Type: ".$alert->getType()."\n";
    echo "Description: ".$alert->getDescription()."\n";
    echo "isSolved: ".$alert->getIsSolved()."\n";
?>