<?php
    require_once('../microservices/routines/ReliefCollector.php');
    $collector = ReliefCollector::Instance();
    $collector->run(null);
?>