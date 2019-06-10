<?php
    require_once("../models/MissingPerson.php");
    $missingPerson = new MissingPerson("test", "test", "test", "test", null, 0, 1, 1);
    $missingPerson->create();
    echo "New missing person created\n";
    echo "It has id ".$missingPerson->getId()."\n";
    $missingPerson->save();
    $missingPerson->remove();
    echo "The new missing person was removed\n";
    $id = 1;
    $missingPerson->setId(1);
    $missingPerson->load();
    echo "Printing missing person with id ". $id . "\n";
    echo "Firstname: ".$missingPerson->getFirstname()."\n";
    echo "Lastname: ".$missingPerson->getLastname()."\n";
    echo "LastInteraction: ".$missingPerson->getLastInteraction()."\n";
    echo "Description: ".$missingPerson->getDescription()."\n";
    echo "Photo: ".$missingPerson->getPhoto()."\n";
    echo "Id Alert: ".$missingPerson->getIdAlert()."\n";
    echo "Id User: ".$missingPerson->getIdUser()."\n";
?>