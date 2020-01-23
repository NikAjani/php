<?php

    $num = 1;
    $num = $num + 2;
    $num += 5;
    
    $text = 'Hello';
    $text = $text.' World !';
    $text .= 'World Again';

    echo 'sum : ',$num;
    echo '<br>Text : '.$text;

    // Arithmatice Operator

    $num2 = 1;
    $num3 = 4;

    echo '<br>Sum : ',($num + $num2 + $num3);

    echo '<br>Sub : ',($num - $num2 - $num3);

    echo '<br>Multiplication : ',($num2 * $num);

    echo '<br>Div : ',($num / $num3);

    $number = 500;

    if($number < 500){
        echo '<br>Number is less 500';
    
    } else{
        echo '<br>Number is more than 500';
    }

    if($number <= 500 || $number < 500){
        echo '<br>Number is less Or equle 500';
    
    } else{
        echo '<br>Number is more than 500';
    }
    

    // === opratore

    $num1 = '1';
    $num2 = 1;

    if($num1 === $num2){
        echo '<br>Equal';

    } else{
        echo '<br>Not Equal';

    }

    if(true === 'true') echo '<br>Equal';
    else    echo '<br>Not Equal';

?>