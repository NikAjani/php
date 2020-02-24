<?php

require_once '../Core/Router.php';

spl_autoload_register(function ($class) {
    
    $root = dirname(__DIR__);
    $fileName = $root.'/'.str_replace('\\', '/', $class).'.php';

    if(is_readable($fileName))
        require_once $fileName;
});

$router = new Core\Router();

$router->dispatch($_SERVER['QUERY_STRING']);

?>