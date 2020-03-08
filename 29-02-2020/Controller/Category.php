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

        
    }

    public function gridAction() {

        $this->renderTemplate('Category\Grid');
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    public function getCategory($key = null){
        return $this->category;
    }

    public function addAction() {

        $categoryModel = new CategoryModel();

        $status = $categoryModel->getStatusName();
        $this->renderTemplate('Category\Add', ['category' => $categoryModel]);
        
        /* $add = new \Block\Category\Add();
        $add->setController($this);
        $add->setCategory($categoryModel);
        echo $add->toHtml(); */

    }

    public function editAction() {

        try {

            $id = (int)$this->getRequest()->getRequest('id');
            
            if(!$id)
                throw new Exception("Invalid request.");
            
            $categoryModel = new CategoryModel();

            $category = $categoryModel->load($id);
            
            if($category == null)
                throw new Exception("No record found.");

            $this->renderTemplate('Category\Add', ['category' => $category]);
            
            /* $add = new \Block\Category\Add();
            $add->setController($this);
            $add->setCategory($category);
            echo $add->toHtml(); */
                

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
                if(!$categoryModel->load($id))
                    throw new Exception("Record not found.");
                    
            }
            
            $categoryModel->setData($this->getRequest()->getPost());
            if($categoryModel->save())
                $this->redirect('Category');
                

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }   
}