<?php

namespace Core;

use Exception;

class BaseView {

    public static function render($view, $args = []) {

        extract($args);

        $file = "../App/Views/".$view;

        if(!is_readable($file)) 
            throw new Exception("View Not Found");
        
        require_once $file;
    }

}
