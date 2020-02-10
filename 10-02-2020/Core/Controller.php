<?php

namespace Core;

abstract class Controllers {

    protected $routeParam = [];

    function __construct ($routeParam) {
        echo 'In Base Class';
        $this->routeParam = $routeParam;
    }
}

?>