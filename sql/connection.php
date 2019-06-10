<?php
    try {
        $conn = new PDO("sqlsrv:server = tcp:crisiscontainmentservice.database.windows.net,1433; Database = CrisisContainmentService", "crisisadmin", "Crisis1234");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM crisis_user";
        foreach ($conn->query($sql) as $row) {
            print $row['id'] . "\t";
            print $row['firstname'] . "\t";
            print $row['email'] . "\t";
            print $row['lastname'] . "\n";
        }

    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
?>
