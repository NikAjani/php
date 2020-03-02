<?php

namespace Controller;
use Exception;
use Model\CategoryModel as CategoryModel;

class Category extends \Controller\Core\BaseController {

    protected $categories = null;
    protected $category = null;
    protected $parentCategory = null;

    public function __construct() {
        $this->setRequest();
        $this->setCategories();
    }

    public function setCategories() {

        $categoryModel = new CategoryModel();

        $this->categories = $categoryModel->fetchAll();

        return $this;

    }

    public function getCategories() {
        
        return $this->categories;
    }

    public function getParentCategory() {

        if($this->getCategories() == null)
            return [];
        
        $this->parentCategory = array_map(function ($row) {
            if($row->parentId == 0)
                return $row = [$row->catId, $row->name];
            else
                null;
        }, $this->getCategories());

        return array_filter($this->parentCategory);
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

        $categoryModel->load($this->getRequest()->getRequest('id'));
        $this->setCategory($categoryModel->getData());

        $categories = $this->getParentCategory();
        $action = "?c=category&a=save&id=".$this->getRequest()->getRequest('id');
        require_once "Views/category/add.php";

    }

    public function deleteAction() {
        $categoryModel = new CategoryModel();
        $categoryModel->catId = $this->getRequest()->getRequest('id');
        
        if($categoryModel->deleteCategory())
            $this->redirect('Category');
        throw new Exception("Error in Delete Category");
    }

    public function saveAction() {
        $categoryModel = new CategoryModel();

        if($this->getRequest()->getRequest('id')) {
            $categoryModel->setData($this->getRequest()->getPost());
            $categoryModel->catId = $this->getRequest()->getRequest('id');
            if($categoryModel->update())
                $this->redirect('Category');
            throw new Exception("Error in update Category");
        }
        
        if($categoryModel->setData($this->getRequest()->getPost())->insert())
            $this->redirect('Category');
    }   
}