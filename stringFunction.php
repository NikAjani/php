<?php

    $string = "Hi This is Example of PHP";

    // Word count.

    echo 'Total Word in String : ',str_word_count($string).'<br>';

    $resultOfWordCount = str_word_count($string,2);

    print_r($resultOfWordCount);

    $string .= ' & also the example of String Function';

    // count special Symbol also.

    $resultOfWordCount = str_word_count($string,1,'&');

    echo '<br> Count Special Symbol : <br>';

    print_r($resultOfWordCount);

    //String Shuffle

    $string = 'Hi this is Nikhil Ajani';

    echo '<br><br> String Shuffle : '.str_shuffle($string);

    // Random Password genetar using String Shuffle

    $stringForPassword = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*';

    echo '<br><br> Your Password is : ',substr(str_shuffle($stringForPassword),0,8);

    //way 2 for password generate.

    $upperCaseString = 'ABCDEFGHIJKMLOPQRSTUVWXYZ';
    $lowerCaseString = 'abcdefghijkmlopqrstuvwxyz';
    $numberString = '0123456789';
    $specialCharString = '!@#$%^&*+-/\|';

    $yourPassword = '';
    $yourPassword .= substr(str_shuffle($upperCaseString),0,2);
    $yourPassword .= substr(str_shuffle($lowerCaseString),0,2);
    $yourPassword .= substr(str_shuffle($numberString),0,2);
    $yourPassword .= substr(str_shuffle($specialCharString),0,2);

    echo '<br><br> Your random generated password is : ',str_shuffle($yourPassword);


    //String rev Function

    $palindromString = '19891';

    if($palindromString == strrev($palindromString))
        echo '<br><br>'.$palindromString.' : is Palindrom';
    else    
        echo '<br><br>'.$palindromString.' : is not Palindrom';

    // similar_text function


    $msg1 = 'Hi this is Nikhil Ajani. this is example of Php';
    $msg2 = 'Hi this is Nikhil Ajani. this is example of string Function';

    similar_text($msg1,$msg2,$result);
    
    echo '<br><br>Similar text : '.$result;
     
    // html entitites and addslashes

    $imgString = '<br><br>This is <img src="image.jpeg"> String';
    echo '<br>';
    echo 'Html Entitites and addslashes : '.htmlentities(addslashes($imgString));

?>