<?php

    $unsortedArray = [9,4,7,6,3,1,2,5,8,0];

    print_r($unsortedArray);
    echo '<Br>';

    for($i = 0; $i < sizeof($unsortedArray) - 1; $i++){

        for($j = 0; $j < (sizeof($unsortedArray) - 1); $j++){


            if($unsortedArray[$j] > $unsortedArray[$j+1]){
                // $temp = $unsortedArray[$j];
                // $unsortedArray[$j] = $unsortedArray[$j+1];
                // $unsortedArray[$j+1] = $temp;

                $unsortedArray[$j] = $unsortedArray[$j] + $unsortedArray[$j+1];
                $unsortedArray[$j+1] = $unsortedArray[$j] - $unsortedArray[$j+1];
                $unsortedArray[j] = $unsortedArray[$j] - $unsortedArray[$j+1];
            }

        }
    }

    print_r($unsortedArray);

?>