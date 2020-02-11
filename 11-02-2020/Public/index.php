<?php

require_once '../Core/Router.php';

require_once '../vendor/autoload.php';

$router = new Core\Router();

$router->dispatch($_SERVER['QUERY_STRING']);

?>