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

function validAllFields(){
    $valid = false;

    foreach($_POST as $sectionKey => $sectionValue){
        foreach($sectionValue as $fieldKey => $value){
            if(isset($_POST[$sectionKey][$fieldKey]) && !empty($_POST[$sectionKey][$fieldKey]))
                $valid = true;
            else{
                echo '<b>'.$fieldKey.' field is required Please Enter Value..</b><br>';
                $valid = false;
                break;
            }
        }
        if(!$valid) 
            break;
    }
    return $valid;
}

if(validAllFields())
    setSessionValue();

?>