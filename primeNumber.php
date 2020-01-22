<?php

    $number = 35;
    $isPrime = true;

    if($number > 2){

        for($i = 2; $i < (int)($number / 2); $i++){
            if(($number % $i) == 0)
                $isPrime = false;
        }
    }

    if($number == 1 || $number == 0)
        echo '1 and 0 is Prime number';
    else{
        if($isPrime)
            echo $number.' Number is Prime';
        else    
            echo $number.' Number is Not Prime';
    }
    
?>