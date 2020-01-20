<?php

    echo '<br> PHP SELF : '.$_SERVER['PHP_SELF'];

    echo '<br> User IP : '.$_SERVER['SERVER_ADDR'];

    echo '<br> Server Name : '.$_SERVER['SERVER_NAME'];

    echo '<br> Server Protocol : '.$_SERVER['SERVER_PROTOCOL'];

    echo '<br> Request Method : '.$_SERVER['REQUEST_METHOD'];

    echo '<br> HTTP ACCEPT : '.$_SERVER['HTTP_ACCEPT'];

    echo '<br> HTTP HOST : '.$_SERVER['HTTP_HOST'];


    //globel variable use in function

    $userName = 'Root';

    function printUserName(){
        global $userName;

        echo '<br>User Name is : '.$userName;
    }

    printUserName();

?>