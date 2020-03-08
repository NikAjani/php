<?php

use Model\Core\Message;

class Ccc {

    public static function getBaseUrl() {
        return $_SERVER['PHP_SELF'];
    }

    public static function getBaseDirectory($path = null) {

        if($path == null)
            return getcwd();
        
        return getcwd().DIRECTORY_SEPARATOR.$path;
    }

    public static function loadConfig() {
        
        $config = require_once "etc/Config.php";

        self::regiter('config', $config);
    }

    public static function regiter($key, $value) {

        $GLOBALS[$key] = $value;
    }

    public static function getRegistry($key = null) {

        if($key == null)
            return $GLOBALS;
        
        if(!key_exists($key, $GLOBALS))
            return null;

        return $GLOBALS[$key];
        
    }

    public static function init() {
        
        // $message = new Message();
        // $message->getSession()->setNameSpace('admin');
        // // $message->setMessage('Add Success');
        // $message->setMessage('Add Fail', 0);
        // print_r($message->getMessage());
        
        self::loadConfig();
        \Controller\Core\Front::init();
    }

}

spl_autoload_register(function ($class) {
    
    $fileName = $class.'.php';
    require_once $fileName;
});

echo '<pre>';
Ccc::init();
