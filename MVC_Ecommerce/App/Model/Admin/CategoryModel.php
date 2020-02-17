<?php

namespace App\Model\Admin;
use App\config as Config;
use Exception;

class CategoryModel extends \App\Model\Connection {

    function addCategory($insertData) {
        
        $inserData = $this->prepareData($insertData);

        return $id = $this->insertData('category', $inserData);
    }

    function getAllData($tableName) {

        return $this->getAll($tableName);

    }

    function getRow($colName, $whereCondition) {

        return $this->fetchRow($colName, 'category', $whereCondition);
    }

    function updateCategory ($data, $whereCondition) {

        $editData = $this->prepareData($data);
        
        return $this->update($editData, 'category', $whereCondition);
    }

    function deleteCategory($id) {
        
        $isParent = $this->fetchRow('catId', 'category', ['parentId' => $id]);
        
        if($isParent){

            if($this->deleteRow('category', ['catId' => $id])){

                if($this->deleteParentCategoryProduct($isParent)) {
                    
                    return $this->deleteRow('category', ['parentId' => $id]);

                } else 
                    throw new Exception("Error In Child Category Delete");

            } else
                throw new Exception("Error In delete Parent Category");

        } else{

            if($this->deleteChildCategoryProduct(['catId' => $id])){

                return $this->deleteRow('category', ['catId' => $id]);
            } else 
                throw new Exception("Error In Category Delete");
        }
    }

    private function deleteChildCategoryProduct($catId) {

        $prodId = $this->fetchRow('productId', 'product_category', ['catId' => $catId['catId']]);
        
        if($prodId) {
            
            for($cnt = 0; $cnt < count($prodId); $cnt++){

                if($this->deleteRow('product', ['productId' => $prodId[$cnt]['productId']]))
                    echo 'DONE';
                else 
                    throw new Exception("Error In Product Delete In Category");
            }
        } else
            return true;
        

        return true;
    }

    private function deleteParentCategoryProduct($catId) {

        for($i = 0; $i < sizeof($catId); $i++) {

            $prodId = $this->fetchRow('productId', 'product_category', ['catId' => $catId[$i]['catId']]);
            
            if($prodId) {
                
                for($cnt = 0; $cnt < count($prodId); $cnt++){

                    if($this->deleteRow('product', ['productId' => $prodId[$cnt]['productId']]))
                        echo 'DONE';
                    else 
                        throw new Exception("Error In Product Delete In Category");
                }
            } else
                return true;
            
        }

        return true;
    }

    function prepareData($data) {
        $preparedData = [];

        $preparedData = array_merge($preparedData, ['categoryName' => $data['categoryName']]);
        $preparedData = array_merge($preparedData, ['UrlKey' => $this->generateUrl($data['categoryName'])]);
        $preparedData = array_merge($preparedData, ['image' => $this->uploadFile('catImage')]);
        $preparedData = array_merge($preparedData, ['status' => $data['status']]);
        $preparedData = array_merge($preparedData, ['description' => $data['description']]);
        $preparedData = array_merge($preparedData, ['parentId' => $data['parentId']]);

        return $preparedData;

    }

    private function generateUrl($name) {
        return str_replace(' ', '-', $name);
    }

    function uploadFile($name){
        var_dump($_FILES);
        echo '<br>';
        
        if(isset($_FILES[$name]) && !empty($_FILES[$name]['name'])){

            $fileName = $_FILES[$name]['name'];
            $tempLocation = $_FILES[$name]['tmp_name'];
            $extension = strtolower(substr($fileName, strpos($fileName, '.')+1));
    
            if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png'){
                $location = config::IMAGEPATH.'/Images/';
                if(move_uploaded_file($tempLocation, $location.$fileName)) {
                    return $fileName;
                } else {
                    echo '<script>alert("Error in File uploads");</script>';
                    return NULL;
                }
            } else {
                echo '<script>alert("file should be JPG or PNG Only");</script>';
            }
            
        } else {
            echo '<script>alert("Please Select File")</script>';
        }
    }

}

?>