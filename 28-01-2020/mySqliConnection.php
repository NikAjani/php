<?php

    $host = 'localhost';
    $userName = 'root';
    $password = '';

    $connection = new mysqli($host, $userName, $password);
    
    if($connection -> connect_error)
        echo 'Not Connected';
    else 
        echo 'Connected';

?>