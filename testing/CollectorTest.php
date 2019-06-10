<?php
    require_once('../collector_microservice/ReliefCollector.php');

    $collector = ReliefCollector::Instance();
    $collector->run(1);

?>