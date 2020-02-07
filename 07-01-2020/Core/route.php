<?php

class Route{

    protected $route = [];
    protected $param = [];

    function addRoute($route, $param = []) {

        /* replace / to \ */
        $route = preg_replace('/\//','\\/',$route);
        /* replace or conver Controller */
        $route = preg_replace('/\{([a-z]+)\}/','(?P<\1>[a-z-]+)',$route);
        /* manage Id in url */
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)',$route);
        /* add start and end at regex ignore case */
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
}

?>