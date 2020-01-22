<?php
    
    $number = 12521;
    $reversNumber = 0;
    $tempNumber = $number;

    while($tempNumber != 0){

        $singleDigit = $tempNumber % 10;
        $reversNumber = $reversNumber * 10 + $singleDigit;
        $tempNumber = (int)($tempNumber / 10);
    }

    if($number == $reversNumber)
        echo $number.' Is Reverse number.';
    else   
        echo $number.' Is Not Reverse number.';
?>