<?php

namespace Controller\Core;

use Model\Core\Request;

class Front {

    public static function init() {

        $request = new Request();

        require_once "Views/index.php";

        $controllerName = ucfirst($request->getControllerName());
        $controllerName = "\Controller\\".$controllerName;

        if(!class_exists($controllerName))
            throw new \Exception('Class does not exists');
         
        $controller = new $controllerName();

        $methodName = $request->getActionName().'Action';

        if($methodName == 'Action')
            $methodName = 'indexAction';

        if(!method_exists($controller, $methodName))
            throw new \Exception('Method does not exists '.$methodName);

        $controller->$methodName();
        
    }
}