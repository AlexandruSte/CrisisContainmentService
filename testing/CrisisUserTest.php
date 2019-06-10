<?php
    require_once("../models/CrisisUser.php");
    $crisisUser = new CrisisUser("test", "test", "test", "test", "test", "test", "test", "test");
    $crisisUser->create();
    echo "New crisis user created\n";
    echo "It has id ".$crisisUser->getId()."\n";
    $crisisUser->save();
    $crisisUser->remove();
    echo "The new crisis user was removed\n";
    $id = 1;
    $crisisUser->setId(1);
    $crisisUser->load();
    echo "Printing crisis user with id ". $id . "\n";
    echo "Firstname: ".$crisisUser->getFirstname()."\n";
    echo "Lastname: ".$crisisUser->getLastname()."\n";
    echo "Email: ".$crisisUser->getEmail()."\n";
    echo "Password: ".$crisisUser->getPassword()."\n";
    echo "Country: ".$crisisUser->getCountry()."\n";
    echo "City: ".$crisisUser->getCity()."\n";
    echo "Zipcode: ".$crisisUser->getZipcode()."\n";
    echo "Phone: ".$crisisUser->getPhone()."\n";
?>