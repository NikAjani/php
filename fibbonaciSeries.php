<?php

    $first = 0;
    $second = 1;
    $nextNumber = 0;

    for($i = 0; $i < 9; $i++){

        if($first == 0)
            echo '0 1  ';
        else    
            echo $nextNumber.'  ';

        $nextNumber = $first + $second;
        $first = $second;
        $second = $nextNumber;
        
        //echo $nextNumber;
        
    }

?>