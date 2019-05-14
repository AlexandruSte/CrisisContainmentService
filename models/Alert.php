<?php
    require_once('Connection.php');

    class alert {
        private $id;
        private $longitude;
        private $latitude;
        private $type;
        private $desciption;
        private $isSolved;

        public function __construct ($longitude, $latitude, $type, $desciption, $isSolved)
        {
            $this->$longitude = $longitude;
            $this->$latitude = $latitude;
            $this->$type = $type;
            $this->$desciption = $desciption;
            $this->$isSolved = $isSolved;
        }


        // function to send the object to the database
        public function create(): bool
        {
            $connection = Connection::Instance();
            $sql = 'INSERT INTO alert (longitude, latitude, type, description, isSolved) VALUES ('
                    .$id.', '.$longitude.', '.$latitude.', '.$type.', '.$description.', '.$isSolved.')';
            if (!($ok = $connection->exec($sql)))
                return false;
            return true;
        }
    }
?>