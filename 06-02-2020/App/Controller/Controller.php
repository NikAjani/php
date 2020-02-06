<?php

class Controller {

    public $model;

    function __construct($model) {
        $this -> model = $model;
    }

    function clicked(){

        $this -> model -> welcomeMsg .= '<br> You Click The Link';
    }
}

?>