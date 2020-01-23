<?php

    $max = 10;

    for($i = 0; $i <= $max; $i++){

        for($j = 0; $j <= $max; $j++){
            
            if($j == 0 || $j == $max || ($i <= $max/2 && ($i == $j || $j == $max-$i || $i > $j)))
                echo '*';
            else if($j == 0 || $j == $max || ($i >= $max/2 && ($i == $j || $j == $max-$i || $j > $i)))
                echo '*';
            else    
                echo '&nbsp&nbsp';
        }
        echo '<br>';
    }

?>