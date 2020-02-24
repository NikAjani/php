<?php

require_once "Adapter.php";

$adapter = new Adapter();

$query = "SELECT * FROM `demo`";

$result = $adapter->fetchAll($query);

?>