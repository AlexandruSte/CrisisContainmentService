<?php

    require_once("../../../models/Alert.php");

    class AlertFusion {

        private $alert;
        private $api_key = "AIzaSyC-S2acn9xQZYFSlvdl7xAS8LbPAhUYDCQ";
        private $past_table_id = "1VK-po2pNqHs7ZUHHBsNH15QsvBTzTdrN6eOS1B3j";
        private $current_table_id = "1PfXQpnlFSwbcu63QjUMiiwufmTJzZwDzTjjCXXU4";
        private $access_token = "ya29.GlsmBxMkBJ1B63wJNrM4vJInpMTj0TbDt45SLnCJHwMD1ceEkmoXBTOt5MjSLopjv8V9GKaISlmS-85MY1HBtm4U5OXrPTPABEAZh1kYhTqb7juoigca1U4ymqSk";


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
            if ($this->alert->getIsSolved() == 1)
                $table = $this->past_table_id ;
            else
                $table = $this->current_table_id;
            $sql = "INSERT INTO " . $table . " (Id, Title, Location, Type, Description) VALUES ('"
                .$this->alert->getId()."', '"
                .$this->alert->getTitle()."', '"
                .$this->alert->getLatitude(). ", ".$this->alert->getLongitude()."', '"
                .$this->alert->getType()."', "
                .($this->alert->getDescription()==null?"NULL":"'".$this->alert->getDescription()."'").")";
            $this->httpPost($base_url, [
                'sql' => $sql,
                'key' => $this->api_key
            ]);
            return true;
            // secret: FMyw8gE4JZStorGWTq0cz5v_
        }

    }

?>