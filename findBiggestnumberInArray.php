<?php

    $numberArray = [5,7,19,6,458,2,10,23,0,23,45,252];
    $maxNumber = 0;

    for($i = 0; $i < sizeof($numberArray); $i++){

        if($maxNumber < $numberArray[($i)])
            $maxNumber = $numberArray[$i];
    }

    echo $maxNumber.' Is Biggest Number in Array';

?>