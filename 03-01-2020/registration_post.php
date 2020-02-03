<?php

require_once 'connection.php';

class RegisterNow {

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
    
    function validateAdditionalField($fieldName) {

        switch($fieldName){

            case 'emailId':
                if(!filter_var($_POST[$fieldName],FILTER_VALIDATE_EMAIL)){
                    $this -> valid = 0;
                    return false;
                } else 
                    return true;

            case 'confirmPassword':
                if($_POST['password'] != $_POST[$fieldName]){
                    $this -> valid = 0;
                    return false;
                } else 
                    return true;

            case 'phoneNo':
                if(strlen($_POST[$fieldName]) != 10){
                    $this -> valid = 0;
                    return false;
                } else  
                    return true;
        }
    }

    function registerUser(){

        if($this -> valid > 0){
            echo 'register';

            $connect = new Connection();

            $inserData = $this -> prepareData($_POST);

            //print_r($inserData);

            echo $isInsert = $connect -> load('emailId','user',['emailId' => $_POST['emailId']]);

            if(!$isInsert){
                
                $id = $connect -> insertData('user',$inserData);

                if($id){
                    echo '<script>alert("User Register..");</script>';
                    header('Location: blog_post.php');
                } else
                    echo '<script>alert("Error in User Register..");</script>';
            
            } else {
                echo '<script>alert("Email Id Already Register");</script>';
            }
        }
    }

    function prepareData($inserData){
        $preparedData = [];
        $preparedData = array_merge($preparedData, ['prefix' => $inserData['prefix']]);
        $preparedData = array_merge($preparedData, ['firstName' => $inserData['firstName']]);
        $preparedData = array_merge($preparedData, ['lastName' => $inserData['lastName']]);
        $preparedData = array_merge($preparedData, ['phoneNo' => $inserData['phoneNo']]);
        $preparedData = array_merge($preparedData, ['emailId' => $inserData['emailId']]);
        $preparedData = array_merge($preparedData, ['password' => md5($inserData['password'])]);
        $preparedData = array_merge($preparedData, ['information' => $inserData['information']]);

        return $preparedData;
    }

    function __destruct() {
        
        $this -> valid = 0;
    }
}

if(isset($_POST['register'])){

    $register = new RegisterNow();
}
?>