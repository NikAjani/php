<?php

    $name = 'abcdef';
    $name2 = 'ac';

    $len = strlen($name) > strlen($name2) ? strlen($name) : strlen($name2);

    echo $len;

    $concatentString = '';

    for($i = 0; $i < $len; $i++){
        
        $concatentString .= $name[$i] . $name2[$i];
        
    }

    echo $concatentString;

?>