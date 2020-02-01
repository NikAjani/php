<?php

session_start();

require_once 'connection.php';

class Login {

    public $valid;

    function __construct() {
        
        $this -> valid = 1;
    }

    function validation($section, $fieldName){

        if(isset($_POST[$section][$fieldName]) && !empty($_POST[$section][$fieldName])){
            $this -> valid += 1;
            return $this -> valid;
        } else {
            $this -> valid = 0;
            return $this -> valid;   
        }
    }

    function loginNow(){

        if($this -> valid){

            $connect = new Connection();

            $loginData = $_POST['loginDetail'];

            $isLoad = $connect -> fetchRow(['userId', 'name'], 'login', $loginData);
            if($isLoad){
                $isLoad = $isLoad -> fetch_assoc();
                $_SESSION['user']['name'] = $isLoad['name'];
                $_SESSION['user']['id'] = $isLoad['userId'];
                $_SESSION['user']['loginTime'] = date("Y-m-d H:i:s", time());
                header('Location: index.php');
            } else {
                echo '<script>alert("Please Enter Valid User Name and Password");</script>';
            }

        }
    }

    function __destruct() {
        $this -> valid = 0;
    }

}

if(isset($_POST['login'])){
    $login = new Login();
    
}

?>