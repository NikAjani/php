<?php

namespace App\Controller\Admin;

use \App\Model\Admin\Home as HomeModel;
use \Core\BaseView as View;
use \App\config as Config;
use Exception;

class Home extends \Core\BaseControllers {

    function validation() {

        $error_array = [];


        $licenseReg = '/^[0-9a-zA-Z]{4,9}$/';
        $vehicleReg = '/^[a-z]{2}[0-9]{2}[a-z]{2}[0-9]{4}$/';

        foreach($_POST as $fieldName => $fieldValue) {

            if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) {

                $error_array = array_merge($error_array, [$fieldName => '* field is Requier']);
                
            }

            if($fieldName == 'timeSlote' || $fieldName == 'serviceCenter') {
                if($_POST[$fieldName] == "select")
                    $error_array = array_merge($error_array, [$fieldName => '* is Requried Please Selete']);
            }
            if($fieldName == 'licenseNumber'){
                if(!preg_match($licenseReg, $_POST[$fieldName]))
                    $error_array = array_merge($error_array, [$fieldName => 'Please Enter Valid License Number']);
            }
            if($fieldName == 'vehicleNumber'){
                if(!preg_match($vehicleReg, $_POST[$fieldName]))
                    $error_array = array_merge($error_array, [$fieldName => 'Please Enter Valid Vehicle Number']);
            }
                
        }
        
        return $error_array;
    }

    function indexAction() {
        $getService = new HomeModel();

        $serviceData = $getService->getAllService();

        View::renderTemplet('/Admin/index.html', ['serviceData' => $serviceData]);
    }

    function editStatusAction(){

        $chageStatus = new HomeModel();

        if($chageStatus->changeStatus($this->routeParam['id'])) 
            header("Location: ".Config::URL."/Admin");
        else
            throw new Exception("Error In Change Service Status");
    }

    function editAction() {

        $edit = new HomeModel();

        $editData = $edit->getData($this->routeParam['id']);
        
        if(isset($_POST['EditService'])) {

            $error_array = $this->validation($_POST);

            if($error_array == []){
                if($edit->editService($this->routeParam['id'], $_POST)) {
                    header("Location: ".Config::URL."/Admin");
                } else {
                    throw new Exception("Error in Update Service");
                }
            } else {
                View::renderTemplet('/Admin/editService.html', ['error' => $error_array, 'post' => $_POST]);
            }
        }

        View::renderTemplet('/Admin/editService.html', ['post' => $editData[0]]);
    }

    function deleteAction() {
        $deleteService = new HomeModel();

        if($deleteService->delteService($this->routeParam['id']))
            header("Location: ".Config::URL."/Admin");
        else
            throw new Exception('Error In Delete Service');
    }
}

?>