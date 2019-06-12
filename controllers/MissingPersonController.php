<?php

require_once('../models/MissingPerson.php');
require_once('../models/Connection.php');

class MissingPersonController{
    private $missingPerson;

    public function __construct(){
        $this->missingPerson = new MissingPerson(null,null,null,null,null,null,null,null);
    }

    public function getMissingPeopleForAuth($id_alert){
        $people = array();
        try {
            $conn = Connection::Instance();
            $sql = "SELECT mp.id FROM missing_person as mp JOIN alert as a ON mp.id_alert=a.id";
            foreach ($conn->query($sql) as $row) {
                $this->missingPerson->setId($row['id']);
                $this->missingPerson->load();
                array_push($people,$this->missingPerson);
            }
        }
        catch (PDOException $e) {
            return;
        }
        $_SESSION['people'] = $people;
    }

    public function getMissingPeopleForUser($id_alert){
        $people = array();
        try {
            $conn = Connection::Instance();
            $sql = "SELECT mp.id FROM missing_person as mp JOIN alert as a ON mp.id_alert=a.id WHERE mp.id_user=" . $_SESSION['userId'];
            foreach ($conn->query($sql) as $row) {
                $this->missingPerson->setId($row['id']);
                $this->missingPerson->load();
                array_push($people,$this->missingPerson);
            }
        }
        catch (PDOException $e) {
            return;
        }
        $_SESSION['people'] = $people;
    }

    public function getPerson(){
        return $this->missingPerson;
    }

    public function setPerson($person){
        $this->missingPerson = $person;
    }
}