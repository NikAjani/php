<?php

    $number1 = 9;
    $number2 = 15;

    echo 'befor swap number 1 = '.$number1.' And number 2 = '.$number2.'<br><Br>';

    $number1 = $number1 + $number2;
    $number2 = $number1 - $number2;
    $number1 = $number1 - $number2;

    echo 'After swap number 1 = '.$number1.' And number 2 = '.$number2.'<br>';

?>