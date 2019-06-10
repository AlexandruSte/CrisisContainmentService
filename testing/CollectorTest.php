<?php
    require_once('../collector_microservice/models/ReliefCollector.php');
    $collector = ReliefCollector::Instance();
    $collector->run(null);
?>