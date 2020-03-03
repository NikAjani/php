<?php

namespace Controller;

class Index extends \Controller\Core\Base {

    public function __construct() {
        $this->setRequest();
    }

    public function indexAction() {
        
        require_once "Views/index.php";
   }
   
}
