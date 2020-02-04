<?php

require_once 'connection.php';

class ManageCategory{
    public $valid = 1;

    function __construct(){
        
        $this -> valid = 0;    
    }

    function getValue($fieldName){
        
        return (isset($_POST[$fieldName]) ? $_POST[$fieldName] : '');
    }

    function validation($fieldName){

        if(isset($_POST[$fieldName]) && !empty($_POST[$fieldName])){
            echo $fieldName;
            $this -> valid += 1;
            return true;
        } else {
            $this -> valid = 0;
            return false;
        }
    }

    function addCategory(){
        $catData = $this -> prepareData($_POST);
        print_r($catData);
        echo $imagePath = $this -> uploadFile('catImage1', 'jpg');
        $catData = array_merge($catData, ['imagePath' => $imagePath]);

        $connct = new Connection();

        $id = $connct -> insertData('category',$catData);

        if($id){
            echo 'insert';
            header('Location: categoryGrid.php');
        }
        else
            echo 'Error';
    }

    function prepareData($inserData){
        $preparedData = [];
        $preparedData = array_merge($preparedData, ['parentId' => $inserData['parentCat']]);
        $preparedData = array_merge($preparedData, ['title' => $inserData['title']]);
        $preparedData = array_merge($preparedData, ['metaName' => $inserData['metaName']]);
        $preparedData = array_merge($preparedData, ['catUrl' => $inserData['catUrl']]);
        $preparedData = array_merge($preparedData, ['catContant' => $inserData['catContant']]);

        return $preparedData;
    }

    function uploadFile($name, $fileExtension){
        var_dump($_FILES);
        echo '<br>';
        
        if(isset($_FILES[$name]) && !empty($_FILES[$name]['name'])){
            echo '<br>';
            echo $fileName = $_FILES[$name]['name'];
            echo '<br>';
            $tempLocation = $_FILES[$name]['tmp_name'];
            echo $extension = strtolower(substr($fileName, strpos($fileName, '.')+1));
    
            if($extension === $fileExtension){
                $location = 'uploads/';
                if(move_uploaded_file($tempLocation, $location.$fileName)) {
                    return 'http://localhost/Cybercom/php/exam/uploads/'.$fileName;
                } else {
                    echo '<script>alert("Error in File uploads");</script>';
                    return NULL;
                }
            } else {
                echo '<script>alert("file should be '.$fileExtension.' Only");</script>';
            }
            
        } else {
            echo '<script>alert("Please Select File")</script>';
        }
    }

    function __destruct() {
        $this -> valid = 0;
    }
}

if(isset($_POST['addCat'])){
    $category = new ManageCategory();
}

function getParentCategory(){
    $catConnect = new Connection();

    $parentData = $catConnect -> fetchRow(['catId', 'title'], 'category', ['parentId' => 0]);

    if($parentData -> num_rows > 0)
        return $parentData;
    else
        return false;
}

?>