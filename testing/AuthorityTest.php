<?php
    require_once("../models/Authority.php");
    $authority = new Authority("test", "test@test", 'test123', 'test.com', "testaddress", "parola");
    $authority->create();
    echo "New authority created\n";
    echo "It has id ".$authority->getId()."\n";
    $authority->save();
    $authority->remove();
    echo "The new authority was removed\n";
    $id = 1;
    $authority->setId(1);
    $authority->load();
    echo "Printing authority with id ". $id . "\n";
    echo "Name: ".$authority->getName()."\n";
    echo "Email: ".$authority->getEmail()."\n";
    echo "Phone: ".$authority->getPhone()."\n";
    echo "Website: ".$authority->getWebsite()."\n";
    echo "Address: ".$authority->getAddress()."\n";
    echo "Password: ".$authority->getPassword()."\n";
?>