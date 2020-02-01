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

    function whereCondition($whereArray){
        $key = array_keys($whereArray);
        $value = array_values($whereArray);
        
        $where = $key[0]." = '".$value[0]."'";

        if(sizeof($whereArray) > 1){
            for($cnt = 1; $cnt < sizeof($whereArray); $cnt++){
                if($key[$cnt] == 'password')
                    $where .= ' AND '.$key[$cnt]." = '".md5($value[$cnt])."'";
                else    
                    $where .= ' AND '.$key[$cnt]." = '".$value[$cnt]."'";
            }
        }

        return $where;
    }
}

?>