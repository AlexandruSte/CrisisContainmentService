<?php
    include "../models/Connection.php";
    try {
        $conn = Connection::Instance();
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
