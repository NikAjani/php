<?php 

require_once 'connection.php';
$conn = new Connection();

$rowData = $conn -> fetchRow(['*'],'category', ['catId' => $_GET['editId']]);

$rowData = $rowData -> fetch_assoc();

function get_editValue($fieldName, $retrunType = ''){
    global $rowData;

    if(gettype($retrunType) == 'array'){
        $returnData = explode(',', $rowData[$fieldName]);
        return $returnData;
    }
    else
        return ($rowData[$fieldName]);
}

function getParentCategory(){
    $catConnect = new Connection();

    $parentData = $catConnect -> fetchRow(['catId', 'title'], 'category', ['parentId' => 0]);

    if($parentData -> num_rows > 0)
        return $parentData;
    else
        return false;
}

class UpdateCategory{
    public $valid = 1;

    function __construct(){
        
        $this -> valid = 0;    
    }

    function getValue($fieldName){
        
        return (isset($_POST[$fieldName]) ? $_POST[$fieldName] : '');
    }

    function validation($fieldName){

        if(isset($_POST[$fieldName]) && !empty($_POST[$fieldName])){
            $this -> valid += 1;
            return true;
        } else {
            $this -> valid = 0;
            return false;
        }
    }

    function updateCategoryfunc(){

        $connct = new Connection();

        $updateData = $this -> prepareData($_POST);
        echo $imagePath = $this -> uploadFile('catImage', 'jpg');
        $updateData = array_merge($updateData, ['imagePath' => $imagePath]);
        echo 'hiii';

        $isUpdate = $connct -> update($updateData, 'category', ['catId' => $_GET['editId']]);

        if($isUpdate){
            echo 'Error';
            //header('Location: categoryGrid.php');
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
                    return 'http://localhost/Cybercom/php/03-02-2020/uploads/'.$fileName;
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

if(isset($_POST['updateCat'])){
    $category = new updateCategory();
}

?>