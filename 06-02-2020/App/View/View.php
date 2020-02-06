<?php

class View {

    public $model;
    public $controller;

    function __construct($model, $controller) {
        
        $this -> model = $model;
        $this -> controller = $controller;
    }

    function printData() {

        echo  $this -> model -> welcomeMsg;
    }
    
}

?>