<?php

    $number1 = 32;
    $number2 = 96;

    function findHcf($num,$num2){
        $len = $num > $num2 ? $num : $num2;

        for($i = 1; $i < $len; $i++){
            if(($num % $i == 0) && ($num2 % $i == 0))
                $hcf = $i;
        }

        return $hcf;
    }

    echo $number1.' And '.$number2.' HCF = '.findHcf($number1,$number2);
    echo '<br>';
?>