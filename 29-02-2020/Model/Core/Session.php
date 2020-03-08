<?php

namespace Model\Core;
session_start();

class Session {

    protected $nameSpace = null;

    public function __get($name) {

        return $_SESSION[$this->getNameSpace][$name];
    }

    public function setNameSpace($nameSpace) {
        
        $this->nameSpace = $nameSpace;
        return $this;
    }
        
    public function getNameSpace() {

        return $this->nameSpace;
    }

    public function setSession($session) {

        $_SESSION[$this->getNameSpace()] = $session;  
        
        return $this;
    }
        
    public function getSession() {

        if(!key_exists($this->getNameSpace(), $_SESSION))
            return null;

        return $_SESSION[$this->getNameSpace()];
    }
}