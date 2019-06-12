<?php

session_start();
require_once('../controllers/MissingPersonController.php');
require_once('../controllers/AlertController.php');

$missingPerson = new MissingPersonController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if($_SESSION['userType']==1){
        $missingPerson->getMissingPeopleForAuth($_GET['id']);
    }
    else if($_SESSION['userType']==0){
        $missingPerson->getMissingPeopleForUser($_GET['id']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['id_person'])){
        $id = $_POST['id_person'];
        $missingPerson->getPerson()->setId($id);
        $missingPerson->getPerson()->load();
        $missingPerson->getPerson()->setIsSolved(1);
        $missingPerson->getPerson()->save();
    }
    else if(isset($_POST['id_alert'])){
        $id = $_POST['id_alert'];
        $alertController = new AlertController(null,null,null,null,null);
        $alertController->getAlert()->setId($id);
        $alertController->getAlert()->load();
        $alertController->getAlert()->setIsSolved(1);
        $alertController->getAlert()->save();
    }
    else if(isset($_POST['submitBtn'])){
        //adaugam un missing person
        $missingPerson->setPerson(new MissingPerson($_POST['firstname'],$_POST['lastname'],$_POST['interaction'],$_POST['description'],$_POST['file'],0,$_SESSION['alert_id'],$_SESSION['userId']));
        $missingPerson->getPerson()->create();
        header('Location: ../views/alert.php');
    }
}