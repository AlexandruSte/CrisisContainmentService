<?php

require_once('../models/Alert.php');
require_once('../models/AuthorityAlert.php');
require_once('../models/UserAlert.php');
require_once('../models/Connection.php');

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
        header('Location: ../views/dashboard.php');
    }

    public function getAlerts(){
        $alerts = array();
        if($_SESSION['userType']==1){
            try {
                $conn = Connection::Instance();
                $sql = "SELECT TOP(6) a.id, a.isSolved, a.title, a.description, a.type FROM authority_alert as aa join alert as a on a.id=aa.id_alert";
                foreach ($conn->query($sql) as $row) {
                    $alert = new Alert($row['title'],null,null,$row['type'],$row['description'],$row['isSolved']);
                    $alert->setId($row['id']);
                    array_push($alerts,$alert);
                }
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
            }
        }
        else if($_SESSION['userType']==0){
            try {
                $conn = Connection::Instance();
                $sql = "SELECT TOP(6) a.id, a.isSolved, a.title, a.description, a.type FROM user_alert as ua join alert as a on a.id=ua.id_alert";
                foreach ($conn->query($sql) as $row) {
                    $alert = new Alert($row['title'],null,null,$row['type'],$row['description'],$row['isSolved']);
                    $alert->setId($row['id']);
                    array_push($alerts,$alert);
                }
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
            }
        }

        $_SESSION['alerts'] = $alerts;
        //return $alerts;
    }

    public function getNearByAlerts(){
        $lat = $_SESSION['lat'];
        $long = $_SESSION['long'];
        $valueToAdd = 0.2;
        $alerts = array();

        try {
            $conn = Connection::Instance();
            //~11 km latitude, ~15km longitude
            $sql = "SELECT TOP(6) a.id, a.isSolved, a.title, a.description, a.type FROM alert as a " .
                "WHERE (a.latitude BETWEEN ". ($lat+0.1) ." AND ". ($lat-0.1) .")".
                " AND (a.longitude BETWEEN ". ($long+$valueToAdd) ." AND ". ($long-$valueToAdd) .")";
            foreach ($conn->query($sql) as $row) {
                $alert = new Alert($row['title'],null,null,$row['type'],$row['description'],$row['isSolved']);
                $alert->setId($row['id']);
                array_push($alerts,$alert);
            }
        }
        catch (PDOException $e) {
            print("Error connecting to SQL Server.");
        }

        $_SESSION['near_alerts'] = $alerts;
    }

    public function getAlert()
    {
        return $this->alert;
    }

    public function setAlert($alert)
    {
        $this->alert = $alert;
    }

}