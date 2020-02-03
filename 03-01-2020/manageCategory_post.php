<?php

class ManageCategory{
    public $valid = 1;

    function __construct(){
        
        $this -> valid = 0;    
    }

    function getValue($fieldName){
        
        return (isset($_POST[$fieldName]) ? $_POST[$fieldName] : '');
    }

    function validation($fieldName){

        if(isset($_POST[$fieldName]) && !empty($_POST[$fieldName])){
            $this -> valid += 1;
            return true;
        } else {
            $this -> valid = 0;
            return false;
        }
    }

    function __destruct() {
        $this -> valid = 0;
    }
}

?>