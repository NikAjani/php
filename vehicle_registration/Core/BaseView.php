<?php

namespace Core;

class BaseView {

    public static function renderTemplet($view, $args = []) {

        static $twig = null;

        if($twig == null) {

            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);
        
        }
        echo $twig->render($view, $args);
    }
}

?>