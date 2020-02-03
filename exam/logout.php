<?php

session_start();
require_once 'connection.php';

if(isset($_SESSION['userName'])){
    session_unset();

    $logoutData = ['lastLogin' => $_SESSION['loginTime']];

    $conn = new Connection();

    $isupdate = $conn -> update($logoutData, 'user', ['userId' => $_SESSION['id']]);

    if($isupdate){
        if(session_destroy())
            header('Location: index.php');
    }

    
}
?>