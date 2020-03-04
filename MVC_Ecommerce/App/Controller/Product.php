<?php

namespace App\Controller;
use Core\BaseView as View;
use App\config as Config;
use App\Model\User\ProductModel as ProductModel;

session_start();

class Product extends \Core\BaseControllers {

    function viewAction() {

        $getProduct = new ProductModel();
        if(isset($this->routeParam['url'])){

            $productData = $getProduct->getProduct($this->routeParam['url']);

            View::renderTemplet('/User/Product/index.html', [ 'productData' => $productData[0]]);

        } else {
            header("Location: ".Config::URL);
        }
    }
}

?>