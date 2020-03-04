<?php
session_start();

require_once '../Core/Router.php';

require_once '../vendor/autoload.php';

set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

$router->dispatch($_SERVER['QUERY_STRING']);

?>