<?php

    $limit = 8;

    for($i = 1; $i <= $limit; $i++){
        for($j = 1; $j <= $i; $j++)
            echo $j.' ';
        echo '<br>';
    }

?>