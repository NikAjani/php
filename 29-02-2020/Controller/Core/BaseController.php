<?php

namespace Controller\Core;
use \Ccc\Ccc;

abstract class BaseController {

    protected $request = null;

    public function redirect($controller, $action = null) {
        if($action == null)
            header("Location: ".Ccc::getBaseUrl()."?c={$controller}");
        header("Location: ".Ccc::getBaseUrl()."?c={$controller}&a={$action}");
    }

    public function setRequest() {
        $this->request = new \Model\Core\Request;
        return $this;
    }

    public function getRequest() {
        return $this->request;
    }
}