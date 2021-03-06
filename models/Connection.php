<?php
    //Singleton class meant to handle a connection to the DB
    final class Connection {
        static private $connection;
        static private $url = "sqlsrv:server = tcp:crisiscontainmentservice.database.windows.net,1433; Database = CrisisContainmentService";
        static private $username = "crisisadmin";
        static private $password = "Crisis1234";

        public static function Instance()
        {
            self::$connection = null;
            if (self::$connection == null)
            {
                self::$connection = new PDO(self::$url, self::$username, self::$password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$connection;
        }
    }
?> 