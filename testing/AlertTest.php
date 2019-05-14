<?php
    require_once("../models/Alert.php");
    $alert = new Alert(3.14, 3.14, 'test', 'test', 0);
    $alert->create();
?>