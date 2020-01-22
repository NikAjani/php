<?php

    $numberArray = [15,86,95,35,68,96];
    $maxNumber = 0;
    $secondhighest = 0;

    print_r($numberArray);
    echo '<br>';

    for($i = 0; $i < sizeof($numberArray); $i++){

        if($maxNumber < $numberArray[($i)]){

            $secondhighest = $maxNumber;
            $maxNumber = $numberArray[$i];

        }
            
    }

    echo 'Second highest Number : '.$secondhighest;

?>