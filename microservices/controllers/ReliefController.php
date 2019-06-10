<?php
    require_once('../routines/ReliefCollector.php');
    $collector = ReliefCollector::Instance();
    $collector->run(1);
?>