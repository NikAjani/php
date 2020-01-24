<?php
    if(isset($_POST['submit'])){
        

        $formValue = [
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['emailId'],
            $_POST['phoneNo'],
            $_POST['address1'],
            $_POST['address2'],
            $_POST['country'],
            $_POST['postalCode'],
            $_POST['descYourSelf'],
            $_POST['getInTouch']
        ];

        $valid = false;
        foreach($formValue as $value){
            if(isset($value) && !empty($value)){
                $valid = true;
            }else   
                $valid = false;
        }
        if($valid)
            print_r($formValue);
        else    
            echo 'Please Print Valid Detail';

    }
?>