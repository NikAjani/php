<?php

namespace Core;

class BaseView {

    /* public static function render($view, $args = []) {

        $args = extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";

        if(is_readable($file))
            require_once $file;
        else
            echo '<b>404 '.$file.' Not Found</b>';
    } */

    public static function renderTemplet($view, $args = []) {

        static $twig = null;

        if($twig == null) {

            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);

            //$loader = new \Twig_Loader_Filesystem('../App/Views');
        }

        echo $twig->render($view, $args);
    }
}

?>