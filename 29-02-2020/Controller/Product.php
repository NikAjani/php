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

        $productModel = new ProductModel();
        
        $query = "SELECT  * 
        FROM `product` as P 
        INNER JOIN `product_category` as PC 
        ON PC.productId = P.productId 
        WHERE P.productId = {$this->getRequest()->getRequest('id')}";

        $productModel->fetchRow($query);

        $this->setProduct($productModel->getData());
        $action = "?c=product&a=save&id=".$this->getRequest()->getRequest('id');

        require_once 'Views/product/add.php';

    }

    public function deleteAction(){

        $productModel = new ProductModel();
        $productModel->productId = $this->getRequest()->getRequest('id');
        if($productModel->delete())
            $this->redirect("Porduct");

        throw new \Exception("Error Delete Product");
    }

    public function saveAction() {
        
        $productModel = new ProductModel();
        $productCategory = new ProductCategory();

        try {
            
            if(!$this->getRequest()->isPost())
                throw new Exception("Invalid request.");
            
            $productModel->setData($this->getRequest()->getPost('product'));
            print_r($this->getRequest()->getPost('product_category')['category']);
            if($productModel->save()) {
                $productCategory->productId = $productModel->productId;
                $productCategory->catId = $this->getRequest()->getPost('product_category')['category'];

                if($productCategory->save())
                    $this->redirect('Product');
                
                throw new Exception("Error in insert product_category data.");
                
            }
                

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        /* $productModel = new ProductModel();
        $productCategory = new ProductCategory();

        $productModel->setData($this->getRequest()->getPost());
        $productModel->unsetData('category');

        if($this->getRequest()->getRequest('id')){
           
            $productModel->productId = $this->getRequest()->getRequest('id');

            if($productModel->update()){

                $query = "SELECT * FROM `{$productCategory->getTableName()}` WHERE `productId` = {$this->getRequest()->getRequest('id')}";

                $productCategory->fetchRow($query);

                $productCategory->catId = $this->getRequest()->getPost('category');
                $productCategory->productId = $this->getRequest()->getRequest('id');

                if($productCategory->update())
                    $this->redirect("Product");
            }

            throw new \Exception("Error Upadte Product");
        }

        if($productModel->insert()) {
            $productCategory->catId = $this->getRequest()->getPost('category');
            $productCategory->productId = $productModel->getData('productId');
            if($productCategory->insert())
                $this->redirect("Product");
        } */
    }

}