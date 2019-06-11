<?php

require_once('../models/Alert.php');
require_once('../models/AuthorityAlert.php');
require_once('../models/UserAlert.php');
session_start();

class AlertController{

    private $alert;

    public function __construct ($title, $longitude, $latitude, $type, $description){
        $this->alert = new Alert($title,$longitude,$latitude,$type,$description,0);
    }

    public function add_alert(){
        echo 'am intrat';
        try {
            $this->alert->create();

            if($_SESSION['userType']==1){
                $authorityAlert = new AuthorityAlert($_SESSION['userId'], $this->alert->getId());
                $authorityAlert->create();
            }
            else{
                $userAlert = new UserAlert($_SESSION['userId'], $this->alert->getId());
                $userAlert->create();
            }
        }
        catch (PDOException $e) {
            return;
        }
        header('Location: dashboard.html');
    }

}