<?php

namespace App\Controller;
use Core\BaseView as View;
use App\Model\User\HomeModel as HomeModel;
use App\Model\User\CategoryModel as CatModel;

session_start();

class Home extends \Core\BaseControllers {

    public function getCategorysAction() {

        $getCategory = new CatModel();
        $this->category = $getCategory->getCategory('categoryName');

        echo json_encode($this->category);
    }

    function viewAction() {

        $getCMS = new HomeModel();

        if(isset($this->routeParam['url']))
            $content = $getCMS->getCMS($this->routeParam['url']);
        else
            $content = $getCMS->getCMS('home');
        
        View::renderTemplet('/User/Home/index.html', [ 'content' => $content[0]]);
    }
}

?>