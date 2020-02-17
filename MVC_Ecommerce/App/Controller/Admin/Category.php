<?php

namespace App\Controller\Admin;

use Core\BaseView as View;
use App\Model\Admin\CategoryModel as CategoryModel;
use App\config as Config;
use Exception;

class Category extends \Core\BaseControllers {

    function indexAction() {

        $category = new CategoryModel();

        $catData = $category->getAllData('category');
        
        View::renderTemplet('/Admin/Category/index.html', ['catData' => $catData]);
    }

    function validation() {

        $error_array = [];

        foreach($_POST as $fieldName => $fieldValue) {

            if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) {

                if($fieldName == 'parentId')
                    continue;

                $error_array = array_merge($error_array, [$fieldName => '* field is Requier']);
            }
                
        }
        
        return $error_array;
    }

    function addCategoryAction() {
        
        $category = new CategoryModel();
        $parentCat = $category->getRow('catId, categoryName', ['parentId' => 0]);

        if(isset($_POST['AddCategory'])){

            $error_array = $this->validation($_POST);

            if($error_array == []) {

                if($category->addCategory($_POST))
                    header("Location: ".Config::URL."/admin/category/");
                else
                    throw new Exception("Error In Category Insert");

            } else {

                View::renderTemplet('/Admin/Category/add_category.html', ['add' => 'add', 'error' => $error_array, 'parentCategory'=> $parentCat, 'editData' => $_POST]);
            }

            
        } else {

            View::renderTemplet('/Admin/Category/add_category.html', ['add' => 'add', 'parentCategory'=> $parentCat]);
        }

        
    }

    function editAction() {

        $editCategory = new CategoryModel();
        $parentCat = $editCategory->getRow('catId, categoryName', ['parentId' => 0]);
        $editData = $editCategory->getRow('*', ['catId' => $this->routeParam['id']]);

        if(isset($_POST['UpdateCategory'])){

            $error_array = $this->validation();

            if($error_array == []){

                if($editCategory->updateCategory($_POST, ['catId' => $this->routeParam['id']]))
                    header("Location: ".Config::URL."/admin/category/");
                else
                    throw new Exception("Error In Category Update");

            } else {
                View::renderTemplet('/Admin/Category/add_category.html', ['editData' => $_POST, 'parentCategory'=> $parentCat, 'error' => $error_array]);
            }

            
        } else
            View::renderTemplet('/Admin/Category/add_category.html', ['editData' => $editData[0], 'parentCategory'=> $parentCat]);
    }

    function deleteAction() {

        $deleteCat = new CategoryModel();

        if($deleteCat->deleteCategory($this->routeParam['id']))
            header("Location: ".Config::URL."/admin/category/");
        else
            throw new Exception("Error In Category Delete");
    }
}

?>