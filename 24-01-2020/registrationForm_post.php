<?php

session_start();

// for select Option selected
function isSelected($section, $fieldKey, $fieldValue){
    if(getValue($section, $fieldKey) == $fieldValue)
        return 'selected';
    else    
        return '';
}

// for Multiple option selected like checkbox
function isSelectedMulti($section, $fieldKey, $fieldValue){
    $multiArray = getValue($section, $fieldKey);
    if(in_array($fieldValue, $multiArray))
        return true;
    else 
        return false;
}

function getValue($section, $fieldName){

    return (isset($_POST[$section]) ? $_POST[$section][$fieldName] : 
        getSessionValue($section, $fieldName));
}

function setSessionValue(){
    $_SESSION['userData'] = $_POST;
}

function getSessionValue($section, $fieldName){

    return isset($_SESSION['userData'][$section][$fieldName]) ? 
        $_SESSION['userData'][$section][$fieldName] : '';
}

$valid = false;

function validField($sectionKey, $fieldKey){
    global $valid;
    
    if(isset($_POST[$sectionKey][$fieldKey]) && !empty($_POST[$sectionKey][$fieldKey])){
        return $valid = true; 
    }
    else{
        return $valid = false;
    }
    
}

function validAdditionFields($sectionKey, $fieldKey){
    global $valid;

    switch($fieldKey){
        
        case 'emailId':
        if(!filter_var($_POST['account']['emailId'],FILTER_VALIDATE_EMAIL)){
                return $valid = false;
            } else
                return $valid = true; 
            
        case 'password':
           if($_POST['account']['password'] != $_POST['account']['confirmPassword']){
                return $valid = false;
            } else
                return $valid = true; 
           
        case 'phoneNo':
            if(strlen($_POST['account']['phoneNo']) != 10){
                return $valid = false;
            } else
                return $valid = true; 
            
        case 'postalCode':
            if(strlen($_POST['address']['postalCode']) != 6){
                return $valid = false;
            } else
                return $valid = true;
            
    }
}


function uploadFile($fileExtnsion,$nameOfFile){
    $fileName = $_FILES[$nameOfFile]['name'];
    $fileTempLocation = $_FILES[$nameOfFile]['tmp_name'];
    $extension = strtolower(substr($fileName, strpos($fileName, '.')+1));
    $fileType = $_FILES[$nameOfFile]['type'];
    if(!empty($fileName)){

        if($extension == $fileExtnsion){

            $location = 'uploads/';

            if(move_uploaded_file($fileTempLocation, $location.$fileName)){
                
            } else{
                echo 'Eroor in File Upload';
            }

        } else{
            echo 'File Should be '.$fileExtnsion;
            
        }
    } else{
        echo 'Please choose File';      
        
    }
}


if($valid){
    uploadFile('jpg','profileImage');
    uploadFile('pdf','certificateFile');
    setSessionValue();
}

?>