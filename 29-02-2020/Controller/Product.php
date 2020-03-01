<?php

require_once 'Model/ProductModel.php';
require_once 'Model/Core/Request.php';
require_once 'Category.php';

class Product {

    protected $request = null;
    protected $products = null;
    protected $product = null;


    public function __construct() {
        $this->setRequest();
        $this->category = new Category();
    }

    public function setRequest(){
        $this->request = new Request();
        return $this;
    }

    public function getRequest() {
        return $this->request;
    }

    public function setProducts($products){
        $this->products = $products;
        return $this;
    }

    public function getProducts() {
        return $this->products;
    }

    public function setProduct($product){
        $this->product = $product;
        return $this;
    }

    public function getProduct($name = null) {
        if($name == null)
            return $this->product;
        return $this->product[$name];
    }

    public function indexAction() {
        $productModel = new ProductModel();
        $collection = $productModel->fetchAll();

        $collection = array_map(function (&$row) {
            return $row = $row->getData();
        }, $collection);

        $this->setProducts($collection);
        require_once 'Views/product/show.php';
    }

    public function addAction() {

        $categories = $this->category->getParentCategory();
        
        $action = "?c=product&a=save";
        require_once 'Views/product/add.php';
    }

    public function editAction() {

        $productModel = new ProductModel();
        $categories = $this->category->getParentCategory();
        
        $data = $productModel->load($this->getRequest()->getRequest('id'));
        $this->setProduct($data->getData());
        $action = "?c=product&a=save&id=".$this->getRequest()->getRequest('id');

        require_once 'Views/product/add.php';

    }

    public function deleteAction(){

        $productModel = new ProductModel();
        $productModel->productId = $this->getRequest()->getRequest('id');
        if($productModel->delete())
            header("Location: ".Ccc::getBaseUrl()."?c=product");

        throw new Exception("Error Delete Product");
    }

    public function saveAction() {

        $productModel = new ProductModel();
        print_r($_GET);

        if($this->getRequest()->getRequest('id')){
           
            $data = $productModel->setData($this->getRequest()->getPost());
            $data->productId = $this->getRequest()->getRequest('id');

            if($data->update())
                header("Location: ".Ccc::getBaseUrl()."?c=product");

            throw new Exception("Error Upadte Product");
        }

        if($productModel->setData($this->getRequest()->getPost())->insert())
            header("Location: ".Ccc::getBaseUrl()."?c=product");
        
    }

}