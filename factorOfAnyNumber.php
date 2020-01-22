<?php

    $number = 20; // 1 2 5 10

    echo 'Factor Of '.$number.' Is : ';

    if($number > 0){

        for($i = 1; $i <= $number; $i++){

            if($number % $i == 0)
                echo $i.'  ';
        }
    }



?>