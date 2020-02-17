<?php

namespace Core;

class BaseView {

    public static function renderTemplet($view, $args = []) {

        static $twig = null;

        if($twig == null) {

            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);
            
            $loginUser = (isset($_SESSION['user'])) ? $_SESSION['user'] : "" ;
            
            $twig->addGlobal('loginUser', $loginUser);
            //$twig->addGlobal('cat', 'Parent Category');
        }
        echo $twig->render($view, $args);
    }
}

?>