<?php

require_once '../core/rout.php';

$route = new Route();

echo '<a href="?action=clicked">Click Here</a><br><Br>';

if(isset($_GET['action']) && !empty($_GET['action'])) {
    $route -> callController($_GET['action']);
}

$route -> callView();

?>