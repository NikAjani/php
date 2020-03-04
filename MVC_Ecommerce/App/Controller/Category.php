<?php

namespace App\Controller;
use \App\Model\User\CategoryModel as CatModel;
use \Core\BaseView as View;

class Category extends \Core\BaseControllers {

    function viewAction() {

        if(isset($this->routeParam['url'])) {

            $getCatData = new CatModel();
            $data = $getCatData->getCategoryData($this->routeParam['url']);
            View::renderTemplet('\User\Category\index.html', ['catData' => $data]);
        }
    }
}

?>