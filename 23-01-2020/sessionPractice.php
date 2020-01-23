<?php
    require_once 'setSession.php';

    if(isset($_SESSION['user'])){

        if(strtolower($_SESSION['user']) == 'admin'){
            
            echo 'Welcome, '.$_SESSION['user'];

        } else if(strtolower($_SESSION['user']) == 'user'){
            
            echo 'Welcome, '.$_SESSION['user'];

        } else{
            
            echo 'Please Login';
        }
    }

?>