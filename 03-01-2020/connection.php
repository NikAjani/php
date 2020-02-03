<?php

class Connection {

    private $hostName = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $database = 'blog_portal';

    function __construct() {
        
        $this -> dbConnection = new mysqli($this -> hostName, $this -> userName, $this -> password, $this -> database);

    }

    function load($colName, $tableName, $whereArray){

        $where = $this -> whereCondition($whereArray);

        $sqlQuery = "SELECT `$colName` FROM `$tableName` WHERE ".$where;
        $tableData = $this -> dbConnection -> query($sqlQuery);

        if(@$tableData -> num_rows > 0){
            $row = $tableData -> fetch_assoc();

            return $row[$colName];
        }
        else    
            return false;

    }

    function insertData($tableName, $colData){
        $column = implode(', ', array_keys($colData));
        $columnValue = implode('\', \'', array_values($colData));

        $sqlQuery = "INSERT INTO `$tableName` (".$column.") VALUES ('".$columnValue."')";

        if($this -> dbConnection -> query($sqlQuery) === TRUE){
            return $this -> dbConnection -> insert_id;
        } else {
            return false;
        }
    }

    function whereCondition($whereArray){

        if(sizeof($whereArray) >= 1){
            $where = "";
            $key = array_keys($whereArray);
            $value = array_values($whereArray);
            $where = " WHERE ".$key[0]." = '".$value[0]."'";

            if(sizeof($whereArray) > 1){
                for($cnt = 1; $cnt < sizeof($whereArray); $cnt++){
                    if($key[$cnt] == 'password')
                        $where .= ' AND '.$key[$cnt]." = '".md5($value[$cnt])."'";
                    else    
                        $where .= ' AND '.$key[$cnt]." = '".$value[$cnt]."'";
                }
            }
        } else {
            $where = "";
        }

        return $where;
    }

    function __destruct() {
        
        mysqli_close($this -> dbConnection);
    }
}

?>