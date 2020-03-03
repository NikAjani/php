<?php

namespace Controller;

use Exception;
use Model\Category as CategoryModel;

class Category extends \Controller\Core\Base {

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
        return $this->category;
    }

    public function addAction() {

        $categories = $this->getParentCategory();
        $categoryModel = new CategoryModel();
        $this->setCategory($categoryModel);
        $status = $categoryModel->getStatusName();
        
        require_once "Views/category/add.php";
    }

    public function editAction() {

        try {

            $id = (int)$this->getRequest()->getRequest('id');
            if(!$id)
                throw new Exception("Invalid request.");
            
            $categoryModel = new CategoryModel();
            $categories = $this->getParentCategory();
            $status = $categoryModel->getStatusName();

            $category = $categoryModel->load($id);
            
            if($category == null)
                throw new Exception("No record found.");
            
            $this->setCategory($category);
            require_once "Views/category/add.php";
                

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function deleteAction() {
        $categoryModel = new CategoryModel();
        $categoryModel->catId = $this->getRequest()->getRequest('id');
        
        if($categoryModel->deleteCategory())
            $this->redirect('Category');
        throw new \Exception("Error in Delete Category");
    }

    public function saveAction() {

        try {

            $categoryModel = new CategoryModel();

            if(!$this->getRequest()->isPost())
                throw new Exception("Invalid Request");
            
            if($id = (int)$this->getRequest()->getRequest('id')) {
                $categoryModel->load($id);
            }
            
            $categoryModel->setData($this->getRequest()->getPost());
            if($categoryModel->save())
                $this->redirect('Category');
                

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }   
}