<?php

session_start();
require_once('../controllers/AlertController.php');

if(!isset($_POST['submitBtn'])) {
    $_SESSION['lat'] = $_POST['lat'];
    $_SESSION['long'] = $_POST['long'];
    /******************************/
    /*$_SESSION['userType'] = 2;
    $_SESSION['userId'] = 1;*/
     /****************************/
    $alert_controller = new AlertController(null,null,null,null,null);
    $alert_controller->getAlerts();
    $alert_controller->getNearByAlerts();
}

if(isset($_POST['submitBtn'])){
    if(isset($_SESSION['lat']) && !empty($_SESSION['lat']) && isset($_SESSION['long']) && !empty($_SESSION['long'])){
        $alert_controller = new AlertController($_POST['title'],$_SESSION['long'],$_SESSION['lat'],$_POST['type'],$_POST['description']);
        $alert_controller->add_alert();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $alert_controller = new AlertController(null,null,null,null,null);
    $alert_controller->getAlert()->setId($_GET['id']);
    $alert_controller->getAlert()->load();
    $_SESSION['alert'] = $alert_controller->getAlert();
    header('Location: ../views/alert.php');
}