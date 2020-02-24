<?php


if(!isset($_GET['delId'])){

    header("Location: index.php");
}

require_once "Adapter.php";

$adapte = new Adapter();

$query = "DELETE FROM `demo` WHERE `demoId`= ".$_GET['delId'];

if($adapte->delete($query))
    header("Location: index.php");
else
    throw new Exception("Error In Delete");

?>