<?php
    require_once('../../models/Alert.php');
    require_once('../../models/Authority.php');
    require_once('../../models/AuthorityAlert.php');

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
            $authority =  new Authority("ReliefWeb", "submit@reliefweb.int", "3175464231", "https://reliefweb.int/", "New York City", "");
            $authority->create();
            $dummy_content = file_get_contents("https://api.reliefweb.int/v1/disasters?offset=0&limit=10&preset=minimal");
            $dummy_json = json_decode($dummy_content);
            $limit = $dummy_json->totalCount;
            $bulk_size = 500;
            echo "Starting crawling process\n";
            $base_url = "https://api.reliefweb.int/v1/disasters?limit=".$bulk_size."&profile=full&offset=";
            for ($i=0; $i+$bulk_size-1<=$limit; $i+=$bulk_size)
            {
                $url = $base_url . $i;
                echo "Starting bulk with first element: " . $i . "\n";
                $content = file_get_contents($url);
                $json = json_decode($content);
                $this->processBulk($json, $connection, $authority->getId());
                echo "Ready bulk with first element: " . $i . "\n";
                $i++;
            }
        }

        private function processBulk($json, $connection, $authorityId)
        {
            $array = $json->data;
            $i = 0;
            foreach ($array as $disaster)
            {
                $this->processDisaster($disaster, $connection, $authorityId);
                echo "Ready: " . $i . " out of " . count($array) . "\n";
                $i++;
            }
        }

        private function processDisaster($json, $connection, $authorityId)
        {
            $fields = $json->fields;
            if (!isset($fields->name))
                return;
            $title = $fields->name;
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
            $alert = new Alert($title, $longitude, $latitude, $type, $description, $isSolved);
            if ($connection == null)
                return;
            try {
                $alert->create();
                $authorityAlert = new AuthorityAlert($authorityId, $alert->getId());
                $authorityAlert->create();
            }
            catch (PDOException $e) {
                return;
            }
        }
    }
?>