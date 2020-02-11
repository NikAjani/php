<?php

class Home {
    
    public $model;

    function __construct($model) {
        
        $this->model = $model;    
    }

    function clicked(){

        $this->model->modelData = 'You Click The Link';
    }
}

?>