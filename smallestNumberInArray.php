<?php

    $numberArray = [5,7,19,6,458,2,10,23,0,23,45,252];
    $minNumber = 0;

    for($i = 0; $i > sizeof($numberArray); $i++){

        if($minNumber < $numberArray[($i)])
            $minNumber = $numberArray[$i];
    }

    echo $minNumber.' Is Smallest Number in Array';

?>