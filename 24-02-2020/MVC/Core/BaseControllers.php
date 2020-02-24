<?php

namespace Core;

abstract class BaseControllers {

    protected $routeParam = [];

    function __construct ($routeParam) {
        $this->routeParam = $routeParam;
    }

    
    
}

?>