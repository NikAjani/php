<?php

namespace Core;

class Router {

    protected $route = [];
    protected $param = [];
    
    function __construct() {

        $this->add('',['controller'=>'Home', 'action'=>'Index']);
        $this->add('{controller}/');
        $this->add('{controller}');
        $this->add('{controller}/{action}');
        $this->add('{controller}/{id:\d+}/{action}');
    }

    public function add($route, $param = []) {

        $route = preg_replace('/\//','\\/',$route);
        $route = preg_replace('/\{([a-z]+)\}/','(?P<\1>[a-z-]+)',$route);
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)',$route);
        $route = '/^'.$route.'$/i';
        
        $this->route[$route] = $param;
        
    }

    public function dispatch($url) {

        if($this->matchUrl($url)) {

            $className = $this->converClassName($this->param['controller']);
            $className = "App\Controller\\$className";
                
            if(@class_exists($className)) {
                
                $controller = new $className($this->param);

                $methodName = $this->converMethodName($this->param['action']);

                if(@method_exists($controller, $methodName)) {

                    if(isset($this->param['id']))
                        $controller->{$methodName}($this->param['id']);
                    else 
                        $controller->{$methodName}();

                } else {
                    echo '<br><b>404 Method Not Found</b><br>';
                }

            } else {
                echo '<br><b>404 Page Not Found</b><br>';
            }           
        }
    }

    protected function matchUrl($url) {

        foreach($this->route as $routeKey => $routeParam){

            if(preg_match($routeKey, $url, $match)){

                foreach($match as $key => $value){

                    if(is_string($key))
                        $routeParam[$key] = $value;
                }

                $this->param = $routeParam;
                if(!isset($this->param['action']))
                    $this->param['action'] = 'index';
                
                return true;
            }
        }
        return false;
    }

    protected function converClassName($className) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $className)));
    }

    protected function converMethodName($methodName) {
        return lcfirst($this->converClassName($methodName));
    }

}

?>