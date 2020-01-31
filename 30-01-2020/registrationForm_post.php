<?php

require_once 'connection.php';

// for select option like prefix..
function isSelected($section, $fieldKey, $fieldValue){

    if(in_array(getValue($section, $fieldKey,[]), [$fieldValue]))
        return true;
    else    
        return false;
}

// for checked multipleValue Like checkBox

function isSelectedMulti($section, $fieldKey, $fieldValue){
    $multiArray = getValue($section, $fieldKey,[]);
    if(in_array($fieldValue, $multiArray))
        return true;
    else 
        return false;
}


//return value in input Field
function getValue($section, $fieldName, $returnType = ''){
    return (isset($_POST[$section][$fieldName]) ? $_POST[$section][$fieldName] : $returnType);
}

function prepareData($section, $sectionData, $key = ''){
    $preparedData =[];

    switch($section){

        case 'account':
            
            $preparedData = array_merge($preparedData, ['prefix' => $sectionData['prefix']]);
            $preparedData = array_merge($preparedData, ['firstName' => $sectionData['firstName']]);
            $preparedData = array_merge($preparedData, ['lastName' => $sectionData['lastName']]);
            $preparedData = array_merge($preparedData, ['dateOfBirth' => $sectionData['dateOfBirth']]);
            $preparedData = array_merge($preparedData, ['phoneNo' => $sectionData['phoneNo']]);
            $preparedData = array_merge($preparedData, ['emailId' => $sectionData['emailId']]);
            $preparedData = array_merge($preparedData, ['password' => md5($sectionData['password'])]);
            
            return $preparedData;

        case 'address':

            $preparedData = array_merge($preparedData, ['address1' => $sectionData['address1']]);
            $preparedData = array_merge($preparedData, ['address2' => $sectionData['address2']]);
            $preparedData = array_merge($preparedData, ['company' => $sectionData['company']]);
            $preparedData = array_merge($preparedData, ['city' => $sectionData['city']]);
            $preparedData = array_merge($preparedData, ['state' => $sectionData['state']]);
            $preparedData = array_merge($preparedData, ['country' => $sectionData['country']]);
            $preparedData = array_merge($preparedData, ['postalCode' => $sectionData['postalCode']]);

            return $preparedData;

        case 'other':

            return prepareOtherData($preparedData, $sectionData, $key);
    }
}

// for customer_addtitional_info 
function prepareOtherData($preparedData, $sectionData, $key){

    switch($key){

        case 'getInTouch':
        case 'hobbies':
             
            $preparedData = array_merge($preparedData, ["fieldKey" => $key, "fieldValue" => implode(',', $sectionData[$key])]);
            return $preparedData;
        default:
            $preparedData = array_merge($preparedData, ["fieldKey" => $key, "fieldValue" => $sectionData[$key]]);
            return $preparedData;
    }

}

//file  upload
function fileUpload($htmlFileName, $fileExtension) {
    if(isset($_FILES['other']['name'][$htmlFileName])) {

        $fileName = $_FILES['other']['name'][$htmlFileName];
        $tempLocation = $_FILES['other']['tmp_name'][$htmlFileName];
        $extension = strtolower(substr($fileName, strpos($fileName, '.')+1));

        if(!empty($fileName)){

            if($fileExtension == $extension) {

                $location = 'uploads/';
                if(move_uploaded_file($tempLocation, $location.$fileName)) {
                    return 'http://localhost/Cybercom/php/29-01-2020/uploads/'.$fileName;
                } else {
                    echo '<script>alert("Error in File uploads");</script>';
                    return NULL;
                }
            } else {
                echo '<script>alert(only "'.$fileExtension.'" is Allowed);</script>';
                    return NULL;
            }

        } else {
            echo '<script>alert("Please Select File");</script>';
            return NULL;
        }
    } else {
        echo 'Errr';
    }
}

function validation($section, $fieldName){
    if(isset($_POST[$section][$fieldName]) && !empty($_POST[$section][$fieldName])){

        switch($fieldName){
    
            case 'emailId':
                if(!filter_var($_POST[$section][$fieldName],FILTER_VALIDATE_EMAIL)){
                    echo '<script>alert("Email Formate is Not Valid");</script>';
                    return false;

                } else{
                    return true;
                    
                }

            case 'confirmPassword':
                if($_POST[$section]['password'] != $_POST['account'][$fieldName]){
                    echo '<script>alert("Password And Confrim Password is Not Match");</script>';
                    return false;
                    
                } else{ 
                    return true;
                }    

            case 'phoneNo':
                if(strlen($_POST[$section][$fieldName]) != 10){
                    echo '<script>alert("Only 10 digit Number is Allow");</script>';
                    return false;

                } else {
                    return true;
                }
        }

        return true;

    } else{
        echo '<script>alert("'.$fieldName.' is Required");</script>';
        return false;
    }
}


// check All Validation then Insert into Table
if(isset($_POST['extra']['submit'])) {
    
    foreach($_POST as $sectionKey => $sectionValue) {

        foreach($sectionValue as $fieldKey => $fieldValue) {

            $valid = validation($sectionKey, $fieldKey);
            if(!$valid)
                break;  
        }
        if(!$valid)
            break;
    }
        
    if($valid) {

        

        $pathImage = fileUpload('profileImage','jpg');
        $pathPdf = fileUpload('certificatePdf','pdf');

        $account = prepareData('account', $_POST['account']);
        $id = insertData('customers', $account);

        if($id){

            $address = prepareData('address', $_POST['address']);
            $address = array_merge($address, ['custId' => $id]);
            $address_id = insertData('customer_address', $address);

            if($address_id) {
                $otherData = $_POST['other'];
                $otherData = array_merge($otherData, ['profileImagePath' => $pathImage]);
                $otherData = array_merge($otherData, ['certificateFile' => $pathPdf]);

                foreach($otherData as $key => $value) {
                    
                    $other = prepareData('other', $otherData, $key);
                    $other = array_merge($other, ['custId' => $id]);
                    $other_id = insertData('customer_additional_info', $other);
                            
                    if(!$other_id) {
                        echo 'Error in Other Data Insert';
                        break;
                    } else {
                        header('Location: view_html.php');
                    }
                }

            } else
                echo 'Error in Address data insert';
        } else  
            echo 'Error in Account Data Insert';
    }
}



?>