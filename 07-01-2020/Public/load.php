<?php

require_once '../Core/route.php';

$route = new Route();

$route->addRoute('',['controller'=>'Home', 'action'=>'index']);
$route->addRoute('{controller}/{action}');

// $route->addRoute('{controller}');
// $route->addRoute('admin/{controller}/{action}');
// $route->addRoute('{controller}/{id:\d+}/{action}');
// $route->addRoute('admin/{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];


// $url = $_SERVER['REQUEST_URI'];
// $url = substr($url, 12);
// echo $url;

if($route->match($url)){
    
    $data = $route->getRoute();
    
    if($data['action'] != 'index')
        $route->getController($data['controller'],$data['action']);
    
    $route->getView($data['controller'].'View',$data['action']);

} else {

    echo '<b>404 Not Found</b>';
}

?>