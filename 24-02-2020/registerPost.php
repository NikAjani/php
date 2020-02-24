<?php 

print_r($_POST);

require_once "Adapter.php";

$adapte = new Adapter();

echo $query = "INSERT INTO `demo` (`firstName`, `lastName`) VALUES ('".$_POST['firstName']."', '".$_POST['lastName']."')";
 
if($adapte->insert($query)) {

    header("Location: index.php");
}

?>