<?php

namespace App\Controller\Admin;

use Core\BaseView as View;
use App\config as Config;
use App\Model\Admin\ProductModel as ProductModel;
use Exception;

class Product extends \Core\BaseControllers {

    function __construct($routeParam) {
        parent::__construct($routeParam);
        $cat = new ProductModel();
        $this->category = $cat->getRow('catId, categoryName', 'category', ['parentId !' => 0]);
    }

    function indexAction() {

        $viewProduct = new ProductModel();

        $productData = $viewProduct->getData();

        view::renderTemplet('\Admin\Product\index.html', ['productData' => $productData]);
    }

    function validation() {

        $error_array = [];

        foreach($_POST as $fieldName => $fieldValue) {

            if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) 
                $error_array = array_merge($error_array, [$fieldName => '* field is Requier']);
                
        }
        
        return $error_array;
    }

    function addProductAction() {
        
        $addProduct = new ProductModel();

        if(isset($_POST['AddProduct'])){

            $error_array = $this->validation($_POST);

            if($error_array == []) {

            } else {

            }

            if($addProduct->addData($_POST))
                header("Location: ".Config::URL."/Admin/Product/");
            else
                throw new Exception("Error in Insert Product");
        } else {

            //$category = $addProduct->getRow('catId, categoryName', 'category', ['parentId !' => 0]);
            
            view::renderTemplet('\Admin\Product\addProduct.html', ['add'=>'add', 'category' => $this->category]);
        }
        
    }


    function editAction() {

        $edit = new ProductModel();
        if(isset($_POST['UpdateProduct'])){

            if($edit->upadateProduct($_POST, $this->routeParam['id'])){
                header("Location: ".Config::URL."/Admin/Product/");
            } else {
                 
                throw new Exception("Error in Product Update");
            }
            
        } else {

            $editData = $edit->getEditProduct($this->routeParam['id']);
            
            //$category = $edit->getRow('catId, categoryName', 'category', ['parentId !' => 0]);

            view::renderTemplet('\Admin\Product\addProduct.html', ['category'=> $this->category, 'editData' => $editData[0]]);
        }
    }

    function deleteAction() {

        $delete = new ProductModel();

        if($delete->deleteProduct($this->routeParam['id']))
            header("Location: ".Config::URL."/Admin/Product/");
    }
}

?>