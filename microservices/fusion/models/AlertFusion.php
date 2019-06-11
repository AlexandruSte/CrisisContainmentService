<?php

    require_once("../../../models/Alert.php");

    class AlertFusion {

        private $alert;
        private $api_key = "...";
        private $table_id = "...";
        private $access_token = "...";

        public function __construct ($alert)
        {
            $this->alert = $alert;
        }

        private function httpPost($url, $fields)
        {
            $fields_string = http_build_query($fields);
            $authorization = "Authorization: Bearer " . $this->access_token;
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
            $sql = "INSERT INTO " . $this->table_id . " (Title, Location, Type, Description) VALUES ('"
                .$this->alert->getTitle()."', '"
                .$this->alert->getLatitude(). ", ".$this->alert->getLongitude()."', '"
                .$this->alert->getType()."', "
                .($this->alert->getDescription()==null?"NULL":"'".$this->alert->getDescription()."'").")";
            echo $sql;
            $this->httpPost($base_url, [
                'sql' => $sql,
                'key' => $this->api_key
            ]);
            return true;
            // secret: FMyw8gE4JZStorGWTq0cz5v_
        }

    }

?>