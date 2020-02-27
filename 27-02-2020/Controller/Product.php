<?php

require_once 'Model/ProductModel.php';

class Product {

    protected $productModel = null;

    public function __construct() {
        $this->setProductModel();
    }

    public function setProductModel() {
        $this->productModel = new ProductModel();
        return $this;
    }

    public function getProductModel() {
        return $this->productModel;
    }

    public function indexAction() {
        $productModel = $this->getProductModel();
        $collection = $productModel->fetchAll();
        print_r($collection);
        //require_once 'Views/product/show.php';
    }

    public function addAction() {
        
        require_once 'Views/product/add.php';
    }

    public function saveAction() {
        

        $productModel = $this->getProductModel();
        if($productModel->insert())
            header("Location: ".Ccc::getBaseUrl()."?c=product");
    }

}