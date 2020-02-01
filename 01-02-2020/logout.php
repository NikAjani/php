<?php

session_start();

require_once 'connection.php';

if(isset($_SESSION['user'])) {

    print_r($_SESSION);

    $colData = ['login_time' => $_SESSION['user']['loginTime'], 'logout_time' => date("Y-m-d H:i:s", time()),'userId' => $_SESSION['user']['id']];

    $logout = new Connection();

    $isInserted = $logout -> insertData('login_time', $colData);

    if($isInserted) {
        session_destroy();
        header('Location: index.php');
    } else {
        echo 'Error in Logout';
    }
    
    
} else 
    header('Location: index.php');

?>