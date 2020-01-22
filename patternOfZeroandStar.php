<?php

    $k = 0;
    for($i = 1; $i <= 5; $i++){

        for($j = 1; $j <= $k+$i; $j++){
            echo '*';
        }
        for($j = 1; $j <= $i; $j++){
            echo '0';
        }
        $k += $i;

        echo '<br>';
    }

?>