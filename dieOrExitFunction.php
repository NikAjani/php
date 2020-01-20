<?php

    $number1 = 1;

    for($i = 1; $i <= 10; $i++){
        
        if($i == 5){
            //die('This is Number 5.');
        }
        
        echo $i.' Hello <br>';
    }

    $error = 'Page Found';

    if($error == 'Page Not Found')
        exit('<b>404 Page Not Found</b><br>');
    else
        echo 'Hi This is Page<br>';

?>