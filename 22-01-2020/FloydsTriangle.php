<?php

    $k=1;
    $limit = 5;
    for($i = 0; $i < $limit; $i++){

        for($j = 0; $j <= $i; $j++){
            
            echo $k.' ';
            $k++;
        }
        echo '<br>';
    }

?>