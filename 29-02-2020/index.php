<?php
namespace Ccc;

use Controller\Core\Front;

class Ccc {

    public static function getBaseUrl() {
        return $_SERVER['PHP_SELF'];
    }

    public static function getBaseDirectory($path = null) {

        if($path == null)
            return getcwd();
        
        return getcwd().DIRECTORY_SEPARATOR.$path;
    }

    public static function init() {
        Front::init();
    }
}

spl_autoload_register(function ($class) {
    
    $fileName = Ccc::getBaseDirectory($class).'.php';
    require_once $fileName;
});

echo '<pre>';
Ccc::init();