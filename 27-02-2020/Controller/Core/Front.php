<?php

require_once "Model/Core/Request.php";

class Front {

    public static function init() {

        $request = new Request();

        $controllerName = ucfirst($request->getRequest('c'));
        require_once 'Controller/'.$controllerName.'.php';

        if(!class_exists($controllerName))
            throw new Exception('Class does not exists');
         
        $controller = new $controllerName();

        $methodName = $request->getRequest('a').'Action';

        if($methodName == 'Action')
            $methodName = 'indexAction';

        if(!method_exists($controller, $methodName))
            throw new Exception('Method does not exists '.$methodName);

        $controller->$methodName();
        
    }
}