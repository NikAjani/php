<?php

    $host = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'customer_portal';

    @$connection = new mysqli($host, $userName, $password, $database);
    
    if($connection -> connect_error)
        echo 'Not Connected';
    else 
        echo 'Connected';

?>