<?php

session_start();
$_SESSION['lat'] = $_POST['lat'];
$_SESSION['long'] = $_POST['long'];

if(isset($_POST['submitBtn'])){
    require_once('../microservices/controllers/AlertController.php');
    if(isset($_SESSION['lat']) && !empty($_SESSION['lat']) && isset($_SESSION['long']) && !empty($_SESSION['long'])){
        $alert_controller = new AlertController('titlu',$_SESSION['long'],$_SESSION['lat'],$_POST['type'],$_POST['description']);
        $alert_controller->add_alert();
    }
}
