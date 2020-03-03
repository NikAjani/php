<?php

class MyException extends Exception {

    public function __construct($message, $code = 0, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        $this->printMessage();
        return "";
    }

    public function printMessage() {
        echo '<h1>Fatal Error.</h1>';
        echo "<h3>Message : ".$this->getMessage()."</h3>";
        echo "<h3> Stack Trace : ".print_r($this->getTrace())." </h3>";
    }

}