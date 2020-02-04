<?php

require_once 'connection.php';

if(isset($_GET['blogId'])) {

    $conn = new Connection();

    $isDeleted = $conn -> deleteRow('post', ['postId' => $_GET['blogId']]);

    if($isDeleted){
        echo '<script>alert("Delete Sucessfull");</script>';
        header('Location: blog_post.php');
    } else{
        echo "<script>alert('Error in Delete record');</script>";
    }

} else {
    echo '<b>404 Not Found</b>';
}

if(isset($_GET['catDel'])) {

    $conn = new Connection();

    $isDeleted = $conn -> deleteRow('category', ['catId' => $_GET['catDel']]);

    if($isDeleted){
        echo '<script>alert("Delete Sucessfull");</script>';
        header('Location: categoryGrid.php');
    } else{
        echo "<script>alert('Error in Delete record');</script>";
    }

} else {
    echo '<b>404 Not Found</b>';
}

?>