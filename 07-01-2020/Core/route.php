<?php

require_once '../App/Model/Model.php';

class Route{

    protected $route = [];
    protected $param = [];
    protected $model;
    protected $view;
    protected $controller;

    function __construct() {

        $this->model = new Model();
    }

    function addRoute($route, $param = []) {

        $route = preg_replace('/\//','\\/',$route);
        $route = preg_replace('/\{([a-z]+)\}/','(?P<\1>[a-z-]+)',$route);
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)',$route);
        $route = '/^'.$route.'$/i';
        
        $this->route[$route] = $param; 
        
    }

    function match($url) {

        foreach($this->route as $routeKey => $routeParam){

            if(preg_match($routeKey, $url, $match)){

                foreach($match as $key => $value){

                    if(is_string($key))
                        $routeParam[$key] = $value;
                }
                $this->param = $routeParam;
                return true;
            }
        }
        return false;
    }

    function getRoute(){

        return $this->param;
    }

    function getController($className, $functionName) {
        
        require_once '../App/Controller/'.$className.'.php';
        $this->controller = new $className($this->model);

        if(method_exists($this->controller, $functionName)){

            $this->controller->{$functionName}();
        } else {

            echo '<br><b>404 '.$className.' Class Not Found</b>';
            die;
        }
    }

    function getView($className, $functionName) {

        require_once '../App/View/'.$className.'.php';
        $this->view = new $className($this->model, $this->controller);

        if(method_exists($this->view, $functionName))
            $this->view->{$functionName}();
        
    }

    function __destruct() {
        
        $this->route = [];

    }
}

?>