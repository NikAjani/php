<?php

require_once "Controller/Core/Front.php";

class Ccc {

    public static function getBaseUrl() {
        return $_SERVER['PHP_SELF'];
    }

    public static function getBaseDir($path = null) {

        if($path == null)
            return getcwd();

        
        return getcwd().DIRECTORY_SEPARATOR.$path;
    }

    public static function init() {
        Front::init();
    }
}

echo '<pre>';
Ccc::init();
?>