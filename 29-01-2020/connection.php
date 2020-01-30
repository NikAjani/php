<?php

$host = 'localhost';
$userName = 'root';
$password = '';
$database = 'customer_portal';

@$connection = new mysqli($host, $userName, $password, $database);

if($connection -> connect_error){

    die('Not Connected To DataBase');
}

function loadData($colName, $tableName, $whereCondition){
    global $connection;

    $key = array_keys($whereCondition);

    $where = '';
    $where .= "`".$key[0]."` = '".$whereCondition[$key[0]]."'";
    
    for($i = 1; $i < sizeof($key); $i++){

        if(sizeof($key) > 1){
            $where .= " AND `".$key[$i]."` = '".$whereCondition[$key[$i]]."'";
        } else {

        }
    }

    $sqlQuery = "SELECT `".$colName."` FROM `".$tableName."` WHERE ".$where;
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0){
        $row = $tableData -> fetch_assoc();
        return $row[$colName];
    }

}

function fetchAllData($tableName){
    
    global $connection;

    $sqlQuery = "SELECT * FROM `".$tableName."`";
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0)
        return $tableData;
    else
        return ['Data Not Found'];

}

function fetchRow($tableName, $whereCondition){

    global $connection;

    $key = array_keys($whereCondition);

    $where = '';
    $where .= "`".$key[0]."` = '".$whereCondition[$key[0]]."'";
    
    for($i = 1; $i < sizeof($key); $i++){

        if(sizeof($key) > 1){
            $where .= " AND `".$key[$i]."` = '".$whereCondition[$key[$i]]."'";
        }
    }

    $sqlQuery = "SELECT * FROM `".$tableName."` WHERE ".$where;
    $tableData = $connection -> query($sqlQuery);

    if($tableData -> num_rows > 0)
        return $tableData;
    else    
        return false;
}

function insertData($tableName, $colData){

    global $connection;

    $column = implode(',', array_keys($colData));
    $columnValue = implode('\',\'', array_values($colData));
    $columnValue = '\''.$columnValue.'\'';

    $sqlQuery = "INSERT INTO `$tableName` (".$column.") VALUES (".$columnValue.")";

    if($connection -> query($sqlQuery) === TRUE){
        return $connection -> insert_id;
    } else  
        return false;
}

?>
