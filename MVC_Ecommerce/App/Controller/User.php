<?php

namespace App\Controller;

use \Core\BaseView as View;
use \App\Model\User\User as UserModel;
use \App\Model\User\CategoryModel as CatModel;
use \App\config as Config;

class User extends \Core\BaseControllers {

    function __construct($param) {
        
        parent::__construct($param);

        $getCategory = new CatModel();

        $this->category = $getCategory->getCategory('categoryName');
    }

    function validation() {

        $error_array = [];

        foreach($_POST as $fieldName => $fieldValue) {

            if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) {

                $error_array = array_merge($error_array, [$fieldName => '* field is Requier']);
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
                    
                    $_SESSION['user'] = $name[0]['firstName'];

                    if($name[0]['userType'] == 'A')
                        header("Location: ".Config::URL."/Admin/Dashboard/grid");
                    else
                        header("Location: ".Config::URL."/");

                } else{
                    echo "<script>alert('Please Try Again');</script>";
                    View::renderTemplet('/User/login/login.html'); 
                }

            } else
                View::renderTemplet('/user/login/login.html', ['category'=>$this->category, 'error' => $valid]);

        } else {
            
            View::renderTemplet('/User/login/login.html', ['category'=>$this->category]);
        }
    }

    function logoutAction() {

        if(session_destroy()){
            header("Location: ".Config::URL);
        }
    }

    function addUserAction() {

    }

}

?>