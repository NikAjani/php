<?php

    $number = 153; // 27 + 125 + 1 =  153  

    $tempNumber = $number;

    $armstrong = 0;

    while($tempNumber != 0){

        $singleDigit = $tempNumber % 10;

        $armstrong += ($singleDigit * $singleDigit * $singleDigit);

        $tempNumber = $tempNumber / 10;
    }

    if($number == $armstrong)
        echo $number.' is Armstrong Number';
    else
        echo $number.' is Not Armstrong Number';

?>