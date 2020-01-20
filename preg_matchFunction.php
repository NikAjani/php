<?php

    $stirng = 'hi This is Nikhil Ajani';

    if(preg_match('/Nikhil/',$stirng))
        echo 'Name found in String<br>';
    else   
        echo 'Name is not found in String<br>';

    // store result of preg_match() in array;
    $stirng = 'Hi Hello How are you hi Hello Again';

    preg_match('/hi/',$stirng,$matches);

    print_r($matches);

    echo '<br>';

    // validation using preg_match();
    $name = "Nikhil";

    if(preg_match('/^[a-zA-Z]*$/',$name))
        echo $name.' Name is Valid<br>';
    else    
        echo $name.' is Not valid<br>'; 

    //ignore case using 'i'

    if(preg_match('/nikhil/i',$name))
        echo 'Name is same<br>';
    else
        echo 'Name is not Same<br>';

    //validate Phone Number

    $phoneNo = 989814038198;

    if(preg_match('/(^[0-9]{10}$)/',$phoneNo))
        echo 'Phone Number is valid<br>';
    else 
        echo 'Phone Number is not valid<br>';

    // validate Email

    $email = 'ajaninikhil23@gmail.com';

    if(filter_var($email,FILTER_VALIDATE_EMAIL))
        echo $email.' : Email Id is valid<br>';
    else   
        echo $email.' : Email is Not valid<br>';


?>