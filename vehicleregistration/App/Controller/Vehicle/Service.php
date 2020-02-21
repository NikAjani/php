<?php

namespace App\Controller\Vehicle;

use \Core\BaseView as View;
use \App\Model\Vehicle\Service as ServiceModel;
use \App\config as Config;

session_start();

class Service extends \Core\BaseControllers {

    function validation() {

        $error_array = [];


        $licenseReg = '/^[0-9a-zA-Z]{4,9}$/';
        $vehicleReg = '/^[a-z]{2}[0-9]{6}/';

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

        $service = new ServiceModel();

        $serviceData = $service->getServiceData();

        View::renderTemplet("\User\Vehicle\index.html", ['userData' => $serviceData]);
    }

    function registerAction() {

        $service = new ServiceModel();

        if(isset($_POST['RegisterService'])) {
            $error_array = $this->validation($_POST);
            
            if($error_array == []){
                

                if($service->addService($_POST))
                    header("Location: ".Config::URL."/Vehicle/Service/index");
                else {

                    //echo "<script>alert('Your Service Already Register');</script>";
                    //header("Location: ".Config::URL."/Vehicle/Service/register");
                }

            } else 
                View::renderTemplet("\User\Vehicle\serviceRegister.html", ['error' => $error_array, 'post' => $_POST]);
        } else
            View::renderTemplet("\User\Vehicle\serviceRegister.html");
    }
}

?>