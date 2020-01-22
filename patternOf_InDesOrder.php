<?php

    $row = 15;

    for($row = 15; $row > 0; $row -= 2){
        for($j = $row; $j > 0; $j--){
            echo '*';
        }
        echo '<br>';
    }

?>