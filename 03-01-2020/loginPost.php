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

            $loginData = ['emailId' => $_POST['loginDetail']['userName'], 'password' => $_POST['loginDetail']['password']];

            $isLoad = $connect -> fetchRow(['userId', 'firstName'], 'user', $loginData);
            if($isLoad){
                $isLoad = $isLoad -> fetch_assoc();
                $_SESSION['userName'] = $isLoad['firstName'];
                $_SESSION['id'] = $isLoad['userId'];
                $_SESSION['loginTime'] = date("Y-m-d H:i:s", time());
                header('Location: blog_post.php');
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