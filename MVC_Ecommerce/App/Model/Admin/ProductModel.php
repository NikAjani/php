<?php

namespace App\Model\Admin;
use App\config as Config;

class ProductModel extends \App\Model\Connection {

    function addData($insertData) {

        $data = $this->prepareData($insertData);

        if($id = $this->insertData('product', $data)){

            $data = ['productId' => $id, 'catId' => $insertData['category']];
            
            return $this->insertData('product_category', $data);
        }
    }

    function getData() {
        return $this->getAll('product');
    }

    function getEditProduct($id) {

        $colName = "P.productName, P.sku, P.UrlKey, P.status, P.description, P.shortDescription, P.price, P.stock, C.categoryName";

        $table = ["product P", "product_category PC", "category C"];

        $on = ["P.productId = PC.productId", "c.catId = PC.catID"];

        $whereCondition = ["P.productId = '$id'", "C.catId = PC.catId"];

        return  $this->join($colName, $table, 'INNER JOIN', $on, $whereCondition);

    }

    function upadateProduct($uodateData, $id) {
        
        $editData = $this->prepareData($uodateData);

        return $this->update($editData, 'product', ['productId' => $id]);
    }

    function getRow($colName, $tableName, $whereCondition) {

        return $this->fetchRow($colName, $tableName, $whereCondition);
    }

    function deleteProduct($id) {

        return $this->deleteRow('product', ['productId' => $id]);
    }

    function prepareData($data) {
        $preparedData = [];

        $preparedData = array_merge($preparedData, ['productName' => $data['productName']]);
        $preparedData = array_merge($preparedData, ['sku' => $data['sku']]);
        $preparedData = array_merge($preparedData, ['UrlKey' => $this->generateUrl($data['productName'])]);
        $preparedData = array_merge($preparedData, ['image' => $this->uploadFile('productImage')]);
        $preparedData = array_merge($preparedData, ['status' => $data['status']]);
        $preparedData = array_merge($preparedData, ['description' => $data['description']]);
        $preparedData = array_merge($preparedData, ['shortDescription' => $data['shortDescription']]);
        $preparedData = array_merge($preparedData, ['price' => $data['price']]);
        $preparedData = array_merge($preparedData, ['stock' => $data['stock']]);

        return $preparedData;

    }

    private function generateUrl($name) {
        return str_replace(' ', '-', $name);
    }

    function uploadFile($name){
        var_dump($_FILES);
        echo '<br>';
        
        if(isset($_FILES[$name]) && !empty($_FILES[$name]['name'])){

            echo $fileName = $_FILES[$name]['name'];
            echo $tempLocation = $_FILES[$name]['tmp_name'];
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