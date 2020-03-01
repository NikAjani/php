<?php

require_once 'Model/Core/Request.php';
require_once 'Model/CategoryModel.php';

class Category {

    protected $request = null;
    protected $categories = null;
    protected $category = null;
    protected $parentCategory =- null;


    public function __construct() {
        $this->setRequest();
        $this->setCategories();
    }

    public function setRequest(){
        $this->request = new Request();
        return $this;
    }

    public function getRequest() {
        return $this->request;
    }

    public function setCategories() {

        $categoryModel = new CategoryModel();

        $this->categories = $categoryModel->fetchAll();

        if($this->categories == null)
            return null;

        $this->categories = array_map(function (&$row) {
                return $row = $row->getData();
        }, $this->categories);

        return $this;

    }

    public function getParentCategory() {

        if($this->getCategories() == null)
            return [];
        
        $this->parentCategory = array_map(function ($row) {
            if($row['parentId'] == 0)
                return $row = [$row['catId'], $row['name']];
            else
                null;
        }, $this->getCategories());

        return array_filter($this->parentCategory);
    }

    public function getCategories() {
        
        return $this->categories;
    }

    public function indexAction() {
        
        require_once "Views/category/show.php";
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    public function getCategory($key = null){
        if($key == null)
            return $this->category; 
        return $this->category[$key];
    }

    public function addAction() {

        $categories = $this->getParentCategory();

        $action = "?c=category&a=save";
        
        require_once "Views/category/add.php";
    }

    public function editAction() {

        $categoryModel = new CategoryModel();

        $data = $categoryModel->load($this->getRequest()->getRequest('id'));
        $this->setCategory($data->getData());

        $categories = $this->getParentCategory();
        $action = "?c=category&a=save&id=".$this->getRequest()->getRequest('id');
        require_once "Views/category/add.php";

    }

    public function deleteAction() {
        $categoryModel = new CategoryModel();
        $categoryModel->catId = $this->getRequest()->getRequest('id');

        if($categoryModel->deleteCategory())
            header("Location: ".Ccc::getBaseUrl()."?c=category");
        throw new Exception("Error in Delete Category");
    }

    public function saveAction() {
        $categoryModel = new CategoryModel();

        if($this->getRequest()->getRequest('id')) {
            $categoryModel->setData($this->getRequest()->getPost());
            $categoryModel->catId = $this->getRequest()->getRequest('id');
            if($categoryModel->update())
                header("Location: ".Ccc::getBaseUrl()."?c=category");
            throw new Exception("Error in update Category");
        }
        
        if($categoryModel->setData($this->getRequest()->getPost())->insert())
            header("Location: ".Ccc::getBaseUrl()."?c=category");
    }
}