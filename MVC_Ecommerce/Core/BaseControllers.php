<?php

namespace Core;
use \App\config as Config;

session_start();

abstract class BaseControllers {

    protected $routeParam = [];

    function __construct ($routeParam) {
        $this->routeParam = $routeParam;
    }

    function before($methoName) {

        //echo $methoName;
        if(\in_array($methoName, ['loginAction', 'indexAction', 'viewAction', 'getCartAction','removeCartItemAction'])){
            return true;
        } else {
            if(isset($_SESSION['user'])){
                return true;
            } else
                header("Location: ".Config::URL."/user/login");
        }
    }   

    function after() {

    }
}

?>