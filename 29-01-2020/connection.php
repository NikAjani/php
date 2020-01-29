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

function insertIntoTable($key,$colData, $tableName){
    
    global $connection;
    
    $queryString = 'INSERT INTO '.$tableName.' ( ';

    for($i = 0; $i < sizeof($key); $i++){
        $queryString .= $key[$i];
        if($i < sizeof($key)-1)
            $queryString .= ', '; 
    }

    $queryString .= ") VALUES ( ";

    for($i = 0; $i < sizeof($key); $i++){
        $queryString .= '\'';
        $queryString .= $colData[$key[$i]];
        $queryString .= '\'';
        if($i < sizeof($key)-1)
            $queryString .= ', '; 
    }

    $queryString .= ')';

    echo $queryString;

    if($connection -> query($queryString) === TRUE){
        echo "Inserted";
    }else {
        echo mysqli_error($connection);
    }
}

?>
