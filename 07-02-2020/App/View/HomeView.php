<?php

class HomeView {

    public $model;
    public $controller;

    function __construct($model, $controller) {
        
        $this->model = $model;
        $this->controller = $controller;

    }

    function index() {

        echo $this->model->modelData;
    }

    function clicked() {

        echo $this->model->modelData;
    }
}

?>