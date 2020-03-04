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

        $actionArray = ['getCategorysAction', 'loginAction', 'indexAction', 'viewAction', 'getCartAction','removeCartItemAction'];
        //echo $methoName;
        if(\in_array($methoName, $actionArray)){
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