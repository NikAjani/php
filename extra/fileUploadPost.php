<?php

function uploadFileAny($name, $fileExtension){
    var_dump($_FILES);
    echo '<br>';
    
    if(isset($_FILES[$name]) && !empty($_FILES[$name]['name'])){
        echo '<br>';
        echo $fileName = $_FILES[$name]['name'];
        echo '<br>';
        echo $extension = strtolower(substr($fileName, strpos($fileName, '.')+1));

        if($extension === $fileExtension){
            echo '<script>alert("selected")</script>';
        } else {
            echo '<script>alert("file should be '.$fileExtension.' Only");</script>';
        }
        
    } else {
        echo '<script>alert("Please Select File")</script>';
    }
}

function checkExtension($name, $fileExtension){
    if(isset($_FILES[$name]) && !empty($_FILES[$name]['name'])){
        
        $fileName = $_FILES[$name]['name'];
        
        $extension = strtolower(substr($fileName, strpos($fileName, '.')+1));

        if($extension === $fileExtension){
            return  true;
        } else {
            return false;
        }
        
    } else {
        return false;
    }
}

if(isset($_POST['upload'])){
    
    //uploadFileAny('fileName', 'pdf');
    
}

?>