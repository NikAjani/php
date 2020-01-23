<?php

    $day = 'Sunday';

    switch($day){
        case 'Saturday' :
        case 'Sunday' :
            echo 'This is Week End :)<br>';
            break;
        default :
            echo 'Today is not Week End Enjoy Your Work :)<br>';
    }

    $age = 23;

    switch($age){
        case $age < 18 :
            echo 'A Boy<br>';
            break;
        case $age >= 18 && $age < 25 :
            echo 'A Teenager<br>';
            break;
        case $age >= 25 && $age < 50 :
            echo 'A Man<br>';
            break;
        default :
            echo 'A Old Man<br>';
    }

    $number = 5;

    switch($number){
        case 1 :
            echo 'One<br>';
            break;
        case 2 :
            echo 'Two<br>';
            break;
        case 3 :
            echo 'Three<br>';
            break;
        case 4 :
            echo 'Four<br>';
            break;
        case 5 :
            echo 'Five<br>';
            break;
        case 6 :
            echo 'Six<br>';
            break;   
        case 7 :
            echo 'Seven<br>';
            break;
        case 8 :
            echo 'Eight<br>';
            break;
        case 9 :
            echo 'Nine<br>';
            break;
        case 0 :
            echo 'Zero<br>';
            break;  
        default :
            echo 'Above 0-9<br>';
    }

?>