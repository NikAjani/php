<?php

    $number = 5;
    $factorial = 1;

    if($number == 0 || $number == 1)
        echo 'Factorial = 1';
    else{

        for($i = 1; $i <= $number; $i++){
            $factorial *= $i;
        }

        echo 'Factorial is : '.$factorial;
    }

    function findFactorial($number){
        
        if($number == 0 || $number == 1)
            return 1;
        else    
            return $number * findFactorial($number - 1);
    }

    echo '<br> Factorial Using Recursive : '.findFactorial($number);

?>