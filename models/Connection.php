<?php
    //Singleton class meant to handle a connection to the DB
    final class Connection {
        static private $connection;
        static private $url = "sqlsrv:server = tcp:crisiscontainmentservice.database.windows.net,1433; Database = CrisisContainmentService";
        static private $username = "crisisadmin";
        static private $password = "...";

        public static function Instance()
        {
            self::$connection = null;
            if (self::$connection == null)
            {
                $connection = new PDO(self::$url, self::$username, self::$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        }
    }
?> 