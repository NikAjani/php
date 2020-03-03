<?php

namespace Controller;
use Model\Product as ProductModel;
use Model\ProductCategory;

class Product extends \Controller\Core\Base {

    protected $products = null;
    protected $product = null;
    protected $categoryName = null;

    public function __construct() {
        $this->setRequest();
        $this->setCategoryName();
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

    public function setCategoryName() {

        $productModel = new ProductModel();
        $this->categoryName = $productModel->getCategoryName();
        return $this;
    }

    public function getCategoryName() {
        return $this->categoryName;
    }

    public function indexAction() {
        $productModel = new ProductModel();
        $collection = $productModel->fetchAll();
        
        $this->setProducts($collection);
        require_once 'Views/product/show.php';
    }

    public function addAction() {
        $product = new ProductModel();
        $this->setProduct($product);
        require_once 'Views/product/add.php';
    }

    public function editAction() {

        $product = new ProductModel();

        try {

            if(!(int)$this->getRequest()->getRequest('id'))
                throw new Exception("Id not found.");

            $product = $this->setProduct($product->getProduct());

        } catch (Exception $e) {

            echo $e->getMessage();
        }

        require_once 'Views/product/add.php';

    }

    public function deleteAction(){

        if(!$this->getRequest()->isPost()) {
            throw new Exception("Invalid Request");
                
        }

        $deleteIdArray = $this->getRequest()->getPost('delId');
        
        if($deleteIdArray == [])
            $this->redirect('Product');

        $productModel = new ProductModel();

        foreach($deleteIdArray as $deleteId) {
            $productModel->productId = $deleteId;
            if(!$productModel->delete())
                throw new Exception("Error in delete record.");    
        }

        $this->redirect('Product');


    }

    public function saveAction() {
        
        $productModel = new ProductModel();
        $productCategory = new ProductCategory();

        try {
            
            if(!$this->getRequest()->isPost())
                throw new Exception("Invalid request.");

            if($id = (int)$this->getRequest()->getRequest('id')) {
                
                $productModel->load($id);
                echo $query = "SELECT * FROM `{$productCategory->getTableName()}` WHERE `productId` = {$id};";
                $productCategory->fetchRow($query);
            }
            
            $productModel->setData($this->getRequest()->getPost('product'));
            
            if($productModel->save()) {

                $productCategory->productId = $productModel->productId;
                $productCategory->catId = $this->getRequest()->getPost('product_category')['category'];

                if($productCategory->save())
                    $this->redirect('Product');
                
                throw new Exception("Error in save product_category data.");
            }
                
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

}