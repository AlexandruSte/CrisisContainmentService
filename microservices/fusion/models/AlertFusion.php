<?php

    //require_once("../../../models/Alert.php");

    class AlertFusion {

        private $alert;
        private static $api_key = "AIzaSyC-S2acn9xQZYFSlvdl7xAS8LbPAhUYDCQ";
        private static $table = "1VK-po2pNqHs7ZUHHBsNH15QsvBTzTdrN6eOS1B3j";
        private static $access_token = "ya29.GlsmB3w9SDpGMCM6qAs20w2QIqxEN8iUB-MlTgHJHumsSAG6r-CiwsPW5th1o2TsuPchaVIu6OUyHNWvW3xy2_q-PDZ22gQxEd8lPfkE0Jns1XziBRjRuXf6nE1s";


        public function __construct ($alert)
        {
            $this->alert = $alert;
        }

        private static function httpPost($url, $fields)
        {
            $fields_string = http_build_query($fields);
            $authorization = "Authorization: Bearer " . self::$access_token;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', $authorization ));
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            echo $result;
        }

        public function create()
        {
            $base_url = "https://www.googleapis.com/fusiontables/v2/query";
            $sql = "INSERT INTO " . self::$table . " (Id, Title, Location, Type, Description) VALUES ('"
                .$this->alert->getId()."', '"
                .$this->alert->getTitle()."', '"
                .$this->alert->getLatitude(). ", ".$this->alert->getLongitude()."', '"
                .$this->alert->getType()."', "
                .($this->alert->getDescription()==null?"NULL":"'".$this->alert->getDescription()."'").")";
            self::httpPost($base_url, [
                'sql' => $sql,
                'key' => self::$api_key
            ]);
            return true;
        }

        public function delete()
        {
            $base_url = "https://www.googleapis.com/fusiontables/v2/query";
            if ($this->alert->getIsSolved() == 1)
                $sql = "DELETE FROM " . sef::$table . "WHERE id = " . $this->alert->getId();
            self::httpPost($base_url, [
                'sql' => $sql,
                'key' => self::$api_key
            ]);
            return true;
        }

        public static function clear()
        {
            $base_url = "https://www.googleapis.com/fusiontables/v2/query";
            $sql = "DELETE FROM " . self::$table;
            self::httpPost($base_url, [
                'sql' => $sql,
                'key' => self::$api_key
            ]);
        }

    }

?>