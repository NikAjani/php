<?php

require_once '../Core/route.php';

$route = new Route();

$route->addRoute('',['controller'=>'Home', 'action'=>'index']);
$route->addRoute('{controller}');
$route->addRoute('{controller}/{action}');
$route->addRoute('admin/{controller}/{action}');
$route->addRoute('{controller}/{id:\d+}/{action}');
$route->addRoute('admin/{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];


if($route->match($url)){
    echo '<pre>';
    print_r($route->getRoute());
    echo '</pre>';
} else {
    echo '<b>404 Not Found</b>';
}
?>