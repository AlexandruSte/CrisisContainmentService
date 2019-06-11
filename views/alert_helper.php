<?php

session_start();
if(!isset($_POST['submitBtn'])) {
    $_SESSION['lat'] = $_POST['lat'];
    $_SESSION['long'] = $_POST['long'];
    /******************************/
    $_SESSION['userType'] = 1;
    $_SESSION['userId'] = 1;
     /****************************/
}

if(isset($_POST['submitBtn'])){
    require_once('../controllers/AlertController.php');
    if(isset($_SESSION['lat']) && !empty($_SESSION['lat']) && isset($_SESSION['long']) && !empty($_SESSION['long'])){
        $alert_controller = new AlertController($_POST['title'],$_SESSION['long'],$_SESSION['lat'],$_POST['type'],$_POST['description']);
        //$alert_controller->add_alert();
        $alerts = $alert_controller->getNearByAlerts();
    }
}
