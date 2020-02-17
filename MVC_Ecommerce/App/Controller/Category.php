<?php

namespace App\Controller;
use \App\Model\User\CategoryModel as CatModel;
use \Core\BaseView as View;

class Category extends \Core\BaseControllers {

    function __construct($param) {
        
        parent::__construct($param);

        $getCategory = new CatModel();

        $this->category = $getCategory->getCategory();
    }

    function viewAction() {

        if(isset($this->routeParam['url'])) {

            $getCatData = new CatModel();
            $data = $getCatData->getCategoryData($this->routeParam['url']);
            View::renderTemplet('\User\Category\index.html', ['category' => $this->category, 'catData' => $data]);
        }
    }
}

?>