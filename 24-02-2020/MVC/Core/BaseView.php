<?php

namespace Core;

use Exception;

class BaseView {

    public static function render($view, $args = []) {

        $args = extract($args, EXTR_SKIP);

        $file = "../App/Views/".$view;

        if(!is_readable($file)) 
            throw new Exception("View Not Found");
        
        require_once $file;
    }



    /* public static function renderTemplet($view, $args = []) {

        static $twig = null;

        if($twig == null) {

            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);
        
        }
        echo $twig->render($view, $args);
    } */
}

?>