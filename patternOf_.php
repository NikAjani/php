<?php

    $row = 10;

    for($i = 1; $i < $row; $i++){
        for($j = 1; $j <= $i; $j++)
            echo '*';
        echo '<br>';
    }

?>