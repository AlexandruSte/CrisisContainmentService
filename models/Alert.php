<?php
    require_once('Connection.php');
    require_once('../microservices/fusion/models/AlertFusion.php');

    class Alert {
        private $id;
        private $title;
        private $longitude;
        private $latitude;
        private $type;
        private $description;
        private $isSolved;

        public static function getCount()
        {
            $connection = Connection::Instance();
            $sql = 'SELECT count(*) "Number" FROM alert';
            try
            {
                foreach ($connection->query($sql) as $row)
                    return $row['Number'];
                return 0;
            }
            catch (PDOException $e) {
                return 0;
            }
        }

        public function __construct ($title, $longitude, $latitude, $type, $description, $isSolved)
        {
            $this->title = $title;
            $this->longitude = $longitude;
            $this->latitude = $latitude;
            $this->type = $type;
            $this->description = $description;
            $this->isSolved = $isSolved;
        }

        // method used to send the object to the database (id is autogenerated)
        public function create(): bool
        {
            $connection = Connection::Instance();
            $sql = "INSERT INTO alert (title, longitude, latitude, type, description, isSolved) VALUES ('"
                .$this->title."', "
                .$this->longitude.", "
                .$this->latitude.", '"
                .$this->type."', "
                .($this->description==null?"NULL":"'".$this->description."'").", "
                .$this->isSolved.");";
            if (!($ok = $connection->exec($sql)))
                return false;
            $sql = "SELECT TOP(1) id FROM alert ORDER BY id DESC";
            try
            {
                foreach ($connection->query($sql) as $row)
                    $this->id = $row['id'];
                $alertFusion = new AlertFusion($this);
                $alertFusion->create();
                return true;
            }
            catch (PDOException $e) {
                return false;
            }
        }

        //method used to load the information related to the object with this specific id
        public function load(): bool
        {
            $connection = Connection::Instance();
            $sql = "SELECT * FROM alert WHERE id = ".$this->id.";";
            try
            {
                foreach ($connection->query($sql) as $row)
                {
                    $this->title = $row['title'];
                    $this->longitude = $row['longitude'];
                    $this->latitude = $row['latitude'];
                    $this->type = $row['type'];
                    $this->description = $row['description'];
                    $this->isSolved = $row['isSolved'];
                }
                return true;
            }
            catch (PDOException $e) {
                return false;
            }

        }

        //method used to save the current object with this specific id into the database
        public function save(): bool
        {
            $connection = Connection::Instance();
            $sql = "UPDATE alert SET "
                ."title = '" . $this->title."', "
                ."longitude = " . $this->longitude.", "
                ."latitude = " . $this->latitude.", "
                ."type = '" . $this->type."', "
                ."description = " . ($this->description==null?"NULL":"'".$this->description."'") .", "
                ."isSolved = " . $this->isSolved . " "
                ."WHERE id = " . $this->id . ";";
            if (!($ok = $connection->exec($sql)))
                return false;
            return true;
        }

        //method used to remove the object with this specific id
        public function remove(): bool
        {
            $connection = Connection::Instance();
            $sql = "DELETE FROM alert WHERE id = ".$this->id.";";
            if (!($ok = $connection->exec($sql)))
                return false;
            $alertFusion = new AlertFusion($this);
            $alertFusion->delete();
            return true;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getLongitude()
        {
            return $this->longitude;
        }

        public function setLongitude($longitude)
        {
            $this->longitude = $longitude;
        }

        public function getLatitude()
        {
            return $this->latitude;
        }

        public function setLatitude($latitude)
        {
            $this->latitude = $latitude;
        }

        public function getType()
        {
            return $this->type;
        }

        public function setType($type)
        {
            $this->type = $type;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($description)
        {
            $this->desciption = $description;
        }

        public function getIsSolved()
        {
            return $this->isSolved;
        }

        public function setIsSolved($isSolved)
        {
            $this->isSolved = $isSolved;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }
    }
?>