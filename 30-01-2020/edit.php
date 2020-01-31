<?php

require_once 'connection.php';
require_once 'registrationForm_post.php';

function isSelected_edit($fieldKey, $fieldValue){

    if(in_array(get_editValue($fieldKey), [$fieldValue]))
        return true;
    else    
        return false;
}

// for checked multipleValue Like checkBox

function isSelectedMulti_edit($fieldKey, $fieldValue){
    $multiArray = get_editValue($fieldKey,[]);
    if(in_array($fieldValue, $multiArray))
        return true;
    else 
        return false;
}

$rowData1 = editDataQuery($_GET['editId']);

$rowData = $rowData1 -> fetch_assoc();

function get_editValue($fieldName, $retrunType = ''){
    global $rowData;

    if(gettype($retrunType) == 'array'){
        $returnData = explode(',', $rowData[$fieldName]);
        return $returnData;
    }
    else
        return ($rowData[$fieldName]);
}

if(isset($_POST['extra']['update'])){

    $pathImage = fileUpload('profileImage','jpg');
    $pathPdf = fileUpload('certificatePdf','pdf');

    $accountData = prepareData('account', $_POST['account']);
    $addressData = prepareData('address', $_POST['address']);

    $isUpdate = updateData($accountData,'customers', ['custId' => $_GET['editId']]);
    
    if($isUpdate) {
        $isUpdate = updateData($addressData,'customer_address', ['custId' => $_GET['editId']]);

        if($isUpdate){

            $otherData = $_POST['other'];
            $otherData = array_merge($otherData, ['profileImagePath' => $pathImage]);
            $otherData = array_merge($otherData, ['certificateFile' => $pathPdf]);

            foreach($otherData as $key => $value){

                $updateData = ['fieldValue' => $value];
                switch($key){
                    case 'getInTouch':
                    case 'hobbies':
                        $value = implode(',', $value);
                        $updateData = ['fieldValue' => $value];
                }
                $isUpdate = updateData($updateData,'customer_additional_info', ['fieldKey' => $key,'custId' => $_GET['editId']]);
            }
            if($isUpdate){
                echo '<script>alert("Update Sucessfully");</script>';
                header('Location: view_html.php');
            } else 
                echo 'Error In other data Update';

        } else 
            echo 'Error in Address Data Update';
    }
    else    
        echo 'Error in Account Data Update';
    
}

?>