<?php

session_start();
require_once('../controllers/MissingPersonController.php');

$missingPerson = new MissingPersonController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if($_SESSION['userType']==1){
        $missingPerson->getMissingPeopleForAuth($_GET['id']);
    }
    else if($_SESSION['userType']==0){
        $missingPerson->getMissingPeopleForUser($_GET['id']);
    }
}
