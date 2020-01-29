<?php

require_once 'connection.php';

function getValue($section, $fieldName, $returnType = ''){
    return (isset($_POST[$section][$fieldName]) ? $_POST[$section][$fieldName] : $returnType);
}


if(isset($_POST['submit'])){
$valid = true;

    foreach(@$_POST as $sectionKey => $sectionValue) {

        foreach(@$sectionValue as $fieldKey => $fieldValue) {

            if(@isset($_POST[$sectionKey][$fieldKey]) && !empty($_POST[$sectionKey][$fieldKey])){

                switch($fieldKey){

                    case 'emailId':
                        if(!filter_var($_POST[$sectionKey][$fieldKey],FILTER_VALIDATE_EMAIL)){
                            echo '<script>alert("Email Formate is Not Valid");</script>';
                            $valid = false;

                        } else{
                            $valid = true;
                            
                        }
                         break;  

                    case 'password':
                        if($_POST[$sectionKey][$fieldKey] != $_POST['confirmPassword']){
                                echo '<script>alert("Password And Confrim Password is Not Match");</script>';
                                $valid = false;
                                
                            } else{ 
                                $valid = true;
                            }
                        break;     

                    case 'phoneNo':
                        if(strlen($_POST[$sectionKey][$fieldKey]) != 10){
                            echo '<script>alert("Only 10 digit Number is Allow");</script>';
                            $valid = false;

                        } else {
                            $valid = true;
                        }
                        break;
                }

                if($valid)
                    $valid = true;
                else 
                    break;

            }else{
                echo '<script>alert("'.$fieldKey.' is Required");</script>';
                $valid = false;
                break;
            }
        }
        if(!$valid)
            break;  
    }

    
    if($valid){
        $key = array_keys($_POST['account']);
        insertIntoTable($_POST);
    }
}


?>