<?php

namespace App\Controller;
use Core\BaseView as View;
use App\Model\User\HomeModel as HomeModel;
use App\Model\User\CategoryModel as CatModel;

session_start();

class Home extends \Core\BaseControllers {

    function __construct($param) {
        parent::__construct($param);
        $getCategory = new CatModel();
        $this->category = $getCategory->getCategory('categoryName');

    }

    public static function getCategorys() {

        $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
        $twig = new \Twig\Environment($loader);

        return $twig->render("/category.html", ['category'=>'abc']);
    }

    function viewAction() {

        $getCMS = new HomeModel();

        if(isset($this->routeParam['url']))
            $content = $getCMS->getCMS($this->routeParam['url']);
        else
            $content = $getCMS->getCMS('home');
        
        View::renderTemplet('/User/Home/index.html', ['category' => $this->category, 'content' => $content[0]]);
    }
}

?>