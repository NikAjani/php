<?php

    $row = 4;
    $col = 3;
    for($i = 1; $i <= $row; $i++){
        $k = $i;
        for($j = 1; $j <= $col; $j++){
            echo ($k).' ';
            $k += 4;
        }
        echo '<br>';
    }

?>