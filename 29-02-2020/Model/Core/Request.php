<?php

namespace Model\Core;

class Request {

    public function getPost($key = null, $value = null) {

        if($key == null){
            return $_POST;
        }

        if(!key_exists($key, $_POST)){
            return $value;
        }

        return $_POST[$key];
    }

    public function isPost() {

        if($_SERVER['REQUEST_METHOD'] == 'POST')   
            return true;
        
        return false;
    }

    public function getRequest($key = null, $value = null) {

        if($key == null){
            return $_REQUEST;
        }

        if(!key_exists($key, $_REQUEST)){
            return $value;
        }

        return $_REQUEST[$key];

    }

    public function getControllerName() {
        return $this->getRequest('c', 'Index');
    }

    public function getActionName() {
        return $this->getRequest('a', 'index');
    }

}


?>
