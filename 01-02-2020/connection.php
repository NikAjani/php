<?php

class Connection {
    
    private $host = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $databaseName = 'logindemo';
    private $connSql;

    function __construct() {
        $this -> connSql = new mysqli($this -> host, $this -> userName, $this -> password, $this -> databaseName);
    }

    function load($colName, $tableName, $whereArray){

        $where = $this -> whereCondition($whereArray);

        $sqlQuery = "SELECT `$colName` FROM `$tableName` WHERE ".$where;
        $tableData = $this -> connSql -> query($sqlQuery);

        if(@$tableData -> num_rows > 0){
            $row = $tableData -> fetch_assoc();

            return $row[$colName];
        }
        else    
            return false;

    }

    function fetchAll($tableName){

        $sqlQuery = "SELECT * FROM `$tableName`";

        $tableData = $this -> connSql -> query($sqlQuery);

        if($tableData -> num_rows > 0)
            return $tableData;
        else    
            return false;
    }

    function fetchRow($colName, $tableName, $whereArray){

        if(sizeof($colName) > 1){
            $colNameString = implode('`, `', $colName);
        } else {
            $colNameString = $colName[0];
        }
        
        $where = $this -> whereCondition($whereArray);

        $sqlQuery = "SELECT `$colNameString` FROM `$tableName`".$where;
        $tableData = $this -> connSql -> query($sqlQuery);

        if(@$tableData -> num_rows > 0){
            echo mysqli_error($this -> connSql);
            return $tableData;
        }
        else    
            return false;

    }

    function insertData($tableName, $colData){
        $column = implode(', ', array_keys($colData));
        $columnValue = implode('\', \'', array_values($colData));

        $sqlQuery = "INSERT INTO `$tableName` (".$column.") VALUES ('".$columnValue."')";

        if($this -> connSql -> query($sqlQuery) === TRUE){
            return $this -> connSql -> insert_id;
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

    function __destruct(){
        mysqli_close($this -> connSql);   
    }

}

?>