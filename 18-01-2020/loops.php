<?php

    $counter = 1;

    // While loop

    while($counter <= 10){
        echo $counter.'  Hello World !<br>';
        $counter++;
    }

    $number = 2;
    $counter = 1;

    while($counter <= 10){
        echo $number.' * '.$counter.' = '.($number * $counter).'<br>';
        $counter++;

    }

    // do While Loop

    $counter = 1;

    do{
        echo 'This is Always Show once in do While loop<br>';
        $counter++;

    } while($counter <= 5);

    // For Loop

    for($i = 0; $i < 10; $i++){
        echo $i.' in For Loop<br>';

    }

?>