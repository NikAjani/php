<?php

namespace Model\Core;

class Message {

    protected const SUCCESS= 1;
    protected const FAIL = 0;
    protected const NOTICE = 2;
    protected $session = null;

    public function __construct() {
        $this->setSession();
    }

    public function setSession($session = null) {
        
        if($session == null) {
            $session = new session();
        }
        $this->session = $session;
        return $this;
    }
        
    public function getSession() {
        return $this->session;
    }

    public function setMessage($message, $code = 1)
    {
        $msg = [];
        switch ($code) {

            case $this::FAIL:
                $msg = ['message' => ["fail" => $message]];
                break;
            
            case $this::SUCCESS:
                $msg = ['message' => ["succese" => $message]];
                break;

            case $this::NOTICE:
                $msg = ['message' => ["notice" => $message]];
                break;
        }

        $this->getSession()->setSession($msg);
        return $this;
    }

    public function getMessage ($key = null) {

        if($key == null){
            $message = $this->getSession()->getSession()['message'];
            $this->clearMessage();
            return $message;
        }

        if(!key_exists($key, $this->getSession()->getSession()['message']))
            return null;

        $message = $this->getSession()->getSession()['message'];
        $this->clearMessage($key);
        return $message;
    }

    public function clearMessage($key = null) {

        if($key == null){
            
            unset($_SESSION[$this->getSession()->getNameSpace()]);
            return $this;
        }

        unset($_SESSION[$this->getSession()->getNameSpace()]['message'][$key]);
        return $this;
    }

}