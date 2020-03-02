<?php

namespace Controller;
use Exception;
use Model\ProductModel as ProductModel;

class Product extends \Controller\Core\BaseController {

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

        $query = "SELECT `catId`, `name` 
        FROM `category` WHERE `parentId` != 0";

        $this->categoryName = $productModel->fetchAll($query);

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
        $action = "?c=product&a=save";
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

        throw new Exception("Error Delete Product");
    }

    public function saveAction() {

        $productModel = new ProductModel();
        $productModel->setData($this->getRequest()->getPost());
        $catId = $productModel->getData('category');
        $productModel->unsetData('category');

        if($this->getRequest()->getRequest('id')){
           
            $productModel->productId = $this->getRequest()->getRequest('id');

            if($productModel->update()){

                $productId = $this->getRequest()->getRequest('id');

                $productModel->setTableName('product_category');
                $productModel->setPrimaryKey('id');

                $query = "SELECT * FROM `{$productModel->getTableName()}` WHERE `productId` = $productId";
                $productModel->fetchRow($query);

                $productModel->catId = $catId;
                $productModel->productId = $productId;

                if($productModel->update())
                    $this->redirect("Product");
            }

            throw new Exception("Error Upadte Product");
        }

        if($productModel->insert()) {
            $productId = $productModel->getData('productId');
            $productModel->unsetData();
            $productModel->catId = $catId;
            $productModel->productId = $productId;
            $productModel->setTableName('product_category');
            $productModel->setPrimaryKey('id');
            if($productModel->insert())
                $this->redirect("Product");
        }
    }

}