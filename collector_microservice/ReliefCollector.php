<?php
    require_once ('../models/Alert.php');

    final class ReliefCollector {

        static private $collector;

        public static function Instance()
        {
            self::$collector = null;
            if (self::$collector == null)
                self::$collector = new ReliefCollector();
            return self::$collector;
        }

        public function run($connection) {
            echo "Initializing collector\n";
            echo "Starting crawling process\n";
            $base_url = "https://api.reliefweb.int/v1/disasters?limit=100&profile=full&offset=";
            for ($i=0; $i+99<=3000; $i+=100)
            {
                $url = $base_url . $i;
                echo "Starting bulk with first element: " . $i . "\n";
                $content = file_get_contents($url);
                $json = json_decode($content);
                $this->processBulk($json, $connection);
                echo "Ready bulk with first element: " . $i . "\n";
                $i++;
            }
        }

        private function processBulk($json, $connection)
        {
            $array = $json->data;
            $i = 0;
            foreach ($array as $disaster)
            {
                $this->processDisaster($disaster, $connection);
                echo "Ready: " . $i . " out of " . count($array) . "\n";
                $i++;
            }
        }

        private function processDisaster($json, $connection)
        {
            $fields = $json->fields;
            if (!isset($fields->primary_country->location))
                return;
            $longitude = $fields->primary_country->location->lon;
            $latitude = $fields->primary_country->location->lat;
            if (!isset($fields->type))
                return;
            $type = $fields->type[0]->name;
            if (isset($fields->description))
                $description = substr(str_replace('\'', '', $fields->description), 0, 1000);
            else
                $description = null;
            if (!isset($fields->status))
                return;
            $isSolved = $fields->status == "past"?1:0;
            $alert = new Alert($longitude, $latitude, $type, $description, $isSolved);
            if ($connection == null)
                return;
            try {
                $alert->create();
            }
            catch (PDOException $e) {
                return;
            }
        }
    }
?>