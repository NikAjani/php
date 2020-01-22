<?php

    $row = 5;
    for($i = 0; $i < $row; $i++){
        
        for($j = 0; $j < $row; $j++){

            if($i == 0 || $i == 4 || $j == 0 || $j == 4)
                echo '*';
            else    
                echo '&nbsp ';
            
        }
        echo '<br>';
    }

?>