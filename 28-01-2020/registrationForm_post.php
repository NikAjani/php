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
    $multiArray = getValue($section, $fieldKey,[]);
    if(in_array($fieldValue, $multiArray))
        return true;
    else 
        return false;
}

function getValue($section, $fieldName, $returnType = ''){

    return (isset($_POST[$section]) ? $_POST[$section][$fieldName] : 
        getSessionValue($section, $fieldName, $returnType));
}

function setSessionValue(){
    $_SESSION['userData'] = $_POST;
}

function getSessionValue($section, $fieldName, $returnType){

    return isset($_SESSION['userData'][$section][$fieldName]) ? 
        $_SESSION['userData'][$section][$fieldName] : $returnType;
}

$valid = true;

function validField($sectionKey, $fieldKey){
    global $valid;
    
    if(isset($_POST[$sectionKey][$fieldKey]) && !empty($_POST[$sectionKey][$fieldKey])){
        $GLOBALS['valid'] = true; 
        return true;
    }
    else{
        $GLOBALS['valid'] = false;
        return $valid;
    }
    
}

function validAdditionFields($sectionKey, $fieldKey){
    global $valid;

    switch($fieldKey){
        
        case 'emailId':
        if(!filter_var($_POST['account']['emailId'],FILTER_VALIDATE_EMAIL)){
                $GLOBALS['valid'] = false;
                return false;
            } else
                $GLOBALS['valid'] = true;
                return true; 
            
        case 'password':
           if($_POST['account']['password'] != $_POST['account']['confirmPassword']){
                $GLOBALS['valid'] = false;
                return false;
            } else
                $GLOBALS['valid'] = true; 
                return true;
           
        case 'phoneNo':
            if(strlen($_POST['account']['phoneNo']) != 10){
                $GLOBALS['valid'] = false;
                return false;
            } else
                $GLOBALS['valid'] = true; 
                return true;
            
    }
}


function uploadFile($fileName, $FileExtension){
    if(isset($_FILES[$fileName])){
        $imgName = $_FILES[$fileName]['name'];
        $imgTempLocation = $_FILES[$fileName]['tmp_name'];
        $extension = strtolower(substr($imgName, strpos($imgName, '.')+1));
        $fileType = $_FILES[$fileName]['type'];
        if(!empty($imgName)){

            if(($extension == $FileExtension)){

                $location = 'uploads/';

                if(move_uploaded_file($imgTempLocation, $location.$imgName)){
                    
                } else{
                    echo 'Eroor in File Upload';
                }

            } else{
                echo 'File Should be '.$FileExtension;
                exit();
            }
        } else{
            echo 'Please choose File';      
            exit();
        }
    }
}


if($valid){
    echo 'All Done';
    uploadFile('profileImage','jpg');
    uploadFile('certificateFile','pdf');
    setSessionValue();
}else {
    echo 'Not Done';
}

?>