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

    echo $sqlQuery = 'SELECT `'.$colName[0].'` FROM `'.$tableName.'`';
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0)
        return $tableData;
    else
        return ['Data Not Found'];

}

?>
