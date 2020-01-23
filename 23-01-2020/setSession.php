<?php

    session_start();

    $redirectFile = 'http://localhost/Cybercom/php/23-01-2020/sessionPractice.php';

    //$redirectFile = 'http://www.google.com';

    $_SESSION['user'] = 'User';

    header('Location: '.$redirectFile);

?>