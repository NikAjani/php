<?php

require_once 'connection.php';

if(isset($_GET['delId'])) {

    $isDeleted = deleteRow('customers', ['custId' => $_GET['delId']]);

    if($isDeleted){
        echo '<script>alert("Delete Sucessfull");</script>';
        header('Location: view_html.php');
    } else{
        echo "<script>alert('Error in Delete record');</script>";
    }

} else {
    echo '<b>404 Not Found</b>';
}

?>