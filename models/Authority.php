<?php
    require_once('Connection.php');

    class Authority {
        private $id;
        private $name;
        private $email;
        private $phone;
        private $website;
        private $address;

        public function __construct ($name, $email, $phone, $website, $address)
        {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->website = $website;
            $this->address = $address;
        }

        // method used to send the object to the database (id is autogenerated)
        public function create(): bool
        {
            $connection = Connection::Instance();
            $sql = "INSERT INTO authority (name, email, phone, website, address) VALUES ('"
                .$this->name."', '"
                .$this->email."', '"
                .$this->phone."', '"
                .$this->website."', '"
                .$this->address."');";
            if (!($ok = $connection->exec($sql)))
                return false;
            $sql = "SELECT TOP(1) id FROM authority ORDER BY id DESC";
            try
            {
                foreach ($connection->query($sql) as $row)
                    $this->id = $row['id'];
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
            $sql = "SELECT * FROM authority WHERE id = ".$this->id.";";
            try
            {
                foreach ($connection->query($sql) as $row)
                {
                    $this->name = $row['name'];
                    $this->email = $row['email'];
                    $this->phone = $row['phone'];
                    $this->website = $row['website'];
                    $this->address = $row['address'];
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
            $sql = "UPDATE authority SET "
                ."name = '" . $this->name."', "
                ."email = '" . $this->email."', "
                ."phone = '" . $this->phone."', "
                ."website = '" . $this->website ."', "
                ."address = '" . $this->address . "' "
                ."WHERE id = " . $this->id . ";";
            if (!($ok = $connection->exec($sql)))
                return false;
            return true;
        }

        //method used to remove the object with this specific id
        public function remove(): bool
        {
            $connection = Connection::Instance();
            $sql = "DELETE FROM authority WHERE id = ".$this->id.";";
            if (!($ok = $connection->exec($sql)))
                return false;
            return true;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId($id): void
        {
            $this->id = $id;
        }

        public function getAddress()
        {
            return $this->address;
        }

        public function setAddress($address)
        {
            $this->address = $address;
        }

        public function getWebsite()
        {
            return $this->website;
        }

        public function setWebsite($website)
        {
            $this->website = $website;
        }

        public function getPhone()
        {
            return $this->phone;
        }

        public function setPhone($phone)
        {
            $this->phone = $phone;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
    }
?>