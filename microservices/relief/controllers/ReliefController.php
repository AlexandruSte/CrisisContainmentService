<?php
    require_once('../models/ReliefCollector.php');
    $collector = ReliefCollector::Instance();
    $collector->run(1);
?>