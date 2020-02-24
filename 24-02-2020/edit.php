<?php

require_once "Adapter.php";

$adapter = new Adapter();


if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['editId'])){
    
    $query = "SELECT * FROM `demo` WHERE `demoId`= '".$_GET['editId']."'";
    if(!$editData = $adapter->fetchRow($query)) 
        header("Location: index.php");
}


if($_SERVER["REQUEST_METHOD"] == "POST"){

    echo $query = "UPDATE `demo` SET `firstName` = '".$_POST['firstName']."', `lastName` = '".$_POST['lastName']."' WHERE `demoId` = '".$_POST['id']."'";

    if($adapter->update($query)) 
        header("Location: index.php");
    else
        throw new Exception("Error In Update");
        
}

?>