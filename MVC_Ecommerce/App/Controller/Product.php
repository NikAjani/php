<?php

namespace App\Controller;
use \App\Model\User\ProductModel as ProductModel;
use \Core\BaseView as View;

class Product extends \Core\BaseControllers {

    function viewAction() {

        $product = new ProductModel();

        $catList = $product->getRow();

        View::renderTemplet('\User\Product\index.html', ['catList' => $catList]);
    }
}

?>