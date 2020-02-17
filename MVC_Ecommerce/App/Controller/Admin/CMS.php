<?php 

namespace App\Controller\Admin;

use \Core\BaseView as View;
use App\Model\Admin\CMSModel as CMSModel;
use App\config as Config;
use Exception;

class CMS extends \Core\BaseControllers {

    function indexAction() {

        $view = new CMSModel();

        $cmsData = $view->getData();

        View::renderTemplet('/Admin/CMS/index.html', ['cmsData' => $cmsData]);
    }

    function validation() {

        $error_array = [];

        foreach($_POST as $fieldName => $fieldValue) {

            if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) 

                $error_array = array_merge($error_array, [$fieldName => '* field is Requier']);
                
        }
        
        return $error_array;
    }

    function addCMSAction() {

        if(isset($_POST['AddCMS'])){

            $error_array = $this->validation($_POST);

            if($error_array == []) {

                $addCMS = new CMSModel();

                if($addCMS->addCMS($_POST))
                    header("Location: ".Config::URL."/Admin/CMS/");
                else 
                    throw new Exception("Error In CMS Add");
            
            } else 
                View::renderTemplet('/Admin/CMS/addCMS.html', ['add'=>'add', 'error' => $error_array]);
            
        } else 
            View::renderTemplet('/Admin/CMS/addCMS.html', ['add'=>'add']);
    }

    function editAction() {

        $editCMS = new CMSModel();
        $editData = $editCMS->getRow('*', $this->routeParam['id']);

        if(isset($_POST['UpdateCMS'])){

            $error_array = $this->validation($_POST);

            if($error_array == []) {

                if($editCMS->updateCMS($_POST, $this->routeParam['id']))
                    header("Location: ".Config::URL."/Admin/CMS/");
                else 
                    throw new Exception("Error In Update CMS");
                
            } else 
                View::renderTemplet('/Admin/CMS/addCMS.html', ['error' => $error_array, 'editData' => $_POST]);
        }

        View::renderTemplet('/Admin/CMS/addCMS.html', ['editData' => $editData[0]]);
    }

    function deleteAction() {
        
        $delete = new CMSModel();

        if($delete->deleteCMS($this->routeParam['id']))
            header("Location: ".Config::URL."/Admin/CMS/");
        else 
            throw new Exception("Error in Delete CMS");
    }

}

?>