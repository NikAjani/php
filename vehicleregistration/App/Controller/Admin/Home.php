<?php

namespace App\Controller\Admin;

use \App\Model\Admin\Home as HomeModel;
use \Core\BaseView as View;

class Home extends \Core\BaseControllers {

    function indexAction() {
        $getService = new HomeModel();

        $serviceData = $getService->getAllService();

        View::renderTemplet('/Admin/index.html', ['serviceData' => $serviceData]);
    }

    function editStatusAction(){

        print_r($this->routeParam);
    }
}

?>