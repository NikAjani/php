<?php

namespace App\Controller;

use App\Model\Product\ProductModel as ProductModel;
use Core\BaseView;

class Product extends \Core\BaseControllers {

    function indexAction() {

        $new = new ProductModel();
        $data = $new->getAllData();
        
        BaseView::renderTemplet('Product/index.html', ['data' => $data]);
    }

    function validation() {

        $error_array = [];

        foreach($_POST as $fieldName => $fieldValue) {

            if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) {

                switch($fieldName) {

                    case 'productName' :
                        $error_array = array_merge($error_array, [$fieldName => '* Product Name Requier']);
                        break;
                    case 'productPrice' :
                        $error_array = array_merge($error_array, [$fieldName => '* Product Price Requier']);
                        break;
                }
            }
                
        }
        
        return $error_array;
    }

    function addProductAction() {

        if(isset($_POST['submitProduct'])){

            $error_array = $this->validation();

            if($error_array == []){
                $postData = [];

                $postData = array_merge($postData, ['productName'=>$_POST['productName']]);
                $postData = array_merge($postData, ['productPrice'=>$_POST['productPrice']]);

                $addNew = new ProductModel();
                
                $lastId = $addNew->addData($postData);

                if($lastId)
                    $this->indexAction();
                else
                    echo 'Error in Product Insert';

            } else {
                BaseView::renderTemplet('Product/addProduct.html', ['add'=>'add', 'error' => $error_array]);
            }

        } else
            BaseView::renderTemplet('Product/addProduct.html', ['add'=>'add']);
    }

    function editAction() {

        $editProduct = new ProductModel();
        
        if(isset($this->routeParam['id'])){
            
            $editData = $editProduct->getRow($this->routeParam['id']);
            if($editData){

                BaseView::renderTemplet('Product/addProduct.html', ['editData' => $editData[0], 'id' => $this->routeParam['id']]);
                
            } else
                $this->indexAction();

        } else{
            
            if(isset($_POST['updateProduct'])){
                
                $updateData = [];
                $updateData = array_merge($updateData, ['productName' => $_POST['productName']]);
                $updateData = array_merge($updateData, ['productPrice' => $_POST['productPrice']]);

                if($editProduct->updateData($updateData, [$_POST['id']]))
                    $this->indexAction();
                else 
                    echo 'Error In Data Update';
            } else {
                $this->indexAction();
            }
        }
        
    }

    function deleteAction() {
        
        $deleteProduct = new ProductModel();

        if(isset($this->routeParam['id'])) {

            if($deleteProduct->deleteData(['productId' => $this->routeParam['id']])){
                $this->indexAction();
            } else 
                echo '<script>alert("Error in delete..");</script>';
        } else {
            echo '<script>alert("Please Click On Delete");</script>';
        }
    }
}

?>