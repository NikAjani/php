<?php

namespace Controller;
use Model\Product\Image;
use Model\ProductCategory;
use Model\Product as ProductModel;

class Product extends \Controller\Core\Base {

    protected $products = null;
    protected $product = null;
    protected $categoryName = null;
    protected $productImages = null;

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

    public function setProductImages($productImages) {
        $this->productImages = $productImages;
        return $this;
    }

    public function getProductImages() {
        return $this->productImages;
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

    public function mediaAction() {

        try {

            if(!$this->getRequest()->getRequest('id'))
            throw new Exception("Invalid request.");

            $product = new ProductModel();
            $productImage = new Image();

            if(!$product->load($this->getRequest()->getRequest('id')))
                throw new Exception("No record found.");

            $this->setProduct($product);
            $query = "SELECT * FROM `{$productImage->getTableName()}` WHERE `productId` = {$product->productId}";
            $this->setProductImages($productImage->fetchAll($query));

            require_once "Views/product/media.php";

        } catch (Exception $e) {

            echo $e->getMessage();
        }
        
    }

    public function saveImageAction() {
        try {

            if(!$this->getRequest()->isPost())
                throw new Exception("Invalid request.");

            if(!$this->getRequest()->getRequest('id'))
                throw new Exception("Invalid request.");

            $product = new ProductModel();

            if(!$product->load($this->getRequest()->getRequest('id')))
                throw new Exception("No record found.");

            if(!key_exists('image', $_FILES))
                throw new Exception("Images not set");
                
            if($product->uploadImage($_FILES['image']))
                $this->redirect('Product', "media", ['id' => $product->productId]);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function updateMediaAction() {
        
        try {

            if(!$this->getRequest()->getRequest('id'))
                throw new Exception("Invalid request.");

            $product = new ProductModel();
            $productImage = new Image();

            if(!$product->load($this->getRequest()->getRequest('id')))
                throw new Exception("No record found.");

            $this->setProduct($product);
            
            $query = "SELECT * FROM `{$productImage->getTableName()}` WHERE `productId` = {$product->productId}";
            $productImages = $productImage->fetchAll($query);

            if(!$productImages)
                throw new Exception("No record found");
            
            $imageIds = $this->getRequest()->getPost('explode');

            foreach($productImages as $row) {

                if(in_array($row->imageId, $imageIds))
                    $row->explodeFromMedia = 1;
                else
                    $row->explodeFromMedia = 0;

                if(!$row->save())
                    throw new Exception("Error in image record save");
            }

            if($thumnail = $this->getRequest()->getPost('thumnail')) {
                $product->thumnail = $thumnail;
            }

            if($base = $this->getRequest()->getPost('base')) {
                $product->base = $base;
            }

            if($small = $this->getRequest()->getPost('small')) {
                $product->small = $small;
            }

            if($product->save())
                $this->redirect('Product', "media", ['id' => $product->productId]);
                

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function saveAction() {
        
        $productModel = new ProductModel();
        $productCategory = new ProductCategory();

        try {
            
            if(!$this->getRequest()->isPost())
                throw new Exception("Invalid request.");

            if($id = (int)$this->getRequest()->getRequest('id')) {
                
                if(!$productModel->load($id))
                    throw new Exception("No record Found");
                    
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