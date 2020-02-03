<?php

require_once 'connection.php';

if(isset($_GET['delId'])) {

    $conn = new Connection();

    $isDeleted = $conn -> deleteRow('post_category', ['postId' => $_GET['delId']]);

    if($isDeleted){
        echo '<script>alert("Delete Sucessfull");</script>';
        header('Location: blog_post.php');
    } else{
        echo "<script>alert('Error in Delete record');</script>";
    }

} else {
    echo '<b>404 Not Found</b>';
}

?>