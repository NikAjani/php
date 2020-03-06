<?php

namespace Controller\Core;

abstract class Base {

    protected $request = null;

    public function redirect($controller = null, $action = null, $param = []) {

        if($action == null)
            $action = 'index';

        header("Location: ".$this->getUrl($action, $controller, $param));
    }

    public function setRequest() {
        $this->request = new \Model\Core\Request;
        return $this;
    }

    public function getRequest() {
        return $this->request;
    }

    public function getBaseUrl() {
        return \Ccc::getBaseUrl();
    }

    public function getImage($imageName, $path = "") {

        $baseImage = str_replace('index.php' , '',\Ccc::getBaseUrl());
        
        return $baseImage.$path.$imageName;
    }

    public function getUrl($action = null, $controller = null, $params = []) {

        $parameters = [
            'c' => $controller,
            'a' => $action
        ];

        if($action == null) {
            $parameters['a'] = $this->getRequest()->getActionName();
        }
        
        if($controller == null) {
            $parameters['c'] = $this->getRequest()->getControllerName();
        }

        $parameters = array_merge($parameters, array_filter($params));

        return $this->getBaseUrl().'?'.http_build_query($parameters);
        
    }
}