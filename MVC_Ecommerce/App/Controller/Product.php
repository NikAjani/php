<?php

namespace App\Controller;
use App\Model\User\CategoryModel as CatModel;
use Core\BaseView as View;
use App\config as Config;
use App\Model\User\ProductModel as ProductModel;

session_start();

class Product extends \Core\BaseControllers {

    function __construct($param) {
        parent::__construct($param);
        $getCategory = new CatModel();
        $this->category = $getCategory->getCategory('categoryName');
    }

    function viewAction() {

        $getProduct = new ProductModel();
        if(isset($this->routeParam['url'])){

            $productData = $getProduct->getProduct($this->routeParam['url']);

            View::renderTemplet('/User/Product/index.html', ['category' => $this->category, 'productData' => $productData[0]]);

        } else {
            header("Location: ".Config::URL);
        }
    }
}

?>