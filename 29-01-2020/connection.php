<?php

$host = 'localhost';
$userName = 'root';
$password = '';
$database = 'customer_portal';

@$connection = new mysqli($host, $userName, $password, $database);

if($connection -> connect_error){

    die('Not Connected To DataBase');
}

function fetchAllData($colName,$tableName){
    
    global $connection;

    echo $sqlQuery = "SELECT `".$colName[0]."` FROM `".$tableName."`";
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0)
        return $tableData;
    else
        return ['Data Not Found'];

}

function insertIntoTable($colData){
    
    global $connection;

    $password = md5($_POST['account']['password']);

    $sqlQuery = "INSERT INTO `customers` (prefix, firstName, lastName, dateOfBirth, phoneNo, emailId, password)
    VALUES ("."'".$colData['account']['prefix']."', '".$colData['account']['firstName']."', '".$colData['account']['lastName']."'
    , '".$colData['account']['dateOfBirth']."', '".$colData['account']['phoneNo']."', '".$colData['account']['emailId']."', 
    '".$password."')";

    if($connection -> query($sqlQuery) === TRUE){
        echo "Inserted";
    }else {
        echo mysqli_error($connection);
    }
}

?>
