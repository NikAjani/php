<?php

namespace App\Controller;

use \Core\BaseView as View;
use \App\Model\User\User as UserModel;
use \App\config as Config;

class User extends \Core\BaseControllers {

    function validation() {

        $error_array = [];

        foreach($_POST as $fieldName => $fieldValue) {

            if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) {

                $error_array = array_merge($error_array, [$fieldName => '* field is Requier']);
                
            }

            if($fieldName == 'confirmPassword') {

                if($_POST[$fieldName] != $_POST['password'])
                    $error_array = array_merge($error_array, [$fieldName => 'Password And Confrim Password Not Match']);
            }
                
        }
        
        return $error_array;
    }

    function loginAction() {

        if(isset($_POST['login'])) {
            
            $valid = $this->validation($_POST);

            if($valid == []) {
                
                $login = new UserModel();

                if($name = $login->userLogin($_POST)){
                    
                    $_SESSION['user'] = $name[0];
                        header("Location: ".Config::URL."/Vehicle/Service/userGrid");

                } else{
                    echo "<script>alert('Please Try Again');</script>";
                    View::renderTemplet('/User/login/login.html'); 
                }

            } else
                View::renderTemplet('/user/login/login.html', [ 'error' => $valid]);

        } else {
            
            View::renderTemplet('/User/login/login.html');
        }
    }

    function logoutAction() {

        if(session_destroy()){
            header("Location: ".Config::URL);
        }
    }

    function addUserAction() {

        if(isset($_POST['Register'])){
            $error_array = $this->validation($_POST);
            if($error_array == []){
                $addUser = new UserModel();

                if($addUser->addUser($_POST)){
                    header("Location: ".Config::URL);
                }
            } else {
                View::renderTemplet('/User/login/register.html', ['error' => $error_array, 'post' => $_POST]);
            }
        } else
            View::renderTemplet('/User/login/register.html');
    }

}

?>