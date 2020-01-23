<?php

    $age = 30;

    if($age < 18){

        echo 'Hi This is a Boy';
    
    } else if($age >=18 && $age < 25){

        echo 'Hi This is a Teenager';

    } else {

        echo 'Hi This is a Man';

    }

    $number1 = 17;
    $number2 = 14;
    $number3 = 19;

    if($number1 > $number2 && $number1 > $number3){
        
        echo '<br>Number 1 is greater';
    
    } else if($number2 > $number3){
        
        echo '<br>Number 2 is greater';
    
    } else{
        
        echo '<br>number 3 is greater';
    }


    if($number1 == $number2){
        echo '<br>Both Number are  equle';

    } else if($number1 > $number2){
        echo '<br>Number 1 is Greater';
    
    } else{
        echo '<br>Number 2 is Greater';
    }
?>