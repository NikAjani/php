<?php

namespace App\Controller;
use \Core\BaseView as View;
use \App\Model\Home as HomeModel;

class Home extends \Core\BaseControllers {

    function validation($data) {
        $error_array = [];
        foreach($data as $key => $value) {
            if(!isset($data[$key]) || empty($data[$key])){
                $error_array = array_merge($error_array, [$key => "* Field is required"]);
            }
            if($key == "status" && $data['status'] == "select") {
                $error_array = array_merge($error_array, [$key => "Please Select Status"]);
            }
        }

        return $error_array;
    }

    function indexAction() {

        $homeModel = new HomeModel();
        $catData = $homeModel->getAllCategory();

        View::render('index.phtml', ['catData' => $catData]);
    }

    function addUserAction() {

        $homeModel = new HomeModel();
        $category = $homeModel->getCategoryName();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $error_array = $this->validation($_POST);
            
            if($error_array != []){
                View::render('register.phtml', ['error' => $error_array, 'editData' => $_POST]);
            } else{ 
                
                if($homeModel->addUser($_POST))
                    echo 'Inserted';
            }

        }else
            View::render('register.phtml', ['categoryName' => $category]);
    }

    function editAction() {
        $homeModel = new HomeModel();
        $category = $homeModel->getCategoryName();

        $editData = $homeModel->getRow($this->routeParam['id']);
        
        View::render('register.phtml', ['editData' => $editData, 'categoryName' => $category]);
    }
}

?>