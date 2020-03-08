<?php

namespace Block\Core;

class Template
{

	protected $template = null;
    protected $controller = null;
    
    public function __call($name, $argument)
    {

        $methodName = 'set'.ucfirst($name);

        if(method_exists($this, $methodName)) {
            
            if(!$argument)
                return $this->$methodName($argument);
            else
                return $this->$methodName($argument[0]);
        }else
            throw new \Exception("Method not exist in block.");
            
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    public function toHtml()
    {
    	ob_start();

    	require "Views".DIRECTORY_SEPARATOR.$this->getTemplate();

    	$content = ob_get_clean();

    	return $content;
    }
}