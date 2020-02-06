<?php

require_once '../App/Model/Model.php';
require_once '../App/Controller/Controller.php';
require_once '../App/View/View.php';

class Route {

    public $model;
    public $controller;
    public $view;

    function __construct() {
        
        $this -> model = new Model();
        $this -> controller = new Controller($this -> model);
        $this -> view = new View($this -> model, $this -> controller);
    }

    function callController($functionName){

        if(method_exists($this -> controller, $functionName)){
            $this -> controller -> {$functionName}();
        } else {
            echo '<b>404 Method Not Found</b>';
            die;
        }
    }

    function callView(){

        $this -> view -> printData();
    }

}

?>