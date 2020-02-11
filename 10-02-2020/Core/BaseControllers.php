<?php

namespace Core;

abstract class BaseControllers {

    protected $routeParam = [];

    function __construct ($routeParam) {
        echo 'In Base Class';
        $this->routeParam = $routeParam;
    }
}

?>