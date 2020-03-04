<?php

require_once "Model/Core/Request.php";
require_once "Controller/Product.php";

class Front {

    public static function init() {
        
        $request = new Request();

        echo $request->getRequest('c');
        echo $request->getRequest('a');

        $controllerName = ucfirst($request->getRequest('c'));

        if(!class_exists($controllerName)) {
            throw new Exception("Class does not exists.");
        }
            
        $controller = new $controllerName();

        $actionName = $request->getRequest('a').'Action';

        if(!method_exists($controller, $actionName)){
            throw new Exception('Method does not exists.');
        }

        $controller->$actionName();

        print_r($controller);

    }
}