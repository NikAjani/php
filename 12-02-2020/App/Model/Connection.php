<?php

namespace App\Model;

use mysqli;

class Connection {

    private $host = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $dbName = 'mvc_db';

    function __construct() {
        
        $this->connection = new mysqli($this->host, $this->userName, $this->password, $this->dbName);

    }

    protected function fetchRow($colName, $tableName, $whereArray){

        if(sizeof($colName) > 1){
            $colNameString = implode(', ', $colName);
        } else {
            $colNameString = $colName[0];
        }
        
        $where = $this->whereCondition($whereArray);

        $sqlQuery = "SELECT $colNameString FROM `$tableName`".$where;
        $tableData = $this->connection->query($sqlQuery);

        if(@$tableData->num_rows > 0){
            echo mysqli_error($this->connection);
            return $tableData;
        }
        else    
            return false;

    }

    protected function fetchAll($tableName){

        $sqlQuery = "SELECT * FROM `$tableName`";

        $tableData = $this->connection->query($sqlQuery);

        if($tableData->num_rows > 0)
            return $tableData;
        else    
            return false;
    }

    protected function insertData($tableName, $colData){

        $column = implode(', ', array_keys($colData));
        $columnValue = implode('\', \'', array_values($colData));

        $sqlQuery = "INSERT INTO `$tableName` (".$column.") VALUES ('".$columnValue."')";

        if($this->connection->query($sqlQuery) === TRUE){
            return $this->connection->insert_id;
        } else {
            return false;
        }
    }

    protected function update($updateData, $tableName, $whereArray) {
        
        $colName = array_keys($updateData);
        $colValue = array_values($updateData);
    
        $updateString = "";
    
        $updateString .= $colName[0].' = \''.$colValue[0].'\'';
    
        if(sizeof($colName) > 1) {
    
            for($i = 1; $i < sizeof($colName); $i++){
                $updateString .= ', '.$colName[$i].' = \''.$colValue[$i].'\'';
            }
    
        }
    
        $updateString;
    
        $where = $this->whereCondition($whereArray);
    
        $sqlQuery = "UPDATE `$tableName` SET ".$updateString."".$where;
    
        if($this->connection->query($sqlQuery) === TRUE)
            return true;
        else{
            echo mysqli_error($this->connection);    
            return false;
        }
    }

    protected function deleteRow($tableName, $whereArray){
    
        $where = $this->whereCondition($whereArray);
    
        $sqlQuery = "DELETE FROM `$tableName` ".$where;
    
        if($this->connection->query($sqlQuery) === TRUE){
            echo mysqli_error($this->connection);
            return true;
        } else {
            return false;
        }
    
    }

    protected function whereCondition($whereArray){

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
        mysqli_close($this->connection);
    }

}

?>