<?php

namespace Block\Core;

use Model\Core\Message as MessageModel;

class Message extends Template {

    protected $nameSpace = null;

    public function __construct()
    {
        $this->setTemplate('core/message.php');   
        $this->nameSpace(); 
    }

    public function setNameSpace($nameSpace = null) {
        
        if($nameSpace == null) {
            $nameSpace = 'admin';
        }
        $this->nameSpace = $nameSpace;
    }
        
    public function getNameSpace() {
        return $this->nameSpace;
    }

    public function getMessage($key = null) {

        $messageModel = new MessageModel();
        $messageModel->getSession()->setNameSpace($this->getNameSpace());
        
        if($key == null)
            return $messageModel->getMessage();
             
        return $messageModel->getMessage($key); 

    }
}